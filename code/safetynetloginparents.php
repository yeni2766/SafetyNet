<!DOCTYPE HTML>

<html lang ='en'>
<head>
<title>
Login Page
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel ="stylesheet" href ="safetynetloginparents.css">
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
		$(".errormessages ").load("parentslogincode.php",{
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
		<!--left sided columns-->
			<div class="col-md-5">
			<!---image for parent-->
				<img src = "4.jpg" class = "img-fluid" >
		
			</div>
			<!--right sided column-->
			<div class="col-md-7">
				<div class ="formrow">
					<div class = "intro">
						<h1>Welcome Back Parent!</h1>
					</div>
					<!--error messages to be used in AJAX-->
			<p class = "errormessages"></p>
	<form>
	<!--inputs-->
		PIN: <input type = "text" name = "pin" id ="pin" pattern="[A-Za-Z@0-9.]{1,30}   " placeholder ="please enter your PIN"  ><br><br>
		Password : <input type = "password" name = "password" id = "password" placeholder = "please enter your password" > <br><br>

	
		<button type = "Submit" class = "submit">Login </button>
		<a href = "registrationform.php">Click here to create an account </a></br>
		<a href = "safetynetlogin.php">Login to child's account </a>
	</form>
				</div>


			</div>

		</div>
	</div>

</div>











<script>




</script>

</html>