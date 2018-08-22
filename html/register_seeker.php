<?php
// Include config file
require_once '../php/config.php';
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM user_seeker WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO user_seeker (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
              // Redirect to login page
              // header("location: login_seeker.php");
              echo("<script>location.href = 'login_seeker.php?';</script>");
            } 
            else
            {
              echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
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
        <li><a href="login_seeker.php">Login</a></li>
        <li><a href="login_poster.php">Employer Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<!--==============================Navigation Bar==============================-->

 
<!--==============================Content==============================-->
<div class="container">
    <div class="col-md-3"></div>
    <div class="col-md-6"> 
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a style="color:#2E2F31" href="login_seeker.php">Login here</a>.</p>
        </form>
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


