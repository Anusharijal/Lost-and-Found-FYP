$(document).ready(function () {
    // Toggle between Login and Signup forms
    $('#switch-to-login').click(function (e) {
        e.preventDefault();
        $('#signup').hide();
        $('#login').show();
    });

    $('#switch-to-signup').click(function (e) {
        e.preventDefault();
        $('#login').hide();
        $('#signup').show();
    });

    // Handle Sign Up form submission
    $(document).ready(function () {
        // Handle Sign Up form submission
        $('#signup').on('submit', function (e) {
            e.preventDefault(); // Prevent default form submission
    
            // Collect form data
            var name = $('#name').val().trim();
            var email = $('#email').val().trim();
            var phone = $('#phone').val().trim();
            var password = $('#password').val();
            var confirmPassword = $('#confirm-password').val();
    
            // Client-side validation
            if (!name || !email || !phone || !password || !confirmPassword) {
                alert("All fields are required.");
                return;
            }
    
            // Submit via AJAX to process_register.php
            $.ajax({
                url: 'process_register.php',
                method: 'POST',
                dataType: 'json', // Expect JSON response
                data: {
                    name: name,
                    email: email,
                    phone: phone,
                    password: password,
                    'confirm-password': confirmPassword
                },
                success: function (response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        $('#signup').hide();
                        $('#login').show();
                    } else if (response.status === 'error') {
                        alert("Error: " + response.message);
                    }
                },
                error: function () {
                    alert("An unexpected error occurred. Please try again.");
                }
            });
        });
    });
    

    // Handle Log In form submission
    $('#login').on('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        // Collect form data
        var loginInput = $('#login-input').val().trim();
        var loginPassword = $('#login-password').val();

        // Client-side validation
        if (!loginInput || !loginPassword) {
            alert("Both fields are required.");
            return;
        }

        // Submit via AJAX to process_login.php
        $.ajax({
            url: 'process_login.php',
            method: 'POST',
            data: {
                'login-input': loginInput,
                'login-password': loginPassword
            },
            success: function (response) {
                if (response.includes("success")) {
                    alert("Login successful!");
                    window.location.href = "../dashboard/dashboard.php"; // Redirect to the dashboard
                } else if (response.includes("error")) {
                    alert("Login failed: " + response);
                }
            },
            error: function () {
                alert("An error occurred during login. Please try again.");
            }
        });
    });
});
