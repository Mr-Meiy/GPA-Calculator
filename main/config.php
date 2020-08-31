<?php
  //error_reporting(0);
    $con=new mysqli('localhost','root','','CGPA');

    if($con->connect_errno)
    {
      echo $con->connect_errno;
      die();
    }
 /*
    else
    {
      echo "Database connected";
    }
    */
?>