<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

	function getBookCopies() {
		$conn = openCon();
		$sql = "SELECT C.id, B.name, B.description, C.circulation_date, B.isb, B.year, B.purchase_price, B.levie, B.author, C.bar_code, S.name `state`, CASE WHEN B.status = 1 THEN 'active' ELSE 'replaced' END `status`
			FROM `book_copies` C
			LEFT JOIN books B ON C.book = B.id
			LEFT JOIN book_states S ON S.id = C.state
			WHERE C.status NOT IN (0,4)";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function getFBookCopies() {
		$conn = openCon();
		$sql = "SELECT C.id, B.name, B.description, C.circulation_date, B.isb, B.year, B.purchase_price, B.levie, B.author, C.bar_code, S.name `state`, CASE WHEN B.status = 1 THEN 'active' ELSE 'replaced' END `status`
			FROM `book_copies` C
			LEFT JOIN books B ON C.book = B.id
			LEFT JOIN book_states S ON S.id = C.state
			WHERE C.status = 1";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function getBookCopyByField($field, $value) {
		$conn = openCon();

		if ($field == "id" || $field == "state" || $field == "status" || $field == "last_modified_by") {
			$sql = "SELECT C.id, B.name, B.description, C.circulation_date, B.isb, B.year, B.purchase_price, B.levie, B.author, C.bar_code, S.name `state`, CASE WHEN B.status = 1 THEN 'active' ELSE 'replaced' END `status`
					FROM `book_copies` C
					LEFT JOIN books B ON C.book = B.id
					LEFT JOIN book_states S ON S.id = C.state
					WHERE C.{$field} = {$value}";
		} else {
			$sql = "SELECT C.id, B.name, B.description, C.circulation_date, B.isb, B.year, B.purchase_price, B.levie, B.author, C.bar_code, S.name `state`, CASE WHEN B.status = 1 THEN 'active' ELSE 'replaced' END `status`
				FROM `book_copies` C
				LEFT JOIN books B ON C.book = B.id
				LEFT JOIN book_states S ON S.id = C.state
				WHERE C.{$field} = '{$value}'";
		}
		
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function addBookCopy($book, $bar_code, $state, $circulation_date) {
		$conn = openCon();
		$created_at = getTime();
		$last_modified_by = $_SESSION['loggedUserId'];
		$status = 1; // 1 = active/instock, 0 = removed, 2 = loaned, 3 = replaced, 4 = lost 
		$sql = "INSERT INTO `book_copies`(`book`, `bar_code`, `state`, `circulation_date`, `status`, `created_at`, `last_modified_by`) 
			VALUES('{$book}',
				'{$bar_code}',
				{$state},
				'{$circulation_date}',
				{$status},
				'{$created_at}',
				{$last_modified_by})";

		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function updateBookCopy($id, $bar_code, $state, $status) {
		$conn = openCon();
		$last_modified_by = $_SESSION['loggedUserId'];

		$sql = "UPDATE `book_copies`
			SET `bar_code` = '{$bar_code}', 
				`state` = {$state},
				`status` = {$status}, 
				`last_modified_by` = {$last_modified_by}
			WHERE id = {$id}";

		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function removeBookCopy($id, $reason) {
		$conn = openCon();
		$sql = "UPDATE `book_copies` SET `status` = 0, `reason` = '{$reason}' WHERE `id` = {$id}";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function replaceBookCopy($id, $replaced_with, $reason, $replaced_by) {
		$conn = openCon();
		$created_at = getTime();
		$last_modified_by = $_SESSION['loggedUserId'];
		$sql = "UPDATE `book_copies` SET `status` = 3, `reason` = '{$reason}' WHERE `id` = {$id}";
		$sql2 = "INSERT INTO `replaced_books`(`orignal`,`replaced_with`,`replaced_by`,`created_at`,`reason`,`last_modified_by`) 
				VALUES (
					{$id},
					{$replaced_with},
					{$replaced_by},
					'{$created_at}',
					'{$reason}',
					{$last_modified_by},
				)";

		$sql3 = "UPDATE `book_loans` 
					SET `book` = $replaced_with 
					WHERE `book` = {$id}";
				
		$result1 = $conn->query($sql);
		$result2 = $conn->query($sql2);
		$result3 = $conn->query($sql3);
		
		closeCon($conn);
		return $result2;
	}
?>