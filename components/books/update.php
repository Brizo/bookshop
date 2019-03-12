<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/books/controller.php";

    if (isset($_GET['id'])) {
        $bookId = $_GET['id'];
        $getBookResult = getBookByField("id", $bookId);
        $book = mysqli_fetch_array($getBookResult);

        $_SESSION['name'] = $book['name'];
        $_SESSION['description'] = $book['description'];
        $_SESSION['isb'] = $book['isb'];
        $_SESSION['year'] = $book['year'];
        $_SESSION['author'] = $book['author'];
        $_SESSION['levie'] = $book['levie'];
        $_SESSION['purchase_price'] = $book['purchase_price'];
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
                <h4 class="panel-title">Edit Book <a href="/bookshop?action=books" class="pull-right"><span class = "glyphicon glyphicon-list"></span>&nbsp;View List</a></h4>
            </div>
            <div class="panel-body">
                <div class="col-sm-10">
                    <form class="form-horizontal" role="form" action="components/books/controller.php" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form" class="col-sm-4 control-label">Name * :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter book name" value="<?php  if (isset($_SESSION['name'])) {echo $_SESSION['name'];} ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="form" class="col-sm-4 control-label">Description :</label>
                                    <div class="col-sm-8">
                                        <textarea rows="3" cols="50" class="form-control" placeholder="Enter book descripion" name="description"><?php  if (isset($_SESSION['description'])) {echo $_SESSION['description'];} ?></textarea>
                                    </div>
                                </div>                      
                                <div class="form-group">
                                    <label for="form" class="col-sm-4 control-label">ISBN * :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="isb" name="isb" placeholder="Enter book isbn" value="<?php  if (isset($_SESSION['isb'])) {echo $_SESSION['isb'];} ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="form" class="col-sm-4 control-label">Year * :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="year" name="year" placeholder="Enter book publish year" value="<?php  if (isset($_SESSION['year'])) {echo $_SESSION['year'];} ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form" class="col-sm-4 control-label">Purchase Price :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="purchase_price" name="purchase_price" placeholder="Enter book purchase price" value="<?php  if (isset($_SESSION['purchase_price'])) {echo $_SESSION['purchase_price'];} ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="form" class="col-sm-4 control-label">Levie :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="levie" name="levie" placeholder="Enter book levie" value="<?php  if (isset($_SESSION['levie'])) {echo $_SESSION['levie'];} ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="form" class="col-sm-4 control-label">Author * :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="author" name="author" placeholder="Enter book author" value="<?php  if (isset($_SESSION['author'])) {echo $_SESSION['author'];} ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-8 col-sm-offset-4">
                                        <button type="submit" class="btn btn-success" name="updatebook"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Update</button>
                                        <a href="/bookshop?action=books" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
                                    </div>
                                </div> 
                            </div>
                        </div>               
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>