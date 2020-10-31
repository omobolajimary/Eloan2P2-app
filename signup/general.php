<?php
class general{
	public function databaseConnect() {
		$connection = mysqli_connect('localhost', 'root', '');//connect to the server
		if (!$connection) {
			die('Could not Connect to Server');
		}
		$databaseConnection = mysqli_select_db($connection, 'e_loan_p2p'); // connet to the database
		if (!$databaseConnection) {
			die('Could not Connect to the Database');
		}
	}
	
	/***************************************************************/	
// to check if a field is existing e.g username etc..


	public function isExisting($table, $field, $value) {
		$connection = mysqli_connect('localhost', 'root', '');
		$databaseConnection = mysqli_select_db($connection, 'e_loan_p2p');
		
		mysqli_query($connection, "SELECT * FROM $table WHERE $field = '".$value."'");
		if (mysqli_affected_rows($connection) == 1) {
			return true;
		} else {
			return false;
		}
	}
/***************************************************************/
public function displayMessage($text, $backgroundcolor) {
			echo '<div style="color:#fff; padding:10px; width:60%; margin:0 auto; background-color:'.$backgroundcolor.'; text-align:center; font-size:16px">'.$text.'</div>'; // to display messages
		}
/***************************************************************/	

}

$generalClass = new general; //making a new instance of the class general
@session_start();
?>