<div class="row">
	<div class="col col-sm-2">
		<?php include "partials/admin_side_nav.php"; ?>  
	</div>
	<div class="col col-sm-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">Add User <a href="/<?php echo $_SESSION['home'];?>?action=users" class="pull-right"><span class = "glyphicon glyphicon-list"></span>&nbsp;View List</a></h4>
            </div>
            <div class="panel-body">
                <div class="col-sm-10">
                    <form class="form-horizontal" role="form" action="components/users/controller.php" method="post">
                        <div class="row">
                            <div class="col-sm-6">
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
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form" class="col-sm-4 control-label">Username * :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="usernameu" name="usernameu" placeholder="Enter username" value="<?php  if (isset($_SESSION['usernameu'])) {echo $_SESSION['usernameu'];} ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="form" class="col-sm-4 control-label">Password * :</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="passwordu" name="passwordu" placeholder="Enter password" value="<?php  if (isset($_SESSION['passwordu'])) {echo $_SESSION['passwordu'];} ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="form" class="col-sm-4 control-label">Confirm Password * :</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="passwordu2" name="passwordu2" placeholder="Confirm password" value="<?php  if (isset($_SESSION['passwordu2'])) {echo $_SESSION['passwordu2'];} ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-8 col-sm-offset-4">
                                        <button type="submit" class="btn btn-success" name="addnewuser"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Add</button>
                                        <a href="/<?php echo $_SESSION['home'];?>?action=users" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
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