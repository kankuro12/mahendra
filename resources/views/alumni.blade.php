@extends('layouts.app')

@section('title', 'Alumni | Mahendra Secondary School')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/pages/alumni.css') }}">
@endpush

@section('content')

<main>
<!-- Hero Section: Our Global Alumni Network -->
<section class="relative h-[600px] flex items-center overflow-hidden pt-28 md:pt-36">
<div class="absolute inset-0 z-0">
<div class="w-full h-full bg-cover bg-center" data-alt="A cinematic, high-angle view of a prestigious school campus at golden hour, featuring historic stone buildings and modern academic halls. The lighting is warm and ethereal, casting long soft shadows across manicured green lawns. The style is professional and institutional, utilizing a palette of deep crimson and royal blue tones to reflect a tradition of excellence." style="background-image: url('{{ asset('assets/images/img_0c19093695eb.jpg') }}')"></div>
<div class="absolute inset-0 bg-gradient-to-r from-on-background/80 to-transparent"></div>
</div>
<div class="relative z-10 w-full max-w-container-max mx-auto px-gutter text-on-primary">
<div class="max-w-2xl">
<h1 class="font-display-lg text-display-lg mb-6 leading-tight">Celebrating Our <span class="text-primary-fixed">Global Alumni Network</span></h1>
<p class="font-body-lg text-body-lg mb-8 opacity-90">From community leaders to international innovators, the Mahendra spirit reaches every corner of the globe. Reconnect with your legacy and empower the next generation.</p>
<div class="flex flex-wrap gap-4">
<a class="px-8 py-3 bg-primary text-on-primary font-label-md text-label-md rounded-full hover:scale-105 transition-transform duration-300 inline-flex items-center gap-2" href="#register">
                            Join the Association <span class="material-symbols-outlined">arrow_forward</span>
</a>
<a class="px-8 py-3 bg-white/10 backdrop-blur-md border border-white/30 text-white font-label-md text-label-md rounded-full hover:bg-white/20 transition-all" href="#events">
                            Upcoming Reunions
                        </a>
