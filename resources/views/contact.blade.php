@extends('layouts.app')

@section('title', 'Contact Us | Mahendra Secondary School')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/contact.css') }}">
@endpush

@section('content')
    <main>
        <!-- Hero Section -->
        <section class="hero-gradient pt-32 pb-16 md:pt-40 md:pb-24 border-b border-outline-variant">
            <div class="max-w-container-max mx-auto px-gutter text-center">
                <h1 class="font-display-lg text-display-lg md:text-display-lg mb-4 text-on-background">Get in Touch</h1>
                <p class="max-w-2xl mx-auto text-on-surface-variant font-body-lg text-body-lg">
                    Have questions about our curriculum, admissions, or campus life? Our administrative team is here to help
                    you navigate your educational journey.
                </p>
            </div>
        </section>
        <!-- Main Content: Bento Grid Layout -->
        <section class="py-20 max-w-container-max mx-auto px-gutter">
            @if (session('success'))
                <div class="mb-6 px-6 py-4 bg-green-50 border border-green-200 text-green-700 rounded-lg text-center font-medium">
                    {{ session('success') }}
                </div>
            @endif
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
                <!-- Contact Information Cards (Left Side) -->
                <div class="lg:col-span-5 space-y-gutter">
                    <!-- Addresses Card -->
                    @if (count($addresses))
                        @foreach ($addresses as $addr)
                            <div class="bg-surface-container-lowest p-8 rounded-xl border border-outline-variant shadow-ambient hover:border-secondary transition-all duration-300">
                                <div class="flex items-start gap-6">
                                    <div class="bg-secondary-container/10 p-3 rounded-lg text-secondary">
                                        <span class="material-symbols-outlined text-3xl">location_on</span>
                                    </div>
                                    <div>
                                        <h3 class="font-headline-md text-headline-md text-on-background mb-2">{{ $addr['label'] ?? 'Our Location' }}</h3>
                                        <p class="text-on-surface-variant font-body-md text-body-md leading-relaxed">
                                            {{ $addr['address'] ?? '' }}<br>
                                            @if (!empty($addr['map']))
                                                <a href="{{ $addr['map'] }}" target="_blank" class="text-secondary font-bold text-sm hover:underline mt-2 inline-block">Get Directions</a>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    <!-- Contact Details Card -->
                    <div class="bg-surface-container-lowest p-8 rounded-xl border border-outline-variant shadow-ambient hover:border-secondary transition-all duration-300">
                        <div class="flex items-start gap-6">
                            <div class="bg-primary-container/10 p-3 rounded-lg text-primary">
                                <span class="material-symbols-outlined text-3xl">contact_support</span>
                            </div>
                            <div class="w-full">
                                <h3 class="font-headline-md text-headline-md text-on-background mb-4">Direct Contact</h3>
                                <div class="space-y-4">
                                    @foreach ($phones as $phone)
                                        <div class="flex justify-between items-center border-b border-outline-variant pb-3">
                                            <span class="font-label-md text-on-surface-variant">{{ $phone['label'] ?? 'Phone' }}</span>
                                            <span class="font-body-md font-semibold text-on-background">{{ $phone['number'] ?? $phone }}</span>
                                        </div>
                                    @endforeach
                                    @foreach ($emails as $email)
                                        <div class="flex justify-between items-center {{ $loop->last ? '' : 'border-b border-outline-variant pb-3' }}">
                                            <span class="font-label-md text-on-surface-variant">{{ $email['label'] ?? 'Email' }}</span>
                                            <span class="font-body-md font-semibold text-on-background">{{ $email['address'] ?? $email }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Office Hours Card -->
                    @if (count($hours))
                        <div class="bg-surface-container-lowest p-8 rounded-xl border border-outline-variant shadow-ambient hover:border-secondary transition-all duration-300">
                            <div class="flex items-start gap-6">
                                <div class="bg-tertiary-container/10 p-3 rounded-lg text-tertiary">
                                    <span class="material-symbols-outlined text-3xl">schedule</span>
                                </div>
                                <div class="w-full">
                                    <h3 class="font-headline-md text-headline-md text-on-background mb-4">Office Hours</h3>
                                    <ul class="space-y-2">
                                        @foreach ($hours as $hour)
                                            <li class="flex justify-between text-body-md">
                                                <span class="text-on-surface-variant">{{ $hour['day'] ?? '' }}</span>
                                                <span class="font-semibold">{{ $hour['time'] ?? '' }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Contact Form (Right Side) -->
                <div class="lg:col-span-7">
                    <div class="bg-surface-container-lowest p-8 md:p-12 rounded-xl border border-outline-variant shadow-ambient h-full">
                        <div class="mb-8">
                            <h2 class="font-headline-lg text-headline-lg text-on-background mb-2">Send a Message</h2>
                            <p class="text-on-surface-variant font-body-md text-body-md">Fill out the form below and our
                                administrative team will respond within 24-48 hours.</p>
                        </div>
                        <form class="space-y-6" method="POST" action="{{ route('contact.submit') }}">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="font-label-md text-on-surface-variant" for="name">Full Name</label>
                                    <input
                                        class="w-full px-4 py-3 bg-surface-bright border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary transition-all outline-none"
                                        id="name" name="name" placeholder="Enter your name" required type="text" value="{{ old('name') }}" />
                                    @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div class="space-y-2">
                                    <label class="font-label-md text-on-surface-variant" for="email">Email Address</label>
                                    <input
                                        class="w-full px-4 py-3 bg-surface-bright border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary transition-all outline-none"
                                        id="email" name="email" placeholder="name@example.com" required type="email" value="{{ old('email') }}" />
                                    @error('email') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="font-label-md text-on-surface-variant" for="phone">Phone Number</label>
                                <input
                                    class="w-full px-4 py-3 bg-surface-bright border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary transition-all outline-none"
                                    id="phone" name="phone" placeholder="+977-XXXXXXXXX" type="text" value="{{ old('phone') }}" />
                            </div>
                            <div class="space-y-2">
                                <label class="font-label-md text-on-surface-variant" for="subject">Subject</label>
                                <input
                                    class="w-full px-4 py-3 bg-surface-bright border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary transition-all outline-none"
                                    id="subject" name="subject" placeholder="How can we help you?" value="{{ old('subject') }}" />
                            </div>
                            <div class="space-y-2">
                                <label class="font-label-md text-on-surface-variant" for="message">Message</label>
                                <textarea
                                    class="w-full px-4 py-3 bg-surface-bright border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary transition-all outline-none resize-none"
                                    id="message" name="message" placeholder="How can we help you?" required rows="5">{{ old('message') }}</textarea>
                                @error('message') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <button
                                class="w-full bg-primary text-on-primary py-4 rounded-lg font-bold font-label-md text-label-md hover:bg-on-primary-fixed-variant transition-colors flex items-center justify-center gap-2"
                                type="submit">
                                Send Inquiry
                                <span class="material-symbols-outlined text-[18px]">send</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Map Section -->
        <section class="mb-20 px-gutter max-w-container-max mx-auto">
            <div class="rounded-2xl overflow-hidden shadow-ambient border border-outline-variant relative group h-[500px]">
                <div class="absolute inset-0 bg-surface-container z-0 flex items-center justify-center">
                    <div class="w-full h-full bg-cover bg-center"
                        data-alt="A highly detailed aerial landscape of Kathmandu, Nepal, with the Mahendra Secondary School building centrally located."
                        data-location="Kathmandu, Nepal"
                        style="background-image: url('{{ asset('assets/images/img_4721664e5b37.jpg') }}')"></div>
                </div>
                <div class="absolute bottom-8 left-8 bg-surface-container-lowest p-6 rounded-xl shadow-lg border border-outline-variant z-10 max-w-sm hidden md:block">
                    <h4 class="font-headline-md text-headline-md text-primary mb-2">Visit Our Campus</h4>
                    <p class="text-on-surface-variant font-body-md mb-4">Centrally located in the heart of Kathmandu, our
                        campus is easily accessible via public transport.</p>
                    <a class="inline-flex items-center gap-2 text-secondary font-bold font-label-md hover:underline" href="#">
                        Get Directions
                        <span class="material-symbols-outlined">open_in_new</span>
                    </a>
                </div>
            </div>
        </section>
        <!-- FAQ CTA Section -->
        <section class="bg-secondary-container/5 py-16 mb-20 border-y border-outline-variant/30">
            <div class="max-w-container-max mx-auto px-gutter flex flex-col md:flex-row items-center justify-between gap-8">
                <div>
                    <h2 class="font-headline-lg text-headline-lg text-on-background mb-2">Frequent Questions?</h2>
                    <p class="text-on-surface-variant font-body-md">Check our FAQ for immediate answers to common queries.</p>
                </div>
                <a href="{{ route('faq') }}"
                    class="px-8 py-4 bg-secondary text-on-secondary rounded-lg font-bold font-label-md shadow-md hover:opacity-90 transition-all flex items-center gap-3">
                    Visit FAQ
                    <span class="material-symbols-outlined">help_center</span>
                </a>
            </div>
        </section>
    </main>
@endsection
