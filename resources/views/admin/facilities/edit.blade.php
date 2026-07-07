@extends('admin.layouts.app')

@section('page-title', 'Edit Facility')
@section('title', 'Edit Facility - Admin')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
        <form method="POST" action="{{ route('admin.facilities.update', $facility) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="space-y-5">
                @include('admin._form_components', ['name' => 'title', 'label' => 'Title', 'required' => true, 'value' => $facility->title, 'placeholder' => 'Facility title'])
                @include('admin._form_components', ['name' => 'tagline', 'label' => 'Tagline', 'value' => $facility->tagline, 'placeholder' => 'Short description'])
                @include('admin._form_components', ['name' => 'icon', 'label' => 'Icon (Material Symbol name)', 'value' => $facility->icon, 'placeholder' => 'e.g. school, business'])
                @include('admin._form_components', ['name' => 'summary', 'label' => 'Summary', 'type' => 'textarea', 'value' => $facility->summary, 'placeholder' => 'Brief summary'])
                @include('admin._form_components', ['name' => 'description', 'label' => 'Description', 'type' => 'summernote', 'value' => $facility->description])
                @include('admin._form_components', ['name' => 'features', 'label' => 'Features (one per line)', 'type' => 'textarea', 'value' => is_array($facility->features) ? implode("\n", $facility->features) : $facility->features, 'placeholder' => 'Feature 1\nFeature 2'])
                @include('admin._form_components', ['name' => 'coordinator', 'label' => 'Coordinator Name', 'value' => $facility->coordinator, 'placeholder' => 'Full name'])
                @include('admin._form_components', ['name' => 'coordinator_role', 'label' => 'Coordinator Role', 'value' => $facility->coordinator_role, 'placeholder' => 'e.g. Head of Department'])
                @include('admin._form_components', ['name' => 'specifications', 'label' => 'Specifications (one per line)', 'type' => 'textarea', 'value' => is_array($facility->specifications) ? implode("\n", $facility->specifications) : $facility->specifications, 'placeholder' => 'Spec 1\nSpec 2'])
                @include('admin._form_components', ['name' => 'image', 'label' => 'Image', 'type' => 'file', 'value' => $facility->image])

                <div class="flex items-center gap-3 pt-3">
                    <button type="submit" class="px-5 py-2.5 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors">
                        Update Facility
                    </button>
                    <a href="{{ route('admin.facilities.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
