<?php
session_start();

$host="localhost";
$user="root";
$password="";
$db="brighthorizon";

$data=mysqli_connect($host,$user,$password,$db);

$sid=$_GET['student_id'];

$m = "SELECT username FROM user WHERE id='$sid'";
$r1 = mysqli_query($data, $m);
$row = mysqli_fetch_assoc($r1);
$username = $row['username'];
$q = "DELETE FROM login_check WHERE username='$username'";
$r2 = mysqli_query($data, $q);

$q7="DELETE FROM feespaid WHERE id='$sid' ";
$query="DELETE FROM user WHERE id='$sid' ";
$result=mysqli_query($data,$query);

if($result)
{
    $_SESSION['message']='Student record deleted successfully';
        header("location:view_student.php");
}
else{
    echo"<font color='red'> Failed to delete record";
}
?>
