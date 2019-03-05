<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

    function getSubjectBooks($subject) {
        $conn = openCon();

        $sql = "SELECT T.subject id, S.name, S.isb, S.year, S.author, S.bar_code, S.state, S.status
            FROM `book_subjects` T
            LEFT JOIN `books` S
            ON T.book = S.id
            WHERE T.subject = $subject";
        
        $result = $conn->query($sql);
        closeCon($conn);
        return $result;
    }

    function addSubjectBook($book, $subject) {
        $conn = openCon();
        $created_at = getTime();
        $last_modified_by = $_SESSION['loggedUserId'];
        $status = 1; // 1 = active, 0
        $sql = "INSERT INTO `book_subjects`(`book`, `subject`, `status`, `created_at`, `last_modified_by`) 
            VALUES({$book},
                {$subject},
                {$status},
                '{$created_at}',
                {$last_modified_by})";

        $result = $conn->query($sql);
        closeCon($conn);
        return $result;
    }

?>