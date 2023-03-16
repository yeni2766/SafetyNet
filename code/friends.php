<?php

session_start();
include 'safety.php';

$requestsentto = $_SESSION['pin'];
//this is for the accepted friend code
$sql = "UPDATE notifications set accepted = 1 where notifications_sentto = '$requestsentto'";

$sql3 = "select * from notifications where notifications_sentto = '$requestsentto'  ";

$result1= mysqli_query($conn, $sql3);
$row1 = mysqli_fetch_assoc($result1);


$sentto = '';
if (isset($sentto)){
$sentto = $row1['notifications_sentfrom'] ;
}
$sql1 = "INSERT into notifications (notifications_sentfrom, notifications_sentto, accepted, message) VALUES ('$requestsentto', '$w', 1, 'You are now friends')";

//this is for the rejected friend code

$sql3 = "UPDATE notifications set accepted = 2 where notifications_sentto = '$requestsentto'";

$result2= mysqli_query($conn, $sql3);



if(isset($_POST['accept'])){
	
	
	if ( mysqli_query($conn, $sql) &&  mysqli_query($conn, $sql1) ){
  echo "You have accepted the request";
} else {
  echo "Error updating record: " . $conn->error;
}
}
if(isset($_POST['reject'])){
	
	
	if ( mysqli_query($conn, $sql3) ){
  echo "You have rejected the request";
} else {
  echo "Error updating record: " . $conn->error;
}

		
	










}






$conn->close();




?>