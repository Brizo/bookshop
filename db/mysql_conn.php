<?php
	if (session_id() == ''){
		session_start();
	}
	
	function openCon() {
		if ($_SESSION['instance'] == "Development") {
			$dbhost = "localhost";
			$dbuser = "admin";
			$dbpass = "P@ssw0rd";
			$db = "book_shop_dev";
		} else if ($_SESSION['instance'] == "Training") {
			$dbhost = "localhost";
			$dbuser = "admin";
			$dbpass = "P@ssw0rd";
			$db = "book_shop_trn";
		} else {
			$dbhost = "localhost";
			$dbuser = "bookshop";
			$dbpass = "P@ssw0rd@2019";
			$db = "book_shop_prd";
		}
		
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