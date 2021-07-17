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
<html lang="en">
<head>
  <title>Pizza House</title>
  <?php include 'links.php' ?>
</head>
<!-- <body id="home" data-spy="scroll" data-target=".navbar-collapse"> -->
<body>
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
					<!-- <li><a href="login.php" ></a></li> -->
				</ul>
			</div>
		</div>
	</div>
	<!-- end navigation -->
<br><br><br><br><br><br>
<div class="container-fluid">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<div class="card">
  <h3 class="card-header bg-white">Account details</h3><br>
  <div class="card-body">


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" id="id" name="id" value="<?php echo $id;?>">

        <div class="form-group col-md-12">
        <h5 class="text-secondary">First Name</h5>
        <input type="text" 
            name="username" 
            class="form-control form-control-lg" 
            value="<?php echo $username; ?>" >
         </div> 
    
      <div class="form-group col-md-12">
      <h5 class="text-secondary">Last Name</h5>
      <input type="text" 
      name="lastname" 
      class="form-control form-control-lg" 
      value="<?php echo $lastname; ?>" >
      </div>

     <div class="form-group col-md-12">
     <h5 class="text-secondary">Email</h5>
      <input type="email" 
      name="email" 
      class="form-control form-control-lg" 
      value="<?php echo $email; ?>" >
     </div>

     <div class="form-group col-md-12">
      <h5 class="text-secondary">Mobile Number</h5>
      <input type="text" 
      class="form-control form-control-lg" 
      name="mobile" 
      value="<?php echo $mobile; ?>">
   </div>
</form><br>
<center><a href="logout.php" >Log Out</a></center>


</div>
</div>  
</div>
<div class="col-md-3"></div>
</div>
</div>

</body>
</html>
