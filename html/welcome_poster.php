<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login_poster.php");
  exit;
}
?>
<!--==============================PHP==============================-->
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
    <div class="col-md-3"></div>
    <div class="col-md-6">

    <div class="page-header">
        <h1>Hello, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b>.<br> What would you like to do?</h1>
    </div>
    <p><a href="post.php" class="btn btn-danger">Post a Job</a></p>
    <p><a href="search.php" class="btn btn-danger">Search Postings</a></p>
    <p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
    
    </div>    
</div>  
<br><br><br><br><br><br><br><br><br><br><br><br>
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
 
 
 
 