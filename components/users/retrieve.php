<?php
	include "controller.php";
?>

<div class="row">
	<div class="col col-sm-2">
		<?php include "partials/admin_side_nav.php"; ?>  
	</div>
	<div class="col col-sm-10">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<b>Users</b>
			</div>
			<div class="panel-body">
				<a class="btn btn-primary" data-keyboard="false" href="/<?php echo $_SESSION['home'];?>?action=new-user"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New</a><br /><br />

				<table id="usersTable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th></th>
							<th>Name</th>
							<th>Username</th>
							<th>Role</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$users = array();
							$queryResult = retrieveUsers();
							while ($row = mysqli_fetch_array($queryResult)) {
								$users[] = $row;
							}
						?>

						<?php foreach($users as $row): ?>
							<tr>
								<td>
									<a href="/bookshop?action=edit-user&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-edit' aria-hidden='true'></span>Edit</a>&nbsp;&nbsp;
									<a style="color: #FF0000;" href="/bookshop?action=delete-user&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Remove</a>&nbsp;&nbsp;
									<a href="/bookshop?action=change-password&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>Change Password</a>
								</td>
								<td><?=$row['name']?></td>
								<td><?=$row['username']?></td>
								<td><?=$row['user_role']?></td>
								<td><?=$row['statusName']?></td>
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
		$('#usersTable').dataTable();
  });
</script>

