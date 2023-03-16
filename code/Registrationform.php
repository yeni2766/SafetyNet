<!DOCTYPE HTML>

<html lang ='en'>
<head>
<title>
Signup Form
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel ="stylesheet" href ="signup1.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/7f07b22bb3.js" crossorigin="anonymous"></script>
<script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>


<div class = "container">
	<div class = "row">
		<div class = "col-md-8 aa">
		<!---This form will redirect to this page when the submit button is pressed-->
			<form action = "signupform.php" method = "POST">
			<!---the details created for the forms-->
				<div class="form-group">
					<p class = "errormessages"></p>
						<label for="Email">Email address</label>
							<input type="text" class="form-control" name = "email" id="Email" aria-describedby="emailHelp" placeholder="Enter email" onfocusout ="emailchecker()"><span class ="emailtick" id="emailsuccessfultick"><i class="fa fa-check" style="color:green" "aria-hidden="true"></i></span><span class= "emailx"id="emailfailed" ><i class="far fa-times-circle"style="color:red" ></i></span>
								<small id="email" class="form-text text-muted">Remember to keep it in a email format. Must have '@'</small>
				</div>
  <div class="form-group">
		<label for="First Name">First Name</label>
		<!--validation techniques are used here-->
			<input type="text" class="form-control" name="firstname" id ="firstname" placeholder="Please enter your first name"onfocusout="firstnamechecker()">   
			<span class ="firstnametick" id="firstnamesuccessfultick"><i class="fa fa-check" style="color:green" "aria-hidden="true"></i></span>
			<span class= "firstnamex"id="firstnamefailed" ><i class="far fa-times-circle"style="color:red" ></i></span>
		<p id = "name"><span>enter name</span></p>
  </div>
 <div class="form-group">
		<label for="Last Name">Last Name</label>
			<!--validation techniques are used here-->
			<input type="text" class="form-control" name="LastName" id = "lastname" placeholder="Please enter your last name." onfocusout="lastnamechecker()">
			<span class ="lastnametick" id="lastnamesuccessfultick"><i class="fa fa-check" style="color:green" "aria-hidden="true"></i></span>
			<span class= "lastnamex"id="lastnamefailed" ><i class="far fa-times-circle"style="color:red" ></i></span>
  </div>
   <div class="form-group">
		<label for="Password">Password</label>
			<!--validation techniques are used here-->
			<input type="password" class="form-control" name="Password" id="password" placeholder="Password" onfocusout ="passwordcheck()"> <span class ="tick" id="successfultick"><i class="fa fa-check" style="color:green" "aria-hidden="true"></i></span><span class= "x"id="failed" ><i class="far fa-times-circle"style="color:red" ></i></span>
				<small id="passwordtip" class="form-text text-muted">Your password must be more than 7 characters, with uppercase and lowercase letters with at least one number.</small>
  </div>
  
  <div class="form-group">
		<label for="confirmpassword">Password</label>
			<!--validation techniques are used here-->
			<input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" id = "confirmpassword" onfocusout ="confirmpasswordcheck()"><span class ="passwordtick" id="passwordsuccessfultick"><i class="fa fa-check" style="color:green" "aria-hidden="true"></i></span><span class= "passwordx"id="passwordfailed" ><i class="far fa-times-circle"style="color:red" ></i></span>
				<small id="passwordtip" class="form-text text-muted">Please confirm your password to create your account</small>
  </div><br><br>
   
  <div class="form-group">
	<label for="confirmpassword">Child's First Name</label>
		<!--validation techniques are used here-->
		<input type="text" class="form-control" name="childfname" placeholder="Enter your child's first name" id = "childfname" onfocusout ="childfirstnamecheck()"><span class ="childfirstnametick" id="childfirstnamesuccessfultick"><i class="fa fa-check" style="color:green" "aria-hidden="true"></i></span><span class= "childfirstnamex"id="childfirstnamefailed" ><i class="far fa-times-circle"style="color:red" ></i></span>
  </div>
 
 <div class="form-group">
    <label for="confirmpassword">Child's Last Name</label>
		<!--validation techniques are used here-->
		<input type="text" class="form-control" name="childlname" placeholder="Enter your child's last name" id = "childlname" onfocusout ="childlastnamecheck()"><span class ="childlastnametick" id="childlastnamesuccessfultick"><i class="fa fa-check" style="color:green" "aria-hidden="true"></i></span><span class= "childlastnamex"id="childlnamefailed" ><i class="far fa-times-circle"style="color:red" ></i></span>
  </div>
  <div class="form-group">
    <label for="Password">Child Password</label>
		<input type="password" class="form-control" name="childPassword" id="childpassword" placeholder="Password" onfocusout ="childpasswordcheck()"> <span class ="tick" id="childsuccessfultick"><i class="fa fa-check" style="color:green" "aria-hidden="true"></i></span><span class= "x"id="childfailed" ><i class="far fa-times-circle"style="color:red" ></i></span>
			<small id="passwordtip" class="form-text text-muted">Your password must be more than 7 characters, with uppercase and lowercase letters with at least one number.</small>
  </div>
  
  <div class="form-group">
	<label for="confirmpassword">Confirm Child Password</label>
		<input type="password" class="form-control" name="childconfirmpassword" placeholder="Confirm Password" id = "childconfirmpassword" onfocusout ="childconfirmpasswordcheck()"><span class ="passwordtick" id="childpasswordsuccessfultick"><i class="fa fa-check" style="color:green" "aria-hidden="true"></i></span><span class= "passwordx"id="childpasswordfailed" ><i class="far fa-times-circle"style="color:red" ></i></span>
			<small id="passwordtip" class="form-text text-muted">Please confirm your password to create your account</small>
  </div><br><br>
  
  

     <input type="checkbox" name="agree" id="agree"value="Yes" />
     <label for="agree"> I agree to the <a href = 'termsofservice.php'>Terms of Service</a> and <a href = 'privacystatement.php'>Privacy Policy</a></label><br>
  
  
  
  <button type="submit" id ="submit" class="btn btn-primary submit">Submit</button>
             </form>
		</div>


