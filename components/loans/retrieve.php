<?php
    include "controller.php";
?>

<div class="row">
	<div class="col col-sm-2">
		<?php include "partials/side_nav.php"; ?>  
	</div>
	<div class="col col-sm-10">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<b>Book Loans</b>
			</div>
			<div class="panel-body">
				<a class="btn btn-primary" data-keyboard="false" href="/<?php echo $_SESSION['home'];?>?action=new-loan"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New</a><br /><br />

				<table id="loansTable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th></th>
							<th>Firstname</th>
							<th>Lastname</th>
							<th>Username</th>
							<th>Role</th>
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
								<td>
									<a href="/<?php echo $_SESSION['home'];?>?action=edit-loan&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-edit' aria-hidden='true'></span>Edit</a>&nbsp;&nbsp;
									<a href="/<?php echo $_SESSION['home'];?>?action=delete-loan&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Remove</a>&nbsp;&nbsp;
								</td>
								<td><?=$row['first_name']?></td>
								<td><?=$row['last_name']?></td>
								<td><?=$row['username']?></td>
								<td><?=$row['user_role']?></td>
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

