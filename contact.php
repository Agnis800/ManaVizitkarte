<?php


define('REQUIRED_FIELD_ERROR', 'This field is required');
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     
    //echo '<pre>';
    //var_dump($_POST);
    //echo '</pre>';

    $firstname = post_data('firstname');
    $lastname = post_data('lastname');
    $email = post_data('email');
    $subject = post_data('subject');
    $message = post_data('message');
    echo '<pre>';
    var_dump($firstname, $lastname, $email, $subject, $message);
    echo '</pre>';

    if (!$firstname){
       $errors['firstname'] = REQUIRED_FIELD_ERROR;
    }

    if (!$lastname){
        $errors['lastname'] = REQUIRED_FIELD_ERROR;
    }

    if (!$email){
       $errors['email'] = REQUIRED_FIELD_ERROR;
    }
    
    if (!$subject){
        $errors['subject'] = REQUIRED_FIELD_ERROR;
    }

    if (!$message){
        $errors['message'] = REQUIRED_FIELD_ERROR;
    }
}

function post_data($field)
{
    $_POST[$field] ??= false;
    
    return htmlspecialchars(stripslashes($_POST[$field]));
}

?>

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
    <form action="" method="post" novalidate>
        <div class="row">
           <div class="col">
             <div class="form-group">
                <label>First name</label>
                <input class="form-control <?php echo isset($errors['firstname']) ? 'is-invalid' : ''?>"
                       name="firstname">
                <div class="invalid-feedback">
                    <?php echo $errors['firstname'] ?? '' ?>
                </div>
            </div>
         </div>
         <div class="col">
            <div class="form-group">
                <label>Last name</label>
                <input class="form-control" <?php echo isset($errors['lastname']) ? 'is-invalid' : ''?>"
                       name="lastname">
                <div class="invalid-feedback">
                    <?php echo $errors['lastname'] ?? '' ?>
                </div>
            </div>
        <div class="col">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" <?php echo isset($errors['email']) ? 'is-invalid' : ''?>"
                       name="email" value="">
                <div class="invalid-feedback">
                    <?php echo $errors['email'] ?? '' ?>
                </div>
            </div>
       </div>
       <div class="col">
          <div class="form-group">
               <label>Subject</label>
               <input class="form-control" <?php echo isset($errors['subject']) ? 'is-invalid' : ''?>"
                       name="subject">
                <div class="invalid-feedback">
                    <?php echo $errors['subject'] ?? '' ?>
                </div>
       </div>
       <div class="col">
          <div class="form-group">
               <label>Message</label>
               <input class="form-control" <?php echo isset($errors['message']) ? 'is-invalid' : ''?>"
                        id="subject" name="message" style="height:200px">
                <div class="invalid-feedback">
                    <?php echo $errors['message'] ?? '' ?>
                </div>
          </div>
       </div>

       <div class="form-group">
          <button class="btn btn-primary">Submit</button>
       </div>
</form>
</div>
