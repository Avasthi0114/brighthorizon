<?php
error_reporting(0);
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

$host="localhost";
$user="root";
$password="";
$db="brighthorizon";

$data=mysqli_connect($host,$user,$password,$db);
$name=$_SESSION['username'];
$sql="SELECT * FROM user where username='$name'";
$result=mysqli_query($data,$sql);
$info=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <?php
    include 'student_css.php'

    ?>
<style type="text/css">

    .table_th
    {

        padding: 20px;
        font-size:20px
    }

    .table_td
    {
        padding: 20px;
        background-color:skyblue;
    }

</style>


</head>
<body>
<?php
    include'student_sidebar.php';
    ?>
    <div class="content">

    <center>
        <h1>My Profile</h1>
        <?php 
               if($_SESSION['message'])
               {
                echo $_SESSION['message'];              
               }

               unset($_SESSION['message']);
        ?>

<br><br>

          <table border="1px">

            <tr>
                <th class="table_th">ID</th>
                <th class="table_th">UserName</th>
                <th class="table_th">Standard</th>
                <th class="table_th">Email</th>
                <th class="table_th">Phone</th>
                <th class="table_th">Password</th>
                
                <th class="table_th">Update</th>
            </tr>
            
            <tr>
            <td class="table_td">
                <?php
                  echo"{$info['id']}";
                 ?>
                </td>
                <td class="table_td">
                <?php
                  echo"{$info['username']}";
                 ?>
                </td>
                <td class="table_td">
                   <?php
                    echo"{$info['standard']}";
                    ?>
                </td>
                <td class="table_td">
                  <?php
                   echo"{$info['email']}";
                   ?>
                </td>
                <td class="table_td">
                   <?php
                    echo"{$info['phone']}";
                    ?>
                </td>
                <td class="table_td">
                   <?php
                    echo"{$info['password']}";
                    ?>
                </td>
             

                <td class="table_td">
                   <?php
                   echo"<a class='btn btn-primary' href='student_profile.php'>Update</a>";
                   
                   ?>
                </td>
            </tr>
            
          </table>
          </center>
    </div>
</body>
</html>