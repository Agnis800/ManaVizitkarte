<?php


define('REQUIRED_FIELD_ERROR', 'This field is required');
$errors = [];

$firstname = '';
$lastname = '';
$email = '';
$subject = '';
$message = '';
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
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "This field must be valid email address";
    }
    
    if (!$subject){
        $errors['subject'] = REQUIRED_FIELD_ERROR;
    }

    if (!$message){
        $errors['message'] = REQUIRED_FIELD_ERROR;
    }

    // Save to db

    require_once "database.php";

    $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";


    $sql = $connection->prepare("
    INSERT INTO
            contact (firstname, lastname, email, subject_text, client_message)
            VALUES (?, ?, ?, ?, ?)
        ");



    $sql->bind_param("sssss", $firstname, $lastname, $email, $subject, $message);

    $sql->execute();
    $sql->close();
    echo "New records created succesfully";
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

