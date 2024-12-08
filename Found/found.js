document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (e) {
        e.preventDefault(); // Prevent default form submission
        

        const formData = new FormData(form);

     )

        // Send form data via AJAX
        fetch("found_form_handler.php", {
            method: "POST",
            body: formData,
        })
        
            .then((response) => response.json())
            
            console.log(response)
            .then((data) => {
                if (data.status === "success") {
                    alert(data.message); // Show success alert
                    //window.location.href = "/index.php"; // Redirect to the home page
                } else {
                    alert(data.message); // Show error alert
                }
            })
            .catch((error) => {
                console.error("Error:", error);
                alert("An unexpected error occurred. Please try again.");
            });
    });

