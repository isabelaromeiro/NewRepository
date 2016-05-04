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

    function get_announces() {
    	$conn = connect();
    	$id = get_id();

    	$result = mysqli_query($conn, "SELECT * FROM user natural join product WHERE id_user = '$id'");
    	if (!$result) {
    		echo 'Could not run query: ' . mysql_error();
    		exit;
    	}


    	while ($row = mysqli_fetch_array($result)) {
    		echo $row['title'];
    		
    	}
    }

    function search_result ($search_term) {
        $conn = connect();

        $result = mysqli_query($conn, "SELECT * FROM `product`, `image`, `category`
                                        WHERE (`title` LIKE '%$search_term%'
                                        OR `category` LIKE '%$search_term%')
                                        AND `product`.`id_category` = `category`.`id_category`
                                        AND `product`.`id_image` = `image`.`id_image`");
        if (!$result) {
            echo 'Could not run query: ' . mysql_error();
            exit;
        }


        while ($row = mysqli_fetch_array($result)) {
            echo $row['title'] . "<br/>";
        }

    }

?>




