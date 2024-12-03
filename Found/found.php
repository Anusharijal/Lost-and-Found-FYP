<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="found.css">
    <title>Found Item Report</title>
</head>

<body>
    <div class="mainbox">
        <h2>Report Found Item</h2>
        <div class="lost-foundform">
            <!-- Form Action and Method Updated -->
            <form action="found_form_handler.php" method="POST" enctype="multipart/form-data">
                <span class="in-form-headings">What Was Found ?</span>
                <input class="input what-was-lost" name="item_name" placeholder="Phone / Earbuds / Bag / Books...." required>
                <br>

                <span class="in-form-headings">Where it Was Found ?</span>
                <input class="input where-it-was-lost" name="location" placeholder="Room number / Hall ....." required>
                <br>

                <span class="in-form-headings">When Was Found ?</span>
                <input class="input when-it-was-lost" name="found_time" type="datetime-local" required>
                <br>

                <span class="in-form-headings">Pic of Item: <br>
                    <p class="warning">( Hide the confidential info )</p>
                </span>
                <input class="input when-it-was-lost" name="item_picture" type="file">
                <br>

                <span class="in-form-headings">Anything description to Share </span>
                <input class="input when-it-was-lost getdescription" name="description" placeholder="Extra Details About Item like color / shape / scratches .....">
                <br>

                <span class="in-form-headings">Your Name</span>
                <input class="input when-it-was-lost" name="full_name" placeholder="Full Name" type="text" required>
                <br>

                <span class="in-form-headings">Your Email</span>
                <input class="input when-it-was-lost" name="email" placeholder="Email" type="email" required>
                <br>

                <span class="in-form-headings">Your Contact</span>
                <input class="input when-it-was-lost" name="phone" placeholder="Phone" type="tel" required>
                <br>

                <input class="input submitbtn" type="submit" value="Submit">
            </form>
        </div>
    </div>
    <script src="found.js"></script>
</body>

</html>