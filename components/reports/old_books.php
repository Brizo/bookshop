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
						<b>Old Books</b>
					</div>
					<div class="panel-body">
                        <form class="form-inline" action="components/reports/controller.php" method="post">
                            <button type="submit" class="btn btn-warning" name="exportOldBooks"><span class="glyphicon glyphicon-export"></span> &nbsp;&nbsp;Export CSV</button>
                        </form>
                        <br>
                        <table id="oldBooksTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Book</th>
                                    <th>ISBN</th>
                                    <th>Barcode</th>
                                    <th>Age</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $books = array();
                                    $queryResult = retrieveOldBooks();
                                    while ($row = mysqli_fetch_array($queryResult)) {
                                        $books[] = $row;
                                    }
                                ?>

                                <?php foreach($books as $row): ?>
                                    <tr>
                                        <td><?=$row['name']?></td>
                                        <td><?=$row['isb']?></td>
                                        <td><?=$row['bar_code']?></td>
                                        <td><?=$row['age']?></td>
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
        $('#oldBooksTable').dataTable();
    });
</script>