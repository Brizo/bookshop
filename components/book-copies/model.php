<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

	function getBookCopies() {
		$conn = openCon();
		$sql = "SELECT C.id, B.name, B.description, C.circulation_date, B.isb, B.year, B.purchase_price, B.levie, B.author, C.bar_code, S.name `state`, CASE WHEN B.status = 1 THEN 'active' ELSE 'replaced' END `status`
			FROM `book_copies` C
			LEFT JOIN books B ON C.book = B.id
			LEFT JOIN book_states S ON S.id = C.state
			WHERE B.status != 0";
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
				WHERE B.{$field} = {$value}";
		} else {
			$sql = "SELECT C.id, B.name, B.description, C.circulation_date, B.isb, B.year, B.purchase_price, B.levie, B.author, C.bar_code, S.name `state`, CASE WHEN B.status = 1 THEN 'active' ELSE 'replaced' END `status`
				FROM `book_copies` C
				LEFT JOIN books B ON C.book = B.id
				LEFT JOIN book_states S ON S.id = C.state
				WHERE B.{$field} = '{$value}'";
		}
		
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	// function getBookCopyByFieldId($field, $value, $id) {
	// 	$conn = openCon();

	// 	if ($field == "id" || $field == "state" || $field == "status" || $field == "last_modified_by") {
	// 		$sql = "SELECT B.id,B.name, B.description, B.circulation_date, B.isb, B.year,B.purchase_price, B.levie, B.author, B.bar_code, S.name `state`, 
	// 				CASE 
	// 					WHEN B.status = 1 THEN 'instock' 
	// 					WHEN B.status = 2 THEN 'loaned'
	// 					WHEN B.status = 3 THEN 'replaced'
	// 					WHEN B.status = 4 THEN 'lost'
	// 					ELSE 'lost' 
	// 				END `status`
	// 			FROM `books` B
	// 			LEFT JOIN book_states S ON B.state = S.id
	// 			WHERE B.{$field} = {$value} AND B.id != {$id}";
	// 	} else {
	// 		$sql = "SELECT B.id, B.name, B.description, B.circulation_date, B.isb, B.year,B.purchase_price, B.levie, B.author, B.bar_code, S.name `state`, CASE WHEN B.status = 1 THEN 'active' ELSE 'replaced' END `status`
	// 			FROM `books` B
	// 			LEFT JOIN book_states S ON B.state = S.id
	// 			WHERE B.{$field} = '{$value}' AND B.id != {$id}";
	// 	}
		
	// 	$result = $conn->query($sql);
	// 	closeCon($conn);
	// 	return $result;
	// }

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

	function removeBook($id, $reason) {
		$conn = openCon();
		$sql = "UPDATE `book_copies` SET `status` = 0, `reason` = '{$reason}' WHERE `id` = {$id}";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}
?>