@extends('admin.layouts.app')

@section('page-title', 'Edit Event')
@section('title', 'Edit Event - Admin')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
        <form method="POST" action="{{ route('admin.events.update', $event) }}">
            @csrf @method('PUT')
            <div class="space-y-5">
                @include('admin._form_components', ['name' => 'title', 'label' => 'Title', 'required' => true, 'value' => $event->title, 'placeholder' => 'Event title'])
                @include('admin._form_components', ['name' => 'description', 'label' => 'Description', 'type' => 'textarea', 'value' => $event->description, 'placeholder' => 'Event description'])
                @include('admin._form_components', ['name' => 'location', 'label' => 'Location', 'value' => $event->location, 'placeholder' => 'Event venue'])
                @include('admin._form_components', ['name' => 'type', 'label' => 'Type', 'value' => $event->type, 'placeholder' => 'e.g. Sports, Cultural, Academic'])
                @include('admin._form_components', ['name' => 'event_date', 'label' => 'Event Date', 'type' => 'date', 'value' => $event->event_date])
                @include('admin._form_components', ['name' => 'starts_at', 'label' => 'Start Time', 'type' => 'time', 'value' => $event->starts_at])

                <div class="flex items-center gap-3 pt-3">
                    <button type="submit" class="px-5 py-2.5 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors">
                        Update Event
                    </button>
                    <a href="{{ route('admin.events.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
