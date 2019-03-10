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
						<b>Replaced Books</b>
					</div>
					<div class="panel-body">
                        <a class="btn btn-warning" data-keyboard="false" href="/<?php echo $_SESSION['home'];?>?action=exportLoanedBooks"><span class="glyphicon glyphicon-export"></span>&nbsp;Export CSV</a>&nbsp;
                        <a class="btn btn-warning" data-keyboard="false" href="/<?php echo $_SESSION['home'];?>?action=exportLoanedBooks"><span class="glyphicon glyphicon-export"></span>&nbsp;Export PDF</a><br /><br />
                        <table id="replacedBooksTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Old Book</th>
                                    <th>New Book</th>
                                    <th>Date</th>
                                    <th>Replaced By</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $books = array();
                                    $queryResult = retrieveReplacedBooks();
                                    while ($row = mysqli_fetch_array($queryResult)) {
                                        $books[] = $row;
                                    }
                                ?>

                                <?php foreach($books as $row): ?>
                                    <tr>
                                        <td><?=$row['old_book']?></td>
                                        <td><?=$row['new_book']?></td>
                                        <td><?=$row['replaced_date']?></td>
                                        <td><?=$row['student']?></td>
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
        $('#replacedBooksTable').dataTable();
    });
</script>