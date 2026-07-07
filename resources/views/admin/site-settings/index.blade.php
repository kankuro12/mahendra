@extends('admin.layouts.app')

@section('page-title', 'Site Settings')
@section('title', 'Site Settings - Admin')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-4xl">
        <form method="POST" action="{{ route('admin.site-settings.update') }}">
            @csrf @method('PUT')

            <h3 class="text-base font-semibold text-gray-900 mb-4">Branding</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                @include('admin._form_components', ['name' => 'school_name', 'label' => 'School Name (Navbar)', 'value' => $school_name])
                @include('admin._form_components', ['name' => 'school_tagline', 'label' => 'Tagline (Footer)', 'value' => $school_tagline])
            </div>

            <h3 class="text-base font-semibold text-gray-900 mb-4">Navbar Contact Info</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                @include('admin._form_components', ['name' => 'nav_phone', 'label' => 'Phone (Navbar top bar)', 'value' => $nav_phone, 'help' => 'Appears in the top info bar'])
                @include('admin._form_components', ['name' => 'nav_email', 'label' => 'Email (Navbar top bar)', 'value' => $nav_email])
            </div>

            <h3 class="text-base font-semibold text-gray-900 mb-4">Footer</h3>
            <div class="space-y-4 mb-8">
                @include('admin._form_components', ['name' => 'footer_address', 'label' => 'Address (Footer)', 'value' => $footer_address])
                @include('admin._form_components', ['name' => 'footer_copyright', 'label' => 'Copyright Text (Footer)', 'type' => 'textarea', 'value' => $footer_copyright])
            </div>

            <h3 class="text-base font-semibold text-gray-900 mb-4">Social Media Links</h3>
            <div class="space-y-4 mb-8">
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-lg bg-[#1877F2] flex items-center justify-center flex-shrink-0 mt-1">
                        @include('partials.social-icons', ['platform' => 'facebook', 'size' => 18])
                    </div>
                    <div class="flex-1">@include('admin._form_components', ['name' => 'social_facebook', 'label' => 'Facebook URL', 'value' => $social_facebook])</div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-lg bg-[#FF0000] flex items-center justify-center flex-shrink-0 mt-1">
                        @include('partials.social-icons', ['platform' => 'youtube', 'size' => 18])
                    </div>
                    <div class="flex-1">@include('admin._form_components', ['name' => 'social_youtube', 'label' => 'YouTube URL', 'value' => $social_youtube])</div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-lg bg-[#0A66C2] flex items-center justify-center flex-shrink-0 mt-1">
                        @include('partials.social-icons', ['platform' => 'linkedin', 'size' => 18])
                    </div>
                    <div class="flex-1">@include('admin._form_components', ['name' => 'social_linkedin', 'label' => 'LinkedIn URL', 'value' => $social_linkedin])</div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-lg bg-gradient-to-tr from-[#F58529] via-[#DD2A7B] to-[#8134AF] flex items-center justify-center flex-shrink-0 mt-1">
                        @include('partials.social-icons', ['platform' => 'instagram', 'size' => 18])
                    </div>
                    <div class="flex-1">@include('admin._form_components', ['name' => 'social_instagram', 'label' => 'Instagram URL', 'value' => $social_instagram])</div>
                </div>
            </div>

            <div class="flex items-center gap-3 pt-6 border-t border-gray-200">
                <button type="submit" class="px-5 py-2.5 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors">Save Settings</button>
            </div>
        </form>
    </div>
@endsection
