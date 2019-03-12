<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/reports/controller.php";
    
    if (isset($_GET['student']) && isset($_GET['status'])) {
        $stdId = $_GET['student'];
        $status = $_GET['status'];
        if ($status == 1) {
            $type = "Unsettled Loans";
            $debt = retrieveStdDebt($stdId);
        } else {
            $type = "Settled Loans";
        }
        $loans = array();
        $queryResult = retrieveStdStatement($stdId, $status);
        while ($row = mysqli_fetch_array($queryResult)) {
            $loans[] = $row;
        }
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
						<b>Student <?php echo $type; ?> Loans</b>
					</div>
					<div class="panel-body">
                        <a class="btn btn-warning" data-keyboard="false" href="/bookshop?action=exportLoanedBooks"><span class="glyphicon glyphicon-ok"></span>&nbsp;Export CSV</a>&nbsp;
                        <a class="btn btn-warning" data-keyboard="false" href="/bookshop?action=exportLoanedBooks"><span class="glyphicon glyphicon-ok"></span>&nbsp;Export PDF</a><br /><br />
                        <table id="stdStatementTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>Book</th>
                                    <th>Issue date</th>
                                    <th>Return date</th>
                                    <th>Price</th>
                                    <th>Levie</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($loans as $row): ?>
                                    <tr>
                                        <td><?=$row['clientName']?></td>
                                        <td><?=$row['bookName']?></td>
                                        <td><?=$row['issue_date']?></td>
                                        <td><?=$row['return_date']?></td>
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