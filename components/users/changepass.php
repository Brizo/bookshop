<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/users/controller.php";

    if (isset($_GET['id'])) {
        $userId = $_GET['id'];
        $getUserResult = getUserByField("id", $userId);
        $user = mysqli_fetch_array($getUserResult);

        $_SESSION['username'] = $user['username'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['middle_name'] = $user['middle_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['user_role'] = $user['user_role'];
        $_SESSION['account_status'] = $user['account_status'];
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
                <h4 class="panel-title">Change User Password <a href="/bookshop?action=users" class="pull-right"><span class = "glyphicon glyphicon-list"></span>&nbsp;View List</a></h4>
            </div>
            <div class="panel-body">
                <div class="col-sm-10">
                    <form class="form-horizontal" role="form" action="components/users/controller.php" method="post">
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Username * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="username" name="username" value="<?php  if (isset($_SESSION['username'])) {echo $_SESSION['username'];} ?>" disabled/>
                            </div>
                        </div>                    
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">New Password * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="new_pass" name="new_pass" placeholder="Enter new user password" value="<?php  if (isset($_SESSION['new_pass'])) {echo $_SESSION['new_pass'];} ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Repeat Password * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="new_pass2" name="new_pass2" placeholder="Repeat new user password" value="<?php  if (isset($_SESSION['new_pass2'])) {echo $_SESSION['new_pass2'];} ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="submit" class="btn btn-success" name="changeuserpass"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Change</button>
                                <a href="/bookshop?action=users" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
                            </div>
                        </div>             
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>