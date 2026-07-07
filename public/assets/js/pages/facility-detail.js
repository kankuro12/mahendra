// Redundant scroll logic removed, handled globally

        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const btn = e.target.querySelector('button');
                const originalText = btn.innerText;
                btn.innerText = 'Sending...';
                btn.disabled = true;
                
                setTimeout(() => {
                    btn.innerText = 'Inquiry Sent!';
                    btn.classList.replace('bg-primary', 'bg-tertiary');
                    e.target.reset();
                    setTimeout(() => {
                        btn.innerText = originalText;
                        btn.classList.replace('bg-tertiary', 'bg-primary');
                        btn.disabled = false;
                    }, 3000);
                }, 1500);
            });
        }