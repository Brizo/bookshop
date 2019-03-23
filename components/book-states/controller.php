<?php
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/book-states/model.php";

	// get book states
	function retrieveBookStates() {
		return getBookStates();
	}

	// add new bookstate
	if (isset($_POST['addnewbookstate'])) {
		session_start();
		$conn = openCon(); // connect to db
        $_SESSION['name'] = mysqli_real_escape_string($conn,$_POST['name']);
        $_SESSION['description'] = mysqli_real_escape_string($conn,$_POST['description']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['name'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=new-book_state");
			exit();
		} else {
			// add book state
			$addBookStateResult = addBookState($_SESSION['name'], $_SESSION['description']);
	
			if ($addBookStateResult) {
				// log action
				$action = "Add book State";
				$description = "Bookstate : ".$_SESSION['name'];
				$logResults = logAction($action, $description);

				unset($_SESSION['name']);
        		unset($_SESSION['description']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Book State Successfully Added";

                header("Location: /bookshop?action=new-book_state");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=new-book_state");
				exit();
			}
		}
	}
	
	// update book state
	if (isset($_POST['updatebookstate'])) {
		session_start();
		$conn = openCon(); // connect to db
        $_SESSION['name'] = mysqli_real_escape_string($conn,$_POST['name']);
        $_SESSION['description'] = mysqli_real_escape_string($conn,$_POST['description']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['name'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=edit-book_state");
			exit();
		} else {
			// update book state
			$updateBookStateResult = updateBookState($_SESSION['id'],$_SESSION['name'], $_SESSION['description']);
	
			if ($updateBookStateResult) {
				// log action
				$action = "Update book State";
				$description = "Bookstate : ".$_SESSION['name'];
				$logResults = logAction($action, $description);

				unset($_SESSION['name']);
        		unset($_SESSION['description']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Book State Successfully Updated";

                header("Location: /bookshop?action=book-states");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=edit-book_state");
				exit();
			}
		}
	}
	
	// remove book state
	if (isset($_POST['removebookstate'])) {
		session_start();
		$conn = openCon(); // connect to db
        $_SESSION['reason'] = mysqli_real_escape_string($conn,$_POST['reason']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['reason'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=delete-book_state");
			exit();
		} else {

			// remove book state
			$removebookStateResult = removeBookState($_SESSION['id'], $_SESSION['reason']);
	
			if ($removebookStateResult) {
				// log action
				$action = "Remove book State";
				$description = "Bookstate : ".$_SESSION['name'].", Reason : ".$_SESSION['reason'];
				$logResults = logAction($action, $description);
				unset($_SESSION['id']);
				unset($_SESSION['name']);
        		unset($_SESSION['reason']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Book State Successfully removed";

                header("Location: /bookshop?action=book-states");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=delete-book_state");
				exit();
			}
		}
    }
?>