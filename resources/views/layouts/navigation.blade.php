<!-- Main Sticky Header -->
<header id="main-header" class="fixed top-0 left-0 right-0 z-50 bg-surface-container-lowest shadow-sm transition-all duration-300 border-b border-outline-variant w-full">
    <!-- Top Info Bar (Design System Mandate) -->
    <div id="top-info-bar" class="w-full bg-primary py-2 px-margin-mobile md:px-margin-desktop flex justify-between items-center text-white text-xs font-medium transition-all duration-300 max-h-12 opacity-100 overflow-hidden">
        <div class="flex gap-4">
            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">call</span> +977-1-4XXXXXX</span>
            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">mail</span> info@mahendraschool.edu.np</span>
        </div>
        <div class="hidden md:flex gap-4 font-label-sm uppercase tracking-wider text-[10px]">
            <span>Affiliated with the Government of Nepal</span>
        </div>
    </div>

    <!-- Navigation Header -->
    <div id="nav-container" class="flex justify-between items-center px-margin-mobile md:px-margin-desktop py-4 max-w-container-max mx-auto w-full transition-all duration-300">
        <div class="flex items-center">
            <a href="{{ route('home') }}">
                <h1 class="font-display-lg text-headline-md font-bold text-primary">Mahendra School</h1>
            </a>
        </div>
        <nav class="hidden lg:flex items-center gap-gutter">
            <a class="{{ Route::is('home') ? 'text-primary border-b-2 border-primary pb-1 font-bold' : 'text-secondary font-medium hover:text-primary' }} font-label-md text-label-md transition-colors" href="{{ route('home') }}">Home</a>
            <a class="{{ Route::is('about') ? 'text-primary border-b-2 border-primary pb-1 font-bold' : 'text-secondary font-medium hover:text-primary' }} font-label-md text-label-md transition-colors" href="{{ route('about') }}">About</a>
            <a class="{{ Route::is('facilities') || Route::is('facility-detail') ? 'text-primary border-b-2 border-primary pb-1 font-bold' : 'text-secondary font-medium hover:text-primary' }} font-label-md text-label-md transition-colors" href="{{ route('facilities') }}">Facilities</a>
            <a class="{{ Route::is('gallery') || Route::is('gallery-detail') ? 'text-primary border-b-2 border-primary pb-1 font-bold' : 'text-secondary font-medium hover:text-primary' }} font-label-md text-label-md transition-colors" href="{{ route('gallery') }}">Gallery</a>
            <a class="{{ Route::is('notice') ? 'text-primary border-b-2 border-primary pb-1 font-bold' : 'text-secondary font-medium hover:text-primary' }} font-label-md text-label-md transition-colors" href="{{ route('notice') }}">Notice</a>
            <a class="{{ Route::is('alumni') ? 'text-primary border-b-2 border-primary pb-1 font-bold' : 'text-secondary font-medium hover:text-primary' }} font-label-md text-label-md transition-colors" href="{{ route('alumni') }}">Alumni</a>
            <a class="{{ Route::is('teachers') ? 'text-primary border-b-2 border-primary pb-1 font-bold' : 'text-secondary font-medium hover:text-primary' }} font-label-md text-label-md transition-colors" href="{{ route('teachers') }}">Teachers</a>
            <a class="{{ Route::is('messages') || Route::is('message-detail') ? 'text-primary border-b-2 border-primary pb-1 font-bold' : 'text-secondary font-medium hover:text-primary' }} font-label-md text-label-md transition-colors" href="{{ route('messages') }}">Messages</a>
            <a class="{{ Route::is('contact') ? 'text-primary border-b-2 border-primary pb-1 font-bold' : 'text-secondary font-medium hover:text-primary' }} font-label-md text-label-md transition-colors" href="{{ route('contact') }}">Contact</a>
        </nav>
        <div class="flex items-center gap-4">
            <a href="{{ route('contact') }}" class="bg-primary text-on-primary px-6 py-2.5 rounded-lg font-bold hover:bg-primary-container transition-all active:scale-95 text-center text-sm">Apply Now</a>
            <button id="menu-toggle" class="lg:hidden text-primary hover:opacity-85 active:scale-95 transition-all">
                <span class="material-symbols-outlined text-3xl">menu</span>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Navigation Drawer -->
