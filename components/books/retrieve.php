<?php
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/books/controller.php";
?>

<div class="row">
	<div class="col col-sm-2">
		<?php include "partials/main_side_nav.php"; ?>  
	</div>
	<div class="col col-sm-10">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<b>Books</b>
			</div>
			<div class="panel-body">
				<a class="btn btn-primary" data-keyboard="false" href="/bookshop?action=new-book"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New</a><br /><br />

				<table id="booksTable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th></th>
							<th>Name</th>
							<th>ISBN</th>
							<th>Year</th>
							<th>Author</th>
							<th>Price</th>
							<th>Copies</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$books = array();
							$queryResult = retrieveBooks();
							while ($row = mysqli_fetch_array($queryResult)) {
								$books[] = $row;
							}
						?>

						<?php foreach($books as $row): ?>
							<tr>
								<td>
									<a href="/bookshop?action=edit-book&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-edit' aria-hidden='true'></span>Edit</a>&nbsp;&nbsp;
									<a style="color: #FF0000;" href="/bookshop?action=delete-book&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Remove</a>&nbsp;&nbsp;
								</td>
								<td><?=$row['name']?></td>
								<td><?=$row['isb']?></td>
								<td><?=$row['year']?></td>
								<td><?=$row['author']?></td>
								<td><?=$row['purchase_price']?></td>
								<td><?=$row['copies']?></td>
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
		$('#booksTable').dataTable();
  });
</script>

