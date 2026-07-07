@extends('admin.layouts.app')

@section('page-title', "Gallery Items: $album->title")
@section('title', 'Gallery Items - Admin')

@section('content')
    <div class="flex items-center justify-between mb-4">
        <div>
            <a href="{{ route('admin.albums.index') }}" class="text-sm text-gray-500 hover:text-[#b1002c]">&larr; Back to Albums</a>
            <h2 class="text-lg font-semibold text-gray-800 mt-1">{{ $album->title }} — Items</h2>
        </div>
        <a href="{{ route('admin.albums.items.create', $album) }}" class="px-4 py-2 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors flex items-center gap-1.5">
            <span class="material-symbols-outlined text-[18px]">add</span>
            Add Item
        </a>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 p-5">
        @if ($items->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($items as $item)
                    <div class="relative group bg-white border border-gray-200 rounded-xl overflow-hidden">
                        @if ($item->type === 'image' && $item->photopath)
                            <img src="{{ asset('storage/' . $item->photopath) }}" class="w-full h-40 object-cover">
                        @elseif ($item->type === 'youtube' && $item->youtube_link)
                            <div class="w-full h-40 bg-gray-900 flex items-center justify-center">
                                <span class="material-symbols-outlined text-4xl text-white/60">play_circle</span>
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="{{ $item->youtube_link }}" target="_blank" class="px-3 py-1.5 bg-white text-gray-900 rounded-lg text-xs font-medium">Watch</a>
                            </div>
                        @else
                            <div class="w-full h-40 bg-gray-100 flex items-center justify-center">
                                <span class="material-symbols-outlined text-3xl text-gray-300">broken_image</span>
                            </div>
                        @endif

                        <div class="p-3">
                            <span class="inline-block px-2 py-0.5 text-xs rounded {{ $item->type === 'image' ? 'bg-blue-50 text-blue-600' : 'bg-red-50 text-red-600' }}">
                                {{ $item->type }}
                            </span>
                            <span class="text-xs text-gray-400 ml-2">Order: {{ $item->sort_order }}</span>
                        </div>

                        <div class="absolute top-2 right-2 flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                            <a href="{{ route('admin.albums.items.edit', [$album, $item]) }}"
                                class="w-8 h-8 bg-white rounded-lg shadow flex items-center justify-center text-gray-600 hover:text-[#b1002c]">
                                <span class="material-symbols-outlined text-[16px]">edit</span>
                            </a>
                            <form method="POST" action="{{ route('admin.albums.items.destroy', [$album, $item]) }}" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" data-confirm="Remove this item?"
                                    class="w-8 h-8 bg-white rounded-lg shadow flex items-center justify-center text-gray-600 hover:text-red-600">
                                    <span class="material-symbols-outlined text-[16px]">delete</span>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12 text-gray-400">
                <span class="material-symbols-outlined text-5xl block mb-3">photo_library</span>
                <p class="text-sm mb-4">No items in this album yet.</p>
                <a href="{{ route('admin.albums.items.create', $album) }}" class="px-4 py-2 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] inline-block">
                    Add First Item
                </a>
            </div>
        @endif
    </div>
@endsection
