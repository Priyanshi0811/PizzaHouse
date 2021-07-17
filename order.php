
<?php

session_start();
include('connection.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($link,"SELECT * FROM `products` WHERE `code`='$code'");
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
<div id="product_loading"> 
<?php
 
$result = mysqli_query($link,"SELECT * FROM `products` ORDER BY price desc");
if(mysqli_num_rows($result) > 0)  
{ 
while($row = mysqli_fetch_assoc($result)){
		echo "
		<div class='product_wrapper'>
	    <div class='card' style='width: 18rem;'>
        <form method='post' action=''>
	
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img class='card-img-top' src='".$row['image']."' alt='Card image cap'/></div>
			  <div class='name'>".$row['name']."</div>
			  <div class='description'>".$row['description']."</div><br>
			  <select class='sel form-control' id='mySelect' onChange='myFunction()'>
              <option value='Add ₹ 400'>Medium Pan</option>
              <option value='Add ₹ 300 '>Small Pan</option>
              <option value='Add ₹ 500 '>Large Pan</option>
              </select>
		   	<button type='submit' id='val' onclick='myFunction()' class='buy'>Add ₹ ".$row['price']."</button>
			  
			  </form>
			  </div>
			  
			 </div>";
		}
	}
mysqli_close($link);
?>
</div>
</div>
</div>
<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>


</div>

</body>

</html>
<script>  
 $(document).ready(function(){  
      $('#min_price').change(function(){  
           var price = $(this).val();  
           $("#price_range").text("Product under Price Rs." + price);  
           $.ajax({  
                url:"load_product.php",  
                method:"POST",  
                data:{prices:price},  
                success:function(data){  
                     $("#product_loading").fadeIn(500).html(data);  
                }  
           });  
      });  
 });  

    function myFunction() {
      var x = document.getElementById("mySelect").value;
      document.getElementById("val").innerHTML = x;
    }
 
 </script>  