@extends('admin.layouts.app')

@section('page-title', 'Create ' . ucfirst($type))
@section('title', 'Create ' . ucfirst($type) . ' - Admin')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
        <div class="mb-4">
            <a href="{{ route('admin.documents.index', ['type' => $type]) }}" class="text-sm text-gray-500 hover:text-[#b1002c]">&larr; Back to {{ ucfirst($type) }}s</a>
        </div>
        <form method="POST" action="{{ route('admin.documents.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="type" value="{{ $type }}">
            <div class="space-y-5">
                @include('admin._form_components', ['name' => 'title', 'label' => 'Title', 'required' => true, 'placeholder' => 'Document title'])

                @if ($type === 'tender')
                    @include('admin._form_components', ['name' => 'reference', 'label' => 'Reference Number', 'placeholder' => 'e.g. MSS/W/02-2024'])
                    @include('admin._form_components', ['name' => 'deadline', 'label' => 'Deadline', 'type' => 'date'])
                @endif

                @include('admin._form_components', ['name' => 'description', 'label' => 'Description', 'type' => 'textarea', 'placeholder' => 'Optional description'])
                @include('admin._form_components', ['name' => 'file', 'label' => 'File', 'type' => 'file', 'help' => 'PDF, DOC, or image files up to 10MB'])
                @include('admin._form_components', ['name' => 'sort_order', 'label' => 'Sort Order', 'type' => 'number', 'placeholder' => '0'])
                @include('admin._form_components', ['name' => 'published', 'label' => 'Status', 'type' => 'checkbox', 'value' => true, 'placeholder' => 'Published'])

                <div class="flex items-center gap-3 pt-3">
                    <button type="submit" class="px-5 py-2.5 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors">
                        Create {{ ucfirst($type) }}
                    </button>
                    <a href="{{ route('admin.documents.index', ['type' => $type]) }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
