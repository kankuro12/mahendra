<?php

namespace App\Console\Commands;

use App\Models\Album;
use App\Models\Department;
use App\Models\Event;
use App\Models\Facility;
use App\Models\LeadershipMessage;
use App\Models\Notice;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

use function Laravel\Prompts\confirm;
use function Laravel\Prompts\note;
use function Laravel\Prompts\search;
use function Laravel\Prompts\select;
use function Laravel\Prompts\table;
use function Laravel\Prompts\text;
use function Laravel\Prompts\warning;

class AdminTui extends Command
{
    protected $signature = 'admin:tui';

    protected $description = 'Interactive terminal UI for admin management';

    public function handle(): void
    {
        $this->banner();

        while (true) {
            $action = select(
                label: 'Main Menu',
                options: [
                    'dashboard' => 'Dashboard Overview',
                    '---' => '────────── Manage ──────────',
                    'notices' => 'Notices',
                    'facilities' => 'Facilities',
                    'albums' => 'Gallery Albums',
                    'messages' => 'Leadership Messages',
                    'teachers' => 'Teachers',
                    'events' => 'Events',
                    'departments' => 'Departments',
                    '---2' => '────────── System ──────────',
                    'users' => 'Manage Users',
                    'exit' => 'Exit Admin TUI',
                ],
                scroll: 12,
            );

            if ($action === 'exit') {
                note('Goodbye!');
                break;
            }

            match ($action) {
                'dashboard' => $this->dashboard(),
                'notices' => $this->manageNotices(),
                'facilities' => $this->manageFacilities(),
                'albums' => $this->manageAlbums(),
                'messages' => $this->manageMessages(),
                'teachers' => $this->manageTeachers(),
                'events' => $this->manageEvents(),
                'departments' => $this->manageDepartments(),
                'users' => $this->manageUsers(),
                default => null,
            };
        }
    }

