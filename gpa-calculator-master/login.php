<?php
    include "./main/config.php";
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Login Form</title>
  <link rel="stylesheet" type="text/css" href="styleh.css">
  <link rel="stylesheet" type="text/css" href="stylel.css">
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
    <li><a class="active" href="login.php">Admin</a></li>
    <li><a href="contact.php">Reach Us</a></li>
    <li><a href="feedback.php">Feedback</a></li>
  </ul>
</center>
<!-- CLOSE NAVIGATION BAR -->

<!--  OPEN LOGIN FORM -->
<center>
<h1>Admin Login</h1>
    <form method="post" action="validate_login.php" >
        <table>
            <tr>
                <td id="d" colspan="2"><input type="text" name="uname" id="uname" placeholder="User Name"></td>
            </tr>
            <tr>
                <td id="d" colspan="2"><input name="pass" type="password" id="pass" placeholder="Password"></input></td>
            </tr>
            <tr>
                <td id="s"><input type="submit" value="Submit"></td>
                <td id="r"><input type="reset" value="Reset"></td>
            </tr>
        </table>
    </form>
</center>
<!--  CLOSE LOGIN FORM -->
</body>
</html>