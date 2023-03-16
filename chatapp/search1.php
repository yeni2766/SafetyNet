<?php
require 'safety.php';
session_start();
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
      <th scope="col">UserID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">PIN</th>
	  <th scope = "col">ADD</th>
	
    </tr>
  </thead>';
  
  while($row = mysqli_fetch_array($data))
	 

  {
	 echo
	   "
<tr>
<td>" .$row ['id']."</td>
<td>" .$row ['childfname']."</td>
<td>" .$row ['childlname']."</td>
<td>" .$row['pin']."</td>	



<td><button type='button' class='btn btn-primary' id = 'requestbutton'>Add Friend</button></td>



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
$('#requestbutton').on('click', function(){
$.post(`command.php?sendscommand=sendRequest&pin=${pin1}`,function(response){
	if(response == 'request sent'){
$('#requestbutton').hide();
alert('You have sent a friend request!! To begin chatting, please get your friend\'s parents to approve this request!!!!');		
		
	}
	
	
	
	
})
	
	











})


</script>