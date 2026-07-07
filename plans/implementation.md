# Detailed Implementation Plan - Transitioning to Dynamic Data

This blueprint outlines the exact schema migrations, model definitions, seeding scripts, controller overrides, and admin panel configurations required to transform the Mahendra Secondary School Portal from static mock content to a database-driven dynamic system.

---

## 1. Database Schema & Migrations

We will use SQLite (`database/database.sqlite`) as configured in the `.env` file. We will define the migrations with robust constraints, foreign keys, and JSON support.

### Migration Schema Definition

#### `create_facilities_table.php`
```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('tagline');
            $table->string('icon');
            $table->string('image');
            $table->text('summary');
            $table->text('description');
            $table->json('features'); // Cast to array in model
            $table->string('coordinator');
            $table->string('coordinator_role');
            $table->json('specifications'); // Cast to array in model
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('facilities');
    }
};
```

#### `create_departments_table.php`
```php
Schema::create('departments', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('slug')->unique();
    $table->string('icon');
    $table->integer('sort_order')->default(0);
    $table->timestamps();
});
```

#### `create_teachers_table.php`
```php
Schema::create('teachers', function (Blueprint $table) {
    $table->id();
    $table->foreignId('department_id')->constrained()->onDelete('cascade');
    $table->string('name');
    $table->string('title');
    $table->string('credentials');
    $table->string('image');
    $table->integer('sort_order')->default(0);
    $table->timestamps();
});
```

#### `create_notices_table.php`
```php
Schema::create('notices', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('slug')->unique();
    $table->text('content');
    $table->boolean('is_urgent')->default(false);
    $table->string('attachment_path')->nullable();
    $table->timestamp('published_at');
    $table->timestamps();
});
```

#### `create_events_table.php`
```php
Schema::create('events', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('description');
    $table->string('location');
    $table->string('type'); // Academic, Social, Sports, etc.
    $table->time('starts_at');
    $table->date('event_date');
    $table->timestamps();
});
```

#### `create_albums_table.php`
```php
Schema::create('albums', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('slug')->unique();
    $table->text('description');
    $table->string('date'); // e.g. "October 15, 2024" or "Ongoing 2024"
    $table->string('youtube')->nullable(); // Embedded YouTube URL
    $table->json('images'); // Cast to array (list of image paths)
    $table->timestamps();
});
```

#### `create_leadership_messages_table.php`
```php
Schema::create('leadership_messages', function (Blueprint $table) {
    $table->id();
    $table->string('slug')->unique(); // 'principal', 'chairman', 'administration'
    $table->string('title');
    $table->string('author');
    $table->string('role');
    $table->string('image');
    $table->text('teaser');
    $table->json('paragraphs'); // Cast to array in model
    $table->string('date');
    $table->timestamps();
});
```

---

## 2. Eloquent Model Mappings

All models will reside in `app/Models/` and make use of Laravel's built-in casting features.

### `Facility.php`
```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = [
        'slug', 'title', 'tagline', 'icon', 'image', 'summary', 
        'description', 'features', 'coordinator', 'coordinator_role', 'specifications'
    ];

    protected $casts = [
        'features' => 'array',
        'specifications' => 'array',
    ];
}
```

### `Department.php`
```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'slug', 'icon', 'sort_order'];

    public function teachers()
    {
        return $this->hasMany(Teacher::class)->orderBy('sort_order');
    }
}
```

### `Teacher.php`
```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['department_id', 'name', 'title', 'credentials', 'image', 'sort_order'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
```

### `Notice.php`
```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'is_urgent', 'attachment_path', 'published_at'];

    protected $casts = [
        'published_at' => 'datetime',
        'is_urgent' => 'boolean',
    ];
}
```

### `Album.php`
```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'date', 'youtube', 'images'];

    protected $casts = [
        'images' => 'array',
    ];
}
```

### `LeadershipMessage.php`
```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadershipMessage extends Model
{
    protected $fillable = ['slug', 'title', 'author', 'role', 'image', 'teaser', 'paragraphs', 'date'];

    protected $casts = [
        'paragraphs' => 'array',
    ];
}
```

---

## 3. Database Seeders

We will update `DatabaseSeeder.php` to automatically read our mock datasets and insert them. This makes it effortless to populate the SQLite database.

