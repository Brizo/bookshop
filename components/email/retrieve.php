<?php
	include "controller.php";
	$configsExist = emailConfigsExist();

	if ($configsExist == 1) {
		$getConfigsResult = retrieveEmailConfigs();
		$emailConfigs = mysqli_fetch_array($getConfigsResult);

		if (!isset($_SESSION['email_port'])) {
			$_SESSION['email_port'] = $emailConfigs['email_port'];
		}
		
		if (!isset($_SESSION['email_type'])) {
			$_SESSION['email_type'] = $emailConfigs['email_type'];
		}

		if (!isset($_SESSION['username'])) {
			$_SESSION['username'] = $emailConfigs['username'];
		}

		if (!isset($_SESSION['password'])) {
			$_SESSION['password'] = $emailConfigs['password'];
		}

		if (!isset($_SESSION['host'])) {
			$_SESSION['host'] = $emailConfigs['host'];
		}

		if (!isset($_SESSION['reply_to'])) {
			$_SESSION['reply_to'] = $emailConfigs['reply_to'];
        }
        
        if (!isset($_SESSION['from_email'])) {
			$_SESSION['from_email'] = $emailConfigs['from_email'];
		}

		if (!isset($_SESSION['id'])) {
			$_SESSION['id'] = $emailConfigs['id'];
		}
	}
?>

<div class="row">
    <div class="col-sm-2">
		<?php include "partials/admin_side_nav.php"; ?> 
	</div>
	<div class="col-sm-10">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					<h4 class="panel-title">Email configurations</h4>
				</div>
			</div>
			<div class="panel-body">
				<div class="col-sm-10">
					<form class="form-horizontal" role="form" action="components/email/controller.php" method="post">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">From Email * :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="from_email" name="from_email" placeholder="Enter from email" value="<?php  if (isset($_SESSION['from_email'])) {echo $_SESSION['from_email'];} ?>" />
									</div>
								</div>                   
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Username * :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="username" name="username" placeholder="Enter authenticating email address" value="<?php  if (isset($_SESSION['username'])) {echo $_SESSION['username'];} ?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Password * :</label>
									<div class="col-sm-8">
										<input type="password" class="form-control" id="password" name="password" placeholder="Enter authenticating password" value="<?php  if (isset($_SESSION['password'])) {echo $_SESSION['password'];} ?>" />
									</div>
								</div>
                            </div>
                            <div class="col-sm-6">
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Host :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="host" name="host" placeholder="Enter Host" value="<?php  if (isset($_SESSION['host'])) {echo $_SESSION['host'];} ?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Protocol :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="email_type" name="email_type" placeholder="Enter email type" value="<?php  if (isset($_SESSION['email_type'])) {echo $_SESSION['email_type'];} ?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Port :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="email_port" name="email_port" placeholder="Enter email port" value="<?php  if (isset($_SESSION['email_port'])) {echo $_SESSION['email_port'];} ?>" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-8 col-sm-offset-4">
										<?php if ($configsExist == 0) echo '<button type="submit" class="btn btn-success" name="addnewemailconfigs"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Configure</button>'; ?>
										<?php if ($configsExist == 1) echo '<button type="submit" class="btn btn-success" name="updatemailconfigs"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Update</button>' ?>
										<a href="/<?php echo $_SESSION['home'];?>?action=email" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
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
