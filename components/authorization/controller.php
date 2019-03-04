<?php
	session_start();
	$_SESSION['home'] = "bookshop";
	include "model.php";

  if (isset($_POST['local'])) {
		$conn2 = openCon();
		$_SESSION['username'] = mysqli_real_escape_string($conn2,$_POST['username']);
		$_SESSION['password'] = mysqli_real_escape_string($conn2,$_POST['password']); // use on front end before echo htmlspecialchars
		closeCon($conn2);
	
		// check if user filled fields and throw error if not
		if (empty($_SESSION['username']) || empty($_SESSION['password'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all information.";

			header("Location: /".$_SESSION['home']);
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
						
						header("Location: /".$_SESSION['home']);
						exit();
					} else {
						
						$_SESSION['loggedRole'] = $userData['user_role'];			    	
						$_SESSION['loggedUsername'] = $userData['username'];
						$_SESSION["loggedUserId"] = $userData['id'];
						$_SESSION["logged"] = true;
						$_SESSION["alert"] = "info";
						$_SESSION["status"] = "Welcome";
						$_SESSION["message"] = "Logged in successfully. Welcome";
						$_SESSION['instance'] = "Development";
						$_SESSION['version'] = "1.0.0";

						$action = "Login";
						$description = $_SESSION['username'];
						$logResults = logAction($action, $description);

						unset($_SESSION['username']);
						unset($_SESSION['password']);

						header( "Location: /".$_SESSION['home']."?action=home");
						exit();
					}
				} else {
					$_SESSION["alert"] = "danger";
					$_SESSION["status"] = "Error";
					$_SESSION["message"] = "Username doesnot exist. Please enter correct username and try again";

					header("Location: /".$_SESSION['home']);
					exit();
				}
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header( "Location: /".$_SESSION['home'] );
				exit();
			}
		}
  }
?>