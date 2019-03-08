<?php
	include "model.php";

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
		$_SESSION['usernameu'] = mysqli_real_escape_string($conn,$_POST['usernameu']);
		$_SESSION['passwordu'] = mysqli_real_escape_string($conn,$_POST['passwordu']);
        $_SESSION['passwordu2'] = mysqli_real_escape_string($conn,$_POST['passwordu2']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['first_name']) || empty($_SESSION['last_name']) || empty($_SESSION['user_role']) 
				|| empty($_SESSION['usernameu']) || empty($_SESSION['passwordu']) || empty($_SESSION['passwordu2'])) {
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
			// check if username already used
			$getByUsernameResult = getUserByField("username", $_SESSION['usernameu']);

			$getByUsernamecodeNum = mysqli_num_rows($getByUsernameResult);

			if ($getByUsernamecodeNum > 0) {
				$_SESSION["alert"] = "warning";
				$_SESSION["status"] = "Warning";
				$_SESSION["message"] = "Username already exist, please choose a different one.";

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

			// add user
			$addUserResult = addUser($_SESSION['first_name'], $_SESSION['middle_name'], $_SESSION['last_name'], 
				$_SESSION['usernameu'], $hashedPassword, $_SESSION['user_role']);
	
			if ($addUserResult) {
				unset($_SESSION['first_name']);
        		unset($_SESSION['middle_name']);
				unset($_SESSION['last_name']);
				unset($_SESSION['user_role']);
				unset($_SESSION['usernameu']);
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

			if (!empty($_SESSION['status']) && ($_SESSION['status'] != "0")) {
				if ($_SESSION['status'] == $_SESSION['account_status']) {
					$_SESSION["alert"] = "danger";
					$_SESSION["status"] = "Error";
					$_SESSION["message"] = "Account already in select status.";

					header("Location: /bookshop?action=edit-user");
					exit();
				} else {
					$_SESSION['account_status'] = $_SESSION['status'];
				}
			} 

			// update user
			$updateUserResult = updateUser($_SESSION['id'], $_SESSION['first_name'], $_SESSION['middle_name'], $_SESSION['last_name'], 
				$_SESSION['user_role'], $_SESSION['account_status']);
	
			if ($updateUserResult) {
				unset($_SESSION['first_name']);
        		unset($_SESSION['middle_name']);
				unset($_SESSION['last_name']);
				unset($_SESSION['user_role']);
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