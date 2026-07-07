@extends('admin.layouts.app')

@section('page-title', 'Edit Album')
@section('title', 'Edit Album - Admin')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
        <form method="POST" action="{{ route('admin.albums.update', $album) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="space-y-5">
                @include('admin._form_components', ['name' => 'title', 'label' => 'Title', 'required' => true, 'value' => $album->title, 'placeholder' => 'Album title'])
                @include('admin._form_components', ['name' => 'description', 'label' => 'Description', 'type' => 'textarea', 'value' => $album->description, 'placeholder' => 'Album description'])
                @include('admin._form_components', ['name' => 'date', 'label' => 'Date', 'type' => 'date', 'value' => $album->date])
                @include('admin._form_components', ['name' => 'youtube', 'label' => 'YouTube URL', 'value' => $album->youtube, 'placeholder' => 'https://youtube.com/watch?v=...'])

                @if (is_array($album->images) && count($album->images))
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Current Images</label>
                        <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-2">
                            @foreach ($album->images as $index => $image)
                                <div class="relative group">
                                    <img src="{{ asset('storage/' . $image) }}" class="w-full h-20 rounded-lg object-cover">
                                    <a href="{{ route('admin.albums.images.destroy', [$album, $index]) }}"
                                        class="absolute -top-1.5 -right-1.5 w-5 h-5 bg-red-500 text-white rounded-full flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition-opacity"
                                        onclick="return confirm('Remove this image?')">&times;</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="space-y-1.5">
                    <label class="block text-sm font-medium text-gray-700">Add More Images</label>
                    <input type="file" name="images[]" id="images" class="dropify" multiple data-max-file-size="5M">
                    <p class="text-xs text-gray-400">Select additional images to add</p>
                </div>

                <div class="flex items-center gap-3 pt-3">
                    <button type="submit" class="px-5 py-2.5 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors">
                        Update Album
                    </button>
                    <a href="{{ route('admin.albums.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
