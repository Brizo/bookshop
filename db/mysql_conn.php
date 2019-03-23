<?php

	function openCon() {
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$db = "book_shop_dev";

		// $dbhost = "localhost";
		// $dbuser = "sinawete_bookshop";
		// $dbpass = "P@ssw0rd@2019";
		// $db = "sinawete_bookshop_dev";

		$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
		return $conn;
	}

	function openIntCon() {
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$db = "book_shop_dev";

		$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
		return $conn;
	}
	
	function closeCon($conn) {
		$conn->close();
	}

	function closeIntCon($conn) {
		$conn->close();
	}
   
?>