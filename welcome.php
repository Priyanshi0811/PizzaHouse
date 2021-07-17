<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Pizza House</title>
  <?php include 'links.php'; ?>
 
</head>
<body id="home" data-spy="scroll" data-target=".navbar-collapse">


	<!-- start navigation -->
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon icon-bar"></span>
					<span class="icon icon-bar"></span>
					<span class="icon icon-bar"></span>
				</button>
				
				<img src="images/logo6.jpg" class="navbar-brand smoothScroll"></img>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
          <li><a href="userdetails.php">Hi, <?php echo htmlspecialchars($_SESSION["email"]); ?></a></li>
					<li></li>
          
				</ul>
			</div>
		</div>
	</div>
    <!-- end navigation -->
	<!-- start flexslider -->
	<div class="flexslider">
		<ul class="slides">
			<li>
				<img src="images/slider-img1.jpg" alt="Pizza Image 1">
				<div class="flex-caption">
					<h2 class="slider-title">PIZZA MAKES ANYTHING POSSIBLE.</h2>
					<h3 class="slider-subtitle">Fresh, clean, and delicious.</h3>
          <p class="slider-description">Next time you’re trying to express your love for pizza.</p>
          
				</div>
			</li>
			<li>
				<img src="images/slider-img2.jpg" alt="Pizza Image 2">
				<div class="flex-caption">
					<h2 class="slider-title">PIZZA MAKES ANYTHING GREAT.</h2>
					<h3 class="slider-subtitle">Premium Quality, Finest Ingredients</h3>
					<p class="slider-description">THERE’S NO BETTER FEELING IN THE WORLD THAN A WARM PIZZA BOX IN YOUR LAP..</p>
				</div>
			</li>
		</ul>
	</div>
	<!-- end flexslider -->
	<br><br><br>
  <div class="container">
  <a href="order.php" name="submit" class=" form-control btn btn-warning">Order Now</a>
  </div>
	<!-- inculde  contact file-->

  <?php	include 'aboutShop.php'; ?>
  

	<!-- start gallery -->
	<section id="gallery" class="templatemo-section templatemo-light-gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="text-center text-uppercase">Our Most Popular Pizzas</h2>
					<hr>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="gallery-wrapper">
						<img src="images/gallery-img1.jpg" class="img-responsive gallery-img" alt="Pizza 1">
						<div class="gallery-des">
							<h3>Neapolitan Pizza</h3>
							<h5>close-up view of slice of Neapolitan pizza with cheese, sliced tomatoes, and basil
								Neapolitan is the original pizza. This delicious pie dates all the way back to 18th century in Naples, Italy. .</h5>
						</div>
					</div>
				</div>	
				<div class="col-md-4 col-sm-4">
					<div class="gallery-wrapper">
						<img src="images/gallery-img2.jpg" class="img-responsive gallery-img" alt="Pizza 2">
						<div class="gallery-des">
							<h3>Chicago Pizza</h3>
							<h5>Generally, the toppings for Chicago pizza are ground beef, sausage, pepperoni, onion, mushrooms, and green peppers, placed underneath the tomato sauce. </h5>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="gallery-wrapper">
						<img src="images/gallery-img3.jpg" class="img-responsive gallery-img" alt="Pizza 3">
						<div class="gallery-des">
							<h3>New York-Style Pizza</h3>
							<h5>slice of New York style pizza slightly lifted out of pizza pie With its characteristic large, foldable slices and crispy outer crust, New York-style pizza is one of America’s most famous regional pizza types.</h5>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="gallery-wrapper">
						<img src="images/gallery-img4.jpg" class="img-responsive gallery-img" alt="Pizza 4">
						<div class="gallery-des">
							<h3>Greek Pizza</h3>
							<h5>Greek pizza on pizza peel with tomatoes, garlic, and greens in background
								Greek pizza was created by Greek immigrants who came to America and were introduced to Italian pizza. </h5>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="gallery-wrapper">
						<img src="images/gallery-img5.jpg" class="img-responsive gallery-img" alt="Pizza 5">
						<div class="gallery-des">
							<h3>California Pizza</h3>
							<h5>
								California pizza on wooden table with tomatoes, garlic, mushroom, and pepper next to it 
								California pizza, or gourmet pizza, is known for its unusual ingredients</h5>
						</div>
					</div>
				</div>				
			</div>
		</div>
	</section>
	<!-- end gallery -->

	<!-- inculde  contact file-->

	<?php

	include 'contact.php';
?>
	<!-- end contact -->

	<!-- include footer file -->
	<?php

	include 'footer.php';
?>
	<!-- end footer -->

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/smoothscroll.js"></script>
	<script src="js/custom.js"></script>

</body>
</html>
 
    <!-- <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p> -->
