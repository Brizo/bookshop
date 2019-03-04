<?php
	include "model.php";

	// get all classes
	function retrieveClasses() {
		return getClasses();
	}

	// add new class
	if (isset($_POST['addnewclass'])) {
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

			header("Location: /bookshop?action=new-class");
			exit();
		} else {
			// add class
			$addClassResult = addClass($_SESSION['name'], $_SESSION['description']);
	
			if ($addClassResult) {
				unset($_SESSION['name']);
        		unset($_SESSION['description']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Class Successfully Added";

                header("Location: /bookshop?action=new-class");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=new-class");
				exit();
			}
		}
	}
	
	// update class
	if (isset($_POST['updateclass'])) {
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

			header("Location: /bookshop?action=edit-class");
			exit();
		} else {
			// update class
			$updateClassResult = updateClass($_SESSION['name'], $_SESSION['description']);
	
			if ($updateClassResult) {
				unset($_SESSION['name']);
        		unset($_SESSION['description']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Class Successfully Updated";

                header("Location: /bookshop?action=classes");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=edit-class");
				exit();
			}
		}
	}
	
	// remove class
	if (isset($_POST['removeclass'])) {
		session_start();
		$conn = openCon(); // connect to db
        $_SESSION['reason'] = mysqli_real_escape_string($conn,$_POST['reason']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['reason'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=delete-class");
			exit();
		} else {

			// remove class
			$removeClassResult = removeClass($_SESSION['id'], $_SESSION['reason']);
	
			if ($removeClassResult) {
				unset($_SESSION['id']);
				unset($_SESSION['name']);
        		unset($_SESSION['reason']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Class Successfully removed";

                header("Location: /bookshop?action=classes");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=delete-class");
				exit();
			}
		}
    }
?>