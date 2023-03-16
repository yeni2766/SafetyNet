<?php
error_reporting(0);

require 'safety.php';
session_start();

$user['userid'] = null;
if (isset($user)){
	$user = $_POST["user"];
$sql = "select * from users WHERE pin ='".$_POST["user"]."'";
$data = mysqli_query($conn, $sql);
$row = $data->fetch_all(MYSQLI_ASSOC);
}
else{
	
	echo"it wasnt found";
}


?>
			 <?php if (empty($row)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">No Chats Currently</td>
                </tr>
                <?php else: ?>
					<div id = 'contactss'  class = 'aa' >
					<?php foreach ($row as $result): ?>
				<div class = 'image'>
	<img class='rounded-circle' id = 'image'src = "<?php echo $result['images']; ?>" >
	</div>
	<div class = 'p'>
	<p class ='p' style = 'margin-bottom:70px; right:120px;'><?php echo $result['childfname']; ?></p>
					</div>
					</div>
			   <?php endforeach; ?>
			          <?php endif; ?>
					  
					  
					  <script>
					  
					  
					  
					  
					  
					  
					  </script>
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
          <style>
		  #contactss{
			  
			  border:1px solid grey;
			  height:150px;
		  }
		  .aa {
		vertical-align:top;
		display:block;
		border-bottom:1px solid #A8A8A8;
		height:100px;
	}
	
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
				cursor:pointer;
				
			}
		  </style>