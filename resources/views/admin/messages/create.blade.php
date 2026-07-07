@extends('admin.layouts.app')

@section('page-title', 'Create Message')
@section('title', 'Create Message - Admin')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
        <form method="POST" action="{{ route('admin.messages.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="space-y-5">
                @include('admin._form_components', ['name' => 'title', 'label' => 'Title', 'required' => true, 'placeholder' => 'Message title'])
                @include('admin._form_components', ['name' => 'author', 'label' => 'Author', 'required' => true, 'placeholder' => 'Full name'])
                @include('admin._form_components', ['name' => 'role', 'label' => 'Role', 'placeholder' => 'e.g. Principal, Vice Principal'])
                @include('admin._form_components', ['name' => 'teaser', 'label' => 'Teaser', 'type' => 'textarea', 'placeholder' => 'Short teaser for cards'])
                @include('admin._form_components', ['name' => 'paragraphs', 'label' => 'Content (separate paragraphs with ---)', 'type' => 'summernote'])
                @include('admin._form_components', ['name' => 'date', 'label' => 'Date', 'type' => 'date'])
                @include('admin._form_components', ['name' => 'image', 'label' => 'Profile Image', 'type' => 'file'])

                <div class="flex items-center gap-3 pt-3">
                    <button type="submit" class="px-5 py-2.5 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors">
                        Create Message
                    </button>
                    <a href="{{ route('admin.messages.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
