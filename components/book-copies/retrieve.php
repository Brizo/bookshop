<?php
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/book-copies/controller.php";
?>

<div class="row">
	<div class="col col-sm-2">
		<?php include "partials/main_side_nav.php"; ?>  
	</div>
	<div class="col col-sm-10">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<b>Book Copies</b>
			</div>
			<div class="panel-body">
				<table id="bookCopiesTable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<?php if ($_SESSION['loggedRole'] == 'admin'): ?>
								<th></th>
							<?php endif; ?>
							<th>Name</th>
							<th>ISBN</th>
							<th>Year</th>
							<th>Author</th>
							<th>Bar code</th>
							<th>State</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$bookCopies = array();
							$queryResult = retrieveBookCopies();
							while ($row = mysqli_fetch_array($queryResult)) {
								$bookCopies[] = $row;
							}
						?>

						<?php foreach($bookCopies as $row): ?>
							<tr>
								<?php if ($_SESSION['loggedRole'] == 'admin'): ?>
									<td>
										<a href="/bookshop?action=edit-book-copy&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-edit' aria-hidden='true'></span>Edit</a>&nbsp;&nbsp;
										<a style="color: #FF0000;" href="/bookshop?action=delete-book-copy&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Remove</a>&nbsp;&nbsp;
										<a href="/bookshop?action=book-loans&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-link' aria-hidden='true'></span>Loans</a>
									</td>
								<?php endif; ?>
								<td><?=$row['name']?></td>
								<td><?=$row['isb']?></td>
								<td><?=$row['year']?></td>
								<td><?=$row['author']?></td>
								<td><?=$row['bar_code']?></td>
								<td><?=$row['statename']?></td>
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
		$('#bookCopiesTable').dataTable();
  });
</script>

