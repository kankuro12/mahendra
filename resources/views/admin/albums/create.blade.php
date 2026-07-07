@extends('admin.layouts.app')

@section('page-title', 'Create Album')
@section('title', 'Create Album - Admin')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
        <form method="POST" action="{{ route('admin.albums.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="space-y-5">
                @include('admin._form_components', ['name' => 'title', 'label' => 'Title', 'required' => true, 'placeholder' => 'Album title'])
                @include('admin._form_components', ['name' => 'poster', 'label' => 'Poster Image', 'type' => 'file', 'help' => 'Square or landscape image recommended. If not set, first gallery item image will be used.'])
                @include('admin._form_components', ['name' => 'description', 'label' => 'Description', 'type' => 'textarea', 'placeholder' => 'Album description'])
                @include('admin._form_components', ['name' => 'date', 'label' => 'Date', 'type' => 'date'])

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
