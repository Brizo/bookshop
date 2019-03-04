<?php
    include "model.php";

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

?>