</div>
</div>
</div>
</section>
<!-- Stats Bento Grid -->
<section class="py-16 bg-surface-container-low">
<div class="max-w-container-max mx-auto px-gutter">
<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
<div class="bg-white p-8 rounded-xl border border-outline-variant shadow-sm text-center">
<span class="material-symbols-outlined text-primary text-4xl mb-2">public</span>
<div class="text-3xl font-bold text-primary">50+</div>
<div class="text-label-sm text-on-surface-variant uppercase tracking-wider">Countries Represented</div>
</div>
<div class="bg-white p-8 rounded-xl border border-outline-variant shadow-sm text-center">
<span class="material-symbols-outlined text-secondary text-4xl mb-2">groups</span>
<div class="text-3xl font-bold text-secondary">15,000+</div>
<div class="text-label-sm text-on-surface-variant uppercase tracking-wider">Active Members</div>
</div>
<div class="bg-white p-8 rounded-xl border border-outline-variant shadow-sm text-center">
<span class="material-symbols-outlined text-tertiary text-4xl mb-2">school</span>
<div class="text-3xl font-bold text-tertiary">200+</div>
<div class="text-label-sm text-on-surface-variant uppercase tracking-wider">Scholarships Funded</div>
</div>
<div class="bg-white p-8 rounded-xl border border-outline-variant shadow-sm text-center">
<span class="material-symbols-outlined text-primary text-4xl mb-2">history_edu</span>
<div class="text-3xl font-bold text-primary">60 Years</div>
<div class="text-label-sm text-on-surface-variant uppercase tracking-wider">of Academic Legacy</div>
</div>
</div>
</div>
</section>
<!-- Distinguished Alumni Section -->
<section class="py-24">
<div class="max-w-container-max mx-auto px-gutter">
<div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
<div>
<h2 class="font-headline-lg text-headline-lg text-on-surface mb-2">Distinguished Alumni</h2>
<div class="h-1.5 w-24 bg-primary rounded-full"></div>
</div>
<p class="max-w-md text-on-surface-variant">Spotlighting the extraordinary journeys and achievements of our graduates across various fields.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Alumni Card 1 -->
<div class="group relative bg-white rounded-xl overflow-hidden border border-outline-variant transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
<div class="h-64 overflow-hidden relative">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="A professional portrait of a woman in her 40s, a successful medical researcher, wearing a white lab coat in a modern laboratory setting. She is smiling confidently. The lighting is bright and professional, emphasizing a clean and corporate aesthetic with subtle blue background accents. High-quality digital photography style." src="{{ asset('assets/images/img_ed194979c158.jpg') }}"/>
<div class="absolute bottom-0 left-0 p-4 bg-primary text-on-primary font-label-sm rounded-tr-lg">Class of 1998</div>
</div>
<div class="p-6">
<h3 class="font-headline-md text-headline-md text-on-surface mb-1">Dr. Arati Sharma</h3>
<p class="text-primary font-medium mb-4">Lead Epidemiologist, WHO</p>
<p class="text-on-surface-variant font-body-md line-clamp-3">Pioneering work in infectious disease control across Southeast Asia. Arati credits Mahendra's science labs for sparking her lifelong passion for research.</p>
<div class="mt-6 pt-6 border-t border-outline-variant flex justify-between items-center">
<a class="text-primary font-bold text-label-md flex items-center gap-1 hover:underline" href="#">Read Story <span class="material-symbols-outlined text-sm">open_in_new</span></a>
</div>
</div>
</div>
<!-- Alumni Card 2 -->
<div class="group relative bg-white rounded-xl overflow-hidden border border-outline-variant transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
<div class="h-64 overflow-hidden relative">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="A charismatic man in his late 30s, a tech entrepreneur, sitting in a vibrant, modern coworking space with glass walls and indoor plants. He is dressed in business casual attire. The lighting is natural and bright, conveying a sense of innovation and success. The color palette is modern with royal blue and clean white tones." src="{{ asset('assets/images/img_a712d6875dcf.jpg') }}"/>
<div class="absolute bottom-0 left-0 p-4 bg-primary text-on-primary font-label-sm rounded-tr-lg">Class of 2005</div>
</div>
<div class="p-6">
<h3 class="font-headline-md text-headline-md text-on-surface mb-1">Sanjay Mahato</h3>
<p class="text-primary font-medium mb-4">Founder, GreenTech Nepal</p>
<p class="text-on-surface-variant font-body-md line-clamp-3">Revolutionizing sustainable energy solutions in rural areas. Sanjay was a student leader at Mahendra, where he learned the foundations of entrepreneurship.</p>
<div class="mt-6 pt-6 border-t border-outline-variant flex justify-between items-center">
<a class="text-primary font-bold text-label-md flex items-center gap-1 hover:underline" href="#">Read Story <span class="material-symbols-outlined text-sm">open_in_new</span></a>
</div>
</div>
</div>
<!-- Alumni Card 3 -->
<div class="group relative bg-white rounded-xl overflow-hidden border border-outline-variant transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
<div class="h-64 overflow-hidden relative">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="A dignified woman in her 50s, an international diplomat, standing in front of a government building with flags in the background. She is wearing traditional elegant attire combined with professional styling. The setting is formal and authoritative. The lighting is soft and even, highlighting her presence. The colors are rich and respectful." src="{{ asset('assets/images/img_1c0038c95435.jpg') }}"/>
<div class="absolute bottom-0 left-0 p-4 bg-primary text-on-primary font-label-sm rounded-tr-lg">Class of 1985</div>
</div>
<div class="p-6">
<h3 class="font-headline-md text-headline-md text-on-surface mb-1">Hon. Maya Devi</h3>
<p class="text-primary font-medium mb-4">UN Special Envoy</p>
<p class="text-on-surface-variant font-body-md line-clamp-3">Advocating for global education equity and human rights. Her journey from Mahendra's debate club to the world stage inspires students every day.</p>
<div class="mt-6 pt-6 border-t border-outline-variant flex justify-between items-center">
<a class="text-primary font-bold text-label-md flex items-center gap-1 hover:underline" href="#">Read Story <span class="material-symbols-outlined text-sm">open_in_new</span></a>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Upcoming Reunions & Registration Grid -->
<section class="py-24 bg-surface-container-high">
<div class="max-w-container-max mx-auto px-gutter">
<div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
<!-- Reunions Column -->
<div id="events">
<h2 class="font-headline-lg text-headline-lg text-on-surface mb-8">Upcoming Reunions</h2>
<div class="space-y-6">
<!-- Event 1 -->
<div class="bg-white p-6 rounded-xl border-l-4 border-primary shadow-sm hover:shadow-md transition-shadow">
<div class="flex items-start gap-4">
<div class="bg-primary-container text-on-primary-container px-4 py-2 rounded-lg text-center min-w-[80px]">
<div class="font-bold text-xl">15</div>
<div class="text-xs uppercase font-bold">OCT</div>
</div>
<div>
<h4 class="font-headline-md text-body-lg font-bold text-on-surface">Silver Jubilee: Class of 1999</h4>
<p class="text-on-surface-variant flex items-center gap-1 text-sm mt-1">
<span class="material-symbols-outlined text-sm">location_on</span> Main Campus Auditorium
                                        </p>
