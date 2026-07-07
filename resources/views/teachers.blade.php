@extends('layouts.app')

@section('title', 'Academic Faculty | Mahendra Secondary School')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/pages/teachers.css') }}">
@endpush

@section('content')

<!-- Page Header Hero Section -->
<section class="relative pt-32 pb-16 md:pt-40 md:pb-24 overflow-hidden bg-primary text-on-primary">
<div class="absolute inset-0 opacity-10 pointer-events-none">

</div>
<div class="relative z-10 max-w-container-max mx-auto px-gutter text-center">
<h1 class="font-display-lg text-display-lg mb-6 tracking-tight">Our Academic Faculty</h1>
<p class="font-body-lg text-body-lg max-w-2xl mx-auto opacity-90">
                Meet the dedicated educators shaping the future leaders of tomorrow through academic rigor, mentorship, and civic excellence.
            </p>
</div>
</section>
<!-- Faculty Directory -->
<main class="max-w-container-max mx-auto px-gutter py-16 space-y-20">
<!-- Department: Science & Technology -->
<section>
<div class="flex items-center gap-4 mb-10 border-b border-outline-variant pb-4">
<span class="material-symbols-outlined text-primary text-4xl">biotech</span>
<h2 class="font-headline-lg text-headline-lg text-on-surface">Science &amp; Technology</h2>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter">
<!-- Teacher Card 1 -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden faculty-card-shadow transition-all duration-300 group">
<div class="aspect-[4/5] bg-surface-container-high relative overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A professional studio portrait of a middle-aged male science teacher with a friendly expression, wearing a navy blue blazer over a crisp white shirt. The lighting is soft and professional, with a clean gray studio background. The style is corporate and authoritative yet approachable, reflecting a modern educational institution's brand." src="{{ asset('assets/images/img_d9ddd9689325.jpg') }}"/>
<div class="absolute bottom-0 left-0 right-0 h-2 bg-primary transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
</div>
<div class="p-6">
<h3 class="font-headline-md text-headline-md mb-1 text-on-surface">Dr. Rajesh Kumar</h3>
<p class="text-primary font-label-md text-label-md font-bold mb-3">Head of Science Department</p>
<p class="text-on-surface-variant font-body-md text-body-md">Ph.D. in Applied Physics, M.Sc.</p>
</div>
</div>
<!-- Teacher Card 2 -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden faculty-card-shadow transition-all duration-300 group">
<div class="aspect-[4/5] bg-surface-container-high relative overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A professional portrait of a female chemistry teacher in her 30s, smiling warmly. She is wearing a smart white lab coat over a formal blouse. The setting is a clean, bright, modern science laboratory with soft focus glass equipment in the background. High-key lighting emphasizes a bright and welcoming educational environment." src="{{ asset('assets/images/img_daa3e6fe0a68.jpg') }}"/>
<div class="absolute bottom-0 left-0 right-0 h-2 bg-primary transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
</div>
<div class="p-6">
<h3 class="font-headline-md text-headline-md mb-1 text-on-surface">Anjali Sharma</h3>
<p class="text-primary font-label-md text-label-md font-bold mb-3">Senior Chemistry Faculty</p>
<p class="text-on-surface-variant font-body-md text-body-md">M.Sc. in Organic Chemistry, B.Ed.</p>
</div>
</div>
<!-- Teacher Card 3 -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden faculty-card-shadow transition-all duration-300 group">
<div class="aspect-[4/5] bg-surface-container-high relative overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A confident male biology teacher standing in front of a biological poster. He is wearing professional business casual attire with a light blue shirt. The lighting is bright and even, highlighting a trustworthy and knowledgeable personality. The aesthetic is clean and modern, consistent with high-standard academic institutional photography." src="{{ asset('assets/images/img_e42ddeecb873.jpg') }}"/>
<div class="absolute bottom-0 left-0 right-0 h-2 bg-primary transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
</div>
<div class="p-6">
<h3 class="font-headline-md text-headline-md mb-1 text-on-surface">Sunil Thapa</h3>
<p class="text-primary font-label-md text-label-md font-bold mb-3">Biology Specialist</p>
<p class="text-on-surface-variant font-body-md text-body-md">M.Sc. Zoology, M.Phil.</p>
</div>
</div>
<!-- Teacher Card 4 -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden faculty-card-shadow transition-all duration-300 group">
<div class="aspect-[4/5] bg-surface-container-high relative overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A portrait of a young female computer science teacher sitting at a modern workstation with a subtle blurred screen of code in the background. She wears glasses and a professional maroon top. The lighting is modern and crisp, with a cool-toned institutional aesthetic that signals technological proficiency and academic stability." src="{{ asset('assets/images/img_128d3b34a3e7.jpg') }}"/>
<div class="absolute bottom-0 left-0 right-0 h-2 bg-primary transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
</div>
<div class="p-6">
<h3 class="font-headline-md text-headline-md mb-1 text-on-surface">Pooja Adhikari</h3>
<p class="text-primary font-label-md text-label-md font-bold mb-3">IT &amp; Robotics Lead</p>
<p class="text-on-surface-variant font-body-md text-body-md">M.Tech in Computer Science</p>
</div>
</div>
</div>
</section>
<!-- Department: Mathematics -->
<section>
<div class="flex items-center gap-4 mb-10 border-b border-outline-variant pb-4">
<span class="material-symbols-outlined text-secondary text-4xl">functions</span>
<h2 class="font-headline-lg text-headline-lg text-on-surface">Mathematics</h2>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter">
<!-- Teacher Card 5 -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden faculty-card-shadow transition-all duration-300 group">
<div class="aspect-[4/5] bg-surface-container-high relative overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A distinguished senior male mathematics professor with graying hair and glasses. He is wearing a formal dark suit with a silk tie. The background is a sophisticated library setting with leather-bound books softly out of focus. Lighting is warm and prestigious, evoking trust, experience, and deep academic authority." src="{{ asset('assets/images/img_ac39770ae936.jpg') }}"/>
<div class="absolute bottom-0 left-0 right-0 h-2 bg-secondary transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
</div>
<div class="p-6">
<h3 class="font-headline-md text-headline-md mb-1 text-on-surface">Prof. B.P. Gurung</h3>
<p class="text-secondary font-label-md text-label-md font-bold mb-3">Senior Mathematics Faculty</p>
<p class="text-on-surface-variant font-body-md text-body-md">M.Sc. Mathematics, 25+ Years Exp.</p>
</div>
</div>
<!-- Teacher Card 6 -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden faculty-card-shadow transition-all duration-300 group">
<div class="aspect-[4/5] bg-surface-container-high relative overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A cheerful male math teacher in his late 20s holding a textbook. He is dressed in a smart polo shirt. The environment is a bright, modern classroom with plenty of natural daylight. The style is energetic and contemporary, focusing on accessibility and student-centered education within a formal framework." src="{{ asset('assets/images/img_6aa718c96151.jpg') }}"/>
<div class="absolute bottom-0 left-0 right-0 h-2 bg-secondary transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
</div>
<div class="p-6">
<h3 class="font-headline-md text-headline-md mb-1 text-on-surface">Nitesh Pandey</h3>
<p class="text-secondary font-label-md text-label-md font-bold mb-3">Applied Math Teacher</p>
<p class="text-on-surface-variant font-body-md text-body-md">M.Ed. in Mathematics Education</p>
</div>
</div>
</div>
</section>
<!-- Department: Humanities & Languages -->
<section>
<div class="flex items-center gap-4 mb-10 border-b border-outline-variant pb-4">
<span class="material-symbols-outlined text-tertiary text-4xl">menu_book</span>
<h2 class="font-headline-lg text-headline-lg text-on-surface">Humanities &amp; Languages</h2>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter">
<!-- Teacher Card 7 -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden faculty-card-shadow transition-all duration-300 group">
<div class="aspect-[4/5] bg-surface-container-high relative overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A professional portrait of an elegant female English literature teacher. She is wearing a traditional yet modern saree in muted earth tones. The background is soft and minimalist with a hint of indoor greenery. The lighting is soft-key and sophisticated, portraying a balance of cultural pride and modern intellectualism." src="{{ asset('assets/images/img_8d309aad5568.jpg') }}"/>
<div class="absolute bottom-0 left-0 right-0 h-2 bg-tertiary transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
</div>
<div class="p-6">
<h3 class="font-headline-md text-headline-md mb-1 text-on-surface">Sushma Devi</h3>
<p class="text-tertiary font-label-md text-label-md font-bold mb-3">Head of Humanities</p>
<p class="text-on-surface-variant font-body-md text-body-md">M.A. English Literature, B.Ed.</p>
</div>
</div>
<!-- Teacher Card 8 -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden faculty-card-shadow transition-all duration-300 group">
<div class="aspect-[4/5] bg-surface-container-high relative overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A portrait of a male history teacher standing near a globe. He is wearing a formal gray waistcoat over a white shirt. The mood is inquisitive and scholarly, with a palette of deep blues and whites. High-quality corporate photography style with emphasis on professional integrity and historical expertise." src="{{ asset('assets/images/img_949c33d30370.jpg') }}"/>
<div class="absolute bottom-0 left-0 right-0 h-2 bg-tertiary transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
</div>
<div class="p-6">
<h3 class="font-headline-md text-headline-md mb-1 text-on-surface">Deepak Basnet</h3>
<p class="text-tertiary font-label-md text-label-md font-bold mb-3">Social Studies &amp; History</p>
<p class="text-on-surface-variant font-body-md text-body-md">M.A. History, Researcher</p>
</div>
</div>
</div>
</section>
</main>
<!-- Faculty Support CTA -->
<section class="bg-surface-container-high py-16">
<div class="max-w-container-max mx-auto px-gutter grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
<div>
<h2 class="font-headline-lg text-headline-lg mb-4 text-on-surface">Join Our Distinguished Faculty</h2>
<p class="font-body-md text-body-md text-on-surface-variant mb-8">
                    We are always looking for passionate educators who are dedicated to academic excellence and student development. Discover career opportunities at Mahendra Secondary School.
                </p>
