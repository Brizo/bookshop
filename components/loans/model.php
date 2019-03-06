<?php
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

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

	function addBookLoan($student, $book, $state, $return_date) {
		$conn = openCon();
		$created_at = getTime();
		$last_modified_by = $_SESSION['loggedUserId'];
		$status = 1; // 1 = loaned, 0 = removed, 2 = returned
		$sql = "INSERT INTO `book_loans`(`client`, `issue_date`, `return_date`, `book_issue_state`, `book`, `status`, `created_at`, `last_modified_by`) 
			VALUES({$student},
				'{$created_at}',
				'{$return_date}',
				{$state},
				{$book},
				{$status},
				'{$created_at}',
				{$last_modified_by})";
	
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function returnBookLoan($id, $state) {
		$conn = openCon();
		$last_modified_by = $_SESSION['loggedUserId'];
		$status = 2; // 1 = loaned, 0 = removed, 2 = returned
		$returned_date = getTime();

		$sql = "UPDATE `book_loans`
			SET `book_return_state` = {$state}, 
				`returned_date` = '{$returned_date}', 
				`status` = {$status}, 
				`last_modified_by` = {$last_modified_by}
			WHERE id = {$id} AND";

		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}
?>