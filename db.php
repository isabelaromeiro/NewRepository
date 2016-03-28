<?php
	require('constants.php');
	
	$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	function getUserName($email) {
		echo SERVERNAME;
		echo $conn;
		$result = mysqli_query($conn, "SELECT name FROM user WHERE email = '$email'");
		echo $result;
		if (!$result) {
			echo 'Could not run query: ' . mysql_error();
			exit;
		}
		$row = mysqli_fetch_row($result);
	
	echo $row[0];
	}

?>

