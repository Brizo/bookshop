<?php
	include "controller.php";
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
						<b>Loaned Books</b>
					</div>
					<div class="panel-body">
                        <a class="btn btn-warning" data-keyboard="false" href="/<?php echo $_SESSION['home'];?>?action=exportLoanedBooks"><span class="glyphicon glyphicon-export"></span>&nbsp;Export CSV</a>&nbsp;
                        <a class="btn btn-warning" data-keyboard="false" href="/<?php echo $_SESSION['home'];?>?action=exportLoanedBooks"><span class="glyphicon glyphicon-export"></span>&nbsp;Export PDF</a><br /><br />
                        <table id="loanedBooksTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>Book</th>
                                    <th>Issue date</th>
                                    <th>Return date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $loans = array();
                                    $queryResult = retrieveLoanedBooks();
                                    while ($row = mysqli_fetch_array($queryResult)) {
                                        $loans[] = $row;
                                    }
                                ?>

                                <?php foreach($loans as $row): ?>
                                    <tr>
                                        <td><?=$row['client']?></td>
                                        <td><?=$row['book']?></td>
                                        <td><?=$row['issue_date']?></td>
                                        <td><?=$row['return_date']?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#loanedBooksTable').dataTable();
    });
</script>