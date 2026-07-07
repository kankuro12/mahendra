@extends('layouts.app')

@section('title', 'Tenders & Procurement | Mahendra Secondary School')

@section('content')
<main class="pt-32 pb-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto space-y-12">
    <!-- Header Section -->
    <div class="border-b border-outline-variant pb-6 space-y-2">
        <span class="text-primary font-bold tracking-widest font-label-sm uppercase">Procurement Notices</span>
        <h2 class="font-display-lg text-3xl md:text-4xl font-extrabold text-on-surface">Tenders & Bidding</h2>
        <div class="w-16 h-1 bg-secondary rounded-full"></div>
    </div>

    <!-- Active Tenders -->
    <div class="space-y-6">
        <h3 class="font-headline-md text-xl font-bold text-on-surface">Active Procurement Projects</h3>
        
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant overflow-hidden shadow-sm">
            <div class="p-6 md:p-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-6 border-b border-outline-variant last:border-0">
                <div class="space-y-2">
                    <span class="bg-error/15 text-error px-3 py-1 rounded-full text-xs font-bold uppercase">Urgent</span>
                    <h4 class="font-bold text-lg text-on-surface">Construction of Chemistry Laboratory Block C</h4>
                    <p class="text-sm text-on-surface-variant">Procurement Reference: MSS/W/02-2024</p>
                    <p class="text-xs text-outline font-semibold">Deadline: November 15, 2024</p>
                </div>
                <a href="#" class="px-6 py-2.5 bg-primary text-white rounded-lg font-bold text-sm hover:brightness-110 active:scale-95 transition-all">Download RFP</a>
            </div>

            <div class="p-6 md:p-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-6 border-b border-outline-variant last:border-0">
                <div class="space-y-2">
                    <span class="bg-secondary/15 text-secondary px-3 py-1 rounded-full text-xs font-bold uppercase">Standard</span>
                    <h4 class="font-bold text-lg text-on-surface">Supply & Commissioning of E-Library Server Terminals</h4>
                    <p class="text-sm text-on-surface-variant">Procurement Reference: MSS/G/05-2024</p>
                    <p class="text-xs text-outline font-semibold">Deadline: November 30, 2024</p>
                </div>
                <a href="#" class="px-6 py-2.5 bg-primary text-white rounded-lg font-bold text-sm hover:brightness-110 active:scale-95 transition-all">Download RFP</a>
            </div>
        </div>
    </div>
</main>
@endsection
