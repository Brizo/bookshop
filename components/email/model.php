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

	// retrieve account unit information
	function getEmailConfigs() {
		$conn = openCon();
		$sql = "SELECT `id`,
						`email_type`,
						`email_port`, 
						`reply_to`,
						`from_email`,
						`username`, 
						`password`, 
						`website`, 
						`host`, 
						`status`, 
						`created_at`, 
						`last_modified_by`
					FROM mail_configs";

		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}
	
	// add account unit information
	function addAccount($name, $contact_person, $telephone, $fax, $email_address, $website, $postal_address, $physical_address, $username_prefix, $book_circulation) {
		$conn = openCon();
		$created_at = getTime();
		$last_modified_by = $_SESSION['loggedUserId'];
		$status = 1; // 1 = active, 0 = removed
		$sql = "INSERT INTO `account_unit`(`name`, `contact_person`, `telephone`, `fax`, `email_address`, `website`, `postal_address`, `physical_address`, 
			`username_prefix`, `book_circulation`, `status`, `created_at`, `last_modified_by`) 
			VALUES('{$name}',
				'{$contact_person}',
				'{$telephone}',
				'{$fax}',
				'{$email_address}',
				'{$website}',
				'{$postal_address}',
				'{$physical_address}',
				'{$username_prefix}',
				{$book_circulation},
				{$status},
				'{$created_at}',
				{$last_modified_by})";

		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function updateAccount($id, $name, $contact_person, $telephone, $fax, $email_address, $website, $postal_address, $physical_address, $username_prefix, $book_circulation) {
		$conn = openCon();
		$created_at = getTime();
		$last_modified_by = $_SESSION['loggedUserId'];

		$sql = "UPDATE `account_unit`
			SET `name` = '{$name}', 
				`contact_person` = '{$contact_person}', 
				`telephone` = '{$telephone}', 
				`fax` = '{$fax}', 
				`email_address` = '{$email_address}', 
				`website` = '{$website}', 
				`postal_address` = '{$postal_address}',
				`physical_address` = '{$physical_address}',
				`username_prefix` = '{$username_prefix}',
				`book_circulation` = {$book_circulation},
				`created_at` = '{$created_at}', 
				`last_modified_by` = {$last_modified_by}
			WHERE id = {$id}";

		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}
?>