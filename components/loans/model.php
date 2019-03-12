<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

	function getLoans() {
		$conn = openCon();
		$sql = "SELECT L.id, L.issue_date, L.return_date, T.name book_issue_state, L.book_return_state, 
				CONCAT(B.name,' - ', C.bar_code) book,
				CONCAT(S.first_name, ' ', S.last_name, ' - ', S.student_no) client, 
				CASE 
					WHEN L.status = 1 THEN 'open'
					ELSE 'closed' 
				END `status`
			FROM `book_loans` L
			LEFT JOIN students S ON L.client = S.id
			LEFT JOIN book_copies C ON L.book = C.id
			LEFT JOIN books B ON C.book = B.id
			LEFT JOIN book_states T ON L.book_issue_state = T.id 
			WHERE L.status != 0";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function getBookLoanByField($field, $value) {
		$conn = openCon();
		if ($field == "id" || $field == "status" || $field == "client" || $field == "book" || $field == "last_modified_by") {
			$sql = "SELECT L.id, L.issue_date, L.return_date, T.name book_issue_state, L.book_return_state, 
					CONCAT(B.name,' - ', C.bar_code) bookName, L.book,
					CONCAT(S.first_name, ' ', S.last_name, ' - ', S.student_no) clientName, L.client,
					CASE 
						WHEN L.status = 1 THEN 'open'
						ELSE 'closed' 
					END `status`
				FROM `book_loans` L
				LEFT JOIN students S ON L.client = S.id
				LEFT JOIN book_copies C ON L.book = C.id
				LEFT JOIN books B ON C.book = B.id
				LEFT JOIN book_states T ON L.book_issue_state = T.id 
				WHERE C.{$field} = {$value}";
		} else {
			$sql = "SELECT L.id, L.issue_date, L.return_date, T.name book_issue_state, L.book_return_state, 
					CONCAT(B.name,' - ', C.bar_code) bookName, L.book,
					CONCAT(S.first_name, ' ', S.last_name, ' - ', S.student_no) clientName, L.client,
					CASE 
						WHEN L.status = 1 THEN 'open'
						ELSE 'closed' 
					END `status`
				FROM `book_loans` L
				LEFT JOIN students S ON L.client = S.id
				LEFT JOIN book_copies C ON L.book = C.id
				LEFT JOIN books B ON C.book = B.id
				LEFT JOIN book_states T ON L.book_issue_state = T.id 
				WHERE C.{$field} = '{$value}'";
		}
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function addBookLoan($student, $book, $state, $return_date) {
		$conn = openCon();
		$created_at = getTime();
		$last_modified_by = $_SESSION['loggedUserId'];
		$status = 1; // 1 = loaned, 0 = removed, 2 = returned, 4 = paid, 3 = replaced
		$sql = "INSERT INTO `book_loans`(`client`, `issue_date`, `return_date`, `book_issue_state`, `book`, `status`, `created_at`, `last_modified_by`) 
			VALUES({$student},
				'{$created_at}',
				'{$return_date}',
				{$state},
				{$book},
				{$status},
				'{$created_at}',
				{$last_modified_by})";

		$sql = "UPDATE `book_copies`
				SET status = 2
				WHERE `book` = {$book}";

		$result1 = $conn->query($sql);
		$result2 = $conn->query($sql);
		closeCon($conn);
		return $result2;
	}

	function updateBookLoan($id, $student, $book, $state, $return_date) {
		$conn = openCon();
		$created_at = getTime();
		$last_modified_by = $_SESSION['loggedUserId'];
		$status = 1; // 1 = loaned, 0 = removed, 2 = returned
		$sql = "UPDATE `book_loans`
			SET `client`= {$student},
				`return_date` = '{$return_date}',
				`book_issue_state` = {$state},
				`book` = {$book},
				`last_modified_by` = {$last_modified_by}
			WHERE id = {$id}";
	
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function returnBookLoan($id, $state, $status) {
		$conn = openCon();
		$last_modified_by = $_SESSION['loggedUserId'];
		//$status = 2; // 1 = loaned, 0 = removed, 2 = returned, 3 = replaced, 4 = lost
		$returned_date = getTime();

		$sql = "UPDATE `book_loans`
			SET `book_return_state` = {$state}, 
				`returned_date` = '{$returned_date}', 
				`status` = {$status}, 
				`last_modified_by` = {$last_modified_by}
			WHERE id = {$id}";

		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function removeLoan($id, $reason) {
		$conn = openCon();
		$sql = "UPDATE `book_loans` SET `status` = 0, `reason` = '{$reason}' WHERE `id` = {$id}";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}
?>