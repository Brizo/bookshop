<div class="panel with-nav-tabs panel-default">
	<div class="panel-heading">
		<?php include "partials/schools_nav.php"; ?>
	</div>
	<div class="panel-body">
		<div class="tab-pane" <?php if ($_SESSION['page'] == 'new-student') { echo 'active';} ?>>
			<div class="row">
				<div class="col-sm-2">
					<?php include "partials/students_side_nav.php"; ?> 
				</div>
				<div class="col-sm-10">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="panel-title">
								<h4 class="panel-title">New Student</h4>
							</div>
						</div>
						<div class="panel-body">
							<div class="col-sm-12">
								<form class="form-horizontal" role="form" action="components/students/controller.php" method="post">
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label for="form" class="col-sm-4 control-label">Firstname * :</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter firstname" value="<?php  if (isset($_SESSION['first_name'])) {echo $_SESSION['first_name'];} ?>" />
												</div>
											</div>
											<div class="form-group">
												<label for="form" class="col-sm-4 control-label">Middlename:</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter middlename" value="<?php  if (isset($_SESSION['middle_name'])) {echo $_SESSION['middle_name'];} ?>" />
												</div>
											</div>
											<div class="form-group">
												<label for="form" class="col-sm-4 control-label">Lastname * :</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter lastname" value="<?php  if (isset($_SESSION['last_name'])) {echo $_SESSION['last_name'];} ?>" />
												</div>
											</div>                     
											<div class="form-group">
												<label for="form" class="col-sm-4 control-label">National Id * :</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="national_id" name="national_id" placeholder="Enter nation ID" value="<?php  if (isset($_SESSION['national_id'])) {echo $_SESSION['national_id'];} ?>" />
												</div>
											</div>
											<div class="form-group">
												<label for="form" class="col-sm-4 control-label">Date Of Birth * :</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="birth_date" name="birth_date" placeholder="Enter date of birth" value="<?php  if (isset($_SESSION['birth_date'])) {echo $_SESSION['birth_date'];} ?>" />
												</div>
											</div>
											<div class="form-group">
												<label for="form" class="col-sm-4 control-label">Contact Number :</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Enter contact number" value="<?php  if (isset($_SESSION['contact_no'])) {echo $_SESSION['contact_no'];} ?>" />
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label for="form" class="col-sm-4 control-label">Contact Email Address :</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="email_address" name="email_address" placeholder="Enter email address" value="<?php  if (isset($_SESSION['email_address'])) {echo $_SESSION['email_address'];} ?>" />
												</div>
											</div>
											<div class="form-group">
												<label for="form" class="col-sm-4 control-label">Gender * :</label>
												<div class="col-sm-8">                                
													<select class="form-control" id="gender" name="gender">
														<option value="male">Male</option>
														<option value="female">Female</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="form" class="col-sm-4 control-label">Stream * :</label>
												<div class="col-sm-8">                                
													<select class="form-control" id="stream" name="stream">
														<?php foreach($streams as $row): ?>
															<option value="<?php echo $row['id']; ?>"><?=$row['name']?></option>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="form" class="col-sm-4 control-label">Class * :</label>
												<div class="col-sm-8">                                
													<select class="form-control" id="class" name="class">
														<?php foreach($classes as $row): ?>
															<option value="<?php echo $row['id']; ?>"><?=$row['name']?></option>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="form" class="col-sm-4 control-label">Class Level * :</label>
												<div class="col-sm-8">                                
													<select class="form-control" id="class_level" name="class_level">
														<?php foreach($class_levels as $row): ?>
															<option value="<?php echo $row['id']; ?>"><?=$row['name']?></option>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
													<button type="submit" class="btn btn-success" name="addnewstudent"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Add</button>
													<a href="/<?php echo $_SESSION['home'];?>?action=students" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
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