<?php
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

	function getLoans() {
		$conn = openCon();
		$sql = "SELECT username, user_role, first_name, last_name FROM users";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}
?>