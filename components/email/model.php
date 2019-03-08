<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

	// check if account unit has been configured or not
	function countEmailConfigs() {
		$conn = openCon();
		$sql = "SELECT COUNT(*) count FROM `mail_configs`";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	// retrieve email configs
	function getEmailConfigs() {
		$conn = openCon();
		$sql = "SELECT `id`,
					`email_type`,
					`email_port`, 
					`reply_to`,
					`from_email`,
					`username`, 
					`password`, 
					`host`, 
					`status`, 
					`created_at`, 
					`last_modified_by`
				FROM `mail_configs`";

		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}
	
	// add email configs
	function addEmailConfigs($email_type, $email_port, $reply_to, $from_email, $username, $password, $host) {
		$conn = openCon();
		$created_at = getTime();
		$last_modified_by = $_SESSION['loggedUserId'];
		$status = 1; // 1 = active, 0 = removed
		$sql = "INSERT INTO `mail_configs`(`email_type`, `email_port`, `reply_to`, `from_email`, `username`, `password`, `host`, `status`, `created_at`, `last_modified_by`) 
			VALUES('{$email_type}',
				'{$email_port}',
				'{$reply_to}',
				'{$from_email}',
				'{$username}',
				'{$password}',
				'{$host}',
				{$status},
				'{$created_at}',
				{$last_modified_by})";

		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function updateEmailConfigs($id, $email_type, $email_port, $reply_to, $from_email, $username, $password, $host) {
		$conn = openCon();
		$last_modified_by = $_SESSION['loggedUserId'];

		$sql = "UPDATE `mail_configs`
			SET `email_type` = '{$email_type}', 
				`email_port` = '{$email_port}', 
				`reply_to` = '{$reply_to}', 
				`from_email` = '{$from_email}', 
				`username` = '{$username}', 
				`password` = '{$password}', 
				`host` = '{$host}',
				`last_modified_by` = {$last_modified_by}
			WHERE id = {$id}";

		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}
?>