<div id="mobile-menu" class="hidden fixed inset-0 z-50 bg-black/40 backdrop-blur-sm lg:hidden flex justify-end transition-opacity duration-300">
    <div class="w-72 h-full bg-surface-lowest p-6 shadow-2xl flex flex-col gap-8 relative animate-slide-in">
        <div class="flex justify-between items-center border-b border-outline-variant pb-4">
            <span class="font-display-lg text-xl font-bold text-primary">School Portal</span>
            <button id="menu-close" class="text-secondary hover:text-primary active:scale-95 transition-transform">
                <span class="material-symbols-outlined text-3xl">close</span>
            </button>
        </div>
        <nav class="flex flex-col gap-4 overflow-y-auto">
            <a class="{{ Route::is('home') ? 'text-primary font-bold bg-primary-fixed/30 px-4 py-2 rounded-lg' : 'text-secondary font-medium hover:bg-surface-container/50 px-4 py-2 rounded-lg' }} text-base transition-all" href="{{ route('home') }}">Home</a>
            <a class="{{ Route::is('about') ? 'text-primary font-bold bg-primary-fixed/30 px-4 py-2 rounded-lg' : 'text-secondary font-medium hover:bg-surface-container/50 px-4 py-2 rounded-lg' }} text-base transition-all" href="{{ route('about') }}">About</a>
            <a class="{{ Route::is('facilities') || Route::is('facility-detail') ? 'text-primary font-bold bg-primary-fixed/30 px-4 py-2 rounded-lg' : 'text-secondary font-medium hover:bg-surface-container/50 px-4 py-2 rounded-lg' }} text-base transition-all" href="{{ route('facilities') }}">Facilities</a>
            <a class="{{ Route::is('gallery') || Route::is('gallery-detail') ? 'text-primary font-bold bg-primary-fixed/30 px-4 py-2 rounded-lg' : 'text-secondary font-medium hover:bg-surface-container/50 px-4 py-2 rounded-lg' }} text-base transition-all" href="{{ route('gallery') }}">Gallery</a>
            <a class="{{ Route::is('notice') ? 'text-primary font-bold bg-primary-fixed/30 px-4 py-2 rounded-lg' : 'text-secondary font-medium hover:bg-surface-container/50 px-4 py-2 rounded-lg' }} text-base transition-all" href="{{ route('notice') }}">Notice</a>
            <a class="{{ Route::is('alumni') ? 'text-primary font-bold bg-primary-fixed/30 px-4 py-2 rounded-lg' : 'text-secondary font-medium hover:bg-surface-container/50 px-4 py-2 rounded-lg' }} text-base transition-all" href="{{ route('alumni') }}">Alumni</a>
            <a class="{{ Route::is('teachers') ? 'text-primary font-bold bg-primary-fixed/30 px-4 py-2 rounded-lg' : 'text-secondary font-medium hover:bg-surface-container/50 px-4 py-2 rounded-lg' }} text-base transition-all" href="{{ route('teachers') }}">Teachers</a>
            <a class="{{ Route::is('messages') || Route::is('message-detail') ? 'text-primary font-bold bg-primary-fixed/30 px-4 py-2 rounded-lg' : 'text-secondary font-medium hover:bg-surface-container/50 px-4 py-2 rounded-lg' }} text-base transition-all" href="{{ route('messages') }}">Messages</a>
            <a class="{{ Route::is('contact') ? 'text-primary font-bold bg-primary-fixed/30 px-4 py-2 rounded-lg' : 'text-secondary font-medium hover:bg-surface-container/50 px-4 py-2 rounded-lg' }} text-base transition-all" href="{{ route('contact') }}">Contact</a>
        </nav>
        <div class="mt-auto border-t border-outline-variant pt-6">
            <a href="{{ route('contact') }}" class="w-full block bg-primary text-on-primary py-3 rounded-lg font-bold hover:brightness-110 active:scale-95 text-center transition-all">Apply Now</a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const burger = document.getElementById('menu-toggle');
    const close = document.getElementById('menu-close');
    const drawer = document.getElementById('mobile-menu');
    
    if (burger && drawer) {
        burger.addEventListener('click', () => {
            drawer.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        });
    }
    
    if (close && drawer) {
        close.addEventListener('click', () => {
            drawer.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        });
    }
});
</script>
