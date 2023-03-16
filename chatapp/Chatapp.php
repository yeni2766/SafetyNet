<!DOCTYPE HTML>
<?php
error_reporting(0);
include('safety.php');
session_start();

//this is used to get the friends list
$sql = "select * from notifications WHERE notifications_sentto ='".$_SESSION['pin']."' and accepted = 1";
$result1 = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_assoc($result1);

$sentfrom = $row1 ['notifications_sentfrom'];

$sql1 = "select * from users where pin = '$sentfrom'";
$data = mysqli_query($conn, $sql1);
$row = $data->fetch_all(MYSQLI_ASSOC);


$sql3 = "select * from users where pin = '".$_SESSION['pin']."'";

$row3 = $conn->query($sql3);

if(!isset($_SESSION['pin'])){ //if login in session is not set send the user to login page
header("location:safetynetlogin.php");
}
	
	
?>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/duotone.css" integrity="sha384-R3QzTxyukP03CMqKFe0ssp5wUvBPEyy9ZspCB+Y01fEjhMwcXixTyeot+S40+AjZ" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous"/>
<link rel ="stylesheet" href ="dashboard.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css" integrity="sha512-vEia6TQGr3FqC6h55/NdU3QSM5XR6HSl5fW71QTKrgeER98LIMGwymBVM867C1XHIkYD9nMTfWK2A0xcodKHNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/duotone.css" integrity="sha384-R3QzTxyukP03CMqKFe0ssp5wUvBPEyy9ZspCB+Y01fEjhMwcXixTyeot+S40+AjZ" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

</head>

<body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js" integrity="sha512-hkvXFLlESjeYENO4CNi69z3A1puvONQV5Uh+G4TUDayZxSLyic5Kba9hhuiNLbHqdnKNMk2PxXKm0v7KDnWkYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div id= "wrapper">
	<div id = "leftside">
		<?php if (empty($row3)): ?>
			<?php else: ?>
		<?php foreach ($row3 as $result3): ?>
			<img class="img-thumbnail" alt="100x100" width= "35" height= "35" src=" <?php echo $result3['images']; ?>">
	 	<?php endforeach; ?>
		<?php endif; ?>
      
	   <br>
	   <div id = "getcontacts">
	   	   <label for = "radiocontacts"><i class="fa fa-address-book"style="font-size: 25px;" title="Contacts" ></i></label>
		</div>
		<div id = "getchats">
	   	   <label for = "radiochats"><i class="fa fa-comments"style="font-size: 25px;" title = "Chats"></i></label>
		</div>
		
  <div id = "book">
	   	   <i class="fa fa-book"style="font-size: 25px; color:white; position:relative; top:55px;" onclick = 'internetsafety()' title = "Internet Safety"></i> 
		</div>
	   <div id = "logout">
	   	   <label for = "radiologout"><i class="fa fa-sign-out"style="font-size: 25px; color:white;" onclick = 'myFunction()'title = "Logout"></i> </label>
		</div>
		
	   <label></label>
	</div>

	

	<div id = "rightside">
			<div id = "header">
				<div id = 'animationloadingscreen'>
					<img style = "width: 50px; " src = "loading.gif" >

			</div>
			<h3><img src = "logo.png" class = "logo" style = 'position:relative; bottom:15px;'  /></h3>
			
			<?php foreach ($row3 as $result3): ?>
				<p class = "username"><small> Hi, <?php echo $result3['childfname']?>  </small> </p>
			<?php endforeach; ?>
			</div>
		<div id = "container">
			<div id ="contacts">
				<div id = "chatlist"></div>
					<div id = "friendslist">
	
						<?php if (empty($row)): ?>
							<div class = 'nofriends'>
								<h2 class = 'friends'>You currently have no friends</h2>
									<div class = 'secondmessage'>
										<h2 class = 'friends'>Just add a friend and you can start chatting!</h2>
									</div>
										<img src = 'lonely.png' class = 'pic' style = 'position:relative; top:-50px;'/>
				
							</div>
						<?php else: ?>
											<?php foreach ($row as $result): ?>
												<div id = 'contact' style = 'text-align:center; animation:' class = 'hh' pin = '<?php echo $result['pin']; ?>' onclick = "beginchat(event)">
													<img class='rounded-circle' src = "<?php echo $result['images']; ?>" />
														<p><?php echo $result['childfname']; ?></p>
												</div><br>
	
	
											<?php endforeach; ?>
											<?php endif; ?>
				</div>
												<div id = "settings"></div>
												<div id = "logout1"></div>
	
		</div>
													<audio id="myAudio">
													<source src="pickupCoin.mp3" type="audio/wav">
													</audio>
													<input type ="radio" id ="radiochats" name="radio"style = "display:none;">
													<input type ="radio" id ="radiocontacts" name="radio" style = "display:none;">
													<input type ="radio" id ="radiosettings" name="radio" style = "display:none;">
													<input type ="radio" id ="radiologout" name="radio" style = "display:none;">
		
													<div id ="chats">
	
		
													</div>
	
	
		</div>
	</div>