<div class="flex flex-wrap gap-4">
<button class="bg-primary text-on-primary px-8 py-3 rounded-lg font-bold hover:opacity-90 transition-all flex items-center gap-2">
                        View Careers <span class="material-symbols-outlined">arrow_forward</span>
</button>
<button class="border-2 border-primary text-primary px-8 py-3 rounded-lg font-bold hover:bg-primary/5 transition-all">
                        Staff Portal
                    </button>
</div>
</div>
<div class="relative rounded-2xl overflow-hidden shadow-xl aspect-video">
<img class="w-full h-full object-cover" data-alt="A wide-angle shot of a group of diverse faculty members collaborating in a bright, modern staff lounge. They are engaged in professional discussion with laptops and notebooks. The environment is vibrant and professional, with large windows overlooking a green campus. The lighting is bright and airy, suggesting a positive and productive workspace." src="{{ asset('assets/images/img_11840adcd132.jpg') }}"/>
</div>
</div>
</section>
<!-- Footer -->
<footer class="bg-surface-container-highest border-t border-outline-variant">
<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter py-12 px-gutter w-full max-w-container-max mx-auto">
<div class="space-y-4">
<div class="font-headline-md text-headline-md font-bold text-primary">Mahendra Secondary</div>
<p class="text-on-surface-variant font-body-md text-body-md">
                    Leading the community in academic excellence and civic responsibility since 1974.
                </p>
