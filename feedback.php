<?php
  include "./main/config.php";
?>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <title>GPA Calculator</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="styleh.css">
  <link rel="stylesheet" type="text/css" href="stylefb.css">
</head>
<body>

<!-- OPEN HEADER -->
<center>
  <div class="header" style="white-space: nowrap">
    <img src="./images/mei_logo.png" width="120" height="50">
    <b><u>Mk Creations</u></b>
  </div>
</center>
<!-- CLOSE HEADER -->

<!-- OPEN NAVIGATION BAR -->
<center>
  <ul>
    <li><a href="home.php">Home</a></li>
    <li><a href="aboutus.php">About Us</a></li>
    <li><a href="user.php">Student</a></li>
    <li><a href="login.php">Admin</a></li>
    <li><a href="contact.php">Reach Us</a></li>
    <li><a class="active" href="feedback.php">Feedback</a></li>
  </ul>
</center>
<!-- CLOSE NAVIGATION BAR -->

<!-- FEEDBACK DETAILS -->
<center><h3>Leave a reply</h3></center>
<div class="container">
  <form action="feedback.php" method="post">
    <label>Your Name </label> <br>
      <input type="text" name="name" id="name" placeholder="Your name.."><br>
    <label>E-mail Id </label> <br>
     <input type="email" name="email" id="email" placeholder="Your email.."><br>
    <label>Rate Your Experience : </label>
    <table>
      <input type="radio" id="rat" name="rat" value="Good"> Good
      <input type="radio" id="rat" name="rat" value="Average"> Average
      <input type="radio" id="rat" name="rat" value="Bad"> Bad<br><br>
    <label>Share Your Experience </label><br>
      <textarea id="exp" name="exp" placeholder="Share Your Experience.." style="height:100px"></textarea><br>

    <center><input type="submit" name="submit" value="Submit" ></center>
  </form>
</div>
<!-- FEEDBACK DETAILS -->
<?php 
    if(isset($_POST['submit']))
    {
        $name=$_POST["name"];
        $email=$_POST["email"];
        $rat=$_POST["rat"];
        $exp=$_POST["exp"];
        $fsql="INSERT INTO `feedback` (`Name`, `Email`, `Rating`, `Experience`) VALUES ('$name', '$email', '$rat', '$exp');";
        if($con->query($fsql))
        {
            echo "<script> alert('Feedback Saved Successfully'); </script>";
        }
        else
        {
            echo "<script> alert('Failed to save Feedback'); </script>";
        }
    }
?>
</body>
</html>