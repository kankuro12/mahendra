@extends('layouts.app')

@section('title', 'Academic Faculty | Mahendra Secondary School')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/teachers.css') }}">
@endpush

@section('content')

    <!-- Page Header Hero Section -->
    <section class="relative pt-32 pb-16 md:pt-40 md:pb-24 overflow-hidden bg-primary text-on-primary">
        <div class="absolute inset-0 opacity-10 pointer-events-none">

        </div>
        <div class="relative z-10 max-w-container-max mx-auto px-gutter text-center">
            <h1 class="font-display-lg text-display-lg mb-6 tracking-tight">Our Academic Faculty</h1>
            <p class="font-body-lg text-body-lg max-w-2xl mx-auto opacity-90">
                Meet the dedicated educators shaping the future leaders of tomorrow through academic rigor, mentorship, and
                civic excellence.
            </p>
        </div>
    </section>
    <!-- Faculty Directory -->
    <main class="max-w-container-max mx-auto px-gutter py-16 space-y-20">
        @php
            $colorMap = ['science' => 'primary', 'mathematics' => 'secondary', 'humanities' => 'tertiary'];
        @endphp
        @foreach ($departments as $department)
            @php $color = $colorMap[$department['slug']] ?? 'primary'; @endphp
            <section>
                <div class="flex items-center gap-4 mb-10 border-b border-outline-variant pb-4">
                    <span
                        class="material-symbols-outlined text-{{ $color }} text-4xl">{{ $department['icon'] }}</span>
                    <h2 class="font-headline-lg text-headline-lg text-on-surface">{{ $department['name'] }}</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter">
                    @foreach ($department['teachers'] as $teacher)
                        <div
                            class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden faculty-card-shadow transition-all duration-300 group">
                            <div class="aspect-[4/5] bg-surface-container-high relative overflow-hidden">
                                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    src="{{ asset($teacher['image']) }}" alt="{{ $teacher['name'] }}" />
                                <div
                                    class="absolute bottom-0 left-0 right-0 h-2 bg-{{ $color }} transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left">
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="font-headline-md text-headline-md mb-1 text-on-surface">{{ $teacher['name'] }}
                                </h3>
                                <p class="text-{{ $color }} font-label-md text-label-md font-bold mb-3">
                                    {{ $teacher['title'] }}</p>
                                <p class="text-on-surface-variant font-body-md text-body-md">{{ $teacher['credentials'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endforeach
    </main>
    <!-- Faculty Support CTA -->
    <section class="bg-surface-container-high py-16">
        <div class="max-w-container-max mx-auto px-gutter grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="font-headline-lg text-headline-lg mb-4 text-on-surface">Join Our Distinguished Faculty</h2>
                <p class="font-body-md text-body-md text-on-surface-variant mb-8">
                    We are always looking for passionate educators who are dedicated to academic excellence and student
                    development. Discover career opportunities at Mahendra Secondary School.
                </p>
                <div class="flex flex-wrap gap-4">
                    <button
                        class="bg-primary text-on-primary px-8 py-3 rounded-lg font-bold hover:opacity-90 transition-all flex items-center gap-2">
                        View Careers <span class="material-symbols-outlined">arrow_forward</span>
                    </button>
                    <button
                        class="border-2 border-primary text-primary px-8 py-3 rounded-lg font-bold hover:bg-primary/5 transition-all">
                        Staff Portal
                    </button>
                </div>
            </div>
            <div class="relative rounded-2xl overflow-hidden shadow-xl aspect-video">
                <img class="w-full h-full object-cover"
                    data-alt="A wide-angle shot of a group of diverse faculty members collaborating in a bright, modern staff lounge. They are engaged in professional discussion with laptops and notebooks. The environment is vibrant and professional, with large windows overlooking a green campus. The lighting is bright and airy, suggesting a positive and productive workspace."
                    src="{{ asset('assets/images/img_11840adcd132.jpg') }}" />
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="{{ asset('assets/js/pages/teachers.js') }}" defer></script>
@endpush
