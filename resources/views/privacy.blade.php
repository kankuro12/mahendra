@extends('layouts.app')

@section('title', 'Privacy Policy | Mahendra Secondary School')

@section('content')
<main class="pt-32 pb-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto space-y-12">
    <!-- Header Section -->
    <div class="border-b border-outline-variant pb-6 space-y-2">
        <span class="text-primary font-bold tracking-widest font-label-sm uppercase">Legal & Compliance</span>
        <h2 class="font-display-lg text-3xl md:text-4xl font-extrabold text-on-surface">Privacy Policy</h2>
        <div class="w-16 h-1 bg-secondary rounded-full"></div>
    </div>

    <!-- Policy Content -->
    <article class="bg-surface-container-lowest p-8 md:p-12 rounded-2xl border border-outline-variant shadow-sm space-y-8 text-on-surface-variant leading-relaxed text-base">
        <section class="space-y-4">
            <h3 class="font-headline-md text-xl font-bold text-on-surface">1. Introduction</h3>
            <p>At Mahendra Secondary School, we value the privacy of our students, parents, staff, and visitors. This Privacy Policy outlines the types of personal data we collect, how we use it, and the security measures we take to protect your information.</p>
        </section>

        <section class="space-y-4">
            <h3 class="font-headline-md text-xl font-bold text-on-surface">2. Data We Collect</h3>
            <p>We may collect personal identification information through our student information portal, contact forms, or EMIS login portals. This data includes:</p>
            <ul class="list-disc pl-6 space-y-2">
                <li>Student and Parent names, mailing addresses, email addresses, and contact numbers.</li>
                <li>Academic records, attendance logs, and student performance metrics.</li>
                <li>Emergency contact details and medical information for student safety.</li>
            </ul>
        </section>

        <section class="space-y-4">
            <h3 class="font-headline-md text-xl font-bold text-on-surface">3. How We Use Your Data</h3>
            <p>Your information is used solely to support student learning, manage academic operations, send emergency notifications, process admissions, and improve official school portals. We do not sell or share student data with unauthorized third parties.</p>
        </section>

        <section class="space-y-4">
            <h3 class="font-headline-md text-xl font-bold text-on-surface">4. Security Measures</h3>
            <p>We implement secure database encryption, firewalls, and strict user authentication roles to ensure student files and academic data remain confidential and protected from unauthorized access.</p>
        </section>

        <div class="pt-6 border-t border-outline-variant/50">
            <p class="text-xs text-outline font-semibold">Last Updated: October 2024</p>
        </div>
    </article>
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