</div>
<div>
<h4 class="font-label-md text-label-md font-bold mb-6 uppercase tracking-wider text-on-surface">Academic Links</h4>
<ul class="space-y-3 font-label-sm text-label-sm text-on-surface-variant">
<li><a class="hover:underline hover:text-primary transition-all" href="#">Curriculum</a></li>
<li><a class="hover:underline hover:text-primary transition-all" href="#">Admissions</a></li>
<li><a class="hover:underline hover:text-primary transition-all" href="#">Library</a></li>
<li><a class="hover:underline hover:text-primary transition-all" href="#">Research</a></li>
</ul>
</div>
<div>
<h4 class="font-label-md text-label-md font-bold mb-6 uppercase tracking-wider text-on-surface">Resources</h4>
<ul class="space-y-3 font-label-sm text-label-sm text-on-surface-variant">
<li><a class="hover:underline hover:text-primary transition-all" href="#">Campus Map</a></li>
<li><a class="hover:underline hover:text-primary transition-all" href="#">Staff Portal</a></li>
<li><a class="hover:underline hover:text-primary transition-all" href="#">Privacy Policy</a></li>
<li><a class="hover:underline hover:text-primary transition-all" href="#">Terms of Service</a></li>
</ul>
</div>
<div>
<h4 class="font-label-md text-label-md font-bold mb-6 uppercase tracking-wider text-on-surface">Connect</h4>
<div class="flex gap-4">
<a class="w-10 h-10 rounded-full bg-surface-container-low flex items-center justify-center hover:bg-primary hover:text-on-primary transition-all" href="#">
<span class="material-symbols-outlined">face_nod</span>
</a>
<a class="w-10 h-10 rounded-full bg-surface-container-low flex items-center justify-center hover:bg-primary hover:text-on-primary transition-all" href="#">
<span class="material-symbols-outlined">alternate_email</span>
</a>
</div>
<p class="mt-6 text-on-surface-variant font-label-sm text-label-sm">
                    © 2024 Mahendra Secondary School. All rights reserved.
                </p>
</div>
</div>
</footer>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/pages/teachers.js') }}" defer></script>
@endpush
