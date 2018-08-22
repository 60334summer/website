<?php
  $user = 'id6781553_user';
  $pass = '123456';
  $db = 'id6781553_project';
  // Create connection
  $conn = new mysqli('localhost', $user, $pass, $db) or die("Err");
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
        <li><a href="welcome_seeker.php">My Account</a></li>
        <li><a href="search_seeker.php">Search Jobs</a></li>
        <li><a href="logout.php">Sign Out</a></li>
      </ul>
    </div>
  </div>
</nav>
<!--==============================Navigation Bar==============================-->

 
<!--==============================Content==============================-->
<div class="container">
    <div class="col-md-2"> </div>
    <div class="col-md-8">
      <p>     
      <br>
      <pre style="background-color: white;  font-family: Arial, Helvetica, sans-serif;    white-space: pre-wrap; word-break: keep-all;">
      <?php
        if (isset($_POST['var']))
        {
      //Variables
        $id    = get_post($conn, 'var');

      //Query
        $query  = "SELECT * FROM jobs
                   WHERE id = '$id'  
            ";
        $result   = $conn->query($query);

        if (!$result) die ("Database access failed: " . $conn->error);


        if(mysqli_num_rows($result) > 0)
        {
          $result->data_seek(0);
          $row = $result->fetch_array(MYSQLI_NUM);
          $var = $row[10];

echo <<<_END
<b>
Company:</b>
$row[1]

<b>Title:</b>
$row[2]

<b>Location:</b>
$row[3]

<b>Industry:</b>     
$row[4]

<b>Hours:</b>          
$row[5]

<b>Salary:</b>         
$row[6]

<b>Posting Date:</b>   
$row[7]

<b>Closing Date:</b>   
$row[8]

<b>Description:</b>    
$row[9]



<form action="../mail/handler.php" method="post" id="reused_form" enctype="multipart/form-data">
<b>Apply:</b> 
<input name="name" type="text" required placeholder="Name" id="name" /><br>
<input name="email" type="email" required id="email" placeholder="Email" /><br>
<textarea name="message" id="comment" cols="55" rows="8"placeholder="Message"></textarea><br>
Upload Resume:
<input name="image" type="file" id="file"><br>
<input type='hidden' name='var' value='$var'/> 
<button type="submit">SUBMIT</button>
</form>
_END;
}
 else {
echo "<br>No Results Found."; 
}
        $result->close();
        }
        $conn->close();
        function get_post($conn, $var)
        {
          return $conn->real_escape_string($_POST[$var]);
        }
?>
</pre> </p> 
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
 
 
 