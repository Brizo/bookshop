<?php
	include "controller.php";
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
                        <a class="btn btn-warning" data-keyboard="false" href="/<?php echo $_SESSION['home'];?>?action=exportLoanedBooks"><span class="glyphicon glyphicon-export"></span>&nbsp;Export CSV</a>&nbsp;
                        <a class="btn btn-warning" data-keyboard="false" href="/<?php echo $_SESSION['home'];?>?action=exportLoanedBooks"><span class="glyphicon glyphicon-export"></span>&nbsp;Export PDF</a><br /><br />
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