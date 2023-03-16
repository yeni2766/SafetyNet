
<?php

require 'safety.php';
session_start();

$user['userid'] = null;
if (isset($user)){
	$user = $_POST["user"];
	
$sql = "select * from users WHERE pin ='".$_POST["user"]."'";
$data = mysqli_query($conn, $sql);
$row = $data->fetch_all(MYSQLI_ASSOC);
$sender = $_SESSION['pin'];

$sql4 = "select * from message where senderpin or receiverpin = '$sender' and receiverpin = '$user' and connection = '1'";
$result5 = mysqli_query($conn,$sql4);

$msg_id = '';
$row2 = mysqli_fetch_assoc($result5);

}
?>
<?php 
$work= "select * from message where senderpin = '$sender' and connection = '1'";
$resultmessage = mysqli_query($conn,$work);
$row1 = $resultmessage->fetch_all(MYSQLI_ASSOC);


$userdetails= "select * from users where pin = '$sender'";
$resultuser = mysqli_query($conn,$userdetails);
$row2 = $resultuser->fetch_all(MYSQLI_ASSOC);

$leftmessage = "select * from message where senderpin = '".$_POST["user"]."'and connection = '1'";
$resultleftmessage = mysqli_query($conn,$leftmessage);
$row3 = $resultleftmessage->fetch_all(MYSQLI_ASSOC);

$userreceiver= "select * from users where pin = '".$_POST["user"]."'";
$resultreceiver = mysqli_query($conn,$userreceiver);
$row4 = $resultreceiver->fetch_all(MYSQLI_ASSOC);

?>
<body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js" integrity="sha512-hkvXFLlESjeYENO4CNi69z3A1puvONQV5Uh+G4TUDayZxSLyic5Kba9hhuiNLbHqdnKNMk2PxXKm0v7KDnWkYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src= "https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css" integrity="sha512-vEia6TQGr3FqC6h55/NdU3QSM5XR6HSl5fW71QTKrgeER98LIMGwymBVM867C1XHIkYD9nMTfWK2A0xcodKHNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.textcomplete/1.8.5/jquery.textcomplete.min.js" integrity="sha512-7DIA0YtDMlg4BW1e0pXjd96R5zJwK8fJullbvGWbuvkCYgEMkME0UFfeZIGfQGYjSwCSeFRG5MIB5lhhEvKheg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/emojione/2.0.0/assets/css/emojione.min.css"/>

<div id = 'messagewrapper' style = ' height:500px; ' onclick = 'makeseenmessage(event)'>
	<div id = 'messagewrapper2' style = ' height:500px;  overflow-y:scroll; '>
		<?php foreach ($row1 as $result2): ?>
		<?php foreach ($row2 as $resultuser): ?>
		<div id = 'messageright'   class = 'bb' 'margin:10px;'>
				<div class = 'message'>
					<div class = 'child'>	<?php echo  $result2['messages'];?>
					</div>
				</div>
						<span style = 'position:relative; left:-50px; bottom: 5px;'> <small><?php echo $result2['date']; ?></small></span>
							<div class = 'image2'>
								<img class='img-thumbnail' style = 'left:160px; bottom:30px; width:10%; border:1px solid black; 'id = 'image' src = "<?php echo $resultuser['images']; ?>" >
							</div>
								<div class = 'para1'>
									<p class ='p' style = ' left:160px; '><?php echo $resultuser['childfname']; ?></p><br>

								</div>
		</div>
		<?php endforeach; ?>
		<?php endforeach; ?>
						
		
			
			<!--these are code of the chat menu UI-->
			
		<?php foreach ($row3 as $result3): ?>
		<?php foreach ($row4 as $resultuser1): ?>
			<div id = 'contactss1'  class = 'bb' style = 'float:left; margin:10px; position:relative; ' >
				<div class = 'message'>
					<div class = 'child1'>	<?php echo  $result3['messages'];?>
					</div>
					
				</div>
			<span style = 'position:relative; left:25px; bottom: 5px;'> <small><?php echo $result3['date']; ?></small></span>
			<div class = 'image1'>
				<img class="img-thumbnail" style = 'right:120px; border:1px solid black; width:10%;'id = 'image'src = "<?php echo $resultuser1['images']; ?>" >
			</div>

			<div class = 'para'>
				<p class ='p' style = 'margin-bottom:-100px; right:120px;'><?php echo $resultuser1['childfname']; ?></p><br>

			</div>
				<br>
				

			</div>
					
				
					
			<?php endforeach; ?>
			<?php endforeach; ?>
	</div>
