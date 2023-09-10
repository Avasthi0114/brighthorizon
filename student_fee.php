<?php
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
$sql="SELECT amtpaid,totalfee - amtpaid AS remfee from feespaid,user,feesperyear WHERE (user.id = feespaid.id and feesperyear.standard = user.standard) and username='$name'";
               
$result=mysqli_query($data , $sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee Submission</title>
    <?php
    include 'admin_css.php'

    ?>
    <style type="text/css">

.table_th
{
    width:250px;
    padding: 20px;
    font-size:20px;
}

.table_td
{
  width:250px;
    padding: 20px;
    background-color:skyblue;
}

</style>

</head>
<body>
<?php
    include'student_sidebar.php';
    ?>

<center>
  <br>
  <br><br><br><br><br>
<table border="1px">

<tr>
    <th class="table_th">Fees paid</th>
    <th class="table_th">Remaining fees</th>
</tr>
<?php
  while($info=$result->fetch_assoc())
  {         
 ?>
<tr>
    <td class="table_td">
    <?php
      echo"{$info['amtpaid']}";
     ?>
    </td>
    <td class="table_td">
       <?php
        echo"{$info['remfee']}";
        ?>
      
</tr>
<?php
  }
?>
</table>
</center>
</body>
</html>