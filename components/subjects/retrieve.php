<?php
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/subjects/controller.php";
?>

<div class="row">
	<div class="col-sm-2">
		<?php include "partials/school_side_nav.php"; ?> 
	</div>
	<div class="col-sm-10">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					<h4 class="panel-title">Subjects</h4>
				</div>
			</div>
			<div class="panel-body">
				<a class="btn btn-primary" data-keyboard="false" href="/bookshop?action=new-subject"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New</a><br /><br />

				<table id="subjectsTable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th></th>
							<th>Name</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$subjects = array();
							$queryResult = retrieveSubjects();
							while ($row = mysqli_fetch_array($queryResult)) {
								$subjects[] = $row;
							}
						?>

						<?php foreach($subjects as $row): ?>
							<tr>
								<td>
									<a href="/bookshop?action=edit-subject&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-edit' aria-hidden='true'></span>Edit</a>&nbsp;&nbsp;
									<a style="color: #FF0000;" href="/bookshop?action=delete-subject&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Remove</a>&nbsp;&nbsp;
									<a href="/bookshop?action=subject-books&id=<?php echo $row['id']; ?>&name=<?php echo $row['name']; ?>"><span class='glyphicon glyphicon-link' aria-hidden='true'></span>Books</a>
								</td>
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
		$('#subjectsTable').dataTable();
    });
</script>