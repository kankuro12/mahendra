document.addEventListener("DOMContentLoaded", () => {
    const header = document.getElementById('main-header');
    const topBar = document.getElementById('top-info-bar');
    const navContainer = document.getElementById('nav-container');
    if (!header || !topBar || !navContainer) return;

    // Sticky Scroll Event Listener
    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            // Collapse top bar
            topBar.classList.remove('max-h-12', 'py-2', 'opacity-100');
            topBar.classList.add('max-h-0', 'py-0', 'opacity-0');
            
            // Shrink nav container padding
            navContainer.classList.remove('py-4');
            navContainer.classList.add('py-2.5');
            
            // Scrolled header background and shadow
            header.classList.remove('bg-surface-container-lowest');
            header.classList.add('bg-white/80', 'backdrop-blur-md', 'shadow-md');
        } else {
            // Restore top bar
            topBar.classList.remove('max-h-0', 'py-0', 'opacity-0');
            topBar.classList.add('max-h-12', 'py-2', 'opacity-100');
            
            // Restore nav container padding
            navContainer.classList.remove('py-2.5');
            navContainer.classList.add('py-4');
            
            // Restore header background and shadow
            header.classList.remove('bg-white/80', 'backdrop-blur-md', 'shadow-md');
            header.classList.add('bg-surface-container-lowest');
        }
    });
});
