<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/db/mysql_conn.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/assets/lib/PHPMailer/PHPMailerAutoload.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/bookshop/assets/lib/MPDF57/mpdf.php";

    function getTime() {
        $now = new DateTime();
        $currDate = $now->format('Y-m-d H:i:s');
        return $currDate;
    }

    function getYear() {
        $now = new DateTime();
        $year = $now->format('Y');
        return intval($year);
    }

    function getMonth() {
        $now = new DateTime();
        $month = $now->format('m');
        return intval($month);
    }

    function getDay() {
        $now = new DateTime();
        $day = $now->format('d');
        return intval($day);
    }

    function getCurrentTime() {
        $now = new DateTime();
        $currTime = $now->format('H:i:s');
        return $currTime;
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

    // generate statement template
    function generateStatementTemplate($student, $account, $loans, $debt){
        $studentFName = $student['first_name'];
		$studentno = $student['student_no'];
        $studentMName = $student['middle_name'];
        $studentLName = $student['last_name'];
        $dateOfBirth = $student['birth_date'];
        $contactNo = $student['contact_no'];
        $emailAddress = $student['email_address'];
        $gender = $student['gender'];
        $stream = $student['stream'];
        $class = $student['class'].$student['class_level'];

        $schoolname = $account['name'];
        $postal = $account['postal_address'];
        $contactPerson = $account['contact_person'];
        $telephone = $account['telephone'];

        $logo = $_SERVER['DOCUMENT_ROOT']."/bookshop/assets/images/SEC.png";

        $table = "<table class='table table-bordered' style='padding:20px;'>
        <thead>
            <tr>
                <th>Student</th>
                <th>Book</th>
                <th>Barcode</th>
                <th>Issue date</th>
                <th>Return date</th>
                <th>Price</th>
                <th>Levie</th>
            </tr>
        </thead>
        <tbody>";

        foreach($loans as $row) {
            $clientName = $row['clientName'];
            $bookName = $row['bookName'];
            $barCode = $row['bar_code'];
            $dateIssued = $row['issue_date'];
            $dateReturned = $row['returned_date'];
            $price = $row['price'];
            $levie = $row['levie'];
            $table = $table."<tr>
                <td>{$clientName}</td>
                <td>{$bookName}</td>
                <td>{$barCode}</td>
                <td>{$dateIssued}</td>
                <td>{$dateReturned}</td>
                <td>{$price}</td>
                <td>{$levie}</td>
            </tr>";
        }

        $table = $table."</tbody></table><br><h3>Total Outstanding : E {$debt} </h3>";

        // echo $table;exit();

        $html = "
            <body class='grid-container'>
                <div class='row'>
                    <div class='col-10'>
                        <div class='row'>
                            <div class='col-12'>
                                <div style='border: 0.3px solid;padding: 5px;color: #337ab7; font-weight: bold;'>{$schoolname} &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; STUDENT STATEMENT</div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-12'>
                                <div style='border: 0.3px solid;padding: 5px; height:60px;'>
                                    <div class='row'>
                                        <div class='col-12'>
                                            &emsp;{$contactPerson}<br>
                                            &emsp;{$postal}<br>
                                            &emsp;{$telephone}<br>
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col-2'>
                                            &emsp;
                                        </div>
                                        <div class='col-8'>
                                            &emsp;
                                        </div>
                                        <div class='col-2'>
                                            &emsp;
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col-12'>
                                            &emsp;
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-4'>
                                <div style='border: 0.3px solid; border-left: 0px; padding: 5px;background-color: #337ab7;color:white;'>MR./MRS./MISS.</div>
                            </div>
                            <div class='col-8'>
                                <div style='border: 0.3px solid;padding: 5px;'>&emsp;</div>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='col-12'>
                                <div style='border: 0.3px solid;padding: 5px; height:60px;'>{$studentFName}<br>{$studentMName}<br>{$studentLName}<br>{$studentno}</div>
                            </div>
                        </div>
                    </div>
                    <div class='col-2'>
                        <div class='row'>
                            <div class='col-12'>
                            <div style='height: 96px;border: 0.3px solid;'><img src='{$logo}' alt='logo face' height='95px' width='90px'>  
                            </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-12'>
                                <div style='border: 0.3px solid;padding: 5px;background-color: #337ab7;color:white;'>STREAM</div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-12'>
                                <div style='border: 0.3px solid;padding: 5px;'>{$stream}</div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-12'>
                                <div style='border: 0.3px solid;padding: 5px;background-color: #337ab7;color:white;'>CLASS</div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-12'>
                                <div style='border: 0.3px solid;padding: 5px;'>{$class}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-12'>
                        <div style='border: 0.3px solid;padding: 5px;height:700px;'>
                            <div class='row'>
                                {$table}
                            </div> 
                        </div>
                    </div>
                </div>

            </body>";

        return $html;
    }

    // download pdf 
    function downloadPdf($file, $template) {
        $path = $_SERVER['DOCUMENT_ROOT'];
        $wholeFile = $path.$file;

        if (file_exists($wholeFile)) {
            unlink($wholeFile);
        }
        
        $mpdf=new mPDF();
        $stylesheet = file_get_contents($_SERVER['DOCUMENT_ROOT']."/bookshop/assets/css/pdfstyles.css");
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($template,2);
        $stmName = $wholeFile;
        $mpdf->Output($stmName,"F");

        return $stmName;
    }

?>