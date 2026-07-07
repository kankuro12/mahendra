@extends('layouts.app')

@section('title', 'Download Center | Mahendra Secondary School')

@section('content')
<main class="pt-32 pb-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto space-y-12">
    <!-- Header Section -->
    <div class="border-b border-outline-variant pb-6 space-y-2">
        <span class="text-primary font-bold tracking-widest font-label-sm uppercase">Academic Resources</span>
        <h2 class="font-display-lg text-3xl md:text-4xl font-extrabold text-on-surface">Download Center</h2>
        <div class="w-16 h-1 bg-secondary rounded-full"></div>
    </div>

    <!-- Downloads List -->
    <div class="bg-white rounded-xl border border-outline-variant overflow-hidden shadow-sm">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-surface-container border-b border-outline-variant font-label-md text-label-md text-on-surface uppercase">
                    <th class="px-6 py-4">Document Title</th>
                    <th class="px-6 py-4">Format &amp; Size</th>
                    <th class="px-6 py-4 text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline-variant text-sm text-on-surface-variant font-body-md">
                <tr>
                    <td class="px-6 py-5 font-bold text-on-surface">MSS Admission Request Form 2024-25</td>
                    <td class="px-6 py-5">PDF (1.2 MB)</td>
                    <td class="px-6 py-5 text-right">
                        <a href="#" class="inline-flex items-center gap-1 text-primary font-bold hover:underline"><span class="material-symbols-outlined text-sm">download</span> Download</a>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-5 font-bold text-on-surface">Academic Calendar &amp; Holidays Schedule</td>
                    <td class="px-6 py-5">PDF (850 KB)</td>
                    <td class="px-6 py-5 text-right">
                        <a href="#" class="inline-flex items-center gap-1 text-primary font-bold hover:underline"><span class="material-symbols-outlined text-sm">download</span> Download</a>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-5 font-bold text-on-surface">SEE Examination Model Questions 2081</td>
                    <td class="px-6 py-5">PDF (3.4 MB)</td>
                    <td class="px-6 py-5 text-right">
                        <a href="#" class="inline-flex items-center gap-1 text-primary font-bold hover:underline"><span class="material-symbols-outlined text-sm">download</span> Download</a>
                    </td>
                </tr>
            </tbody>
        </table>
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
