<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale\1.0">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="index-style.css">
<script src="script.js" defer></script>
<title>Agnis Vanags</title>
</head>
<body>

<div class="left">
  <p><a href="about.php">About</a></p>
</div>
  
<div class="main">
  <p><a href="projects.php">Projects</a></p>
</div>
  
<div class="right">
  <p><a href="contact.php">Contact me</a></p>
</div>

<h1>Agnis Vanags</h1>
<p>Musican, programmer</p>
<img src="https://thumbs.dreamstime.com/b/modern-computer-programming-code-screen-showing-random-scripts-113805394.jpg" style="max-width:50%;height:auto;" alt="Code">

<footer>
  <?php include "footer.php"; ?>
</footer>

<?php>

   class mansprojekts {
     public $projectname = 'manavizitkarte';
     public $version = '4.0';
     public $collaborators = ['Agnis', '2'];
     public $files = 'index.php', 'about.php'

     public function hello()

        echo $this - >projectname . ' - ' . $this-version;

   }

   //šeit ir izvietots objekts
   $project = new MyProject();

   //šeit ir printesana
   echo $project - projectname;
   echo $project - version;
     
?>

<script>
  //console.log('hello js');
  //let footer = document.querySelector('footer > div');
  //console.log(footer);
</script>

</body>
</html>

<!---
  
<ul>
  <li><a href="about.html">About</a></li>
  <li><a href="projects.html">Projects</a></li>
  <li><a href="contact.html">Contact me</a></li>
</ul>
