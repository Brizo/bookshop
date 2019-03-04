<?php
	include "model.php";

	function retrieveLoans() {
		return getLoans();
	}

	if (isset($_POST['addnewloan'])) {
		session_start();
		$conn = openCon();
		$_SESSION['username'] = mysqli_real_escape_string($conn,$_POST['accountd']);
		$_SESSION['password'] = mysqli_real_escape_string($conn,$_POST['mobiled']); // use on front end before echo htmlspecialchars
		closeCon($conn);
	
		// // check if user filled fields and throw error if not
		if (empty($_SESSION['username']) || empty($_SESSION['password'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all information.";

			header("Location: /bookshop?action=new-loan");
			exit();
		} else {
			echo "Ok";
			// $userLoginResult = localUserLogin($_SESSION['username']);
	
			// if ($userLoginResult){
			// 	$query_num_rows = mysqli_num_rows($userLoginResult);

			// 	if ($query_num_rows > 0){ 
			// 		$userData = mysqli_fetch_assoc($userLoginResult);
			// 		$dbPassword = $userData['password'];

			// 		if (!password_verify($_SESSION['password'], $dbPassword)) {
			// 			$_SESSION["alert"] = "danger";
			// 			$_SESSION["status"] = "Error";
			// 			$_SESSION["message"] = "Incorrect password supplied. Please enter correct password and try again.";
						
			// 			header("Location: /".$_SESSION['home']);
			// 			exit();
			// 		} else {
			// 			unset($_SESSION['username']);
			// 			unset($_SESSION['password']);
			// 			$_SESSION['loggedRole'] = $userData['user_role'];			    	
			// 			$_SESSION['loggedUsername'] = $userData['username'];
			// 			$_SESSION["loggedUserId"] = $userData['id'];
			// 			$_SESSION["logged"] = true;
			// 			$_SESSION["alert"] = "info";
			// 			$_SESSION["status"] = "Welcome";
			// 			$_SESSION["message"] = "Logged in successfully. Welcome";
			// 			$_SESSION['instance'] = "Development";
			// 			$_SESSION['version'] = "1.0.0";

			// 			$action = "Login";
			// 			$description = $user_name;
			// 			$logResults = logAction($action, $description);

			// 			header( "Location: /".$_SESSION['home']."?action=home");
			// 			exit();
			// 		}
			// 	} else {
			// 		$_SESSION["alert"] = "danger";
			// 		$_SESSION["status"] = "Error";
			// 		$_SESSION["message"] = "Username doesnot exist. Please enter correct username and try again";

			// 		header("Location: /".$_SESSION['home']);
			// 		exit();
			// 	}
			// } else {
			//     $_SESSION["alert"] = "danger";
			// 	$_SESSION["status"] = "Error";
			// 	$_SESSION["message"] = "A database error has occured, please contact system administrator.";

			// 	header( "Location: /".$_SESSION['home'] );
			// 	exit();
			// }
		}
   }
?>