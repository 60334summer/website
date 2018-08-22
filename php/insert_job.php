<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
  $user = 'id6781553_user';
  $pass = '123456';
  $db = 'id6781553_project';
$link = mysqli_connect('localhost', $user, $pass, $db) or die("Err");
 

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

// Escape user inputs for security
$company = mysqli_real_escape_string($link, $_REQUEST['company']);
$emailresume = mysqli_real_escape_string($link, $_REQUEST['emailresume']);
$title = mysqli_real_escape_string($link, $_REQUEST['title']);
$location = mysqli_real_escape_string($link, $_REQUEST['location']);
$industry = mysqli_real_escape_string($link, $_REQUEST['industry']);
$hours = mysqli_real_escape_string($link, $_REQUEST['hours']);
$description = mysqli_real_escape_string($link, $_REQUEST['description']);
$salary = mysqli_real_escape_string($link, $_REQUEST['salary']);
$closingdate = mysqli_real_escape_string($link, $_REQUEST['closingdate']);
 

// attempt insert query execution
$sql = "INSERT INTO jobs (
			company,
            emailresume,  
            title,
            location,
            industry,
            hours,
            description, 
            salary, 
            closingdate
            )
		VALUES (
			'$company', 
            '$emailresume',  
            '$title', 
            '$location',
            '$industry',
            '$hours',
            '$description',  
            '$salary',   
            '$closingdate'
            )
	   ";

if(mysqli_query($link, $sql)){
    $message = "Added Successfully";
	echo "<script type='text/javascript'>alert('$message');</script>";
$homepage = file_get_contents('redirect.html');
echo $homepage;
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 

// Redirect After Submit
 


// close connection
mysqli_close($link);
?>


            
     