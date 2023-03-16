<!DOCTYPE HTML>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>





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

$sql4 = "select * from message where senderpin = $sender and receiverpin = $user";
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
$work= "select * from message where messages_id = '$msg_id'";
$c = mysqli_query($conn,$work);
$r = $c->fetch_all(MYSQLI_ASSOC);
?>
<script src= "https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css" integrity="sha512-vEia6TQGr3FqC6h55/NdU3QSM5XR6HSl5fW71QTKrgeER98LIMGwymBVM867C1XHIkYD9nMTfWK2A0xcodKHNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js" integrity="sha512-hkvXFLlESjeYENO4CNi69z3A1puvONQV5Uh+G4TUDayZxSLyic5Kba9hhuiNLbHqdnKNMk2PxXKm0v7KDnWkYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>









			 <?php if (empty($r)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">No Chats Currently</td>
                </tr>
                <?php else: ?>
				<div id = 'messagewrapper' style = ' height:60%; overflow-y:scroll;'>
					
					<?php foreach ($r as $result): ?>
					<div>
			<?php echo  $result['messages_id'];?>
			
					</div>
					

			
			
			
			
			
			
			
			
			
			
			
			 <?php endforeach; ?>
			          <?php endif; ?>
			
					</div>




<div style = 'display:flex;  border:1px solid black;' >

				<input type = 'file' id = 'file' name = 'file' style = ' display:none;'/>
				<label for = 'file'><img src = 'attach.png' style = 'flex:1; width:40px; ' id = 'filetab' class = 'fileimg'/></label>
				 <textarea type="text" style = 'flex:4; position:relative; left:10px; border:1px solid black; padding-left:5px; ' data-emoji-input="unicode" class="form-control" id = 'messagetab' placeholder="Send a message" data-emojiable="true" name = "emoji"></textarea>
				<input style = 'flex:1; cursor:pointer;'  type = 'button' value = 'send' onclick = 'message(event)'/> 
				
					
					</div>
					
	</body>				
					
						 
			        
			  
					  <script>
			$('#messagetab').emojioneArea({
				pickerPosition: 'bottom'
			});
</script>
<style>


#messagetab{
	width:50px;
}
</style>