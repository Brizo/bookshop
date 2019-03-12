<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

	function getUsers() {
		$conn = openCon();
		$sql = "SELECT username, role, first_name, last_name FROM users";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}
?>