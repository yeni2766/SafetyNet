<?php

include 'safety.php';
session_start();
if ($_REQUEST['sendscommand'] === 'sendRequest'){//if the command is the command to send the request
$requestsentto = $_REQUEST['pin']; //the request is being sent to the user with this pin
$requestsentfrom = $_SESSION['pin'];//the request is being from the user logged in here
//stores the friendrequest to the database
$sql = "INSERT INTO friendstable(sending_from, sending_to) VALUES ('$requestsentfrom','$requestsentto')";
//extracting data to make the message
$requestsentfrom_firstname = "SELECT childfname from users WHERE pin = '$requestsentfrom'";
$requestsentto_firstname = "SELECT childfname from users WHERE pin = '$requestsentto'";

$result1 = mysqli_query($conn,$requestsentfrom_firstname);
$result2 = mysqli_query($conn,$requestsentto_firstname);

$row1 = mysqli_fetch_assoc($result1);
$row2 = mysqli_fetch_assoc($result2);
//the message is created
 $message =  
        $row1['childfname']. ' sent '. 'your child '. $row2['childfname']. ' a request' ;

//the notifications is created and this is sent to the database
$notifications = "INSERT INTO notifications (notifications_sentfrom, notifications_sentto, message) VALUES ('$requestsentfrom','$requestsentto', '$message')";


if (mysqli_query($conn, $sql) && mysqli_query($conn, $notifications)) {
	
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