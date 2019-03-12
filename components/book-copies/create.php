<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/book-states/controller.php";
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/books/controller.php";

    $books = array();
    $queryResult = retrieveBooks();
    while ($row = mysqli_fetch_array($queryResult)) {
        $books[] = $row;
    }

    $bookStates = array();
    $queryResult = retrieveBookStates();
    while ($row = mysqli_fetch_array($queryResult)) {
        $bookStates[] = $row;
    }
?>

<div class="row">
	<div class="col col-sm-2">
		<?php include "partials/main_side_nav.php"; ?>  
	</div>
	<div class="col col-sm-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">Add Book Copy <a href="/bookshop?action=book-copies" class="pull-right"><span class = "glyphicon glyphicon-list"></span>&nbsp;View List</a></h4>
            </div>
            <div class="panel-body">
                <div class="col-sm-10">
                    <form class="form-horizontal" role="form" action="components/book-copies/controller.php" method="post">
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Book * :</label>
                            <div class="col-sm-8">                                
                                <select class="form-control" id="bookid" name="bookId">
                                    <?php foreach($books as $row): ?>
                                        <option value="<?php echo $row['id']; ?>"><?=$row['name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Bar code * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="barCode" name="barCode" placeholder="Enter book bar code" value="<?php  if (isset($_SESSION['barCode'])) {echo $_SESSION['barCode'];} ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">State * :</label>
                            <div class="col-sm-8">                                
                                <select class="form-control" id="state" name="state">
                                    <?php foreach($bookStates as $row): ?>
                                        <option value="<?php echo $row['id']; ?>"><?=$row['name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Circulation Date :</label>
                            <div class="col-sm-8">
                                <input type="text" id="datepicker" class="form-control datepicker-here" name="circulation_date" placeholder="Click for circulation date" value="<?php  if (isset($_SESSION['circulation_date'])) {echo $_SESSION['circulation_date'];} ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="submit" class="btn btn-success" name="addnewbookcopy"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Add</button>
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
	$("#datepicker" ).datepicker({
		language: 'en',
		dateFormat: 'yyyy-mm-dd',
		todayButton: new Date(),
		autoClose: true,
		maxDate: new Date()
	});

    // Initialize select2
    $("#bookid").select2();
    // Read selected option
    $('#but_read').click(function(){
        $('#bookid option:selected').text();
    });
</script>