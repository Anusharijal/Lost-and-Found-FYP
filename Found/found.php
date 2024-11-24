<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="found.css">
    <title>found-form</title>
</head>
<body>
<div class="mainbox">
        <h2>Report Found Item </h2>
        <div class="lost-foundform">
<form>
    <span class="in-form-headings">What Was Found ?</span>
    <input class="input what-was-lost" placeholder="Phone /  Earbuds / Bag / Books...." required>
<br>
    <span class="in-form-headings">Where it Was Found ?</span>
    <input class="input where-it-was-lost" placeholder="Room number / Hall ....." required>   
<br>
    <span class="in-form-headings">When Was Found ?</span>
    <input class="input when-it-was-lost" placeholder="Room number / Hall .... ." type="datetime-local" required>
<br>

    <span class="in-form-headings">Pic of Item: <br><p class="warning">( Hide the confidential info )</p> </span>
    <input class="input when-it-was-lost" type="file">
<br>
    <span class="in-form-headings">Anything description to Share </span>
    <input class="input when-it-was-lost getdescription" placeholder="Extra Details About Item like color / shape / scratches .....">
<br>
    <span class="in-form-headings">Your Name</span>
    <input class="input when-it-was-lost" placeholder="Full Name" type="text" required>
<br>
    <span class="in-form-headings">Your Email</span>
    <input class="input when-it-was-lost" placeholder="Email" type="email" required>
<br>
    <span class="in-form-headings">Your Contact</span>
    <input class="input when-it-was-lost" placeholder="Phone" type="tel" required>   
    <input class="input submitbtn" type="submit">
</form>

        </div>
    </div>
<script src="found.js"></script>
</body>
</html>