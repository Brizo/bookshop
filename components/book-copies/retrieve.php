<?php
	include "controller.php";
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
				<a class="btn btn-primary" data-keyboard="false" href="/<?php echo $_SESSION['home'];?>?action=new-book-copy"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New</a><br /><br />

				<table id="bookCopiesTable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th></th>
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
								<td>
									<a href="/bookshop?action=edit-book-copy&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-edit' aria-hidden='true'></span>Edit</a>&nbsp;&nbsp;
									<a href="/bookshop?action=delete-book-copy&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Remove</a>&nbsp;&nbsp;
									<a href="/bookshop?action=replace-book-copy&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Replace</a>
								</td>
								<td><?=$row['name']?></td>
								<td><?=$row['isb']?></td>
								<td><?=$row['year']?></td>
								<td><?=$row['author']?></td>
								<td><?=$row['bar_code']?></td>
								<td><?=$row['state']?></td>
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

