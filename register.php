<?php

// Include config file
require_once "connection.php";
 
// Define variables  with empty values
$username = $lastname = $email= $password = $confirm_password = $address = $state = $city = $mobile = "";
$username_err = $lastname_err = $email_err = $password_err = $confirm_password_err = $address_err = $state_err = $city_err = $mobile_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
    } else{
        // query for checking email alerady exits or not
        $sql = "SELECT id FROM user WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // store result 
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";     
    } else{
        $username = trim($_POST["username"]);
    }
       // Validate lastname
       if(empty(trim($_POST["lastname"]))){
        $lastname_err = "Please enter a lastname.";     
    } else{
        $lastname = trim($_POST["lastname"]);
    }
         // Validate address
         if(empty(trim($_POST["address"]))){
            $address_err = "Please enter a address.";     
        } else{
            $address = trim($_POST["address"]);
        }
          // Validate state
          if(empty(trim($_POST["state"]))){
            $state_err = "Please enter a state.";     
        } else{
            $state = trim($_POST["state"]);
        }
          // Validate city
          if(empty(trim($_POST["city"]))){
            $city_err = "Please enter a city.";     
        } else{
            $city = trim($_POST["city"]);
        }
          // Validate mobile
          if(empty(trim($_POST["mobile"]))){
            $mobile_err = "Please enter a mobile.";     
        } else{
            $mobile = trim($_POST["mobile"]);
        }
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) &&empty($lastname_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($address_err) && empty($state_err) && empty($city_err) && empty($mobile_err) ){
        
        // insert query
        $sql = "INSERT INTO user (username,lastname,email, password,address,state,city,mobile ) VALUES (?,?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_username,$param_lastname,$param_email, $param_password, $param_address, $param_state, $param_city, $param_mobile);
            
            // Set parameters
            $param_username = $username;
            $param_lastname = $lastname;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_address = $address;
            $param_state = $state;
            $param_city = $city;
            $param_mobile = $mobile;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: welcome.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>New Pizza House</title>
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
					<li><a href="login.php" >Sign In</a></li>
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
<div class="card"><br>
  <h3 class="card-header bg-white">Add your details</h3><br>
  <div class="card-body">


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <div class="form-row">

        <div class="form-group col-md-6">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
        <h5 class="text-secondary">First Name</h5>
        <input type="text" 
            name="username" 
            class="form-control form-control-lg" 
            value="<?php echo $username; ?>" 
            placeholder="First Name">
       <span class="help-block"><?php echo $username_err; ?></span>
       </div> 
      </div>


      <div class="form-group col-md-6">
      <div class="form-group <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">
      <h5 class="text-secondary">Last Name</h5>
      <input type="text" 
      name="lastname" 
      class="form-control form-control-lg" 
      value="<?php echo $lastname; ?>" 
      placeholder="Last Name">
      <span class="help-block"><?php echo $lastname_err; ?></span>
      </div> 
    </div>

  </div>
  <div class="form-row">
    <div class="form-group col-md-6 <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
    <h5 class="text-secondary">Email</h5>
      <input type="email" 
      name="email" 
      class="form-control form-control-lg" 
      value="<?php echo $email; ?>" 
      placeholder="you@gmail.com">
      <span class="help-block"><?php echo $email_err; ?></span>
    </div>

    <div class="form-group col-md-3 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
      <h5 class="text-secondary">Password</h5>
      <input type="password"
       name="password" 
       class="form-control form-control-lg"
       value="<?php echo $password; ?>" 
       placeholder="Password">
      <span class="help-block"><?php echo $password_err; ?></span>
    </div>

    <div class="form-group col-md-3 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
    <h5 class="text-secondary">Confirm Password</h5>
    <input type="password" 
    name="confirm_password" 
    class="form-control form-control-lg" 
    value="<?php echo $confirm_password; ?>">
    <span class="help-block"><?php echo $confirm_password_err; ?></span>
    </div>

  </div>


    <div class="form-group  col-md-12<?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
    <h5 class="text-secondary">Address</h5>
    <input type="text" 
    class="form-control form-control-lg" 
    name="address" 
    value="<?php echo $address; ?>" 
    placeholder="1234 Main St">
    <span class="help-block"><?php echo $address_err; ?></span> 
    </div>

    <div class="form-row">
    
    <div class="form-group col-md-4 <?php echo (!empty($state_err)) ? 'has-error' : ''; ?>" >
      <h5 class="text-secondary" >State</h5>
      <input type="text" 
      class="form-control form-control-lg" 
      name="state" 
      value="<?php echo $state; ?>">
       <span class="help-block"><?php echo $state_err; ?></span> 
    </div>

    <div class="form-group col-md-4 <?php echo (!empty($city_err)) ? 'has-error' : ''; ?>" >
      <h5 class="text-secondary" >City</h5>
      <input type="text" 
      class="form-control form-control-lg" 
      name="city" 
      value="<?php echo $city; ?>" >
       <span class="help-block"><?php echo $city_err; ?></span>   
      </div>

    <div class="form-group col-md-4 <?php echo (!empty($mobile_err)) ? 'has-error' : ''; ?>" >
      <h5 class="text-secondary">Mobile Number</h5>
      <input type="text" 
      class="form-control form-control-lg" 
      name="mobile" 
      value="<?php echo $mobile; ?>">
      <span class="help-block"><?php echo $mobile_err; ?></span> 
    </div>

  </div>
  <!-- <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" >
      <label class="form-check-label">I Agree
    </div>
  </div> -->
  <div class="form-group">
  <button type="submit" 
  name="submit" 
  class=" form-control form-control-lg btn btn btn-warning"
  >Create Account</button>
  </div>

</form>
<h5 class="text-center text-dark">By creating this account you agree to our <a class="text-warning">terms & condition</a> and <a class="text-warning">privacy policy</a> . </h5>
</div>
</div>  
</div>

<div class="col-md-3"></div>
</div>
</div>

</body>
</html>
