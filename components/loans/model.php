<?php
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

	function getLoans() {
		$conn = openCon();
		$sql = "SELECT L.id, L.issue_date, L.return_date, L.book_issue_state, L.book_return_state, B.name book, S.student_no client, 
				CASE 
					WHEN L.status = 1 THEN 'open'
					ELSE 'closed' 
				END `status`
			FROM `book_loans` L
			LEFT JOIN students S ON L.client = S.id
			LEFT JOIN books B ON L.book = B.id
			WHERE L.status != 0";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}
?>