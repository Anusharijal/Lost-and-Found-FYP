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
<form>
    <span class="in-form-headings">What Was Lost ?</span>
    <input class="input what-was-lost" placeholder="Phone /  Earbuds / Bag / Books....">
<br>
    <span class="in-form-headings">Where it Was Lost ?</span>
    <input class="input where-it-was-lost" placeholder="Room number / Hall .....">   
<br>
    <span class="in-form-headings">When Was Lost ?</span>
    <input class="input when-it-was-lost" placeholder="Room number / Hall .... ." type="datetime-local">

<br>
    <span class="in-form-headings">Pic of Item: <br><p class="warning">( Hide the confidential info )</p> </span>
    <input class="input when-it-was-lost" type="file">
<br>
    <span class="in-form-headings">Description </span>
    <input class="input when-it-was-lost getdescription" placeholder="Extra Details About Item like color / shape / scratches .....">
<br>
    <span class="in-form-headings">Your Name</span>
    <input class="input when-it-was-lost" placeholder="Full Name" type="text">
<br>
    <span class="in-form-headings">Your Email</span>
    <input class="input when-it-was-lost" placeholder="Email" type="email">
<br>
    <span class="in-form-headings">Your Contact</span>
    <input class="input when-it-was-lost" placeholder="Phone" type="tel">   
    <button type="submit" class="submit-btn">submit</button>
</form>

        </div>
    </div>

<script src="lost.js"></script>
</body>
</html>