@extends('layouts.app')

@section('title', 'Notice Board | Mahendra Secondary School')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/pages/notice.css') }}">
@endpush

@section('content')

<main class="pt-32 pb-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
<!-- Hero Title Section -->
<div class="mb-12">
<h2 class="font-display-lg text-display-lg text-primary mb-4">Institutional Notices</h2>
<p class="text-on-surface-variant max-w-2xl text-body-lg font-body-lg">Stay updated with the latest academic announcements, examination schedules, and administrative updates from Mahendra Secondary School.</p>
</div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
<!-- Main Content: Notice List -->
<div class="lg:col-span-8 order-2 lg:order-1">
<!-- Filters & Search -->
<div class="bg-surface-container-low p-6 rounded-xl border border-outline-variant mb-8 flex flex-col md:flex-row gap-4 items-center justify-between">
<div class="relative w-full md:w-96">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
<input class="w-full pl-10 pr-4 py-2 rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary focus:border-transparent bg-surface-container-lowest outline-none font-body-md" placeholder="Search notices by title or keyword..." type="text"/>
</div>
<div class="flex gap-2 overflow-x-auto w-full md:w-auto pb-2 md:pb-0">
<button class="bg-primary text-on-primary px-4 py-1.5 rounded-full font-label-sm text-label-sm whitespace-nowrap">All</button>
<button class="bg-white border border-outline-variant text-on-surface-variant px-4 py-1.5 rounded-full font-label-sm text-label-sm hover:bg-surface-container transition-colors whitespace-nowrap">Exam</button>
<button class="bg-white border border-outline-variant text-on-surface-variant px-4 py-1.5 rounded-full font-label-sm text-label-sm hover:bg-surface-container transition-colors whitespace-nowrap">Admission</button>
<button class="bg-white border border-outline-variant text-on-surface-variant px-4 py-1.5 rounded-full font-label-sm text-label-sm hover:bg-surface-container transition-colors whitespace-nowrap">Holiday</button>
</div>
</div>
<!-- Notices Table/List -->
<div class="bg-white rounded-xl border border-outline-variant overflow-hidden shadow-sm">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead class="bg-surface-container-high border-b border-outline-variant">
<tr>
<th class="px-6 py-4 font-label-md text-label-md text-on-surface uppercase tracking-wider">Date</th>
<th class="px-6 py-4 font-label-md text-label-md text-on-surface uppercase tracking-wider">Notice Title</th>
<th class="px-6 py-4 font-label-md text-label-md text-on-surface uppercase tracking-wider">Category</th>
<th class="px-6 py-4 font-label-md text-label-md text-on-surface uppercase tracking-wider text-center">Action</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant">
<!-- Notice 1 -->
<tr class="notice-row hover:bg-surface-bright transition-colors group">
<td class="px-6 py-5 whitespace-nowrap">
<div class="flex flex-col">
<span class="text-on-surface font-semibold">Oct 24</span>
<span class="text-on-surface-variant text-label-sm">2024</span>
</div>
</td>
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary" data-weight="fill">campaign</span>
<p class="text-on-surface font-medium line-clamp-1">Annual Examination Schedule for Grades 8-10 (2024)</p>
</div>
</td>
<td class="px-6 py-5">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-secondary-fixed text-on-secondary-fixed">Exam</span>
</td>
<td class="px-6 py-5 text-center">
<button class="download-btn w-10 h-10 inline-flex items-center justify-center rounded-full text-primary border border-primary hover:bg-primary hover:text-white transition-all duration-300">
<span class="material-symbols-outlined">picture_as_pdf</span>
</button>
</td>
</tr>
<!-- Notice 2 -->
<tr class="notice-row hover:bg-surface-bright transition-colors">
<td class="px-6 py-5 whitespace-nowrap">
<div class="flex flex-col">
<span class="text-on-surface font-semibold">Oct 20</span>
<span class="text-on-surface-variant text-label-sm">2024</span>
</div>
</td>
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary" data-weight="fill">school</span>
<p class="text-on-surface font-medium line-clamp-1">Class 11 Science Stream Admission Merit List - Phase 2</p>
</div>
</td>
<td class="px-6 py-5">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-tertiary-fixed text-on-tertiary-fixed">Admission</span>
</td>
<td class="px-6 py-5 text-center">
<button class="download-btn w-10 h-10 inline-flex items-center justify-center rounded-full text-primary border border-primary hover:bg-primary hover:text-white transition-all duration-300">
<span class="material-symbols-outlined">visibility</span>
</button>
</td>
</tr>
<!-- Notice 3 -->
<tr class="notice-row hover:bg-surface-bright transition-colors">
<td class="px-6 py-5 whitespace-nowrap">
<div class="flex flex-col">
<span class="text-on-surface font-semibold">Oct 15</span>
<span class="text-on-surface-variant text-label-sm">2024</span>
</div>
</td>
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary" data-weight="fill">celebration</span>
<p class="text-on-surface font-medium line-clamp-1">Notice regarding Dashain and Tihar Festival Holidays</p>
</div>
</td>
<td class="px-6 py-5">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-error-container text-on-error-container">Holiday</span>
</td>
<td class="px-6 py-5 text-center">
<button class="download-btn w-10 h-10 inline-flex items-center justify-center rounded-full text-primary border border-primary hover:bg-primary hover:text-white transition-all duration-300">
<span class="material-symbols-outlined">picture_as_pdf</span>
</button>
</td>
</tr>
<!-- Notice 4 -->
<tr class="notice-row hover:bg-surface-bright transition-colors">
<td class="px-6 py-5 whitespace-nowrap">
<div class="flex flex-col">
<span class="text-on-surface font-semibold">Oct 12</span>
<span class="text-on-surface-variant text-label-sm">2024</span>
</div>
</td>
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary" data-weight="fill">sports_basketball</span>
<p class="text-on-surface font-medium line-clamp-1">Inter-School Volleyball Tournament Selection Trials</p>
</div>
</td>
<td class="px-6 py-5">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-surface-container-highest text-on-surface">Event</span>
</td>
<td class="px-6 py-5 text-center">
<button class="download-btn w-10 h-10 inline-flex items-center justify-center rounded-full text-primary border border-primary hover:bg-primary hover:text-white transition-all duration-300">
<span class="material-symbols-outlined">picture_as_pdf</span>
</button>
</td>
</tr>
<!-- Notice 5 -->
<tr class="notice-row hover:bg-surface-bright transition-colors">
<td class="px-6 py-5 whitespace-nowrap">
<div class="flex flex-col">
<span class="text-on-surface font-semibold">Oct 05</span>
<span class="text-on-surface-variant text-label-sm">2024</span>
</div>
</td>
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary" data-weight="fill">groups</span>
<p class="text-on-surface font-medium line-clamp-1">Mandatory Parent-Teacher Meeting (PTM) for Grade 12</p>
</div>
</td>
<td class="px-6 py-5">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-secondary-fixed text-on-secondary-fixed">General</span>
</td>
<td class="px-6 py-5 text-center">
<button class="download-btn w-10 h-10 inline-flex items-center justify-center rounded-full text-primary border border-primary hover:bg-primary hover:text-white transition-all duration-300">
<span class="material-symbols-outlined">visibility</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Pagination -->
<div class="mt-8 flex items-center justify-between">
<p class="text-on-surface-variant font-label-md text-label-md">Showing 1-10 of 48 notices</p>
<div class="flex gap-2">
<button class="px-4 py-2 border border-outline-variant rounded-lg hover:bg-surface-container transition-colors disabled:opacity-50 disabled:cursor-not-allowed">Previous</button>
<button class="px-4 py-2 bg-primary text-on-primary rounded-lg font-bold">1</button>
<button class="px-4 py-2 border border-outline-variant rounded-lg hover:bg-surface-container transition-colors">2</button>
<button class="px-4 py-2 border border-outline-variant rounded-lg hover:bg-surface-container transition-colors">3</button>
<button class="px-4 py-2 border border-outline-variant rounded-lg hover:bg-surface-container transition-colors">Next</button>
</div>
</div>
</div>
<!-- Sidebar -->
<aside class="lg:col-span-4 space-y-8 order-1 lg:order-2">
<!-- Latest Notices Card -->
<div class="bg-white rounded-xl border border-outline-variant p-6 shadow-sm">
<div class="flex items-center gap-2 mb-6 text-primary">
<span class="material-symbols-outlined" data-weight="fill">new_releases</span>
<h3 class="font-headline-md text-headline-md font-bold">Latest Updates</h3>
</div>
<ul class="space-y-4">
<li>
<a class="group block border-l-2 border-primary pl-4 py-1 hover:bg-surface-bright transition-colors rounded-r-lg" href="#">
<span class="block text-xs text-on-surface-variant font-semibold">2 hours ago</span>
<p class="text-on-surface font-medium group-hover:text-primary transition-colors">Emergency Notice: School closed due to local administrative orders.</p>
</a>
</li>
<li>
<a class="group block border-l-2 border-outline pl-4 py-1 hover:bg-surface-bright transition-colors rounded-r-lg" href="#">
<span class="block text-xs text-on-surface-variant font-semibold">1 day ago</span>
<p class="text-on-surface font-medium group-hover:text-primary transition-colors">Revised Syllabus for Computer Science (Grade 11).</p>
</a>
</li>
<li>
<a class="group block border-l-2 border-outline pl-4 py-1 hover:bg-surface-bright transition-colors rounded-r-lg" href="#">
<span class="block text-xs text-on-surface-variant font-semibold">2 days ago</span>
<p class="text-on-surface font-medium group-hover:text-primary transition-colors">Staff meeting regarding national education policy changes.</p>
</a>
</li>
</ul>
<a class="mt-6 inline-flex items-center gap-2 text-primary font-bold hover:underline" href="#">
                        View all updates
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
</a>
</div>
<!-- Archive Sidebar -->
<div class="bg-surface-container p-6 rounded-xl border border-outline-variant">
<h3 class="font-headline-md text-headline-md font-bold text-on-surface mb-4">Archive</h3>
<div class="space-y-2 max-h-64 overflow-y-auto pr-2 custom-scrollbar">
<details class="group border-b border-outline-variant py-2">
<summary class="flex justify-between items-center cursor-pointer list-none font-medium text-on-surface">
<span>Academic Year 2023-24</span>
<span class="material-symbols-outlined group-open:rotate-180 transition-transform">expand_more</span>
</summary>
<div class="mt-2 pl-4 space-y-1">
<a class="block text-on-surface-variant hover:text-primary transition-colors" href="{{ route('notice') }}">Term 1 Notices</a>
<a class="block text-on-surface-variant hover:text-primary transition-colors" href="{{ route('notice') }}">Term 2 Notices</a>
<a class="block text-on-surface-variant hover:text-primary transition-colors" href="{{ route('notice') }}">Term 3 Notices</a>
</div>
</details>
<details class="group border-b border-outline-variant py-2">
<summary class="flex justify-between items-center cursor-pointer list-none font-medium text-on-surface">
<span>Academic Year 2022-23</span>
<span class="material-symbols-outlined group-open:rotate-180 transition-transform">expand_more</span>
</summary>
<div class="mt-2 pl-4 space-y-1">
<a class="block text-on-surface-variant hover:text-primary transition-colors" href="{{ route('notice') }}">Annual Notices</a>
<a class="block text-on-surface-variant hover:text-primary transition-colors" href="#">Examination Results</a>
</div>
</details>
<a class="block py-2 font-medium text-on-surface hover:text-primary transition-colors border-b border-outline-variant" href="#">Academic Year 2021-22</a>
<a class="block py-2 font-medium text-on-surface hover:text-primary transition-colors border-b border-outline-variant" href="#">Pre-Pandemic Archive</a>
</div>
</div>
<!-- Contact Support Card -->
<div class="bg-primary p-6 rounded-xl text-on-primary">
<h4 class="font-headline-md text-headline-md font-bold mb-2">Can't find a notice?</h4>
<p class="text-on-primary/80 mb-4 font-body-md">Contact the school administration office for physical copies or historical records.</p>
<div class="space-y-2">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm">phone</span>
<span class="text-label-md">+977-01-XXXXXXX</span>
</div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm">mail</span>
<span class="text-label-md">info@mahendra.edu.np</span>
</div>
</div>
</div>
</aside>
</div>
</main>
<!-- Footer -->
<footer class="w-full bg-surface-container-highest dark:bg-inverse-surface border-t border-outline-variant dark:border-outline">
<div class="w-full py-12 px-margin-desktop grid grid-cols-1 md:grid-cols-4 gap-gutter max-w-container-max mx-auto">
<div class="col-span-1 md:col-span-1">
<h2 class="font-headline-md text-headline-md font-bold text-primary dark:text-primary-fixed mb-4">Mahendra School</h2>
<p class="font-body-md text-body-md text-on-surface-variant dark:text-surface-variant mb-6">Empowering minds through quality education and discipline since 1956. A leading government-affiliated institution.</p>
<div class="flex gap-4">
<a class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white hover:brightness-110 transition-all" href="#"><span class="material-symbols-outlined text-sm">public</span></a>
<a class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white hover:brightness-110 transition-all" href="#"><span class="material-symbols-outlined text-sm">alternate_email</span></a>
<a class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white hover:brightness-110 transition-all" href="#"><span class="material-symbols-outlined text-sm">share</span></a>
</div>
</div>
<div>
<h4 class="font-label-md text-label-md font-bold text-on-surface mb-6 uppercase tracking-widest">Resources</h4>
<ul class="space-y-3 font-body-md text-body-md text-on-surface-variant dark:text-surface-variant">
<li><a class="hover:text-primary dark:hover:text-primary-fixed hover:underline transition-all" href="{{ route('notice') }}">Academic Calendar</a></li>
<li><a class="hover:text-primary dark:hover:text-primary-fixed hover:underline transition-all" href="{{ route('teachers') }}">Staff Directory</a></li>
<li><a class="hover:text-primary dark:hover:text-primary-fixed hover:underline transition-all" href="#">Student Portal</a></li>
<li><a class="hover:text-primary dark:hover:text-primary-fixed hover:underline transition-all" href="#">Admission Help</a></li>
</ul>
</div>
<div>
<h4 class="font-label-md text-label-md font-bold text-on-surface mb-6 uppercase tracking-widest">Institution</h4>
<ul class="space-y-3 font-body-md text-body-md text-on-surface-variant dark:text-surface-variant">
<li><a class="hover:text-primary dark:hover:text-primary-fixed hover:underline transition-all" href="#">Privacy Policy</a></li>
<li><a class="hover:text-primary dark:hover:text-primary-fixed hover:underline transition-all" href="#">Tenders</a></li>
<li><a class="hover:text-primary dark:hover:text-primary-fixed hover:underline transition-all" href="#">School Constitution</a></li>
<li><a class="hover:text-primary dark:hover:text-primary-fixed hover:underline transition-all" href="{{ route('contact') }}">Contact Us</a></li>
</ul>
</div>
<div>
<h4 class="font-label-md text-label-md font-bold text-on-surface mb-6 uppercase tracking-widest">Quick Apply</h4>
<div class="bg-surface-container-low p-4 rounded-lg border border-outline-variant">
<p class="text-label-sm text-on-surface-variant mb-3">Subscribe for the latest notices sent to your email.</p>
<div class="flex flex-col gap-2">
<input class="w-full px-3 py-2 border border-outline-variant rounded bg-white text-sm" placeholder="Email Address" type="email"/>
<button class="bg-primary text-on-primary py-2 rounded font-bold text-sm hover:brightness-110 transition-all">Subscribe</button>
</div>
</div>
</div>
<div class="col-span-full mt-12 pt-8 border-t border-outline-variant flex flex-col md:flex-row justify-between items-center gap-4">
<p class="font-label-sm text-label-sm text-on-surface-variant dark:text-surface-variant">© 2024 Mahendra Secondary School. Affiliated with the Government of Nepal.</p>
<div class="flex gap-6">
<a class="font-label-sm text-label-sm text-on-surface-variant hover:text-primary transition-colors" href="#">Terms of Service</a>
<a class="font-label-sm text-label-sm text-on-surface-variant hover:text-primary transition-colors" href="#">Sitemap</a>
</div>
</div>
</div>
</footer>
<!-- Micro-interaction Scripts -->
@endsection

@push('scripts')
<script src="{{ asset('assets/js/pages/notice.js') }}" defer></script>
@endpush
