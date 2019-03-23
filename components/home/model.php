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
	if (isset($_SESSION['bookCirculation'])) {
		$circulationYears = $_SESSION['bookCirculation'];
	} else {
		$circulationYears = 3;
	}
	
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

  function sumStreams() {
		$conn = openCon();
		$sql = "SELECT COUNT(*) count FROM `streams` WHERE `status` = 1";
		$result = $conn->query($sql);
		closeCon($conn);
		return $result;
  }

?>