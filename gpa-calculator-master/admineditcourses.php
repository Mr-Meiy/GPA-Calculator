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

<!-- OPEN CHOOSE SUBJECT -->
<br>
<center>
  <h2>EDIT COURSES</h2>
<form action="admineditcourses.php" method="post">
<table><td class='data'>
  <h2>View Courses</h2>
  <table>
  <tr>
  <td class='data'> <label>Department :</label> </td>
  <td class='data'>  <select name='dept' id='dept'>
            <option>Select Department</option>
            <option value='civ'>Civil Engineering</option>
            <option value='cse'>Computer Science and Engineering</option>
            <option value='ece'>Electronics and Communication Engineering</option>
            <option value='eee'>Electrical and Electronics Engineering</option>
            <option value='eie'>Electronics and Instrumentation Engineering</option>
            <option value='mech'>Mechanical Engineering</option>
            <option value='mct'>Mechatronics Engineering</option>
            <option value='bt'>Bio Technology</option>
            <option value='ft'>Food Technology</option>
            <option value='it'>Information Technology</option>
            <option value='nst'>Nano Science and Technology</option>
            <option value='txt'>Textile Technology</option>
        </select>
      <script type="text/javascript">
          document.getElementById('dept').value = "<?php echo $_POST['dept'];?>";
      </script>
  </td></tr>
  <tr>  
  <td class='data'> <label>Semester :</label> </td>
  <td class='data'>  <select name='sem' id='sem'>
            <option>Select Semester</option>
            <option value='s1'>Semester 1</option>
            <option value='s2'>Semester 2</option>
            <option value='s3'>Semester 3</option>
            <option value='s4'>Semester 4</option>
            <option value='s5'>Semester 5</option>
            <option value='s6'>Semester 6</option>
            <option value='s7'>Semester 7</option>
            <option value='s8'>Semester 8</option>
        </select>
      <script type="text/javascript">
          document.getElementById('sem').value = "<?php echo $_POST['sem'];?>";
      </script>
  </td> </tr>
</table>
<br>
<input type="submit" name="find" value="View Courses">

</td><td class='data'>

<h2>Add / Remove Courses</h2>
  <table>
  <tr><td class='data'><label style="width:150px; display: inline-block;">Course Name :</label> <input type='text' name='cname'></td></tr>
  <tr><td class='data'><label style="width:150px; display: inline-block;">Course Code :</label> <input type='text' name='ccode'></td></tr>
  <tr><td class='data'><label style="width:150px; display: inline-block;">Credit :</label> <input type='number' name='credit'></td></tr>
  </tr><tr>
    <td class='data' colspan="1"><input type='submit' name='addcourse' value='Add Course'><input type='submit' name='remcourse' value='Remove Course'></td>
  </td>
  </tr>
  </table>

</td></table>
</form>
</center>
<!-- CLOSE CHOOSE SUBJECT -->

