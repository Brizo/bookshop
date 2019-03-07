<?php
	include "controller.php";
?>

<div class="row">
	<div class="col-sm-2">
		<?php include "partials/school_side_nav.php"; ?> 
	</div>
	<div class="col-sm-10">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					<h4 class="panel-title">Class Levels</h4>
				</div>
			</div>
			<div class="panel-body">
				<a class="btn btn-primary" data-keyboard="false" href="/<?php echo $_SESSION['home'];?>?action=new-class_level"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New</a><br /><br />

				<table id="classLevelsTable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th></th>
							<th>Name</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$classLevels = array();
							$queryResult = retrieveClassLevels();
							while ($row = mysqli_fetch_array($queryResult)) {
								$classLevels[] = $row;
							}
						?>

						<?php foreach($classLevels as $row): ?>
							<tr>
								<td>
									<a href="/bookshop?action=edit-class_level&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-edit' aria-hidden='true'></span>Edit</a>&nbsp;&nbsp;
									<a href="/bookshop?action=delete-class_level&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Remove</a>&nbsp;&nbsp;
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
		$('#classLevelsTable').dataTable();
    });
</script>