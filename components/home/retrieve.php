<?php
	// open modal when there is an error
	if (isset($_SESSION["selfchangepwdfailure"])){
		echo "<script type='text/javascript'>
			$('#selfChangePasswordM').modal({backdrop:'static',keyboard:false});
			$('#selfChangePasswordM').modal('show');
		</script>";

		unset($_SESSION["selfchangepwdfailure"]);
	}

	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/home/controller.php";

	$stockBooks = countBooksOnStock();
	$loanedBooks = countLoanedBooks();
	$lostBooks = countLostBooks();
	$oldBooks = countOldBooks();
	$streams = countStreams();
	$students = countStudents();
?>

<div class="panel panel-primary">
	<div class="panel-heading">
    	<b>Welcome <?php if (isset($_SESSION['accountName'])) {echo "to ".$_SESSION['accountName']." Book System"; }?></b>
    </div>
	<div class="panel-body">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-6">
						<a href="#" class="btn btn-default btn-lg btn-block" style="padding: 20px; background:#e3f2fd"><strong>Number of books on stock : </strong><span class="badge"><?php echo $stockBooks; ?></span></a>
					</div>
					<div class="col-sm-6">
						<a href="#" class="btn btn-default btn-lg btn-block" style="padding: 20px; background:#e3f2fd"><strong>Number of loaned books : </strong><span class="badge"><?php echo $loanedBooks; ?></span></a>
					</div>
				</div><br>
				<div class="row">
					<div class="col-sm-6">
						<a href="#" class="btn btn-default btn-lg btn-block" style="padding: 20px; background:#e3f2fd"><strong>Number of old books : </strong><span class="badge"><?php echo $oldBooks; ?></span><br></a>
					</div>

					<div class="col-sm-6">
						<a href="#" class="btn btn-default btn-lg btn-block" style="padding: 20px; background:#e3f2fd"><strong>Number of lost books : </strong><span class="badge"><?php echo $lostBooks; ?></span><br></a>
					</div>
				</div><br>
				<div class="row">
					<div class="col-sm-6">
						<a href="#" class="btn btn-default btn-lg btn-block" style="padding: 20px; background:#e3f2fd"><strong>Number of streams : </strong><span class="badge"><?php echo $streams; ?></span><br></a>
					</div>

					<div class="col-sm-6">
						<a href="#" class="btn btn-default btn-lg btn-block" style="padding: 20px; background:#e3f2fd"><strong>Number of students : </strong><span class="badge"><?php echo $students; ?></span><br></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>