</div>




<script>

//to log out a user
function myFunction() {
  let text = "Are you sure you want to log out? \nEither OK or Cancel.";
  if (confirm(text) == true) {
   window.location.href = "logout1.php"
  } else {
   
  }

}
//takes the user to the internet safetyguide
function internetsafety(){
	
	window.open('../internetsafety.php', '_blank');
	
}

var selecteduser = '';
document.getElementById("getcontacts").addEventListener("click",getcontacts);


//used to display content into specific columns
function getcontacts(){

	var chats = document.getElementById("chats");
	chats.style.overflow = "hidden";
	
	var chatlist = document.getElementById("chatlist");
	chatlist.style.visibility = "hidden";
	var friendslist = document.getElementById("friendslist");
	friendslist.style.visibility = "visible";
		var settings = document.getElementById("settings");
	settings.style.visibility = "hidden";
	
		var logout = document.getElementById("logout1");
	logout.style.visibility = "hidden";
	
	var contact11 = document.getElementById("contactss");
	contact11.style.visibility = "hidden";
	
		
		var loader = document.getElementById("animationloadingscreen");
	loader.style.visibility = "visible";
	
	 var request = new XMLHttpRequest();
  request.onreadystatechange = function() {
    if (request.readyState == 4 && request.status == 200) {
		 loader.style.visibility = "hidden";
		
     document.getElementById("friendslist").innerHTML = request.responseText;
    }
  };
  request.open("post", "contacts.php", true);
  request.send();


}

//used to display content into specific columns
document.getElementById("getchats").addEventListener("click",getchats);

function getchats(){
	var seenmessage = false;
		var chatlist = document.getElementById("chatlist");
	chatlist.style.visibility = "visible";
	var friendslist = document.getElementById("friendslist");
	friendslist.style.visibility = "hidden";
			var settings = document.getElementById("settings");
	settings.style.visibility = "hidden";
	
		var logout = document.getElementById("logout1");
	logout.style.visibility = "hidden";
	
	
		var loader = document.getElementById("animationloadingscreen");
	loader.style.visibility = "visible";
	
	var request = new XMLHttpRequest();
  request.onreadystatechange = function() {
    if (request.readyState == 4 && request.status == 200) {
			 loader.style.visibility = "hidden";
     document.getElementById("chatlist").innerHTML = request.responseText;
	
    }
  };
  request.open("post", "chats3.php", true);
  request.send();

	
}






document.getElementById("logout").addEventListener("click",logout);
//used to display content into specific columns
function logout(){
	var logout = document.getElementById("logout1");
	logout.style.visibility = "visible";
	var settings = document.getElementById("settings");
	settings.style.visibility = "hidden";
	var friendslist = document.getElementById("friendslist");
	friendslist.style.visibility = "hidden";
		var chatlist = document.getElementById("chatlist");
	chatlist.style.visibility = "hidden";
	
		var loader = document.getElementById("animationloadingscreen");
	loader.style.visibility = "visible";
	
	var request = new XMLHttpRequest();
  request.onreadystatechange = function() {
    if (request.readyState == 4 && request.status == 200) {
		 loader.style.visibility = "hidden";
     document.getElementById("logout1").innerHTML = request.responseText;
    }
  };
  request.open("post", "logout.php", true);
  request.send();

	
}
var x = document.getElementById("myAudio"); 
//plays audio when user sends message
function playAudio() { 
  x.play(); 
} 


