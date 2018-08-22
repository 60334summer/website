<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login_poster.php");
  exit;
}
?>
<!--==============================Head==============================-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>JobSearch</title>

  <!--Fonts
  ===================================================-->
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css?family=Raleway:100" rel="stylesheet">

  <!--CDN Bootstrap
  ===================================================-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--===============================================-->

  <!--Custom CSS
  ===================================================-->
  <link href="../css/custom.css" rel="stylesheet">
  <link rel="stylesheet" href="src/htmlfromrss.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <!--===============================================-->

  <!--High Contrast Navigation Buttons
  ===================================================-->
  <script>
      $(document).ready(function(){
        $("#highcontrast").click(function(){
          $("body, .hc").addClass("highcontrast");
        });
      });
  </script>
  <style>
    .highcontrast {
      background-color: black ;
      color: white ;
    }
  </style>    
</head>
<!--==============================Head==============================-->
 

<!--==============================Navigation Bar==============================-->
<body>
<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a style="color: white; font-size: 35px;" class="navbar-brand" href="index.php">JobSearch.com</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Home</a></li>
        <li><a href="welcome_poster.php">My Account</a></li>
        <li><a href="search.php">Search Jobs</a></li>
        <li><a href="post.php">Post Jobs</a></li>
        <li><a href="logout.php">Sign Out</a></li>
      </ul>
    </div>
  </div>
</nav>
<!--==============================Navigation Bar==============================-->

 
<!--==============================Content==============================-->
<div class="container">
  <form action="../php/insert_job.php" method="post">
    <p>
    <div class="col-md-2">
    </div>
    <div class="col-md-4">
          <p>*Mandatory Areas</p><br> 

          <label for="company">Company*</label><br>  
          <input style="width:60%" type="text" name="company" id="company" required><br><br>  

          <label for="title">Email*</label><br>
          (For receiving resumes)<br>     
          <input style="width:60%" type="text" name="emailresume" id="emailresume" required><br><br>  

          <label for="title">Title*</label><br>     
          <input style="width:60%" type="text" name="title" id="title" required><br><br>  

          <label for="hours">Hours</label><br> 
          <select style="width:40%" name= 'hours' id="hours">
            <option selected value="base">Select Hours</option>
            <option value="Full-Time">Full-Time</option>
            <option value="Part-Time">Part-Time</option>
            <option value="Casual">Casual</option>
          </select><br><br>

          <label for="hours">Industry</label><br> 
          <select style="width:40%" name= 'industry' id="industry">
            <option selected value="base">Select Industry</option>
            <option value="Administrative">Administrative</option>
            <option value="Accounting / Finance">Accounting / Finance</option>
            <option value="Construction<">Construction</option>
            <option value="Customer Service">Customer Service</option>
            <option value="Information Technology">Information Technology</option>
            <option value="Legal">Legal</option>
            <option value="Retail">Retail</option>            
            <option value="Sales">Sales</option>    
            <option value="Skilled Trades">Skilled Trades</option>    
            <option value="Part-Time">Part-Time</option>
            <option value="Other">Other</option>
          </select><br><br>

          <label for="location">Location</label><br> 
          <select style="width:40%" name="location" id="location">
            <option selected value="base">Select Location</option>
            <option value="AB - Calgary">AB - Calgary</option>
            <option value="AB - Edmonton">AB - Edmonton</option>
            <option value="BC - Vancouver">BC - Vancouver</option>
            <option value="BC - Victoria">BC - Victoria</option>
            <option value="ON - London">ON - London</option>
            <option value="ON - Toronto">ON - Toronto</option>
            <option value="ON - Windsor">ON - Windsor</option>
          </select><br><br>        

          <label for="salary">Salary</label><br> 
          <input style="width:60%" type="text" name="salary" id="salary"><br><br>  

          <label for="closingdate">Closing Date</label><br> 
          <input style="width:60%" type="date" name="closingdate" id="closingdate"><br><br>
      </div> 
      <div class="col-md-4">
          <label for="description">Description</label><br>  
          <textarea name="description" id="description" name="Text1" cols="50" rows="25"></textarea> <br>

          <input style="text-align:right" type="submit" value="Submit" name='submitform'>
      </div>  
    </p>
  </form>      
</div>  
<br><br><br><br><br><br><br><br>
<!--==============================Content==============================-->

 
<!--==============================Footer==============================-->
<div class="footer">
  <div class="container">

    <div class="col-md-3">
      <a style="color: white; font-size: 20px;" class="navbar-brand" href="index.php">JobSearch.com</a>
    </div>

    <div class="col-md-3">   
    </div>  

    <div class="col-md-3" style="color: white; font-family: 'Raleway', sans-serif; font-size: 14px;"><br>
      <div style="color: white; border-bottom: 1px solid #cccccc;"><b>Navigation</b></div><br>
      <a href="index.php">Home</a><br>
      <a href="about.php">About</a><br>
      <a href="faq.php">FAQ</a><br><br>
      Accesbility:<br>
      <a id="highcontrast">High-Contrast View</a><br>
      <a href="javascript:window.location.href=window.location.href">Normal View</a>
    </div>  

    <div class="col-md-3" style="color: white; font-family: 'Raleway', sans-serif; font-size: 14px;"><br>
      <div style="color: white; border-bottom: 1px solid #cccccc;"><b>Get in Touch</b></div><br>
      <a href="https://www.facebook.com">Facebook</a><br>
      <a href="https://twitter.com">Twitter</a><br>
      <a href="https://www.linkedin.com">LinkedIn</a><br><br><br><br>
      123 Any Street.<br>Windsor, Ontario<br>N9B 3P4<br><br><br>
      email@example.com<br>519. 555. 1234<br><br><br><br><br><br><br>
    </div> 

  </div>
</div>

</body>
</html>
<!--==============================Footer==============================-->
 
 
 
 