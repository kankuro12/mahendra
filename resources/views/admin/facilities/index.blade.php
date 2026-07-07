@extends('admin.layouts.app')

@section('page-title', 'Facilities')
@section('title', 'Facilities - Admin')

@section('content')
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-2">
            <button id="viewTable" class="view-toggle-btn active px-3 py-1.5 text-sm rounded-lg border">Table</button>
            <button id="viewCard" class="view-toggle-btn px-3 py-1.5 text-sm rounded-lg border">Cards</button>
        </div>
        <a href="{{ route('admin.facilities.create') }}" class="px-4 py-2 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors flex items-center gap-1.5">
            <span class="material-symbols-outlined text-[18px]">add</span>
            New Facility
        </a>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 p-5">
        <div id="tableView" class="active">
            <table class="data-table w-full">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Tagline</th>
                        <th>Image</th>
                        <th width="120">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facilities as $facility)
                        <tr>
                            <td class="font-medium text-gray-900">{{ $facility->title }}</td>
                            <td class="text-sm text-gray-500">{{ Str::limit($facility->tagline, 40) }}</td>
                            <td>
                                @if ($facility->image)
                                    <img src="{{ asset('storage/' . $facility->image) }}" class="w-12 h-12 rounded-lg object-cover">
                                @else
                                    <span class="text-gray-400 text-xs">--</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex items-center gap-1">
                                    <a href="{{ route('admin.facilities.edit', $facility) }}" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-[#b1002c]">
                                        <span class="material-symbols-outlined text-[18px]">edit</span>
                                    </a>
                                    <form method="POST" action="{{ route('admin.facilities.destroy', $facility) }}" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" data-confirm="Delete this facility?" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-red-600">
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
            @forelse ($facilities as $facility)
                <div class="card-item bg-white border border-gray-200 rounded-xl p-4">
                    @if ($facility->image)
                        <img src="{{ asset('storage/' . $facility->image) }}" class="w-full h-36 rounded-lg object-cover mb-3">
                    @endif
                    <h4 class="font-medium text-gray-900 text-sm mb-1">{{ $facility->title }}</h4>
                    @if ($facility->tagline)
                        <p class="text-xs text-gray-400 mb-3">{{ Str::limit($facility->tagline, 60) }}</p>
                    @endif
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.facilities.edit', $facility) }}" class="px-3 py-1.5 bg-gray-50 text-gray-600 rounded-lg text-xs hover:bg-gray-100">Edit</a>
                        <form method="POST" action="{{ route('admin.facilities.destroy', $facility) }}" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" data-confirm="Delete this facility?" class="px-3 py-1.5 bg-red-50 text-red-600 rounded-lg text-xs hover:bg-red-100">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-8 text-gray-400">
                    <span class="material-symbols-outlined text-4xl block mb-2">business</span>
                    <p class="text-sm">No facilities found.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
