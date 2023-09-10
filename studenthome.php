<?php

/*If username is not set...i.e if we try to go to admin page through home page link */
session_start();

if(!isset($_SESSION['username']))
{
    header("location:login.php");
}


/*So that one can't go to admin from student login*/
elseif($_SESSION['usertype']=='admin')
{
    header("location:login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>

    <?php
    include'student_css.php'
    ?>

</head>
<body>
  <?php
  include'student_sidebar.php'
  ?>
  <div class="content">
    
        <h1>Student Dashboard</h1>
    </div>

  
</body>
</html>