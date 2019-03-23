<?php
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/book-copies/model.php";

	// get all books
	function retrieveBookCopies() {
		return getBookCopies();
	}

	function retrieveFBookCopies() {
		return getFBookCopies();
	}

	// add new book copy
	if (isset($_POST['addnewbookcopy'])) {
		session_start();
		$conn = openCon(); // connect to db
		$_SESSION['bookId'] = mysqli_real_escape_string($conn,$_POST['bookId']);
		$_SESSION['barCode'] = mysqli_real_escape_string($conn,$_POST['barCode']);
		$_SESSION['circulation_date'] = mysqli_real_escape_string($conn,$_POST['circulation_date']);
        $_SESSION['state'] = mysqli_real_escape_string($conn,$_POST['state']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['bookId']) || empty($_SESSION['barCode']) || empty($_SESSION['state'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=new-book-copy");
			exit();
		} else {
			// check if barcode already used
			$getByBarcodeResult = getBookCopyByField("bar_code", $_SESSION['barCode']);

			$getByBarcodeNum = mysqli_num_rows($getByBarcodeResult);

			if ($getByBarcodeNum > 0) {
				$_SESSION["alert"] = "warning";
				$_SESSION["status"] = "Warning";
				$_SESSION["message"] = "Book Copy with entered barcode already exist.";

				header("Location: /bookshop?action=new-book-copy");
				exit();
			}

			// add book copy
			$addBookCopyResult = addBookCopy($_SESSION['bookId'], $_SESSION['barCode'], $_SESSION['state'], $_SESSION['circulation_date']);
	
			if ($addBookCopyResult) {
				// log action
				$action = "Add book Copy";
				$description = "barCode : ".$_SESSION['barCode'];
				$logResults = logAction($action, $description);

				unset($_SESSION['bookId']);
        		unset($_SESSION['barCode']);
				unset($_SESSION['state']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Book Copy Successfully Added";

                header("Location: /bookshop?action=new-book-copy");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=new-book-copy");
				exit();
			}
		}
	}
	
	// update book copy
	if (isset($_POST['updatebookcopy'])) {
		session_start();
		$conn = openCon(); // connect to db
		$_SESSION['status'] = mysqli_real_escape_string($conn,$_POST['status']);
        $_SESSION['bar_code'] = mysqli_real_escape_string($conn,$_POST['bar_code']);
        $_SESSION['state'] = mysqli_real_escape_string($conn,$_POST['state']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['status']) || empty($_SESSION['bar_code']) || empty($_SESSION['state'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=new-book-copy");
			exit();
		} else {
			// check if barcode already used
			$getByBarcodeResult = getBookCopyByField("bar_code", $_SESSION['bar_code']);
			$bookCopy = mysqli_fetch_array($getByBarcodeResult);

			$getByBarcodeNum = mysqli_num_rows($getByBarcodeResult);

			if ($getByBarcodeNum > 0 && $bookCopy['id'] != $_SESSION['id']) {
				$_SESSION["alert"] = "warning";
				$_SESSION["status"] = "Warning";
				$_SESSION["message"] = "Book Copy with entered barcode already exist.";

				header("Location: /bookshop?action=new-book-copy");
				exit();
			}

			// update book copy
			$updateBookCopyResult = updateBookCopy($_SESSION['id'], $_SESSION['bar_code'], $_SESSION['state'], $_SESSION['status']);
	
			if ($updateBookCopyResult) {
				// log action
				$action = "Update book Copy";
				$description = "Name : ".$_SESSION['book'].", Barcode : ".$_SESSION['barCode'];
				$logResults = logAction($action, $description);

				unset($_SESSION['status']);
        		unset($_SESSION['barCode']);
				unset($_SESSION['state']);
				unset($_SESSION['book']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Book Copy Successfully Updated";

                header("Location: /bookshop?action=book-copies");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=new-book");
				exit();
			}
		}
	}
	
	// remove book
	if (isset($_POST['removebookcopy'])) {
		session_start();
		$conn = openCon(); // connect to db
        $_SESSION['reason'] = mysqli_real_escape_string($conn,$_POST['reason']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['reason'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=delete-book-copy");
			exit();
		} else {

			// remove book copy
			$removeBookCopyResult = removeBookCopy($_SESSION['id'], $_SESSION['reason']);
	
			if ($removeBookCopyResult) {
				// log action
				$action = "Remove book copy";
				$description = "Name : ".$_SESSION['name'].", Reason : ".$_SESSION['reason'];
				$logResults = logAction($action, $description);

				unset($_SESSION['id']);
				unset($_SESSION['name']);
        		unset($_SESSION['reason']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Book Copy Successfully removed";

                header("Location: /bookshop?action=book-copies");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=delete-book");
				exit();
			}
		}
	}
?>