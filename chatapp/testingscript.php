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

$m = generated_string(61)
?>


<?php 

$result3 = mysqli_query($conn,$sql3);
$row1 = $result3->fetch_all(MYSQLI_ASSOC);
$count = count($result3);
if(!empty($count) || $count==1)
{
	$msg_id = $row1['messages_id'];
	$sqlmessage = "INSERT INTO message(senderpin, receiverpin, messages, date, messages_id) VALUES ('$sender', '$user', '$message', '$date', '$msg_id')";

if (isset($result3))
{
	
	
}
else{
	
	echo 'error';
}
	echo 'success';
}else{
	$query = "INSERT INTO message(senderpin, receiverpin, messages, date, messages_id) VALUES ('$sender', '$user', '$message', '$date', '$messages_id')";
	$result4 = mysqli_query($query);
	if (isset($result4))
	{
		echo 'success';
	}
	
	else{
		
		echo 'failed';
	}
	
}
}



?>

$sql3 = "select * from message where senderpin = $sender and receiverpin = $user";
$result3 = mysqli_query($sql3);
$row3 = mysqli_fetch_assoc($result3);