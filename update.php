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
$s_id=$_GET['student_id'];

// $sql="select * from user where id='$id'";


$sql="SELECT * from feespaid,user,feesperyear WHERE (user.id = feespaid.id and feesperyear.standard = user.standard) and user.id='$s_id'";
               

$result=mysqli_query($data,$sql);
$info=$result->fetch_assoc();

if(isset($_POST['update']))
{
    $name=$_POST['name'];
    $standard=$_POST['standard'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $amtpaid=$_POST['amtpaid'];
    $date=$_POST['date'];
    $mode=$_POST['mode'];

    
    $m = "SELECT username FROM user WHERE id='$s_id'";
    $r1 = mysqli_query($data, $m);
    $row = mysqli_fetch_assoc($r1);
    $username = $row['username'];
    $q="UPDATE login_check SET username='$name'
    WHERE username='$username'";
    $r2 = mysqli_query($data, $q);

    $query="UPDATE user SET username='$name', standard='$standard',email='$email',phone='$phone' 
    WHERE id='$s_id'";

    
$q9="UPDATE feespaid SET amtpaid='$amtpaid', date='$date',mode='$mode' 
WHERE id='$s_id'";
$r9=mysqli_query($data,$q9);

    $result2=mysqli_query($data,$query);
    if($result2)
    {
        header("location:view_student.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Details</title>
    <?php
    include 'admin_css.php'
    ?>

    <style type="text/css">
        label{
            display: inline-block;
            width: 100px;
            text-align:right;
            padding-top:10px;
            padding-bottom:10px;
        }

        .div_deg{
            background-color:skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
</head>
<body>
<?php
    include'admin_sidebar.php';
    ?>
    <div class="content">
        <center>
        <h1>Update Student</h1>
<div class="div_deg">
    <form action="#" method="POST">
        <div>
            <label for="">Username</label>
            <input type="text"name="name" 
            value="<?php echo"{$info['username']}"; ?>">
        </div>
        <div>
            <label for="">Standard</label>
            <input type="number"name="standard"
            value="<?php echo"{$info['standard']}"; ?>">
        </div>
        <div>
            <label for="">Email</label>
            <input type="email"name="email"
            value="<?php echo"{$info['email']}"; ?>">
        </div>
        <div>
            <label for="">Phone</label>
            <input type="number"name="phone"
            value="<?php echo"{$info['phone']}"; ?>">
        </div>
        <div>
            <label for="">amtpaid</label>
            <input type="number"name="amtpaid"
            value="<?php echo"{$info['amtpaid']}"; ?>">
        </div>
        <div>
            <label for="">date</label>
            <input type="date"name="date"
            value="<?php echo"{$info['date']}"; ?>">
        </div>
        <div>
            <label for="">mode</label>
            <input type="text"name="mode"
            value="<?php echo"{$info['mode']}"; ?>">
        </div>
       
        <div>
            <input class="btn btn-success"type="submit"name="update"value="Update">
        </div>
    </form>
</div>
</center>
    </div>
</body>
</html>