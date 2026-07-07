@extends('admin.layouts.app')

@section('page-title', 'Alumni Page Settings')
@section('title', 'Alumni Settings - Admin')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-4xl">
        <form method="POST" action="{{ route('admin.alumni-settings.update') }}" enctype="multipart/form-data">
            @csrf @method('PUT')

            <h3 class="text-base font-semibold text-gray-900 mb-4">Hero Section</h3>
            <div class="space-y-4 mb-8">
                @include('admin._form_components', ['name' => 'hero_title', 'label' => 'Hero Title', 'value' => $hero_title, 'placeholder' => 'Celebrating Our Global Alumni Network'])
                @include('admin._form_components', ['name' => 'hero_subtitle', 'label' => 'Hero Subtitle', 'type' => 'textarea', 'value' => $hero_subtitle, 'placeholder' => 'From community leaders...'])
                <div class="space-y-1.5">
                    <label class="block text-sm font-medium text-gray-700">Hero Background Image</label>
                    <input type="file" name="hero_image" class="dropify"
                        data-default-file="{{ str_starts_with($hero_image, 'alumni/') ? asset('storage/' . $hero_image) : asset($hero_image) }}">
                </div>
            </div>

            <h3 class="text-base font-semibold text-gray-900 mb-4">Statistics</h3>
            <div class="grid grid-cols-2 gap-4 mb-8">
                @include('admin._form_components', ['name' => 'stat_countries', 'label' => 'Countries Value', 'value' => $stat_countries, 'placeholder' => '50+'])
                @include('admin._form_components', ['name' => 'stat_countries_label', 'label' => 'Countries Label', 'value' => $stat_countries_label, 'placeholder' => 'Countries Represented'])
                @include('admin._form_components', ['name' => 'stat_members', 'label' => 'Members Value', 'value' => $stat_members, 'placeholder' => '15,000+'])
                @include('admin._form_components', ['name' => 'stat_members_label', 'label' => 'Members Label', 'value' => $stat_members_label, 'placeholder' => 'Active Members'])
                @include('admin._form_components', ['name' => 'stat_scholarships', 'label' => 'Scholarships Value', 'value' => $stat_scholarships, 'placeholder' => '200+'])
                @include('admin._form_components', ['name' => 'stat_scholarships_label', 'label' => 'Scholarships Label', 'value' => $stat_scholarships_label, 'placeholder' => 'Scholarships Funded'])
                @include('admin._form_components', ['name' => 'stat_years', 'label' => 'Years Value', 'value' => $stat_years, 'placeholder' => '60 Years'])
                @include('admin._form_components', ['name' => 'stat_years_label', 'label' => 'Years Label', 'value' => $stat_years_label, 'placeholder' => 'of Academic Legacy'])
            </div>

            <div class="flex items-center gap-3 pt-6 border-t border-gray-200">
                <button type="submit" class="px-5 py-2.5 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors">Save Settings</button>
            </div>
        </form>
    </div>
@endsection
