// Micro-interaction for form submission
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const btn = e.target.querySelector('button');
            const originalText = btn.innerHTML;
            
            btn.innerHTML = '<span class="material-symbols-outlined animate-spin">sync</span> Sending...';
            btn.disabled = true;
            
            setTimeout(() => {
                btn.innerHTML = '<span class="material-symbols-outlined">check_circle</span> Message Sent!';
                btn.classList.remove('bg-primary');
                btn.classList.add('bg-tertiary', 'text-on-tertiary-fixed');
                e.target.reset();
                
                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.classList.add('bg-primary');
                    btn.classList.remove('bg-tertiary', 'text-on-tertiary-fixed');
                    btn.disabled = false;
                }, 3000);
            }, 1500);
        });