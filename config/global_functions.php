<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/db/mysql_conn.php";

    function getTime() {
        $now = new DateTime();
        $curr_time = $now->format('Y-m-d H:i:s');
        return $curr_time;
    }

    function logAction($action, $description) {
        $conn = openCon();
        $created_at = getTime();
        $last_modified_by = $_SESSION["loggedUserId"];
        $sql = "INSERT INTO logs(action, description, created_at, last_modified_by)
                VALUES('{$action}',
                        '{$description}',
                        '{$created_at}',
                        {$last_modified_by})";
                        
        $result = $conn->query($sql);
        $num = mysqli_affected_rows($conn);

        if($num > 0) {
            return 1;
        } else {
            return 0;
        }
                
        closeCon($conn);
    }

    function validEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 1;
        } else {
            return 0;
        }
    }

?>