<?php

include 'safety.php';
session_start();
if ($_REQUEST['sendcommand'] === 'sendRequest'){//if the command is the command to send the request
$blocksentto = $_REQUEST['pin']; //the request is being sent to the user with this pin
$blocksentfrom = $_SESSION['pin'];//the request is being from the user logged in here

//these values are sent to the database to create a block statement between users
$sql = "INSERT INTO blockedaccounts(blocksentfrom, blockedsentto) VALUES ('$blocksentfrom','$blocksentto')";

$sql1 = "UPDATE notifications set accepted = 0 where notifications_sentfrom = '$blocksentfrom' AND notifications_sentto = '$blocksentto'";

$sql2 = "UPDATE notifications set accepted = 0 where notifications_sentfrom = '$blocksentto' AND notifications_sentto = '$blocksentfrom'";
//removes the messages after a user has been blocked
$sql3 = "UPDATE message set connection = 1 where senderpin = '$blocksentfrom' AND receiverpin = '$blocksentto'";

$sql4 = "UPDATE message set connection = 1 where senderpin = '$blocksentto' AND receiverpin = '$blocksentfrom'";

if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3) && mysqli_query($conn, $sql4)){
	
	$worked = "request sent";

}
else {
	
	$worked = "Error: " . $sql ."<br>" .mysqli_error($conn);
}









echo $worked;



}

else if($_REQUEST['sendscommand']==='sendRequest'){
     
    
}



























?>