<?php require_once('general.php');
$generalClass->databaseConnect();
require ('register_login.php');
?>
<!DOCTYPE html>
<head><link rel="stylesheet" href="signup.css"

</head>
<body>
<div class="container">
	<div class="header">
		<h2>Create Account</h2>
	</div>
	
	<?php
		if (isset($_POST['register'])) {
			$reglog->register();
		}
		
		?>
		
	<form class="form" id="form" method="post" action="signupform.php">
		<div class="form-control">
			<label>First Name</label>
			<input type="text"placeholder="Enter First Name" name="fname" value="<?php echo @$_POST['fname'] ?>">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<div class="form-control">
			<label>Last Name</label>
			<input type="text"placeholder="Enter Last Name" name="lname" value="<?php echo @$_POST['lname'] ?>">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<div class="form-control">
			<label>Date of Birth </label>
			<input type="text"placeholder="mm/dd/yyyy" name="dob" value="<?php echo @$_POST['dob'] ?>">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<div class="form-control">
			<label>Phone Number</label>
			<input type="number_format" placeholder="08000000000" name="pnumber" value="<?php echo @$_POST['pnumber'] ?>">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<div class="Address">
			<label>Address</label>
			<input type="text"placeholder="Enter Your Address " name="address" value="<?php echo @$_POST['address'] ?>">
			
			
		</div>

		<div class="form-control">
			<label>Email</label>
			<input type="email"placeholder="johndoe@domain.com" name="email" value="<?php echo @$_POST['email'] ?>">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		
		<div class="form-control">
			<label>Password</label>
			<input type="password"placeholder="password" name="pwd" value="<?php echo @$_POST['pwd'] ?>">
			<i class="fa-check-circle"></i>
			<i class="fa-exclamation-circle"></i>
			<small>Error message</small>
		
		</div>
		<p> By creating an account with us you agree to our Terms and Conditions</p>
		<button type="submit" class="button" name="register">Register</button>
		
	</form>
</div>
</body>
</html>                                                     