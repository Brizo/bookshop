<?php
	include "controller.php";
?>

<div class="panel with-nav-tabs panel-default">
	<div class="panel-heading">
		<?php include "partials/schools_nav.php";; ?>
	</div>
	<div class="panel-body">
		<div class="tab-pane" <?php if ($_SESSION['page'] == 'students') { echo 'active';} ?>>
			<div class="row">
				<div class="col-sm-2">
					<?php include "partials/students_side_nav.php"; ?> 
				</div>
				<div class="col-sm-10">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="panel-title">
								<h4 class="panel-title">Students</h4>
							</div>
						</div>
						<div class="panel-body">
							<a class="btn btn-primary" data-keyboard="false" href="/<?php echo $_SESSION['home'];?>?action=new-student"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New</a><br /><br />

							<table id="studentsTable" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th></th>
										<th>Name</th>
										<th>Surname</th>
										<th>Student Number</th>
										<th>Gender</th>
										<th>Class</th>
										<th>Stream</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$students = array();
										$queryResult = retrieveStudents();
										while ($row = mysqli_fetch_array($queryResult)) {
											$students[] = $row;
										}
									?>

									<?php foreach($students as $row): ?>
										<tr>
											<td>
												<a href="/bookshop?action=edit-student&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-edit' aria-hidden='true'></span>Edit</a>&nbsp;&nbsp;
												<a href="/bookshop?action=delete-student&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Remove</a>&nbsp;&nbsp;
											</td>
											<td><?=$row['first_name']?></td>
											<td><?=$row['last_name']?></td>
											<td><?=$row['student_no']?></td>
											<td><?=$row['gender']?></td>
											<td><?=$row['class']?></td>
											<td><?=$row['stream']?></td>
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
		$('#studentsTable').dataTable();
    });
</script>