<?php
include "./main/config.php";

	if(count($_POST)>0)
    {
    	$result = mysqli_query($con,"SELECT * FROM admins WHERE uname='" . $_POST["uname"] . "' and pass = '". $_POST["pass"]."'");
    	$count = mysqli_num_rows($result);
		if($count==0) {
			echo " <script> alert('Invalid Username or Password!');</script>";
			echo '<script>window.location="login.php"</script>';
		} 
		else {
			echo '<script>window.location="adminhome.php"</script>';
		}
    }
?>


