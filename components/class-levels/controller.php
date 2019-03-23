<?php
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/class-levels/model.php";

	// get all class levels
	function retrieveClassLevels() {
		return getClassLevels();
	}

	// add new class level
	if (isset($_POST['addnewclasslevel'])) {
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

			header("Location: /bookshop?action=new-class_level");
			exit();
		} else {
			// add class
			$addClassLevelResult = addClassLevel($_SESSION['name'], $_SESSION['description']);
	
			if ($addClassLevelResult) {
				// log action
				$action = "Add class level";
				$description = "Class level : ".$_SESSION['name'];
				$logResults = logAction($action, $description);

				unset($_SESSION['name']);
        		unset($_SESSION['description']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Class Level Successfully Added";

                header("Location: /bookshop?action=new-class_level");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=new-class_level");
				exit();
			}
		}
	}
	
	// update class level
	if (isset($_POST['updateclasslevel'])) {
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

			header("Location: /bookshop?action=edit-class_level");
			exit();
		} else {
			// update class
			$updateClassResult = updateClass($_SESSION['name'], $_SESSION['description']);
	
			if ($updateClassResult) {
				// log action
				$action = "Update class level";
				$description = "Class level : ".$_SESSION['name'];
				$logResults = logAction($action, $description);
				unset($_SESSION['name']);
        		unset($_SESSION['description']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Class Level Successfully Updated";

                header("Location: /bookshop?action=class_levels");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=edit-class_level");
				exit();
			}
		}
	}
	
	// remove class
	if (isset($_POST['removeclasslevel'])) {
		session_start();
		$conn = openCon(); // connect to db
        $_SESSION['reason'] = mysqli_real_escape_string($conn,$_POST['reason']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['reason'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=delete-class_level");
			exit();
		} else {

			// remove class
			$removeClassResult = removeClass($_SESSION['id'], $_SESSION['reason']);
	
			if ($removeClassResult) {
				// log action
				$action = "Remove class level";
				$description = "Class level : ".$_SESSION['name'];
				$logResults = logAction($action, $description);
				
				unset($_SESSION['id']);
				unset($_SESSION['name']);
        		unset($_SESSION['reason']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Class Level Successfully removed";

                header("Location: /bookshop?action=class_levels");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=delete-class_level");
				exit();
			}
		}
    }
?>