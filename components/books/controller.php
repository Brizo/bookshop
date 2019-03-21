<?php
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/books/model.php";
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/book-copies/model.php";
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/school/model.php";

	// get all books
	function retrieveBooks() {
		return getBooks();
	}

	// add new book
	if (isset($_POST['addnewbook'])) {
		session_start();
		$conn = openCon(); // connect to db
        $_SESSION['name'] = mysqli_real_escape_string($conn,$_POST['name']);
        $_SESSION['description'] = mysqli_real_escape_string($conn,$_POST['description']);
		$_SESSION['isb'] = mysqli_real_escape_string($conn,$_POST['isb']);
		$_SESSION['year'] = mysqli_real_escape_string($conn,$_POST['year']);
		$_SESSION['purchase_price'] = mysqli_real_escape_string($conn,$_POST['purchase_price']);
		$_SESSION['levie'] = mysqli_real_escape_string($conn,$_POST['levie']);
        $_SESSION['author'] = mysqli_real_escape_string($conn,$_POST['author']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['name']) || empty($_SESSION['isb']) || empty($_SESSION['author']) || empty($_SESSION['year'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=new-book");
			exit();
		} else if (!is_numeric($_SESSION['year']) || (!empty($_SESSION['purchase_price']) && !is_numeric($_SESSION['purchase_price'])) ||
				(!empty($_SESSION['levie']) && !is_numeric($_SESSION['levie']))) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Book publish year, purchase price, and levie should be numeric.";

			header("Location: /bookshop?action=new-book");
			exit();
		} else if (intval($_SESSION['year']) > getYear()) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Book publish year cannot be in the future.";

			header("Location: /bookshop?action=new-book");
			exit();
		} else {

			if (empty($_SESSION['purchase_price'])) {
				$_SESSION['purchase_price'] = '0.00';
			} else {
				$_SESSION['purchase_price'] = number_format($_SESSION['purchase_price'], 2, '.', '');
			}

			if (empty($_SESSION['levie'])) {
				$_SESSION['levie'] = '0.00';
			} else {
				$_SESSION['levie'] = number_format($_SESSION['levie'], 2, '.', '');
			}

			// check if isbn already entered
			$getByIsbnResult = getBookByField("isb", $_SESSION['isb']);

			$getByIsbn = mysqli_num_rows($getByIsbnResult);

			if ($getByIsbn > 0) {
				$_SESSION["alert"] = "warning";
				$_SESSION["status"] = "Warning";
				$_SESSION["message"] = "Entered book already exist.";

				header("Location: /bookshop?action=new-book");
				exit();
			}

			// add book
			$addBookResult = addBook($_SESSION['name'], $_SESSION['description'], $_SESSION['isb'], $_SESSION['year'] , $_SESSION['purchase_price'], $_SESSION['levie'], $_SESSION['author']);
	
			if ($addBookResult) {
				// log action
				$action = "Add book";
				$description = "Name : ".$_SESSION['name']." ISBN : ".$_SESSION['isb'];
				$logResults = logAction($action, $description);

				unset($_SESSION['name']);
        		unset($_SESSION['description']);
				unset($_SESSION['isb']);
				unset($_SESSION['year']);
				unset($_SESSION['author']);
				unset($_SESSION['purchase_price']);
				unset($_SESSION['levie']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
				$_SESSION["message"] = "Book Successfully Added";

                header("Location: /bookshop?action=new-book");
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
	
	// update book
	if (isset($_POST['updatebook'])) {
		session_start();
		$conn = openCon(); // connect to db
        $_SESSION['name'] = mysqli_real_escape_string($conn,$_POST['name']);
        $_SESSION['description'] = mysqli_real_escape_string($conn,$_POST['description']);
		$_SESSION['isb'] = mysqli_real_escape_string($conn,$_POST['isb']);
		$_SESSION['year'] = mysqli_real_escape_string($conn,$_POST['year']);
		$_SESSION['purchase_price'] = mysqli_real_escape_string($conn,$_POST['purchase_price']);
		$_SESSION['levie'] = mysqli_real_escape_string($conn,$_POST['levie']);
        $_SESSION['author'] = mysqli_real_escape_string($conn,$_POST['author']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['name']) || empty($_SESSION['isb']) || empty($_SESSION['author']) || empty($_SESSION['year'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=edit-book");
			exit();
		} else if (!is_numeric($_SESSION['year']) || (!empty($_SESSION['purchase_price']) && !is_numeric($_SESSION['purchase_price'])) ||
				(!empty($_SESSION['levie']) && !is_numeric($_SESSION['levie']))) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Book publish year, purchase price, and levie should be numeric.";

			header("Location: /bookshop?action=edit-book");
			exit();
		} else if (intval($_SESSION['year']) > getYear()) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Book publish year cannot be in the future.";

			header("Location: /bookshop?action=edit-book");
			exit();
		} else {
			if (empty($_SESSION['purchase_price'])) {
				$_SESSION['purchase_price'] = '0.00';
			} else {
				$_SESSION['purchase_price'] = number_format($_SESSION['purchase_price'], 2, '.', '');
			}

			if (empty($_SESSION['levie'])) {
				$_SESSION['levie'] = '0.00';
			} else {
				$_SESSION['levie'] = number_format($_SESSION['levie'], 2, '.', '');
			}

			// check if isbn already entered
			$getByIsbnResult = getBookByField("isb", $_SESSION['isb'], $_SESSION['id']);
			$book = mysqli_fetch_array($getByIsbnResult);

			$getByIsbnNum = mysqli_num_rows($getByIsbnResult);

			if ($getByIsbnNum > 0 && $book['id'] != $_SESSION['id']) {
				$_SESSION["alert"] = "warning";
				$_SESSION["status"] = "Warning";
				$_SESSION["message"] = "Entered book already ISBN exist.";

				header("Location: /bookshop?action=edit-book");
				exit();
			}

			// update book
			$updateBookResult = updateBook($_SESSION['id'], $_SESSION['name'], $_SESSION['description'], $_SESSION['isb'], $_SESSION['year'], $_SESSION['purchase_price'], $_SESSION['levie'], 
					$_SESSION['author']);
	
			if ($updateBookResult) {
				// log action
				$action = "Update book";
				$description = "Name : ".$_SESSION['name']." ISBN : ".$_SESSION['isb'];
				$logResults = logAction($action, $description);

				unset($_SESSION['id']);
				unset($_SESSION['name']);
        		unset($_SESSION['description']);
				unset($_SESSION['isb']);
				unset($_SESSION['year']);
				unset($_SESSION['purchase_price']);
				unset($_SESSION['levie']);
        		unset($_SESSION['author']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
				$_SESSION["message"] = "Book Successfully updated";

                header("Location: /bookshop?action=books");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=edit-book");
				exit();
			}
		}
	}
	
	// remove book
	if (isset($_POST['removebook'])) {
		session_start();
		$conn = openCon(); // connect to db
        $_SESSION['reason'] = mysqli_real_escape_string($conn,$_POST['reason']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['reason'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=delete-book");
			exit();
		} else {

			// remove book
			$removeBookResult = removeBook($_SESSION['id'], $_SESSION['reason']);
	
			if ($removeBookResult) {
				// log action
				$action = "Remove book";
				$description = "Name : ".$_SESSION['name']." Id : ".$_SESSION['id'];
				$logResults = logAction($action, $description);

				unset($_SESSION['id']);
				unset($_SESSION['name']);
        		unset($_SESSION['reason']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
				$_SESSION["message"] = "Book Successfully removed";

                header("Location: /bookshop?action=books");
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
	
	// add book copies
	if (isset($_POST['addbookcopies'])) {
		session_start();
		$conn = openCon(); // connect to db
        $_SESSION['copies'] = mysqli_real_escape_string($conn,$_POST['copies']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['copies'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=add-book-copies");
			exit();
		} else if (!is_numeric($_SESSION['copies'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Number of copies should be numeric.";

			header("Location: /bookshop?action=add-book-copies");
			exit();
		} else if (intval($_SESSION['copies']) <= 0) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Number of copies should be more than zero.";

			header("Location: /bookshop?action=add-book-copies");
			exit();
		} else {
			$success = true;

			for ($i = 0; $i < $_SESSION['copies']; $i++) {
				
				$getAccountResult = getAccount();
				$account = mysqli_fetch_array($getAccountResult);
				$barcodeNoCounter = $account['barcode_no_counter'] + 1;

				for ($x = 0; $x < (6 - sizeof($barcodeNoCounter)); $x++) {
					$barcodeNoCounter = "0".$barcodeNoCounter;
				}

				$_SESSION['barcode'] = "M".$barcodeNoCounter;
				$_SESSION['state'] = 1;

				// add book copy
				$addBookCopyResult = addBookCopy($_SESSION['id'], $_SESSION['barcode'], $_SESSION['state']);
				
				if (!$addBookCopyResult) {
					$success = false;
				}
			}

			if ($success) {
				// log action
				$action = "Add book copies";
				$description = "Book : ".$_SESSION['display']." Id : ".$_SESSION['id'];
				$logResults = logAction($action, $description);

				unset($_SESSION['id']);
				unset($_SESSION['display']);
				unset($_SESSION['copies']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
				$_SESSION["message"] = "Book Copies Successfully Added";

                header("Location: /bookshop?action=books");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=add-book-copies");
				exit();
			}
		}
    }
?>