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
                        @foreach($notices as $notice)
                        <tr class="notice-row hover:bg-surface-bright transition-colors group">
                            <td class="px-6 py-5 whitespace-nowrap">
                                <div class="flex flex-col">
                                    <span class="text-on-surface font-semibold">{{ $notice['published_at']?->format('M d') ?? '--' }}</span>
                                    <span class="text-on-surface-variant text-label-sm">{{ $notice['published_at']?->format('Y') ?? '--' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-primary" data-weight="fill">campaign</span>
                                    <p class="text-on-surface font-medium line-clamp-1">{{ $notice['title'] }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                @if($notice['is_urgent'])
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-error-container text-on-error-container">Urgent</span>
                                @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-secondary-fixed text-on-secondary-fixed">Notice</span>
                                @endif
                            </td>
                            <td class="px-6 py-5 text-center">
                                <button class="download-btn w-10 h-10 inline-flex items-center justify-center rounded-full text-primary border border-primary hover:bg-primary hover:text-white transition-all duration-300">
                                    <span class="material-symbols-outlined">visibility</span>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
</table>
</div>
</div>
<!-- Pagination -->
<div class="mt-8 flex items-center justify-between">
                    <p class="text-on-surface-variant font-label-md text-label-md">Showing {{ $notices->count() }} notice(s)</p>
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
                        @foreach($notices->take(5) as $notice)
                        <li>
                            <a class="group block border-l-2 {{ $notice['is_urgent'] ? 'border-primary' : 'border-outline' }} pl-4 py-1 hover:bg-surface-bright transition-colors rounded-r-lg" href="#">
                                <span class="block text-xs text-on-surface-variant font-semibold">{{ $notice['published_at']->diffForHumans() }}</span>
                                <p class="text-on-surface font-medium group-hover:text-primary transition-colors">{{ Str::limit($notice['title'], 60) }}</p>
                            </a>
                        </li>
                        @endforeach
                    </ul>
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
@endsection

@push('scripts')
<script src="{{ asset('assets/js/pages/notice.js') }}" defer></script>
@endpush
