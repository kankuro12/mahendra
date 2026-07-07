// Simple Micro-interactions
        document.querySelectorAll('button, a').forEach(el => {
            el.addEventListener('mousedown', () => {
                el.style.transform = 'scale(0.95)';
            });
            el.addEventListener('mouseup', () => {
                el.style.transform = 'scale(1)';
            });
            el.addEventListener('mouseleave', () => {
                el.style.transform = 'scale(1)';
            });
        });