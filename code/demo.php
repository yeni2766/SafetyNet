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

<script>
$(document).ready(function(){
	$("form").submit(function(event){
		
		event.preventDefault();
		var firstname = $("#firstname").val();
		var password = $("#password").val();
		var confirmpassword = $("#confirmpassword").val();
		var childfname = $("#childfname").val();
		var pin = $("#childpinnumber").val();
		var confirmpassword = $("#confirmpassword").val();
		var submit = $("#submit").val();
		$(".errormessages ").load("signupform.php",{
			firstname: firstname,
			password:password,
			confirmpassword:confirmpassword,
			childfname:childfname,
			pin:childpinnumber,
			submit:submit
			
			
		});
		
	});
});
	
	</script>
</head>
<body>


<div class = "container">
	<div class = "row">

	
		<div class = "col-md-8 aa"  >
	
			<form  >
  <div class="form-group">
  
 <p class = "errormessages"></p>
    <label for="Email">Email address</label>
    <input type="text" class="form-control" name = "email" id="Email" aria-describedby="emailHelp" placeholder="Enter email" onfocusout ="emailchecker()"><span class ="emailtick" id="emailsuccessfultick"><i class="fa fa-check" style="color:green" "aria-hidden="true"></i></span><span class= "emailx"id="emailfailed" ><i class="far fa-times-circle"style="color:red" ></i></span>
    <small id="email" class="form-text text-muted">Remember to keep it in a email format. Must have '@'</small>
  </div>
  <div class="form-group">
    <label for="First Name">First Name</label>
    <input type="text" class="form-control" name="firstname" id ="firstname" placeholder="Please enter your first name"onfocusout="firstnamechecker()"><span class ="firstnametick" id="firstnamesuccessfultick"><i class="fa fa-check" style="color:green" "aria-hidden="true"></i></span><span class= "firstnamex"id="firstnamefailed" ><i class="far fa-times-circle"style="color:red" ></i></span>
	<p id = "name"><span>enter name</span></p>
  </div>

   <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" name="Password" id="password" placeholder="Password" onfocusout ="passwordcheck()"> <span class ="tick" id="successfultick"><i class="fa fa-check" style="color:green" "aria-hidden="true"></i></span><span class= "x"id="failed" ><i class="far fa-times-circle"style="color:red" ></i></span>
	<small id="passwordtip" class="form-text text-muted">Your password must be more than 7 characters, with uppercase and lowercase letters with at least one number.</small>
  </div>
  
  <div class="form-group">
    <label for="confirmpassword">Password</label>
    <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" id = "confirmpassword" onfocusout ="confirmpasswordcheck()"><span class ="passwordtick" id="passwordsuccessfultick"><i class="fa fa-check" style="color:green" "aria-hidden="true"></i></span><span class= "passwordx"id="passwordfailed" ><i class="far fa-times-circle"style="color:red" ></i></span>
		<small id="passwordtip" class="form-text text-muted">Please confirm your password to create your account</small>
  </div><br><br>
  
  
  
  
  
  
  <div class="form-group">
    <label for="confirmpassword">Child's First Name</label>
    <input type="text" class="form-control" name="childfname" placeholder="Enter your child's first name" id = "childfname" onfocusout ="childfirstnamecheck()"><span class ="childfirstnametick" id="childfirstnamesuccessfultick"><i class="fa fa-check" style="color:green" "aria-hidden="true"></i></span><span class= "childfirstnamex"id="childfirstnamefailed" ><i class="far fa-times-circle"style="color:red" ></i></span>
  </div>
  
  
  
  
  
  
  
    <div class="form-group">
    <label for="confirmpassword">Child's PIN Number</label>
    <input type="text" class="form-control" name="pin" placeholder="Enter your child's pin" id = "childpinnumber" onfocusout ="confirmpasswordcheck()"><span class ="passwordtick" id="passwordsuccessfultick"><i class="fa fa-check" style="color:green" "aria-hidden="true"></i></span><span class= "passwordx"id="passwordfailed" ><i class="far fa-times-circle"style="color:red" ></i></span>
  </div>
  


  
  
  
  <button type="submit" id ="submit" class="btn btn-primary submit">Submit</button>
</form>
		</div>


</div>



</div>

</div>





<script>
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






</style>



