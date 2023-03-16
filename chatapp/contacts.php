<?php

include('safety.php');
	session_start();
	// Select query to fetch the phone names and prices onto the chart
	$sql = "select * from notifications WHERE notifications_sentto ='".$_SESSION['pin']."' OR notifications_sentto ='".$_SESSION['pin']."' and accepted = 1";
	$result1 = mysqli_query($conn, $sql);
	$row1 = mysqli_fetch_assoc($result1);
	
$sentfrom = $row1 ['notifications_sentfrom'];

$sql1 = "select * from users where pin = '$sentfrom'";
$data = mysqli_query($conn, $sql1);
$row = $data->fetch_all(MYSQLI_ASSOC);

	

	
?>
<style>

.hh:hover{

	
	transform:translateY(20px);

}
	.hh{
			transition: 0.5s ease;
		cursor:pointer;
	}

</style>


	<?php foreach ($productitem as $product): ?>
	<div class ='column1'>
	<div class = 'productimages'>
    <img src="<?=$product['img']?>" class = 'small' width="300" height="450"  alt="<?=$product['name']?>">
    </div >
</div>
	<div class = 'column1'>
	<div class = 'productinfo'>
        <h1 class="productname"><?=$product['name']?></h1>
        <span class="price">
            &pound;<?=$product['price']?>
         
        </span>
	</div>
	
	<div class = 'productform'>
		<div class = 'form'>
        <form action="index.php?page=shoppingcartpage" method="post" class = "form2">
         <span class = 'Quantity'>Qty:</span>   <input type="number" name="quantityofitem" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="productid" value="<?=$product['id']?>"><br>
			<br>
			 <span class = 'Size'>Size:</span><select name="option" id="selectsize">
			 <option value="" selected disabled hidden>Select a size</option>
			<option value="1">Small</option>
			<option value="2">Medium</option>
			<option value="3">Large</option>
		</select>
		<div class = 'buttons'>
		<div class = 'addbutton'>
            <input type="submit" class = "formbtn" value="Add To Cart">
        </form>
		</div>
		
		  <form action="index.php?page=wishinglist" method="post">
           <input type="hidden" name="quantityofitem" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="productid" value="<?=$product['id']?>">
			<br>
			<div class ='wishlist'>
            <input type="submit" value="Add To Wishing List" class = 'wishinglist'>
        </form>
		</div>
</div>
<hr class = 'buttonline' style = 'position:relative; left:1080px; width:550px; bottom:330px; border:1px solid #f4f0ec;'>

        <div class="descriptionofitem">
            <?=$product['desc']?>
			
		</div>
        </div>
		</div>
    </div>
	     <?php endforeach; ?>


<?php if (empty($row)): ?>

                <tr>
                    <td colspan='5' style='text-align:center;'>You currently have no friends</td>
                </tr>
                <?php else: ?>
<?php foreach ($row as $result): ?>

<div id = 'contact' style = 'text-align:center;' class = 'hh' pin = '<?php echo $result['pin']; ?>' onclick = "beginchat(event)">
	<img class='rounded-circle' src = "<?php echo $result['images']; ?>" />
	<p><?php echo $result['childfname']; ?></p>
	</div><br>
	
	
				  <?php endforeach; ?>
                <?php endif; ?>
<script>
setTimeout(function(){
   window.location.reload(1);
}, 5000);

</script>
	



