<?php
    include "controller.php";

    if (isset($_GET['id'])) {
        $bookStateId = $_GET['id'];
        $getBookStateResult = getBookStateByField("id", $bookStateId);
        $bookState = mysqli_fetch_array($getBookStateResult);

        $_SESSION['name'] = $bookState['name'];
        $_SESSION['id'] = $bookState['id'];
    }
?>

<div class="row">
	<div class="col col-sm-2">
		<?php include "partials/admin_side_nav.php"; ?>  
	</div>
	<div class="col col-sm-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">Remove Book State <a href="/<?php echo $_SESSION['home'];?>?action=book-states" class="pull-right"><span class = "glyphicon glyphicon-list"></span>&nbsp;View List</a></h4>
            </div>
            <div class="panel-body">
                <div class="col-sm-8">
                    <form class="form-horizontal" role="form" action="components/book-states/controller.php" method="post" id="removeBookStateForm">
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Name * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" value="<?php  if (isset($_SESSION['name'])) {echo $_SESSION['name'];} ?>" disabled/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Reason * :</label>
                            <div class="col-sm-8">
                                <textarea rows="3" cols="50" class="form-control" placeholder="Enter book state deletion reason" name="reason"><?php  if (isset($_SESSION['reason'])) {echo $_SESSION['reason'];} ?></textarea>
                            </div>
                        </div>                      
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="submit" class="btn btn-success" name="removebookstate"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Remove</button>
                                <a href="/<?php echo $_SESSION['home'];?>?action=book-states" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
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
		$('#removeBookStateForm').submit(function(e){
            if (confirm("Are you sure you want to remove this book state?")) {
                return true;
            } else {
                return false;
            }
        }); 
    });
</script>