```php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Facility;
use App\Models\Department;
use App\Models\Teacher;
use App\Models\Notice;
use App\Models\Event;
use App\Models\Album;
use App\Models\LeadershipMessage;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 1. Seed Facilities
        Facility::create([
            'slug' => 'science-lab',
            'title' => 'Science Laboratory',
            'tagline' => 'Fostering discovery through scientific inquiry.',
            'icon' => 'science',
            'image' => 'assets/images/img_a16209818b80.jpg',
            'summary' => 'Equipped with the latest research instruments and safety protocols for physics, chemistry, and biology.',
            'description' => 'Our state-of-the-art Science Laboratory provides students with the hands-on experience necessary to master complex scientific concepts...',
            'features' => ['Modern Microscopes', 'Interactive Smartboards', 'Advanced Chemical Safety Hoods', 'Physics Tinkering Kits'],
            'coordinator' => 'Dr. Rajesh Kumar',
            'coordinator_role' => 'Head of Science Dept.',
            'specifications' => [
                'Capacity' => '40 Students per session',
                'Safety Standards' => 'OSHA Compliant eyewash stations',
                'Focus Areas' => 'Physics experiments, Organic chemistry',
                'Access' => 'Grades 8 to 12'
            ]
        ]);
        // [Add remaining Facilities...]

        // 2. Seed Departments & Teachers
        $science = Department::create(['name' => 'Science & Technology', 'slug' => 'science', 'icon' => 'biotech', 'sort_order' => 1]);
        Teacher::create([
            'department_id' => $science->id,
            'name' => 'Dr. Rajesh Kumar',
            'title' => 'Head of Science Department',
            'credentials' => 'Ph.D. in Applied Physics, M.Sc.',
            'image' => 'assets/images/img_d9ddd9689325.jpg',
            'sort_order' => 1
        ]);
        // [Add remaining Departments & Teachers...]

        // 3. Seed Notices
        Notice::create([
            'title' => 'Winter Uniform Regulations Update',
            'slug' => 'winter-uniform-regulations',
            'content' => 'All students are required to transition to full winter uniforms by November 1st. Please visit the store...',
            'is_urgent' => true,
            'published_at' => now(),
        ]);
        // [Add remaining Notices...]

        // 4. Seed Events
        Event::create([
            'title' => 'Annual Science and Technology Fair 2024',
            'description' => 'Showcasing innovative projects from Grade 8-12 students.',
            'location' => 'Main Auditorium',
            'type' => 'Academic',
            'starts_at' => '10:00:00',
            'event_date' => '2024-10-15',
        ]);
        // [Add remaining Events...]

        // 5. Seed Albums
        Album::create([
            'slug' => 'science-fair-2024',
            'title' => 'Annual Science and Technology Fair 2024',
            'description' => 'Showcasing innovative projects from Grade 8-12 students...',
            'date' => 'October 15, 2024',
            'youtube' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'images' => [
                'assets/images/img_a16209818b80.jpg',
                'assets/images/img_1cd20bdb4292.jpg',
            ]
        ]);
        // [Add remaining Albums...]

        // 6. Seed Messages
        LeadershipMessage::create([
            'slug' => 'principal',
            'title' => 'Message from the Principal',
            'author' => 'Dr. Hemanta Raj Joshi',
            'role' => 'Principal',
            'image' => 'assets/images/img_f6a683a3ba3a.jpg',
            'teaser' => 'Education is not just about books; it\'s about building character...',
            'paragraphs' => [
                'Welcome to the official portal of Mahendra Secondary School. Since our founding in 1956, Jhapa...',
                'At Mahendra Secondary School, we are committed to providing a balanced environment...'
            ],
            'date' => 'July 1, 2024'
        ]);
        // [Add remaining Messages...]
    }
}
```

---

## 4. Administration Panel Design Options

To make the site fully manageable by administrative staff, we present two options:

### Option A: Filament v3 Admin Panel (Highly Recommended)
This utilizes the Livewire-based administration library to construct an elegant interface.

#### Commands to Install
```bash
# 1. Install Filament package
composer require filament/filament:"^3.2" -W

# 2. Run panel setup
php84 artisan filament:install --panels

# 3. Generate resources for models
php84 artisan make:filament-resource Notice --generate
php84 artisan make:filament-resource Event --generate
php84 artisan make:filament-resource Facility --generate
php84 artisan make:filament-resource Teacher --generate
php84 artisan make:filament-resource Album --generate
php84 artisan make:filament-resource LeadershipMessage --generate

# 4. Create admin user
php84 artisan make:filament-user
```
Filament resources automatically handle dynamic inputs, dates, urgencies, multi-file uploads (for Gallery images), and list formatting without needing custom views.

---

### Option B: Custom Blade CRUD Admin Panel
If you prefer not to add third-party dependencies, we will build a lightweight admin route block.

#### Route Definitions (`routes/web.php`)
```php
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('notices', AdminNoticeController::class);
    Route::resource('events', AdminEventController::class);
    Route::resource('facilities', AdminFacilityController::class);
    Route::resource('teachers', AdminTeacherController::class);
    Route::resource('albums', AdminAlbumController::class);
});
```
We will construct standard Blade forms with full CSS styling in `resources/views/admin/` to create, edit, and delete records, complete with image uploads saved in the Laravel public storage folder.

---

## 5. Execution Steps

1. **Verify Database Connection**: Initialize `database/database.sqlite` file if not present.
2. **Execute Migrations**: Run `php84 artisan migrate`.
3. **Execute Seeding**: Run `php84 artisan db:seed`.
4. **Refactor Page & Action Controllers**: Remove static array definitions from `FacilityController`, `GalleryController`, `MessageController`, and `PageController`, updating them to query the SQLite tables.
5. **Verify Views Rendering**: Access `/`, `/facilities`, `/gallery`, `/teachers`, and message detail subpages to confirm rendering is identical to mock data.
