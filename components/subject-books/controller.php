<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/subject-books/model.php";

    function retrieveSubjectBooks($subject) {
		return getSubjectBooks($subject);
    }
    
    // add subject book
	if (isset($_POST['addsubjectbook'])) {
		session_start();
		$conn = openCon(); // connect to db
        $_SESSION['subjectBook'] = mysqli_real_escape_string($conn,$_POST['subjectBook']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['subjectBook'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=new-subject-book");
			exit();
		} else {
			// add subject book
			$addSubjectBookResult = addSubjectBook($_SESSION['subjectBook'], $_SESSION['subjectId']);
	
			if ($addSubjectBookResult) {
				// log action
				$action = "Add book to subject";
				$description = "Subject : ".$_SESSION['subjectId'].", Book : ".$_SESSION['subjectBook'];
				$logResults = logAction($action, $description);

				unset($_SESSION['subjectBook']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Subject Book Successfully Added";

                header("Location: /bookshop?action=subject-books&id=".$_SESSION['subjectId']."&name=".$_SESSION['subjectName']);
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=new-subject-book");
				exit();
			}
		}
	}
?>