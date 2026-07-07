@extends('layouts.app')

@section('title', 'Tenders & Procurement | Mahendra Secondary School')

@section('content')
<main class="pt-32 pb-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto space-y-12">
    <div class="border-b border-outline-variant pb-6 space-y-2">
        <span class="text-primary font-bold tracking-widest font-label-sm uppercase">Procurement Notices</span>
        <h2 class="font-display-lg text-3xl md:text-4xl font-extrabold text-on-surface">Tenders & Bidding</h2>
        <div class="w-16 h-1 bg-secondary rounded-full"></div>
    </div>

    <div class="space-y-6">
        <h3 class="font-headline-md text-xl font-bold text-on-surface">Active Procurement Projects</h3>

        @if ($tenders->count())
            <div class="bg-surface-container-lowest rounded-xl border border-outline-variant overflow-hidden shadow-sm">
                @foreach ($tenders as $tender)
                    <div class="p-6 md:p-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-6 border-b border-outline-variant last:border-0">
                        <div class="space-y-2">
                            <span class="bg-error/15 text-error px-3 py-1 rounded-full text-xs font-bold uppercase">{{ $tender->reference ? 'Ref: ' . $tender->reference : 'Active' }}</span>
                            <h4 class="font-bold text-lg text-on-surface">{{ $tender->title }}</h4>
                            @if ($tender->description)
                                <p class="text-sm text-on-surface-variant">{{ $tender->description }}</p>
                            @endif
                            @if ($tender->deadline)
                                <p class="text-xs text-outline font-semibold">Deadline: {{ $tender->deadline->format('F d, Y') }}</p>
                            @endif
                        </div>
                        @if ($tender->file_path)
                            <a href="{{ asset('storage/' . $tender->file_path) }}" target="_blank"
                                class="px-6 py-2.5 bg-primary text-white rounded-lg font-bold text-sm hover:brightness-110 active:scale-95 transition-all flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-sm">download</span> Download RFP
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-12 text-center">
                <span class="material-symbols-outlined text-4xl text-outline block mb-3">description</span>
                <p class="text-on-surface-variant">No active tenders at this time. Please check back later.</p>
            </div>
        @endif
    </div>
</main>
@endsection