</div>



</div>

</div>





<script>
function childconfirmpasswordcheck(){
	var successful = document.getElementById("childpasswordsuccessfultick");
var failed =  document.getElementById("childpasswordfailed");
var passwordvalidation = document.getElementById("childpassword").value;
var confirmpasswordinput = document.getElementById("childconfirmpassword").value;

if (confirmpasswordinput ==(passwordvalidation)){
	
	document.getElementById("childpasswordsuccessfultick").style.visibility = 'visible';
 document.getElementById("childconfirmpassword").style.borderColor = 'green';
  document.getElementById("childpasswordfailed").style.visibility = 'hidden';
}
	
	
else{
	
	 document.getElementById("childpasswordfailed").style.visibility = 'visible';
 document.getElementById("childconfirmpassword").style.borderColor = 'red';
  document.getElementById("childpasswordsuccessfultick").style.visibility = 'hidden';
	
}
	
	
	
	
}


function confirmpasswordcheck(){
	var successful = document.getElementById("passwordsuccessfultick");
var failed =  document.getElementById("passwordfailed");
var passwordvalidation = document.getElementById("password").value;
var confirmpasswordinput = document.getElementById("confirmpassword").value;

if (confirmpasswordinput ==(passwordvalidation)){
	
	document.getElementById("passwordsuccessfultick").style.visibility = 'visible';
 document.getElementById("confirmpassword").style.borderColor = 'green';
  document.getElementById("passwordfailed").style.visibility = 'hidden';
}
	
	
else{
	
	 document.getElementById("passwordfailed").style.visibility = 'visible';
 document.getElementById("confirmpassword").style.borderColor = 'red';
  document.getElementById("passwordsuccessfultick").style.visibility = 'hidden';
	
}
	
	
	
	
}


function childfirstnamecheck(){
	
var successful = document.getElementById("childfirstnamesuccessfultick");
var failed =  document.getElementById("childfirstnamefailed");
var firstnamevalidation = /^[A-Za-z]+$/;
var firstnameinput= document.getElementById("childfname").value;
if(firstnameinput.match(firstnamevalidation)){
	
document.getElementById("childfirstnamesuccessfultick").style.visibility = 'visible';
document.getElementById("childfname").style.borderColor = 'green';
document.getElementById("childfirstnamefailed").style.visibility = 'hidden';

}
else{
	document.getElementById("childfirstnamefailed").style.visibility = 'visible';
 document.getElementById("childfname").style.borderColor = 'red';
  document.getElementById("childfirstnamesuccessfultick").style.visibility = 'hidden';
	
}
};

