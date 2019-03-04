<?php
    session_start();
    $_SESSION['home'] = "bookshop";
    include $_SERVER['DOCUMENT_ROOT']."/".$_SESSION['home']."/config/global_functions.php";
    $_SESSION["loggedUserId"] = 1;
  
    // create variables
    $options = [
        'cost' => 12,
    ];
    $password = password_hash("P@ssw0rd", PASSWORD_BCRYPT, $options);
    $first_name = "Brian";
    $middle_name = "Sihlongonyane";
	$last_name = "Sihlongonyane";
    $user_role = "admin";
    $user_name = "admin";
    $account_status = 1;
    $password_status = 1;
    $created_at = getTime();
    $password_last_modified = getTime();;
    $last_modified_by = 1;
    
    //Execute the query
	$conn = openCon();
    $sql = "INSERT INTO users(first_name, middle_name, last_name, username, password, user_role, account_status,
                password_status, password_last_modified, created_at, last_modified_by)
            VALUES('{$first_name}',
                    '{$middle_name}',
                    '{$last_name}',
                    '{$user_name}',
                    '{$password}',
                    '{$user_role}',
                    {$account_status},
                    {$password_status},
                    '{$password_last_modified}',
                    '{$created_at}',
                    {$last_modified_by})";
                    
    $result = $conn->query($sql);
    $num = mysqli_affected_rows($conn);

    if($num > 0) {
        $action = "Create initial user";
        $description = $user_name;
        $logResults = logAction($action, $description);
        echo "User successfully created";
    } else {
        echo "User creation failed";
    }
            
    closeCon($conn);
?>