<!-- OPEN EDIT SUBJECTS -->
<center>
<?php
    if(isset($_POST['find'])) 
    {
      echo "<table class='a' style='width:85%;'>";
      $dept=$_POST["dept"];
      $sem=$_POST["sem"];
      $sems=findsem($dept,$sem);
        
        $sql="SELECT * FROM $sems ORDER BY CREDIT desc";
        echo "<tr><th class='head'>Subject</th><th class='head'>Course Code</th><th class='head'>Credit</th></tr>";
        if($result=$con->query($sql))
        {
           if($result->num_rows)
            while($row=$result->fetch_object())
            {
                $cname=$row->CNAME;
                $ccode=$row->CCODE;
                $credit=$row->CREDIT;

                echo "<tr>
                      <td class='data'><b>{$cname}<b></td>
                      <td class='data' id='cd'>{$ccode}</td>
                      <td class='data' id='cr'>{$credit}</td>
                    </tr>";
            }
          }
          else 
          {
              echo "<tr><td class='data'>$sems No Database selected</td></tr>";
          }
        echo "</table><br>
            <hr style='height: 1px; background-color:#dddddd;'>";
    }
    else if(isset($_POST['addcourse'])) 
    {
      echo "<table class='a'>";
      $dept=$_POST["dept"];
      $sem=$_POST["sem"];
      $sems=findsem($dept,$sem);
      $cname=$_POST["cname"];
      $ccode=$_POST["ccode"];
      $credit=$_POST["credit"];
        
        if($cname!="" && $ccode!="" && $credit!="")
         {
              $sql="INSERT INTO $sems (CNAME,CCODE,CREDIT) VALUES ('$cname','$ccode','$credit')";
              if($con->query($sql))
              {

                  $sql1="SELECT * FROM $sems ORDER BY CREDIT desc";
                    if($result=$con->query($sql1))
                     {
                      echo "<table class='a' style='width:85%;'>";
                      echo "<tr><th class='head'>Subject</th><th class='head'>Course Code</th><th class='head'>Credit</th></tr>";
                       if($result->num_rows)
                       while($row=$result->fetch_object())
                        {
                            $cname=$row->CNAME;
                            $ccode=$row->CCODE;
                            $credit=$row->CREDIT;
                            echo "<tr>
                                  <td class='data'><b>{$cname}<b></td>
                                  <td class='data'>{$ccode}</td>
                                  <td class='data'>{$credit}</td>
                                </tr>";
                        }
                        echo "</table><br>
                              <hr style='height: 1px; background-color:#dddddd;'>";
                      }
                  echo "<script> 
                         alert('Course Added Successfully');
                      </script>";

              }
        }
        else
         {
            echo "<script> alert('Please enter all the data');</script>";
         }
    }
    else if(isset($_POST['remcourse'])) 
    {
      $dept=$_POST["dept"];
      $sem=$_POST["sem"];
      $sems=findsem($dept,$sem);
      $cname=$_POST["cname"];
      $ccode=$_POST["ccode"];
      $credit=$_POST["credit"];
    
        if($cname!="" && $ccode!="" && $credit!="")
         {
              $sql="DELETE FROM $sems where CNAME='$cname' and CCODE='$ccode'";
              if($con->query($sql))
              {
                  $sql1="SELECT * FROM $sems ORDER BY CREDIT desc";
                    if($result=$con->query($sql1))
                     {
                      echo "<table class='a'>";
                      echo "<tr><th class='head'>Subject</th><th class='head'>Course Code</th><th class='head'>Credit</th></tr>";
                       if($result->num_rows)
                       while($row=$result->fetch_object())
                        {
                            $cname=$row->CNAME;
                            $ccode=$row->CCODE;
                            $credit=$row->CREDIT;
                            echo "<tr>
                                  <td class='data'><b>{$cname}<b></td>
                                  <td class='data'>{$ccode}</td>
                                  <td class='data'>{$credit}</td>
                                </tr>";
                        }
                        echo "</table><br>
                              <hr style='height: 1px; background-color:#dddddd;'>";
                      }
                  echo "<script> 
                         alert('Course Removed Successfully');
                      </script>";
              }
          }
        else
         {
            echo "<script> alert('Please enter all the data');</script>";
         }
    }

?>
</center>
</div>
<!-- CLOSE EDIT SUBJECTS -->