</div><!--here allows the users to send the messages through inputs and a button to send them-->
				<div style = 'display:flex;  border:1px solid black;' id = 'mess'>
					<input type="text" style = 'flex:5; position:relative; left:10px; border:1px solid white; padding-left:5px; ' id = 'messagetab' placeholder="send a message"  >
					<input id ='send' style = 'flex:1; cursor:pointer;'  type = 'button' value = 'send' style = 'flex:4; ' onclick = 'message(event)'/> 
				</div>
</body>			
<script>	
var send = document.getElementById("send");
var messagetab = document.getElementById("messagetab");
messagetab.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("send").click();
  }
  });



</script>

</script>
					   
          <style>
		  
		  #messageright{
			  float:right;
			  margin:10px;
			  display:block;
			  background-color:white;
			  	border-radius: 24px;
border-bottom-right-radius:50%;
border-top-left-radius:50%;
box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
			  
		  }
		  
		  
		  
	  .fileimg{
			  width:20%;
			  position:fixed;
			  left:5px;
			 margin-top:-180px;
			  
			  
		  }
		  
		 	.image1 {
				
				position:relative;
				bottom:130px;
				transition:0.5s ease-in;
				
			
			}
			.image2 {
				
				position:relative;
				bottom:130px;
				right:30px;
				transition:0.5s ease-in;
			
			}
			
			.p{
				
				font-family:quicksand;
				font-weight:bold;
			}
			
			.para{
				position:relative;
				bottom:135px;
				transition:0.5s ease-in;
				
				
			}
			.para1{
				position:relative;
				bottom:130px;
				right:30px;
				transition:0.5s ease-in;
				
			}
			#contactss1{

			  float:right;
			  display:block;
			  background-color:white;
			  	border-radius: 24px;
border-bottom-right-radius:50%;
border-top-left-radius:50%;
box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
			}
			
			
		#messagewrapper{
			
			background-image:url("wallpaper2.jpg");
			background-size:cover;
		}		
			
			
			
			#contactss1:after {

}
.message {
	 word-wrap: break-word;
	position:relative;
	font-family:quicksand;
	font-weight:bold;
	text-align:center;

	width:250px;
	height:80px;
	left:120px;
	top:10px;
}

.child{
	

	 width: 250px;
  height: 60px;

  position: absolute;
  top: 50%;
  left: 0%;
  margin: -25px 40px 0 -80px;

}
.child1{
	

	 width: 250px;
  height: 60px;

  position: absolute;
  top: 50%;
  left: 0%;
  margin: -25px 40px 0 -35px;

}


#secondmessage{

position:relative;
float:right;
z-index:40px;
display:block;
margin-top:-70px;
background: 	white;
	border-radius: 24px;
border-bottom-right-radius:50%;
border-top-left-radius:50%;
box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;



			}
			
			
			
			#secondmessage .image1{
				position:relative;
	color:black;
	margin-top:-5px;
right:15px;
}


			#secondmessage .para .p{
				position:relative;
	color:black;
	margin-top:-5px;
	margin-left:-30px;
}

.messagetab{
	

	height:60px;
	
}
input[type=submit]{
height:60px;
}		
	#messagetab{
		
	height:53px;
	
background-color:black;
color:white;
border:4px solid white;
}	
	</style>
		  
		  