<?php

session_start();
include('connection.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($link,"SELECT * FROM `drinks` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$image = $row['image'];
$price = $row['price'];
$description = $row['description'];
$status = $row['status'];



$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>
<?php 
include 'navbar.php'
 ?>

<div class="container-fluid">

   



<div class="row">
<?php

$result = mysqli_query($link,"SELECT * FROM `drinks`");
while($row = mysqli_fetch_assoc($result)){
		echo "
		<div class='product_wrapper'>
	    <div class='card' style='width: 18rem;'>
        <form method='post' action=''>
	
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img class='card-img-top' src='".$row['image']."' alt='Card image cap'/></div>
			  <div class='name'>".$row['name']."</div>
			  <div class='description'>".$row['description']."</div><br>
		   	<button type='submit' class='buy'>Add ₹ ".$row['price']."</button>
			  
			  </form>
			  </div>
			  
			 </div>";
        }
mysqli_close($link);
?>
</div>
</div>
<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>


