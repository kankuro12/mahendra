@extends('layouts.app')

@section('title', 'Gallery | Mahendra Secondary School')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/pages/gallery.css') }}">
@endpush

@section('content')

<main class="pt-28 pb-20 max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
<!-- Breadcrumbs & Title Section -->
<div class="mb-12">
<nav class="flex items-center gap-2 text-on-surface-variant font-label-md mb-4">
<a class="hover:text-primary transition-colors" href="{{ route('home') }}">Home</a>
<span class="material-symbols-outlined text-sm">chevron_right</span>
<span class="text-primary font-bold">Gallery</span>
</nav>
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
<div>
<h1 class="font-display-lg text-display-lg text-primary mb-2">School Gallery</h1>
<p class="text-on-surface-variant text-body-lg max-w-2xl">Relive the vibrant moments of academic excellence, sporting spirit, and cultural richness at Mahendra Secondary School.</p>
</div>
<!-- Search Bar -->
<div class="relative w-full md:w-80 group">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">search</span>
<input class="w-full pl-12 pr-4 py-3 bg-surface-container rounded-xl border-none ring-1 ring-outline-variant focus:ring-2 focus:ring-primary outline-none transition-all placeholder:text-on-surface-variant" placeholder="Search albums..." type="text"/>
</div>
</div>
</div>
<!-- Filter Chips (Optional enhancement) -->
<div class="flex flex-wrap gap-3 mb-10 overflow-x-auto pb-2 scrollbar-hide">
<button class="px-5 py-2 rounded-full bg-primary text-white font-label-md">All Albums</button>
<button class="px-5 py-2 rounded-full bg-surface-container text-on-surface-variant font-label-md hover:bg-surface-variant transition-colors">Cultural Events</button>
<button class="px-5 py-2 rounded-full bg-surface-container text-on-surface-variant font-label-md hover:bg-surface-variant transition-colors">Sports Meet</button>
<button class="px-5 py-2 rounded-full bg-surface-container text-on-surface-variant font-label-md hover:bg-surface-variant transition-colors">Academic Honors</button>
<button class="px-5 py-2 rounded-full bg-surface-container text-on-surface-variant font-label-md hover:bg-surface-variant transition-colors">Science & Arts</button>
</div>
<!-- Album Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-gutter">
@foreach($albums as $album)
<a href="{{ route('gallery-detail', ['slug' => $album['slug']]) }}" class="album-card group cursor-pointer relative overflow-hidden rounded-xl bg-white border border-outline-variant shadow-sm transition-all duration-300 hover:shadow-lg flex flex-col justify-between">
    <div>
        <div class="aspect-[16/10] overflow-hidden">
            <img class="w-full h-full object-cover transition-transform duration-500" src="{{ asset($album['images'][0]) }}" alt="{{ $album['title'] }}"/>
        </div>
        <div class="p-6">
            <div class="flex justify-between items-start mb-2 gap-4">
                <h3 class="font-headline-md text-headline-md text-on-surface group-hover:text-primary transition-colors">{{ $album['title'] }}</h3>
            </div>
            <p class="text-xs text-outline font-semibold mb-3">{{ $album['date'] }}</p>
            <p class="text-sm text-on-surface-variant line-clamp-3 leading-relaxed">{{ $album['description'] }}</p>
        </div>
    </div>
    <div class="p-6 pt-0 flex items-center justify-between border-t border-outline-variant/50 mt-4">
        <div class="flex items-center gap-4 text-on-surface-variant text-label-md">
            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">photo_library</span> {{ count($album['images']) }} Photos</span>
            @if($album['youtube'])
            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">videocam</span> 1 Video</span>
            @endif
        </div>
        <span class="text-primary font-bold text-sm flex items-center gap-1">Open Album <span class="material-symbols-outlined text-sm">arrow_forward</span></span>
    </div>
</a>
@endforeach
</div>
<!-- Pagination -->
<div class="mt-16 flex justify-center items-center gap-2">
<button class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant text-on-surface hover:bg-surface-container transition-colors">
<span class="material-symbols-outlined">chevron_left</span>
</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg bg-primary text-white font-bold">1</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant text-on-surface hover:bg-surface-container transition-colors">2</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant text-on-surface hover:bg-surface-container transition-colors">3</button>
<span class="mx-2 text-on-surface-variant">...</span>
<button class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant text-on-surface hover:bg-surface-container transition-colors">12</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant text-on-surface hover:bg-surface-container transition-colors">
<span class="material-symbols-outlined">chevron_right</span>
</button>
</div>
</main>
<!-- Footer -->
<footer class="bg-surface-container-highest w-full border-t border-outline-variant">
<div class="py-12 px-margin-mobile md:px-margin-desktop grid grid-cols-1 md:grid-cols-4 gap-gutter max-w-container-max mx-auto">
<div class="col-span-1 md:col-span-1">
<span class="font-headline-md text-headline-md font-bold text-primary mb-4 block">Mahendra Secondary School</span>
<p class="text-on-surface-variant text-body-md mb-6">Nurturing minds, building futures. Committed to academic excellence since 1995.</p>
<div class="flex gap-4">
<span class="material-symbols-outlined text-primary cursor-pointer hover:scale-110 transition-transform">face_nod</span>
<span class="material-symbols-outlined text-primary cursor-pointer hover:scale-110 transition-transform">language</span>
<span class="material-symbols-outlined text-primary cursor-pointer hover:scale-110 transition-transform">public</span>
</div>
</div>
<div>
<h4 class="font-bold text-on-surface mb-4">Quick Links</h4>
<ul class="space-y-2 text-label-md">
<li><a class="text-on-surface-variant hover:text-primary transition-colors" href="{{ route('notice') }}">Academic Calendar</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors" href="{{ route('teachers') }}">Staff Directory</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Admission Info</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#">School News</a></li>
</ul>
</div>
<div>
<h4 class="font-bold text-on-surface mb-4">Legal & Support</h4>
<ul class="space-y-2 text-label-md">
<li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Privacy Policy</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Tenders</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors" href="{{ route('contact') }}">Contact Support</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Terms of Use</a></li>
</ul>
</div>
<div>
<h4 class="font-bold text-on-surface mb-4">Contact Information</h4>
<ul class="space-y-3 text-label-md text-on-surface-variant">
<li class="flex gap-2">
<span class="material-symbols-outlined text-primary">location_on</span>
<span>123 School Road, Kathmandu, Nepal</span>
</li>
<li class="flex gap-2">
<span class="material-symbols-outlined text-primary">call</span>
<span>+977 01 444 555</span>
</li>
<li class="flex gap-2">
<span class="material-symbols-outlined text-primary">mail</span>
<span>info@mahendraschool.edu.np</span>
</li>
</ul>
</div>
<div class="col-span-1 md:col-span-4 pt-8 mt-8 border-t border-outline-variant text-center">
<p class="text-label-sm text-on-surface-variant">© 2024 Mahendra Secondary School. Affiliated with the Government of Nepal.</p>
</div>
</div>
</footer>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/pages/gallery.js') }}" defer></script>
@endpush
