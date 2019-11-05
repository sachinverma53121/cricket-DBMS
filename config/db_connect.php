<?php 
   // MySQLi or PDO 
   // connect to database
	$conn = mysqli_connect('localhost','userTest', 'testuser', 'cricket-mgmt');
	// check connection
	if(!$conn) {
		echo 'Connection Failed <br/>' .mysqli_connect_error();
	}


 ?>