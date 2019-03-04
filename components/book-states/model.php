<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

	function getBookStates() {
		$conn = openCon();
		$sql = "SELECT id, name FROM book_states";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}
?>