@extends('layouts.app')

@section('title', 'Download Center | Mahendra Secondary School')

@section('content')
<main class="pt-32 pb-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto space-y-12">
    <div class="border-b border-outline-variant pb-6 space-y-2">
        <span class="text-primary font-bold tracking-widest font-label-sm uppercase">Academic Resources</span>
        <h2 class="font-display-lg text-3xl md:text-4xl font-extrabold text-on-surface">Download Center</h2>
        <div class="w-16 h-1 bg-secondary rounded-full"></div>
    </div>

    @if ($downloads->count())
        <div class="bg-white rounded-xl border border-outline-variant overflow-hidden shadow-sm">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-container border-b border-outline-variant font-label-md text-label-md text-on-surface uppercase">
                        <th class="px-6 py-4">Document Title</th>
                        <th class="px-6 py-4">Description</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant text-sm text-on-surface-variant font-body-md">
                    @foreach ($downloads as $doc)
                        <tr>
                            <td class="px-6 py-5 font-bold text-on-surface">{{ $doc->title }}</td>
                            <td class="px-6 py-5">{{ $doc->description ?? '--' }}</td>
                            <td class="px-6 py-5 text-right">
                                @if ($doc->file_path)
                                    <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank"
                                        class="inline-flex items-center gap-1 text-primary font-bold hover:underline">
                                        <span class="material-symbols-outlined text-sm">download</span> Download
                                    </a>
                                @else
                                    <span class="text-gray-400 text-xs">No file</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="bg-white rounded-xl border border-outline-variant p-12 text-center">
            <span class="material-symbols-outlined text-4xl text-outline block mb-3">file_download</span>
            <p class="text-on-surface-variant">No downloads available at this time.</p>
        </div>
    @endif
</main>
@endsection
