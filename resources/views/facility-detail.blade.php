@extends('layouts.app')

@section('title', $facility['title'] . ' | Mahendra Secondary School')

@section('content')
<main class="pb-20">
    <!-- Hero Section: Facility Header -->
    <section class="relative w-full h-[614px] overflow-hidden pt-28 md:pt-36">
        <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/40 to-transparent z-10"></div>
        <img class="absolute inset-0 w-full h-full object-cover z-0" src="{{ asset($facility['image']) }}" alt="{{ $facility['title'] }}">
        <div class="relative z-20 h-full max-w-container-max mx-auto px-margin-desktop flex flex-col justify-end pb-16 space-y-4">
            <nav class="flex items-center gap-2 text-white/70 text-sm font-medium">
                <a class="hover:text-white transition-colors" href="{{ route('home') }}">Home</a>
                <span class="material-symbols-outlined text-xs">chevron_right</span>
                <a class="hover:text-white transition-colors" href="{{ route('facilities') }}">Facilities</a>
                <span class="material-symbols-outlined text-xs">chevron_right</span>
                <span class="text-white font-semibold">{{ $facility['title'] }}</span>
            </nav>
            <h2 class="font-display-lg text-4xl md:text-5xl font-extrabold text-white leading-tight drop-shadow-md">
                {{ $facility['title'] }}
            </h2>
            <p class="text-white/90 text-lg md:text-xl font-medium max-w-2xl">
                {{ $facility['tagline'] }}
            </p>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="max-w-container-max mx-auto px-margin-desktop py-16 grid grid-cols-1 lg:grid-cols-12 gap-gutter">
        <!-- Details & Features (8 Columns) -->
        <div class="lg:col-span-8 space-y-12">
            <!-- Long Description -->
            <div class="space-y-6">
                <h3 class="font-headline-md text-2xl font-bold text-on-surface">About the Facility</h3>
                <div class="w-16 h-1 bg-secondary rounded-full"></div>
                <p class="text-on-surface-variant leading-relaxed text-lg font-body-md">
                    {{ $facility['description'] }}
                </p>
            </div>

            <!-- Features Grid -->
            <div class="space-y-6">
                <h3 class="font-headline-md text-xl font-bold text-on-surface">Key Features</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($facility['features'] as $feature)
                    <div class="flex gap-3 items-start p-4 bg-surface-container-low rounded-xl border border-outline-variant">
                        <span class="material-symbols-outlined text-primary">done_all</span>
                        <p class="font-bold text-on-surface text-sm">{{ $feature }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Inquiries Form -->
            <div class="bg-surface-container-lowest p-8 rounded-2xl border border-outline-variant shadow-sm space-y-6">
                <div class="space-y-2">
                    <h3 class="font-headline-md text-xl font-bold text-on-surface">Submit an Inquiry</h3>
                    <p class="text-sm text-on-surface-variant">Send a message to our department coordinators or request a facility visit.</p>
                </div>
                <form class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-outline uppercase mb-2">Your Name</label>
                            <input class="w-full px-4 py-2.5 rounded-lg border border-outline-variant bg-surface-container-lowest focus:ring-2 focus:ring-primary focus:border-transparent outline-none text-sm" placeholder="Full name" type="text" required>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-outline uppercase mb-2">Email Address</label>
                            <input class="w-full px-4 py-2.5 rounded-lg border border-outline-variant bg-surface-container-lowest focus:ring-2 focus:ring-primary focus:border-transparent outline-none text-sm" placeholder="example@mail.com" type="email" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-outline uppercase mb-2">Subject / Inquiry Type</label>
                        <select class="w-full px-4 py-2.5 rounded-lg border border-outline-variant bg-surface-container-lowest focus:ring-2 focus:ring-primary focus:border-transparent outline-none text-sm">
                            <option>Request Lab/Library Session</option>
                            <option>Equipment/Resource Inquiry</option>
                            <option>General Tour Request</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-outline uppercase mb-2">Message</label>
                        <textarea class="w-full px-4 py-2.5 rounded-lg border border-outline-variant bg-surface-container-lowest focus:ring-2 focus:ring-primary focus:border-transparent outline-none text-sm h-32" placeholder="Write details about your request..." required></textarea>
                    </div>
                    <button class="w-full bg-primary text-on-primary py-3 rounded-lg font-bold hover:bg-primary-container active:scale-95 transition-all text-sm flex items-center justify-center gap-2">
                        Send Request <span class="material-symbols-outlined text-sm">send</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Specifications & Coordinator (4 Columns) -->
        <aside class="lg:col-span-4 space-y-8">
            <!-- Details Card -->
            <div class="bg-surface-container p-6 rounded-2xl border border-outline-variant space-y-6">
                <h4 class="font-bold text-on-surface text-lg border-b border-outline-variant pb-2">Quick Specifications</h4>
                <div class="space-y-4">
                    @foreach($facility['specifications'] as $key => $val)
                    <div>
                        <p class="text-xs font-bold text-outline uppercase">{{ $key }}</p>
                        <p class="text-sm font-semibold text-on-surface mt-1">{{ $val }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Coordinator Card -->
            <div class="bg-white p-6 rounded-2xl border border-outline-variant shadow-sm space-y-4">
                <h4 class="font-bold text-on-surface text-lg border-b border-outline-variant pb-2">Facility Head</h4>
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined text-3xl">account_circle</span>
                    </div>
                    <div>
                        <p class="font-bold text-on-surface">{{ $facility['coordinator'] }}</p>
                        <p class="text-label-sm text-on-surface-variant">{{ $facility['coordinator_role'] }}</p>
                    </div>
                </div>
            </div>
        </aside>
    </section>
</main>

<!-- Footer section -->
<footer class="bg-surface-container-highest w-full border-t border-outline-variant">
    <div class="py-12 px-margin-mobile md:px-margin-desktop grid grid-cols-1 md:grid-cols-4 gap-gutter max-w-container-max mx-auto">
        <div class="col-span-1">
            <span class="font-headline-md text-headline-md font-bold text-primary mb-4 block">Mahendra School</span>
            <p class="text-on-surface-variant text-sm mb-6 leading-relaxed">Dedicated to academic excellence and character building since 1956. Empowering students for a better tomorrow.</p>
        </div>
        <div>
            <h4 class="font-label-md text-label-md font-bold mb-6">Quick Links</h4>
            <ul class="space-y-4">
                <li><a class="text-on-surface-variant font-medium hover:text-primary hover:underline transition-all" href="{{ route('notice') }}">Academic Calendar</a></li>
                <li><a class="text-on-surface-variant font-medium hover:text-primary hover:underline transition-all" href="{{ route('teachers') }}">Staff Directory</a></li>
                <li><a class="text-on-surface-variant font-medium hover:text-primary hover:underline transition-all" href="{{ route('gallery') }}">Gallery</a></li>
                <li><a class="text-on-surface-variant font-medium hover:text-primary hover:underline transition-all" href="{{ route('contact') }}">Contact Us</a></li>
            </ul>
        </div>
        <div>
            <h4 class="font-label-md text-label-md font-bold mb-6">Contact Info</h4>
            <ul class="space-y-4 text-sm text-on-surface-variant">
                <li class="flex gap-3"><span class="material-symbols-outlined text-sm">location_on</span> Jhapa, Koshi Province, Nepal</li>
                <li class="flex gap-3"><span class="material-symbols-outlined text-sm">call</span> +977-23-XXXXXX</li>
                <li class="flex gap-3"><span class="material-symbols-outlined text-sm">mail</span> info@mahendraschool.edu.np</li>
            </ul>
        </div>
        <div>
            <h4 class="font-label-md text-label-md font-bold mb-6">Find Us</h4>
            <div class="rounded-lg overflow-hidden h-32 border border-outline-variant shadow-inner bg-surface-dim flex items-center justify-center">
                <span class="material-symbols-outlined text-primary text-4xl">map</span>
            </div>
        </div>
    </div>
    <div class="border-t border-outline-variant py-8 px-margin-desktop text-center">
        <p class="font-label-sm text-label-sm text-on-surface-variant opacity-70">© 2024 Mahendra Secondary School. Affiliated with the Government of Nepal.</p>
    </div>
</footer>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/pages/facility-detail.js') }}" defer></script>
@endpush
