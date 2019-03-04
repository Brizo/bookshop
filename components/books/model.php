<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

	function getBooks() {
		$conn = openCon();
		$sql = "SELECT B.id, B.name, B.description, B.isb, B.year, B.author, B.bar_code, S.name `state`, CASE WHEN B.status = 1 THEN 'active' ELSE 'replaced' END `status`
			FROM `books` B
			LEFT JOIN book_states S ON B.state = S.id
			WHERE B.status != 0";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function getBookByField($field, $value) {
		$conn = openCon();

		if ($field == "id" || $field == "state" || $field == "status" || $field == "last_modified_by") {
			$sql = "SELECT B.id,B.name, B.description, B.isb, B.year, B.author, B.bar_code, S.name `state`, CASE WHEN B.status = 1 THEN 'active' ELSE 'replaced' END `status`
				FROM `books` B
				LEFT JOIN book_states S ON B.state = S.id
				WHERE B.{$field} = {$value}";
		} else {
			$sql = "SELECT B.id, B.name, B.description, B.isb, B.year, B.author, B.bar_code, S.name `state`, CASE WHEN B.status = 1 THEN 'active' ELSE 'replaced' END `status`
				FROM `books` B
				LEFT JOIN book_states S ON B.state = S.id
				WHERE B.{$field} = '{$value}'";
		}
		
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function getBookByFieldId($field, $value, $id) {
		$conn = openCon();

		if ($field == "id" || $field == "state" || $field == "status" || $field == "last_modified_by") {
			$sql = "SELECT B.id,B.name, B.description, B.isb, B.year, B.author, B.bar_code, S.name `state`, CASE WHEN B.status = 1 THEN 'active' ELSE 'replaced' END `status`
				FROM `books` B
				LEFT JOIN book_states S ON B.state = S.id
				WHERE B.{$field} = {$value} AND B.id != {$id}";
		} else {
			$sql = "SELECT B.id, B.name, B.description, B.isb, B.year, B.author, B.bar_code, S.name `state`, CASE WHEN B.status = 1 THEN 'active' ELSE 'replaced' END `status`
				FROM `books` B
				LEFT JOIN book_states S ON B.state = S.id
				WHERE B.{$field} = '{$value}' AND B.id != {$id}";
		}
		
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function addBook($name, $description, $isb, $year, $author, $bar_code, $state) {
		$conn = openCon();
		$created_at = getTime();
		$last_modified_by = $_SESSION['loggedUserId'];
		$status = 1; // 1 = active/instock, 0 = removed, 2 = loaned, 3 = replaced, 4 = lost 
		$sql = "INSERT INTO `books`(`name`, `description`, `isb`, `year`, `author`, `bar_code`, `state`, `status`, `created_at`, `last_modified_by`) 
			VALUES('{$name}',
				'{$description}',
				'{$isb}',
				'{$year}',
				'{$author}',
				'{$bar_code}',
				{$state},
				{$status},
				'{$created_at}',
				{$last_modified_by})";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function updateBook($id, $name, $description, $isb, $year, $author, $bar_code, $state) {
		$conn = openCon();
		$created_at = getTime();
		$last_modified_by = $_SESSION['loggedUserId'];

		$sql = "UPDATE `books`
			SET `name` = '{$name}', 
				`description` = '{$description}', 
				`isb` = '{$isb}', 
				`year` = '{$year}', 
				`author` = '{$author}', 
				`bar_code` = '{$bar_code}', 
				`state` = {$state}, 
				`created_at` = '{$created_at}', 
				`last_modified_by` = {$last_modified_by}
			WHERE id = {$id}";

		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function removeBook($id, $reason) {
		$conn = openCon();
		$sql = "UPDATE `books` SET `status` = 0, `reason` = '{$reason}' WHERE `id` = {$id}";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}
?>