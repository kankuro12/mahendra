@extends('admin.layouts.app')

@section('page-title', 'Create Facility')
@section('title', 'Create Facility - Admin')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
        <form method="POST" action="{{ route('admin.facilities.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="space-y-5">
                @include('admin._form_components', ['name' => 'title', 'label' => 'Title', 'required' => true, 'placeholder' => 'Facility title'])
                @include('admin._form_components', ['name' => 'tagline', 'label' => 'Tagline', 'placeholder' => 'Short description'])
                @include('admin._form_components', ['name' => 'icon', 'label' => 'Icon (Material Symbol name)', 'placeholder' => 'e.g. school, business'])
                @include('admin._form_components', ['name' => 'summary', 'label' => 'Summary', 'type' => 'textarea', 'placeholder' => 'Brief summary'])
                @include('admin._form_components', ['name' => 'description', 'label' => 'Description', 'type' => 'summernote'])
                @include('admin._form_components', ['name' => 'features', 'label' => 'Features (one per line)', 'type' => 'textarea', 'placeholder' => 'Feature 1\nFeature 2\nFeature 3'])
                @include('admin._form_components', ['name' => 'coordinator', 'label' => 'Coordinator Name', 'placeholder' => 'Full name'])
                @include('admin._form_components', ['name' => 'coordinator_role', 'label' => 'Coordinator Role', 'placeholder' => 'e.g. Head of Department'])
                @include('admin._form_components', ['name' => 'specifications', 'label' => 'Specifications (one per line)', 'type' => 'textarea', 'placeholder' => 'Spec 1\nSpec 2\nSpec 3'])
                @include('admin._form_components', ['name' => 'image', 'label' => 'Image', 'type' => 'file'])

                <div class="flex items-center gap-3 pt-3">
                    <button type="submit" class="px-5 py-2.5 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors">
                        Create Facility
                    </button>
                    <a href="{{ route('admin.facilities.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
