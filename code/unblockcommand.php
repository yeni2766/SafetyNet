<?php

include 'safety.php';
session_start();
if ($_REQUEST['sendscommand'] === 'sendRequest'){//if the command is the command to send the request
$blocksentto = $_REQUEST['pin']; //the request is being sent to the user with this pin
$blocksentfrom = $_SESSION['pin'];//the request is being from the user logged in here


$sql = "UPDATE blockedaccounts set connection = 0 where blocksentfrom = '$blocksentfrom' and blockedsentto = '$blocksentto'";
$sql5 = "UPDATE blockedaccounts set connection = 0 where blocksentfrom = '$blocksentto' and blockedsentto = '$blocksentfrom'";

$sql1 = "UPDATE notifications set accepted = 0 where notifications_sentfrom = '$blocksentfrom' AND notifications_sentto = '$blocksentto'";

$sql2 = "UPDATE notifications set accepted = 0 where notifications_sentfrom = '$blocksentto' AND notifications_sentto = '$blocksentfrom'";

$sql3 = "UPDATE message set connection = 1 where senderpin = '$blocksentfrom' AND receiverpin = '$blocksentto'";

$sql4 = "UPDATE message set connection = 1 where receiverpin = '$blocksentto' AND senderpin = '$blocksentfrom'";








if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3) && mysqli_query($conn, $sql4)&& mysqli_query($conn, $sql5)) {
	
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