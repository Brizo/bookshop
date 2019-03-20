<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/book-copies/controller.php";
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/students/controller.php";

    $bookCopies = array();
    $queryResult = retrieveBookCopies();
    while ($row = mysqli_fetch_array($queryResult)) {
        $bookCopies[] = $row;
    }

    if (isset($_GET['id'])) {
        $bookCopyId = $_GET['id'];
        $getBookCopyResult = getBookCopyByField("id", $bookCopyId);
        $bookCopy = mysqli_fetch_array($getBookCopyResult);

        $_SESSION['oldBook'] = $bookCopy['name']." - ".$bookCopy['bar_code'];
        $_SESSION['id'] = $bookCopy['id'];
    }

    $students = array();
    $queryResult = retrieveStudents();
    while ($row = mysqli_fetch_array($queryResult)) {
        $students[] = $row;
    }
?>

<div class="row">
	<div class="col col-sm-2">
		<?php include "partials/main_side_nav.php"; ?>  
	</div>
	<div class="col col-sm-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">Replace Book Copy <a href="/bookshop?action=book-copies" class="pull-right"><span class = "glyphicon glyphicon-list"></span>&nbsp;View List</a></h4>
            </div>
            <div class="panel-body">
                <div class="col-sm-10">
                    <form class="form-horizontal" role="form" action="components/book-copies/controller.php" method="post">
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Old Book * :</label>
                            <div class="col-sm-8">                                
                            <input type="text" class="form-control" id="oldBook" name="oldBook" value="<?php  if (isset($_SESSION['oldBook'])) {echo $_SESSION['oldBook'];} ?>" disabled/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">New Book * :</label>
                            <div class="col-sm-8">                                
                                <select class="form-control" id="newBook" name="newBook">
                                    <?php foreach($bookCopies as $row): ?>
                                        <option value="<?php echo $row['id']; ?>"><?=$row['name']?> - <?=$row['bar_code']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Replaced By * :</label>
                            <div class="col-sm-8">                                
                                <select class="form-control" id="student" name="replaceStudent">
                                    <?php foreach($students as $row): ?>
                                        <option value="<?php echo $row['id']; ?>"><?=$row['first_name']?>-<?=$row['student_no']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Reason * :</label>
                            <div class="col-sm-8">
                                <textarea rows="3" cols="50" class="form-control" placeholder="Enter book replacement reason" name="reason"><?php  if (isset($_SESSION['reason'])) {echo $_SESSION['reason'];} ?></textarea>
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="submit" class="btn btn-success" name="replacebookcopy"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Replace</button>
                                <a href="/bookshop?action=book-copies" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
                            </div>
                        </div>           
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // Initialize select2
    $("#newBook").select2();
    // Read selected option
    $('#but_read').click(function(){
        $('#newBook option:selected').text();
    });

    // Initialize select2
    $("#student").select2();
    // Read selected option
    $('#but_read').click(function(){
        $('#student option:selected').text();
    });
</script>