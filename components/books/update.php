<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/book-states/controller.php";
    include "controller.php";

    $bookStates = array();
    $bookStatesResult = retrieveBookStates();
    while ($row = mysqli_fetch_array($bookStatesResult)) {
        $bookStates[] = $row;
    }

    if (isset($_GET['id'])) {
        $bookId = $_GET['id'];
        $getBookResult = getBookByField("id", $bookId);
        $book = mysqli_fetch_array($getBookResult);

        $_SESSION['name'] = $book['name'];
        $_SESSION['description'] = $book['description'];
        $_SESSION['isb'] = $book['isb'];
        $_SESSION['year'] = $book['year'];
        $_SESSION['author'] = $book['author'];
        $_SESSION['barCode'] = $book['bar_code'];
        $_SESSION['state'] = $book['state'];
        $_SESSION['id'] = $book['id'];
    }
?>

<div class="row">
	<div class="col col-sm-2">
		<?php include "partials/side_nav.php"; ?>  
	</div>
	<div class="col col-sm-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">Edit Book <a href="/<?php echo $_SESSION['home'];?>?action=books" class="pull-right"><span class = "glyphicon glyphicon-list"></span>&nbsp;View List</a></h4>
            </div>
            <div class="panel-body">
                <div class="col-sm-8">
                    <form class="form-horizontal" role="form" action="components/books/controller.php" method="post">
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Name * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter book name" value="<?php  if (isset($_SESSION['name'])) {echo $_SESSION['name'];} ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Description :</label>
                            <div class="col-sm-8">
                                <textarea rows="3" cols="50" class="form-control" placeholder="Enter book descripion" name="description" value="<?php  if (isset($_SESSION['description'])) {echo $_SESSION['description'];} ?>"></textarea>
                            </div>
                        </div>                      
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">ISB * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="isb" name="isb" placeholder="Enter book isb" value="<?php  if (isset($_SESSION['isb'])) {echo $_SESSION['isb'];} ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Year * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="year" name="year" placeholder="Enter book publish year" value="<?php  if (isset($_SESSION['year'])) {echo $_SESSION['year'];} ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Author * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="author" name="author" placeholder="Enter book author" value="<?php  if (isset($_SESSION['author'])) {echo $_SESSION['author'];} ?>" />
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
                                        <option value="<?php echo $row['id']; ?>" <?php if ($row['id'] == $_SESSION['id']) {echo 'selected'; }?> ><?=$row['name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="submit" class="btn btn-success" name="updatebook"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Update</button>
                                <a href="/<?php echo $_SESSION['home'];?>?action=books" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
                            </div>
                        </div>                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>