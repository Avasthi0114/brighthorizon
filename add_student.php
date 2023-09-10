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

$name=$_GET['student_username'];

$sql2="select * from admission where name='$name'";

$result=mysqli_query($data,$sql2);
$info=$result->fetch_assoc();
while ($row = $result->fetch_assoc()) {
    echo $row['name']."<br>";
}
//echo($result);
if(isset($_POST['add_student']))
{
    $username=$_POST['name'];
    $standard=$_POST['standard'];
    $user_email =$_POST['email'];
    $user_phone =$_POST['phone'];
    $user_password=$_POST['password'];
    $user_type ="student";

    $check="SELECT * FROM login_check WHERE username ='$username'";

    $check_user=mysqli_query($data,$check);

    $row_count=mysqli_num_rows($check_user);
    
    if($row_count==1)
    {
        echo "<script type='text/javascript'>
    alert('Username Already Exits . Try Another One');
    </script>";
        
    }
else{

    $sql="INSERT INTO user(username,standard,email,phone,password) VALUES('$username','$standard',
    '$user_email','$user_phone','$user_password')";
    
    $sql1="INSERT INTO login_check(username,password,usertype) VALUES('$username',
   '$user_password','student')";

$result=mysqli_query($data,$sql);
$result1=mysqli_query($data,$sql1);


$m = "SELECT id FROM user WHERE username='$username'";
$r9 = mysqli_query($data, $m);
$row = mysqli_fetch_assoc($r9);
$id = $row['id'];
$q8 = "INSERT INTO feespaid(id) VALUES('$id')";
$r8 = mysqli_query($data, $q8);


$q = "DELETE FROM admission WHERE name='$username' ";
$r2 = mysqli_query($data, $q);

if($r2)
{
    echo "<script type='text/javascript'>
    alert('Data Uploaded Successfully');
    </script>";    
}
else{
    echo "Upload Failed";
}
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>

    <style type="text/css">
        label{
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg{
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
    <?php
    include 'admin_css.php'
    ?>
</head>
<body>
<?php
    include'admin_sidebar.php';
    ?>
    <div class="content">

    <center>
        <h1>Add Student</h1>
<div  class="div_deg">
    <form action="#" method="POST">
        <div>
            <label >Name</label>
            <input type="text" name="name" value="<?php echo"{$info['name']}"; ?>">
        </div>
        <div>
            <label >Standard</label>
            <input type="number" name="standard" value="<?php echo"{$info['standard']}"; ?>">
        </div>
        <div>
            <label >Email</label>
            <input type="email" name="email" value="<?php echo"{$info['email']}"; ?>">
        </div>
        <div>
            <label >Phone</label>
            <input type="number" name="phone" value="<?php echo"{$info['phone']}"; ?>">
        </div>
        <div>
            <label >Password</label>
            <input type="password" name="password" value="<?php echo"{$info['password']}"; ?>">
        </div>
        <div>
            <input type="submit" class="btn btn-primary"name="add_student" value="Add Student">
        </div>
    </form>
</div>
</center>
    </div>
</body>
</html>