@extends('admin.layouts.app')

@section('page-title', 'Edit Message')
@section('title', 'Edit Message - Admin')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
        <form method="POST" action="{{ route('admin.messages.update', $message) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="space-y-5">
                @include('admin._form_components', ['name' => 'title', 'label' => 'Title', 'required' => true, 'value' => $message->title, 'placeholder' => 'Message title'])
                @include('admin._form_components', ['name' => 'author', 'label' => 'Author', 'required' => true, 'value' => $message->author, 'placeholder' => 'Full name'])
                @include('admin._form_components', ['name' => 'role', 'label' => 'Role', 'value' => $message->role, 'placeholder' => 'e.g. Principal'])
                @include('admin._form_components', ['name' => 'teaser', 'label' => 'Teaser', 'type' => 'textarea', 'value' => $message->teaser, 'placeholder' => 'Short teaser for cards'])
                @include('admin._form_components', ['name' => 'paragraphs', 'label' => 'Content', 'type' => 'summernote', 'value' => $message->paragraphs])
                @include('admin._form_components', ['name' => 'date', 'label' => 'Date', 'type' => 'date', 'value' => $message->date])
                @include('admin._form_components', ['name' => 'image', 'label' => 'Profile Image', 'type' => 'file', 'value' => $message->image])

                <div class="flex items-center gap-3 pt-3">
                    <button type="submit" class="px-5 py-2.5 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors">
                        Update Message
                    </button>
                    <a href="{{ route('admin.messages.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
