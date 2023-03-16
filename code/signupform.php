<?php
error_reporting(0);
#represents the database file
require_once 'safety.php';

#this variables are empty for now however they will be declared to the user's detais
$email = $password = $confirmpassword = $firstname = $lastname = $childfname = $childlname = $pin =  $token = "";
#these are error validations, and if they are not activated they will not be declared.
$wrongpin= $wrongemail = $wrongpassword = $confirm_wrongpassword = $wrongfirstname = $wronglastname = $wrongchildfirstname = $wrongchildlastname = $wrongchildpassword = $childcomfirm_wrongpassword = "";
 
#function to create the user generated pins
function generated_string($length){
	#it picks a random of numbers and uppercase letters
	$array = array(0,1,2,3,4,5,6,7,8,9, "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
$pinrandom = '';
	$length = rand(9,$length);
	
	for ($i=0; $i<=$length; $i++ ){
	#for loop carries on till it reaches the length 
		$randomizednumber = rand(0,36); #genarates number between 0-36
		$pinrandom.= $array[$randomizednumber]; #puts into array
		
		
		
	}
	
	
	return $pinrandom;
	
}
#length is inserted in parenthesis
$pin = generated_string(9);

 
// this checks the form data when it is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
 
if(isset($_POST['agree']) && 
   $_POST['agree'] == 'Yes') 
{

}
else
{
    echo "You must agree to the privacy policy and terms of service.";
}
   
    //checks to see if it is the right password
    if(empty(trim($_POST["Password"]))){
        $wrongpassword= "Please enter a password."; 
echo $wrongpassword."<br>";
    } elseif(strlen(trim($_POST["Password"])) < 7){
        $wrongpassword = "Your password must have 7 characters at least to create an account.";
echo $wrongpassword."<br>";
    } else{
        $password = trim($_POST["Password"]);
    }
   
    // Validate confirm password
    if(empty(trim($_POST["confirmpassword"]))){
        $confirm_wrongpassword  = "Please confirm password.";  
echo  $confirm_wrongpassword."<br>" ;
    } else{
        $pwdrepeat = trim($_POST["confirmpassword"]);
        if(empty($wrongpassword) && ($password != $pwdrepeat)){
            $confirmpassword = "Password did not match. please try again";
echo $confirmpassword."<br>";
        }
    }
  // childpassword
    if(empty(trim($_POST["childPassword"]))){
        $childwrongpassword= "Please enter a password for your child.";  
echo $childwrongpassword."<br>";
    } elseif(strlen(trim($_POST["childPassword"])) < 7){
        $childwrongpassword = "Your password must have 7 characters at least to create an account.";
echo $childwrongpassword."<br>";
    } else{
        $childpassword = trim($_POST["childPassword"]);
    }
   
    // Validate confirm password
    if(empty(trim($_POST["childconfirmpassword"]))){
        $childconfirm_wrongpassword  = "Please confirm your child password.";  
echo  $childconfirm_wrongpassword."<br>";
    } else{
        $childpwdrepeat = trim($_POST["childconfirmpassword"]);
        if(empty($childwrongpassword) && ($childpassword != $childpwdrepeat)){
            $childconfirmpassword = "Password did not match. please try again";
echo $childconfirmpassword."<br>";
        }
    }  

















//checks if it is the right email that selcts the entered email and checks if it is in the database
        $sql = "SELECT id FROM users WHERE pin = ?";
       
        if($result= mysqli_prepare($conn, $sql)){
    // joins the variables together to be used as parameters
            mysqli_stmt_bind_param($result, "s", $pin);
           

            $pin = generated_string(8);
           
          
            if(mysqli_stmt_execute($result)){
       
                mysqli_stmt_store_result($result);
                              //if it matches the user input from the database it will send that message
                if(mysqli_stmt_num_rows($result) == 1){
                    $wrongpin = "This pin is already taken. please enter another pin";
echo $wrongpin."<br>";
                } else{
                    $pin = generated_string(8);
                }
            } else{
                echo " Please try again later, something has gone wrong";
            }

            // Close statement
            mysqli_stmt_close($result);
        }
    


if(empty(trim($_POST["email"]))){
        $wrongemail = "Please enter a email.";
echo $wrongemail."<br>";
    } else{
//checks if it is the right email that selcts the entered email and checks if it is in the database
        $sql = "SELECT id FROM users WHERE email = ?";
       
        if($result= mysqli_prepare($conn, $sql)){
    // joins the variables together to be used as parameters
            mysqli_stmt_bind_param($result, "s", $binded_Email);
           

            $binded_Email = trim($_POST["email"]);
           
          
            if(mysqli_stmt_execute($result)){
       
                mysqli_stmt_store_result($result);
                              //if it matches the user input from the database it will send that message
                if(mysqli_stmt_num_rows($result) == 1){
                    $wrongemail = "This email is already taken. please enter another email";
echo $wrongemail."<br>";
                } else{
                    $email = trim($_POST['email']);
                }
            } else{
                echo " Please try again later, something has gone wrong";
            }

            // Close statement
            mysqli_stmt_close($result);
        }
    }





//email


//firstname
#this stops the user from not entering their first name
if(empty(trim($_POST["firstname"]))){
	
        $wrongfirstname = "Please enter a First Name.";
echo $wrongfirstname."<br>";
    } else{
        // Prepare a select statement where firstname is checked in the database
        $sql = "SELECT id FROM users WHERE parentfname = ?";
        if($result = mysqli_prepare($conn, $sql)){
           // joins the variables together to be used as parameters
            mysqli_stmt_bind_param($result, "s", $binded_firstname);
           
            // Set parameters
            $binded_firstname = trim($_POST["firstname"]);
      
            if(mysqli_stmt_execute($result)){
         
                mysqli_stmt_store_result($result);
               
               
               
                 $firstname = trim($_POST['firstname']);
               
            } else{
                echo "Please try again later, there has been a connection problem";
            }

            // Close the statement
            mysqli_stmt_close($result);
        }
    }
	if(empty(trim($_POST["LastName"]))){
        $wronglastname = "Please enter a Last Name.";
echo $wronglastname."<br>";
    } else{
        // Prepare a select statement where firstname is checked in the database
        $sql = "SELECT id FROM users WHERE parentlname = ?";
        if($result = mysqli_prepare($conn, $sql)){
           // joins the variables together to be used as parameters
            mysqli_stmt_bind_param($result, "s", $binded_lastname);
           
            // Set parameters
            $binded_lastname = trim($_POST["LastName"]);
      
            if(mysqli_stmt_execute($result)){
         
                mysqli_stmt_store_result($result);
               
               
               
                 $lastname = trim($_POST['LastName']);
               
            } else{
                echo "Please try again later, there has been a connection problem";
            }

            // Close the statement
            mysqli_stmt_close($result);
        }
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	if(empty(trim($_POST["childfname"]))){
        $wrongchildfirstname = "Please enter a child First Name.";
echo $wrongchildfirstname."<br>";
    } else{
        // Prepare a select statement where firstname is checked in the database
        $sql = "SELECT id FROM users WHERE childfname = ?";
        if($result = mysqli_prepare($conn, $sql)){
           // joins the variables together to be used as parameters
            mysqli_stmt_bind_param($result, "s", $binded_childfname);
           
            // Set parameters
            $binded_childfname = trim($_POST["childfname"]);
      
            if(mysqli_stmt_execute($result)){
         
                mysqli_stmt_store_result($result);
               
               
               
                 $childfname = trim($_POST['childfname']);
               
            } else{
                echo "Please try again later, there has been a connection problem";
            }

            // Close the statement
            mysqli_stmt_close($result);
        }
    }

	
	
	
	
if(empty(trim($_POST["childlname"]))){
        $wrongchildlastname = "Please enter a child Last name.";
echo $wrongchildlastname."<br>";
    } else{
       // Prepare a select statement where lastname is checked in the database
        $sql = "SELECT id FROM users WHERE childlname = ?";
       
        if($result = mysqli_prepare($conn, $sql)){
                 // joins the variables together to be used as parameters
            mysqli_stmt_bind_param($result, "s", $binded_childlname);
           
            // Set parameters
            $binded_childlname = trim($_POST["childlname"]);
           

            if(mysqli_stmt_execute($result)){

                mysqli_stmt_store_result($result);
               
               
               
                 $childlname = trim($_POST['childlname']);
               
            } else{
                echo "Please try again later. Something is wrong at the moment";
            }

            // Close the statement
            mysqli_stmt_close($result);
        }
    }

 $token = bin2hex(random_bytes(50)); // generate unique token



  //if the error messages variables are not set  then it will make the statement
    if(empty($wrongusername) && empty($wrongpassword) && empty($confirm_wrongpassword) && empty($wrongemail)&& empty($wrongpin) && empty ($wrongfirstname) && empty ($wronglastname) && empty ($wrongchildfirstname) && empty ($wrongchildlastname)){
       
        // Prepare an insert statement and store the form data into the database
        $sql = "INSERT INTO users (email, parentfname, parentlname, password, pin, childfname, childlname, activationcode, parentspassword, childpassword) VALUES (?, ?, ?,?,?,?,?,?,?,?)";
         
        if($result = mysqli_prepare($conn, $sql)){
                  //this will bind the variables 
            mysqli_stmt_bind_param($result, "sssssssss", $binded_Email,$binded_firstname,$binded_lastname, $binded_childpassword ,$bindedpin,$binded_childfname, $binded_childlname, $bindedtoken, $binded_password,  $binded_childpassword);
           
      

            $binded_password = $password;
			  $binded_childpassword = $childpassword;
$binded_Email = $email;
$binded_firstname = $firstname;
$binded_lastname = $lastname;
$bindedpin = $pin;
$binded_childfname = $childfname;
$binded_childlname = $childlname;
$bindedtoken = $token;
$verificationlink = "http://localhost/safetynet/chatapp/verifyemail.php?token={$token}";
		$body = "Hi there, 

Thanks for signing up with us. From now this will be your personal email where we will send you regular updates about changes coming to safetynet, different ideas and we will be looking for your feedback to improve this chatting application for your child and the world. The next email you will be receiving will be the PIN that both you and your child will be sharing together on the platform. 



Thank you from all of us from Safetynet,
 
Safetynet
 
 ";
mail("$binded_Email",'Account Creation', "$body", 'From:safetynetenquiries@gmail.com');
mail("$binded_Email",'Your PIN number', "$bindedpin", 'From:safetynetenquiries@gmail.com');
mail("$binded_Email",'Verify your email', "$verificationlink", 'From:safetynetenquiries@gmail.com');

            if(mysqli_stmt_execute($result)){
              // takes user into this page

                header("location: chatapp/verify.php");

            } else{
                echo  "Something is wrong, please try again later.";
            }


            mysqli_stmt_close($result);
        }
    }
   
  
    mysqli_close($conn);
}



