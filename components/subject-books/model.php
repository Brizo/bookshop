<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/config/global_functions.php";

    function getSubjectBooks($subject) {
        $conn = openCon();

        $sql = "SELECT S.subject id, B.name, B.isb, B.year, B.author, B.status
            FROM `book_subjects` S
            LEFT JOIN `books` B
            ON S.book = B.id
            WHERE S.subject = {$subject}";
        
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