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
    <br>
    <div style="border:1px solid #cccccc;" class="col-md-4">
      <h3>Search Criteria</h3>
      <p>
        <form action="search_seeker.php" method="post">

          <label for="hours">Hours</label><br> 
          <select style="width:40%" name= 'hours' id="hours">
            <option selected value="base">Any</option>
            <option value="Full-Time">Full-Time</option>
            <option value="Part-Time">Part-Time</option>
            <option value="Casual">Casual</option>
          </select><br><br>

          <label for="hours">Industry</label><br> 
          <select style="width:40%" name= 'industry' id="industry">
            <option selected value="base">Any</option>
            <option value="Administrative">Administrative</option>
            <option value="Accounting / Finance">Accounting / Finance</option>
            <option value="Construction<">Construction</option>
            <option value="Customer Service">Customer Service</option>
            <option value="Information Technology">Information Technology</option>
            <option value="Legal">Legal</option>
            <option value="Retail">Retail</option>            
            <option value="Sales">Sales</option>    
            <option value="Skilled Trades">Skilled Trades</option>    
            <option value="Other">Other</option>
          </select><br><br>

          <label for="location">Location</label><br> 
          <select style="width:40%" name="location" id="location">
            <option selected value="base">Any</option>
            <option value="AB - Calgary">AB - Calgary</option>
            <option value="AB - Edmonton">AB - Edmonton</option>
            <option value="BC - Vancouver">BC - Vancouver</option>
            <option value="BC - Victoria">BC - Victoria</option>
            <option value="ON - London">ON - London</option>
            <option value="ON - Toronto">ON - Toronto</option>
            <option value="ON - Windsor">ON - Windsor</option>
          </select><br><br>        

          <input style="text-align:right" type="submit" value="Search">

        </form>
      </p>
    </div>

    <div class="col-md-1"></div>
    <div style="border:1px solid #cccccc; height: 500px; overflow: auto;" class="col-md-7">
    <h3>Search Results</h3>
      <p>      
      <?php
        if (isset($_POST['hours'])       &&
            isset($_POST['industry'])    &&
            isset($_POST['location']))
        {
      //Variables
        $hours    = get_post($conn, 'hours');
        $industry    = get_post($conn, 'industry');
        $location    = get_post($conn, 'location');
 
      //Query

        if ($hours=="base"   &&   $industry!="base"   &&   $location!="base") 
        {
          $query  = "SELECT * FROM jobs
                     WHERE industry = '$industry'
                     AND   location = '$location'
                     ";
        }

        else if ($hours!="base"   &&   $industry=="base"   &&   $location!="base") 
        {
          $query  = "SELECT * FROM jobs
                     WHERE hours = '$hours'
                     AND   location = '$location'
                     ";
        }        

        else if ($hours!="base"   &&   $industry!="base"   &&   $location=="base") 
        {
          $query  = "SELECT * FROM jobs
                     WHERE hours = '$hours'
                     AND   industry = '$industry'
                     ";
        }       

        else if ($hours=="base"   &&   $industry=="base"   &&   $location!="base") 
        {
          $query  = "SELECT * FROM jobs
                     WHERE location = '$location'
                     ";
        }

        else if ($hours=="base"   &&   $industry!="base"   &&   $location=="base") 
        {
          $query  = "SELECT * FROM jobs
                     WHERE industry = '$industry'
                     ";
        }

        else if ($hours!="base"   &&   $industry=="base"   &&   $location=="base") 
        {
          $query  = "SELECT * FROM jobs
                     WHERE hours = '$hours'
                     ";
        }

        else if ($hours=="base"   &&   $industry=="base"   &&   $location=="base") 
        {
          echo "<br>Please select at least one search criteria.<br>";
          $query  = "SELECT * FROM jobs
                     WHERE id = 'null' 
                     ";
        }

        else
        {
          $query  = "SELECT * FROM jobs
                     WHERE hours = '$hours'   
                     AND   industry = '$industry'
                     AND   location = '$location'
                     ";
        }








        $result   = $conn->query($query);

        if (!$result) die ("Database access failed: " . $conn->error);


if(mysqli_num_rows($result) > 0){



        $rows = $result->num_rows;
  
        for ($j = 0 ; $j < $rows ; ++$j)
        {
          $result->data_seek($j);
          $row = $result->fetch_array(MYSQLI_NUM);
          $var = $row[0];
echo <<<_END
          <br>
          <pre style="background-color:white; border:0px solid white; border-bottom: 1px solid #cccccc;">
            Job ID:         $row[0]
            Company:        $row[1]
            Title:          $row[2]
            Location:       $row[3]
            Industry:       $row[4]
            Hours:          $row[5]
            Salary:         $row[6]
            Posting Date:   $row[7]
            Closing Date:   $row[8]
            <form action="search_result_seeker.php" method="post">
                            <input type='hidden' name='var' value='$var'/> 
            More Info>>>    <input style="text-align:right" type="submit" value="Click Here">
            </form>
          </pre>
_END;
        }


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
      </p>
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
 
 
 
 