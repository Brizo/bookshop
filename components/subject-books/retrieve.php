<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/subject-books/controller.php";
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

<div class="row">
	<div class="col-sm-2">
		<?php include "partials/school_side_nav.php"; ?> 
	</div>
	<div class="col-sm-10">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					<h4 class="panel-title"><?=$subjectName?> Books</h4>
				</div>
			</div>
			<div class="panel-body">
				<?php if ($_SESSION['loggedRole'] == 'admin'): ?>
					<a class="btn btn-primary" data-keyboard="false" href="/bookshop?action=new-subject-book&id=<?=$subjectId?>&name=<?php echo $subjectName; ?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New</a><br /><br />
				<?php endif; ?>
				<table id="booksTable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<?php if ($_SESSION['loggedRole'] == 'admin'): ?>
								<th></th>
							<?php endif; ?>
							<th>Name</th>
							<th>ISBN</th>
							<th>Year</th>
							<th>Author</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						
						<?php foreach($books as $row): ?>
							<tr>
								<?php if ($_SESSION['loggedRole'] == 'admin'): ?>
									<td>
										<a href="/bookshop?action=delete-subject-book&id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Remove</a>&nbsp;&nbsp;
									</td>
								<?php endif; ?>
								<td><?=$row['name']?></td>
								<td><?=$row['isb']?></td>
								<td><?=$row['year']?></td>
								<td><?=$row['author']?></td>
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