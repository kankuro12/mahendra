@extends('admin.layouts.app')

@section('page-title', 'Events')
@section('title', 'Events - Admin')

@section('content')
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-2">
            <button id="viewTable" class="view-toggle-btn active px-3 py-1.5 text-sm rounded-lg border">Table</button>
            <button id="viewCard" class="view-toggle-btn px-3 py-1.5 text-sm rounded-lg border">Cards</button>
        </div>
        <a href="{{ route('admin.events.create') }}" class="px-4 py-2 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors flex items-center gap-1.5">
            <span class="material-symbols-outlined text-[18px]">add</span>
            New Event
        </a>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 p-5">
        <div id="tableView" class="active">
            <table class="data-table w-full">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th width="120">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td class="font-medium text-gray-900">{{ $event->title }}</td>
                            <td><span class="px-2 py-0.5 bg-gray-100 text-gray-600 rounded text-xs">{{ $event->type ?? 'General' }}</span></td>
                            <td class="text-sm text-gray-500">{{ $event->location ?? '--' }}</td>
                            <td class="text-sm">{{ $event->event_date?->format('M d, Y') }}</td>
                            <td class="text-sm">{{ $event->starts_at ? \Carbon\Carbon::parse($event->starts_at)->format('h:i A') : '--' }}</td>
                            <td>
                                <div class="flex items-center gap-1">
                                    <a href="{{ route('admin.events.edit', $event) }}" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-[#b1002c]">
                                        <span class="material-symbols-outlined text-[18px]">edit</span>
                                    </a>
                                    <form method="POST" action="{{ route('admin.events.destroy', $event) }}" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" data-confirm="Delete this event?" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-red-600">
                                            <span class="material-symbols-outlined text-[18px]">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="cardView" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse ($events as $event)
                <div class="card-item bg-white border border-gray-200 rounded-xl p-4">
                    <div class="flex items-start justify-between mb-2">
                        <h4 class="font-medium text-gray-900 text-sm">{{ $event->title }}</h4>
                        <span class="px-2 py-0.5 bg-gray-100 text-gray-600 rounded text-xs">{{ $event->type ?? 'General' }}</span>
                    </div>
                    @if ($event->location)
                        <p class="text-xs text-gray-500 mb-1">
                            <span class="material-symbols-outlined text-[14px] align-middle">location_on</span>
                            {{ $event->location }}
                        </p>
                    @endif
                    <p class="text-xs text-gray-400">
                        {{ $event->event_date?->format('M d, Y') }}
                        @if ($event->starts_at) at {{ \Carbon\Carbon::parse($event->starts_at)->format('h:i A') }} @endif
                    </p>
                    <div class="flex items-center gap-2 mt-3">
                        <a href="{{ route('admin.events.edit', $event) }}" class="px-3 py-1.5 bg-gray-50 text-gray-600 rounded-lg text-xs hover:bg-gray-100">Edit</a>
                        <form method="POST" action="{{ route('admin.events.destroy', $event) }}" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" data-confirm="Delete this event?" class="px-3 py-1.5 bg-red-50 text-red-600 rounded-lg text-xs hover:bg-red-100">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-8 text-gray-400">
                    <span class="material-symbols-outlined text-4xl block mb-2">event</span>
                    <p class="text-sm">No events found.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
