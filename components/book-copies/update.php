<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/book-states/controller.php";
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/book-copies/controller.php";

    $bookStates = array();
    $queryResult = retrieveBookStates();
    while ($row = mysqli_fetch_array($queryResult)) {
        $bookStates[] = $row;
    }

    if (isset($_GET['id'])) {
        
        $bookCopyId = $_GET['id'];
        $getBookCopyResult = getBookCopyByField("id", $bookCopyId);
        $bookCopy = mysqli_fetch_array($getBookCopyResult);

        $_SESSION['book'] = $bookCopy['name'];
        $_SESSION['state'] = $bookCopy['state'];
        $_SESSION['bar_code'] = $bookCopy['bar_code'];
        $_SESSION['id'] = $bookCopy['id'];
    }
?>

<div class="row">
	<div class="col col-sm-2">
		<?php include "partials/main_side_nav.php"; ?>  
	</div>
	<div class="col col-sm-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">Update Book Copy <a href="/bookshop?action=book-copies" class="pull-right"><span class = "glyphicon glyphicon-list"></span>&nbsp;View List</a></h4>
            </div>
            <div class="panel-body">
                <div class="col-sm-10">
                    <form class="form-horizontal" role="form" action="components/book-copies/controller.php" method="post">
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Book * :</label>
                            <div class="col-sm-8">                                
                                <input type="text" class="form-control" id="book" name="book" value="<?php  if (isset($_SESSION['book'])) {echo $_SESSION['book'];} ?>" disabled/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Bar code * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="bar_code" name="bar_code" placeholder="Enter book bar code" value="<?php  if (isset($_SESSION['bar_code'])) {echo $_SESSION['bar_code'];} ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">State * :</label>
                            <div class="col-sm-8">                                
                                <select class="form-control" id="state" name="state">
                                    <?php foreach($bookStates as $row): ?>
                                        <option value="<?php echo $row['id']; ?>" <?php if ($_SESSION['state'] == $row['id']) {echo "selected";} ?> ><?=$row['name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Status * :</label>
                            <div class="col-sm-8">                                
                                <select class="form-control" id="status" name="status">
                                    <option value="1" <?php if (isset($_SESSION['status']) && $_SESSION['status'] == '1') {echo "selected";} ?>>Active</option>
                                    <option value="4" <?php if (isset($_SESSION['status']) && $_SESSION['status'] == '4') {echo "selected";} ?> >Lost</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="submit" class="btn btn-success" name="updatebookcopy"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Update</button>
                                <a href="/bookshop?action=book-copies" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
                            </div>
                        </div>           
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>