<!--OPEN FIND SEM -->
<?php 
    function findsem($dept,$sem)
    {
      if($dept=='civ')
        {
          if($sem=='s1') $sems='civ1';
          else if($sem=='s2') $sems='civ2';
          else if($sem=='s3') $sems='civ3';
          else if($sem=='s4') $sems='civ4';
          else if($sem=='s5') $sems='civ5';
          else if($sem=='s6') $sems='civ6';
          else if($sem=='s7') $sems='civ7';
          else if($sem=='s8') $sems='civ8';
        }
        else if($dept=='cse')
        {
          if($sem=='s1') $sems='cse1';
          else if($sem=='s2') $sems='cse2';
          else if($sem=='s3') $sems='cse3';
          else if($sem=='s4') $sems='cse4';
          else if($sem=='s5') $sems='cse5';
          else if($sem=='s6') $sems='cse6';
          else if($sem=='s7') $sems='cse7';
          else if($sem=='s8') $sems='cse8';
        }
        else if($dept=='eee')
        {
          if($sem=='s1') $sems='eee1';
          else if($sem=='s2') $sems='eee2';
          else if($sem=='s3') $sems='eee3';
          else if($sem=='s4') $sems='eee4';
          else if($sem=='s5') $sems='eee5';
          else if($sem=='s6') $sems='eee6';
          else if($sem=='s7') $sems='eee7';
          else if($sem=='s8') $sems='eee8';
        }
        else if($dept=='ece')
        {
          if($sem=='s1') $sems='ece1';
          else if($sem=='s2') $sems='ece2';
          else if($sem=='s3') $sems='ece3';
          else if($sem=='s4') $sems='ece4';
          else if($sem=='s5') $sems='ece5';
          else if($sem=='s6') $sems='ece6';
          else if($sem=='s7') $sems='ece7';
          else if($sem=='s8') $sems='ece8';
        }
        else if($dept=='eie')
        {
          if($sem=='s1') $sems='eie1';
          else if($sem=='s2') $sems='eie2';
          else if($sem=='s3') $sems='eie3';
          else if($sem=='s4') $sems='eie4';
          else if($sem=='s5') $sems='eie5';
          else if($sem=='s6') $sems='eie6';
          else if($sem=='s7') $sems='eie7';
          else if($sem=='s8') $sems='eie8';
        }
        else if($dept=='mech')
        {
          if($sem=='s1') $sems='mech1';
          else if($sem=='s2') $sems='mech2';
          else if($sem=='s3') $sems='mech3';
          else if($sem=='s4') $sems='mech4';
          else if($sem=='s5') $sems='mech5';
          else if($sem=='s6') $sems='mech6';
          else if($sem=='s7') $sems='mech7';
          else if($sem=='s8') $sems='mech8';
        }
        else if($dept=='mct')
        {
          if($sem=='s1') $sems='mct1';
          else if($sem=='s2') $sems='mct2';
          else if($sem=='s3') $sems='mct3';
          else if($sem=='s4') $sems='mct4';
          else if($sem=='s5') $sems='mct5';
          else if($sem=='s6') $sems='mct6';
          else if($sem=='s7') $sems='mct7';
          else if($sem=='s8') $sems='mct8';
        }
        else if($dept=='bt')
        {
          if($sem=='s1') $sems='bt1';
          else if($sem=='s2') $sems='bt2';
          else if($sem=='s3') $sems='bt3';
          else if($sem=='s4') $sems='bt4';
          else if($sem=='s5') $sems='bt5';
          else if($sem=='s6') $sems='bt6';
          else if($sem=='s7') $sems='bt7';
          else if($sem=='s8') $sems='bt8';
        }
        else if($dept=='ft')
        {
          if($sem=='s1') $sems='ft1';
          else if($sem=='s2') $sems='ft2';
          else if($sem=='s3') $sems='ft3';
          else if($sem=='s4') $sems='ft4';
          else if($sem=='s5') $sems='ft5';
          else if($sem=='s6') $sems='ft6';
          else if($sem=='s7') $sems='ft7';
          else if($sem=='s8') $sems='ft8';
        }
        else if($dept=='it')
        {
          if($sem=='s1') $sems='it1';
          else if($sem=='s2') $sems='it2';
          else if($sem=='s3') $sems='it3';
          else if($sem=='s4') $sems='it4';
          else if($sem=='s5') $sems='it5';
          else if($sem=='s6') $sems='it6';
          else if($sem=='s7') $sems='it7';
          else if($sem=='s8') $sems='it8';
        }
        else if($dept=='nst')
        {
          if($sem=='s1') $sems='nst1';
          else if($sem=='s2') $sems='nst2';
          else if($sem=='s3') $sems='nst3';
          else if($sem=='s4') $sems='nst4';
          else if($sem=='s5') $sems='nst5';
          else if($sem=='s6') $sems='nst6';
          else if($sem=='s7') $sems='nst7';
          else if($sem=='s8') $sems='nst8';
        }
        else if($dept=='txt')
        {
          if($sem=='s1') $sems='txt1';
          else if($sem=='s2') $sems='txt2';
          else if($sem=='s3') $sems='txt3';
          else if($sem=='s4') $sems='txt4';
          else if($sem=='s5') $sems='txt5';
          else if($sem=='s6') $sems='txt6';
          else if($sem=='s7') $sems='txt7';
          else if($sem=='s8') $sems='txt8';
        }
        else $sems='';
        return ($sems);
    }
?>
<!-- CLOSE FIND SEM -->

</body>
</html>
