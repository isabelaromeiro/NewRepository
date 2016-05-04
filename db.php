<?php
    session_start();
    require('constants.php');

    function connect() {
    	$conn = mysqli_connect('localhost', 'proj6', 'brasil2016', 'proj6');
    	if (!$conn ){
    		echo 'erro';
   		}

   		return $conn;
    }
    
    function get_username() {
    	$conn = connect();
    	$sessionEmail = $_SESSION["email"];

    	$result = mysqli_query($conn, "SELECT name FROM user WHERE email = '$sessionEmail'");
    	if (!$result) {
    		echo 'Could not run query: ' . mysql_error();
    		exit;
    	}
    	$row = mysqli_fetch_row($result);
    	
    	return  $row[0];
    }

    function get_id() {
    	$conn = connect();
    	$sessionEmail = $_SESSION["email"];

    	$result = mysqli_query($conn, "SELECT id_user FROM user WHERE email = '$sessionEmail'");
    	if (!$result) {
    		echo 'Could not run query: ' . mysql_error();
    		exit;
    	}
    	$row = mysqli_fetch_row($result);

    	return $row[0];
    }
?>