@extends('admin.layouts.app')

@section('page-title', 'Leadership Messages')
@section('title', 'Messages - Admin')

@section('content')
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-2">
            <button id="viewTable" class="view-toggle-btn active px-3 py-1.5 text-sm rounded-lg border">Table</button>
            <button id="viewCard" class="view-toggle-btn px-3 py-1.5 text-sm rounded-lg border">Cards</button>
        </div>
        <a href="{{ route('admin.messages.create') }}" class="px-4 py-2 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors flex items-center gap-1.5">
            <span class="material-symbols-outlined text-[18px]">add</span>
            New Message
        </a>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 p-5">
        <div id="tableView" class="active">
            <table class="data-table w-full">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Role</th>
                        <th>Date</th>
                        <th width="120">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td class="font-medium text-gray-900">{{ $message->title }}</td>
                            <td class="text-sm">{{ $message->author }}</td>
                            <td class="text-sm text-gray-500">{{ $message->role }}</td>
                            <td class="text-sm">{{ $message->date ? \Carbon\Carbon::parse($message->date)->format('M d, Y') : '--' }}</td>
                            <td>
                                <div class="flex items-center gap-1">
                                    <a href="{{ route('admin.messages.edit', $message) }}" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-[#b1002c]">
                                        <span class="material-symbols-outlined text-[18px]">edit</span>
                                    </a>
                                    <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" data-confirm="Delete this message?" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-red-600">
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
            @forelse ($messages as $message)
                <div class="card-item bg-white border border-gray-200 rounded-xl p-4">
                    @if ($message->image)
                        <img src="{{ asset('storage/' . $message->image) }}" class="w-16 h-16 rounded-full object-cover mb-3">
                    @endif
                    <h4 class="font-medium text-gray-900 text-sm mb-1">{{ $message->title }}</h4>
                    <p class="text-xs text-gray-500">{{ $message->author }} @if($message->role) &middot; {{ $message->role }} @endif</p>
                    <div class="flex items-center gap-2 mt-3">
                        <a href="{{ route('admin.messages.edit', $message) }}" class="px-3 py-1.5 bg-gray-50 text-gray-600 rounded-lg text-xs hover:bg-gray-100">Edit</a>
                        <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" data-confirm="Delete this message?" class="px-3 py-1.5 bg-red-50 text-red-600 rounded-lg text-xs hover:bg-red-100">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-8 text-gray-400">
                    <span class="material-symbols-outlined text-4xl block mb-2">message</span>
                    <p class="text-sm">No messages found.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
