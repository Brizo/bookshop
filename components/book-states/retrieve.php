<?php
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/book-states/controller.php";
?>

<div class="row">
	<div class="col-sm-2">
		<?php include "partials/admin_side_nav.php"; ?> 
	</div>
	<div class="col-sm-10">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					<h4 class="panel-title">Book States</h4>
				</div>
			</div>
			<div class="panel-body">
				<?php if ($_SESSION['loggedRole'] == 'admin'): ?>
					<a class="btn btn-primary" data-keyboard="false" href="/bookshop?action=new-book_state"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New</a><br /><br />
				<?php endif; ?>
				<table id="bookStatesTable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<?php if ($_SESSION['loggedRole'] == 'admin'): ?>
								<th></th>
							<?php endif; ?>
							<th>Name</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$bookStates = array();
							$queryResult = retrieveBookStates();
							while ($row = mysqli_fetch_array($queryResult)) {
								$bookStates[] = $row;
							}
						?>

						<?php foreach($bookStates as $row): ?>
							<tr>
								<?php if ($_SESSION['loggedRole'] == 'admin'): ?>
									<td>
										<a href="/bookshop?action=edit-book_state&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-edit' aria-hidden='true'></span>Edit</a>&nbsp;&nbsp;
										<a style="color: #FF0000;" href="/bookshop?action=delete-book_state&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Remove</a>&nbsp;&nbsp;
									</td>
								<?php endif; ?>
								<td><?=$row['name']?></td>
								<td><?=$row['description']?></td>
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
		$('#bookStatesTable').dataTable();
    });
</script>