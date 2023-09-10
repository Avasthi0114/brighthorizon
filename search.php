<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Search data</title>
    <?php
    include 'admin_css.php'
    ?>


</head>
<body>
<style type="text/css">

.table_th
{
    width:200px;
    padding: 20px;
    font-size:20px;
    float:right;
}

.table_td
{
    width:200px;
    padding: 20px;
    background-color:skyblue;
    float: right;
}

</style>
    <?php
    include'admin_sidebar.php';
    ?>
    <div class="container my-5">
      <center>
        <form method="post">
            <input type="text" placeholder="Search" name="search">
            <button class="btn btn-primary" name="submit">Search</button >
        </form>
        <div class="container my-5">
        <table class="table">
        <!-- border="1px" width:50px; -->
            <?php
          $host="localhost";
          $user="root";
          $password="";
          $db="brighthorizon";

          $data=mysqli_connect($host,$user,$password,$db);

          // Use prepared statement to prevent SQL injection
if(isset($_POST['submit']))
{
    $search = $_POST['search'];
    $sql = "SELECT * FROM user WHERE id LIKE ? OR username LIKE ?";
    $stmt = mysqli_prepare($data, $sql);
    $like_param = "%$search%";
    mysqli_stmt_bind_param($stmt, "ss", $like_param, $like_param);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) > 0)
    {
        echo '<thead>
        <tr> 
        <th class="table_th">Phone</th>
        <th class="table_th">Email</th>
        <th class="table_th">Standard</th>
        <th class="table_th">User Name</th>
        <th class="table_th">Student Id</th>
    
        </tr>
        </thead>';

        while($row = mysqli_fetch_assoc($result))
        { 
            echo '<tbody>
            <tr>
            <td class="table_td">'.$row['phone'].'</td>
            <td class="table_td">'.$row['email'].'</td>
            <td class="table_td">'.$row['standard'].'</td>
            <td class="table_td">'.$row['username'].'</td>
            <td class="table_td">'.$row['id'].'</td>
            
            </tr>
            </tbody>';
        }
    }
    else
    {
        echo '<h2 style="color: red;">Data not found</h2>';
    }
}
            ?>
        </table>
        </div>
        </center>
    </div>
   
</body>
</html>