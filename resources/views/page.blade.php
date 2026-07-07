@extends('layouts.app')

@section('title', $page->title . ' | Mahendra Secondary School')

@section('content')
<main class="pt-32 pb-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto space-y-12">
    <div class="border-b border-outline-variant pb-6 space-y-2">
        <h2 class="font-display-lg text-3xl md:text-4xl font-extrabold text-on-surface">{{ $page->title }}</h2>
        <div class="w-16 h-1 bg-secondary rounded-full"></div>
    </div>

    <article class="bg-surface-container-lowest p-8 md:p-12 rounded-2xl border border-outline-variant shadow-sm leading-relaxed text-base content-styles">
        {!! $page->content !!}
    </article>
</main>
@endsection

@push('styles')
<style>
.content-styles h1, .content-styles h2, .content-styles h3, .content-styles h4 {
    font-weight: 700;
    color: #191c1e;
    margin-top: 1.5em;
    margin-bottom: 0.5em;
}
.content-styles h2 { font-size: 1.5rem; }
.content-styles h3 { font-size: 1.25rem; }
.content-styles p { margin-bottom: 1em; color: #5c3f3f; line-height: 1.7; }
.content-styles ul, .content-styles ol { padding-left: 1.5rem; margin-bottom: 1em; color: #5c3f3f; }
.content-styles li { margin-bottom: 0.25em; }
.content-styles a { color: #b1002c; text-decoration: underline; }
.content-styles a:hover { color: #920022; }
.content-styles blockquote {
    border-left: 4px solid #b1002c;
    padding-left: 1rem;
    margin: 1em 0;
    color: #5c3f3f;
    font-style: italic;
}
.content-styles table { width: 100%; border-collapse: collapse; margin-bottom: 1em; }
.content-styles th, .content-styles td {
    border: 1px solid #e0e3e5;
    padding: 0.75rem;
    text-align: left;
}
.content-styles th { background: #f7f9fb; font-weight: 600; }
.content-styles img { max-width: 100%; height: auto; border-radius: 0.5rem; margin: 1em 0; }
</style>
@endpush
