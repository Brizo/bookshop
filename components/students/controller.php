<?php
	include "model.php";

	// get all students
	function retrieveStudents() {
		return getStudents();
	}

	// add new students
	if (isset($_POST['addnewstudent'])) {
		session_start();
		$conn = openCon(); // connect to db
        $_SESSION['name'] = mysqli_real_escape_string($conn,$_POST['name']);
        $_SESSION['description'] = mysqli_real_escape_string($conn,$_POST['description']);
		$_SESSION['isb'] = mysqli_real_escape_string($conn,$_POST['isb']);
		$_SESSION['year'] = mysqli_real_escape_string($conn,$_POST['year']);
        $_SESSION['author'] = mysqli_real_escape_string($conn,$_POST['author']);
        $_SESSION['barCode'] = mysqli_real_escape_string($conn,$_POST['barCode']);
        $_SESSION['state'] = mysqli_real_escape_string($conn,$_POST['state']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['name']) || empty($_SESSION['isb']) || empty($_SESSION['author']) || empty($_SESSION['year']) || empty($_SESSION['barCode']) || empty($_SESSION['state'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=new-book");
			exit();
		} else if (!is_numeric($_SESSION['year'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Book publish year should be numeric.";

			header("Location: /bookshop?action=new-book");
			exit();
		} else {
			// check if barcode already used
			$getByBarcodeResult = getBookByField("bar_code", $_SESSION['barCode']);

			$getByBarcodeNum = mysqli_num_rows($getByBarcodeResult);

			if ($getByBarcodeNum > 0) {
				$_SESSION["alert"] = "warning";
				$_SESSION["status"] = "Warning";
				$_SESSION["message"] = "Book with entered barcode already exist.";

				header("Location: /bookshop?action=new-book");
				exit();
			}

			// add book
			$addBookResult = addBook($_SESSION['name'], $_SESSION['description'], $_SESSION['isb'], $_SESSION['year'], $_SESSION['author'], $_SESSION['barCode'], $_SESSION['state']);
	
			if ($addBookResult) {
				unset($_SESSION['name']);
        		unset($_SESSION['description']);
				unset($_SESSION['isb']);
				unset($_SESSION['year']);
        		unset($_SESSION['author']);
        		unset($_SESSION['barCode']);
				unset($_SESSION['state']);
				
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
	
	// update students
	if (isset($_POST['updatestudent'])) {
		session_start();
		$conn = openCon(); // connect to db
        $_SESSION['name'] = mysqli_real_escape_string($conn,$_POST['name']);
        $_SESSION['description'] = mysqli_real_escape_string($conn,$_POST['description']);
		$_SESSION['isb'] = mysqli_real_escape_string($conn,$_POST['isb']);
		$_SESSION['year'] = mysqli_real_escape_string($conn,$_POST['year']);
        $_SESSION['author'] = mysqli_real_escape_string($conn,$_POST['author']);
        $_SESSION['barCode'] = mysqli_real_escape_string($conn,$_POST['barCode']);
        $_SESSION['state'] = mysqli_real_escape_string($conn,$_POST['state']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['name']) || empty($_SESSION['isb']) || empty($_SESSION['author']) || empty($_SESSION['year']) || empty($_SESSION['barCode']) || empty($_SESSION['state'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=edit-book");
			exit();
		} else if (!is_numeric($_SESSION['year'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Book publish year should be numeric.";

			header("Location: /bookshop?action=edit-book");
			exit();
		} else {
			// check if barcode already used
			$getByBarcodeResult = getBookByFieldId("bar_code", $_SESSION['barCode'], $_SESSION['id']);

			$getByBarcodeNum = mysqli_num_rows($getByBarcodeResult);

			if ($getByBarcodeNum > 0) {
				$_SESSION["alert"] = "warning";
				$_SESSION["status"] = "Warning";
				$_SESSION["message"] = "Book with entered barcode already exist.";

				header("Location: /bookshop?action=edit-book");
				exit();
			}

			// update book
			$updateBookResult = updateBook($_SESSION['id'], $_SESSION['name'], $_SESSION['description'], $_SESSION['isb'], $_SESSION['year'], $_SESSION['author'], $_SESSION['barCode'], $_SESSION['state']);
	
			if ($updateBookResult) {
				unset($_SESSION['id']);
				unset($_SESSION['name']);
        		unset($_SESSION['description']);
				unset($_SESSION['isb']);
				unset($_SESSION['year']);
        		unset($_SESSION['author']);
        		unset($_SESSION['barCode']);
				unset($_SESSION['state']);
				
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
	
	// remove students
	if (isset($_POST['removestudent'])) {
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

?>