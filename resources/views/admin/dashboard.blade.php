@extends('admin.layouts.app')

@section('page-title', 'Dashboard')
@section('title', 'Dashboard - Admin')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 mb-6">
        <div class="bg-white rounded-xl border border-gray-200 p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Notices</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $noticesCount }}</p>
                </div>
                <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
                    <span class="material-symbols-outlined">campaign</span>
                </div>
            </div>
            <a href="{{ route('admin.notices.index') }}" class="text-xs text-[#b1002c] mt-3 inline-block hover:underline">View all &rarr;</a>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Facilities</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $facilitiesCount }}</p>
                </div>
                <div class="w-10 h-10 rounded-lg bg-green-50 text-green-600 flex items-center justify-center">
                    <span class="material-symbols-outlined">business</span>
                </div>
            </div>
            <a href="{{ route('admin.facilities.index') }}" class="text-xs text-[#b1002c] mt-3 inline-block hover:underline">View all &rarr;</a>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Albums</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $albumsCount }}</p>
                </div>
                <div class="w-10 h-10 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center">
                    <span class="material-symbols-outlined">photo_album</span>
                </div>
            </div>
            <a href="{{ route('admin.albums.index') }}" class="text-xs text-[#b1002c] mt-3 inline-block hover:underline">View all &rarr;</a>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Messages</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $messagesCount }}</p>
                </div>
                <div class="w-10 h-10 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center">
                    <span class="material-symbols-outlined">message</span>
                </div>
            </div>
            <a href="{{ route('admin.messages.index') }}" class="text-xs text-[#b1002c] mt-3 inline-block hover:underline">View all &rarr;</a>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Teachers</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $teachersCount }}</p>
                </div>
                <div class="w-10 h-10 rounded-lg bg-rose-50 text-rose-600 flex items-center justify-center">
                    <span class="material-symbols-outlined">school</span>
                </div>
            </div>
            <a href="{{ route('admin.teachers.index') }}" class="text-xs text-[#b1002c] mt-3 inline-block hover:underline">View all &rarr;</a>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Events</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $eventsCount }}</p>
                </div>
                <div class="w-10 h-10 rounded-lg bg-cyan-50 text-cyan-600 flex items-center justify-center">
                    <span class="material-symbols-outlined">event</span>
                </div>
            </div>
            <a href="{{ route('admin.events.index') }}" class="text-xs text-[#b1002c] mt-3 inline-block hover:underline">View all &rarr;</a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl border border-gray-200 p-5">
            <h3 class="font-semibold text-gray-900 mb-3">Recent Notices</h3>
            @if ($recentNotices->count())
                <div class="space-y-2">
                    @foreach ($recentNotices as $notice)
                        <div class="flex items-center justify-between py-2 border-b border-gray-100 last:border-0">
                            <div class="flex items-center gap-2 min-w-0">
                                @if ($notice->is_urgent)
                                    <span class="w-2 h-2 rounded-full bg-red-500 flex-shrink-0"></span>
                                @endif
                                <span class="text-sm text-gray-700 truncate">{{ $notice->title }}</span>
                            </div>
                            <span class="text-xs text-gray-400 flex-shrink-0">{{ $notice->published_at?->format('M d, Y') }}</span>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-sm text-gray-400">No notices yet.</p>
            @endif
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-5">
            <h3 class="font-semibold text-gray-900 mb-3">Upcoming Events</h3>
            @if ($upcomingEvents->count())
                <div class="space-y-2">
                    @foreach ($upcomingEvents as $event)
                        <div class="flex items-center justify-between py-2 border-b border-gray-100 last:border-0">
                            <span class="text-sm text-gray-700">{{ $event->title }}</span>
                            <span class="text-xs text-gray-400">{{ $event->event_date?->format('M d, Y') }}</span>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-sm text-gray-400">No upcoming events.</p>
            @endif
        </div>
    </div>
@endsection
