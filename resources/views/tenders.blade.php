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
