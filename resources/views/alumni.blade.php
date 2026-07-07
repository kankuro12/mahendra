@extends('layouts.app')

@section('title', 'Alumni | Mahendra Secondary School')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/pages/alumni.css') }}">
<style>
.search-highlight { background: #fef3c7; padding: 0 2px; border-radius: 2px; }
.alumni-card { transition: transform 0.2s, box-shadow 0.2s; }
.alumni-card:hover { transform: translateY(-4px); box-shadow: 0 12px 24px rgba(0,0,0,0.1); }
</style>
@endpush

@section('content')
<main>
{{-- Hero Section --}}
<section class="relative h-[600px] flex items-center overflow-hidden pt-28 md:pt-36">
    <div class="absolute inset-0 z-0">
        <div class="w-full h-full bg-cover bg-center"
            style="background-image: url('{{ str_starts_with($heroImage, 'alumni/') ? asset('storage/' . $heroImage) : asset($heroImage) }}')">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-on-background/80 to-transparent"></div>
    </div>
    <div class="relative z-10 w-full max-w-container-max mx-auto px-gutter text-on-primary">
        <div class="max-w-2xl">
            <h1 class="font-display-lg text-display-lg mb-6 leading-tight">{!! $heroTitle !!}</h1>
            <p class="font-body-lg text-body-lg mb-8 opacity-90">{{ $heroSubtitle }}</p>
            <div class="flex flex-wrap gap-4">
                <a class="px-8 py-3 bg-primary text-on-primary font-label-md text-label-md rounded-full hover:scale-105 transition-transform duration-300 inline-flex items-center gap-2" href="#register">
                    Join the Association <span class="material-symbols-outlined">arrow_forward</span>
                </a>
                <a class="px-8 py-3 bg-white/10 backdrop-blur-md border border-white/30 text-white font-label-md text-label-md rounded-full hover:bg-white/20 transition-all" href="#search">
                    Search Directory
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-16 bg-surface-container-low">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach ($stats as $stat)
                <div class="bg-white p-8 rounded-xl border border-outline-variant shadow-sm text-center">
                    <span class="material-symbols-outlined text-primary text-4xl mb-2">{{ $stat['icon'] }}</span>
                    <div class="text-3xl font-bold text-primary">{{ $stat['value'] }}</div>
                    <div class="text-label-sm text-on-surface-variant uppercase tracking-wider">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Featured Alumni --}}
@if ($featured->count())
<section class="py-24">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
            <div>
                <h2 class="font-headline-lg text-headline-lg text-on-surface mb-2">Distinguished Alumni</h2>
                <div class="h-1.5 w-24 bg-primary rounded-full"></div>
            </div>
            <p class="max-w-md text-on-surface-variant">Spotlighting the extraordinary journeys and achievements of our graduates across various fields.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($featured as $a)
                <div class="alumni-card group relative bg-white rounded-xl overflow-hidden border border-outline-variant">
                    <div class="h-64 overflow-hidden relative">
                        @if ($a->image)
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                src="{{ asset('storage/' . $a->image) }}" alt="{{ $a->name }}">
                        @else
                            <div class="w-full h-full bg-surface-dim flex items-center justify-center">
                                <span class="material-symbols-outlined text-5xl text-outline">person</span>
                            </div>
                        @endif
                        @if ($a->graduation_year)
                            <div class="absolute bottom-0 left-0 p-4 bg-primary text-on-primary font-label-sm rounded-tr-lg">Class of {{ $a->graduation_year }}</div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-1">{{ $a->name }}</h3>
                        @if ($a->occupation)
                            <p class="text-primary font-medium mb-4">{{ $a->occupation }}</p>
                        @endif
                        @if ($a->story)
                            <p class="text-on-surface-variant font-body-md line-clamp-3">{{ $a->story }}</p>
                        @endif
                        @if ($a->facebook || $a->linkedin)
                            <div class="mt-6 pt-6 border-t border-outline-variant flex gap-3">
                                @if ($a->facebook) <a href="{{ $a->facebook }}" target="_blank" class="text-primary hover:opacity-80"><span class="material-symbols-outlined">link</span></a> @endif
                                @if ($a->linkedin) <a href="{{ $a->linkedin }}" target="_blank" class="text-primary hover:opacity-80"><span class="material-symbols-outlined">badge</span></a> @endif
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Search & Directory --}}
<section id="search" class="py-24 bg-surface-container-high">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="text-center mb-12">
            <h2 class="font-headline-lg text-headline-lg text-on-surface mb-2">Alumni Directory</h2>
            <p class="text-on-surface-variant max-w-xl mx-auto">Search by name, graduation year, occupation, or location.</p>
        </div>

        <form method="GET" action="{{ route('alumni') }}#search" class="max-w-2xl mx-auto mb-10">
            <div class="flex gap-3">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Search alumni..."
                    class="flex-1 px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary outline-none">
                <button type="submit"
                    class="px-6 py-3 bg-primary text-white rounded-lg font-bold hover:brightness-110 transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined">search</span> Search
                </button>
                @if (request('search'))
                    <a href="{{ route('alumni') }}"
                        class="px-4 py-3 border border-outline-variant rounded-lg text-gray-500 hover:bg-gray-50 transition-colors flex items-center">Clear</a>
                @endif
            </div>
        </form>

        @if (request('search'))
            <p class="text-center text-sm text-on-surface-variant mb-8">
                Found <strong>{{ $alumni->total() }}</strong> result{{ $alumni->total() !== 1 ? 's' : '' }} for "{{ request('search') }}"
            </p>
        @endif

        @if ($alumni->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($alumni as $a)
                    <div class="alumni-card bg-white rounded-xl border border-outline-variant overflow-hidden">
                        @if ($a->image)
                            <img src="{{ asset('storage/' . $a->image) }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-surface-dim flex items-center justify-center">
                                <span class="material-symbols-outlined text-4xl text-outline">person</span>
                            </div>
                        @endif
                        <div class="p-4">
                            <h3 class="font-bold text-on-surface">{{ $a->name }}</h3>
                            @if ($a->graduation_year) <p class="text-xs text-primary font-semibold">Class of {{ $a->graduation_year }}</p> @endif
                            @if ($a->occupation) <p class="text-sm text-on-surface-variant mt-1">{{ $a->occupation }}</p> @endif
                            @if ($a->location) <p class="text-xs text-outline mt-1">{{ $a->location }}</p> @endif
                            @if ($a->story) <p class="text-xs text-on-surface-variant mt-2 line-clamp-2">{{ $a->story }}</p> @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $alumni->links() }}
            </div>
        @elseif (request('search'))
            <div class="text-center py-12 text-on-surface-variant">
                <span class="material-symbols-outlined text-5xl block mb-3">search_off</span>
                <p>No alumni found matching your search.</p>
            </div>
        @else
            <div class="text-center py-12 text-on-surface-variant">
                <span class="material-symbols-outlined text-5xl block mb-3">diversity_3</span>
                <p>No alumni listed yet.</p>
            </div>
        @endif
    </div>
