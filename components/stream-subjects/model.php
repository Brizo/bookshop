<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

    function getStreamSubjects($stream) {
        $conn = openCon();

        $sql = "SELECT T.subject id, S.name, S.description
            FROM `stream_subjects` T
            LEFT JOIN `subjects` S
            ON T.subject = S.id
            WHERE T.stream = $stream";
        
        $result = $conn->query($sql);
        closeCon($conn);
        return $result;
    }

    function addStreamSubject($subject, $stream) {
        $conn = openCon();
        $created_at = getTime();
        $last_modified_by = $_SESSION['loggedUserId'];
        $status = 1; // 1 = active, 0
        $sql = "INSERT INTO `stream_subjects`(`stream`, `subject`, `status`, `created_at`, `last_modified_by`) 
            VALUES({$stream},
                {$subject},
                {$status},
                '{$created_at}',
                {$last_modified_by})";

        $result = $conn->query($sql);
        closeCon($conn);
        return $result;
    }

?>