    private function banner(): void
    {
        $this->newLine();
        note('
  ╔══════════════════════════════════════════╗
  ║     Mahendra Secondary School            ║
  ║     Admin Management TUI                 ║
  ╚══════════════════════════════════════════╝');
        $this->newLine();
    }

    private function dashboard(): void
    {
        $this->newLine();
        note('Dashboard Overview');

        $stats = [
            ['Notices', (string) Notice::count(), (string) Notice::where('is_urgent', true)->count().' urgent'],
            ['Facilities', (string) Facility::count(), ''],
            ['Albums', (string) Album::count(), (string) Album::all()->sum(fn ($a) => is_countable($a->images) ? count($a->images) : 0).' images'],
            ['Messages', (string) LeadershipMessage::count(), ''],
            ['Teachers', (string) Teacher::count(), (string) Department::count().' depts'],
            ['Events', (string) Event::count(), (string) Event::where('event_date', '>=', now())->count().' upcoming'],
            ['Users', (string) User::count(), ''],
        ];

        table(['Entity', 'Total', 'Details'], $stats);

        $recentNotices = Notice::latest()->take(5)->get();
        if ($recentNotices->isNotEmpty()) {
            $this->newLine();
            note('Recent Notices');
            table(
                ['Title', 'Urgent', 'Published'],
                $recentNotices->map(fn ($n) => [
                    str($n->title)->limit(50)->toString(),
                    $n->is_urgent ? 'Yes' : 'No',
                    $n->published_at?->format('M d, Y') ?? '--',
                ])->toArray()
            );
        }

        $upcomingEvents = Event::where('event_date', '>=', now())->orderBy('event_date')->take(5)->get();
        if ($upcomingEvents->isNotEmpty()) {
            $this->newLine();
            note('Upcoming Events');
            table(
                ['Title', 'Date', 'Location'],
                $upcomingEvents->map(fn ($e) => [
                    str($e->title)->limit(50)->toString(),
                    $e->event_date?->format('M d, Y') ?? '--',
                    $e->location ?? '--',
                ])->toArray()
            );
        }

        $this->pause();
    }

    // ─── Entity CRUD Helpers ─────────────────────────────────

    private function entityActions(string $label, string $modelClass, array $columns, array $searchFields, callable $formFn, ?callable $editFn = null): void
    {
        $action = select(
            label: "$label — Choose action",
            options: [
                'list' => 'List all',
                'create' => 'Create new',
                'edit' => 'Edit',
                'delete' => 'Delete',
                'back' => 'Back to menu',
            ],
        );

        match ($action) {
            'list' => $this->entityList($label, $modelClass, $columns),
            'create' => $this->entityCreate($label, $modelClass, $formFn),
            'edit' => $this->entityEdit($label, $modelClass, $columns, $searchFields, $editFn ?? $formFn),
            'delete' => $this->entityDelete($label, $modelClass, $columns),
            default => null,
        };
    }

    private function entityList(string $label, string $modelClass, array $columns): void
    {
        $items = $modelClass::latest()->limit(50)->get();
        if ($items->isEmpty()) {
            warning("No $label found.");
            $this->pause();

            return;
        }

        table(
            array_merge(['#'], $columns),
            $items->values()->map(fn ($item, $i) => array_merge(
                [(string) ($i + 1)],
                array_map(fn ($col) => $this->colVal($item, $col), $columns)
            ))->toArray()
        );

        $this->pause();
    }

    private function entityCreate(string $label, string $modelClass, callable $formFn): void
    {
        $data = $formFn();
        $modelClass::create($data);
        note("$label created successfully.");
        $this->pause();
    }

    private function entityEdit(string $label, string $modelClass, array $columns, array $searchFields, callable $formFn): void
    {
        $item = $this->pickItem($label, $modelClass, $columns, $searchFields);
        if (! $item) {
            return;
        }

        $data = $formFn($item);
        $item->update($data);
        note("$label updated successfully.");
        $this->pause();
    }

    private function entityDelete(string $label, string $modelClass, array $columns): void
    {
        $item = $this->pickItem($label, $modelClass, $columns, ['title', 'name']);
        if (! $item) {
            return;
        }

        $display = method_exists($item, 'getAttribute') ? ($item->title ?? $item->name ?? "#{$item->id}") : "#{$item->id}";

        if (confirm("Delete this $label: \"$display\"?")) {
            $item->delete();
            note("$label deleted.");
        }
        $this->pause();
    }

    private function pickItem(string $label, string $modelClass, array $columns, array $searchFields): mixed
    {
        $items = $modelClass::latest()->limit(100)->get();
        if ($items->isEmpty()) {
            warning("No $label found.");
            $this->pause();

            return null;
        }

        $id = search(
            label: "Search $label",
            options: fn (string $value) => $items
                ->filter(fn ($item) => collect($searchFields)->some(
                    fn ($f) => str_contains(strtolower((string) ($item->$f ?? '')), strtolower($value))
                ))
                ->mapWithKeys(fn ($item) => [
                    $item->id => ($item->title ?? $item->name ?? "#{$item->id}").' | '.collect($columns)->map(fn ($c) => $this->colVal($item, $c))->implode(' | '),
                ])
                ->toArray(),
            placeholder: 'Type to search...',
        );

        return $modelClass::find($id);
    }

    private function colVal($item, string $col): string
    {
        return match (true) {
            $col === 'created_at' => $item->created_at?->format('M d, Y') ?? '--',
            $col === 'published_at' => $item->published_at?->format('M d, Y') ?? '--',
            $col === 'event_date' => $item->event_date?->format('M d, Y') ?? '--',
            $col === 'date' => $item->date ? Carbon::parse($item->date)->format('M d, Y') : '--',
            $col === 'is_urgent' => $item->is_urgent ? 'Yes' : 'No',
            $col === 'image' => $item->image ? 'Yes' : 'No',
            $col === 'department' => $item->department?->name ?? '--',
            str($col)->contains('.') => data_get($item, $col, '--'),
            default => str((string) ($item->$col ?? '--'))->limit(40)->toString(),
        };
    }

    private function pause(): void
    {
        text('Press Enter to continue...');
    }

    // ─── Notices ──────────────────────────────────────────────

    private function manageNotices(): void
    {
        $this->entityActions(
            'Notices', Notice::class,
            ['title', 'is_urgent', 'published_at'],
            ['title', 'content'],
            fn (?Notice $notice = null) => [
                'title' => text('Title', required: true, default: $notice?->title),
                'slug' => str(text('Slug', required: true, default: $notice?->slug))->slug()->toString(),
                'content' => text('Content (HTML)', required: true, default: $notice?->content),
                'is_urgent' => confirm('Is urgent?', default: $notice?->is_urgent ?? false),
                'published_at' => text('Published date (Y-m-d)', default: $notice?->published_at?->format('Y-m-d') ?? now()->format('Y-m-d')),
            ],
        );
    }

    // ─── Facilities ───────────────────────────────────────────

    private function manageFacilities(): void
    {
        $this->entityActions(
            'Facilities', Facility::class,
            ['title', 'tagline', 'image'],
            ['title', 'tagline', 'summary'],
            fn (?Facility $facility = null) => [
                'title' => text('Title', required: true, default: $facility?->title),
                'slug' => str(text('Slug', required: true, default: $facility?->slug))->slug()->toString(),
                'tagline' => text('Tagline', default: $facility?->tagline),
                'icon' => text('Icon', default: $facility?->icon),
                'summary' => text('Summary', default: $facility?->summary),
                'description' => text('Description (HTML)', default: $facility?->description),
                'features' => text('Features (comma-separated)', default: $facility?->features ? implode(', ', (array) $facility->features) : ''),
                'coordinator' => text('Coordinator', default: $facility?->coordinator),
                'coordinator_role' => text('Coordinator role', default: $facility?->coordinator_role),
                'specifications' => text('Specifications (comma-separated)', default: $facility?->specifications ? implode(', ', (array) $facility->specifications) : ''),
                'image' => text('Image path', default: $facility?->image ?? ''),
            ],
        );
    }

    // ─── Albums ───────────────────────────────────────────────

    private function manageAlbums(): void
    {
        $this->entityActions(
            'Albums', Album::class,
            ['title', 'date', 'youtube'],
            ['title', 'description'],
            fn (?Album $album = null) => [
                'title' => text('Title', required: true, default: $album?->title),
                'slug' => str(text('Slug', required: true, default: $album?->slug))->slug()->toString(),
                'description' => text('Description', default: $album?->description),
                'date' => text('Date', default: $album?->date),
                'youtube' => text('YouTube URL', default: $album?->youtube),
            ],
        );
    }

    // ─── Messages ─────────────────────────────────────────────

    private function manageMessages(): void
    {
        $this->entityActions(
            'Messages', LeadershipMessage::class,
            ['title', 'author', 'role'],
            ['title', 'author', 'teaser'],
            fn (?LeadershipMessage $message = null) => [
                'title' => text('Title', required: true, default: $message?->title),
                'slug' => str(text('Slug', required: true, default: $message?->slug))->slug()->toString(),
                'author' => text('Author', required: true, default: $message?->author),
                'role' => text('Role', default: $message?->role),
                'teaser' => text('Teaser', default: $message?->teaser),
                'image' => text('Image path', default: $message?->image ?? ''),
                'date' => text('Date', default: $message?->date),
                'paragraphs' => text('Paragraphs (comma-separated)', default: $message?->paragraphs ? implode(' | ', (array) $message->paragraphs) : ''),
            ],
        );
    }

    // ─── Teachers ─────────────────────────────────────────────

    private function manageTeachers(): void
    {
        $this->entityActions(
            'Teachers', Teacher::class,
            ['name', 'title', 'department'],
            ['name', 'title', 'credentials'],
            fn (?Teacher $teacher = null) => [
                'department_id' => text('Department ID', required: true, default: (string) ($teacher?->department_id ?? '')),
                'name' => text('Name', required: true, default: $teacher?->name),
                'title' => text('Title', default: $teacher?->title),
                'credentials' => text('Credentials', default: $teacher?->credentials),
                'sort_order' => (int) text('Sort order', default: (string) ($teacher?->sort_order ?? '0')),
                'image' => text('Image path', default: $teacher?->image ?? ''),
            ],
        );
    }

    // ─── Events ───────────────────────────────────────────────

    private function manageEvents(): void
    {
        $this->entityActions(
            'Events', Event::class,
            ['title', 'type', 'event_date', 'location'],
            ['title', 'description', 'location'],
            fn (?Event $event = null) => [
                'title' => text('Title', required: true, default: $event?->title),
                'description' => text('Description', default: $event?->description),
                'location' => text('Location', default: $event?->location),
                'type' => text('Type', default: $event?->type),
                'event_date' => text('Event date (Y-m-d)', default: $event?->event_date?->format('Y-m-d')),
                'starts_at' => text('Start time (H:i:s)', default: $event?->starts_at),
            ],
        );
    }

    // ─── Departments ──────────────────────────────────────────

    private function manageDepartments(): void
    {
        $this->entityActions(
            'Departments', Department::class,
            ['name', 'slug', 'sort_order'],
            ['name', 'slug'],
            fn (?Department $department = null) => [
                'name' => text('Name', required: true, default: $department?->name),
                'slug' => str(text('Slug', required: true, default: $department?->slug))->slug()->toString(),
                'icon' => text('Icon', default: $department?->icon),
                'sort_order' => (int) text('Sort order', default: (string) ($department?->sort_order ?? '0')),
            ],
        );
    }

    // ─── Users ────────────────────────────────────────────────

    private function manageUsers(): void
    {
        $action = select('Users — Choose action', [
            'list' => 'List all users',
            'create' => 'Create new user',
            'delete' => 'Delete user',
            'back' => 'Back to menu',
        ]);

        match ($action) {
            'list' => $this->listUsers(),
            'create' => $this->createUser(),
            'delete' => $this->deleteUser(),
            default => null,
        };
    }

    private function listUsers(): void
    {
        $users = User::latest()->get();
        if ($users->isEmpty()) {
            warning('No users found.');
            $this->pause();

            return;
        }

        table(
            ['ID', 'Name', 'Email', 'Created'],
            $users->map(fn ($u) => [
                (string) $u->id,
                $u->name,
                $u->email,
                $u->created_at->format('M d, Y'),
            ])->toArray()
        );

        $this->pause();
    }

    private function createUser(): void
    {
        User::create([
            'name' => text('Name', required: true),
            'email' => text('Email', required: true, validate: fn (string $v) => match (true) {
                ! filter_var($v, FILTER_VALIDATE_EMAIL) => 'Invalid email.',
                User::where('email', $v)->exists() => 'Email already taken.',
                default => null,
            }),
            'password' => text('Password', required: true),
        ]);

        note('User created successfully.');
        $this->pause();
    }

    private function deleteUser(): void
    {
        $users = User::all();
        if ($users->isEmpty()) {
            warning('No users found.');
            $this->pause();

            return;
        }

        $id = search(
            label: 'Search user to delete',
            options: fn (string $value) => $users
                ->filter(fn ($u) => str_contains(strtolower($u->name.$u->email), strtolower($value)))
                ->mapWithKeys(fn ($u) => [$u->id => "$u->name <$u->email>"])
                ->toArray(),
        );

        $user = User::find($id);
        if ($user && confirm("Delete user \"{$user->name}\"?")) {
            $user->delete();
            note('User deleted.');
        }
        $this->pause();
    }
}
