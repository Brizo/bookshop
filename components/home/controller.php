<?php
    include "model.php";
    
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
    
    // count replaced books
	function countReplacedBooks() {
        $getCountResult = sumReplacedBooks();
        $result = mysqli_fetch_array($getCountResult);

        return $result['count'];
    }
    
    // count streams
	function countStreams() {
        $getCountResult = sumStreams();
        $result = mysqli_fetch_array($getCountResult);

        return $result['count'];
    }
    
    // count students
	function countStudents() {
        $getCountResult = sumStudents();
        $result = mysqli_fetch_array($getCountResult);

        return $result['count'];
	}

?>