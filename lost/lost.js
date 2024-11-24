<script>
    document.querySelector("form").addEventListener("submit", function (event) {
        // Prevent the form from submitting
        event.preventDefault()};

        // Get form data
        const item = document.getElementById("item").value.trim();
        const location = document.getElementById("location").value.trim();
        const datetime = document.getElementById("datetime").value;
        const name = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();
        const contact = document.getElementById("contact").value.trim();

        // Basic Validation
        if (!item || !location || !datetime || !name || !email || !contact) {
            alert("Please fill out all the required fields!")};
            return;
        

        // Phone Number Validation
        if (!/^\d{10}$/.test(contact)) {
            alert("Phone number must be exactly 10 digits.")};
            return;
        

        // All validations passed
        alert("Form submitted successfully!");

        // Optionally: Submit the form (if using a backend server)
        // event.target.submit();
    );
</script>
