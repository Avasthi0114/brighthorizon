<?php

/*error_reporting(0);*/
session_start();

$host="localhost";
$user="root";
$password="";
$db="brighthorizon";

$data=mysqli_connect($host,$user,$password,$db);


if($data == false)
{
    die("connection error");
}
if(isset($_POST["apply"]))
{
    $data_name=$_POST['name'];
    $data_std=$_POST['standard'];
    $data_email =$_POST['email'];
    $data_phone =$_POST['phone'];
    $data_address =$_POST['address'];
    $data_pass =$_POST['password'];

    $sql="INSERT INTO admission(name,standard,email,phone,address,password) VALUES('$data_name','$data_std',
    '$data_email','$data_phone','$data_address','$data_pass')";

    $result=mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['message']="Your application sent successfully";
        header("location: index.php");
    }
    else{
        echo"Apply Failed";
    }
}
?>