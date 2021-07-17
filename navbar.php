<!-- <?php
// Initialize the session
session_start();



// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if(!empty($_SESSION["shopping_cart"])) {
  $cart_count = count(array_keys($_SESSION["shopping_cart"]));
  
  }
   

?> -->
<html>
<head>
<title>Pizza House</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/product.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel='stylesheet' href='css/cart.css' type='text/css' media='all' />
  <style>
    
#min_price{
background: #F68B1E;
/* background:orange; */
border-radius: 8px;
height: 10px;
width: 150px;
margin-top: 8px;
outline: none;
transition: background 300ms ease-in;
-webkit-appearance: none;
}
  </style>

</head>
<body>
<div>

<nav class="navbar fixed-top navbar-light bg-white">
  <div class="container">
			<div class="navbar-header">
				<a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon icon-bar"></span>
					<span class="icon icon-bar"></span>
					<span class="icon icon-bar"></span>
</a>
				
				<img src="images/logo6.jpg" id="log" class="navbar-brand smoothScroll"></img>
      </div>
      <form >
		      
      <div class="cart_div">
<a href="cart.php">
<img src="cart-icon.png" style=" width: 30px;height: 28px;"/> Your Basket
<span style="width: 20px;height: 20px;text-align: center;"><?php echo $cart_count;?></span></a>
</div>
      <a href="userdetails.php" class="font-weight-bold text-warning">Hi, <?php echo htmlspecialchars($_SESSION["email"]); ?></a>
    </form>
  </div>
</nav> <br><br><br> <br><br><br> 
<div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <a class="navbar-brand text-warning" href="deals.php">Deals</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link font-weight-bold text-warning" href="order.php">Pizzas</a>
      <a class="nav-item nav-link font-weight-bold text-warning" href="sides.php">Sides</a>
      <a class="nav-item nav-link font-weight-bold text-warning" href="desserts.php">Desserts</a>
      <a class="nav-item nav-link font-weight-bold text-warning " href="drinks.php">Drinks</a>
      <a class="nav-item nav-link">  
<input type="range" min="100" max="600" step="100" value="50000" id="min_price" name="min_price" />  
<span class="font-weight-bold text-warning" id="price_range"></span>  
</a>  

    </div>
  </div>
</nav> 
</div>

  <!-- end navigation -->
  
</div>
</body>
</html>