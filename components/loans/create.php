<div class="row">
	<div class="col col-sm-2">
		<?php include "partials/side_nav.php"; ?>  
	</div>
	<div class="col col-sm-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">Add Loan <a href="/<?php echo $_SESSION['home'];?>?action=loans" class="pull-right"><span class = "glyphicon glyphicon-list"></span>&nbsp;View List</a></h4>
            </div>
            <div class="panel-body">
                <div class="col-sm-8">
                    <form class="form-horizontal" role="form" action="components/loans/controller.php" method="post">
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Account no * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="accountd" name="accountd" placeholder="Enter account number" value="<?php  if (isset($_SESSION['accountd'])) {echo $_SESSION['accountd'];} ?>" />
                            </div>
                        </div>                      
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Mobile * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="mobiled" name="mobiled" placeholder="Enter mobile number" value="<?php  if (isset($_SESSION['mobiled'])) {echo $_SESSION['mobiled'];} ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Telephone :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="telephoned" name="telephoned" placeholder="Enter telephone number" value="<?php  if (isset($_SESSION['telephoned'])) {echo $_SESSION['telephoned'];} ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Pin :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pind" name="pind" placeholder="Enter customer pin" value="<?php  if (isset($_SESSION['pind'])) {echo $_SESSION['pind'];} ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="submit" class="btn btn-success" name="addnewloan"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Add</button>
                                <a href="/<?php echo $_SESSION['home'];?>?action=loans" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
                            </div>
                        </div>                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>