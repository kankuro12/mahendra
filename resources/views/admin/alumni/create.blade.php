@extends('admin.layouts.app')

@section('page-title', 'Create Alumni')
@section('title', 'Create Alumni - Admin')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
        <form method="POST" action="{{ route('admin.alumni.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="space-y-5">
                @include('admin._form_components', ['name' => 'name', 'label' => 'Name', 'required' => true, 'placeholder' => 'Full name'])
                @include('admin._form_components', ['name' => 'graduation_year', 'label' => 'Graduation Year', 'type' => 'number', 'placeholder' => 'e.g. 2010'])
                @include('admin._form_components', ['name' => 'occupation', 'label' => 'Occupation', 'placeholder' => 'e.g. Software Engineer'])
                @include('admin._form_components', ['name' => 'location', 'label' => 'Location', 'placeholder' => 'e.g. Kathmandu, Nepal'])
                @include('admin._form_components', ['name' => 'email', 'label' => 'Email', 'type' => 'email', 'placeholder' => 'email@example.com'])
                @include('admin._form_components', ['name' => 'image', 'label' => 'Photo', 'type' => 'file'])
                @include('admin._form_components', ['name' => 'story', 'label' => 'Story', 'type' => 'textarea', 'placeholder' => 'Brief story about this alumni'])
                @include('admin._form_components', ['name' => 'facebook', 'label' => 'Facebook URL', 'placeholder' => 'https://facebook.com/...'])
                @include('admin._form_components', ['name' => 'linkedin', 'label' => 'LinkedIn URL', 'placeholder' => 'https://linkedin.com/in/...'])
                <div class="grid grid-cols-3 gap-4">
                    @include('admin._form_components', ['name' => 'is_featured', 'label' => 'Featured', 'type' => 'checkbox', 'value' => true, 'placeholder' => 'Show on homepage'])
                    @include('admin._form_components', ['name' => 'published', 'label' => 'Published', 'type' => 'checkbox', 'value' => true, 'placeholder' => 'Published'])
                    @include('admin._form_components', ['name' => 'sort_order', 'label' => 'Sort Order', 'type' => 'number', 'placeholder' => '0'])
                </div>
                <div class="flex items-center gap-3 pt-3">
                    <button type="submit" class="px-5 py-2.5 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors">Create Alumni</button>
                    <a href="{{ route('admin.alumni.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection
