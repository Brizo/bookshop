<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

	function getUsers() {
		$conn = openCon();
		$sql = "SELECT `id`, `first_name`, `middle_name`, `last_name`, `username`, `user_role`, `account_status`,
				CASE 
					WHEN account_status = 1 THEN 'active' 
					WHEN account_status = 2 THEN  'disabled' 
					ELSE 'removed' 
				END `statusName`,
				CONCAT(`first_name`,' ',`middle_name`,' ', `last_name`) `name`
			FROM `users`
			WHERE `account_status` != 0";

		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function getUserByField($field, $value) {
		$conn = openCon();

		if ($field == "id" || $field == "account_status" || $field == "last_modified_by") {
			$sql = "SELECT `id`, `first_name`, `middle_name`, `last_name`, `username`, `user_role`, `account_status`,
					CASE 
						WHEN account_status = 1 THEN 'active' 
						WHEN account_status = 2 THEN  'disabled' 
						ELSE 'removed' 
					END `statusName`
				FROM `users`
				WHERE {$field} = {$value} AND `account_status` != 0";
		} else {
			$sql = "SELECT `id`, `first_name`, `middle_name`, `last_name`, `username`, `user_role`, `account_status`,
					CASE 
						WHEN account_status = 1 THEN 'active' 
						WHEN account_status = 2 THEN  'disabled' 
						ELSE 'removed' 
					END `statusName`
				FROM `users`
				WHERE {$field} = '{$value}' AND `account_status` != 0";
		}
		
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function addUser($first_name, $middle_name, $last_name, $username, $password, $user_role) {
		$conn = openCon();
		$created_at = getTime();
		$password_last_modified = getTime();
		$last_modified_by = $_SESSION['loggedUserId'];
		$account_status = 1; // 1 = active, 0 = removed, 2 = disabled
		$password_status = 1; // 1 = ok, 0 = needs to be changed
		$sql = "INSERT INTO `users`(`first_name`, `middle_name`, `last_name`, 
				`username`, `password`, `user_role`, `account_status`, `password_status`, 
				`password_last_modified`, `created_at`, `last_modified_by`) 
			VALUES('{$first_name}',
				'{$middle_name}',
				'{$last_name}',
				'{$username}',
				'{$password}',
				'{$user_role}',
				{$account_status},
				{$password_status},
				'{$password_last_modified}',
				'{$created_at}',
				{$last_modified_by})";

		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function updateUser($id, $first_name, $middle_name, $last_name, $user_role, $account_status) {
		$conn = openCon();
		$last_modified_by = $_SESSION['loggedUserId'];

		$sql = "UPDATE `users`
			SET `first_name` = '{$first_name}', 
				`middle_name` = '{$middle_name}', 
				`last_name` = '{$last_name}', 
				`user_role` = '{$user_role}',
				`account_status` = '{$account_status}',
				`last_modified_by` = {$last_modified_by}
			WHERE id = {$id}";

		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function removeUser($id, $reason) {
		$conn = openCon();
		$sql = "UPDATE `users` SET `account_status` = 0, `reason` = '{$reason}' WHERE `id` = {$id}";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}
?>