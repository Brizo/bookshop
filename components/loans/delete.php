<?php
    include "controller.php";

    if (isset($_GET['id'])) {
        $loanId = $_GET['id'];
        $getLoanResult = getLoanByField("id", $loanId);
        $loan = mysqli_fetch_array($getLoanResult);

        $_SESSION['book'] = $loan['bookName'];
        // $_SESSION['student'] = $loan['student'];
        // $_SESSION['issueState'] = $loan['book_issue_state'];
        // $_SESSION['return_date'] = $loan['return_date'];
        $_SESSION['id'] = $loan['id'];
    }
?>

<div class="row">
	<div class="col col-sm-2">
		<?php include "partials/school_side_nav.php"; ?>  
	</div>
	<div class="col col-sm-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">Remove Loan <a href="/<?php echo $_SESSION['home'];?>?action=loans" class="pull-right"><span class = "glyphicon glyphicon-list"></span>&nbsp;View List</a></h4>
            </div>
            <div class="panel-body">
                <div class="col-sm-8">
                    <form class="form-horizontal" role="form" action="components/loans/controller.php" method="post" id="removeClassForm">
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Loan * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="book" name="book" value="<?php  if (isset($_SESSION['book'])) {echo $_SESSION['book'];} ?>" disabled/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Reason * :</label>
                            <div class="col-sm-8">
                                <textarea rows="3" cols="50" class="form-control" placeholder="Enter loan deletion reason" name="reason"><?php  if (isset($_SESSION['reason'])) {echo $_SESSION['reason'];} ?></textarea>
                            </div>
                        </div>                      
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="submit" class="btn btn-success" name="removeloan"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Remove</button>
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
    $(document).ready(function() {
		$('#removeClassForm').submit(function(e){
            if (confirm("Are you sure you want to remove this class?")) {
                return true;
            } else {
                return false;
            }
        }); 
    });
</script>