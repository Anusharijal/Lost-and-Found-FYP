<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lost.css">
    <title>lost-form</title>
</head>

<body>
    <div class="mainbox">
        <h2>Report Your Lost Item </h2>
        <div class="lost-foundform">
            <form action="lost_form_handler.php" method="POST" enctype="multipart/form-data">
                <span class="in-form-headings">What Was Lost ?</span>
                <input class="input what-was-lost" name="item_name" placeholder="Phone /  Earbuds / Bag / Books...." required>
                <br>
                <span class="in-form-headings">Where it Was Lost ?</span>
                <input class="input where-it-was-lost" name="location" placeholder="Room number / Hall ..... " required>
                <br>
                <span class="in-form-headings">When Was Lost ?</span>
                <input class="input when-it-was-lost" name="lost_time" type="datetime-local" required>
                <br>
                <span class="in-form-headings">Pic of Item: <br>
                    <p class="warning">( Hide the confidential info )</p>
                </span>
                <input class="input when-it-was-lost" name="item_picture" type="file">
                <br>
                <span class="in-form-headings">Description </span>
                <input class="input when-it-was-lost" name="description" placeholder="Extra Details About Item like color / shape / scratches ....." required>
                <br>
                <span class="in-form-headings">Your Name</span>
                <input class="input when-it-was-lost" name="full_name" placeholder="Full Name" type="text" required>
                <br>
                <span class="in-form-headings">Your Email</span>
                <input class="input when-it-was-lost" name="email" placeholder="Email" type="email" required>
                <br>
                <span class="in-form-headings">Your Contact</span>
                <input class="input when-it-was-lost" name="phone" placeholder="Phone" type="tel" required>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>
    <script src="lost.js"></script>
</body>

</html>