// Redundant scroll logic removed, handled globally

        // Filter button active state
        const filterButtons = document.querySelectorAll('button[class*="rounded-full"]');
        filterButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                filterButtons.forEach(b => {
                    b.classList.remove('bg-primary', 'text-white');
                    b.classList.add('bg-surface-container', 'text-on-surface-variant');
                });
                btn.classList.add('bg-primary', 'text-white');
                btn.classList.remove('bg-surface-container', 'text-on-surface-variant');
            });
        });