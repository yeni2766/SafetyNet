<!DOCTYPE HTML>

<html lang ='en'>
<head>
<title>
Login Page
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel ="stylesheet" href ="safetynetlogin.css">
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
		var pin = $("#pin").val();
		var password = $("#password").val();
		var submit = $("#submit").val();
		$(".errormessages ").load("logincode1.php",{
			pin: pin,
			password:password,
			submit:submit,

	
	



	});
	
	});
	
});
	</script>
</head>
<div class="form">
<div class = "container">
<div class="row ">
  <div class="col-md-5">
  <img src = "3.png" class = "img-fluid" >
  
  </div>
  <div class="col-md-7">
 
  <div class ="formrow">
	<div class = "intro">
	<h1>Welcome Back</h1>
	</div>
	 <p class = "errormessages"></p>
	<form>
	PIN: <input type = "text" name = "pin" id ="pin" pattern="[A-Za-Z@0-9.]{1,30}   " placeholder ="please enter your PIN"  ><br><br>
	Password : <input type = "password" name = "password" id = "password" placeholder = "please enter your password" > <br><br>

	
<button type = "Submit" class = "submit">Login </button>

  <a href = "safetynetloginparents.php">Click here to login into parent dashboard</a>
</form>
</div>


</div>

</div>
</div>

</div>











<script>




</script>

</html>