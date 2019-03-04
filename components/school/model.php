<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

	function countAccount() {
		$conn = openCon();
		$sql = "SELECT COUNT(*) count FROM `account_unit`";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
    }
?>