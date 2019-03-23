<?php
    if (session_id() == ''){
		session_start();
    }
    include_once "mysql_conn.php";
    $_SESSION["instance"] = "Training";
  
    // create variables
    $options = [
        'cost' => 12,
    ];
    $now = new DateTime();
    $currDate = $now->format('Y-m-d H:i:s');

    $password = password_hash("P@ssw0rd", PASSWORD_BCRYPT, $options);
    $first_name = "Admin";
    $middle_name = "Admin";
	$last_name = "Admin";
    $user_role = "admin";
    $employee_number = "01";
    $user_name = "admin";
    $account_status = 1;
    $password_status = 1;
    $created_at = $currDate;
    $password_last_modified = $currDate;
    $last_modified_by = 1;
    
    //Execute the query
	$conn = openCon();
    $sql = "INSERT INTO `users`(`first_name`, `middle_name`, `last_name`, `username`, `employee_number`, `password`, `user_role`, `account_status`,
                `password_status`, `password_last_modified`, `created_at`, `last_modified_by`)
            VALUES('{$first_name}',
                    '{$middle_name}',
                    '{$last_name}',
                    '{$user_name}',
                    '{$employee_number}',
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
        echo "User successfully created ===> Username : admin, Password : P@ssw0rd";
    } else {
        echo "User creation failed";
    }
            
    closeCon($conn);
?>