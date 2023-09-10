<?php
session_start();

if(!isset($_SESSION['username']))
{
    header("location:login.php");
}

elseif($_SESSION['usertype']=='student')
{
    header("location:login.php");
}

$host="localhost";
$user="root";
$password="";
$db="brighthorizon";

$data=mysqli_connect($host,$user,$password,$db);
$sql="select * from admission";

$result=mysqli_query($data,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <?php
    include'admin_css.php';
    ?>
</head>
<body>
    <?php
    include 'admin_sidebar.php';
    ?>
    <div class="content">

    <center>
        <h1>Applied for Admission</h1>
        <br> <br>
        <table border="1px">
            <tr>
                <th style="padding:20px; font-size:15px">Name</th>
                <th style="padding:20px; font-size:15px">Standard</th>
                <th style="padding:20px; font-size:15px">Email</th>
                <th style="padding:20px; font-size:15px">Phone</th>
                <th style="padding:20px; font-size:15px">Address</th>
                <!-- <th style="padding:20px; font-size:15px">Password</th> -->
                <th style="padding:20px; font-size:15px">Add Student</th>
            </tr>
            <?php
            while($info=$result->fetch_assoc())
            {
            ?>
            <tr class="table_td">
                <td style="padding:20px">
                 <?php echo"{$info['name']}"; ?>
                </td>
                <td style="padding:20px">
                 <?php echo"{$info['standard']}"; ?>
                </td>
                <td style="padding:20px">
                <?php echo"{$info['email']}"; ?>
                </td>
                <td style="padding:20px">
                <?php echo"{$info['phone']}"; ?>
                </td>
                <td style="padding:20px">
                <?php echo"{$info['address']}"; ?>
                </td>
                <td style="padding:20px">
                   <?php
                   echo"<a class='btn btn-primary' href='add_student.php?student_username={$info['name']}'>Add Student</a>";                  
                   ?>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
        </center>
    </div>
    <style>
    .table_td
{
    width:250px;
    padding: 20px;
    background-color:skyblue;
}
</style>
</body>
</html>