<?php
	include "controller.php";
	$accountExist = accountExist();
?>

<div class="panel with-nav-tabs panel-default">
	<div class="panel-heading">
		<?php include "partials/schools_nav.php"; ?>
	</div>
	<div class="panel-body">
		<div class="tab-pane" <?php if ($_SESSION['page'] == 'school') { echo 'active';} ?>>
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="panel-title">
								<h4 class="panel-title">Account Information</h4>
							</div>
						</div>
						<div class="panel-body">
							<div class="col-sm-10">
								<form class="form-horizontal" role="form" action="components/school/controller.php" method="post">
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label for="form" class="col-sm-4 control-label">School Name * :</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="name" name="name" placeholder="Enter school name" value="<?php  if (isset($_SESSION['name'])) {echo $_SESSION['name'];} ?>" />
												</div>
											</div>                   
											<div class="form-group">
												<label for="form" class="col-sm-4 control-label">Contact Person * :</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Enter  contact person" value="<?php  if (isset($_SESSION['contact_person'])) {echo $_SESSION['contact_person'];} ?>" />
												</div>
											</div>
											<div class="form-group">
												<label for="form" class="col-sm-4 control-label">Telephone * :</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="telephone" name="telephone" placeholder="Enter telephone" value="<?php  if (isset($_SESSION['telephone'])) {echo $_SESSION['telephone'];} ?>" />
												</div>
											</div>
											<div class="form-group">
												<label for="form" class="col-sm-4 control-label">Fax :</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="fax" name="fax" placeholder="Enter fax" value="<?php  if (isset($_SESSION['fax'])) {echo $_SESSION['fax'];} ?>" />
												</div>
											</div>
											<div class="form-group">
												<label for="form" class="col-sm-4 control-label">Email Address :</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="email_address" name="email_address" placeholder="Enter email address" value="<?php  if (isset($_SESSION['email_address'])) {echo $_SESSION['email_address'];} ?>" />
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label for="form" class="col-sm-4 control-label">Website :</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="website" name="website" placeholder="Enter website" value="<?php  if (isset($_SESSION['website'])) {echo $_SESSION['website'];} ?>" />
												</div>
											</div>
											<div class="form-group">
												<label for="form" class="col-sm-4 control-label">Postal Address * :</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="postal_address" name="postal_address" placeholder="Enter postal address" value="<?php  if (isset($_SESSION['postal_address'])) {echo $_SESSION['postal_address'];} ?>" />
												</div>
											</div>
											<div class="form-group">
												<label for="form" class="col-sm-4 control-label">Physical Address * :</label>
												<div class="col-sm-8">
													<textarea rows="3" cols="50" class="form-control" placeholder="Enter physical address" name="physical_address" value="<?php  if (isset($_SESSION['physical_address'])) {echo $_SESSION['physical_address'];} ?>"></textarea>
												</div>
											</div>
											<div class="form-group">
												<label for="form" class="col-sm-4 control-label">Username Prefix * :</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="username_prefix" name="username_prefix" placeholder="Enter username prefix" value="<?php  if (isset($_SESSION['username_prefix'])) {echo $_SESSION['username_prefix'];} ?>" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
													<?php if ($accountExist == 0) echo '<button type="submit" class="btn btn-success" name="addnewaccount"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Configure</button>'; ?>
													<?php if ($accountExist == 1) echo '<button type="submit" class="btn btn-success" name="updateccount"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Update</button>' ?>
													<a href="/<?php echo $_SESSION['home'];?>?action=school" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
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
		</div>
	</div>
</div>