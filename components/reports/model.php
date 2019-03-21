<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

	function sumStockBooks() {
		$conn = openCon();
		$sql = "SELECT COUNT(*) count FROM `book_copies` WHERE `status` = 1";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function sumLoanedBooks() {
		$conn = openCon();
		$sql = "SELECT COUNT(*) count FROM `book_copies` WHERE `status` = 2";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function sumLostBooks() {
		$conn = openCon();
		$sql = "SELECT COUNT(*) count FROM `book_copies` WHERE `status` = 4";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function sumOldBooks() {
		$conn = openCon();
		$circulationYears = $_SESSION['bookCirculation'];
		$current = getTime();
		$sql = "SELECT COUNT(*) count FROM `book_copies` WHERE FLOOR(DATEDIFF('{$current}', `circulation_date`) / 365) > {$circulationYears}";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function sumStudents() {
		$conn = openCon();
		$sql = "SELECT COUNT(*) count FROM `students` WHERE `status` = 1";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function sumNewBooks() {
		$conn = openCon();
		$sql = "SELECT COUNT(*) count 
			FROM `book_copies`
			WHERE `id` NOT IN (
				SELECT `book` FROM `book_loans`
			) AND `status` != 0";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function getLoanedBooks() {
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

	function getReturnedBooks() {
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

	function getLostBooks() {
		$conn = openCon();
		$sql = "SELECT C.id, B.name, B.description, C.circulation_date, B.isb, B.year, B.purchase_price, B.levie, B.author, C.bar_code, S.name `state`, 
			CASE WHEN B.status = 1 
				THEN 'active' 
				ELSE 'loaned' 
			END `status`
			FROM `book_copies` C
			LEFT JOIN books B ON C.book = B.id
			LEFT JOIN book_states S ON S.id = C.state
			WHERE B.status = 4";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function getOldBooks() {
		$conn = openCon();
		$circulationYears = $_SESSION['bookCirculation'];
		$current = getTime();
		$sql = "SELECT C.id, B.name, B.description, C.circulation_date, B.isb, B.year, B.purchase_price, B.levie, B.author, C.bar_code,
			CONCAT(FLOOR(DATEDIFF('{$current}', C.circulation_date) / 365), ' Years') age, 
			CASE 
				WHEN B.status = 1 THEN 'active'
				WHEN B.status = 2 THEN 'loaned' 
				ELSE 'lost' 
			END `status`
			FROM `book_copies` C
			LEFT JOIN books B ON C.book = B.id
			LEFT JOIN book_states S ON S.id = C.state
			WHERE FLOOR(DATEDIFF('{$current}', C.circulation_date) / 365) > {$circulationYears}";

		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function getNewBooks() {
		$conn = openCon();
		$sql = "SELECT C.id, B.name, B.description, C.circulation_date, B.isb, B.year, B.purchase_price, B.levie, B.author, C.bar_code, S.name `state`, CASE WHEN B.status = 1 THEN 'active' ELSE 'replaced' END `status`
			FROM `book_copies` C
			LEFT JOIN `books` B ON C.book = B.id
			LEFT JOIN `book_states` S ON S.id = C.state
			WHERE C.id NOT IN (
				SELECT `book` FROM `book_loans`
			) AND C.status != 0";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function getLoanYears() {
		$conn = openCon();
		$sql = "SELECT DISTINCT(period) FROM book_loans";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function getStdStatement($student, $year) {
		$conn = openCon();
		$sql = "SELECT L.id, L.issue_date, L.return_date, L.returned_date, T.name book_issue_state, L.book_return_state,
				B.purchase_price price, B.levie,
				B.name bookName, L.book,
				C.bar_code,
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
			WHERE L.period = {$year} AND L.client = {$student}";

		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}

	function sumStudentDebt($stdId) {
		$conn = openCon();
		$sql = "SELECT SUM(B.purchase_price) + SUM(B.levie) debt
			FROM `book_loans` L
			LEFT JOIN book_copies C ON L.book = C.id
			LEFT JOIN books B ON C.book = B.id
			WHERE L.client = {$stdId} AND L.status = 1
			GROUP BY L.client";
			
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
	}
?>