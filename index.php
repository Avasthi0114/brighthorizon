<?php
error_reporting(0);
session_start();
session_destroy();

if($_SESSION['message'])
{
    $message=$_SESSION['message'];

    echo"<script type='text/javascript'>
    alert('$message');
    </script>";  
}

$host="localhost";
$user="root";
$password="";
$db="brighthorizon";

$data=mysqli_connect($host,$user,$password,$db);
$sql="select * from teacher";

$result=mysqli_query($data,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bright Horizon</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">

</head>
<body>

<!-- <html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" href="SENCOR_Logo.ico">
<title>SENCOR</title>
</head>
<body>
<div class="bg-div">
    <img class="logo-img" src="SENCOR_Logo.jpg" width="130" height="130" ALT="align box" ALIGN=CENTER>
    <nav>
        <ul>
            <li><a href="#">Monitoring</a></li>
            <li><a href="#">Process</a></li>
            <li><a href="#">Post and Create Email/Excel</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Tools</a></li>
            <li><a href="#">Sales</a></li>
        </ul>
    </nav>
</div>
</body>
</html> -->


   <nav>
   
    <!-- <label class="logo">Bright Horizon</label> -->
    
    <img class="logo-img" src="LOGO1.jpg" width="70" height="70" ALT="align box" ALIGN=CENTER>
    <label><h3 class="logo">Bright Horizon</h3></label>
    <ul>
  
      
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#teachers">Teachers</a></li>
        <li><a href="#courses">Courses</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#admission">Admission</a></li>
        <li><a href="login.php"class="btn btn-success">Login</a></li>
    </ul>
   </nav>
   
  
   <div class="section1">
   
    <label class="img_text">Build Your Dreams With Us</label>
    <img class="main_img" src="home1.jpg" alt="">
   </div>

   <div class="container">
    <div class="row">
     <div class="col-md-4">
        <img class="welcome_img" src="book1.jpg" alt="">
       </div>
       
         <div class="col-md-8">
            <h1 id="about">Welcome to Bright Horizon</h1>
            <br><br>
          <p>
          Bright Horizon is a well known, coaching institute running successfully since last 25 years.
    It is is a finest coaching institute which broaden students' academic and personal horizons.
    We believe in providing all deserving students the best curriculum and pedagogy along with
    the highest quality of education in coaching the students for 5th to 10th standards. Students	
    prefer this institute as it is the combination of unique features of the programme,
     dedicationof our faculty, child centric approach from the management, understanding the needs of the
      students and last but not the least consistent results throughout the years.

            </p>
         </div>
      </div>
    </div>
    <br><br>

    
<center>
    <h1 id="teachers">Our Teachers</h1>

<div class="container">
    <div class="row">
   <?php 
    while($info=$result->fetch_assoc())
    {
    ?>
        <div class="col-md-4">
        <img height=250px width=250px class="teacher"src="<?php echo "{$info['image']}"?>">
        <h3><?php echo "{$info['name']}"?></h3>
        <h5><?php echo "{$info['description']}"?></h5>
        </div>
<?php
}
?>
    </div>
</div>
</center>
<br><br>



<center>
    <h1 id="courses">Our Courses</h1>

<div class="container">
    <div class="row">
     <div class="col-md-4">
<img class="Sub"src="Maths.png" >
<h2>Mathematics</h2>
    
        </div>
        <div class="col-md-4">
        <img class="Sub"src="science2.jpg" alt="">
        <h2>Science</h2>
        </div>

        <div class="col-md-4">
        <img class="Sub"src="English.jpg" alt="">
        <h2>English</h2>
        </div>
    </div>
</div>
</center>
<br><br>


<div class="contact-section">
    <h1 id="contact">Contact Us</h1>

    <div class="contact-info">
        <div class="box">
            <div class="icon"><span class="glyphicon glyphicon-home"></span></div>
            <div class="text">
                <h3>Address</h3>
                <p>Malshiras, Solapur, 413107</p>
            </div>
        </div>
        <div class="box">
            <div class="icon"><span class="glyphicon glyphicon-earphone"></span></div>
            <div class="text">
                <h3>Phone</h3>
                <p>9890964571</p>
                <p>9860028754</p>
            </div>
        </div>
        <div class="box">
            <div class="icon"><span class="glyphicon glyphicon-envelope"></span></div>
            <div class="text">
                <h3>Email</h3>
                <p>brighthorizon@gmail.com</p>
            </div>
        </div>
    </div>
</div>

<style>
.contact-section {
  text-align: center;
  background-color: #f7f7f7;
  padding: 50px;
}

.contact-info {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  margin-top: 50px;
}

.box {
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
  margin: 20px;
  padding: 30px;
  max-width: 350px;
  width: 100%;
  text-align: center;
}

.box .icon {
  font-size: 48px;
  color: #33c9ff;
}

.box h3 {
  font-weight: 600;
  color: #1a1a1a;
  margin: 20px 0px;
}

.box p {
  font-size: 16px;
  color: #777;
  line-height: 24px;
  margin-bottom: 30px;
}
p {
  font-size: 16px;
}

.logo{
  margin: 0 5px;
  display:Inline-block;
    padding: 0px 40px 0px 0px; 
   font-size: 30px;
   left: 5%;
   color: navy; 
   font-weight: bold;
}
.abc{
  padding: 30px;
  /* margin-top: 50px; */
  color: white; 
   font-weight: bold;
}

</style>


<br><br>


<center>
<h1 id="admission" class="adm">Admission Form</h1>
<div class="admission_form">
  <form action="data_check.php" method="POST">
    <div class="adm_int">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" class="input_deg" required>
    </div>

    <div class="adm_int">
      <label for="standard">Standard:</label>
      <input type="text" name="standard" id="standard"  class="input_deg" required>
    </div>

    <div class="adm_int">
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" class="input_deg" required>
    </div>

    <div class="adm_int">
      <label for="phone">Phone:</label>
      <input type="tel" name="phone" id="phone" pattern="[0-9]{10}" class="input_deg" required>
    </div>

    <div class="adm_int">
      <label for="address">Address:</label>
      <textarea name="address" id="address" class="ip_txt" required></textarea>
    </div>

    <div class="adm_int">
      <label for="password">Set Password:</label>
      <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least 8 or more characters and at least one number, one uppercase and lowercase letter" class="input_deg" autocomplete="off" required>
    </div>

    <div class="adm_int">
      <input type="submit" value="Apply" name="apply" class="btn btn-primary">
    </div>
  </form>
</div>
</center>


<footer>
    <h4 class="abc">All &#169; reserved by Bright Horizon</h4>
</footer>

</body>
</html>