</section>

{{-- Registration Form --}}
<section class="py-24">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="max-w-2xl mx-auto bg-white p-10 rounded-2xl border border-outline-variant shadow-xl" id="register">
            <div class="mb-8">
                <h2 class="font-headline-lg text-headline-lg text-on-surface mb-2">Alumni Association</h2>
                <p class="text-on-surface-variant">Register to stay updated on school news, networking events, and exclusive alumni benefits.</p>
            </div>
            @if (session('success'))
                <div class="mb-6 px-6 py-4 bg-green-50 border border-green-200 text-green-700 rounded-lg text-center font-medium">{{ session('success') }}</div>
            @endif
            <form class="space-y-6" method="POST" action="{{ route('alumni.register') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-on-surface mb-2">Full Name</label>
                        <input name="name" value="{{ old('name') }}" class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary outline-none" placeholder="John Doe" required>
                        @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-on-surface mb-2">Email</label>
                        <input name="email" type="email" value="{{ old('email') }}" class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary outline-none" placeholder="john@example.com" required>
                        @error('email') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-on-surface mb-2">Graduation Year</label>
                        <input name="graduation_year" type="number" value="{{ old('graduation_year') }}" class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary outline-none" placeholder="e.g. 2010">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-on-surface mb-2">Occupation</label>
                        <input name="occupation" value="{{ old('occupation') }}" class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary outline-none" placeholder="e.g. Engineer">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-on-surface mb-2">Location</label>
                    <input name="location" value="{{ old('location') }}" class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary outline-none" placeholder="e.g. Kathmandu, Nepal">
                </div>
                <div>
                    <label class="block text-sm font-bold text-on-surface mb-2">Message</label>
                    <textarea name="message" rows="3" class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary outline-none" placeholder="Optional message">{{ old('message') }}</textarea>
                </div>
                <button type="submit" class="w-full py-4 bg-primary text-on-primary font-bold rounded-lg hover:brightness-110 transition-all shadow-lg">Submit Registration</button>
            </form>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20 bg-primary overflow-hidden relative">
    <div class="absolute right-0 top-0 opacity-10 pointer-events-none">
        <span class="material-symbols-outlined text-[300px]" style="font-variation-settings: 'wght' 700;">school</span>
    </div>
    <div class="max-w-container-max mx-auto px-gutter relative z-10 text-center">
        <h2 class="font-headline-lg text-headline-lg text-on-primary mb-6">Lost Touch with a Classmate?</h2>
        <p class="text-on-primary-container text-body-lg mb-10 max-w-2xl mx-auto">Use our Alumni Directory above to find old friends and expand your professional network.</p>
        <a href="#search" class="px-10 py-4 bg-white text-primary font-bold rounded-full hover:shadow-2xl transition-all inline-flex items-center gap-2">
            <span class="material-symbols-outlined">search</span> Search Directory
        </a>
    </div>
</section>
</main>
@endsection
