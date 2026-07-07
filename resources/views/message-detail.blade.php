@extends('layouts.app')

@section('title', $message['title'] . ' | Mahendra Secondary School')

@section('content')
<main class="pt-32 pb-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
    <!-- Breadcrumbs -->
    <nav class="flex items-center gap-2 text-on-surface-variant font-label-md mb-6">
        <a class="hover:text-primary transition-colors" href="{{ route('home') }}">Home</a>
        <span class="material-symbols-outlined text-sm">chevron_right</span>
        <a class="hover:text-primary transition-colors" href="{{ route('messages') }}">Leadership Messages</a>
        <span class="material-symbols-outlined text-sm">chevron_right</span>
        <span class="text-primary font-bold">{{ $message['author'] }}</span>
    </nav>

    <!-- Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">
        <!-- Message Content (8 Columns) -->
        <article class="lg:col-span-8 bg-surface-container-lowest p-8 md:p-12 rounded-2xl border border-outline-variant shadow-sm space-y-8">
            <div class="space-y-4 border-b border-outline-variant pb-6">
                <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-bold">{{ $message['date'] }}</span>
                <h2 class="font-display-lg text-3xl md:text-4xl font-extrabold text-on-surface leading-tight">
                    {{ $message['title'] }}
                </h2>
                <p class="text-secondary font-medium italic text-base">
                    "{{ $message['teaser'] }}"
                </p>
            </div>

            <!-- Message Text -->
            <div class="space-y-6 font-body-md text-on-surface-variant leading-relaxed text-base md:text-lg">
                @foreach($message['paragraphs'] as $para)
                <p>{{ $para }}</p>
                @endforeach
            </div>

            <!-- Closing / Signature -->
            <div class="pt-8 border-t border-outline-variant/50">
                <p class="font-bold text-on-surface text-lg">Sincerely,</p>
                <div class="mt-4">
                    <p class="font-display-lg text-xl font-bold text-primary">{{ $message['author'] }}</p>
                    <p class="text-sm font-semibold text-on-surface-variant">{{ $message['role'] }}</p>
                    <p class="text-xs text-outline font-semibold">Mahendra Secondary School</p>
                </div>
            </div>
        </article>

        <!-- Profile Card & Other Messages (4 Columns) -->
        <aside class="lg:col-span-4 space-y-8">
            <!-- Profile Card -->
            <div class="bg-white rounded-2xl border border-outline-variant overflow-hidden shadow-sm">
                <div class="h-80 bg-surface-dim overflow-hidden relative">
                    <img class="w-full h-full object-cover" src="{{ asset($message['image']) }}" alt="{{ $message['author'] }}">
                </div>
                <div class="p-6 text-center space-y-2">
                    <h3 class="font-bold text-on-surface text-xl">{{ $message['author'] }}</h3>
                    <p class="text-sm text-primary font-bold uppercase tracking-wider">{{ $message['role'] }}</p>
                    <p class="text-xs text-outline">Mahendra Secondary School</p>
                </div>
            </div>

            <!-- Quick Navigation Card -->
            <div class="bg-surface-container p-6 rounded-2xl border border-outline-variant space-y-4">
                <h4 class="font-bold text-on-surface text-lg border-b border-outline-variant pb-2">Other Messages</h4>
                <div class="flex flex-col gap-3">
                    @if($message['slug'] !== 'principal')
                    <a href="{{ route('message-detail', ['slug' => 'principal']) }}" class="flex items-center gap-3 p-3 rounded-lg bg-surface-container-lowest border border-outline-variant/50 hover:border-primary transition-all group">
                        <span class="material-symbols-outlined text-primary group-hover:scale-110 transition-transform">account_circle</span>
                        <div>
                            <p class="font-bold text-sm text-on-surface group-hover:text-primary">Principal's Message</p>
                            <p class="text-xs text-outline font-semibold">Dr. Hemanta Raj Joshi</p>
                        </div>
                    </a>
                    @endif

                    @if($message['slug'] !== 'chairman')
                    <a href="{{ route('message-detail', ['slug' => 'chairman']) }}" class="flex items-center gap-3 p-3 rounded-lg bg-surface-container-lowest border border-outline-variant/50 hover:border-primary transition-all group">
                        <span class="material-symbols-outlined text-primary group-hover:scale-110 transition-transform">account_circle</span>
                        <div>
                            <p class="font-bold text-sm text-on-surface group-hover:text-primary">Chairman's Message</p>
                            <p class="text-xs text-outline font-semibold">Mr. Ram Bahadur Thapa</p>
                        </div>
                    </a>
                    @endif

                    @if($message['slug'] !== 'administration')
                    <a href="{{ route('message-detail', ['slug' => 'administration']) }}" class="flex items-center gap-3 p-3 rounded-lg bg-surface-container-lowest border border-outline-variant/50 hover:border-primary transition-all group">
                        <span class="material-symbols-outlined text-primary group-hover:scale-110 transition-transform">account_circle</span>
                        <div>
                            <p class="font-bold text-sm text-on-surface group-hover:text-primary">Administration's Message</p>
                            <p class="text-xs text-outline font-semibold">Mrs. Sunita Dahal</p>
                        </div>
                    </a>
                    @endif
                </div>
            </div>
        </aside>
    </div>
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
