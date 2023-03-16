<?php
$yeni = 'hii';


echo'
<button class="btn btn-success reject" onclick = "requestcommand(1, \.'$yeni8200.')">Accept</button>
<button class ="btn btn-danger accept" onclick = "requestcommand(1, 2)">Reject</button>';

?>
<script>
function requestcommand(type, sentrequest){
	
	
	alert(sentrequest);
}


</script>