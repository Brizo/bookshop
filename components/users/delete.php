<?php
    include "controller.php";

    if (isset($_GET['id'])) {
        $userId = $_GET['id'];
        $getUserResult = getUserByField("id", $userId);
        $user = mysqli_fetch_array($getUserResult);

        $_SESSION['username'] = $user['username'];
        $_SESSION['id'] = $user['id'];
    }
?>

<div class="row">
	<div class="col col-sm-2">
		<?php include "partials/admin_side_nav.php"; ?>  
	</div>
	<div class="col col-sm-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">Remove User <a href="/<?php echo $_SESSION['home'];?>?action=users" class="pull-right"><span class = "glyphicon glyphicon-list"></span>&nbsp;View List</a></h4>
            </div>
            <div class="panel-body">
                <div class="col-sm-8">
                    <form class="form-horizontal" role="form" action="components/users/controller.php" method="post" id="removeUserForm">
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Username * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="username" name="username" value="<?php  if (isset($_SESSION['username'])) {echo $_SESSION['username'];} ?>" disabled/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Reason * :</label>
                            <div class="col-sm-8">
                                <textarea rows="3" cols="50" class="form-control" placeholder="Enter user deletion reason" name="reason"><?php  if (isset($_SESSION['reason'])) {echo $_SESSION['reason'];} ?></textarea>
                            </div>
                        </div>                      
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="submit" class="btn btn-success" name="removeuser"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Remove</button>
                                <a href="/<?php echo $_SESSION['home'];?>?action=users" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
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
		$('#removeUserForm').submit(function(e){
            if (confirm("Are you sure you want to remove this user?")) {
                return true;
            } else {
                return false;
            }
        }); 
    });
</script>