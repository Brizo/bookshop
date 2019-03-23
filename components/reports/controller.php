<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/reports/model.php";
    
    // count books on stock
	function countBooksOnStock() {
        $getCountResult = sumStockBooks();
        $result = mysqli_fetch_array($getCountResult);

        return $result['count'];
    }
    
    // count loaned books
	function countLoanedBooks() {
        $getCountResult = sumLoanedBooks();
        $result = mysqli_fetch_array($getCountResult);

        return $result['count'];
    }
    
    // count lost books
	function countLostBooks() {
        $getCountResult = sumLostBooks();
        $result = mysqli_fetch_array($getCountResult);

        return $result['count'];
    }
    
  //   // count replaced books
	// function countReplacedBooks() {
  //       $getCountResult = sumReplacedBooks();
  //       $result = mysqli_fetch_array($getCountResult);

  //       return $result['count'];
  //   }

  function retrieveStdDebt($stdId) {
    $getCountResult = sumStudentDebt($stdId);
    $result = mysqli_fetch_array($getCountResult);

    return $result['debt'];
  }

  function retrieveLoanYears() {
    $result = getLoanYears();
    return $result;
  }

  function retrieveStdStatement($student, $year) {
    $result = getStdStatement($student, $year);
    return $result;
  }
    
    // count new books
	function countNewBooks() {
        $getCountResult = sumNewBooks();
        $result = mysqli_fetch_array($getCountResult);

        return $result['count'];
    }
    
    // count students
	function countStudents() {
        $getCountResult = sumStudents();
        $result = mysqli_fetch_array($getCountResult);

        return $result['count'];
    }

      // count old books
    function countOldBooks() {
      $getCountResult = sumOldBooks();
      $result = mysqli_fetch_array($getCountResult);

      return $result['count'];
  }
    
    function retrieveLoanedBooks() {
		  return getLoanedBooks();
    }

    function retrieveOlBooks() {
		  return getOldBooks();
    }
    
    function retrieveLostBooks() {
		  return getLostBooks();
    }
    
    function retrieveReturnedBooks() {
		  return getReturnedBooks();
    }
    
    function retrieveNewBooks() {
		  return getNewBooks();
    }
    
    function retrieveOldBooks() {
		  return getOldBooks();
    }
    
    if (isset($_POST['stdloans'])) {
      session_start();
      $conn = openCon();
      $_SESSION['student'] = mysqli_real_escape_string($conn,$_POST['student']);
      $_SESSION['year'] = mysqli_real_escape_string($conn,$_POST['year']);
      closeCon($conn);
    
      // // check if user filled fields and throw error if not
      if (empty($_SESSION['student'])) {
        $_SESSION["alert"] = "danger";
        $_SESSION["status"] = "Error";
        $_SESSION["message"] = "Please fill all information.";

        header("Location: /bookshop?action=new_std_statement");
        exit();
      } else if (empty($_SESSION['year'])) {
          $_SESSION["alert"] = "danger";
          $_SESSION["status"] = "Error";
          $_SESSION["message"] = "Please fill all information.";
  
          header("Location: /bookshop?action=new_std_statement");
          exit();
      } else {
          header("Location: /bookshop?action=student_statement&student={$_SESSION['student']}&year={$_SESSION['year']}");
          unset($_SESSION['student']);
          exit();
      }
    }

    // reports to export to csv
    if (isset($_POST["exportLoanedBooks"])) {
      session_start();
      $queryResult = retrieveLoanedBooks();
      $headers = array('client', 'book', 'issue_date');
      $filename = "loaned-books";
      $statement = 0;
      generateReport($headers, $queryResult, $filename, $statement, "");
    }

    if (isset($_POST["exportLostBooks"])) {
      session_start();
      $queryResult = retrieveLostBooks();
      $headers = array('name', 'isb', 'year', 'author', 'bar_code', 'state', 'status');
      $filename = "lost-books";
      $statement = 0;
      generateReport($headers, $queryResult, $filename, $statement);
    }

    if (isset($_POST["exportNewBooks"])) {
      session_start();
      $queryResult = retrieveNewBooks();
      $headers = array('name', 'isb', 'year', 'author', 'bar_code', 'state', 'status');
      $filename = "new-books";
      $statement = 0;
      generateReport($headers, $queryResult, $filename, $statement, "");
    }

    if (isset($_POST["exportOldBooks"])) {
      session_start();
      $queryResult = retrieveOldBooks();
      $headers = array('name', 'isb', 'bar_code', 'age');
      $filename = "old-books";
      $statement = 0;
      generateReport($headers, $queryResult, $filename, $statement, "");
    }

    if (isset($_POST["exportReturnedBooks"])) {
      session_start();
      $queryResult = retrieveReturnedBooks();
      $headers = array('name', 'isb', 'year', 'author', 'bar_code', 'state', 'status');
      $filename = "books-on-stock";
      $statement = 0;
      generateReport($headers, $queryResult, $filename, $statement, "");
    }

    if (isset($_POST["exportStudentStatement"])) {
      session_start();
      $queryResult = retrieveStdStatement($_SESSION['student'], $_SESSION['year']);
      $debt = retrieveStdDebt($_SESSION['student']);
      $debt = round($debt,2);
      $headers = array('clientName', 'bookName', 'bar_code', 'issue_date', 'status', 'returned_date', 'price', 'levie');
      $filename = "student-statement";
      $statement = 1;
      generateReport($headers, $queryResult, $filename, $statement, $debt);
    }

    // for generating csv reports
    function generateReport($headers, $queryResult, $filename, $statement, $debtVal) {
      $output = "";
    
      // output headers so that the file is downloaded rather than displayed
      header("Content-Type: text/csv; charset=utf-8");
      header("Content-Disposition: attachment; filename=".$filename.".csv");
    
      // create a file pointer connected to the output stream
      $output = fopen("php://output", "w");
      $today = getTime();

      // output the column headings
      $empty = array();
      for ($x = 0; $x < sizeof($headers); $x++) {
        array_push($empty,"");
      }

      $school = $empty;
      $school[0] = "School : ";
      $school[1] = $_SESSION['accountName'];

      $title = $empty;
      $title[0] = "Report Title : ";
      $title[1] = $filename;

      $date = $empty;
      $date[0] = "Date : ";
      $date[1] = $today;

      fputcsv($output, $school);
      fputcsv($output, $title);
      fputcsv($output, $date);
      fputcsv($output, $empty);
      fputcsv($output, $headers);
    
      while($row = mysqli_fetch_array($queryResult)) {
        $data = array();
        for ($x = 0; $x < sizeof($headers); $x++) {
          array_push($data, $row[$headers[$x]]);
        }

        fputcsv($output, $data);
      }

      fputcsv($output, $empty);

      if ($statement == 1) {
        $debt = $empty;
        $debt[0] = "Total Outstanding : E ";
        $debt[1] = $debtVal;
        fputcsv($output, $debt);
      }
    }
    
?>