<?php

require_once 'safety.php';
     $email = trim($_POST["email"]);
	 $password = trim($_POST["parentpassword"]);
 $success = false;
// this will collect all the data from the form
if($_SERVER["REQUEST_METHOD"] == "POST"){
 $errorvalue = false;
   //it will check if the user has entered the email, if so it will store the email, and if not, it will bring the error message
   if(empty(trim($_POST["email"]))){
       $errorvalue = true;
	   		
      	echo "<span class = 'errormessages'>Please enter your email</span>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $errorvalue = true;
echo  "<span class = 'errormessages' > Invalid email format</span>";
}else{
	 $errorvalue = false;
	  $email = trim($_POST["email"]);	
}
}