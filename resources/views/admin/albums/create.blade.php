@extends('admin.layouts.app')

@section('page-title', 'Create Album')
@section('title', 'Create Album - Admin')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
        <form method="POST" action="{{ route('admin.albums.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="space-y-5">
                @include('admin._form_components', ['name' => 'title', 'label' => 'Title', 'required' => true, 'placeholder' => 'Album title'])
                @include('admin._form_components', ['name' => 'description', 'label' => 'Description', 'type' => 'textarea', 'placeholder' => 'Album description'])
                @include('admin._form_components', ['name' => 'date', 'label' => 'Date', 'type' => 'date'])
                @include('admin._form_components', ['name' => 'youtube', 'label' => 'YouTube URL', 'placeholder' => 'https://youtube.com/watch?v=...', 'help' => 'Optional YouTube video URL'])

                <div class="space-y-1.5">
                    <label class="block text-sm font-medium text-gray-700">Images <span class="text-red-500">*</span></label>
                    <input type="file" name="images[]" id="images" class="dropify" multiple data-max-file-size="5M" required>
                    <p class="text-xs text-gray-400">You can select multiple images at once</p>
                    @error('images')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center gap-3 pt-3">
                    <button type="submit" class="px-5 py-2.5 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors">
                        Create Album
                    </button>
                    <a href="{{ route('admin.albums.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
