<?php
require 'safety.php';
session_start();
$pin3 = $_SESSION['pin'];
$pin = $_REQUEST["search"];
$sql = "select * from users WHERE pin ='".$_POST["search"]."' AND NOT pin  = '".$_SESSION["pin"]."'";

$pin1 = $pin;
$data = mysqli_query($conn, $sql);

if (mysqli_num_rows($data)> 0)
{
// this will then display it in the table
 echo '<h4 align = "center">Search Result</h4>';
 echo  '<table class="table">
  <thead class="thead">
    <tr>

      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">PIN</th>
	  <th scope="col">Parent\'s Phone Number</th>
	  <th scope = "col">ADD</th>
	
    </tr>
  </thead>';
  
  while($row = mysqli_fetch_array($data))
	 

  {
	 echo
	   "
<tr>
<td>" .$row ['childfname']."</td>
<td>" .$row ['childlname']."</td>
<td>" .$row['pin']."</td>	
<td>" .$row['phone_number']."</td>	



<td><button type='button' class='btn btn-primary' id = 'requestbutton'>Send Friend Request</button></td>



</tr>



";
	  
  }

}

else {
echo "no records found";
}








?>

<script>
var pin1 = "<?php echo $pin; ?>";
//variable of the user pin
//the code activates when the parent clicks the button to send friend request
$('#requestbutton').on('click', function(){
//it passes the pin through to a new page that's waiting for a specific action and it will create a notification to the other user
$.post(`command.php?sendscommand=sendRequest&pin=${pin1}`,function(response){
	if(response == 'request sent'){
$('#requestbutton').hide();
alert('the request has been sent');		
		
	}
	
	
	
	
})
	
	











})


</script>