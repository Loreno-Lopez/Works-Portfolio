

const dropdown = document.getElementById('bandiera-dropdown');
        const icon = document.getElementById('icon');

        dropdown.addEventListener('mouseenter', () => {
            icon.classList.add('fa-beat');
        });

        dropdown.addEventListener('mouseleave', () => {
            icon.classList.remove('fa-beat');
        });
