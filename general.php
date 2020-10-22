<?php
class general{
	public function databaseConnect(){
		$connection = mysql_connect('localhost','root','root');
		if (!$connection){
			die('could not connect to server');
		}
		$databaseConnection = mysql_select_db('e_loan_p2p');
		if (!$databaseConnection){
			die('could not connect to database');
		}
	}
}
?>