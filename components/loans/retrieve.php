<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/loans/controller.php";
?>

<div class="row">
	<div class="col col-sm-2">
		<?php include "partials/main_side_nav.php"; ?>  
	</div>
	<div class="col col-sm-10">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<b>Book Loans</b>
			</div>
			<div class="panel-body">
				<?php if ($_SESSION['loggedRole'] == 'admin'): ?>
					<a class="btn btn-primary" data-keyboard="false" href="/bookshop?action=new-loan"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New</a><br /><br />
				<?php endif; ?>
				<table id="loansTable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th></th>
							<th>Student</th>
							<th>Book</th>
							<th>Issue date</th>
							<th>Returned date</th>
							<th>Period</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$loans = array();
							$queryResult = retrieveLoans();
							while ($row = mysqli_fetch_array($queryResult)) {
								$loans[] = $row;
							}
						?>

						<?php foreach($loans as $row): ?>
							<tr>
								<?php if ($_SESSION['loggedRole'] == 'admin'): ?>
									<td>
										<?php if ($row['status'] == 'open'): ?>
											<a href="/bookshop?action=edit-loan&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-edit' aria-hidden='true'></span>Edit</a>&nbsp;&nbsp;
											<a style="color: #FF0000;" href="/bookshop?action=delete-loan&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Remove</a>&nbsp;&nbsp;
											<a href="/bookshop?action=return-loan&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-log-in' aria-hidden='true'></span>&nbsp;Return Book</a>&nbsp;&nbsp;
										<?php endif; ?>
									</td>
								<?php endif; ?>
								<td><?=$row['client']?></td>
								<td><?=$row['book']?></td>
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

