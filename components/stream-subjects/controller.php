<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/stream-subjects/model.php";

    function retrieveStreamSubjects($stream) {
		return getStreamSubjects($stream);
    }
    
    // add stream subject
	if (isset($_POST['addstreamsubject'])) {
		session_start();
		$conn = openCon(); // connect to db
        $_SESSION['streamSubject'] = mysqli_real_escape_string($conn,$_POST['streamSubject']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['streamSubject'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=new-stream-subject");
			exit();
		} else {
			// add stream subject
			$addStreamSubjectResult = addStreamSubject($_SESSION['streamSubject'], $_SESSION['streamId']);
	
			if ($addStreamSubjectResult) {
				unset($_SESSION['streamSubject']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Stream Subject Successfully Added";

                header("Location: /bookshop?action=stream-subjects&id=".$_SESSION['streamId']."&name=".$_SESSION['streamName']);
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=new-stream-subject");
				exit();
			}
		}
	}
?>