<?php


require 'safety.php';
session_start();


	
$user['userid'] = null;
if (isset($user)){
	

	$sender = $_SESSION['pin'];
	$user= $_POST["user"];
	$message = $_POST["message"];
$sql = "select * from users WHERE pin ='".$_POST["user"]."' limit 1";
$date = date("Y-m-d H:i:s");
$sqlmessage = "INSERT INTO message(senderpin, receiverpin, messages, date, connection) VALUES ('$sender', '$user', '$message', '$date', '1')";
$result6 = mysqli_query($conn,$sqlmessage);

}
?>

<?php 
$work= "select * from message where senderpin = '$sender'";
$resultmessage = mysqli_query($conn,$work);
$row1 = $resultmessage->fetch_all(MYSQLI_ASSOC);

$userdetails= "select * from users where pin = '$sender'";
$resultuser = mysqli_query($conn,$userdetails);
$row2 = $resultuser->fetch_all(MYSQLI_ASSOC);

$leftmessage = "select * from message where senderpin = '".$_POST["user"]."'";
$resultleftmessage = mysqli_query($conn,$leftmessage);
$row3 = $resultleftmessage->fetch_all(MYSQLI_ASSOC);

$userreceiver= "select * from users where pin = '".$_POST["user"]."'";
$resultreceiver = mysqli_query($conn,$userreceiver);
$row4 = $resultreceiver->fetch_all(MYSQLI_ASSOC);





?>


				
				
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
					
					<!-- images!-->
					
								   <?php endforeach; ?>
				<?php endforeach; ?>
			
				
				</div>
				<div style = 'display:flex;  border:1px solid black;' id = 'mess'>

			
				 <input type="text" style = 'flex:4; position:relative; left:10px; border:1px solid white; padding-left:5px; ' id = 'messagetab' placeholder="send a message"  >
				<input style = 'flex:1; cursor:pointer;'  type = 'button' value = 'send' style = 'flex:4;  ' onkeyup = 'message(event)'/> 
				
					
					</div>
					
					
		<script>
	
 setInterval(function(){
if (selecteduser != ""){
		
			 $.post("chats1.php", {user: selecteduser}, function(result){
    $("#chats").html(result);
});
		
	}
  },6000)
</script>

					
				
					
					
				<?php

				function generated_string($length){//this is to generate the messagesid so messages can be grouped between two users
	$array = array(0,1,2,3,4,5,6,7,8,9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
	$generatedtext = '';
	$length = rand(4,$length);//rand will be used to generate 4 and the length
	
	for ($i=0; $i<$length; $i++ ){
		
		$randomizednumber = rand(0,61);
		$generatedtext .= $array[$randomizednumber];
		
		
		
	}
	
	
	return $generatedtext;
	
}
	

?>				
					
			 
					  
					  
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
				position:relative;

			height:100px;
			
  top:20px;
background: white;
	border-radius: 24px;
border-bottom-left-radius:50%;
border-top-right-radius:50%;
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
				float:right;
		
 margin-top:-70px;
background: 	white;
	border-radius: 24px;
border-bottom-right-radius:50%;
border-top-left-radius:50%;
box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;




			}
				#messagetab{
		
	height:53px;
	
background-color:black;
color:white;
border:4px solid white;
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
		input[type=text]{
background-color:black;
color:white;
border:4px solid white;
}	
	</style>
		  
		  