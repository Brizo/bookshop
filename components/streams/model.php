<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

	function getStreams() {
		$conn = openCon();
		$sql = "SELECT `id`, `name`, `description` FROM `streams` WHERE `status` != 0";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function getStreamByField($field, $value) {
		$conn = openCon();

		if ($field == "id") {
			$sql = "SELECT  `id`, `name`, `description`
				FROM `streams`
				WHERE {$field} = {$value}";
		} else {
			$sql = "SELECT  `id`, `name`, `description`
				FROM `streams`
				WHERE {$field} = '{$value}'";
		}
		
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}


	function addStream($name, $description) {
		$conn = openCon();
		$created_at = getTime();
		$last_modified_by = $_SESSION['loggedUserId'];
		$status = 1; // 1 = active, 0 = removed, 3 = replaced
		$sql = "INSERT INTO `streams`(`name`, `description`, `status`, `created_at`, `last_modified_by`) 
			VALUES('{$name}',
				'{$description}',
				{$status},
				'{$created_at}',
				{$last_modified_by})";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function updateStream($id, $name, $description) {
		$conn = openCon();
		$last_modified_by = $_SESSION['loggedUserId'];

		$sql = "UPDATE `streams`
			SET `name` = '{$name}', 
				`description` = '{$description}', 
				`last_modified_by` = {$last_modified_by}
			WHERE id = {$id}";

		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function removeStream($id, $reason) {
		$conn = openCon();
		$sql = "UPDATE `streams` SET `status` = 0, `reason` = '{$reason}' WHERE `id` = {$id}";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}
?>