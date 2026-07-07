@extends('admin.layouts.app')

@section('page-title', 'Edit Album')
@section('title', 'Edit Album - Admin')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
        <div class="flex items-center justify-between mb-4">
            <div>
                <a href="{{ route('admin.albums.index') }}" class="text-sm text-gray-500 hover:text-[#b1002c]">&larr; Back to Albums</a>
            </div>
            <a href="{{ route('admin.albums.items.index', $album) }}" class="px-3 py-1.5 bg-green-50 text-green-600 rounded-lg text-sm hover:bg-green-100 flex items-center gap-1.5">
                <span class="material-symbols-outlined text-[16px]">grid_view</span>
                Manage Items
            </a>
        </div>
        <form method="POST" action="{{ route('admin.albums.update', $album) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="space-y-5">
                @include('admin._form_components', ['name' => 'title', 'label' => 'Title', 'required' => true, 'value' => $album->title, 'placeholder' => 'Album title'])
                @include('admin._form_components', ['name' => 'poster', 'label' => 'Poster Image', 'type' => 'file', 'value' => $album->poster, 'help' => 'Square or landscape image recommended. Leave empty to keep current.'])
                @include('admin._form_components', ['name' => 'description', 'label' => 'Description', 'type' => 'textarea', 'value' => $album->description, 'placeholder' => 'Album description'])
                @include('admin._form_components', ['name' => 'date', 'label' => 'Date', 'type' => 'date', 'value' => $album->date])

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
