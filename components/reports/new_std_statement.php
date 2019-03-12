<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/reports/controller.php";
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/students/controller.php";
    
    $students = array();
    $queryResult = retrieveStudents();
    while ($row = mysqli_fetch_array($queryResult)) {
        $students[] = $row;
    }
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
						<b>Search For Student Statement</b>
					</div>
					<div class="panel-body">
                        <div class="col-sm-10">
                            <form class="form-horizontal" role="form" action="components/reports/controller.php" method="post">
                                <div class="form-group">
                                    <label for="form" class="col-sm-4 control-label">Student * :</label>
                                    <div class="col-sm-8">                                
                                        <select class="form-control" id="student" name="student">
                                            <?php foreach($students as $row): ?>
                                                <option value="<?php echo $row['id']; ?>"><?=$row['first_name']?>-<?=$row['student_no']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-8 col-sm-offset-4">
                                        <button type="submit" class="btn btn-success" name="stdsettledloans"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Settled Loans</button>
                                        <button type="submit" class="btn btn-primary" name="stdunsettledloans"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Unsettled Loans</button>
                                        <a href="/bookshop?action=reports" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
                                    </div>
                                </div>       
                            </form>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    // Initialize select2
    $("#student").select2();
    // Read selected option
    $('#but_read').click(function(){
        $('#student option:selected').text();
    });

</script>