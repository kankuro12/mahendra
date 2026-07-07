@extends('admin.layouts.app')

@section('page-title', 'Home Page Settings')
@section('title', 'Home Settings - Admin')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-4xl">
        <form method="POST" action="{{ route('admin.home-settings.update') }}" enctype="multipart/form-data">
            @csrf @method('PUT')

            <h3 class="text-base font-semibold text-gray-900 mb-4">Hero Section</h3>

            <div class="space-y-5">
                <div class="space-y-1.5">
                    <label for="hero_badge" class="block text-sm font-medium text-gray-700">Badge Text</label>
                    <input type="text" name="hero_badge" id="hero_badge" value="{{ $hero_badge }}"
                        class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none text-sm"
                        placeholder="Established 1956">
                </div>

                <div class="space-y-1.5">
                    <label for="hero_title" class="block text-sm font-medium text-gray-700">Hero Title</label>
                    <input type="text" name="hero_title" id="hero_title" value="{{ $hero_title }}"
                        class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none text-sm"
                        placeholder="Empowering Minds, Shaping Futures">
                </div>

                <div class="space-y-1.5">
                    <label for="hero_subtitle" class="block text-sm font-medium text-gray-700">Hero Subtitle</label>
                    <textarea name="hero_subtitle" id="hero_subtitle" rows="3"
                        class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none text-sm">{{ $hero_subtitle }}</textarea>
                </div>

                <div class="space-y-1.5">
                    <label for="hero_image" class="block text-sm font-medium text-gray-700">Hero Background Image</label>
                    <input type="file" name="hero_image" id="hero_image" class="dropify"
                        data-default-file="{{ str_starts_with($hero_image, 'home/') ? asset('storage/' . $hero_image) : asset($hero_image) }}"
                        data-max-file-size="5M">
                    <p class="text-xs text-gray-400">Recommended size: 1920x1080px or larger. Leave empty to keep current.</p>
                </div>
            </div>

            <h3 class="text-base font-semibold text-gray-900 mb-4 mt-8">Call-to-Action Buttons</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label for="cta_primary_text" class="block text-sm font-medium text-gray-700">Primary Button Text</label>
                    <input type="text" name="cta_primary_text" id="cta_primary_text" value="{{ $cta_primary_text }}"
                        class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none text-sm"
                        placeholder="Discover Our History">
                </div>
                <div class="space-y-1.5">
                    <label for="cta_primary_link" class="block text-sm font-medium text-gray-700">Primary Button Link</label>
                    <input type="text" name="cta_primary_link" id="cta_primary_link" value="{{ $cta_primary_link }}"
                        class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none text-sm"
                        placeholder="/about">
                </div>
                <div class="space-y-1.5">
                    <label for="cta_secondary_text" class="block text-sm font-medium text-gray-700">Secondary Button Text</label>
                    <input type="text" name="cta_secondary_text" id="cta_secondary_text" value="{{ $cta_secondary_text }}"
                        class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none text-sm"
                        placeholder="Virtual Tour">
                </div>
                <div class="space-y-1.5">
                    <label for="cta_secondary_link" class="block text-sm font-medium text-gray-700">Secondary Button Link</label>
                    <input type="text" name="cta_secondary_link" id="cta_secondary_link" value="{{ $cta_secondary_link }}"
                        class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none text-sm"
                        placeholder="/gallery">
                </div>
            </div>

            <h3 class="text-base font-semibold text-gray-900 mb-4 mt-8">Leadership Message</h3>

            <div class="space-y-1.5">
                <label for="leadership_message_id" class="block text-sm font-medium text-gray-700">Message Shown on Home Page</label>
                <select name="leadership_message_id" id="leadership_message_id"
                    class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none text-sm">
                    <option value="">-- None --</option>
                    @foreach ($messages as $msg)
                        <option value="{{ $msg->id }}" {{ (string) $leadership_message_id === (string) $msg->id ? 'selected' : '' }}>
                            {{ $msg->title }} ({{ $msg->author }})
                        </option>
                    @endforeach
                </select>
                <p class="text-xs text-gray-400">Select which leadership message appears in the "Principal's Message" section on the home page.</p>
            </div>

            <div class="flex items-center gap-3 pt-6 mt-6 border-t border-gray-200">
                <button type="submit" class="px-5 py-2.5 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors">
                    Save Settings
                </button>
            </div>
        </form>
    </div>
@endsection
