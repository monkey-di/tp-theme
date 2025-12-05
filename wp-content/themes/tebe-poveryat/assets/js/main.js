/**
 * Main JavaScript file for Tebe Poveryat theme.
 */

document.addEventListener('DOMContentLoaded', () => {
    initMobileMenu();
});

/**
 * Initialize Mobile Menu logic
 */
function initMobileMenu() {
    const openBtn = document.querySelector('.js-open-mobile-menu');
    const closeBtn = document.querySelector('.mobile-menu-overlay__close-btn');
    const menuOverlay = document.querySelector('.mobile-menu-overlay');
    const body = document.body;

    if (!openBtn || !menuOverlay) return;

    const openMenu = () => {
        menuOverlay.classList.remove('translate-x-full');
        menuOverlay.classList.add('translate-x-0'); // Slide in
        body.classList.add('overflow-hidden'); // Lock scroll
    };

    const closeMenu = () => {
        menuOverlay.classList.remove('translate-x-0');
        menuOverlay.classList.add('translate-x-full'); // Slide out
        body.classList.remove('overflow-hidden'); // Unlock scroll
    };

    openBtn.addEventListener('click', (e) => {
        e.preventDefault(); // Prevent default button action
        openMenu();
    });

    if (closeBtn) {
        closeBtn.addEventListener('click', (e) => {
            e.preventDefault();
            closeMenu();
        });
    }

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && menuOverlay.classList.contains('translate-x-0')) {
            closeMenu();
        }
    });
}