function childlastnamecheck(){
	
var successful = document.getElementById("childlastnamesuccessfultick");
var failed =  document.getElementById("childlnamefailed");
var firstnamevalidation = /^[A-Za-z]+$/;
var firstnameinput= document.getElementById("childlname").value;
if(firstnameinput.match(firstnamevalidation)){
	
	 document.getElementById("childlastnamesuccessfultick").style.visibility = 'visible';
 document.getElementById("childlname").style.borderColor = 'green';
  document.getElementById("childlnamefailed").style.visibility = 'hidden';
	
	
}
else{
	document.getElementById("childlnamefailed").style.visibility = 'visible';
 document.getElementById("childlname").style.borderColor = 'red';
  document.getElementById("childlastnamesuccessfultick").style.visibility = 'hidden';
	
}
};

function childfirstnamechecker(){
	
var successful = document.getElementById("lastnamesuccessfultick");
var failed =  document.getElementById("lastnamefailed");
var firstnamevalidation = /^[A-Za-z]+$/;
var firstnameinput= document.getElementById("name").value;
if(firstnameinput.match(firstnamevalidation)){
	
	 document.getElementById("firstnamesuccessfultick").style.visibility = 'visible';
 document.getElementById("firstname").style.borderColor = 'green';
  document.getElementById("firstnamefailed").style.visibility = 'hidden';
	
	
}
else{
	document.getElementById("firstnamefailed").style.visibility = 'visible';
 document.getElementById("firstname").style.borderColor = 'red';
  document.getElementById("firstnamesuccessfultick").style.visibility = 'hidden';
	
}
};






















function firstnamechecker(){
	
var successful = document.getElementById("firstnamesuccessfultick");
var failed =  document.getElementById("firstnamefailed");
var firstnamevalidation = /^[A-Za-z]+$/;
var firstnameinput= document.getElementById("firstname").value;
if(firstnameinput.match(firstnamevalidation)){
	
	 document.getElementById("firstnamesuccessfultick").style.visibility = 'visible';
 document.getElementById("firstname").style.borderColor = 'green';
  document.getElementById("firstnamefailed").style.visibility = 'hidden';
	
	
}
else{
	document.getElementById("firstnamefailed").style.visibility = 'visible';
 document.getElementById("firstname").style.borderColor = 'red';
  document.getElementById("firstnamesuccessfultick").style.visibility = 'hidden';
	
}
};
function lastnamechecker(){
	
var successful = document.getElementById("lastnamesuccessfultick");
var failed =  document.getElementById("lastnamefailed");
var lastnamevalidation = /^[A-Za-z]+$/;
var lastnameinput= document.getElementById("lastname").value;
if(lastnameinput.match(lastnamevalidation)){
	
	 document.getElementById("lastnamesuccessfultick").style.visibility = 'visible';
 document.getElementById("lastname").style.borderColor = 'green';
  document.getElementById("lastnamefailed").style.visibility = 'hidden';
	
	
}
else{
	document.getElementById("lastnamefailed").style.visibility = 'visible';
 document.getElementById("lastname").style.borderColor = 'red';
  document.getElementById("lastnamesuccessfultick").style.visibility = 'hidden';
	
}
};


















function emailchecker(){
	
var successful = document.getElementById("emailsuccessfultick");
var failed =  document.getElementById("emailfailed");
var emailvalidation = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var emailinput= document.getElementById("Email").value;
if(emailinput.match(emailvalidation)){
	
	 document.getElementById("emailsuccessfultick").style.visibility = 'visible';
 document.getElementById("Email").style.borderColor = 'green';
  document.getElementById("emailfailed").style.visibility = 'hidden';
}
else{
	document.getElementById("emailfailed").style.visibility = 'visible';
 document.getElementById("Email").style.borderColor = 'red';
  document.getElementById("emailsuccessfultick").style.visibility = 'hidden';
}
};	
	
	




