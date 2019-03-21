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
    
?>