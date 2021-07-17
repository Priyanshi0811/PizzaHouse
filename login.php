
<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "connection.php";
 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, email, password FROM user WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if email exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if email doesn't exist
                    $email_err = "No account found with that email.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
  <title>Pizza House</title>
  <?php include 'links.php' ?>
</head>
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
					<li><a href="" ></a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- end navigation -->
<br><br><br><br><br><br>
<div class="container-fluid">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
<div class="card"><br>
  <h3 class="card-header bg-white">Sign In</h3><br>
  <div class="card-body">

  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

  <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
    <h5 class="text-secondary">Email address</h5>
    <input type="email" 
    class="form-control form-control-lg" 
    name="email"  
    value="<?php echo $email; ?>" 
    placeholder="you@gmail.com">
    <span class="help-block"><?php echo $email_err; ?></span> 
  </div>


  <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
    <h5 class="text-secondary">Password</h5>
    <input type="password" 
    class="form-control form-control-lg" 
    name="password" 
    placeholder="Password">
    <span class="help-block"><?php echo $password_err; ?></span>
  </div>


  <div class="form-group">
  <button type="submit" 
  name="submit" 
  class=" form-control btn btn btn-warning"  
  value="Login">Sign In
 </button>
  </div>


  <div class="form-group">
  <button type="submit" 
  name="submit" 
  class=" form-control btn btn btn-warning"  
  value="reset">Forget Password
  </button>
  </div>

  
</form>
</div>
</div>  
</div>
<div class="col-md-4"></div>
</div>
</div>
</body>
</html>