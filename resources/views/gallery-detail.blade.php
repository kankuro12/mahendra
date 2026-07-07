@extends('layouts.app')

@section('title', $album['title'] . ' | Mahendra Secondary School')

@section('content')
<main class="pt-32 pb-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
    <!-- Breadcrumbs -->
    <nav class="flex items-center gap-2 text-on-surface-variant font-label-md mb-6">
        <a class="hover:text-primary transition-colors" href="{{ route('home') }}">Home</a>
        <span class="material-symbols-outlined text-sm">chevron_right</span>
        <a class="hover:text-primary transition-colors" href="{{ route('gallery') }}">Gallery</a>
        <span class="material-symbols-outlined text-sm">chevron_right</span>
        <span class="text-primary font-bold">{{ $album['title'] }}</span>
    </nav>

    <!-- Header Section -->
    <div class="space-y-4 mb-16">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-outline-variant pb-6">
            <div class="space-y-2">
                <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-bold">{{ $album['date'] }}</span>
                <h2 class="font-display-lg text-3xl md:text-4xl font-extrabold text-on-surface leading-tight">
                    {{ $album['title'] }}
                </h2>
            </div>
            <a href="{{ route('gallery') }}" class="inline-flex items-center gap-1 text-secondary font-bold hover:text-primary transition-colors text-sm">
                <span class="material-symbols-outlined text-sm">arrow_back</span> Back to Gallery
            </a>
        </div>
        <p class="text-on-surface-variant max-w-3xl leading-relaxed text-base font-body-md">
            {{ $album['description'] }}
        </p>
    </div>

    <!-- YouTube Video (If available) -->
    @if($album['youtube'])
    <div class="mb-16 space-y-6">
        <h3 class="font-headline-md text-xl font-bold text-on-surface flex items-center gap-2">
            <span class="material-symbols-outlined text-primary">video_library</span> Video Highlights
        </h3>
        <div class="max-w-4xl mx-auto aspect-[16/9] rounded-2xl overflow-hidden shadow-lg border border-outline-variant">
            <iframe class="w-full h-full" src="{{ $album['youtube'] }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
    @endif

    <!-- Image Grid -->
    <div class="space-y-6">
        <h3 class="font-headline-md text-xl font-bold text-on-surface flex items-center gap-2">
            <span class="material-symbols-outlined text-primary">photo_library</span> Photo Album ({{ count($album['images']) }} Photos)
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-gutter">
            @foreach($album['images'] as $img)
            <div class="group cursor-pointer rounded-xl overflow-hidden border border-outline-variant shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 relative" onclick="openLightbox('{{ asset($img) }}')">
                <div class="aspect-[4/3] overflow-hidden bg-surface-dim">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ asset($img) }}" alt="Gallery Image">
                </div>
                <!-- Hover magnifying glass overlay -->
                <div class="absolute inset-0 bg-primary/10 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <div class="bg-white/95 p-3 rounded-full shadow-lg">
                        <span class="material-symbols-outlined text-primary text-xl">zoom_in</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>

<!-- Lightbox Modal -->
<div id="lightbox-modal" class="hidden fixed inset-0 z-50 bg-black/95 flex items-center justify-center p-4">
    <button class="absolute top-6 right-6 text-white hover:text-primary active:scale-95 transition-transform" onclick="closeLightbox()">
        <span class="material-symbols-outlined text-4xl">close</span>
    </button>
    <div class="max-w-5xl max-h-[80vh] flex items-center justify-center">
        <img id="lightbox-img" class="max-w-full max-h-[80vh] rounded-lg object-contain shadow-2xl" src="" alt="Lightbox View">
    </div>
</div>
@endsection

@push('scripts')
<script>
function openLightbox(imgSrc) {
    const modal = document.getElementById('lightbox-modal');
    const img = document.getElementById('lightbox-img');
    if (modal && img) {
        img.src = imgSrc;
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }
}

function closeLightbox() {
    const modal = document.getElementById('lightbox-modal');
    if (modal) {
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
}

// Close lightbox on pressing Escape key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        closeLightbox();
    }
});
</script>
@endpush
