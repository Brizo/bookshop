<?php
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/students/model.php";

	// get all students
	function retrieveStudents() {
		return getStudents();
	}

	// add new students
	if (isset($_POST['addnewstudent'])) {
		session_start();
		$conn = openCon(); // connect to db
        $_SESSION['first_name'] = mysqli_real_escape_string($conn,$_POST['first_name']);
        $_SESSION['middle_name'] = mysqli_real_escape_string($conn,$_POST['middle_name']);
		$_SESSION['last_name'] = mysqli_real_escape_string($conn,$_POST['last_name']);
		$_SESSION['national_id'] = mysqli_real_escape_string($conn,$_POST['national_id']);
        $_SESSION['birth_date'] = mysqli_real_escape_string($conn,$_POST['birth_date']);
        $_SESSION['gender'] = mysqli_real_escape_string($conn,$_POST['gender']);
		$_SESSION['class'] = mysqli_real_escape_string($conn,$_POST['class']);
		$_SESSION['stream'] = mysqli_real_escape_string($conn,$_POST['stream']);
		$_SESSION['class_level'] = mysqli_real_escape_string($conn,$_POST['class_level']);
		$_SESSION['contact_no'] = mysqli_real_escape_string($conn,$_POST['contact_no']);
		$_SESSION['std_email_address'] = mysqli_real_escape_string($conn,$_POST['std_email_address']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['first_name']) || empty($_SESSION['last_name']) || empty($_SESSION['birth_date']) || empty($_SESSION['gender']) || empty($_SESSION['class']) 
			|| empty($_SESSION['stream']) || empty($_SESSION['class_level'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=new-student");
			exit();
		} else if (!empty($_SESSION['national_id']) && !is_numeric($_SESSION['national_id'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Id number should be numeric.";

			header("Location: /bookshop?action=new-student");
			exit();
		} else if (!empty($_SESSION['contact_no']) && !is_numeric($_SESSION['contact_no'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Contact number should be numeric.";

			header("Location: /bookshop?action=new-student");
			exit();
		} else if (!empty($_SESSION['std_email_address']) && !validEmail($_SESSION['std_email_address'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Invalid email address entered.";

			header("Location: /bookshop?action=new-student");
			exit();
		} else {
			// add student
			$addStudentResult = addStudent($_SESSION['first_name'], $_SESSION['middle_name'], $_SESSION['last_name'], $_SESSION['national_id'], $_SESSION['birth_date'], 
			$_SESSION['gender'], $_SESSION['class'], $_SESSION['stream'], $_SESSION['class_level'], $_SESSION['student_no'], $_SESSION['contact_no'], $_SESSION['std_email_address']);
	
			if ($addStudentResult) {
				// log action
				$action = "Add student";
				$description = "Student : ".$_SESSION['first_name']." ".$_SESSION['last_name']."-".$_SESSION['student_no'];
				$logResults = logAction($action, $description);

				unset($_SESSION['first_name']);
        		unset($_SESSION['middle_name']);
				unset($_SESSION['last_name']);
				unset($_SESSION['national_id']);
        		unset($_SESSION['birth_date']);
        		unset($_SESSION['gender']);
				unset($_SESSION['class']);
				unset($_SESSION['stream']);
				unset($_SESSION['class_level']);
				unset($_SESSION['student_no']);
				unset($_SESSION['contact_no']);
				unset($_SESSION['std_email_address']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Student Successfully Added";

                header("Location: /bookshop?action=new-student");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=new-student");
				exit();
			}
		}
	}
	
	// update students
	if (isset($_POST['updatestudent'])) {
		session_start();
		$conn = openCon(); // connect to db
        $_SESSION['first_nameu'] = mysqli_real_escape_string($conn,$_POST['first_nameu']);
        $_SESSION['middle_nameu'] = mysqli_real_escape_string($conn,$_POST['middle_nameu']);
		$_SESSION['last_nameu'] = mysqli_real_escape_string($conn,$_POST['last_nameu']);
		$_SESSION['national_idu'] = mysqli_real_escape_string($conn,$_POST['national_idu']);
        $_SESSION['birth_dateu'] = mysqli_real_escape_string($conn,$_POST['birth_dateu']);
        $_SESSION['genderu'] = mysqli_real_escape_string($conn,$_POST['genderu']);
		$_SESSION['classu'] = mysqli_real_escape_string($conn,$_POST['classu']);
		$_SESSION['streamu'] = mysqli_real_escape_string($conn,$_POST['streamu']);
		$_SESSION['class_levelu'] = mysqli_real_escape_string($conn,$_POST['class_levelu']);
		$_SESSION['student_nou'] = mysqli_real_escape_string($conn,$_POST['student_nou']);
		$_SESSION['contact_nou'] = mysqli_real_escape_string($conn,$_POST['contact_nou']);
		$_SESSION['std_email_addressu'] = mysqli_real_escape_string($conn,$_POST['std_email_addressu']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['first_nameu']) || empty($_SESSION['last_nameu']) || empty($_SESSION['birth_dateu']) || empty($_SESSION['genderu']) || empty($_SESSION['classu']) 
			|| empty($_SESSION['streamu']) || empty($_SESSION['class_levelu']) || empty($_SESSION['student_nou'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=edit-student");
			exit();
		} else if (!empty($_SESSION['national_idu']) && !is_numeric($_SESSION['national_idu'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Id number should be numeric.";

			header("Location: /bookshop?action=edit-student");
			exit();
		} else if (!empty($_SESSION['contact_nou']) && !is_numeric($_SESSION['contact_nou'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Contact number should be numeric.";

			header("Location: /bookshop?action=edit-student");
			exit();
		} else if (!empty($_SESSION['std_email_addressu']) && !validEmail($_SESSION['std_email_addressu'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Invalid email address entered.";

			header("Location: /bookshop?action=edit-student");
			exit();
		} else {

			// update student
			$updateStudentResult = updateStudent($_SESSION['idu'], $_SESSION['first_nameu'], $_SESSION['middle_nameu'], $_SESSION['last_nameu'], $_SESSION['national_idu'], $_SESSION['birth_dateu'],
			$_SESSION['genderu'], $_SESSION['classu'], $_SESSION['streamu'], $_SESSION['class_levelu'], $_SESSION['contact_nou'], $_SESSION['std_email_addressu']);
	
			if ($updateStudentResult) {
				// log action
				$action = "Update student";
				$description = "Student : ".$_SESSION['first_nameu']." ".$_SESSION['last_nameu']."-".$_SESSION['student_nou'];
				$logResults = logAction($action, $description);
				
				unset($_SESSION['first_nameu']);
        		unset($_SESSION['middle_nameu']);
				unset($_SESSION['last_nameu']);
				unset($_SESSION['national_idu']);
        		unset($_SESSION['birth_dateu']);
        		unset($_SESSION['genderu']);
				unset($_SESSION['classu']);
				unset($_SESSION['streamu']);
				unset($_SESSION['class_levelu']);
				unset($_SESSION['student_nou']);
				unset($_SESSION['contact_nou']);
				unset($_SESSION['std_email_addressu']);
				unset($_SESSION['idu']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Student Successfully Updated";

                header("Location: /bookshop?action=students");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=edit-student");
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

			header("Location: /bookshop?action=delete-student");
			exit();
		} else {

			// remove student
			$removeStudentResult = removeStudent($_SESSION['id'], $_SESSION['reason']);
	
			if ($removeStudentResult) {
				// log action
				$action = "Remove student";
				$description = "Student : ".$_SESSION['name'].", Reason : ".$_SESSION['reason'];
				$logResults = logAction($action, $description);
				
				unset($_SESSION['id']);
				unset($_SESSION['name']);
        		unset($_SESSION['reason']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Student Successfully removed";

                header("Location: /bookshop?action=students");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=delete-student");
				exit();
			}
		}
    }

?>