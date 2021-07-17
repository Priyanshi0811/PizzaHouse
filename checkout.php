<?php
session_start();
include 'connection.php';
?>
<?php
    $email=$_SESSION['email'];
		
		$query="select * from user where email='$email'";
		$result= mysqli_query($link,$query);
		$row=mysqli_fetch_array($result);
	  $id=$row["id"];
	  $username=$row["username"];
		$lastname=$row["lastname"];
		$address=$row["address"];
		$mobile=$row["mobile"];
		$city=$row["city"];
		
?>



<!DOCTYPE html>
<html>
<head>
<title>Pizza House</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include 'links.php'; ?>
<link rel='stylesheet' href='css/checkout.css' type='text/css' media='all' />

</head>

<nav class="navbar fixed-top navbar-light bg-white">
  <div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon icon-bar"></span>
					<span class="icon icon-bar"></span>
					<span class="icon icon-bar"></span>
</a>
				
				<img src="images/logo6.jpg" id="log" class="navbar-brand smoothScroll"></img>
      </div>
  </div>
</nav> 
<body>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <div class="row">
          <div class="col-50">
            <h3>Secure Checkout</h3>
            <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
            <label for="username"><i class="fa fa-user"></i>First</label>
            <input type="text" id="username" name="username" value="<?php echo $username;?>">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" value="<?php echo $email;?>">
            <label for="adr"><i class="fa fa-address-card-o"></i> Where should we deliver it</label>
            <input type="text" id="adr" name="address" value="<?php echo $address;?>">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" value="<?php echo $city;?>">

            <div class="row">
              <div class="col-50">
                <label for="mobile"><i class="fa fa-phone"></i>Contact Number</label>
                <input type="text" id="mobile" name="mobile"value="<?php echo $mobile;?>">
              </div>
            </div>
          </div>
      
    

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>

            <label for="cardname">Name on Card</label>
            <input type="text" name="cardname" placeholder="">


            <label for="creditcardnum">Credit card number</label>
            <input type="text"  name="creditcardnum" placeholder="1111-2222-3333-4444">

            <label for="expmonth">Exp Month</label>
            <input type="text" name="expmonth" placeholder="">

            <div class="row">

              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text"  name="expyear" placeholder="">
              </div>

              <div class="col-50">
                <label for="cvv">cvv</label>
                <input type="text" name="cvv" placeholder="Your cvv Number">
              </div>

            </div>

          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Place Your Order" class="btn" name="submit">
      </form>
    </div>
  </div>
  
</div>

</body>
</html>
<?php
if(isset($_POST['submit'])){
  $id=$_POST['id'];
	$cardname=$_POST['cardname'];
	$creditcardnum=$_POST['creditcardnum'];
	$expmonth=$_POST['expmonth'];
	$expyear=$_POST['expyear'];
	$cvv=$_POST['cvv'];


  //insert query  
  $insertquery = "INSERT INTO checkout(id,cardname,creditcardnum,expmonth,expyear,cvv) values('$id','$cardname','$creditcardnum','$expmonth','$expyear','$cvv')";

  $result = mysqli_query($link,$insertquery);
  if ($result) {
    ?>
    <script>alert("Payment Done");</script>
    <?php
  }else{
  ?>
  <script>alert("Payment Not DOne");</script>
  <?php
}
}

?>

