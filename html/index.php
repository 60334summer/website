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



<body>

<!--==============================Jumbo==============================-->
<div class="jumbotron">

<!--==============================Navigation Bar==============================-->
<nav style="background: transparent; position: relative;    
    margin-top: -48px;" class="navbar navbar-inverse navbar-static-top">
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
        <li><a href="login_seeker.php">Login</a></li>
        <li><a href="login_poster.php">Employer Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<!--==============================Navigation Bar==============================-->
 
  <div class="container">
    <h1 style="color:black">Get Hired!</h1>
    <p><span style="color:white; background-color: #3b5998">A simple job search website.</span></p>
    <br>
    <p>
      <a style="color:#2E2F31" class="btn btn-primary btn-lg" href="register_seeker.php" role="button">Register as Job Seeker »</a> 
      <a style="color:#2E2F31" class="btn btn-primary btn-lg" href="register_poster.php" role="button">Register as Employer »</a>
    </p>
  </div>
</div>
<br>
<!--==============================Jumbo==============================-->


<!--==============================Content==============================-->
<div class="container">
  <div class="col-md-6">
  <p>
  <b><h3 style="color:#2E2F31">News</h3></b><br>
    <?php @readfile('http://output39.rssinclude.com/output?type=php&id=1188807&hash=2129387f854c900a82445a6b01fe2984')?>
  </p>
  </div>

  
  <div class="col-md-6">
  <h3 style="color:#2E2F31"><b>Latest Job Postings</b></h3>
  <?php
      //Query
        $query  = "SELECT * FROM jobs
                   ORDER BY postingdate DESC ;
                  ";

        $result   = $conn->query($query);
        if (!$result) die ("Database access failed: " . $conn->error);


        if(mysqli_num_rows($result) > 0){
        $rows = $result->num_rows;
  
        for ($j = 0 ; $j < 3 ; ++$j)
        {
          $result->data_seek($j);
          $row = $result->fetch_array(MYSQLI_NUM);
          $var = $row[0];
echo <<<_END
          <br>
          <pre style="background-color: white; font-family: Arial, Helvetica, sans-serif;">
            Job ID:                $row[0]
            Company:           $row[1]
            Title:                    $row[2]
            Location:             $row[3]
            Industry:              $row[4]
            Hours:                 $row[5]
            Salary:                $row[6]
            Posting Date:      $row[7]
            Closing Date:      $row[8]
          </pre>
_END;
        }


}

 else {
echo "<br>No Results Found."; 
}
        $result->close();
        $conn->close();
        function get_post($conn, $var)
        {
          return $conn->real_escape_string($_POST[$var]);
        }
        ?>
  </div>

</div>
<br><br><br><br><br><br>
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







 