function tips1(){
	document.getElementById("passwordtip").style.visibility = 'visible';
	
	
	
};

	
function passwordcheck() {
var successful = document.getElementById("successfultick");
var failed =  document.getElementById("failed");
var passwordvalidation =  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,}$/;
var passwordinput = document.getElementById("password").value;
if(passwordinput.match(passwordvalidation)) 
{ 
 document.getElementById("successfultick").style.visibility = 'visible';
 document.getElementById("password").style.borderColor = 'green';
  document.getElementById("failed").style.visibility = 'hidden';
}
else
{ 
 document.getElementById("failed").style.visibility = 'visible';
 document.getElementById("password").style.borderColor = 'red';
  document.getElementById("successfultick").style.visibility = 'hidden';
}
};
	
	
		
function childpasswordcheck() {
var successful = document.getElementById("childsuccessfultick");
var failed =  document.getElementById("childfailed");
var passwordvalidation =  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,}$/;
var passwordinput = document.getElementById("childpassword").value;
if(passwordinput.match(passwordvalidation)) 
{ 
 document.getElementById("childsuccessfultick").style.visibility = 'visible';
 document.getElementById("childpassword").style.borderColor = 'green';
  document.getElementById("childfailed").style.visibility = 'hidden';
}
else
{ 
 document.getElementById("childfailed").style.visibility = 'visible';
 document.getElementById("childpassword").style.borderColor = 'red';
  document.getElementById("childsuccessfultick").style.visibility = 'hidden';
}
};
	
	
	




</script>








</body>
</html>
<style>
.submit {
  background-color: #FFD700;
  display:block;
  color: black;
  padding: -5px;
  text-transform:uppercase;
  margin-left: 90px;

  border: none;
  cursor: pointer;
  width: 50%;
  opacity: 0.9;
 font-family:quicksand;
 letter-spacing:0.5px;
 position:relative;
 left:40px;

}

body{
	
	
}
#errormessages{
	height:50px;
max-width:250px;
	border:1px solid red;
	background-color:white;
	display:block;
	position:relative;

	padding:10px;
	margin-top:-70px;
	color:red;
	font-weight:bold;
	font-family:quicksand;
	display:none;


	
	
}
.fa fa-check{
position:relative;
margin-top:30px;


}
	
	.form-group{
		
		
		margin-top:-30px;
	}


.submit:hover{
	color: white;
	border-radius: 50px;
	border-color: white;
	transition: all 0.7s ease 0s;
	background-color:black;
	border:1px solid white;
}



#name{
	visibility:hidden;
	
	
}
#emailtip{
	
	visibility:hidden;
	
	
}
.passwordtick{
	position:relative;
	bottom:30px;
	left:250px;
	visibility:hidden;
}
.passwordx{
	position:relative;
	bottom:30px;
	left:235px;
	visibility:hidden;
}
.tick{
	position:relative;
	bottom:30px;
	left:250px;
	visibility:hidden;
}
.x{
	position:relative;
	bottom:30px;
	left:235px;
	visibility:hidden;
}
.emailtick{
	position:relative;
	bottom:30px;
	left:250px;
	visibility:hidden;
}
.emailx{
	position:relative;
	bottom:30px;
	left:235px;
	visibility:hidden;
}

.firstnametick{
	position:relative;
	bottom:30px;
	left:250px;
	visibility:hidden;
}
.firstnamex{
	position:relative;
	bottom:30px;
	left:235px;
	visibility:hidden;
}
.lastnametick{
	position:relative;
	bottom:30px;
	left:250px;
	visibility:hidden;
}
.lastnamex{
	position:relative;
	bottom:30px;
	left:235px;
	visibility:hidden;
}
.childlastnametick{
	position:relative;
	bottom:30px;
	left:250px;
		visibility:hidden;
}
.childlastnamex{
	position:relative;
	bottom:30px;
	left:235px;
		visibility:hidden;
}

.childfirstnametick{
	position:relative;
	bottom:30px;
	left:250px;
		visibility:hidden;
}
.childfirstnamex{
	position:relative;
	bottom:30px;
	left:235px;
		visibility:hidden;
}


.aa{
	height:1300px;
}



</style>



