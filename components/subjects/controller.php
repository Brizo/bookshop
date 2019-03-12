<?php
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/subjects/model.php";

	// get all subjects
	function retrieveSubjects() {
		return getSubjects();
	}

	function retrieveSubjectByField($field, $value) {
		return getSubjectByField($field, $value);
	}

	// add new subject
	if (isset($_POST['addnewsubject'])) {
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

			header("Location: /bookshop?action=new-subject");
			exit();
		} else {
			// add subject
			$addSubjectResult = addSubject($_SESSION['name'], $_SESSION['description']);
	
			if ($addSubjectResult) {
				unset($_SESSION['name']);
        		unset($_SESSION['description']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Subject Successfully Added";

                header("Location: /bookshop?action=new-subject");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=new-subject");
				exit();
			}
		}
	}
	
	// update subject
	if (isset($_POST['updatesubject'])) {
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

			header("Location: /bookshop?action=edit-subject");
			exit();
		} else {
			// update subject
			$updateSubjectResult = updateSubject($_SESSION['name'], $_SESSION['description']);
	
			if ($updateSubjectResult) {
				unset($_SESSION['name']);
        		unset($_SESSION['description']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Subject Successfully Updated";

                header("Location: /bookshop?action=subjects");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=edit-subject");
				exit();
			}
		}
	}
	
	// remove subject
	if (isset($_POST['removesubject'])) {
		session_start();
		$conn = openCon(); // connect to db
        $_SESSION['reason'] = mysqli_real_escape_string($conn,$_POST['reason']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['reason'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=delete-subject");
			exit();
		} else {

			// remove subject
			$removeSubjectResult = removeSubject($_SESSION['id'], $_SESSION['reason']);
	
			if ($removeSubjectResult) {
				unset($_SESSION['id']);
				unset($_SESSION['name']);
        		unset($_SESSION['reason']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Subject Successfully removed";

                header("Location: /bookshop?action=subjects");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=delete-subject");
				exit();
			}
		}
    }
?>