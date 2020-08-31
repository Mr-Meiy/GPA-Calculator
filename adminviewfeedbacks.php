<?php
  include "./main/config.php";
?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <title>GPA Calculator</title>
  <link rel="stylesheet" href="w3.css">
  <link rel="stylesheet" type="text/css" href="styleh.css">
  <link rel="stylesheet" type="text/css" href="./main/style1.css">
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

<!-- OPEN SIDEBAR-->
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" id="mySidebar">
  <button id="close" class="w3-bar-item w3-button w3-large" onclick="w3_close()">Exit &times;</button>
  <a id="a" href="adminhome.php" class="w3-bar-item w3-button">Home</a>
  <a id="a" href="adminviewcourses.php" class="w3-bar-item w3-button">View Courses</a>
  <a id="a" href="admineditcourses.php" class="w3-bar-item w3-button">Add/Remove Courses</a>
  <a id="a" href="adminviewfeedbacks.php" class="w3-bar-item w3-button">View Feedbacks</a>
  <a id="a" href="chart.php" class="w3-bar-item w3-button">Feedback Chart</a>
  <a id="a" href="adminlogout.php" class="w3-bar-item w3-button">Logout</a>
</div>

 <script src="sidebar.js"></script> 
<!-- CLOSE SIDEBAR -->

<!-- OPEN NAVBAR -->
<div id="main">

<div class="w3-teal">
    <ul>
    <li><button id="openNav" class="w3-button w3-teal w3-large" onclick="w3_open()" style="height: 52px;">&#9776;</button></li>
    <li><a href="home.php">Home</a></li>
    <li><a href="aboutus.php">About Us</a></li>
    <li><a href="user.php">Student</a></li>
    <li><a class="active" href="adminviewcourses.php">Admin</a></li>
    <li><a href="contact.php">Reach Us</a></li>
    <li><a href="feedback.php">Feedback</a></li>
  </ul>
</div>
<!-- CLOSE NAVBAR -->

<!-- OPEN VIEW FEEDBACKS -->
<br>
<center>
  <h2>VIEW FEEDBACKS</h2>
<?php
      echo "<table class='a' style='width:85%;'>";
       $sql="SELECT * FROM feedback ORDER BY ID";
        echo "<tr><th class='head'>S.No</th><th class='head'>Name</th><th class='head'>e-mail</th><th class='head'>Rating</th><th class='head'>Feedback</th></tr>";
        if($result=$con->query($sql))
        {
           if($result->num_rows)
            while($row=$result->fetch_object())
            {
                $id=$row->ID;
                $name=$row->Name;
                $email=$row->Email;
                $rat=$row->Rating;
                $exp=$row->Experience;

                echo "<tr>
                      <td class='data'>{$id}</td>
                      <td class='data'><b>{$name}<b></td>
                      <td class='data'>{$email}</td>
                      <td class='data'>{$rat}</td>
                      <td class='data'>{$exp}</td>
                    </tr>";
            }
          }
          else 
          {
              echo "<tr><td class='data'>$sems No Database selected</td></tr>";
          }
        echo "</table>";
    
?>
</div>
<!-- CLOSE VIEW FEEDBACKS -->

</body>
</html>
