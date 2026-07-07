@extends('admin.layouts.app')

@section('page-title', 'Create Event')
@section('title', 'Create Event - Admin')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
        <form method="POST" action="{{ route('admin.events.store') }}">
            @csrf
            <div class="space-y-5">
                @include('admin._form_components', ['name' => 'title', 'label' => 'Title', 'required' => true, 'placeholder' => 'Event title'])
                @include('admin._form_components', ['name' => 'description', 'label' => 'Description', 'type' => 'textarea', 'placeholder' => 'Event description'])
                @include('admin._form_components', ['name' => 'location', 'label' => 'Location', 'placeholder' => 'Event venue'])
                @include('admin._form_components', ['name' => 'type', 'label' => 'Type', 'placeholder' => 'e.g. Sports, Cultural, Academic'])
                @include('admin._form_components', ['name' => 'event_date', 'label' => 'Event Date', 'type' => 'date'])
                @include('admin._form_components', ['name' => 'starts_at', 'label' => 'Start Time', 'type' => 'time'])

                <div class="flex items-center gap-3 pt-3">
                    <button type="submit" class="px-5 py-2.5 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors">
                        Create Event
                    </button>
                    <a href="{{ route('admin.events.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
