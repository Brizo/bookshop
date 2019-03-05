<?php
    include "controller.php";
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/books/controller.php";

    if (isset($_GET['id'])) {
        $subjectId = $_GET['id'];
        $books = array();
        $queryResult = retrieveSubjectBooks($subjectId);
        while ($row = mysqli_fetch_array($queryResult)) {
            $books[] = $row;
        }
    }

    if (isset($_GET['name'])) {
        $subjectName = $_GET['name'];
    }

?>

<div class="panel with-nav-tabs panel-default">
	<div class="panel-heading">
		<?php include "partials/schools_nav.php"; ?> 
	</div>
	<div class="panel-body">
		<div class="tab-pane" <?php if ($_SESSION['page'] == 'subject-books') { echo 'active';} ?>>
			<div class="row">
				<div class="col-sm-2">
					<?php include "partials/subjects_side_nav.php"; ?> 
				</div>
				<div class="col-sm-10">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="panel-title">
								<h4 class="panel-title"><?php echo $subjectName?> Books</h4>
							</div>
						</div>
						<div class="panel-body">
							<a class="btn btn-primary" data-keyboard="false" href="/<?php echo $_SESSION['home'];?>?action=new-subject-book&id=<?php echo $subjectId; ?>&name=<?php echo $subjectName; ?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New</a><br /><br />

							<table id="booksTable" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th></th>
										<th>Name</th>
										<th>ISB</th>
										<th>Year</th>
										<th>Author</th>
										<th>Bar code</th>
										<th>State</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									
									<?php foreach($books as $row): ?>
										<tr>
											<td>
												<a href="/bookshop?action=delete-subject-book&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Remove</a>&nbsp;&nbsp;
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
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#booksTable').dataTable();
    });
</script>