<?php
    include "controller.php";
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/subjects/controller.php";

    if (isset($_GET['id'])) {
        $streamId = $_GET['id'];
        $subjects = array();
        $queryResult = retrieveStreamSubjects($streamId);
        while ($row = mysqli_fetch_array($queryResult)) {
            $subjects[] = $row;
        }
    }

    if (isset($_GET['name'])) {
        $streamName = $_GET['name'];
    }

?>

<div class="row">
	<div class="col-sm-2">
		<?php include "partials/subjects_side_nav.php"; ?> 
	</div>
	<div class="col-sm-10">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					<h4 class="panel-title"><?php echo $streamName?> Subjects</h4>
				</div>
			</div>
			<div class="panel-body">
				<a class="btn btn-primary" data-keyboard="false" href="/<?php echo $_SESSION['home'];?>?action=new-stream-subject&id=<?php echo $streamId; ?>&name=<?php echo $streamName; ?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New</a><br /><br />

				<table id="subjectsTable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th></th>
							<th>Name</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						
						<?php foreach($subjects as $row): ?>
							<tr>
								<td>
									<a href="/bookshop?action=delete-stream-subject&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Remove</a>&nbsp;&nbsp;
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