<p class="mt-3 text-on-surface-variant">A grand gala celebrating 25 years since graduation. Dinner, music, and nostalgia included.</p>
<button class="mt-4 text-primary font-bold text-sm uppercase tracking-wider hover:opacity-80">RSVP Now</button>
</div>
</div>
</div>
<!-- Event 2 -->
<div class="bg-white p-6 rounded-xl border-l-4 border-secondary shadow-sm hover:shadow-md transition-shadow">
<div class="flex items-start gap-4">
<div class="bg-secondary-container text-on-secondary-container px-4 py-2 rounded-lg text-center min-w-[80px]">
<div class="font-bold text-xl">02</div>
<div class="text-xs uppercase font-bold">DEC</div>
</div>
<div>
<h4 class="font-headline-md text-body-lg font-bold text-on-surface">Annual Alumni Sports Meet</h4>
<p class="text-on-surface-variant flex items-center gap-1 text-sm mt-1">
<span class="material-symbols-outlined text-sm">location_on</span> School Sports Grounds
                                        </p>
<p class="mt-3 text-on-surface-variant">Current students vs. Alumni in football, basketball, and athletics. Family-friendly event.</p>
<button class="mt-4 text-primary font-bold text-sm uppercase tracking-wider hover:opacity-80">Join Tournament</button>
</div>
</div>
</div>
<!-- Event 3 -->
<div class="bg-white p-6 rounded-xl border-l-4 border-tertiary shadow-sm hover:shadow-md transition-shadow">
<div class="flex items-start gap-4">
<div class="bg-tertiary-container text-on-tertiary-container px-4 py-2 rounded-lg text-center min-w-[80px]">
<div class="font-bold text-xl">12</div>
<div class="text-xs uppercase font-bold">JAN</div>
</div>
<div>
<h4 class="font-headline-md text-body-lg font-bold text-on-surface">Global Networking Virtual Meet</h4>
<p class="text-on-surface-variant flex items-center gap-1 text-sm mt-1">
<span class="material-symbols-outlined text-sm">videocam</span> Online (Zoom)
                                        </p>
<p class="mt-3 text-on-surface-variant">Connecting our international alumni for professional growth and mentorship opportunities.</p>
<button class="mt-4 text-primary font-bold text-sm uppercase tracking-wider hover:opacity-80">Get Link</button>
</div>
</div>
</div>
</div>
</div>
<!-- Registration Form Column -->
<div class="bg-white p-10 rounded-2xl border border-outline-variant shadow-xl" id="register">
<div class="mb-8">
<h2 class="font-headline-lg text-headline-lg text-on-surface mb-2">Alumni Association</h2>
<p class="text-on-surface-variant">Register to stay updated on school news, networking events, and exclusive alumni benefits.</p>
</div>
<form class="space-y-6">
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div>
<label class="block text-sm font-bold text-on-surface mb-2">Full Name</label>
<input class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all" placeholder="John Doe" type="text"/>
</div>
<div>
<label class="block text-sm font-bold text-on-surface mb-2">Year of Graduation</label>
<input class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all" placeholder="e.g., 2010" type="number"/>
</div>
</div>
<div>
<label class="block text-sm font-bold text-on-surface mb-2">Email Address</label>
<input class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all" placeholder="john@example.com" type="email"/>
</div>
<div>
<label class="block text-sm font-bold text-on-surface mb-2">Current Occupation &amp; Location</label>
<input class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all" placeholder="Software Engineer, London" type="text"/>
</div>
<div>
<label class="flex items-start gap-3 cursor-pointer">
<input class="mt-1 text-primary focus:ring-primary rounded border-outline-variant" type="checkbox"/>
<span class="text-sm text-on-surface-variant">I would like to volunteer for the Alumni Mentorship Program for current students.</span>
</label>
</div>
<button class="w-full py-4 bg-primary text-on-primary font-bold rounded-lg hover:bg-on-primary-fixed-variant transition-all transform hover:scale-[1.02] active:scale-95 shadow-lg" type="submit">
                                Submit Registration
                            </button>
