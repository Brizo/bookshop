<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

	function getLogs() {
		$conn = openCon();
		$sql = "SELECT L.action, L.description, L.created_at, L.updated_at, CONCAT(U.first_name,' ', U.last_name, ' - ', U.username) `by` 
            FROM `logs` L LEFT JOIN `users` U ON L.last_modified_by = U.id";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}
?>