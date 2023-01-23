<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="contact-style.css">
<title>Contact Me</title>
</head>
<body>

<ul>
    <li><a href="/">Home</a></li>
    <li><a href="/about">About</a></li>
    <li><a href="/projects">Projects</a></li>
</ul>

<h3>Contact Form</h3>
</body>

<div class="container">
    <form action="/contact" method="post" novalidate>
        <div class="row">
           <div class="col">
             <div class="form-group">
                <label>First name</label>
                <input class="form-control" <?php echo isset($errors['firstname']) ? 'is-invalid' : ''?>"
                       name="firstname" value="<?php echo $firstname ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['firstname'] ?? '' ?>
                </div>
            </div>
         </div>
         <div class="col">
            <div class="form-group">
                <label>Last name</label>
                <input class="form-control" <?php echo isset($errors['lastname']) ? 'is-invalid' : ''?>"
                       name="lastname" value="<?php echo $lastname ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['lastname'] ?? '' ?>
                </div>
            </div>
        <div class="col">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" <?php echo isset($errors['email']) ? 'is-invalid' : ''?>"
                       name="email" value="<?php echo $email ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['email'] ?? '' ?>
                </div>
            </div>
       </div>
       <div class="col">
          <div class="form-group">
               <label>Subject</label>
               <input class="form-control" <?php echo isset($errors['subject']) ? 'is-invalid' : ''?>"
                       name="subject" value="<?php echo $subject ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['subject'] ?? '' ?>
                </div>
       </div>
       <div class="col">
          <div class="form-group">
               <label>Message</label>
               <input class="form-control" <?php echo isset($errors['message']) ? 'is-invalid' : ''?>"
                        id="subject" name="message" style="height:200px" value="<?php echo $message ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['message'] ?? '' ?>
                </div>
          </div>
       </div>

       <div class="form-group">
          <input type="submit">
       </div>
</form>
</div>

