<?php
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/streams/controller.php";
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/classes/controller.php";
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/school/controller.php";
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/class-levels/controller.php";

    $streams = array();
    $queryResult = retrieveStreams();
    while ($row = mysqli_fetch_array($queryResult)) {
        $streams[] = $row;
	}
	
	$classes = array();
    $queryResult = retrieveClasses();
    while ($row = mysqli_fetch_array($queryResult)) {
        $classes[] = $row;
	}
	
	$class_levels = array();
    $queryResult = retrieveClassLevels();
    while ($row = mysqli_fetch_array($queryResult)) {
        $class_levels[] = $row;
	}
	
	$getAccountResult = retrieveAccount();
	$account = mysqli_fetch_array($getAccountResult);
	$studentNoCounter = $account['student_no_counter'] + 1;
	$_SESSION['student_no'] = "0".$studentNoCounter;
?>

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
									<label for="form" class="col-sm-4 control-label">Student Number * :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="student_no" name="student_no" value="<?php  echo $_SESSION['student_no']; ?>" disabled/>
									</div>
								</div>
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
									<label for="form" class="col-sm-4 control-label">National Id :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="national_id" name="national_id" placeholder="Enter nation ID" value="<?php  if (isset($_SESSION['national_id'])) {echo $_SESSION['national_id'];} ?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Date Of Birth * :</label>
									<div class="col-sm-8">
										<input type="text" id="datepicker" class="form-control datepicker-here" name="birth_date" placeholder="Click for date of birth" value="<?php  if (isset($_SESSION['birth_date'])) {echo $_SESSION['birth_date'];} ?>" />
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Contact Number :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Enter contact number" value="<?php  if (isset($_SESSION['contact_no'])) {echo $_SESSION['contact_no'];} ?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Email Address :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="std_email_address" name="std_email_address" placeholder="Enter email address" value="<?php  if (isset($_SESSION['std_email_address'])) {echo $_SESSION['std_email_address'];} ?>" />
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

<script type="text/javascript">
	$("#datepicker" ).datepicker({
		language: 'en',
		dateFormat: 'yyyy-mm-dd',
		todayButton: new Date(),
		autoClose: true,
		maxDate: new Date()
	});
</script>