@extends('layouts.app')

@section('title', 'Mahendra Secondary School | Empowering Minds')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/home.css') }}">
@endpush

@section('content')

    <!-- Hero Section -->
    <section class="relative w-full h-[921px] flex items-center justify-center overflow-hidden">
        <!-- Hero Background Video Placeholder -->
        <div class="absolute inset-0 z-0">
            <div class="w-full h-full bg-cover bg-center filter brightness-50"
                data-alt="A grand cinematic aerial view of a prestigious, modern school campus in Nepal during a golden sunset. The architecture blends traditional elements with large glass windows. Students in elegant uniforms are seen walking across a lush green courtyard. The lighting is warm and inspiring, emphasizing a sense of academic excellence and heritage."
                style="background-image: url('{{ asset('assets/images/img_8bfe976c8a21.jpg') }}')">
            </div>
            <div class="hero-gradient absolute inset-0"></div>
        </div>
        <div class="relative z-10 text-center text-white px-margin-mobile max-w-4xl mx-auto space-y-6">
            <span
                class="bg-tertiary-container text-on-tertiary-container px-4 py-1.5 rounded-full font-label-sm text-label-sm uppercase tracking-widest animate-fade-in">Established
                1956</span>
            <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg font-bold leading-tight drop-shadow-lg">
                Empowering Minds, Shaping Futures
            </h2>
            <p class="font-body-lg text-lg md:text-xl opacity-90 max-w-2xl mx-auto">
                Mahendra Secondary School - A Legacy of Excellence in providing world-class education for the leaders of
                tomorrow.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
                <a href="{{ route('about') }}"
                    class="bg-primary text-white px-8 py-4 rounded-lg font-bold text-lg hover:brightness-110 transition-all flex items-center justify-center gap-2">
                    Discover Our History <span class="material-symbols-outlined">arrow_forward</span>
                </a>
                <a href="{{ route('gallery') }}"
                    class="bg-white/10 backdrop-blur-md border-2 border-white/30 text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-white/20 transition-all text-center flex items-center justify-center">
                    Virtual Tour
                </a>
            </div>
        </div>
        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce">
            <span class="material-symbols-outlined text-white opacity-50 text-4xl">keyboard_arrow_down</span>
        </div>
    </section>

    <!-- Latest News & Events -->
    <section class="w-full py-24 bg-surface-container-low">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <!-- Upcoming Events Column -->
                <div class="space-y-8">
                    <div class="flex justify-between items-end border-b border-outline-variant pb-4">
                        <h2 class="font-headline-lg text-headline-lg text-on-surface">Upcoming Events</h2>
                        <a class="text-primary font-bold text-sm flex items-center gap-1" href="{{ route('notice') }}">Calendar <span
                                class="material-symbols-outlined text-sm">event</span></a>
                    </div>
                    <div class="space-y-6">
                        <!-- Event 1 -->
                        <div
                            class="flex gap-6 group cursor-pointer bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition-all">
                            <div
                                class="flex-shrink-0 w-20 h-24 bg-primary text-white flex flex-col items-center justify-center rounded-lg">
                                <span class="text-2xl font-bold">15</span>
                                <span class="text-xs uppercase font-bold">OCT</span>
                            </div>
                            <div class="space-y-1">
                                <span class="text-secondary text-xs font-bold uppercase tracking-wider">Academic</span>
                                <h4 class="font-bold text-lg group-hover:text-primary transition-colors">Annual Science and
                                    Technology Fair 2024</h4>
                                <p class="text-on-surface-variant text-sm line-clamp-1">Showcasing innovative projects from
                                    Grade 8-12 students.</p>
                                <div class="flex items-center gap-4 text-xs text-outline pt-2">
                                    <span class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-xs">schedule</span> 10:00 AM</span>
                                    <span class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-xs">location_on</span> Main
                                        Auditorium</span>
                                </div>
                            </div>
                        </div>
                        <!-- Event 2 -->
                        <div
                            class="flex gap-6 group cursor-pointer bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition-all">
                            <div
                                class="flex-shrink-0 w-20 h-24 bg-secondary text-white flex flex-col items-center justify-center rounded-lg">
                                <span class="text-2xl font-bold">22</span>
                                <span class="text-xs uppercase font-bold">OCT</span>
                            </div>
                            <div class="space-y-1">
                                <span class="text-secondary text-xs font-bold uppercase tracking-wider">Social</span>
                                <h4 class="font-bold text-lg group-hover:text-primary transition-colors">Parent-Teacher
                                    Conference (Term 2)</h4>
                                <p class="text-on-surface-variant text-sm line-clamp-1">One-on-one sessions to discuss
                                    student progress and goals.</p>
                                <div class="flex items-center gap-4 text-xs text-outline pt-2">
                                    <span class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-xs">schedule</span> 08:00 AM</span>
                                    <span class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-xs">location_on</span> Classroom Block
                                        B</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Recent Announcements Column -->
                <div class="space-y-8">
                    <div class="flex justify-between items-end border-b border-outline-variant pb-4">
                        <h2 class="font-headline-lg text-headline-lg text-on-surface">Recent Notices</h2>
                        <a class="text-primary font-bold text-sm flex items-center gap-1" href="{{ route('notice') }}">Archive <span
                                class="material-symbols-outlined text-sm">archive</span></a>
                    </div>
                    <div class="space-y-4">
                        <!-- Notice 1 -->
                        <div
                            class="bg-surface-container-highest p-6 rounded-xl border-l-4 border-error relative overflow-hidden">
                            <div class="absolute top-0 right-0 p-2">
                                <span
                                    class="bg-error text-white text-[10px] px-2 py-0.5 rounded-full font-bold">URGENT</span>
                            </div>
                            <span class="text-xs font-bold text-outline">Published: Oct 02, 2024</span>
                            <h4 class="font-bold text-lg mt-1 mb-2">Winter Uniform Regulations Update</h4>
                            <p class="text-on-surface-variant text-sm">All students are required to transition to full
                                winter uniforms by November 1st. Please visit the store...</p>
                            <a class="inline-block mt-4 text-primary font-bold text-sm underline" href="#">Download
                                PDF (450KB)</a>
                        </div>
                        <!-- Notice 2 -->
                        <div class="bg-white p-6 rounded-xl border-l-4 border-tertiary-container">
                            <span class="text-xs font-bold text-outline">Published: Sep 28, 2024</span>
                            <h4 class="font-bold text-lg mt-1 mb-2">Scholarship Applications for Year 2025</h4>
                            <p class="text-on-surface-variant text-sm">The Merit Scholarship portal is now open for
                                students entering Grade 11. Apply before Oct 30th.</p>
                            <a class="inline-block mt-4 text-primary font-bold text-sm underline" href="{{ route('contact') }}">View
                                Application Process</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Principal's Message -->
    <section class="w-full py-24 bg-surface-bright">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="flex flex-col md:flex-row items-center gap-16">
                <div class="w-full md:w-1/2 relative">
                    <div
                        class="aspect-[4/5] bg-surface-container rounded-xl overflow-hidden shadow-xl ring-8 ring-white/50">
                        <img class="w-full h-full object-cover"
                            data-alt="A professional and warm portrait of a senior academic principal, a middle-aged man with a kind smile, wearing a traditional formal Nepali Dhaka topi and a sharp corporate suit. He is standing in a well-lit library filled with old leather-bound books. The photography is sharp with a soft background bokeh, emphasizing his authoritative yet approachable presence."
                            src="{{ asset('assets/images/img_f6a683a3ba3a.jpg') }}" />
                    </div>
                    <div
                        class="absolute -bottom-6 -right-6 bg-primary text-white p-8 rounded-xl shadow-2xl hidden lg:block max-w-xs">
                        <p class="font-body-md italic opacity-90">"Education is not just about books; it's about building
                            character and fostering global citizenship."</p>
                    </div>
                </div>
                <div class="w-full md:w-1/2 space-y-6">
                    <span class="text-primary font-bold tracking-widest font-label-sm uppercase">Leadership Vision</span>
                    <h2 class="font-display-lg text-headline-lg text-on-surface">Welcome to Our Academic Sanctuary</h2>
                    <div class="w-20 h-1 bg-secondary rounded-full"></div>
                    <p class="text-on-surface-variant text-lg leading-relaxed">
                        At Mahendra Secondary School, we are committed to nurturing the potential of every student through a
                        balanced curriculum that emphasizes both intellectual growth and practical skills. For over six
                        decades, our institution has been at the forefront of educational innovation in Nepal.
                    </p>
                    <p class="text-on-surface-variant text-lg leading-relaxed">
                        We invite you to explore our campus and discover the vibrant community that makes our school a
                        premier destination for secondary education.
                    </p>
                    <div class="pt-4">
                        <h4 class="font-bold text-on-surface text-xl">Dr. Hemanta Raj Joshi</h4>
                        <p class="text-primary font-medium">Principal, Mahendra Secondary School</p>
                    </div>
                    <a href="{{ route('message-detail', ['slug' => 'principal']) }}"
                        class="mt-6 inline-block border-2 border-primary text-primary px-8 py-3 rounded-lg font-bold hover:bg-primary hover:text-white transition-all text-center">Read
                        Full Message</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Facilities Section -->
    <section class="w-full py-24 bg-surface">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="text-center mb-16 space-y-4">
                <h2 class="font-display-lg text-headline-lg text-on-surface">World-Class Facilities</h2>
                <p class="text-on-surface-variant max-w-2xl mx-auto">Providing a conducive environment for discovery,
                    learning, and physical development.</p>
                <div class="pt-2">
                    <a href="{{ route('facilities') }}"
                        class="inline-flex items-center gap-2 text-primary font-bold hover:text-secondary transition-colors text-sm">
                        View All Facilities <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter">
                <!-- Science Lab -->
                <div
                    class="group bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-outline-variant">
                    <div class="h-48 overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            data-alt="A state-of-the-art modern school science laboratory with bright lighting. Students in white lab coats are carefully conducting experiments with beakers and microscopes. The room is organized with stainless steel surfaces and high-tech equipment. The aesthetic is clean, professional, and academically focused."
                            src="{{ asset('assets/images/img_046e526490a6.jpg') }}" />
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center gap-2 text-primary">
                            <span class="material-symbols-outlined">science</span>
                            <h3 class="font-headline-md text-xl font-bold">Science Lab</h3>
                        </div>
                        <p class="text-on-surface-variant font-label-md">Equipped with the latest research instruments and
                            safety protocols for physics, chemistry, and biology.</p>
                        <a href="{{ route('facility-detail', ['slug' => 'science-lab']) }}"
                            class="w-full py-2 text-secondary font-bold border-b-2 border-transparent hover:border-secondary transition-all flex items-center justify-center gap-2">View
                            Details <span class="material-symbols-outlined text-sm">open_in_new</span></a>
                    </div>
                </div>
                <!-- Library -->
                <div
                    class="group bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-outline-variant">
                    <div class="h-48 overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            data-alt="A vast, high-ceilinged school library with tall wooden bookshelves reaching the ceiling. Large windows allow natural light to flood into cozy reading nooks where students are focused on their books. The atmosphere is quiet, serene, and intellectual, utilizing a warm color palette of woods and soft blues."
                            src="{{ asset('assets/images/img_723930a7fd73.jpg') }}" />
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center gap-2 text-primary">
                            <span class="material-symbols-outlined">menu_book</span>
                            <h3 class="font-headline-md text-xl font-bold">Library</h3>
                        </div>
                        <p class="text-on-surface-variant font-label-md">A vast collection of over 50,000 titles, digital
                            archives, and quiet study zones for immersive learning.</p>
                        <a href="{{ route('facility-detail', ['slug' => 'library']) }}"
                            class="w-full py-2 text-secondary font-bold border-b-2 border-transparent hover:border-secondary transition-all flex items-center justify-center gap-2">View
                            Details <span class="material-symbols-outlined text-sm">open_in_new</span></a>
                    </div>
                </div>
                <!-- Computer Lab -->
                <div
                    class="group bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-outline-variant">
                    <div class="h-48 overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            data-alt="A modern computer laboratory featuring rows of sleek high-end desktop computers with dual monitors. The room is designed with cool blue accent lighting and ergonomic furniture. Students are engaged in coding and graphic design. The setting looks technologically advanced and future-oriented."
                            src="{{ asset('assets/images/img_9c8e1299b2a0.jpg') }}" />
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center gap-2 text-primary">
                            <span class="material-symbols-outlined">computer</span>
                            <h3 class="font-headline-md text-xl font-bold">Computer Lab</h3>
                        </div>
                        <p class="text-on-surface-variant font-label-md">High-speed fiber connectivity and high-performance
                            machines for ICT and vocational training.</p>
                        <a href="{{ route('facility-detail', ['slug' => 'computer-lab']) }}"
                            class="w-full py-2 text-secondary font-bold border-b-2 border-transparent hover:border-secondary transition-all flex items-center justify-center gap-2">View
                            Details <span class="material-symbols-outlined text-sm">open_in_new</span></a>
                    </div>
                </div>
                <!-- Sports -->
                <div
                    class="group bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-outline-variant">
                    <div class="h-48 overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            data-alt="A wide, vibrant green sports field and athletic track with students playing football and running. In the background, there is a modern gymnasium and stadium seating. The sunlight is bright, creating high-contrast shadows. The scene is energetic and full of life, celebrating physical health and teamwork."
                            src="{{ asset('assets/images/img_24d9187e8073.jpg') }}" />
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center gap-2 text-primary">
                            <span class="material-symbols-outlined">sports_basketball</span>
                            <h3 class="font-headline-md text-xl font-bold">Sports</h3>
                        </div>
                        <p class="text-on-surface-variant font-label-md">Multipurpose ground, basketball courts, and indoor
                            sports hall for physical excellence.</p>
                        <a href="{{ route('facility-detail', ['slug' => 'sports']) }}"
                            class="w-full py-2 text-secondary font-bold border-b-2 border-transparent hover:border-secondary transition-all flex items-center justify-center gap-2">View
                            Details <span class="material-symbols-outlined text-sm">open_in_new</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="w-full bg-surface-container-highest border-t border-outline-variant">
        <div class="w-full py-12 px-margin-desktop grid grid-cols-1 md:grid-cols-4 gap-gutter max-w-container-max mx-auto">
            <!-- Brand & Contact -->
            <div class="space-y-6">
                <h3 class="font-headline-md text-headline-md font-bold text-primary">Mahendra Secondary School</h3>
                <p class="font-body-md text-body-md text-on-surface-variant">Developing leaders through quality education
                    and discipline since 1956.</p>
                <div class="space-y-3">
                    <div class="flex items-center gap-3 text-on-surface">
                        <span class="material-symbols-outlined text-primary">location_on</span>
                        <span class="text-sm">Jhapa, Koshi Province, Nepal</span>
                    </div>
                    <div class="flex items-center gap-3 text-on-surface">
                        <span class="material-symbols-outlined text-primary">call</span>
                        <span class="text-sm">+977-23-XXXXXX</span>
                    </div>
                    <div class="flex items-center gap-3 text-on-surface">
                        <span class="material-symbols-outlined text-primary">mail</span>
                        <span class="text-sm">info@mahendraschool.edu.np</span>
                    </div>
                </div>
            </div>
            <!-- Quick Links -->
            <div class="space-y-6">
                <h4 class="font-bold text-on-surface border-b border-outline-variant pb-2">Academic Links</h4>
                <ul class="space-y-3">
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors text-sm"
                            href="{{ route('notice') }}">Academic Calendar</a></li>
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors text-sm"
                            href="{{ route('teachers') }}">Staff Directory</a></li>
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors text-sm"
                            href="#">Examination Results</a></li>
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors text-sm"
                            href="{{ route('home') }}">Online Resources</a></li>
                </ul>
            </div>
            <!-- Official -->
            <div class="space-y-6">
                <h4 class="font-bold text-on-surface border-b border-outline-variant pb-2">Institution</h4>
                <ul class="space-y-3">
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors text-sm"
                            href="{{ route('privacy') }}">Privacy Policy</a></li>
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors text-sm"
                            href="{{ route('tenders') }}">Tenders</a></li>
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors text-sm"
                            href="{{ route('downloads') }}">Download Center</a></li>
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors text-sm"
                            href="{{ route('careers') }}">Careers</a></li>
                </ul>
            </div>
            <!-- Map Placeholder -->
            <div class="space-y-6">
                <h4 class="font-bold text-on-surface border-b border-outline-variant pb-2">Find Us</h4>
                <div class="rounded-lg overflow-hidden h-48 border border-outline-variant shadow-inner">
                    <div class="w-full h-full bg-surface-dim flex items-center justify-center"
                        data-location="Jhapa, Nepal" style="">
                        <span class="material-symbols-outlined text-primary text-4xl">map</span>
                    </div>
                </div>
                <div class="flex gap-4">
                    <a class="w-8 h-8 rounded-full bg-secondary text-white flex items-center justify-center hover:scale-110 transition-transform"
                        href="https://facebook.com/mahendraschool" target="_blank"><span class="material-symbols-outlined text-sm">face_nod</span></a>
                    <a class="w-8 h-8 rounded-full bg-secondary text-white flex items-center justify-center hover:scale-110 transition-transform"
                        href="https://youtube.com/mahendraschool" target="_blank"><span class="material-symbols-outlined text-sm">video_library</span></a>
                    <a class="w-8 h-8 rounded-full bg-secondary text-white flex items-center justify-center hover:scale-110 transition-transform"
                        href="https://linkedin.com/school/mahendraschool" target="_blank"><span class="material-symbols-outlined text-sm">link</span></a>
                </div>
            </div>
            <div
                class="col-span-1 md:col-span-4 pt-12 border-t border-outline-variant flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="font-label-sm text-label-sm text-on-surface-variant">© 2024 Mahendra Secondary School. Affiliated
                    with the Government of Nepal.</p>
                <div class="flex gap-6">
                    <span class="text-[10px] text-outline">ED-UID: 554-122-001</span>
                    <span class="text-[10px] text-outline">MOE Reg No: 8871/2012</span>
                </div>
            </div>
        </div>
    </footer>
    <!-- FAB for Emergency/Quick Action -->
    <a href="{{ route('contact') }}"
        class="fixed bottom-8 right-8 w-16 h-16 bg-primary text-white rounded-full shadow-2xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all z-50 group">
        <span class="material-symbols-outlined text-3xl">chat</span>
        <span
            class="absolute right-20 bg-white text-primary px-4 py-2 rounded-lg shadow-lg font-bold text-sm whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity">Contact
            Office</span>
    </a>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/pages/home.js') }}" defer></script>
@endpush
