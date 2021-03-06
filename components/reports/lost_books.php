<?php
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/reports/controller.php";
?>

<div class="panel panel-primary">
	<div class="panel-heading">
    	<b>Reports</b>
    </div>
	<div class="panel-body">
		<div class="row">
			<div class="col col-sm-2">
				<?php include "partials/reports_side_nav.php"; ?>  
			</div>
			<div class="col col-sm-10">
				<div class="panel panel-default">
					<div class="panel-heading">
						<b>Lost Books</b>
					</div>
					<div class="panel-body">
                        <form class="form-inline" action="components/reports/controller.php" method="post">
                            <button type="submit" class="btn btn-warning" name="exportLostBooks"><span class="glyphicon glyphicon-export"></span> &nbsp;&nbsp;Export CSV</button>
                        </form>
                        <br>
                        <table id="lostBooksTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
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
                                    $books = array();
                                    $queryResult = retrieveLostBooks();
                                    while ($row = mysqli_fetch_array($queryResult)) {
                                        $books[] = $row;
                                    }
                                ?>

                                <?php foreach($books as $row): ?>
                                    <tr>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#lostBooksTable').dataTable();
    });
</script>