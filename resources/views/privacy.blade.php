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
@endsection
