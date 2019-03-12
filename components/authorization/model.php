<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

	function localUserLogin($username) {
		$conn = openCon();
		$sql = "SELECT `id`, `username`, `password`, `user_role`, `first_name`, `last_name` FROM `users` WHERE `username`='{$username}' AND `account_status` != 0";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}
?>