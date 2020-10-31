<?php
class register_login extends general {
	public function register() {
		extract($_POST);
		$connection = mysqli_connect('localhost', 'root', '', 'e_loan_p2p');
		
		if (empty($fname) || empty($lname) || empty($dob) || empty($pnumber) || empty($address) || empty($email) || empty($pwd)) {
			$this->displayMessage('One or More fields are Empty!!!', 'maroon');
		} else if (!is_numeric($pnumber)) {
			$this->displayMessage('Phone Number should have a numeric value', 'maroon');
		} else if (strlen($pnumber) != 11) {
			$this->displayMessage('Phone number Digit is not up to 11', 'maroon');
		} else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			$this->displayMessage('Email Address is not Correct', 'maroon');
		} else if ($this->isExisting('users', 'email', $email) == true) {
			$this->displayMessage('Email already exist', 'maroon');
		} else if (strlen($pwd) < 6) {
			$this->displayMessage('Password is too Short. At least 6 Characters Wanted', 'maroon');
		} else {
		mysqli_query($connection, "BEGIN");
			//$register = "INSERT INTO users (first_name, surname,date_of_birth,phone_number,address,email,password) 
			//VALUES ('fname', 'lname', 'dob', 'pnumber', 'address', 'email', 'pwd')";
			//if(mysqli_query($connection, $register)){
			//	$this->displayMessage('Registration Succesful', 'green');
			//} else {
			//	echo "Error: " . $register . "" . mysqli_error($connection);
			//}
			//$connection->close();
			$dob = date('Y-m-d',strtotime($_POST['dob']));
			$register = mysqli_query($connection, "INSERT INTO users VALUE (NULL, '".mysqli_real_escape_string($connection, $fname)."', '".mysqli_real_escape_string($connection, $lname)."', '".mysqli_real_escape_string($connection, $dob)."', '".mysqli_real_escape_string($connection, $pnumber)."', '".mysqli_real_escape_string($connection, $address)."', '".mysqli_real_escape_string($connection, $email)."', '".mysqli_real_escape_string($connection, $pwd)."')");
			$user_id_inserted  = mysqli_insert_id($connection); //collects the id of the query above
			
				if ($register) {
					$this->displayMessage('Registration Succesful', 'green');
					//$_SESSION['username'] = $fname;
					mysqli_query($connection, "COMMIT");
					// to redirect..
					//echo '<script type="text/javascript"> self.location = "login.php" </script>';
				} else {
					mysqli_query($connection, "ROLLBACK");
					$this->displayMessage('Registration Failed', 'maroon');
				}
		}
		
	}
	
	public function login() {
	extract($_POST);
		if (empty($username) || empty($pwd)) {
			$this->displayMessage('Please fill in a username and a password', 'maroon');
		} else {
			mysqli_query($connection, "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($connection, $email)."' AND password = '".mysqli_real_escape_string($connection, $pwd)."'");
				if (mysqli_affected_rows($connection) == 1) {
					$this->displayMessage('Login Succesfull', 'green');
					$_SESSION['username'] = $fname;
					echo '<script type="text/javascript"> self.location = "reservation.php?home" </script>';
				} else {
						$this->displayMessage('Incorrect Username or password', 'maroon');
				}
		}
	}

}
//$this->displayMessage('register', 'red');
$reglog = new register_login;
?>
