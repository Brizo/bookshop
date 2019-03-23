<?php
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/users/model.php";

	// get all users
	function retrieveUsers() {
		return getUsers();
	}

	// add new user
	if (isset($_POST['addnewuser'])) {
		session_start();
		$conn = openCon(); // connect to db
        $_SESSION['first_name'] = mysqli_real_escape_string($conn,$_POST['first_name']);
        $_SESSION['middle_name'] = mysqli_real_escape_string($conn,$_POST['middle_name']);
		$_SESSION['last_name'] = mysqli_real_escape_string($conn,$_POST['last_name']);
		$_SESSION['user_role'] = mysqli_real_escape_string($conn,$_POST['user_role']);
		$_SESSION['empid'] = mysqli_real_escape_string($conn,$_POST['empid']);
		$_SESSION['passwordu'] = mysqli_real_escape_string($conn,$_POST['passwordu']);
        $_SESSION['passwordu2'] = mysqli_real_escape_string($conn,$_POST['passwordu2']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['first_name']) || empty($_SESSION['last_name']) || empty($_SESSION['user_role']) 
				|| empty($_SESSION['empid']) || empty($_SESSION['passwordu']) || empty($_SESSION['passwordu2'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=new-user");
			exit();
		} else if ($_SESSION['passwordu'] != $_SESSION['passwordu2']) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Entered passwords do not match.";

			header("Location: /bookshop?action=new-user");
			exit();
		} else {
			// check if id already used
			$getByEmpIdResult = getUserByField("employee_number", $_SESSION['empid']);
			$getByEmpIdNum = mysqli_num_rows($getByEmpIdResult);

			if ($getByEmpIdNum > 0) {
				$_SESSION["alert"] = "warning";
				$_SESSION["status"] = "Warning";
				$_SESSION["message"] = "User Id already exist, please choose a different one.";

				header("Location: /bookshop?action=new-user");
				exit();
			}

			// check password
			$checkPasswordResult = validPassword($_SESSION['passwordu2']);

			if (strlen($checkPasswordResult) > 0) {
				$_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = $checkPasswordResult;

				header("Location: /bookshop?action=new-user");
				exit();
			}

			// hash password
			$options = [ 'cost' => 12, ];
			$hashedPassword = password_hash($_SESSION['passwordu2'], PASSWORD_BCRYPT, $options);
			$username = $_SESSION['username_prefix'].$_SESSION['empid'];

			// add user
			$addUserResult = addUser($_SESSION['first_name'], $_SESSION['middle_name'], $_SESSION['last_name'],$_SESSION['empid'] ,
				$username, $hashedPassword, $_SESSION['user_role']);
	
			if ($addUserResult) {
				// log action
				$action = "Add user";
				$description = "User : ".$_SESSION['first_name']." ".$_SESSION['last_name']."-".$username;
				$logResults = logAction($action, $description);

				unset($_SESSION['first_name']);
        		unset($_SESSION['middle_name']);
				unset($_SESSION['last_name']);
				unset($_SESSION['user_role']);
				unset($_SESSION['passwordu']);
				unset($_SESSION['passwordu2']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "User Successfully Added";

                header("Location: /bookshop?action=new-user");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=new-user");
				exit();
			}
		}
	}

	// change password
	if (isset($_POST['changeuserpass'])) {
		session_start();
		$conn = openCon(); // connect to db
		$_SESSION['usernamep'] = mysqli_real_escape_string($conn,$_POST['usernamep']);
		$_SESSION['passwordp'] = mysqli_real_escape_string($conn,$_POST['passwordp']);
        $_SESSION['passwordp2'] = mysqli_real_escape_string($conn,$_POST['passwordp2']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['usernamep']) || empty($_SESSION['passwordp']) || empty($_SESSION['passwordp2'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=change-password");
			exit();
		} else if ($_SESSION['passwordp'] != $_SESSION['passwordp2']) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Entered passwords do not match.";

			header("Location: /bookshop?action=change-password");
			exit();
		} else {

			// check password
			$checkPasswordResult = validPassword($_SESSION['passwordp2']);

			if (strlen($checkPasswordResult) > 0) {
				$_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = $checkPasswordResult;

				header("Location: /bookshop?action=change-password");
				exit();
			}

			// hash password
			$options = [ 'cost' => 12, ];
			$hashedPassword = password_hash($_SESSION['passwordp2'], PASSWORD_BCRYPT, $options);

			// change user password
			$changeUserPassResult = changeUserPassword($_SESSION['username'],$hashedPassword);
	
			if ($changeUserPassResult) {
				// log action
				$action = "Admin change user password";
				$description = "User : ".$_SESSION['username'];
				$logResults = logAction($action, $description);

				unset($_SESSION['username']);
				unset($_SESSION['password']);
				unset($_SESSION['password2']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "User Password Successfully Changed";

                header("Location: /bookshop?action=users");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=change-password");
				exit();
			}
		}
	}

	// self change password
	if (isset($_POST['selfchangepwd'])) {
		session_start();
		$conn = openCon(); // connect to db
		$_SESSION['oldpassword'] = mysqli_real_escape_string($conn,$_POST['oldpassword']);
		$_SESSION['newpassword'] = mysqli_real_escape_string($conn,$_POST['newpassword']);
        $_SESSION['newpassword2'] = mysqli_real_escape_string($conn,$_POST['newpassword2']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['oldpassword']) || empty($_SESSION['newpassword']) || empty($_SESSION['newpassword2'])) {
			$_SESSION["selfchangepwdfailure"] = "true";
			$_SESSION["alert2"] = "danger";
			$_SESSION["status2"] = "Error";
			$_SESSION["message2"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=home");
			exit();
		} else if ($_SESSION['newpassword'] != $_SESSION['newpassword2']) {
			$_SESSION["selfchangepwdfailure"] = "true";
			$_SESSION["alert2"] = "danger";
			$_SESSION["status2"] = "Error";
			$_SESSION["message2"] = "Entered passwords do not match.";

			header("Location: /bookshop?action=home");
			exit();
		} else {
			// get old password
			$userDetailsResult = localUserLogin($_SESSION['loggedUsername']);
			$userData = mysqli_fetch_assoc($userLoginResult);
			$dbPassword = $userData['password'];

			// check if old password is correct
			if (!password_verify($_SESSION['oldpassword'], $dbPassword)) {
				$_SESSION["selfchangepwdfailure"] = "true";
				$_SESSION["alert2"] = "danger";
				$_SESSION["status2"] = "Error";
				$_SESSION["message2"] = "Wrong Old Password Entered.";
	
				header("Location: /bookshop?action=home");
				exit();
			}

			// check password
			$checkPasswordResult = validPassword($_SESSION['newpassword2']);

			if (strlen($checkPasswordResult) > 0) {
				$_SESSION["selfchangepwdfailure"] = "true";
				$_SESSION["alert2"] = "danger";
				$_SESSION["status2"] = "Error";
				$_SESSION["message2"] = $checkPasswordResult;

				header("Location: /bookshop?action=home");
				exit();
			}

			// hash password
			$options = [ 'cost' => 12, ];
			$hashedPassword = password_hash($_SESSION['newpassword2'], PASSWORD_BCRYPT, $options);

			// change user password
			$changeUserPassResult = changeUserPassword($_SESSION['loggedUsername'],$hashedPassword);
	
			if ($changeUserPassResult) {
				// log action
				$action = "Self change password";
				$description = "User : ".$_SESSION['loggedUsername'];
				$logResults = logAction($action, $description);

				unset($_SESSION['oldpassword']);
				unset($_SESSION['newpassword']);
				unset($_SESSION['newpassword2']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Your Password Has Been Successfully Changed, will take effect on next login";

                header("Location: /bookshop?action=home");
                exit();
			} else {
				$_SESSION["selfchangepwdfailure"] = "true";
			    $_SESSION["alert2"] = "danger";
				$_SESSION["status2"] = "Error";
				$_SESSION["message2"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=home");
				exit();
			}
		}
	}
	
	// update user
	if (isset($_POST['updateuser'])) {
		session_start();
		$conn = openCon(); // connect to db
        $_SESSION['first_name'] = mysqli_real_escape_string($conn,$_POST['first_name']);
        $_SESSION['middle_name'] = mysqli_real_escape_string($conn,$_POST['middle_name']);
		$_SESSION['last_name'] = mysqli_real_escape_string($conn,$_POST['last_name']);
		$_SESSION['user_role'] = mysqli_real_escape_string($conn,$_POST['user_role']);
		$_SESSION['status'] = mysqli_real_escape_string($conn,$_POST['status']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['first_name']) || empty($_SESSION['last_name']) || empty($_SESSION['user_role'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=edit-user");
			exit();
		} else {
			if ($_SESSION['status'] == "0") {
				$_SESSION['status'] = $_SESSION['account_status'];
			}
			
			// update user
			$updateUserResult = updateUser($_SESSION['id'], $_SESSION['first_name'], $_SESSION['middle_name'], $_SESSION['last_name'], 
				$_SESSION['user_role'], $_SESSION['status']);
	
			if ($updateUserResult) {
				// log action
				$action = "Update user";
				$description = "User : ".$_SESSION['first_name']." ".$_SESSION['last_name'];
				$logResults = logAction($action, $description);

				unset($_SESSION['first_name']);
        		unset($_SESSION['middle_name']);
				unset($_SESSION['last_name']);
				unset($_SESSION['user_role']);
				unset($_SESSION['account_status']);
				unset($_SESSION['status']);
				unset($_SESSION['id']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "User Successfully Updated";

                header("Location: /bookshop?action=users");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=edit-user");
				exit();
			}
		}
	}
	
	// remove user
	if (isset($_POST['removeuser'])) {
		session_start();
		$conn = openCon(); // connect to db
        $_SESSION['reason'] = mysqli_real_escape_string($conn,$_POST['reason']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['reason'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=delete-user");
			exit();
		} else {

			// remove user
			$removeUserResult = removeUser($_SESSION['id'], $_SESSION['reason']);
	
			if ($removeUserResult) {
				// log action
				$action = "Remove user";
				$description = "User : ".$_SESSION['username'];
				$logResults = logAction($action, $description);

				unset($_SESSION['id']);
				unset($_SESSION['username']);
        		unset($_SESSION['reason']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "User Successfully removed";

                header("Location: /bookshop?action=users");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=delete-user");
				exit();
			}
		}
    }
?>