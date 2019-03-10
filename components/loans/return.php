<?php
    include "controller.php";
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/book-states/controller.php";

    if (isset($_GET['id'])) {
        $loanId = $_GET['id'];
        $getBookLoanResult = getBookLoanByField("id", $loanId);
        $loan = mysqli_fetch_array($getBookLoanResult);

        $_SESSION['client'] = $loan['clientName'];
        $_SESSION['book'] = $loan['bookName'];
        $_SESSION['id'] = $loan['id'];
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
                <h4 class="panel-title">Return Book <a href="/<?php echo $_SESSION['home'];?>?action=loans" class="pull-right"><span class = "glyphicon glyphicon-list"></span>&nbsp;View List</a></h4>
            </div>
            <div class="panel-body">
                <div class="col-sm-10">
                    <form class="form-horizontal" role="form" action="components/loans/controller.php" method="post">
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Student * :</label>
                            <div class="col-sm-8">                                
                                <input type="text" class="form-control" id="client" name="client" value="<?php  if (isset($_SESSION['client'])) {echo $_SESSION['client'];} ?>" disabled/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Book * :</label>
                            <div class="col-sm-8">                                
                                <input type="text" class="form-control" id="book" name="book" value="<?php  if (isset($_SESSION['book'])) {echo $_SESSION['book'];} ?>" disabled/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Book Returned * :</label>
                            <div class="col-sm-8">                                
                                <select class="form-control" id="returnedBook" name="returnedBook">
                                    <option value="1">Original</option>
                                    <option value="2">Replacement</option>
                                    <option value="3">Payment</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Book Return State * :</label>
                            <div class="col-sm-8">                                
                                <select class="form-control" id="returnState" name="returnState">
                                    <?php foreach($bookStates as $row): ?>
                                        <option value="<?php echo $row['id']; ?>"><?=$row['name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="submit" class="btn btn-success" name="returnloan"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Return</button>
                                <a href="/<?php echo $_SESSION['home'];?>?action=loans" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
                            </div>
                        </div>       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>