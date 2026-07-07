@extends('layouts.app')

@section('title', 'Careers | Mahendra Secondary School')

@section('content')
<main class="pt-32 pb-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto space-y-12">
    <div class="border-b border-outline-variant pb-6 space-y-2">
        <span class="text-primary font-bold tracking-widest font-label-sm uppercase">Join Our Team</span>
        <h2 class="font-display-lg text-3xl md:text-4xl font-extrabold text-on-surface">Careers</h2>
        <div class="w-16 h-1 bg-secondary rounded-full"></div>
    </div>

    <div class="space-y-6">
        <h3 class="font-headline-md text-xl font-bold text-on-surface">Open Faculty &amp; Staff Positions</h3>

        @if ($careers->count())
            <div class="bg-surface-container-lowest rounded-xl border border-outline-variant overflow-hidden shadow-sm">
                @foreach ($careers as $career)
                    <div class="p-6 md:p-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-6 border-b border-outline-variant last:border-0">
                        <div class="space-y-2">
                            <h4 class="font-bold text-lg text-on-surface">{{ $career->title }}</h4>
                            @if ($career->description)
                                <p class="text-sm text-on-surface-variant">{{ $career->description }}</p>
                            @endif
                            @if ($career->deadline)
                                <p class="text-xs text-outline font-semibold">Deadline: {{ $career->deadline->format('F d, Y') }}</p>
                            @endif
                        </div>
                        <a href="{{ route('contact') }}"
                            class="px-6 py-2.5 bg-primary text-white rounded-lg font-bold text-sm hover:brightness-110 active:scale-95 transition-all flex items-center gap-1.5">
                            Apply Now
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-12 text-center">
                <span class="material-symbols-outlined text-4xl text-outline block mb-3">work</span>
                <p class="text-on-surface-variant">No open positions at this time. Please check back later.</p>
            </div>
        @endif
    </div>
</main>
@endsection
