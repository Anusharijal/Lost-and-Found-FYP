<document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('.input');
    const submitBtn = form.querySelector('.submit-btn');

    form.addEventListener('submit', (e) => {
        e.preventDefault(); // Prevent form submission

        let valid = true; // To track form validity
        let errorMessage = '';

        // Reset previous styles
        inputs.forEach((input) => {
            input.style.border = '1px solid #ccc';
        });

        // Validation logic
        const whatWasLost = form.querySelector('.what-was-lost');
        const whereItWasLost = form.querySelector('.where-it-was-lost');
        const whenItWasLost = form.querySelector('.when-it-was-lost[type="datetime-local"]');
        const description = form.querySelector('.getdescription');
        const name = form.querySelector('.when-it-was-lost[type="text"]');
        const email = form.querySelector('.when-it-was-lost[type="email"]');
        const phone = form.querySelector('.when-it-was-lost[type="tel"]');
        const file = form.querySelector('.when-it-was-lost[type="file"]');

        if (!whatWasLost.value.trim()) {
            valid = false;
            errorMessage += 'Please specify what was lost.\n';
            whatWasLost.style.border = '2px solid red';
        }

        if (!whereItWasLost.value.trim()) {
            valid = false;
            errorMessage += 'Please specify where it was lost.\n';
            whereItWasLost.style.border = '2px solid red';
        }

        if (!whenItWasLost.value) {
            valid = false;
            errorMessage += 'Please specify when it was lost.\n';
            whenItWasLost.style.border = '2px solid red';
        }

        if (!description.value.trim()) {
            valid = false;
            errorMessage += 'Please provide a description.\n';
            description.style.border = '2px solid red';
        }

        if (!name.value.trim()) {
            valid = false;
            errorMessage += 'Please provide your name.\n';
            name.style.border = '2px solid red';
        }

        if (!email.value.trim() || !validateEmail(email.value)) {
            valid = false;
            errorMessage += 'Please provide a valid email address.\n';
            email.style.border = '2px solid red';
        }

        if (!phone.value.trim() || !validatePhone(phone.value)) {
            valid = false;
            errorMessage += 'Please provide a valid phone number.\n';
            phone.style.border = '2px solid red';
        }

        if (!file.files.length) {
            valid = false;
            errorMessage += 'Please upload a picture of the item.\n';
            file.style.border = '2px solid red';
        }

        if (!valid) {
            alert(errorMessage); // Show error messages
            return;
        }

        // If validation passes, submit the form
        alert('Form submitted successfully!');
        form.submit();
    });

    // Email validation
    function validateEmail(email) {
        const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        return re.test(email);
    }

    // Phone number validation (10-digit numbers)
    function validatePhone(phone) {
        const re = /^[0-9]{10}$/;
        return re.test(phone);
    }
});
