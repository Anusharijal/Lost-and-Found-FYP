<?php
session_start();
// After validating login credentials, set a session
$_SESSION['logged_in'] = true; // This is just an example; your login logic will vary

// Then, in JavaScript, you can redirect
echo "<script>window.location.href = 'index.php';</script>";
?>


<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> 
    <title>Khoj Sathi</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        
            <a class="logo" href="#">Khoj Sathi</a>
            <ul class="nav-links">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="lost/lost.php">Report Lost</a></li>
                <li><a href="Found/found.php">Report Found</a></li>
                <li><a href="items/items.php">View Items</a></li>
                <li><a href="login/login.php">Sign Up</a></li>
                
            </ul>
    
    </nav>

    

    <!-- Homepage Section  -->
    <section class="homepage">
        <div class="overlay"></div>
        <h2>We make it easier for you to find your lost items</h2>
        <p>Cause every lost item deserves to be found</p>
        

        <a href="search-btn.php" class="search-btn">Start Searching</a>
    </section>

    <section id="how-it-works" class="how-it-works">
        <h2>How It Works</h2>
        <div class="steps-container">
            <!-- Step 1: View List of Items -->
            <div class="step">
                <i class="icon">🔍</i>
                <h3>View List of Items</h3>
                <p>Browse through the list of found or lost items to start your search.</p>
            </div>
            
            <!-- Step 2: Check for Matching Items -->
            <div class="step">
                <i class="icon">⚠️</i>
                <h3>Check for Matches</h3>
                <p>See if any item matches your search—whether you lost or found it.</p>
            </div>
            
            <!-- Step 3: Login to the Site -->
            <div class="step">
                <i class="icon">🔑</i>
                <h3>Login to the Site</h3>
                <p>Login to claim your lost item or proceed further with your search.</p>
            </div>
            
            <!-- Step 4: Claim or Alert the Owner -->
            <div class="step">
                <i class="icon">✔️</i>
                <h3>Claim or Alert</h3>
                <p>If a match is found, claim your item or alert the owner if you found someone else's.</p>
            </div>
            
            <!-- Step 5: Report an Item -->
            <div class="step">
                <i class="icon">📄</i>
                <h3>Report an Item</h3>
                <p>If no match is found, simply report it as a lost or found item.</p>
            </div>
        </div>
    </section>
    



    <!-- Footer Section -->
<footer class="footer">
    <div class="footer-content">
        <div class="footer-logo">
            <a href="#">Khoj Sathi</a>
        </div>

        <div class="footer-links">
            <a href="about.php">About Us</a>
            <a href="contact.php">Contact</a>
            <a href="privacy.php">Privacy Policy</a>
            <a href="terms.php">Terms of Service</a>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Khoj Sathi. All rights reserved.</p>
    </div>
</footer>


    <!-- JavaScript to Change Navbar Background on Scroll -->
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</php>
