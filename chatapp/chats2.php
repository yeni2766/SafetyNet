
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

$sql4 = "select * from message where senderpin or receiverpin = $sender and receiverpin = $user";
$result5 = mysqli_query($conn,$sql4);

$msg_id = '';
$row2 = mysqli_fetch_assoc($result5);

 $msg_id =  
        $row2['messages_id'];
}
else{
	
	echo"it wasnt found";
}
?>
<?php 
$work= "select * from message where senderpin = '".$_POST["user"]."'";
$c = mysqli_query($conn,$work);
$r = $c->fetch_all(MYSQLI_ASSOC);


$sql5 = "select * from users where pin = '$sender'";
$dataright = mysqli_query($conn,$sql5);
$row11 = $dataright->fetch_all(MYSQLI_ASSOC);

$sql = "select * from users WHERE pin ='".$_POST["user"]."'";
$data = mysqli_query($conn, $sql);
$row = $data->fetch_all(MYSQLI_ASSOC);


$sqlmessageleft = "select * from message WHERE senderpin ='".$_POST["user"]."'";
$dataleft= mysqli_query($conn, $sqlmessageleft);
$row10 = $dataleft->fetch_all(MYSQLI_ASSOC);

$sqlmessageright = "select * from message WHERE senderpin ='$sender' ORDER BY date ASC";
$dataright= mysqli_query($conn, $sqlmessageright);
$row10 = $dataright->fetch_all(MYSQLI_ASSOC);
?>
<body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js" integrity="sha512-hkvXFLlESjeYENO4CNi69z3A1puvONQV5Uh+G4TUDayZxSLyic5Kba9hhuiNLbHqdnKNMk2PxXKm0v7KDnWkYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src= "https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css" integrity="sha512-vEia6TQGr3FqC6h55/NdU3QSM5XR6HSl5fW71QTKrgeER98LIMGwymBVM867C1XHIkYD9nMTfWK2A0xcodKHNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.textcomplete/1.8.5/jquery.textcomplete.min.js" integrity="sha512-7DIA0YtDMlg4BW1e0pXjd96R5zJwK8fJullbvGWbuvkCYgEMkME0UFfeZIGfQGYjSwCSeFRG5MIB5lhhEvKheg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/emojione/2.0.0/assets/css/emojione.min.css"/>

			 <div id = 'messagewrapper' style = ' height:500px; overflow-y:scroll; '>
					<?php foreach ($r as $result): ?>
					<?php foreach ($row as $result1): ?>
					<div id = 'contactss1'  class = 'bb' style = 'float:left; margin:20px;' >
		
				<div class = 'message'>
				
			<div class = 'child1'>	<?php echo  $result['messages'];?>
			
			
			</div>
					
					</div>
					<span style = 'position:relative; left:25px; bottom: 5px;'> <small><?php echo $result['date']; ?></small></span>
				<div class = 'image1'>
	<img class="img-thumbnail" style = 'right:120px; border:1px solid black; 'id = 'image'src = "<?php echo $result1['image']; ?>" >
	</div>

	<div class = 'para'>
	<p class ='p' style = 'margin-bottom:-100px; right:120px;'><?php echo $result1['childfname']; ?></p><br>

					</div>
				<br>
				

					</div>
					<?php endforeach; ?>
								  <?php endforeach; ?>
					
					<?php foreach ($row10 as $result2): ?>
					<?php foreach ($row11 as $result3): ?>
					
				<div id = 'secondmessage'  class = 'bb' style = 'float:right; margin:10px;' >
								<div class = 'message'>
					<div class = 'child'>	<?php echo  $result2['messages'];?>
			</div>
					</div>
					<span style = 'position:relative; left:-50px; bottom: 5px;'> <small><?php echo $result2['date']; ?></small></span>
				<div class = 'image2'>
	<img class='img-thumbnail' style = 'left:160px; bottom:30px; width:15%; border:1px solid black; 'id = 'image'src = "<?php echo $result3['image']; ?>" >
	</div>
	<div class = 'para1'>
	<p class ='p' style = ' left:160px; '><?php echo $result3['childfname']; ?></p><br>

					</div>
					</div>
				
				  <?php endforeach; ?>
				    <?php endforeach; ?>
			          
			
				
				
				</div>
				
					
					
				

				
					
				
				<div id='mess'><?php include_once "chats1.php"; ?></div>
					
				
			
					
					
					
						 
			        
			  
					  
</body>				


					   
          <style>
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
				position:relative;

			height:100px;
			display:block;
  top:20px;
background: white;
	border-radius: 24px;
border-bottom-left-radius:50%;
border-top-right-radius:50%;
box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px, rgb(51, 51, 51) 0px 0px 0px 3px;
			}
			
			
		#messagewrapper{
			
			background-image:url("wallpaper1.jpg");
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
				float:right;
		
 margin-top:-70px;
background: 	#FAD02C;
	border-radius: 24px;
border-bottom-right-radius:50%;
border-top-left-radius:50%;
box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px, rgb(51, 51, 51) 0px 0px 0px 3px;




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
	
	</style>
		  
		  