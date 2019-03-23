<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/email/model.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

    // check if email configs exist
	function emailConfigsExist() {
        $getCountResult = countEmailConfigs();
        $result = mysqli_fetch_array($getCountResult);
        
        if ($result['count'] > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    // get email configs
    function retrieveEmailConfigs() {
		return getEmailConfigs();
    }
    
    // add new email configs
	if (isset($_POST['addnewemailconfigs'])) {
		session_start();
		$conn = openCon(); // connect to db
		$_SESSION['from_email'] = mysqli_real_escape_string($conn,$_POST['from_email']);
		$_SESSION['reply_to'] = mysqli_real_escape_string($conn,$_POST['reply_to']);
        $_SESSION['username'] = mysqli_real_escape_string($conn,$_POST['username']);
		$_SESSION['password'] = mysqli_real_escape_string($conn,$_POST['password']);
		$_SESSION['host'] = mysqli_real_escape_string($conn,$_POST['host']);
        $_SESSION['email_type'] = mysqli_real_escape_string($conn,$_POST['email_type']);
        $_SESSION['email_port'] = mysqli_real_escape_string($conn,$_POST['email_port']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['from_email']) || empty($_SESSION['username']) || empty($_SESSION['password']) || empty($_SESSION['host'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=email");
			exit();
		} else if (!empty($_SESSION['email_port']) && !is_numeric($_SESSION['email_port'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Email configs port should be numeric.";

			header("Location: /bookshop?action=email");
			exit();
		} else {
			if (empty($_SESSION['email_type'])) {
				$_SESSION['email_type'] = "SMTP";
			}

			if (empty($_SESSION['email_port'])) {
				$_SESSION['email_port'] = 25;
			}
			// add email configs
			$addEmailConfigsResult = addEmailConfigs($_SESSION['email_type'], $_SESSION['email_port'], $_SESSION['reply_to'], $_SESSION['from_email'], $_SESSION['username'], 
					$_SESSION['password'], $_SESSION['host']);
	
			if ($addEmailConfigsResult) {
				// log action
				$action = "Configure email settings";
				$description = "Email : ".$_SESSION['from_email'];
				$logResults = logAction($action, $description);

				unset($_SESSION['from_email']);
        		unset($_SESSION['reply_to']);
				unset($_SESSION['username']);
				unset($_SESSION['password']);
        		unset($_SESSION['host']);
        		unset($_SESSION['email_type']);
                unset($_SESSION['email_port']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Email Configs Successfully Added";

                header("Location: /bookshop?action=email");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=email");
				exit();
			}
		}
    }
    
    // update email configs
	if (isset($_POST['updateemailconfigs'])) {
		session_start();
		$conn = openCon(); // connect to db
		$_SESSION['from_email'] = mysqli_real_escape_string($conn,$_POST['from_email']);
		$_SESSION['reply_to'] = mysqli_real_escape_string($conn,$_POST['reply_to']);
        $_SESSION['username'] = mysqli_real_escape_string($conn,$_POST['username']);
		$_SESSION['password'] = mysqli_real_escape_string($conn,$_POST['password']);
		$_SESSION['host'] = mysqli_real_escape_string($conn,$_POST['host']);
        $_SESSION['email_type'] = mysqli_real_escape_string($conn,$_POST['email_type']);
        $_SESSION['email_port'] = mysqli_real_escape_string($conn,$_POST['email_port']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['from_email']) || empty($_SESSION['username']) || empty($_SESSION['password']) || empty($_SESSION['host'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=email");
			exit();
		} else if (!empty($_SESSION['email_port']) && !is_numeric($_SESSION['email_port'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Email configs port should be numeric.";

			header("Location: /bookshop?action=email");
			exit();
		} else {
			if (empty($_SESSION['email_type'])) {
				$_SESSION['email_type'] = "SMTP";
			}

			if (empty($_SESSION['email_port'])) {
				$_SESSION['email_port'] = 25;
			}
			// add email configs
			$updateEmailConfigsResult = updateEmailConfigs($_SESSION['id'], $_SESSION['email_type'], $_SESSION['email_port'], $_SESSION['reply_to'], $_SESSION['from_email'], $_SESSION['username'], 
					$_SESSION['password'], $_SESSION['host']);
	
			if ($updateEmailConfigsResult) {
				// log action
				$action = "Update email settings";
				$description = "Email : ".$_SESSION['from_email'];
				$logResults = logAction($action, $description);

				unset($_SESSION['from_email']);
        		unset($_SESSION['reply_to']);
				unset($_SESSION['username']);
				unset($_SESSION['password']);
        		unset($_SESSION['host']);
        		unset($_SESSION['email_type']);
				unset($_SESSION['email_port']);
				unset($_SESSION['id']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Email Configs Successfully Updated";

                header("Location: /bookshop?action=email");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=email");
				exit();
			}
		}
    }

?>