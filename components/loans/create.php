<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/students/controller.php";
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/books/controller.php";

    $students = array();
    $queryResult = retrieveStudents();
    while ($row = mysqli_fetch_array($queryResult)) {
        $students[] = $row;
    }

    $books = array();
    $queryResult = retrieveBooks();
    while ($row = mysqli_fetch_array($queryResult)) {
        $books[] = $row;
    }
?>

<div class="row">
	<div class="col col-sm-2">
		<?php include "partials/side_nav.php"; ?>  
	</div>
	<div class="col col-sm-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">New Loan <a href="/<?php echo $_SESSION['home'];?>?action=loans" class="pull-right"><span class = "glyphicon glyphicon-list"></span>&nbsp;View List</a></h4>
            </div>
            <div class="panel-body">
                <div class="col-sm-10">
                    <form class="form-horizontal" role="form" action="components/loans/controller.php" method="post">
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Student * :</label>
                            <div class="col-sm-8">                                
                                <select class="form-control" id="state" name="state">
                                    <?php foreach($students as $row): ?>
                                        <option value="<?php echo $row['id']; ?>"><?=$row['first_name']?>-<?=$row['student_no']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Book * :</label>
                            <div class="col-sm-8">                                
                                <select class="form-control" id="state" name="state">
                                    <?php foreach($books as $row): ?>
                                        <option value="<?php echo $row['id']; ?>"><?=$row['name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Return Date * :</label>
                            <div class="col-sm-8">
                                <input type="text" id="datepicker" class="form-control datepicker-here" name="return_date" placeholder="Click for return date" value="<?php  if (isset($_SESSION['return_date'])) {echo $_SESSION['return_date'];} ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="submit" class="btn btn-success" name="addnewloan"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Add</button>
                                <a href="/<?php echo $_SESSION['home'];?>?action=loans" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
                            </div>
                        </div>       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	$("#datepicker" ).datepicker({
		language: 'en',
		dateFormat: 'yyyy-mm-dd',
		todayButton: new Date(),
		autoClose: true
	});
</script>