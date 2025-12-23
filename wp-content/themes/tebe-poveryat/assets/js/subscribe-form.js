/**
 * Subscribe Form Validation
 *
 * Disables the submit button until:
 * 1. Email is valid
 * 2. Consent checkbox is checked
 */

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('subscribe-form');
    if (!form) return;

    const emailInput = document.getElementById('subscribe-email');
    const consentCheckbox = document.getElementById('subscribe-consent');
    const submitBtn = document.getElementById('subscribe-btn');

    if (!emailInput || !consentCheckbox || !submitBtn) return;

    // Initialize button as disabled
    submitBtn.disabled = true;
    submitBtn.classList.add('opacity-40', 'cursor-not-allowed');

    /**
     * Validate email using HTML5 pattern
     */
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email) && email.length > 0;
    }

    /**
     * Update button state based on validation
     */
    function updateButtonState() {
        const emailValid = isValidEmail(emailInput.value);
        const consentChecked = consentCheckbox.checked;
        const shouldEnable = emailValid && consentChecked;

        if (shouldEnable) {
            // Enable button
            submitBtn.disabled = false;
            submitBtn.classList.remove('opacity-40', 'cursor-not-allowed');
        } else {
            // Disable button
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-40', 'cursor-not-allowed');
        }
    }

    // Listen to email input changes
    emailInput.addEventListener('input', updateButtonState);
    emailInput.addEventListener('change', updateButtonState);

    // Listen to checkbox changes
    consentCheckbox.addEventListener('change', function() {
        // Toggle checkbox visual state
        const checkboxIcon = this.nextElementSibling?.querySelector('.donation-form__checkbox-icon');
        if (checkboxIcon) {
            if (this.checked) {
                checkboxIcon.classList.remove('hidden');
            } else {
                checkboxIcon.classList.add('hidden');
            }
        }
        updateButtonState();
    });

    // Initial state
    updateButtonState();

    // Prevent form submission if validation fails
    form.addEventListener('submit', function(e) {
        if (submitBtn.disabled) {
            e.preventDefault();
            return false;
        }
    });
});
