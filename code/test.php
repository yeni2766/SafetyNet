<?php

				 
function generated_string($length){
	$array = array(0,1,2,3,4,5,6,7,8,9, "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
$pinrandom = '';
	$length = rand(8,$length);//rand will be used to generate 4 and the length
	
	for ($i=0; $i<=$length; $i++ ){
		
		$randomizednumber = rand(0,36);
		$pinrandom.= $array[$randomizednumber];
		
		
		
	}
	
	
	return $pinrandom;

	
}
$pin = generated_string(8);
$body = "Hi there, 

Thanks for signing up with us. From now this will be your personal email where we will send you regular updates about changes coming to safetynet, different ideas and we will be looking for your feedback to improve this chatting application for your child and the world. The next email you will be receiving will be the PIN that both you and your child will be sharing together on the platform. 



Thank you from all of us from Safetynet,
 
Safetynet
 
 ";
mail('yeni8200@gmail.com','Account Creation', "$body", 'From:yeni8200@gmail.com');
mail('yeni8200@gmail.com','Your PIN number', "$pin", 'From:yeni8200@gmail.com')
?>