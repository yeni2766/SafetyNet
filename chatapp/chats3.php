<?php

require 'safety.php';
session_start();
$pin = '';
$sender= '';
if (isset($sender) || isset($pin)){
	
	$sender = $_SESSION['pin'];
$sql = "select * from message WHERE senderpin ='$sender'  order by date asc limit 1";
$data = mysqli_query($conn, $sql);
$row3 = $data->fetch_all(MYSQLI_ASSOC);
	
}

else{
	
	echo"it wasnt found";
}
?>

					
<?php foreach ($row3 as $result): ?>
	<?php $pin = $result['receiverpin']; 
		$sql5 = "select * from users WHERE pin = '$pin'";
		$data5 = mysqli_query($conn, $sql5);
		$row5 = $data5->fetch_all(MYSQLI_ASSOC);
	?>		
			
	<?php foreach ($row5 as $result2): ?>
		<h6 style = 'margin:15px;'>Previous Chats<br><br></h6>
			<div id = 'contactss'  class = 'aa' pin = '<?php echo $result2['pin']; ?>' onclick = "beginchat(event)" >
				<div class = 'image' 'position:relative; bottom:30px;'>
					<img class='rounded-circle' id = 'image'src = "<?php echo $result2['images']; ?>" >
			</div>

						<p class ='recentmessages' style = 'float:right; position:absolute; margin-top:70px; margin-right:50px;'><?php echo $result['messages']; ?></p>
							<div class = 'p'>
								<p class ='p' style = 'margin-bottom:60px; right:120px;'><?php echo $result2['childfname']; ?></p>
							</div>
			</div>
	<?php endforeach; ?>
	<?php endforeach; ?>
			
			    
					  
					  
					  <script>
					  
					  
					  
					  
					  
					  
					  </script>
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
          <style>
		 	.image{
				
				position:relative;
				bottom:20px;
				transition:0.5s ease-in;
			
			}
			
			.p{
				position:relative;
				bottom:20px;
				transition:0.5s ease-in;
				
			}
			
			#contactss{
				height:150px;
				cursor:pointer;
				border:1px solid grey;
				
			}
		  </style>