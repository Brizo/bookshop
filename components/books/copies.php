<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/books/controller.php";

    if (isset($_GET['id'])) {
        $bookId = $_GET['id'];
        $getBookResult = getBookByField("id", $bookId);
        $book = mysqli_fetch_array($getBookResult);

        $_SESSION['display'] = $book['name']." - ".$book['isb'];
        $_SESSION['id'] = $book['id'];
    }
?>

<div class="row">
	<div class="col col-sm-2">
		<?php include "partials/main_side_nav.php"; ?>  
	</div>
	<div class="col col-sm-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">Add Book Copies <a href="/bookshop?action=books" class="pull-right"><span class = "glyphicon glyphicon-list"></span>&nbsp;View List</a></h4>
            </div>
            <div class="panel-body">
                <div class="col-sm-8">
                    <form class="form-horizontal" role="form" action="components/books/controller.php" method="post" id="addBookCopies">
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Book * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="display" name="display" value="<?php  if (isset($_SESSION['display'])) {echo $_SESSION['display'];} ?>" disabled/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Number Of Copies * :</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="copies" name="copies" value="<?php  if (isset($_SESSION['copies'])) {echo $_SESSION['copies'];} ?>"/>
                            </div>
                        </div>                      
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="submit" class="btn btn-success" name="addbookcopies"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Add</button>
                                <a href="/bookshop?action=books" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
                            </div>
                        </div>                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
		$('#addBookCopies').submit(function(e){
            if (confirm("Are you sure you want to add these book?")) {
                return true;
            } else {
                return false;
            }
        }); 
    });
</script>