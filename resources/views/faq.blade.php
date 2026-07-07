@extends('layouts.app')

@section('title', 'FAQ | Mahendra Secondary School')

@section('content')
<main class="pt-32 pb-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto space-y-12">
    <div class="border-b border-outline-variant pb-6 space-y-2">
        <span class="text-primary font-bold tracking-widest font-label-sm uppercase">Knowledge Base</span>
        <h2 class="font-display-lg text-3xl md:text-4xl font-extrabold text-on-surface">Frequently Asked Questions</h2>
        <div class="w-16 h-1 bg-secondary rounded-full"></div>
    </div>

    @if ($faqs->count())
        <div class="space-y-4 max-w-4xl">
            @foreach ($faqs as $faq)
                <div class="bg-surface-container-lowest rounded-xl border border-outline-variant overflow-hidden">
                    <button onclick="toggleFaq(this)" class="w-full flex items-center justify-between p-6 text-left hover:bg-surface-container transition-colors">
                        <h3 class="font-headline-md text-headline-md font-bold text-on-surface pr-4">{{ $faq->question }}</h3>
                        <span class="material-symbols-outlined text-secondary transition-transform duration-300">expand_more</span>
                    </button>
                    <div class="faq-answer hidden px-6 pb-6">
                        <div class="border-t border-outline-variant pt-4 text-on-surface-variant text-body-md leading-relaxed">
                            {{ $faq->answer }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-16 text-on-surface-variant">
            <span class="material-symbols-outlined text-5xl block mb-3">help</span>
            <p>No FAQs available at this time.</p>
        </div>
    @endif
</main>
@endsection

@push('scripts')
<script>
function toggleFaq(btn) {
    var answer = btn.nextElementSibling;
    var icon = btn.querySelector('.material-symbols-outlined');
    answer.classList.toggle('hidden');
    icon.style.transform = answer.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
}
</script>
@endpush
