<?php
	include $_SERVER['DOCUMENT_ROOT']."/".$_SESSION['home']."/config/global_functions.php";

	function localUserLogin($username) {
		$conn = openCon();
		$sql = "SELECT id, username, password, user_role, first_name, last_name FROM users WHERE username='{$username}'";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}
?>