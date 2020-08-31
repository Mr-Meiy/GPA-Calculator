<?php
  include "./main/config.php";
?>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <title>GPA Calculator</title>
  <link rel="stylesheet" type="text/css" href="styleh.css">
  <link rel="stylesheet" type="text/css" href="./main/style1.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
  <style type="text/css">
    .users{
      padding: 15px;
      background-color: #ccc8be;
      border-radius: 10px;
      text-decoration: none;
    }
  </style>
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
    <li><a class="active" href="user.php">Student</a></li>
    <li><a href="login.php">Admin</a></li>
    <li><a href="contact.php">Reach Us</a></li>
    <li><a href="feedback.php">Feedback</a></li>
  </ul>
</center>
<!-- CLOSE NAVIGATION BAR -->

<!-- OPEN CONTENTS -->
<center><h1>GPA Calculator</h1>
<br>
<a class="users" href="ctuser.php"><b>KSRCT User</b></a>
<br><br><br><br>
<a class="users" href="genuser.php"><b>Not a KSRCT User</b></a>

<!-- CLOSE CONTENTS -->

</body>
</html>
