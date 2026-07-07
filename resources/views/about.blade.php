@extends('layouts.app')

@section('title', 'About Us | Mahendra Secondary School')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/pages/about.css') }}">
@endpush

@section('content')

<!-- Page Content -->
<main>
<!-- Hero Section -->
<section class="relative h-[614px] flex items-center justify-center overflow-hidden pt-32">
<div class="absolute inset-0 z-0">
<div class="w-full h-full bg-cover bg-center" data-alt="A grand, architectural view of a prestigious Nepalese secondary school building with brick facades and white accents. The scene is set under a clear blue morning sky with soft, directional sunlight highlighting the historical and institutional nature of the campus. The atmosphere is academic and established." style="background-image: url('{{ asset('assets/images/img_1a69f258a9f5.jpg') }}')"></div>
<div class="absolute inset-0 bg-black/40"></div>
</div>
<div class="relative z-10 text-center text-white px-margin-mobile">
<h1 class="font-display-lg text-display-lg mb-4">Shaping Tomorrow's Leaders Since 1956</h1>
<p class="font-body-lg text-body-lg max-w-2xl mx-auto opacity-90">A legacy of academic excellence, cultural integrity, and community service in the heart of Nepal.</p>
</div>
</section>
<!-- Mission, Vision, Values (Bento Grid) -->
<section class="max-w-container-max mx-auto px-margin-desktop py-24">
<div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
<div class="md:col-span-8 bg-surface-container-lowest p-10 rounded-xl border border-outline-variant shadow-sm hover:shadow-md transition-shadow">
<span class="material-symbols-outlined text-primary text-4xl mb-4">history_edu</span>
<h2 class="font-headline-lg text-headline-lg mb-6 text-primary">Our Rich History</h2>
<div class="space-y-4 text-on-surface-variant font-body-md leading-relaxed">
<p>Founded in 1956, Mahendra Secondary School has stood as a beacon of knowledge for generations. Originally established to serve the local community, it has evolved into a premier government-affiliated institution recognized for its commitment to holistic education.</p>
<p>From our humble beginnings with just three classrooms to our current multi-building campus, our journey has been defined by resilience and the unwavering support of our dedicated alumni and the Government of Nepal.</p>
</div>
</div>
<div class="md:col-span-4 bg-primary p-10 rounded-xl text-on-primary shadow-lg flex flex-col justify-center">
<h3 class="font-headline-md text-headline-md mb-4">Our Vision</h3>
<p class="font-body-md italic opacity-90">"To be a leading center of educational excellence that nurtures innovative thinkers and responsible global citizens grounded in national values."</p>
</div>
<div class="md:col-span-4 bg-secondary p-10 rounded-xl text-on-primary shadow-lg">
<h3 class="font-headline-md text-headline-md mb-4">Our Mission</h3>
<ul class="space-y-3 font-body-md">
<li class="flex gap-2"><span class="material-symbols-outlined text-sm pt-1">check_circle</span> Quality education for all.</li>
<li class="flex gap-2"><span class="material-symbols-outlined text-sm pt-1">check_circle</span> Cultivating character and ethics.</li>
<li class="flex gap-2"><span class="material-symbols-outlined text-sm pt-1">check_circle</span> Embracing modern technology.</li>
</ul>
</div>
<div class="md:col-span-8 grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="bg-surface-container p-8 rounded-xl border border-outline-variant flex flex-col items-center text-center">
<span class="material-symbols-outlined text-tertiary text-3xl mb-3">handshake</span>
<h4 class="font-label-md text-label-md font-bold mb-2">Integrity</h4>
<p class="text-sm opacity-80">Honesty and transparency in all our academic and administrative endeavors.</p>
</div>
<div class="bg-surface-container p-8 rounded-xl border border-outline-variant flex flex-col items-center text-center">
<span class="material-symbols-outlined text-tertiary text-3xl mb-3">diversity_3</span>
<h4 class="font-label-md text-label-md font-bold mb-2">Inclusion</h4>
<p class="text-sm opacity-80">Creating a safe space for students from all walks of life to learn together.</p>
</div>
<div class="bg-surface-container p-8 rounded-xl border border-outline-variant flex flex-col items-center text-center">
<span class="material-symbols-outlined text-tertiary text-3xl mb-3">auto_awesome</span>
<h4 class="font-label-md text-label-md font-bold mb-2">Excellence</h4>
<p class="text-sm opacity-80">Striving for the highest standards in sports, arts, and science.</p>
</div>
</div>
</div>
</section>
<!-- Leadership Section -->
<section class="bg-surface-container-low py-24">
<div class="max-w-container-max mx-auto px-margin-desktop">
<div class="text-center mb-16">
<h2 class="font-headline-lg text-headline-lg text-primary mb-4">Institutional Leadership</h2>
<p class="text-on-surface-variant max-w-xl mx-auto">Meet the visionary educators guiding our school toward a brighter future.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter">
<!-- Principal -->
<div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm group hover:shadow-lg transition-all border border-outline-variant">
<div class="h-64 overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A professional portrait of a senior South Asian male educator in a formal suit, posing in front of an academic library background. He has a warm, welcoming expression that conveys authority and wisdom. High-quality corporate photography lighting with soft shadows." src="{{ asset('assets/images/img_25e8c3b3d1e4.jpg') }}"/>
</div>
<div class="p-6">
<span class="text-primary font-bold text-xs uppercase tracking-widest mb-2 block">Principal</span>
<h3 class="font-headline-md text-headline-md mb-1">Dr. Rajesh Kumar</h3>
<p class="text-on-surface-variant text-sm mb-4">M.Ed, PhD in Educational Leadership</p>
<div class="flex gap-3 text-secondary">
<span class="material-symbols-outlined cursor-pointer hover:text-primary">mail</span>
<span class="material-symbols-outlined cursor-pointer hover:text-primary">dine_in</span>
</div>
</div>
</div>
<!-- Vice Principal -->
<div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm group hover:shadow-lg transition-all border border-outline-variant">
<div class="h-64 overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A professional portrait of a middle-aged South Asian female educator with a kind and intelligent gaze, wearing a traditional saree and a blazer. She is standing in a brightly lit modern school corridor. The image exudes professionalism, empathy, and educational expertise." src="{{ asset('assets/images/img_b68e14dd22b8.jpg') }}"/>
</div>
<div class="p-6">
<span class="text-primary font-bold text-xs uppercase tracking-widest mb-2 block">Vice-Principal</span>
<h3 class="font-headline-md text-headline-md mb-1">Ms. Sunita Sharma</h3>
<p class="text-on-surface-variant text-sm mb-4">MA in English Literature</p>
<div class="flex gap-3 text-secondary">
<span class="material-symbols-outlined cursor-pointer hover:text-primary">mail</span>
<span class="material-symbols-outlined cursor-pointer hover:text-primary">dine_in</span>
</div>
</div>
</div>
<!-- Head of Science -->
<div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm group hover:shadow-lg transition-all border border-outline-variant">
<div class="h-64 overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A portrait of a male science teacher in his late 30s wearing a crisp white lab coat over a formal shirt. He is standing in a well-equipped modern chemistry laboratory with glass beakers and scientific equipment visible in the soft-focus background. He looks enthusiastic and professional." src="{{ asset('assets/images/img_988b928ab866.jpg') }}"/>
</div>
<div class="p-6">
<span class="text-primary font-bold text-xs uppercase tracking-widest mb-2 block">Head of Science</span>
<h3 class="font-headline-md text-headline-md mb-1">Mr. Anil Thapa</h3>
<p class="text-on-surface-variant text-sm mb-4">M.Sc in Physics</p>
<div class="flex gap-3 text-secondary">
<span class="material-symbols-outlined cursor-pointer hover:text-primary">mail</span>
<span class="material-symbols-outlined cursor-pointer hover:text-primary">dine_in</span>
</div>
</div>
</div>
<!-- Admin Head -->
<div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm group hover:shadow-lg transition-all border border-outline-variant">
<div class="h-64 overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A professional portrait of a young South Asian female administrative leader in a business casual attire, holding a digital tablet. She is in a modern office setting with natural light coming from a large window. She looks organized, confident, and approachable." src="{{ asset('assets/images/img_9e3d26de3738.jpg') }}"/>
</div>
<div class="p-6">
<span class="text-primary font-bold text-xs uppercase tracking-widest mb-2 block">Admin Head</span>
<h3 class="font-headline-md text-headline-md mb-1">Ms. Rita Gurung</h3>
<p class="text-on-surface-variant text-sm mb-4">MBA, School Administration</p>
<div class="flex gap-3 text-secondary">
<span class="material-symbols-outlined cursor-pointer hover:text-primary">mail</span>
<span class="material-symbols-outlined cursor-pointer hover:text-primary">dine_in</span>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Infrastructure Highlights -->
<section class="py-24 max-w-container-max mx-auto px-margin-desktop">
<div class="flex flex-col md:flex-row gap-16 items-center mb-20">
<div class="w-full md:w-1/2">
<h2 class="font-headline-lg text-headline-lg text-primary mb-6">World-Class Infrastructure</h2>
<p class="text-on-surface-variant mb-8 leading-relaxed">We believe that a conducive environment is essential for learning. Our campus is equipped with state-of-the-art facilities designed to support academic growth and extracurricular passions.</p>
<div class="grid grid-cols-2 gap-8">
<div class="flex gap-4 items-start">
<span class="material-symbols-outlined bg-secondary-fixed text-on-secondary-fixed p-2 rounded-lg">science</span>
<div>
<h4 class="font-bold">Digital Labs</h4>
<p class="text-sm opacity-70">Hi-speed internet &amp; VR labs.</p>
</div>
</div>
<div class="flex gap-4 items-start">
<span class="material-symbols-outlined bg-secondary-fixed text-on-secondary-fixed p-2 rounded-lg">library_books</span>
<div>
<h4 class="font-bold">Main Library</h4>
<p class="text-sm opacity-70">20,000+ books &amp; journals.</p>
</div>
</div>
<div class="flex gap-4 items-start">
<span class="material-symbols-outlined bg-secondary-fixed text-on-secondary-fixed p-2 rounded-lg">sports_soccer</span>
<div>
<h4 class="font-bold">Sports Arena</h4>
<p class="text-sm opacity-70">Olympic size courts &amp; field.</p>
</div>
</div>
<div class="flex gap-4 items-start">
<span class="material-symbols-outlined bg-secondary-fixed text-on-secondary-fixed p-2 rounded-lg">restaurant</span>
<div>
<h4 class="font-bold">Hygienic Canteen</h4>
<p class="text-sm opacity-70">Nutritious local organic meals.</p>
</div>
</div>
</div>
</div>
<div class="w-full md:w-1/2 grid grid-cols-2 gap-4">
<div class="pt-12">
<img class="rounded-2xl h-64 w-full object-cover shadow-lg mb-4" data-alt="A brightly lit modern school science laboratory with rows of workstations, microscopes, and glassware. The design is sleek with white surfaces and royal blue accents, reflecting a high-tech academic environment. The lighting is clean and professional." src="{{ asset('assets/images/img_189c1a166dab.jpg') }}"/>
<img class="rounded-2xl h-80 w-full object-cover shadow-lg" data-alt="An expansive school library with floor-to-ceiling bookshelves, comfortable reading pods, and large windows looking out onto a green campus. The interior features warm wood textures and modern minimalist furniture under soft ambient lighting." src="{{ asset('assets/images/img_0fd95574a4b7.jpg') }}"/>
</div>
<div>
<img class="rounded-2xl h-80 w-full object-cover shadow-lg mb-4" data-alt="A lush green school sports field with professional markings for soccer and a running track around it. In the background, the modern school buildings stand against a backdrop of clear skies. The shot is taken from a low angle to emphasize the scale and quality of the facility." src="{{ asset('assets/images/img_138638d03627.jpg') }}"/>
<img class="rounded-2xl h-64 w-full object-cover shadow-lg" data-alt="A spacious and clean school auditorium with tiered seating, a large stage with red curtains, and professional lighting rigs. The atmosphere is quiet and expectant, ready for a major school event or performance." src="{{ asset('assets/images/img_9744dd1d6a8b.jpg') }}"/>
</div>
</div>
</div>
</section>
<!-- CTA Section -->
<section class="mb-24 px-margin-desktop max-w-container-max mx-auto">
<div class="bg-primary-container text-on-primary-container p-12 rounded-3xl flex flex-col md:flex-row justify-between items-center gap-8 relative overflow-hidden">
<div class="relative z-10 text-center md:text-left">
<h2 class="font-headline-lg text-headline-lg mb-2">Join Our Community</h2>
<p class="opacity-90 max-w-lg">Experience the tradition of excellence. Admissions for the new academic session are now open.</p>
</div>
<div class="relative z-10 flex gap-4">
<button class="bg-on-primary-container text-primary px-8 py-4 rounded-xl font-bold hover:bg-surface-lowest transition-colors">Download Brochure</button>
<button class="bg-tertiary-fixed text-on-tertiary-fixed px-8 py-4 rounded-xl font-bold hover:opacity-90 transition-opacity">Apply Online</button>
</div>
<!-- Background Decorative Shape -->
<div class="absolute -right-20 -bottom-20 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="bg-surface-container-highest dark:bg-inverse-surface border-t border-outline-variant">
<div class="w-full py-12 px-margin-desktop grid grid-cols-1 md:grid-cols-4 gap-gutter max-w-container-max mx-auto">
<div class="col-span-1">
<span class="font-headline-md text-headline-md font-bold text-primary mb-4 block">Mahendra Secondary School</span>
<p class="text-on-surface-variant text-sm mb-6 leading-relaxed">Dedicated to academic excellence and character building since 1956. Empowering students for a better tomorrow.</p>
<div class="flex gap-4">
<span class="material-symbols-outlined text-secondary cursor-pointer hover:text-primary">face_nod</span>
<span class="material-symbols-outlined text-secondary cursor-pointer hover:text-primary">alternate_email</span>
<span class="material-symbols-outlined text-secondary cursor-pointer hover:text-primary">language</span>
</div>
</div>
<div>
<h4 class="font-label-md text-label-md font-bold mb-6">Quick Links</h4>
<ul class="space-y-4">
<li><a class="text-on-surface-variant font-medium hover:text-primary hover:underline transition-all duration-200" href="{{ route('notice') }}">Academic Calendar</a></li>
<li><a class="text-on-surface-variant font-medium hover:text-primary hover:underline transition-all duration-200" href="{{ route('teachers') }}">Staff Directory</a></li>
<li><a class="text-on-surface-variant font-medium hover:text-primary hover:underline transition-all duration-200" href="#">Privacy Policy</a></li>
<li><a class="text-on-surface-variant font-medium hover:text-primary hover:underline transition-all duration-200" href="#">Tenders</a></li>
</ul>
</div>
<div>
<h4 class="font-label-md text-label-md font-bold mb-6">Contact Info</h4>
<ul class="space-y-4 text-sm text-on-surface-variant">
<li class="flex gap-3"><span class="material-symbols-outlined text-sm">location_on</span> Main Campus Road, Kathmandu, Nepal</li>
<li class="flex gap-3"><span class="material-symbols-outlined text-sm">call</span> +977 1-4XXXXXX</li>
<li class="flex gap-3"><span class="material-symbols-outlined text-sm">mail</span> contact@mahendra.edu.np</li>
</ul>
</div>
<div>
<h4 class="font-label-md text-label-md font-bold mb-6">Newsletter</h4>
<p class="text-sm text-on-surface-variant mb-4">Stay updated with our latest notices and events.</p>
<div class="flex gap-2">
<input class="bg-surface-lowest border border-outline-variant px-4 py-2 rounded-lg w-full text-sm focus:ring-2 focus:ring-primary focus:outline-none" placeholder="Email address" type="email"/>
<button class="bg-primary text-on-primary px-4 py-2 rounded-lg hover:opacity-90 transition-opacity">
<span class="material-symbols-outlined">send</span>
</button>
</div>
</div>
</div>
<div class="border-t border-outline-variant py-8 px-margin-desktop text-center">
<p class="font-label-sm text-label-sm text-on-surface-variant opacity-70">© 2024 Mahendra Secondary School. Affiliated with the Government of Nepal.</p>
</div>
</footer>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/pages/about.js') }}" defer></script>
@endpush
