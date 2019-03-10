<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

	function getBooks() {
		$conn = openCon();
		$sql = "SELECT B.id, B.name, B.description, B.isb, B.year, B.purchase_price, B.levie, B.author, Count(S.book) copies,  
			CASE 
				WHEN B.status = 1 THEN 'active' 
				ELSE 'obsolete' 
			END `status`
			FROM `books` B
			LEFT JOIN book_copies S ON B.id = S.book
			WHERE B.status != 0
			GROUP BY (B.id)";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function getBookByField($field, $value) {
		$conn = openCon();

		if ($field == "id" || $field == "state" || $field == "status" || $field == "last_modified_by") {
			$sql = "SELECT B.id,B.name, B.description, B.isb, B.year,B.purchase_price, B.levie, B.author, 
				CASE 
					WHEN B.status = 1 THEN 'active' 
					ELSE 'obsolete' 
				END `status`
				FROM `books` B
				LEFT JOIN book_copies S ON B.id = S.book
				WHERE B.{$field} = {$value}";
		} else {
			$sql = "SELECT B.id, B.name, B.description, B.isb, B.year,B.purchase_price, B.levie, B.author, 
				CASE 
					WHEN B.status = 1 THEN 'active' 
					ELSE 'obsolete' 
				END `status`
				FROM `books` B
				LEFT JOIN book_copies S ON B.id = S.book
				WHERE B.{$field} = '{$value}'";
		}
		
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function getBookByFieldId($field, $value, $id) {
		$conn = openCon();

		if ($field == "id" || $field == "state" || $field == "status" || $field == "last_modified_by") {
			$sql = "SELECT B.id,B.name, B.description, B.isb, B.year,B.purchase_price, B.levie, B.author,
					CASE 
						WHEN B.status = 1 THEN 'instock' 
						WHEN B.status = 2 THEN 'loaned'
						WHEN B.status = 3 THEN 'replaced'
						WHEN B.status = 4 THEN 'lost'
						ELSE 'lost' 
					END `status`
				FROM `books` B
				LEFT JOIN book_copies S ON B.id = S.book
				WHERE B.{$field} = {$value} AND B.id != {$id}";
		} else {
			$sql = "SELECT B.id, B.name, B.description, B.isb, B.year,B.purchase_price, B.levie, B.author, CASE WHEN B.status = 1 THEN 'active' ELSE 'replaced' END `status`
				FROM `books` B
				LEFT JOIN book_copies S ON B.id = S.book
				WHERE B.{$field} = '{$value}' AND B.id != {$id}";
		}
		
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function addBook($name, $description, $isb, $year, $price, $levie, $author) {
		$conn = openCon();
		$created_at = getTime();
		$last_modified_by = $_SESSION['loggedUserId'];
		$status = 1; // 1 = active/instock, 0 = removed, 2 = loaned, 3 = replaced, 4 = lost 
		$sql = "INSERT INTO `books`(`name`, `description`, `isb`, `year`, `purchase_price`, `levie`, `author`, `status`, `created_at`, `last_modified_by`) 
			VALUES('{$name}',
				'{$description}',
				'{$isb}',
				'{$year}',
				{$price},
				{$levie},
				'{$author}',
				{$status},
				'{$created_at}',
				{$last_modified_by})";
	
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function updateBook($id, $name, $description, $isb, $year, $price, $levie, $author) {
		$conn = openCon();
		$last_modified_by = $_SESSION['loggedUserId'];

		$sql = "UPDATE `books`
			SET `name` = '{$name}', 
				`description` = '{$description}', 
				`isb` = '{$isb}', 
				`year` = '{$year}',
				`purchase_price` = {$price}, 
				`levie` = {$levie}, 
				`author` = '{$author}', 
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