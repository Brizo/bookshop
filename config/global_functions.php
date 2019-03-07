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

    function validPassword($password) {
        $error = '';

        if(strlen($password) < 8) {
            if (strlen($error) > 0) {
                $error .= " , Password Too Short"; 
            } else {
                $error = "Password Too Short";
            }
        }

        if(strlen($password) > 20) {
            if (strlen($error) > 0) {
                $error .= " , Password Too Long"; 
            } else {
                $error = "Password Too Long";
            }
        }

        if(!preg_match("#[0-9]+#", $password)) {
            if (strlen($error) > 0) {
                $error .= " , Password Must Include At Least One Number"; 
            } else {
                $error = "Password Must Include At Least One Number";
            }
        }

        if(!preg_match("#[a-z]+#", $password)) {
            if (strlen($error) > 0) {
                $error .= " , Password Must Include At Least One Letter"; 
            } else {
                $error = "Password Must Include At Least One Letter";
            }
        }

        if(!preg_match("#[A-Z]+#", $password)) {
            if (strlen($error) > 0) {
                $error .= " , Password Must Include At Least One CAPS"; 
            } else {
                $error = "Password Must Include At Least One CAPS";
            }
        }

        if(!preg_match("#\W+#", $password)) {
            if (strlen($error) > 0) {
                $error .= " , Password Must Include At Least One Symbol"; 
            } else {
                $error = "Password Must Include At Least One Symbol";
            }
        }

        return $error;
    }

?>