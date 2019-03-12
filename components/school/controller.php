<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/school/model.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

    // check if account exist
	function accountExist() {
        $getCountResult = countAccount();
        $result = mysqli_fetch_array($getCountResult);
        
        if ($result['count'] > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    // get account unit info
    function retrieveAccount() {
		return getAccount();
    }
    
    // add new account unit
	if (isset($_POST['addnewaccount'])) {
		session_start();
		$conn = openCon(); // connect to db
        $_SESSION['name'] = mysqli_real_escape_string($conn,$_POST['name']);
        $_SESSION['contact_person'] = mysqli_real_escape_string($conn,$_POST['contact_person']);
		$_SESSION['telephone'] = mysqli_real_escape_string($conn,$_POST['telephone']);
		$_SESSION['fax'] = mysqli_real_escape_string($conn,$_POST['fax']);
        $_SESSION['email_address'] = mysqli_real_escape_string($conn,$_POST['email_address']);
        $_SESSION['website'] = mysqli_real_escape_string($conn,$_POST['website']);
        $_SESSION['postal_address'] = mysqli_real_escape_string($conn,$_POST['postal_address']);
        $_SESSION['physical_address'] = mysqli_real_escape_string($conn,$_POST['physical_address']);
		$_SESSION['username_prefix'] = mysqli_real_escape_string($conn,$_POST['username_prefix']);
		$_SESSION['book_circulation'] = mysqli_real_escape_string($conn,$_POST['book_circulation']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['name']) || empty($_SESSION['contact_person']) || empty($_SESSION['telephone']) || empty($_SESSION['postal_address']) || empty($_SESSION['physical_address']) || empty($_SESSION['username_prefix'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=school");
			exit();
		} else if (!is_numeric($_SESSION['telephone'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Telephone should be numeric.";

			header("Location: /bookshop?action=school");
			exit();
		} else if (!empty($_SESSION['email_address']) && (validEmail($_SESSION['email_address']) == 0)) {
            $_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Invalid email entered, please enter correct email and try again.";

			header("Location: /bookshop?action=school");
			exit();
        } else {
			// add account
            $addAccountResult = addAccount($_SESSION['name'], $_SESSION['contact_person'], $_SESSION['telephone'], $_SESSION['fax'], $_SESSION['email_address'], 
                $_SESSION['website'], $_SESSION['postal_address'], $_SESSION['physical_address'], $_SESSION['username_prefix'], $_SESSION['book_circulation']);
	
			if ($addAccountResult) {
				unset($_SESSION['name']);
        		unset($_SESSION['contact_person']);
				unset($_SESSION['telephone']);
				unset($_SESSION['fax']);
        		unset($_SESSION['email_address']);
        		unset($_SESSION['website']);
                unset($_SESSION['postal_address']);
                unset($_SESSION['physical_address']);
				unset($_SESSION['username_prefix']);
				unset($_SESSION['book_circulation']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Account Successfully Added";

                header("Location: /bookshop?action=school");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=school");
				exit();
			}
		}
    }
    
    // update account unit
	if (isset($_POST['updateaccount'])) {
		session_start();
		$conn = openCon(); // connect to db
        $_SESSION['aname'] = mysqli_real_escape_string($conn,$_POST['aname']);
        $_SESSION['contact_person'] = mysqli_real_escape_string($conn,$_POST['contact_person']);
		$_SESSION['telephone'] = mysqli_real_escape_string($conn,$_POST['telephone']);
		$_SESSION['fax'] = mysqli_real_escape_string($conn,$_POST['fax']);
        $_SESSION['email_address'] = mysqli_real_escape_string($conn,$_POST['email_address']);
        $_SESSION['website'] = mysqli_real_escape_string($conn,$_POST['website']);
        $_SESSION['postal_address'] = mysqli_real_escape_string($conn,$_POST['postal_address']);
        $_SESSION['physical_address'] = mysqli_real_escape_string($conn,$_POST['physical_address']);
		$_SESSION['username_prefix'] = mysqli_real_escape_string($conn,$_POST['username_prefix']);
		$_SESSION['book_circulation'] = mysqli_real_escape_string($conn,$_POST['book_circulation']);
		closeCon($conn); // disconnect from db
	
		// // check fields and throw error if empty
		if (empty($_SESSION['aname']) || empty($_SESSION['contact_person']) || empty($_SESSION['telephone']) || empty($_SESSION['postal_address']) || empty($_SESSION['physical_address']) || empty($_SESSION['username_prefix'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Please fill all mandatory information.";

			header("Location: /bookshop?action=school");
			exit();
		} else if (!is_numeric($_SESSION['telephone'])) {
			$_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Telephone should be numeric.";

			header("Location: /bookshop?action=school");
			exit();
		} else if (!empty($_SESSION['email_address']) && (validEmail($_SESSION['email_address']) == 0)) {
            $_SESSION["alert"] = "danger";
			$_SESSION["status"] = "Error";
			$_SESSION["message"] = "Invalid email entered, please enter correct email and try again.";

			header("Location: /bookshop?action=school");
			exit();
        } else {
			// add account
            $addAccountResult = updateAccount($_SESSION['id'], $_SESSION['aname'], $_SESSION['contact_person'], $_SESSION['telephone'], $_SESSION['fax'], $_SESSION['email_address'], 
                $_SESSION['website'], $_SESSION['postal_address'], $_SESSION['physical_address'], $_SESSION['username_prefix'], $_SESSION['book_circulation']);
	
			if ($addAccountResult) {
                unset($_SESSION['id']);
				unset($_SESSION['aname']);
        		unset($_SESSION['contact_person']);
				unset($_SESSION['telephone']);
				unset($_SESSION['fax']);
        		unset($_SESSION['email_address']);
        		unset($_SESSION['website']);
                unset($_SESSION['postal_address']);
                unset($_SESSION['physical_address']);
				unset($_SESSION['username_prefix']);
				unset($_SESSION['book_circulation']);
				
                $_SESSION["alert"] = "success";
                $_SESSION["status"] = "Success";
                $_SESSION["message"] = "Account Successfully Updated";

                header("Location: /bookshop?action=school");
                exit();
			} else {
			    $_SESSION["alert"] = "danger";
				$_SESSION["status"] = "Error";
				$_SESSION["message"] = "A database error has occured, please contact system administrator.";

				header("Location: /bookshop?action=school");
				exit();
			}
		}
	}

?>