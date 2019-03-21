<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/logs/controller.php";
?>

<div class="row">
	<div class="col col-sm-2">
		<?php include "partials/admin_side_nav.php"; ?>  
	</div>
	<div class="col col-sm-10">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<b>System Logs</b>
			</div>
			<div class="panel-body">
				<table id="logsTable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Action</th>
							<th>Description</th>
							<th>Date</th>
							<th>By</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$logs = array();
							$queryResult = retrieveLogs();
							while ($row = mysqli_fetch_array($queryResult)) {
								$logs[] = $row;
							}
						?>

						<?php foreach($logs as $row): ?>
							<tr>
								<td><?=$row['action']?></td>
								<td><?=$row['description']?></td>
								<td><?=$row['created_at']?></td>
								<td><?=$row['by']?></td>
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
        $('#logsTable').dataTable();
    });
</script>

