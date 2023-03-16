<?php
session_start();
$datatype = '';
if (isset($_POST['data_type'])){
	
	$datatype = $_POST['data_type'];
	
}


$destination = '';
if (isset($_FILES['file']) && $_FILES['file']['name'] != ""){
	if ($_FILES['file']['error'] == 0{
		$folder = "uploads/";
		if (!file_exists($folder)){
			mkdir ($folder, 0777, true);
			
			
		}
		
		$destination = $folder .$_FILES['file']['name'];
		move_uploaded_file($_FILES['file']['tmp_name'], $destination);
		alert("image was sent");
		
		
		
		
		
		
	}
	
	
	
	
	
	
	
	
	
}

if ($datatype == "sendingimages"){
	if ($destination != ""){
		
		alert("hello");
	}
	
	
}























?>