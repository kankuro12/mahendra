@extends('admin.layouts.app')

@section('page-title', 'Notices')
@section('title', 'Notices - Admin')

@section('content')
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-2">
            <button id="viewTable" class="view-toggle-btn active px-3 py-1.5 text-sm rounded-lg border">Table</button>
            <button id="viewCard" class="view-toggle-btn px-3 py-1.5 text-sm rounded-lg border">Cards</button>
        </div>
        <a href="{{ route('admin.notices.create') }}" class="px-4 py-2 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors flex items-center gap-1.5">
            <span class="material-symbols-outlined text-[18px]">add</span>
            New Notice
        </a>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 p-5">
        <div id="tableView" class="active">
            <table class="data-table w-full">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Urgent</th>
                        <th>Published</th>
                        <th>Attachment</th>
                        <th width="120">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notices as $notice)
                        <tr>
                            <td class="font-medium text-gray-900">{{ $notice->title }}</td>
                            <td>
                                @if ($notice->is_urgent)
                                    <span class="px-2 py-0.5 bg-red-50 text-red-600 rounded text-xs font-medium">Urgent</span>
                                @else
                                    <span class="text-gray-400 text-xs">No</span>
                                @endif
                            </td>
                            <td class="text-sm">{{ $notice->published_at?->format('M d, Y') }}</td>
                            <td>
                                @if ($notice->attachment_path)
                                    <a href="{{ asset('storage/' . $notice->attachment_path) }}" target="_blank" class="text-[#b1002c] text-xs hover:underline">View</a>
                                @else
                                    <span class="text-gray-400 text-xs">--</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex items-center gap-1">
                                    <a href="{{ route('admin.notices.edit', $notice) }}" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-[#b1002c]">
                                        <span class="material-symbols-outlined text-[18px]">edit</span>
                                    </a>
                                    <form method="POST" action="{{ route('admin.notices.destroy', $notice) }}" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" data-confirm="Delete this notice?" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-red-600">
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
            @forelse ($notices as $notice)
                <div class="card-item bg-white border border-gray-200 rounded-xl p-4">
                    <div class="flex items-start justify-between mb-2">
                        <h4 class="font-medium text-gray-900 text-sm">{{ $notice->title }}</h4>
                        @if ($notice->is_urgent)
                            <span class="px-2 py-0.5 bg-red-50 text-red-600 rounded text-xs font-medium flex-shrink-0">Urgent</span>
                        @endif
                    </div>
                    <p class="text-xs text-gray-400 mb-3">{{ $notice->published_at?->format('M d, Y') }}</p>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.notices.edit', $notice) }}" class="px-3 py-1.5 bg-gray-50 text-gray-600 rounded-lg text-xs hover:bg-gray-100">Edit</a>
                        <form method="POST" action="{{ route('admin.notices.destroy', $notice) }}" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" data-confirm="Delete this notice?" class="px-3 py-1.5 bg-red-50 text-red-600 rounded-lg text-xs hover:bg-red-100">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-8 text-gray-400">
                    <span class="material-symbols-outlined text-4xl block mb-2">campaign</span>
                    <p class="text-sm">No notices found. Create your first notice!</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
