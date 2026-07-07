@extends('admin.layouts.app')

@section('page-title', 'Albums')
@section('title', 'Albums - Admin')

@section('content')
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-2">
            <button id="viewTable" class="view-toggle-btn active px-3 py-1.5 text-sm rounded-lg border">Table</button>
            <button id="viewCard" class="view-toggle-btn px-3 py-1.5 text-sm rounded-lg border">Cards</button>
        </div>
        <a href="{{ route('admin.albums.create') }}" class="px-4 py-2 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors flex items-center gap-1.5">
            <span class="material-symbols-outlined text-[18px]">add</span>
            New Album
        </a>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 p-5">
        <div id="tableView" class="active">
            <table class="data-table w-full">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Images</th>
                        <th>YouTube</th>
                        <th width="120">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($albums as $album)
                        <tr>
                            <td class="font-medium text-gray-900">{{ $album->title }}</td>
                            <td class="text-sm">{{ $album->date ? \Carbon\Carbon::parse($album->date)->format('M d, Y') : '--' }}</td>
                            <td class="text-sm">{{ is_countable($album->images) ? count($album->images) : 0 }} images</td>
                            <td>
                                @if ($album->youtube)
                                    <span class="text-xs text-gray-500">Yes</span>
                                @else
                                    <span class="text-gray-400 text-xs">--</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex items-center gap-1">
                                    <a href="{{ route('admin.albums.edit', $album) }}" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-[#b1002c]">
                                        <span class="material-symbols-outlined text-[18px]">edit</span>
                                    </a>
                                    <form method="POST" action="{{ route('admin.albums.destroy', $album) }}" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" data-confirm="Delete this album?" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-red-600">
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
            @forelse ($albums as $album)
                <div class="card-item bg-white border border-gray-200 rounded-xl p-4">
                    @php $firstImage = is_array($album->images) && count($album->images) > 0 ? $album->images[0] : null; @endphp
                    @if ($firstImage)
                        <img src="{{ asset('storage/' . $firstImage) }}" class="w-full h-36 rounded-lg object-cover mb-3">
                    @else
                        <div class="w-full h-36 rounded-lg bg-gray-100 flex items-center justify-center mb-3">
                            <span class="material-symbols-outlined text-3xl text-gray-300">photo_library</span>
                        </div>
                    @endif
                    <h4 class="font-medium text-gray-900 text-sm mb-1">{{ $album->title }}</h4>
                    <p class="text-xs text-gray-400">{{ is_countable($album->images) ? count($album->images) : 0 }} images</p>
                    <div class="flex items-center gap-2 mt-2">
                        <a href="{{ route('admin.albums.edit', $album) }}" class="px-3 py-1.5 bg-gray-50 text-gray-600 rounded-lg text-xs hover:bg-gray-100">Edit</a>
                        <form method="POST" action="{{ route('admin.albums.destroy', $album) }}" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" data-confirm="Delete this album?" class="px-3 py-1.5 bg-red-50 text-red-600 rounded-lg text-xs hover:bg-red-100">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-8 text-gray-400">
                    <span class="material-symbols-outlined text-4xl block mb-2">photo_album</span>
                    <p class="text-sm">No albums found.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
