<?php
class register_login extends general {
	public function register() {
		extract($_POST);
		
		if (empty($fname) || empty($lname) || empty($dob) || empty($pnumber) || empty($address) || empty($email) || empty($pwd)) {
			$this->displayMessage('One or More fields are Empty!!!', 'maroon');
		 if (!is_numeric($pnumber)) {
			$this->displayMessage('Phone Number should have a numeric value', 'maroon');
		} else if (strlen($pnumber) != 11) {
			$this->displayMessage('Phone number Digit is not up to 11', 'maroon');
		} else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			$this->displayMessage('Email Address is not Correct', 'maroon');
		} else if ($this->isExisting('users', 'email', $email) == true) {
			$this->displayMessage('Account already exist', 'maroon');
		} else if (strlen($pwd) < 6) {
			$this->displayMessage('Password is too Short. At least 6 Characters Wanted', 'maroon');
		} else {
		mysql_query("BEGIN");
			$register = mysql_query("INSERT INTO users VALUE (NULL, '".mysql_real_escape_string($fname)."', '".mysql_real_escape_string($lname)."', '".mysql_real_escape_string($dob)."', '".mysql_real_escape_string($pnumber)."', '".mysql_real_escape_string($address)."', '".mysql_real_escape_string($email)."', '".mysql_real_escape_string($pwd)."')");
			$user_id_inserted  = mysql_insert_id(); //collects the id of the query above
			
			
				if ($register) {
					$this->displayMessage('Registration Succesful', 'green');
					$_SESSION['username'] = $fname;
					mysql_query("COMMIT");
					// to redirect..
					//echo '<script type="text/javascript"> self.location = "reservation.php?home" </script>';
				} else {
					mysql_query("ROLLBACK");
					$this->displayMessage('Registration Failed', 'maroon');
				}
		}
		
	}
	
	public function login() {
	extract($_POST);
		if (empty($username) || empty($pwd)) {
			$this->displayMessage('Please fill in a username and a password', 'maroon');
		} else {
			mysql_query("SELECT * FROM users WHERE username = '".mysql_real_escape_string($email)."' AND password = '".mysql_real_escape_string($pwd)."'");
				if (mysql_affected_rows() == 1) {
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
