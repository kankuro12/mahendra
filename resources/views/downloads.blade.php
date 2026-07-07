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
@endsection
