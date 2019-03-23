<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/loans/controller.php";

    if (isset($_GET['id'])) {
        $bookCopyId = $_GET['id'];
        $loans = array();
        $queryResult = getBookLoanByField("book", $bookCopyId);
        while ($row = mysqli_fetch_array($queryResult)) {
            $loans[] = $row;
        }
    }

?>

<div class="row">
	<div class="col col-sm-2">
		<?php include "partials/main_side_nav.php"; ?>  
	</div>
	<div class="col col-sm-10">
		<div class="panel panel-primary">
			<div class="panel-heading">
				 <h4 class="panel-title">Book Loan History <a href="/bookshop?action=book-copies" class="pull-right"><span class = "glyphicon glyphicon-list"></span>&nbsp;View List</a></h4> 
			</div>
			<div class="panel-body">
				<table id="loansTable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Student</th>
							<th>Book</th>
							<th>Issue date</th>
							<th>Return date</th>
							<th>Period</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($loans as $row): ?>
							<tr>
								<td><?=$row['clientName']?></td>
								<td><?=$row['bookName']?></td>
								<td><?=$row['issue_date']?></td>
								<td><?=$row['returned_date']?></td>
								<td><?=$row['period']?></td>
								<td><?=$row['status']?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#loansTable').dataTable();
    });
</script>

