<?php
	include "controller.php";
?>

<div class="panel with-nav-tabs panel-default">
	<div class="panel-heading">
		<?php include "partials/schools_nav.php"; ?>
	</div>
	<div class="panel-body">
		<div class="tab-pane" <?php if ($_SESSION['page'] == 'classes') { echo 'active';} ?>>
			<div class="row">
				<div class="col-sm-2">
					<?php include "partials/classes_side_nav.php"; ?> 
				</div>
				<div class="col-sm-10">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="panel-title">
								<h4 class="panel-title">Classes</h4>
							</div>
						</div>
						<div class="panel-body">
							<a class="btn btn-primary" data-keyboard="false" href="/<?php echo $_SESSION['home'];?>?action=new-class"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New</a><br /><br />

							<table id="classesTable" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th></th>
										<th>Name</th>
										<th>Description</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$classes = array();
										$queryResult = retrieveClasses();
										while ($row = mysqli_fetch_array($queryResult)) {
											$classes[] = $row;
										}
									?>

									<?php foreach($classes as $row): ?>
										<tr>
											<td>
												<a href="/bookshop?action=edit-class&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-edit' aria-hidden='true'></span>Edit</a>&nbsp;&nbsp;
												<a href="/bookshop?action=delete-class&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Remove</a>&nbsp;&nbsp;
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
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#classesTable').dataTable();
    });
</script>