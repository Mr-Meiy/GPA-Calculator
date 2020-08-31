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

<!-- OPEN CHART -->
<br>
<center>
  <h2>Users Feedback</h2>
  <table>
  <tr>
    <td><div id="barchart_values"></div></td>
    <td><div id="piechart"></div> </td>
  </tr>
</table>
</center>

  
<script type="text/javascript" src="loader.js"></script>  
<?php
  $good=0;
  $average=0;
  $bad=0;

  $sql = mysqli_query($con, "SELECT Rating FROM feedback");
  $feed = Array();
  while($row = mysqli_fetch_array($sql))
  {
     $feed[] = $row['Rating'];
  }
  foreach($feed as $feed) 
  {
    if($feed=='Good') { $good++; }
    elseif ($feed=='Average') { $average++; }
    else { $bad++; }
  }
    echo "<script> 
          google.charts.load('current', {'packages':['corechart']}); 
          google.charts.setOnLoadCallback(drawChart); 
  
          function drawChart() 
          { 
              var data = google.visualization.arrayToDataTable([['Feedback', 'Count'], ['Good', $good], ['Average', $average], ['Bad',$bad],]); 
  
              var options = {'title':'Pie Representation',  'width':550,'height':400};
    
            var chart =  new google.visualization.PieChart(document.getElementById('piechart')); 
            chart.draw(data, options); 
        } 
      </script>"; 
      echo "<script>
            google.charts.load('current', {packages:['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() 
            {
                var data = google.visualization.arrayToDataTable([ ['Feedback', 'Rating', { role: 'style' } ], 
                    ['Good', $good, '#7ee35f'],
                    ['Average', $average, '#91c8ed'],
                    ['Bad', $bad, '#ff7a7a']
                ]);

              var view = new google.visualization.DataView(data);
              view.setColumns([0, 1,
                       { calc: 'stringify',
                         sourceColumn: 1,
                         type: 'string',
                         role: 'annotation' },
                       2]);

            var options = {title: 'Bar Representation',width: 600,height: 400,bar: {groupWidth: '95%'},legend: { position: 'none' }, };
            var chart = new google.visualization.BarChart(document.getElementById('barchart_values'));
            chart.draw(view, options);
          }
        </script>";
?>
<!-- CLOSE CHART -->
</div>


</body>
</html>