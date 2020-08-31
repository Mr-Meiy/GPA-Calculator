<?php
  include "./main/config.php";
?>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <title>GPA Calculator</title>
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

<!-- OPEN NAVIGATION BAR -->
<center>
  <ul>
    <li><a class="active" href="home.php" onclick="func()">Home</a></li>
    <li><a href="aboutus.php">About Us</a></li>
    <li><a href="user.php" onclick="func()">Student</a></li>
    <li><a href="login.php" onclick="func()">Admin</a></li>
    <li><a href="contact.php" onclick="func()">Reach Us</a></li>
    <li><a href="feedback.php" onclick="func()">Feedback</a></li>
  </ul>
</center>
<!-- CLOSE NAVIGATION BAR -->
<br><center><h1>CGPA CALCULATOR</h1>
<fieldset style="width: 80%; border: none; text-align: left; font-family: 'Comic Sans MS', cursive, sans-serif; font-size: 18px;">
  <p><b>Want to calculate your college course grades? </b><br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Our website makes easy to use college GPA calculator will help you calculate your GPA and stay on top of your study grades in just minutes! Whether you are taking degree courses online or are on a community college campus, no matter what degree course or specialized study you are aiming for – we’ve got you covered.</p>
</fieldset>
</center>

<br>

<!-- OPEN SLIDER -->
<center>
<fieldset style="width:80%; border: none;">
  <center>
  <div class="slideshow-container">
    <img src="./images/mei_logo.png" class="mySlides" style="background-color: #E2E2E2">
    <img src="./images/slide1.jpg" class="mySlides">
    <img src="./images/slide2.png" class="mySlides">
    <img src="./images/slide3.jpg" class="mySlides">
    <img src="./images/slide4.jpg" class="mySlides">
    <img src="./images/slide5.jpg" class="mySlides">
  </div>
<br>
  <div>
    <span class="dot"></span> 
    <span class="dot"></span> 
    <span class="dot"></span> 
    <span class="dot"></span> 
    <span class="dot"></span> 
    <span class="dot"></span> 
  </div>
</center>
</fieldset>
</center>

<script>
var slideIndex = 0;
showSlides();
function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>

<!-- CLOSE SLIDER -->

</body>
</html>
