
<?php
session_start();
	// create the database connection
	require_once 'safety.php';
$pin = $_SESSION['pin'];
$notificationsquery = "SELECT * from notifications WHERE notifications_sentto = '$pin' and accepted = 'N/A'";
$result = mysqli_query ($conn, $notificationsquery);
$row = $result->fetch_all(MYSQLI_ASSOC);
?>







<!DOCTYPE HTML>
<html lang = "en">
<head>
<title>
Dashboard
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel ="stylesheet" href ="dashboard.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/7f07b22bb3.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/duotone.css" integrity="sha384-R3QzTxyukP03CMqKFe0ssp5wUvBPEyy9ZspCB+Y01fEjhMwcXixTyeot+S40+AjZ" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline"></script>

</head>

<body>


<script>



</script>

<div class = "wrapper">
	<!--sidebar here -->
	
	<nav id ="sidebar" class="sidebar">
		 <a href="javascript:void(0)" class="closemenubutton" onclick="closemenu()">&times;</a>
		<div class= "sidebar-header">
			<h4 style = "color:#FAD02C  ;">SafetyNet</H4>
			</div>
<div id = "links">
 <a href="parentsdashboard.php">Back</a>

</div>
</div>
</nav>





<div id ="dashboardcontent">
<div class = "container-fluid">



 <button class="openmenubutton" onclick="openmenu()" id = "openbutton">&#9776; </button><h4 class ="h4">Dashboard </h4>


<div class = "container">
<div class ="row">


<div class ="col-md-10 shadow-sm p-3 bg-light bb" style = "height:400px;" id = "chartscreen">
<h1 class="display-4">Notifications</h1>


<div class="card" style="width: 500px; height:170px;">
  <div class="card-body">
    <h5 class="card-title">Friend Request</h5>
	 <?php if (empty($row)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You currently do not have a friend request</td>
                </tr>
                <?php else: ?>
				 <?php foreach ($row as $result): ?>
	   <?php echo $result['message']; ?>
	   <form method ="POST" action = "friends.php">
         <input type = "submit" class="btn btn-primary" value = "accept" name = "accept"/>
                <input type = "submit" class="btn btn-primary" value = "reject" name = "reject"/>
				</form>
				
				  <?php endforeach; ?>
                <?php endif; ?>
  </div>
</div>









		


		</div>
		</div>
</div>






</div>




</div>


</div>










</div>



















</div>





<script>
//this passes the information through to ajax
$(document).ready(function(){
	$('#search_text').keyup(function(){
		var friendpin = $(this).val();
	if (friendpin != '')
	{
		$.ajax({
			url: "search.php",
			method: "post",
			data:{search:friendpin},
			dataType:"text",
			success:function(data)
			{
				$('#friendtable').html(data);
				
			}
		
		
	});
	}
		
	});
});

function sendscommand(constant, pin){
$.post(`command.php?sendscommand=sendRequest&pin=${pin}`,function(response){
	if(response == 'request sent'){
$('#requestbutton').hide();
alert('the request has been sent');		
		
	}
	
	
	
	
})
	
	
}











function openmenu() {
  document.getElementById("sidebar").style.width = "250px";
      document.getElementById("sidebar").style.visibility = "visible";
	   document.getElementById("openbutton").style.visibility = "hidden";
  document.getElementById("dashboardcontent").style.marginLeft = "250px";
  document.getElementByClassName("nav").style.width = "0px";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closemenu() {
      document.getElementById("openbutton").style.visibility = "visible";
  document.getElementById("sidebar").style.width = "0";
    document.getElementById("sidebar").style.visibility = "hidden";
	
  document.getElementById("dashboardcontent").style.marginLeft = "0";
 
}


















</script>



</body>
















</html>

<style>


 
	
	

@media only screen and (max-width:400px){
	
	.chartbox{
		width:250px;
		height:25%;
		
		
	}
	
	
}




.brand{
position:relative;
top:10px;
height:50px;
font-family:quicksand;
padding-bottom:30px;
}

#sidebar{
transition:width 1s;

}
.row {

	padding:50px 0px 0px 50px;
	
}
.chart-container{
	position:relative;
	left:50px;
	
	
}
.aa{
position:relative;

	box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
}
.bb {



}
@media (max-width: 767px) {
 
  .aa {
    border-bottom: 1px solid black !important;
  }
#sidebar{
visibility:hidden;

}
#dashboardcontent{
margin-left : 0px;

}

#openbutton{

visibility:visible;
}
}
#sidebar .closemenubutton{

	position: absolute;
  top: 0;
  right: 5px;
  font-size: 36px;
  margin-left: 50px;
	text-decoration:none;
	
}
.table{
	position:relative;
	top:50px;
	
	
	
}
.openmenubutton {
visibility:hidden;
  font-size: 20px;
  cursor: pointer;
background-color:transparent;
  color: black;
  padding: 20px 15px;
  border: none;
}
#dashboardcontent {
  transition: margin-left 1s; 
  padding: 20px;
}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
body{
	
	overflow-x:hidden
}
.table{
	top:40px;


}

.links .a:hover{
	background-color:white;
	color:black;
		border-left:5px solid purple;
}
.sidebar a {
  padding: 8px 8px 8px 32px;
  position:relative;
  top:130px;
  text-decoration: none;
  font-size: 20px;
  font-family:quicksand;
  font-weight:bold;
  color: white;
  display: block;
  transition: 0.4s;
}
#links a:hover{
	 text-decoration: none;
		background-color:white;
	border-left:5px solid #FAD02C;
	color:black;
}

.h4{
	margin-left:45px;
	

	color:black;
	
	
}

.thead{
	

	background-color:#FAD02C;
	
	
}

.accept {
	
	
	float:right;
	
}
.card{
	
	width:300px;
}

.cardtext{
	
	
	
}



.reject{
	
	
	positive:relative;
	margin-left:300px;
}
#sidebar {
width:250px;
height:100%;
position:fixed;
background-color:black;
left:0;
border-right:1px solid #d3d3d3;
box-shadow: 0px 0px 5px 0px rgb(211,211,211);
}
</style>