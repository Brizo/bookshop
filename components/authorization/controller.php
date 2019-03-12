<?php
	session_start();
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/school/controller.php";
	include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/components/authorization/model.php";

  if (isset($_POST['local'])) {
		// check if db connection string works
		$conn2 = openCon();
		if ($conn2->connect_error) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "A database connection rrror has occurred, Please check your connection string";

			header("Location: /bookshop");
			exit();
		}

		// form data
		$_SESSION['username'] = mysqli_real_escape_string($conn2,$_POST['username']);
		$_SESSION['password'] = mysqli_real_escape_string($conn2,$_POST['password']); // use on front end before echo htmlspecialchars
		closeCon($conn2);
	
		// check if user filled fields and throw error if not
		if (empty($_SESSION['username']) || empty($_SESSION['password'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all information.";

			header("Location: /bookshop");
			exit();
		} else {

			$userLoginResult = localUserLogin($_SESSION['username']);
	
			if ($userLoginResult){
				$query_num_rows = mysqli_num_rows($userLoginResult);

				if ($query_num_rows > 0){ 
					$userData = mysqli_fetch_assoc($userLoginResult);
					$dbPassword = $userData['password'];

					if (!password_verify($_SESSION['password'], $dbPassword)) {
						$_SESSION["alert"] = "danger";
						$_SESSION["status"] = "Error";
						$_SESSION["message"] = "Incorrect password supplied. Please enter correct password and try again.";
						
						header("Location: /bookshop");
						exit();
					} else {
						
						$_SESSION['loggedRole'] = $userData['user_role'];			    	
						$_SESSION['loggedUsername'] = $userData['username'];
						$_SESSION["loggedUserId"] = $userData['id'];
						$_SESSION["logged"] = true;
						$_SESSION["alert"] = "info";
						$_SESSION["status"] = "Welcome";
						$_SESSION["message"] = "Logged in successfully, welcome";
						$_SESSION['instance'] = "Development";
						$_SESSION['version'] = "1.0.0";

						// get account information
						$accountExist = accountExist();

						if ($accountExist == 1) {
							$getAccountResult = retrieveAccount();
							$account = mysqli_fetch_array($getAccountResult);
							$_SESSION['accountName'] = $account['name'];
						}


						$action = "Login";
						$description = $_SESSION['username'];
						$logResults = logAction($action, $description);

						unset($_SESSION['username']);
						unset($_SESSION['password']);

						header( "Location: /bookshop?action=home");
						exit();
					}
				} else {
					$_SESSION["alert"] = "danger";
					$_SESSION["status"] = "Error";
					$_SESSION["message"] = "Username doesnot exist. Please enter correct username and try again";

					header("Location: /bookshop");
					exit();
				}
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header( "Location: /bookshop");
				exit();
			}
		}
  }
?>