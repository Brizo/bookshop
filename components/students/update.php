<?php
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/streams/controller.php";
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/school/controller.php";
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/classes/controller.php";
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/students/controller.php";
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

    if (isset($_GET['id'])) {
        $studentId = $_GET['id'];
        $getStudentResult = getStudentByField("id", $studentId);
        $student = mysqli_fetch_array($getStudentResult);

		$_SESSION['first_nameu'] = $student['first_name'];
		$_SESSION['student_nou'] = $student['student_no'];
        $_SESSION['middle_nameu'] = $student['middle_name'];
		$_SESSION['last_nameu'] = $student['national_id'];
		$_SESSION['national_idu'] = $student['last_name'];
        $_SESSION['birth_dateu'] = $student['birth_date'];
        $_SESSION['contact_nou'] = $student['contact_no'];
        $_SESSION['std_email_addressu'] = $student['email_address'];
        $_SESSION['genderu'] = $student['gender'];
        $_SESSION['streamu'] = $student['stream'];
        $_SESSION['classu'] = $student['class'];
        $_SESSION['class_levelu'] = $student['class_level'];
        $_SESSION['idu'] = $student['id'];
    }
?>

<div class="row">
	<div class="col-sm-2">
		<?php include "partials/school_side_nav.php"; ?> 
	</div>
	<div class="col-sm-10">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					<h4 class="panel-title">Update Student <a href="/bookshop?action=students" class="pull-right"><span class = "glyphicon glyphicon-list"></span>&nbsp;View List</a></h4>
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
										<input type="text" class="form-control" id="student_nou" name="student_nou" value="<?php  if (isset($_SESSION['student_nou'])) {echo $_SESSION['student_nou'];} ?>"/>
									</div>
								</div>
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Firstname * :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="first_nameu" name="first_nameu" placeholder="Enter firstname" value="<?php  if (isset($_SESSION['first_nameu'])) {echo $_SESSION['first_nameu'];} ?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Middlename:</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="middle_nameu" name="middle_nameu" placeholder="Enter middlename" value="<?php  if (isset($_SESSION['middle_nameu'])) {echo $_SESSION['middle_nameu'];} ?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Lastname * :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="last_nameu" name="last_nameu" placeholder="Enter lastname" value="<?php  if (isset($_SESSION['last_nameu'])) {echo $_SESSION['last_nameu'];} ?>" />
									</div>
								</div>                     
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">National Id * :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="national_idu" name="national_idu" placeholder="Enter nation ID" value="<?php  if (isset($_SESSION['national_idu'])) {echo $_SESSION['national_idu'];} ?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Date Of Birth * :</label>
									<div class="col-sm-8">
										<input type="text" id="datepicker" class="form-control datepicker-here" name="birth_dateu" placeholder="Click date of birth" value="<?php  if (isset($_SESSION['birth_dateu'])) {echo $_SESSION['birth_dateu'];} ?>" />
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Contact Number :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="contact_nou" name="contact_nou" placeholder="Enter contact number" value="<?php  if (isset($_SESSION['contact_nou'])) {echo $_SESSION['contact_nou'];} ?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Email Address :</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="std_email_addressu" name="std_email_addressu" placeholder="Enter email address" value="<?php  if (isset($_SESSION['std_email_addressu'])) {echo $_SESSION['std_email_addressu'];} ?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Gender * :</label>
									<div class="col-sm-8">                                
										<select class="form-control" id="genderu" name="genderu">
											<option value="male" <?php if (isset($_SESSION['genderu']) && $_SESSION['genderu'] == 'male') {echo "selected";} ?> >Male</option>
											<option value="female" <?php if (isset($_SESSION['genderu']) && $_SESSION['genderu'] == 'female') {echo "selected";} ?> >Female</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Stream * :</label>
									<div class="col-sm-8">                                
										<select class="form-control" id="streamu" name="streamu">
											<?php foreach($streams as $row): ?>
												<option value="<?=$row['id']?>" <?php if (isset($_SESSION['streamu']) && $_SESSION['streamu'] == $row['id']) {echo "selected";} ?> ><?=$row['name']?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Class * :</label>
									<div class="col-sm-8">                                
										<select class="form-control" id="classu" name="classu">
											<?php foreach($classes as $row): ?>
												<option value="<?=$row['id']?>" <?php if (isset($_SESSION['classu']) && $_SESSION['classu'] == $row['id']) {echo "selected";} ?> ><?=$row['name']?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="form" class="col-sm-4 control-label">Class Level * :</label>
									<div class="col-sm-8">                                
										<select class="form-control" id="class_levelu" name="class_levelu">
											<?php foreach($class_levels as $row): ?>
												<option value="<?=$row['id']?>" <?php if (isset($_SESSION['class_levelu']) && $_SESSION['class_levelu'] == $row['id']) {echo "selected";} ?> ><?=$row['name']?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-8 col-sm-offset-4">
										<button type="submit" class="btn btn-success" name="updatestudent"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Update</button>
										<a href="/bookshop?action=students" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
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