@extends('layouts.app')

@section('title', 'Mahendra Secondary School | Empowering Minds')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/home.css') }}">
@endpush

@section('content')

    @php
        $heroBg = \App\Models\Setting::get('home_hero_image', 'assets/images/img_8bfe976c8a21.jpg');
    @endphp
    <!-- Hero Section -->
    <section class="relative w-full h-[921px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="w-full h-full bg-cover bg-center filter brightness-50"
                data-alt="School campus hero image"
                style="background-image: url('{{ str_starts_with($heroBg, 'home/') ? asset('storage/' . $heroBg) : asset($heroBg) }}')">
            </div>
            <div class="hero-gradient absolute inset-0"></div>
        </div>
        <div class="relative z-10 text-center text-white px-margin-mobile max-w-4xl mx-auto space-y-6">
            <span
                class="bg-tertiary-container text-on-tertiary-container px-4 py-1.5 rounded-full font-label-sm text-label-sm uppercase tracking-widest animate-fade-in">{{ \App\Models\Setting::get('home_hero_badge', 'Established 1956') }}</span>
            <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg font-bold leading-tight drop-shadow-lg">
                {{ \App\Models\Setting::get('home_hero_title', 'Empowering Minds, Shaping Futures') }}
            </h2>
            <p class="font-body-lg text-lg md:text-xl opacity-90 max-w-2xl mx-auto">
                {{ \App\Models\Setting::get('home_hero_subtitle', 'Mahendra Secondary School - A Legacy of Excellence in providing world-class education for the leaders of tomorrow.') }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
                <a href="{{ \App\Models\Setting::get('home_cta_primary_link', '/about') }}"
                    class="bg-primary text-white px-8 py-4 rounded-lg font-bold text-lg hover:brightness-110 transition-all flex items-center justify-center gap-2">
                    {{ \App\Models\Setting::get('home_cta_primary_text', 'Discover Our History') }} <span class="material-symbols-outlined">arrow_forward</span>
                </a>
                <a href="{{ \App\Models\Setting::get('home_cta_secondary_link', '/gallery') }}"
                    class="bg-white/10 backdrop-blur-md border-2 border-white/30 text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-white/20 transition-all text-center flex items-center justify-center">
                    {{ \App\Models\Setting::get('home_cta_secondary_text', 'Virtual Tour') }}
                </a>
            </div>
        </div>
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce">
            <span class="material-symbols-outlined text-white opacity-50 text-4xl">keyboard_arrow_down</span>
        </div>
    </section>

    <!-- Latest News & Events -->
    <section class="w-full py-24 bg-surface-container-low">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <!-- Upcoming Events Column -->
                <div class="space-y-8">
                    <div class="flex justify-between items-end border-b border-outline-variant pb-4">
                        <h2 class="font-headline-lg text-headline-lg text-on-surface">Upcoming Events</h2>
                        <a class="text-primary font-bold text-sm flex items-center gap-1" href="{{ route('notice') }}">Calendar <span
                                class="material-symbols-outlined text-sm">event</span></a>
                    </div>
                    <div class="space-y-6">
                        @foreach($events as $event)
                        <div
                            class="flex gap-6 group cursor-pointer bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition-all">
                            <div
                                class="flex-shrink-0 w-20 h-24 bg-primary text-white flex flex-col items-center justify-center rounded-lg">
                                <span class="text-2xl font-bold">{{ $event['event_date']?->format('d') ?? '--' }}</span>
                                <span class="text-xs uppercase font-bold">{{ $event['event_date']?->format('M') ?? '--' }}</span>
                            </div>
                            <div class="space-y-1">
                                <span class="text-secondary text-xs font-bold uppercase tracking-wider">{{ $event['type'] }}</span>
                                <h4 class="font-bold text-lg group-hover:text-primary transition-colors">{{ $event['title'] }}</h4>
                                <p class="text-on-surface-variant text-sm line-clamp-1">{{ $event['description'] }}</p>
                                <div class="flex items-center gap-4 text-xs text-outline pt-2">
                                    <span class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-xs">schedule</span> {{ $event['starts_at'] ? \Carbon\Carbon::parse($event['starts_at'])->format('h:i A') : '--' }}</span>
                                    <span class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-xs">location_on</span> {{ $event['location'] }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Recent Announcements Column -->
                <div class="space-y-8">
                    <div class="flex justify-between items-end border-b border-outline-variant pb-4">
                        <h2 class="font-headline-lg text-headline-lg text-on-surface">Recent Notices</h2>
                        <a class="text-primary font-bold text-sm flex items-center gap-1" href="{{ route('notice') }}">Archive <span
                                class="material-symbols-outlined text-sm">archive</span></a>
                    </div>
                    <div class="space-y-4">
                        @foreach($notices as $notice)
                        <div
                            class="{{ $notice['is_urgent'] ? 'bg-surface-container-highest border-l-4 border-error' : 'bg-white border-l-4 border-tertiary-container' }} p-6 rounded-xl relative overflow-hidden">
                            @if($notice['is_urgent'])
                            <div class="absolute top-0 right-0 p-2">
                                <span
                                    class="bg-error text-white text-[10px] px-2 py-0.5 rounded-full font-bold">URGENT</span>
                            </div>
                            @endif
                            <span class="text-xs font-bold text-outline">Published: {{ $notice['published_at']?->format('M d, Y') ?? '--' }}</span>
                            <h4 class="font-bold text-lg mt-1 mb-2">{{ $notice['title'] }}</h4>
                            <p class="text-on-surface-variant text-sm">{{ Str::limit($notice['content'], 100) }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if ($principalMessage)
    <!-- Principal's Message -->
    <section class="w-full py-24 bg-surface-bright">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="flex flex-col md:flex-row items-center gap-16">
                    <div class="w-full md:w-1/2 relative">
                        <div
                            class="aspect-[4/5] bg-surface-container rounded-xl overflow-hidden shadow-xl ring-8 ring-white/50">
                            <img class="w-full h-full object-cover"
                                data-alt="A professional and warm portrait of a senior academic principal, a middle-aged man with a kind smile, wearing a traditional formal Nepali Dhaka topi and a sharp corporate suit. He is standing in a well-lit library filled with old leather-bound books. The photography is sharp with a soft background bokeh, emphasizing his authoritative yet approachable presence."
                                src="{{ asset($principalMessage['image']) }}" />
                        </div>
                        <div
                            class="absolute -bottom-6 -right-6 bg-primary text-white p-8 rounded-xl shadow-2xl hidden lg:block max-w-xs">
                            <p class="font-body-md italic opacity-90">"{{ $principalMessage['teaser'] }}"</p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 space-y-6">
                        <span class="text-primary font-bold tracking-widest font-label-sm uppercase">Leadership Vision</span>
                        <h2 class="font-display-lg text-headline-lg text-on-surface">Welcome to Our Academic Sanctuary</h2>
                        <div class="w-20 h-1 bg-secondary rounded-full"></div>
                        @foreach($principalMessage['paragraphs'] as $para)
                        <p class="text-on-surface-variant text-lg leading-relaxed">{{ $para }}</p>
                        @endforeach
                        <div class="pt-4">
                            <h4 class="font-bold text-on-surface text-xl">{{ $principalMessage['author'] }}</h4>
                            <p class="text-primary font-medium">{{ $principalMessage['role'] }}, Mahendra Secondary School</p>
                        </div>
                        <a href="{{ route('message-detail', ['slug' => 'principal']) }}"
                            class="mt-6 inline-block border-2 border-primary text-primary px-8 py-3 rounded-lg font-bold hover:bg-primary hover:text-white transition-all text-center">Read
                            Full Message</a>
                    </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Facilities Section -->
    <section class="w-full py-24 bg-surface">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="text-center mb-16 space-y-4">
                <h2 class="font-display-lg text-headline-lg text-on-surface">World-Class Facilities</h2>
                <p class="text-on-surface-variant max-w-2xl mx-auto">Providing a conducive environment for discovery,
                    learning, and physical development.</p>
                <div class="pt-2">
                    <a href="{{ route('facilities') }}"
                        class="inline-flex items-center gap-2 text-primary font-bold hover:text-secondary transition-colors text-sm">
                        View All Facilities <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter">
                <!-- Science Lab -->
                <div
                    class="group bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-outline-variant">
                    <div class="h-48 overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            data-alt="A state-of-the-art modern school science laboratory with bright lighting. Students in white lab coats are carefully conducting experiments with beakers and microscopes. The room is organized with stainless steel surfaces and high-tech equipment. The aesthetic is clean, professional, and academically focused."
                            src="{{ asset('assets/images/img_046e526490a6.jpg') }}" />
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center gap-2 text-primary">
                            <span class="material-symbols-outlined">science</span>
                            <h3 class="font-headline-md text-xl font-bold">Science Lab</h3>
                        </div>
                        <p class="text-on-surface-variant font-label-md">Equipped with the latest research instruments and
                            safety protocols for physics, chemistry, and biology.</p>
                        <a href="{{ route('facility-detail', ['slug' => 'science-lab']) }}"
                            class="w-full py-2 text-secondary font-bold border-b-2 border-transparent hover:border-secondary transition-all flex items-center justify-center gap-2">View
                            Details <span class="material-symbols-outlined text-sm">open_in_new</span></a>
                    </div>
                </div>
                <!-- Library -->
                <div
                    class="group bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-outline-variant">
                    <div class="h-48 overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            data-alt="A vast, high-ceilinged school library with tall wooden bookshelves reaching the ceiling. Large windows allow natural light to flood into cozy reading nooks where students are focused on their books. The atmosphere is quiet, serene, and intellectual, utilizing a warm color palette of woods and soft blues."
                            src="{{ asset('assets/images/img_723930a7fd73.jpg') }}" />
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center gap-2 text-primary">
                            <span class="material-symbols-outlined">menu_book</span>
                            <h3 class="font-headline-md text-xl font-bold">Library</h3>
                        </div>
                        <p class="text-on-surface-variant font-label-md">A vast collection of over 50,000 titles, digital
                            archives, and quiet study zones for immersive learning.</p>
                        <a href="{{ route('facility-detail', ['slug' => 'library']) }}"
                            class="w-full py-2 text-secondary font-bold border-b-2 border-transparent hover:border-secondary transition-all flex items-center justify-center gap-2">View
                            Details <span class="material-symbols-outlined text-sm">open_in_new</span></a>
                    </div>
                </div>
                <!-- Computer Lab -->
                <div
                    class="group bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-outline-variant">
                    <div class="h-48 overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            data-alt="A modern computer laboratory featuring rows of sleek high-end desktop computers with dual monitors. The room is designed with cool blue accent lighting and ergonomic furniture. Students are engaged in coding and graphic design. The setting looks technologically advanced and future-oriented."
                            src="{{ asset('assets/images/img_9c8e1299b2a0.jpg') }}" />
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center gap-2 text-primary">
                            <span class="material-symbols-outlined">computer</span>
                            <h3 class="font-headline-md text-xl font-bold">Computer Lab</h3>
                        </div>
                        <p class="text-on-surface-variant font-label-md">High-speed fiber connectivity and high-performance
                            machines for ICT and vocational training.</p>
                        <a href="{{ route('facility-detail', ['slug' => 'computer-lab']) }}"
                            class="w-full py-2 text-secondary font-bold border-b-2 border-transparent hover:border-secondary transition-all flex items-center justify-center gap-2">View
                            Details <span class="material-symbols-outlined text-sm">open_in_new</span></a>
                    </div>
                </div>
                <!-- Sports -->
                <div
                    class="group bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-outline-variant">
                    <div class="h-48 overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            data-alt="A wide, vibrant green sports field and athletic track with students playing football and running. In the background, there is a modern gymnasium and stadium seating. The sunlight is bright, creating high-contrast shadows. The scene is energetic and full of life, celebrating physical health and teamwork."
                            src="{{ asset('assets/images/img_24d9187e8073.jpg') }}" />
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center gap-2 text-primary">
                            <span class="material-symbols-outlined">sports_basketball</span>
                            <h3 class="font-headline-md text-xl font-bold">Sports</h3>
                        </div>
                        <p class="text-on-surface-variant font-label-md">Multipurpose ground, basketball courts, and indoor
                            sports hall for physical excellence.</p>
                        <a href="{{ route('facility-detail', ['slug' => 'sports']) }}"
                            class="w-full py-2 text-secondary font-bold border-b-2 border-transparent hover:border-secondary transition-all flex items-center justify-center gap-2">View
                            Details <span class="material-symbols-outlined text-sm">open_in_new</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- FAB for Emergency/Quick Action -->
    <a href="{{ route('contact') }}"
        class="fixed bottom-8 right-8 w-16 h-16 bg-primary text-white rounded-full shadow-2xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all z-50 group">
        <span class="material-symbols-outlined text-3xl">chat</span>
        <span
            class="absolute right-20 bg-white text-primary px-4 py-2 rounded-lg shadow-lg font-bold text-sm whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity">Contact
            Office</span>
    </a>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/pages/home.js') }}" defer></script>
@endpush
