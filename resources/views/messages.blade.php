@extends('layouts.app')

@section('title', 'Leadership Messages | Mahendra Secondary School')

@section('content')
<main class="pt-32 pb-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
    <!-- Header Section -->
    <div class="text-center mb-16 space-y-4">
        <span class="text-primary font-bold tracking-widest font-label-sm uppercase">Institutional Vision</span>
        <h2 class="font-display-lg text-headline-lg text-on-surface">Messages from School Leadership</h2>
        <div class="w-20 h-1 bg-secondary rounded-full mx-auto"></div>
        <p class="text-on-surface-variant max-w-2xl mx-auto text-body-lg">
            Read inspiring messages, academic insights, and strategic updates from the management, administration, and principal.
        </p>
    </div>

    <!-- Messages Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
        @foreach($messages as $msg)
        <div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-lg border border-outline-variant transition-all duration-300 flex flex-col justify-between">
            <div class="p-8 space-y-6">
                <!-- Profile Header -->
                <div class="flex items-center gap-4 border-b border-outline-variant/50 pb-4">
                    <div class="w-16 h-16 rounded-full overflow-hidden shadow bg-surface-dim flex-shrink-0">
                        <img class="w-full h-full object-cover" src="{{ asset($msg['image']) }}" alt="{{ $msg['author'] }}">
                    </div>
                    <div>
                        <h3 class="font-bold text-on-surface text-lg">{{ $msg['author'] }}</h3>
                        <p class="text-xs text-primary font-bold uppercase tracking-wide">{{ $msg['role'] }}</p>
                    </div>
                </div>
                <!-- Teaser block -->
                <div class="space-y-3">
                    <span class="text-xs text-outline font-semibold">Published on {{ $msg['date'] }}</span>
                    <p class="text-on-surface-variant font-medium italic leading-relaxed text-sm">
                        "{{ $msg['teaser'] }}"
                    </p>
                </div>
            </div>
            <div class="px-8 pb-8 pt-0">
                <a href="{{ route('message-detail', ['slug' => $msg['slug']]) }}" class="w-full text-center block bg-secondary text-white py-3 rounded-lg font-bold hover:bg-primary transition-colors text-sm active:scale-95 transform">
                    Read Full Message
                </a>
            </div>
        </div>
        @endforeach
    </div>
</main>
@endsection
