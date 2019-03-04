<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

	function getSubjects() {
		$conn = openCon();
		$sql = "SELECT  `name`, `description` FROM `subjects` WHERE `status` != 0";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function getSubjectByField($field, $value) {
		$conn = openCon();

		if ($field == "id") {
			$sql = "SELECT `name`, `description`
				FROM `subjects`
				WHERE {$field} = {$value}";
		} else {
			$sql = "SELECT `name`, `description`
				FROM `subjects`
				WHERE {$field} = '{$value}'";
		}
		
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}


	function addSubject($name, $description) {
		$conn = openCon();
		$created_at = getTime();
		$last_modified_by = $_SESSION['loggedUserId'];
		$status = 1; // 1 = active, 0 = removed, 3 = replaced
		$sql = "INSERT INTO `subjects`(`name`, `description`, `status`, `created_at`, `last_modified_by`) 
			VALUES('{$name}',
				'{$description}',
				{$status},
				'{$created_at}',
				{$last_modified_by})";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function updateSubject($id, $name, $description) {
		$conn = openCon();
		$last_modified_by = $_SESSION['loggedUserId'];

		$sql = "UPDATE `subjects`
			SET `name` = '{$name}', 
				`description` = '{$description}', 
				`last_modified_by` = {$last_modified_by}
			WHERE id = {$id}";

		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function removeBook($id, $reason) {
		$conn = openCon();
		$sql = "UPDATE `subjects` SET `status` = 0, `reason` = '{$reason}' WHERE `id` = {$id}";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}
?>