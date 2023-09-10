
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
    width:170px;
    padding: 20px;
    font-size:20px;
    float: right;
}

.table_td
{
  width:170px;
    padding: 20px;
    background-color:skyblue;
    float: right;
}

</style>
</head>
<body>
<?php
    include'admin_sidebar.php';
    ?>
    <div class="container my-5">
      <br><br>
      <center>
        <form method="post">
            <input type="text" placeholder="Search data" name="search">
            <button class="btn btn-primary" name="submit">Search</button >
        </form>
        <div class="container my-5">
        <table class="table" >
        <br><br>
            <?php
          $host="localhost";
          $user="root";
          $password="";
          $db="brighthorizon";

          $data=mysqli_connect($host,$user,$password,$db);
          
            if(isset($_POST['submit']))

            // (user.id = feespaid.id and feesperyear.standard = user.standard)
            {
                $search=$_POST['search'];
                $sql="SELECT user.id,username,amtpaid,date,mode,totalfee - amtpaid AS remfee from (user,feespaid,feesperyear) WHERE (user.id = feespaid.id  and feesperyear.standard = user.standard ) and (user.id LIKE ? or user.username LIKE ?)";
                
                $stmt = mysqli_prepare($data, $sql);
                $like_param = "%$search%";
                mysqli_stmt_bind_param($stmt, "ss", $like_param, $like_param);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                // $result=mysqli_query($data , $sql);

                if($result)
                {
                  if(mysqli_num_rows($result) >0)
                  {
                     echo '<thead>
                     <tr> 
                     <th class="table_th">Balance Fees</th>
                     <th class="table_th">Mode</th>
                     <th class="table_th">Date</th>
                     <th class="table_th">Fees Paid</th>
                     <th class="table_th">User Name</th>
                     <th class="table_th">Student Id</th>
                     
                     </tr>
                     </thead>';

                     $row=mysqli_fetch_assoc($result);
                     echo '<tbody>
                     <tr>
                     <td class="table_td">'.$row['remfee'].'</td>
                     <td class="table_td">'.$row['mode'].'</td>
                     <td class="table_td">'.$row['date'].'</td>
                     <td class="table_td">'.$row['amtpaid'].'</td>
                     <td class="table_td">'.$row['username'].'</td>
                     <td class="table_td">'.$row['id'].'</td>
                    
                     </tr>
                     </tbody>';
                  }

                  else{
                    echo '<h2 class=:text-danger>Data not found</h2>';
                  }
                  
                }
            }
            ?>
            
        </table>
        </div>
        </center>
    </div>
</body>
</html>