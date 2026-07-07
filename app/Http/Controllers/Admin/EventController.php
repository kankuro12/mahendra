<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        return view('admin.events.index', [
            'events' => Event::latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.events.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'location' => 'nullable|max:255',
            'type' => 'nullable|max:255',
            'starts_at' => 'nullable',
            'event_date' => 'nullable|date',
        ]);

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
    }

    public function edit(Event $event): View
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'location' => 'nullable|max:255',
            'type' => 'nullable|max:255',
            'starts_at' => 'nullable',
            'event_date' => 'nullable|date',
        ]);

        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event): RedirectResponse
    {
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }
}
