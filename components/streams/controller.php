<?php
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/streams/model.php";

	// get all strams
	function retrieveStreams() {
		return getStreams();
	}

	// add new stream
	if (isset($_POST['addnewstream'])) {
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

			header("Location: /bookshop?action=new-stream");
			exit();
		} else {
			// add stream
			$addStreamResult = addStream($_SESSION['name'], $_SESSION['description']);
	
			if ($addStreamResult) {
				// log action
				$action = "Add stream";
				$description = "Stream : ".$_SESSION['name'];
				$logResults = logAction($action, $description);

				unset($_SESSION['name']);
        		unset($_SESSION['description']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Stream Successfully Added";

                header("Location: /bookshop?action=new-stream");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=new-stream");
				exit();
			}
		}
	}
	
	// update stream
	if (isset($_POST['updatestream'])) {
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

			header("Location: /bookshop?action=edit-stream");
			exit();
		} else {
			// update stream
			$updateStreamResult = updateStream($_SESSION['name'], $_SESSION['description']);
	
			if ($updateStreamResult) {
				// log action
				$action = "Update stream";
				$description = "Stream : ".$_SESSION['name'];
				$logResults = logAction($action, $description);

				unset($_SESSION['name']);
        		unset($_SESSION['description']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Stream Successfully Updated";

                header("Location: /bookshop?action=streams");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=edit-stream");
				exit();
			}
		}
	}
	
	// remove stream
	if (isset($_POST['removestream'])) {
		session_start();
		$conn = openCon(); // connect to db
        $_SESSION['reason'] = mysqli_real_escape_string($conn,$_POST['reason']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['reason'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=delete-stream");
			exit();
		} else {

			// remove stream
			$removeStreamResult = removeStream($_SESSION['id'], $_SESSION['reason']);
	
			if ($removeStreamResult) {
				// log action
				$action = "Remove stream";
				$description = "Stream : ".$_SESSION['name'];
				$logResults = logAction($action, $description);

				unset($_SESSION['id']);
				unset($_SESSION['name']);
        		unset($_SESSION['reason']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Stream Successfully removed";

                header("Location: /bookshop?action=streams");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=delete-stream");
				exit();
			}
		}
    }
?>