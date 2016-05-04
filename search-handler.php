<?php 
	session_start();
	require_once("db.php");
	require_once("utils.php");
	require_once("header.php");

	$search_term = $_GET["srch-term"];

	search_result($search_term);
?>


<?php require_once("footer.php"); ?>