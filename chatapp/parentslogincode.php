
<?php

require_once 'safety.php';
session_start();
	
     $pin = trim($_POST["pin"]);
	 $password = trim($_POST["password"]);

 $success = false;
// this will collect all the data from the form
if($_SERVER["REQUEST_METHOD"] == "POST"){
 $errorvalue = false;
   //it will check if the user has entered the email, if so it will store the email, and if not, it will bring the error message
   if(empty(trim($_POST["pin"]))){
       $errorvalue = true;
	   		
      	echo "<span class = 'errormessages'>Please enter your pin<br></span>";
    } 
else{
	 $errorvalue = false;
	  $pin = trim($_POST["pin"]);	
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
        $sql = "SELECT id , pin, parentspassword FROM users WHERE pin = ?";

       
        if($result = mysqli_prepare($conn, $sql)){
            //this will bind the variables 
            mysqli_stmt_bind_param($result, "s", $bindedpin);
           
            // i will set the parameter to the variables
            $bindedpin = $pin;
           
            //it will execute the statement
            if(mysqli_stmt_execute($result)){
               
                mysqli_stmt_store_result($result);
               
                // this is to verify whether it exists, if it doesnt there  will get a message and if it does it will bind the variables to create an account
                if(mysqli_stmt_num_rows($result) == 1){                    
                   
                    mysqli_stmt_bind_result($result, $id, $pin, $password);
                    if(mysqli_stmt_fetch($result)){
                        $query = "SELECT * FROM users WHERE pin = '".$_POST['pin']."' and parentspassword ='".$_POST['password']."'and activeaccounts = 1";    
				
$result = mysqli_query ($conn, $query);
$row= mysqli_num_rows ($result);
                        if ($row>0) {

                            // a new session will start and the user will be taken to their account
                            
                           
                            // Store data in session variables
                            $_SESSION["loggedintoaccount"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["pin"] = $pin;                            
                        $success = true;
					echo	'<script>
                  
					  window.location.href = "../parentsdashboard.php";

					  </script>';
                        } else{
                            // and if it is wrong an error message will be given
                          echo "<span class ='errormessages'>The password you entered was not valid.</span>";

                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                  echo "<span class ='errormessages'> That pin could not be found.Please try again</span>";
                }
            } else{
               echo "<span class ='errormessages'> problem</span>";
            }
      
        }
    }
    mysqli_close($conn);
}
?>
