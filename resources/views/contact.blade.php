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
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
                <!-- Contact Information Cards (Left Side) -->
                <div class="lg:col-span-5 space-y-gutter">
                    <!-- Address Card -->
                    <div
                        class="bg-surface-container-lowest p-8 rounded-xl border border-outline-variant shadow-ambient hover:border-secondary transition-all duration-300">
                        <div class="flex items-start gap-6">
                            <div class="bg-secondary-container/10 p-3 rounded-lg text-secondary">
                                <span class="material-symbols-outlined text-3xl" data-icon="location_on">location_on</span>
                            </div>
                            <div>
                                <h3 class="font-headline-md text-headline-md text-on-background mb-2">Our Location</h3>
                                <p class="text-on-surface-variant font-body-md text-body-md leading-relaxed">
                                    Mahendra Secondary School Compound,<br />
                                    Basantapur, Kathmandu 44600,<br />
                                    Bagmati Province, Nepal
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Contact Details Card -->
                    <div
                        class="bg-surface-container-lowest p-8 rounded-xl border border-outline-variant shadow-ambient hover:border-secondary transition-all duration-300">
                        <div class="flex items-start gap-6">
                            <div class="bg-primary-container/10 p-3 rounded-lg text-primary">
                                <span class="material-symbols-outlined text-3xl"
                                    data-icon="contact_support">contact_support</span>
                            </div>
                            <div class="w-full">
                                <h3 class="font-headline-md text-headline-md text-on-background mb-4">Direct Contact</h3>
                                <div class="space-y-4">
                                    <div class="flex justify-between items-center border-b border-outline-variant pb-3">
                                        <span class="font-label-md text-on-surface-variant">General Inquiries</span>
                                        <span class="font-body-md font-semibold text-on-background">+977-1-42XXXXX</span>
                                    </div>
                                    <div class="flex justify-between items-center border-b border-outline-variant pb-3">
                                        <span class="font-label-md text-on-surface-variant">Admissions Office</span>
                                        <span class="font-body-md font-semibold text-on-background">+977-1-42XXXXY</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="font-label-md text-on-surface-variant">Email Address</span>
                                        <span
                                            class="font-body-md font-semibold text-on-background">info@mahendraschool.edu.np</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Office Hours Card -->
                    <div
                        class="bg-surface-container-lowest p-8 rounded-xl border border-outline-variant shadow-ambient hover:border-secondary transition-all duration-300">
                        <div class="flex items-start gap-6">
                            <div class="bg-tertiary-container/10 p-3 rounded-lg text-tertiary">
                                <span class="material-symbols-outlined text-3xl" data-icon="schedule">schedule</span>
                            </div>
                            <div class="w-full">
                                <h3 class="font-headline-md text-headline-md text-on-background mb-4">Office Hours</h3>
                                <ul class="space-y-2">
                                    <li class="flex justify-between text-body-md">
                                        <span class="text-on-surface-variant">Sunday - Thursday</span>
                                        <span class="font-semibold">9:00 AM – 4:30 PM</span>
                                    </li>
                                    <li class="flex justify-between text-body-md">
                                        <span class="text-on-surface-variant">Friday</span>
                                        <span class="font-semibold">9:00 AM – 2:00 PM</span>
                                    </li>
                                    <li class="flex justify-between text-body-md">
                                        <span class="text-on-surface-variant">Saturday</span>
                                        <span class="text-primary font-bold">Closed</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contact Form (Right Side) -->
                <div class="lg:col-span-7">
                    <div
                        class="bg-surface-container-lowest p-8 md:p-12 rounded-xl border border-outline-variant shadow-ambient h-full">
                        <div class="mb-8">
                            <h2 class="font-headline-lg text-headline-lg text-on-background mb-2">Send a Message</h2>
                            <p class="text-on-surface-variant font-body-md text-body-md">Fill out the form below and our
                                administrative team will respond within 24-48 hours.</p>
                        </div>
                        <form class="space-y-6" id="contactForm">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="font-label-md text-on-surface-variant" for="firstName">First Name</label>
                                    <input
                                        class="w-full px-4 py-3 bg-surface-bright border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary transition-all outline-none"
                                        id="firstName" name="firstName" placeholder="Enter first name" required=""
                                        type="text" />
                                </div>
                                <div class="space-y-2">
                                    <label class="font-label-md text-on-surface-variant" for="lastName">Last Name</label>
                                    <input
                                        class="w-full px-4 py-3 bg-surface-bright border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary transition-all outline-none"
                                        id="lastName" name="lastName" placeholder="Enter last name" required=""
                                        type="text" />
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="font-label-md text-on-surface-variant" for="email">Email Address</label>
                                <input
                                    class="w-full px-4 py-3 bg-surface-bright border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary transition-all outline-none"
                                    id="email" name="email" placeholder="name@example.com" required=""
                                    type="email" />
                            </div>
                            <div class="space-y-2">
                                <label class="font-label-md text-on-surface-variant" for="subject">Subject</label>
                                <select
                                    class="w-full px-4 py-3 bg-surface-bright border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary transition-all outline-none"
                                    id="subject" name="subject">
                                    <option value="admissions">Admissions Inquiry</option>
                                    <option value="academics">Academic Programs</option>
                                    <option value="alumni">Alumni Relations</option>
                                    <option value="other">General Question</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="font-label-md text-on-surface-variant" for="message">Message</label>
                                <textarea
                                    class="w-full px-4 py-3 bg-surface-bright border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary transition-all outline-none resize-none"
                                    id="message" name="message" placeholder="How can we help you?" required="" rows="5"></textarea>
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
                    <!-- Data Store Map Image -->
                    <div class="w-full h-full bg-cover bg-center"
                        data-alt="A highly detailed aerial landscape of Kathmandu, Nepal, with the Mahendra Secondary School building centrally located. The surrounding neighborhood features traditional Newari architecture with red brick and dark wood accents. The lighting is warm golden hour sunlight, highlighting the school's sports field and courtyard. The overall style is professional, sharp, and clean digital photography."
                        data-location="Kathmandu, Nepal"
                        style="background-image: url('{{ asset('assets/images/img_4721664e5b37.jpg') }}')"></div>
                </div>
                <!-- Map Overlay Info -->
                <div
                    class="absolute bottom-8 left-8 bg-surface-container-lowest p-6 rounded-xl shadow-lg border border-outline-variant z-10 max-w-sm hidden md:block">
                    <h4 class="font-headline-md text-headline-md text-primary mb-2">Visit Our Campus</h4>
                    <p class="text-on-surface-variant font-body-md mb-4">Centrally located in the heart of Kathmandu, our
                        campus is easily accessible via public transport.</p>
                    <a class="inline-flex items-center gap-2 text-secondary font-bold font-label-md hover:underline"
                        href="#">
                        Get Directions
                        <span class="material-symbols-outlined">open_in_new</span>
                    </a>
                </div>
                <!-- Decorative elements for "Map UI" -->
                <div class="absolute top-8 right-8 flex flex-col gap-2 z-10">
                    <button
                        class="bg-surface-container-lowest p-3 rounded-full shadow-md hover:bg-surface-container-high transition-colors">
                        <span class="material-symbols-outlined">add</span>
                    </button>
                    <button
                        class="bg-surface-container-lowest p-3 rounded-full shadow-md hover:bg-surface-container-high transition-colors">
                        <span class="material-symbols-outlined">remove</span>
                    </button>
                </div>
            </div>
        </section>
        <!-- FAQ CTA Section -->
        <section class="bg-secondary-container/5 py-16 mb-20 border-y border-outline-variant/30">
            <div
                class="max-w-container-max mx-auto px-gutter flex flex-col md:flex-row items-center justify-between gap-8">
                <div>
                    <h2 class="font-headline-lg text-headline-lg text-on-background mb-2">Frequent Questions?</h2>
                    <p class="text-on-surface-variant font-body-md">Check our Knowledge Base for immediate answers to
                        common admission queries.</p>
                </div>
                <button
                    class="px-8 py-4 bg-secondary text-on-secondary rounded-lg font-bold font-label-md shadow-md hover:opacity-90 transition-all flex items-center gap-3">
                    Visit Support Center
                    <span class="material-symbols-outlined">help_center</span>
                </button>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/pages/contact.js') }}" defer></script>
@endpush
