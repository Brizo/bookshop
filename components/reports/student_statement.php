<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/reports/controller.php";
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/students/controller.php";
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/school/controller.php";
    
    if (isset($_GET['student']) && isset($_GET['year'])) {
        $stdId = $_GET['student'];
        $year = $_GET['year'];

        $loans = array();
        $queryResult = retrieveStdStatement($stdId, $year);
        while ($row = mysqli_fetch_array($queryResult)) {
            $loans[] = $row;
        }

        $getStudentResult = getStudentByField("id", $stdId);
        $student = mysqli_fetch_array($getStudentResult);
        $studentno = $student['student_no'];

        $getAccountResult = retrieveAccount();
        $account = mysqli_fetch_array($getAccountResult);
        
        $debt = retrieveStdDebt($stdId);
        $debt = round($debt,2);

        $html = generateStatementTemplate($student, $account, $loans, $debt);

        $stamentSuffix = "student-statement.pdf";
        $filename = "/bookshop/docs/".$studentno."-".$stamentSuffix;
        
        downloadPdf($filename, $html);
    }
?>

<div class="panel panel-primary">
	<div class="panel-heading">
    	<b>Reports</b>
    </div>
	<div class="panel-body">
		<div class="row">
			<div class="col col-sm-2">
				<?php include "partials/reports_side_nav.php"; ?>  
			</div>
			<div class="col col-sm-10">
				<div class="panel panel-default">
					<div class="panel-heading">
						<b>Student <?php echo $year; ?> Loans</b>
					</div>
					<div class="panel-body">
                        <a class="btn btn-warning" data-keyboard="false" href="#"><span class="glyphicon glyphicon-ok"></span>&nbsp;Export CSV</a>&nbsp;
                        <a class="btn btn-warning" data-keyboard="false" href="<?php echo $filename; ?>" target="_blank"><span class="glyphicon glyphicon-ok"></span>&nbsp;Export PDF</a><br /><br />
                        <table id="stdStatementTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>Book</th>
                                    <th>Barcode</th>
                                    <th>Issue date</th>
                                    <th>Status</th>
                                    <th>Returned date</th>
                                    <th>Price</th>
                                    <th>Levie</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($loans as $row): ?>
                                    <tr>
                                        <td><?=$row['clientName']?></td>
                                        <td><?=$row['bookName']?></td>
                                        <td><?=$row['bar_code']?></td>
                                        <td><?=$row['issue_date']?></td>
                                        <td><?=$row['status']?></td>
                                        <td><?=$row['returned_date']?></td>
                                        <td><?=$row['price']?></td>
                                        <td><?=$row['levie']?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <br>
                        <?php if ($_SESSION['loggedRole'] == 'admin'): ?>
                            <h3>Total Outstanding : E <?php echo $debt; ?> </h3>
                        <?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#stdStatementTable').dataTable();
    });
</script>