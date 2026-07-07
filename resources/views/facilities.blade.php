@extends('layouts.app')

@section('title', 'School Facilities | Mahendra Secondary School')

@section('content')
<main class="pt-32 pb-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
    <!-- Header Section -->
    <div class="text-center mb-16 space-y-4">
        <span class="text-primary font-bold tracking-widest font-label-sm uppercase">Campus Environment</span>
        <h2 class="font-display-lg text-headline-lg text-on-surface">Our World-Class Facilities</h2>
        <div class="w-20 h-1 bg-secondary rounded-full mx-auto"></div>
        <p class="text-on-surface-variant max-w-2xl mx-auto text-body-lg">
            Providing modern, advanced facilities to promote curiosity, critical thinking, and physical development.
        </p>
    </div>

    <!-- Facilities Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
        @foreach($facilities as $facility)
        <div class="group bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-outline-variant flex flex-col">
            <div class="h-64 overflow-hidden relative">
                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ asset($facility['image']) }}" alt="{{ $facility['title'] }}">
                <div class="absolute top-4 left-4 bg-primary text-white p-3 rounded-lg flex items-center justify-center shadow-lg">
                    <span class="material-symbols-outlined text-2xl">{{ $facility['icon'] }}</span>
                </div>
            </div>
            <div class="p-8 space-y-4 flex-grow flex flex-col justify-between">
                <div class="space-y-3">
                    <h3 class="font-headline-md text-2xl font-bold text-on-surface group-hover:text-primary transition-colors">{{ $facility['title'] }}</h3>
                    <p class="text-secondary font-medium italic text-sm">{{ $facility['tagline'] }}</p>
                    <p class="text-on-surface-variant leading-relaxed">{{ $facility['summary'] }}</p>
                    
                    <div class="flex flex-wrap gap-2 pt-2">
                        @foreach(array_slice($facility['features'], 0, 3) as $feat)
                        <span class="bg-surface-container text-on-surface-variant px-3 py-1 rounded-full text-xs font-semibold">{{ $feat }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="pt-6 border-t border-outline-variant flex items-center justify-between">
                    <div>
                        <p class="text-xs text-outline font-semibold uppercase">Coordinator</p>
                        <p class="text-sm font-bold text-on-surface">{{ $facility['coordinator'] }}</p>
                    </div>
                    <a href="{{ route('facility-detail', ['slug' => $facility['slug']]) }}" class="bg-secondary text-white px-5 py-2 rounded-lg font-bold text-sm hover:bg-primary transition-colors flex items-center gap-1 active:scale-95 transform">
                        Explore <span class="material-symbols-outlined text-xs">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/pages/facility-detail.js') }}" defer></script>
@endpush
