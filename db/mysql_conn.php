<?php

	function openCon() {
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$db = "book_shop_dev";

		$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);
		return $conn;
	}
	
	function closeCon($conn) {
		$conn -> close();
	}
   
?>