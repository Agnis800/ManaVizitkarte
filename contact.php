<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="contact-style.css">
<title>Contact Me</title>
</head>
<body>

<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="projects.php">Projects</a></li>
</ul>

<h3>Contact Form</h3>
</body>

<div class="container">
    <form action="action_page.php">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Your name..">

        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lastname" placeholder="Your last name..">

        <label for="email">E-mail</label>
        <input type="text" id="e-mail" name="e-mail" placeholder="Your e-mail..">

        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something..." style="height:200px"></textarea>

        <input type="submit" value="Submit">
        
    </form>
</div>
