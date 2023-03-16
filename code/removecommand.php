<?php

include 'safety.php';
session_start();
if ($_REQUEST['sendcommand'] === 'sendRequest'){//if the command is the command to send the request
$notifications_sentto = $_REQUEST['pin']; //the request is being sent to the user with this pin
$notifications_sentfrom = $_SESSION['pin'];//the request is being from the user logged in here


//set the connection between the users to blocked
$sql1 = "UPDATE notifications set accepted = 2 where notifications_sentfrom = '$notifications_sentfrom' AND notifications_sentto = '$notifications_sentto'";

$sql2 = "UPDATE notifications set accepted = 2 where notifications_sentfrom = '$notifications_sentto' AND notifications_sentto = '$notifications_sentfrom'";








if ( mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
	
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