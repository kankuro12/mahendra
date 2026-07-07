@extends('admin.layouts.app')

@section('page-title', "Edit Item in $album->title")
@section('title', 'Edit Gallery Item - Admin')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-2xl">
        <div class="mb-4">
            <a href="{{ route('admin.albums.items.index', $album) }}" class="text-sm text-gray-500 hover:text-[#b1002c]">&larr; Back to items</a>
            <h2 class="text-lg font-semibold text-gray-800 mt-1">Edit Item in "{{ $album->title }}"</h2>
        </div>

        <form method="POST" action="{{ route('admin.albums.items.update', [$album, $item]) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="space-y-5">
                <div class="space-y-1.5">
                    <label for="type" class="block text-sm font-medium text-gray-700">Type <span class="text-red-500">*</span></label>
                    <select name="type" id="type" required
                        class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none text-sm"
                        onchange="toggleFields()">
                        <option value="image" {{ old('type', $item->type) === 'image' ? 'selected' : '' }}>Image</option>
                        <option value="youtube" {{ old('type', $item->type) === 'youtube' ? 'selected' : '' }}>YouTube Video</option>
                    </select>
                    @error('type')<p class="text-xs text-red-500">{{ $message }}</p>@enderror
                </div>

                <div id="imageField" class="space-y-1.5" {{ $item->type !== 'image' ? 'style=display:none;' : '' }}>
                    <label for="photopath" class="block text-sm font-medium text-gray-700">Image</label>
                    @if ($item->photopath)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $item->photopath) }}" class="w-32 h-24 rounded-lg object-cover">
                        </div>
                    @endif
                    <input type="file" name="photopath" id="photopath" class="dropify" data-max-file-size="5M"
                        data-default-file="{{ $item->photopath ? asset('storage/' . $item->photopath) : '' }}">
                    @error('photopath')<p class="text-xs text-red-500">{{ $message }}</p>@enderror
                </div>

                <div id="youtubeField" class="space-y-1.5" {{ $item->type !== 'youtube' ? 'style=display:none;' : '' }}>
                    <label for="youtube_link" class="block text-sm font-medium text-gray-700">YouTube URL</label>
                    <input type="url" name="youtube_link" id="youtube_link" value="{{ old('youtube_link', $item->youtube_link) }}"
                        class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none text-sm"
                        placeholder="https://www.youtube.com/watch?v=...">
                    @error('youtube_link')<p class="text-xs text-red-500">{{ $message }}</p>@enderror
                </div>

                @include('admin._form_components', ['name' => 'sort_order', 'label' => 'Sort Order', 'type' => 'number', 'value' => $item->sort_order, 'placeholder' => '0'])

                <div class="flex items-center gap-3 pt-3">
                    <button type="submit" class="px-5 py-2.5 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors">
                        Update Item
                    </button>
                    <a href="{{ route('admin.albums.items.index', $album) }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>

    <script>
        function toggleFields() {
            var type = document.getElementById('type').value;
            document.getElementById('imageField').style.display = type === 'image' ? '' : 'none';
            document.getElementById('youtubeField').style.display = type === 'youtube' ? '' : 'none';
        }
    </script>
@endsection
