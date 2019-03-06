<?php
	include "model.php";

	function retrieveLoans() {
		return getLoans();
	}

	if (isset($_POST['addnewloan'])) {
		session_start();
		$conn = openCon();
		$_SESSION['student'] = mysqli_real_escape_string($conn,$_POST['student']);
		$_SESSION['book'] = mysqli_real_escape_string($conn,$_POST['book']); // use on front end before echo htmlspecialchars
		$_SESSION['issueState'] = mysqli_real_escape_string($conn,$_POST['issueState']); // use on front end before echo htmlspecialchars
		$_SESSION['return_date'] = mysqli_real_escape_string($conn,$_POST['return_date']); // use on front end before echo htmlspecialchars
		closeCon($conn);
	
		// // check if user filled fields and throw error if not
		if (empty($_SESSION['student']) || empty($_SESSION['book']) || empty($_SESSION['issueState']) || empty($_SESSION['return_date'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all information.";

			header("Location: /bookshop?action=new-loan");
			exit();
		} else {
			$addBookLoanResult = addBookLoan($_SESSION['student'], $_SESSION['book'], $_SESSION['issueState'], $_SESSION['return_date']);
	
			if ($addBookLoanResult) {
				unset($_SESSION['student']);
        		unset($_SESSION['book']);
				unset($_SESSION['issueState']);
				unset($_SESSION['return_date']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Book Loan Successfully Created";

                header("Location: /bookshop?action=new-loan");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=new-loan");
				exit();
			}
		}
	}
	
	if (isset($_POST['returnloan'])) {
		session_start();
		$conn = openCon();
		$_SESSION['returnState'] = mysqli_real_escape_string($conn,$_POST['returnState']);
		closeCon($conn);
	
		// // check if user filled fields and throw error if not
		if (empty($_SESSION['returnState'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all information.";

			header("Location: /bookshop?action=return-loan");
			exit();
		} else {
			$returnBookLoanResult = returnBookLoan($_SESSION['id'], $_SESSION['returnState']);
	
			if ($returnBookLoanResult) {
				unset($_SESSION['id']);
        		unset($_SESSION['book']);
				unset($_SESSION['client']);
				unset($_SESSION['returnState']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Book Loan Successfully Returned";

                header("Location: /bookshop?action=loans");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=return-loan");
				exit();
			}
		}
    }
?>