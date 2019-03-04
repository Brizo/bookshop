<?php
	include $_SERVER['DOCUMENT_ROOT']."/erp/db/mysql_conn.php";

	function getUsers() {
		$conn = openCon();
		$sql = "SELECT username, role, first_name, last_name FROM users";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}
?>