function beginchat(e){//this is lead us to the particular chat that got clicked
//a problem here was i wanted to be able to click on any part of the div images, names etc for the chat section to be linked with the user id of the person
	 //now i needed to get the attributes of the user's pin which i could pass through into the php section

	 
	var pin = e.target.getAttribute("pin");
	if (e.target.id == ""){
		pin = e.target.parentNode.getAttribute("pin");
		
		
	}
selecteduser = pin;
//the variable becomes the pin
	var radiochat = document.getElementById("radiochats");
	radiochat.checked = true;

 //the pin is passed over to this page
 $.post("chats1.php", {user: selecteduser}, function(result){
    $("#chats").html(result);
});

}
	
 setInterval(function(){
if (selecteduser != ""){
		
			 $.post("chats1.php", {user: selecteduser}, function(result){
    $("#chats").html(result);
});
		
	}
  },6000)

  
function enterkey(e){

		alert(keyCode);

	}
	

	function message(){
		//the message text
					var message = document.getElementById("messagetab").value;
					 var offensivewords=new Array(
					 //filter messages with offensive language
    "fuck off","piss off","shit","damn","bitch","dipshit","fuck","faggot","shit","nigger", "fat boy", "kys", "kill yourself", "smd",
    "dickhead", "b\\*\\*\\*\\h", "s\\*\\*\\t", "f\\*\\*\\k", "n\\*\\*\\*\\er", "f\\*\\*\\*\\ot", "k\\*\\*\\l", "d\\*\\*\\*\\h\\*\\ad", "nigga", "n\\*\\*\\*\\a", "paki", "p\\*\\*\\i", 
	"wanker", "wank", "w\\*\\*\\k", "w\\*\\*\\*\\er", "asshole", "a\\*\\*\\hole", "bullshit", "bull\\*\\*\\*\\*\\", "cunt", "c\\*\\*\\t"
	); 
	var regex = new RegExp('\\b(' + offensivewords.join('|') + ')\\b', 'i' );
					
					if (messagetab.value.trim() == ''){//this stops the user from sending empty messages
					alert("please type a message");
					return;
					}else if (regex.test(message)){
						//disallowing users to send offensive messages
						alert("This kind of language will not be allowed on Safety Net");
					}else{
							//sending message through to a file
					$.post("sendsmessage.php", {message:messagetab.value.trim(), user: selecteduser}, function(result){
						
    $("#chats").html(result);
	playAudio();//playing an audio when a message is sent
	var messagetab = document.getElementById("messagetab");

	var messagewrapper = document.getElementById("messagewrapper");
						messagewrapper.scrollTo(0,messagewrapper.scrollHeight);
						messagetab.focus();
				
			
					
});
			
					
					
					
					
					
	}
	}



	



//this passes the information through to ajax

function myfunction3(){
$(document).ready(function(){
	$('#search_text').keyup(function(){
		var friendpin = $(this).val();
	if (friendpin != '')
	{
		$.ajax({
			url: "search1.php",
			method: "post",
			data:{search:friendpin},
			dataType:"text",
			success:function(data)
			{
				$('#friendtable').html(data);
				
			}
		
		
	});
	}
		
	});
});
}
		




</script>

  
					  
					  






</body>
</html>

<style>
#book{
	cursor:pointer;
}


.pic{
	position:relative;
	top:-500px;
	
	
}
.secondmessage{
width:280px;
	font-weight:bold;
	word-wrap:break-word;
	position:relative;
	left:600px;
}




















.friends{
	position:relative;
	top:70px;
	font-family:quicksand;
}




p{
				
				font-family:quicksand;
				font-weight:bold;
			}


label .fa fa-address-book{
color:white;
padding-top:10px;
}



.content{
position:r


}
.col-md-3{
background-color:blue;
width:200px;
height:300px;
border-bottom:1px solid black;
}
.col-md-9{
background-color:blue;
width:200px;
height:300px;
border-bottom:1px solid black;
}

.row{
position:relative;
left:300px;
top:300px;
display:block;


}
body{


background-size:cover;
background-position:center center;
}

.chatbox{
width:90%;
height:90%;
margin-top:20px;
background-color:white;

}


