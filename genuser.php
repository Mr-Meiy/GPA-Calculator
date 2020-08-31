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
<div id="wrapper">
<table id="data_table" style="width: 80%">
<tr>
<th class='head'>Subject</th>
<th class='head'>Credit</th>
<th class='head'>Grade</th>
<th class='head'>Action</th>
</tr>

<tr>
<td class='data'><input type="text" id="subject" placeholder="Subject"></td>
<td class='data'><input type="number" id="credit" placeholder="Credits"></td>
<td class='data'><select id="grade"> 
      <option value='10'>O</option>
      <option value='9'>A+</option>
      <option value='8'>A</option>
      <option value='7'>B+</option>
      <option value='6'>B</option>
      <option value='5'>C</option>
      <option value='0'>F</option>
</select></td>
<td class='data'><input type="submit" class="add" onclick="add_row();" value="Add Subject"></td>
</tr>
</table>

<h2 id='gpa'>GPA</h2>
</div>
</center>
<p>
    <b>Note :</b><br>
    1. &nbsp;Subject can be empty.<br>
    2. &nbsp;Credit should be filled.
</p>
<!-- CLOSE CONTENTS -->
<script type="text/javascript" src="gpacalc.js"></script>
</body>
</html>