</form>
</div>
</div>
</div>
</section>
<!-- Newsletter / Community Section -->
<section class="py-20 bg-primary overflow-hidden relative">
<div class="absolute right-0 top-0 opacity-10 pointer-events-none">
<span class="material-symbols-outlined text-[300px]" style="font-variation-settings: 'wght' 700;">school</span>
</div>
<div class="max-w-container-max mx-auto px-gutter relative z-10 text-center">
<h2 class="font-headline-lg text-headline-lg text-on-primary mb-6">Lost Touch with a Classmate?</h2>
<p class="text-on-primary-container text-body-lg mb-10 max-w-2xl mx-auto">Access our secure Alumni Directory to find old friends and expand your professional network within the Mahendra community.</p>
<button class="px-10 py-4 bg-white text-primary font-bold rounded-full hover:shadow-2xl transition-all inline-flex items-center gap-2">
<span class="material-symbols-outlined">search</span> Search Directory
                </button>
</div>
</section>
</main>
<!-- Footer -->
<footer class="bg-surface-container-highest dark:bg-inverse-surface border-t border-outline-variant pt-16 pb-8">
<div class="max-w-container-max mx-auto px-gutter">
<div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
<!-- Branding -->
<div class="col-span-1 md:col-span-1">
<div class="font-headline-md text-headline-md font-bold text-primary mb-4">Mahendra Secondary</div>
<p class="text-on-surface-variant text-body-md">Empowering minds and building legacies since 1964. A community of excellence and tradition.</p>
<div class="flex gap-4 mt-6">
<a class="p-2 bg-white rounded-full text-primary hover:bg-primary hover:text-white transition-all" href="#"><span class="material-symbols-outlined text-xl">face_nod</span></a>
<a class="p-2 bg-white rounded-full text-primary hover:bg-primary hover:text-white transition-all" href="#"><span class="material-symbols-outlined text-xl">language</span></a>
<a class="p-2 bg-white rounded-full text-primary hover:bg-primary hover:text-white transition-all" href="#"><span class="material-symbols-outlined text-xl">mail</span></a>
</div>
</div>
<!-- Quick Links -->
<div>
<h4 class="font-bold text-on-surface mb-6">Quick Links</h4>
<ul class="space-y-4 text-on-surface-variant font-label-md">
<li><a class="hover:text-primary transition-colors" href="#">Privacy Policy</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Terms of Service</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Campus Map</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Staff Portal</a></li>
</ul>
</div>
<!-- Alumni Links -->
<div>
<h4 class="font-bold text-on-surface mb-6">Alumni Hub</h4>
<ul class="space-y-4 text-on-surface-variant font-label-md">
<li><a class="hover:text-primary transition-colors" href="#">Global Directory</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Career Mentorship</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Archive Photos</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Donation Portal</a></li>
</ul>
</div>
<!-- Contact Info -->
<div>
<h4 class="font-bold text-on-surface mb-6">Contact Us</h4>
<ul class="space-y-4 text-on-surface-variant font-label-md">
<li class="flex items-start gap-2"><span class="material-symbols-outlined text-primary">location_on</span> 123 Education Square, Central District</li>
<li class="flex items-center gap-2"><span class="material-symbols-outlined text-primary">phone</span> +977 1 4XXXXXX</li>
<li class="flex items-center gap-2"><span class="material-symbols-outlined text-primary">mail</span> alumni@mahendra.edu.np</li>
</ul>
</div>
</div>
<div class="border-t border-outline-variant pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-label-sm text-on-surface-variant">
<p>© 2024 Mahendra Secondary School. All rights reserved.</p>
<div class="flex gap-6">
<a class="hover:underline" href="#">Student Privacy</a>
<a class="hover:underline" href="#">Compliance</a>
<a class="hover:underline" href="#">Accessibility</a>
</div>
</div>
</div>
</footer>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/pages/alumni.js') }}" defer></script>
@endpush