#wrapper{
	max-width:1450px;
	min-height:625px;
	box-shadow:rgba(0, 0, 0, 0.24) 0px 3px 8px;
	display:flex;
	margin-top:0px;
	margin-left:0px;
}


html{
overflow-x:hidden;

}


	#chats{
			transition:all 2s ease;
		flex:0;
		background-color:#FBFBFB;
		min-height:565px;
		border-left: 1px solid grey;
	}
	
#leftside{
	padding-top:30px;
	flex:1;
	border-right: 1px solid grey;
	min-height:500px;
	background-color:black;
	text-align:center;
}
#rightside{
	
	flex:25;
	text-align:center;
	min-height:500px;

}

	#header{
		height:60px;
		background-color:#FAD02C;
		color:white;
			font-family:quicksand;
			font-weight:BOLD;
			padding:20px;
		border-bottom:1px solid grey;
		font-size:20px;
	}

	#contacts{
		
		flex:1;
		background-color:#F4F0F0;
		
			min-height:450px;
			transition:all 2s ease;
			max-height:100%;
			position:relative;
			vertical-align:top;
		
	}


h3{
position:relative; right:570px;
font-weight:bold;
font-family:quicksand;

}



.logo{
position:relative; left:30px;
bottom:25px;

}
	
	
	
	
	.username{
	position:relative;
	left:-400px;
	bottom:65px;
	font-size:20px;
	
}
	
	
	#contacts img {
	width:15%;
	position:relative;
	right:120px;
	top:30px;
	}
	 #contacts p {
	 display:inline-block;
	 position:relative;
right:90px;
	top:30px;
	font-weight:bold;
	 }
	.hh {
		vertical-align:top;
		display:inline-block;
		border-bottom:1px solid #A8A8A8;
		height:100px;
	}
	
	
	
	
	
	#radiocontacts:checked ~ #chats{
	

	
	flex:3;
}
	
	
	#radiocontacts:checked ~ #chats{
		
		
		flex:0;
	}
		
	#radiocontacts:checked ~ #chats{
		
		
		flex:0;
	}
	
	#radiochats:checked ~ #chats{
		
		
		flex:1;
		
		
	}
	
		#radiosettings:checked ~ #chats{
		
		
		flex:0;
		
		
	}
		#radiologout:checked ~ #chats{
		
		
		flex:0;
		
		
		
	}
	#animationloadingscreen{
		
		
		position:absolute;
		z-index:1;
		left:900px;
	visibility:hidden;
	width:50%;
	}
	
	
	
		#header{
		height:70px;
		background-color:#FAD02C;
		color:white;
			font-family:quicksand;
			font-weight:BOLD;
			padding:20px;
		border-bottom:1px solid grey;
		font-size:20px;
		position:relative;
	}
	
	html,body{
		
		
	overflow:hidden;
	}
	
	@keyframes openinganimation{
		
		0%{opacity:0; transform: translateY(-100px)}
	100% {opacity:1; transform: translateX(0px)}
	}
	
.hh{
	
	animation:openinganimation 0.5s ease;
	
	
}

#contact{
	
	animation:openinganimation 0.5s ease;
	
	
}
		.bb {
		vertical-align:top;
		display:block;
		border-bottom:1px solid #A8A8A8;
		height:100px;
	}
	

		#chats img {
	width:15%;
	position:relative;
	right:120px;
	top:30px;
	}
	 #chats p {
	 display:inline-block;
	 position:relative;
right:90px;
	top:30px;
	font-weight:bold;
	 }
	 
	 	#header{
		height:80px;
		background-color:#FAD02C;
		color:white;
			font-family:quicksand;
			font-weight:BOLD;
			padding:20px;
		border-bottom:1px solid grey;
		font-size:20px;
		position:relative;
	}
	#contact:hover{

	
	transform:translateY(20px);

}
	#contact{
			transition: 0.5s ease;
		cursor:pointer;
	}
	
	input[type=button]{
		
		background-color:#010d01;
		color:white;
		font-family:quicksand;
		font-weight:bold;
		border:1px solid white;
		
	}
	
::placeholder{
	color:white;
	font-family:quicksand;
	font-weight:bold;
}
</style>