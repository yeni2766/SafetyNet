
<?php

require_once 'safety.php';

     $email = trim($_POST["email"]);
	 $password = trim($_POST["password"]);

 $success = false;
// this will collect all the data from the form
if($_SERVER["REQUEST_METHOD"] == "POST"){
 $errorvalue = false;
   //it will check if the user has entered the email, if so it will store the email, and if not, it will bring the error message
   if(empty(trim($_POST["email"]))){
       $errorvalue = true;
	   		
      	echo "<span class = 'errormessages'>Please enter your email<br></span>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $errorvalue = true;
echo  "<span class = 'errormessages' > Invalid email format</span>";
}else{
	 $errorvalue = false;
	  $email = trim($_POST["email"]);	
}
	
   
 //it will check if the user has entered the password, if so it will check if the password is right, and if not, it will bring the error message
    if(empty(trim($_POST["password"]))){
		 $errorvalue = true;
   echo  "<span class = 'errormessages' > You have to enter a password to continue</span>";

    } else{
		$errorvalue = false;
        $password = trim($_POST["password"]);
    }
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
   //if the error messages variables are not set  then it will make the statement
    if( $errorvalue == false ){
        $sql = "SELECT id, email, password  FROM users WHERE email = ?";

       
        if($result = mysqli_prepare($conn, $sql)){
            //this will bind the variables 
            mysqli_stmt_bind_param($result, "s", $bindedemail);
           
            // i will set the parameter to the variables
            $bindedemail = $email;
           
            //it will execute the statement
            if(mysqli_stmt_execute($result)){
               
                mysqli_stmt_store_result($result);
               
                // this is to verify whether it exists, if it doesnt there  will get a message and if it does it will bind the variables to create an account
                if(mysqli_stmt_num_rows($result) == 1){                    
                   
                    mysqli_stmt_bind_result($result, $id, $email, $password);
                    if(mysqli_stmt_fetch($result)){
                        $query = "SELECT * FROM users WHERE email = '".$_POST['email']."' and password ='".$_POST['password']."'";             
$result = mysqli_query ($conn, $query);
$row= mysqli_num_rows ($result);
                        if ($row>0) {

                            // a new session will start and the user will be taken to their account
                            session_start();
                           
                            // Store data in session variables
                            $_SESSION["loggedintoaccount"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;    
							$_SESSION["pin"] = $pin;    

                        $success = true;
					echo	'<script>
                  
					  window.location.href = "/sessions/parentsdashboard.php";

					  </script>';
                        } else{
                            // and if it is wrong an error message will be given
                          echo "<span class ='errormessages'>The pin you entered was not valid.</span>";

                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                  echo "<span class ='errormessages'> That username could not be found.Please try again</span>";
                }
            } else{
               echo "<span class ='errormessages'> problem</span>";
            }
      
        }
    }
    mysqli_close($conn);
}
?>
