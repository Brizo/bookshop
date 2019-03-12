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
                <h4 class="panel-title">Update User <a href="/bookshop?action=users" class="pull-right"><span class = "glyphicon glyphicon-list"></span>&nbsp;View List</a></h4>
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
                            <label for="form" class="col-sm-4 control-label">Firstname * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter user firstname" value="<?php  if (isset($_SESSION['first_name'])) {echo $_SESSION['first_name'];} ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Middlename :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter user middlename" value="<?php  if (isset($_SESSION['middle_name'])) {echo $_SESSION['middle_name'];} ?>" />
                            </div>
                        </div>                      
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Lastname * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter user lastname" value="<?php  if (isset($_SESSION['last_name'])) {echo $_SESSION['last_name'];} ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Role * :</label>
                            <div class="col-sm-8">                                
                                <select class="form-control" id="user_role" name="user_role">
                                    <option value="admin">Admin</option>
                                    <option value="normal">Normal</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Status :</label>
                            <div class="col-sm-8">                                
                                <select class="form-control" id="status" name="status">
                                    <option value="0">Skip</option>
                                    <option value="1">Activate</option>
                                    <option value="2">Disable</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="submit" class="btn btn-success" name="updateuser"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Update</button>
                                <a href="/<?php echo $_SESSION['home'];?>?action=users" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
                            </div>
                        </div>             
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>