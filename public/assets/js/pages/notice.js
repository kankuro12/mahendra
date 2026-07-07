// Simple search filtering simulation
        const searchInput = document.querySelector('input[type="text"]');
        const rows = document.querySelectorAll('.notice-row');

        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase();
            rows.forEach(row => {
                const text = row.innerText.toLowerCase();
                row.style.display = text.includes(query) ? '' : 'none';
            });
        });

        // Tab selection visual
        const filterButtons = document.querySelectorAll('.flex.gap-2.overflow-x-auto button');
        filterButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                filterButtons.forEach(b => {
                    b.classList.remove('bg-primary', 'text-on-primary');
                    b.classList.add('bg-white', 'border', 'border-outline-variant', 'text-on-surface-variant');
                });
                btn.classList.remove('bg-white', 'border', 'border-outline-variant', 'text-on-surface-variant');
                btn.classList.add('bg-primary', 'text-on-primary');
            });
        });