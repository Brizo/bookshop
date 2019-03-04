<?php
	include "controller.php";

	$stockBooks = countBooksOnStock();
	$loanedBooks = countLoanedBooks();
	$lostBooks = countLostBooks();
	$replacedBooks = countReplacedBooks();
	$streams = countStreams();
	$students = countStudents();
?>

<div class="panel panel-primary">
	<div class="panel-heading">
    	<b>Welcome to Mpaka Book System</b>
    </div>
	<div class="panel-body">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-6">
						<a href="#" class="btn btn-default btn-lg btn-block" style="padding: 20px"><strong>Number of books on stock : </strong><span class="badge"><?php echo $stockBooks; ?></span></a>
					</div>
					<div class="col-sm-6">
						<a href="#" class="btn btn-default btn-lg btn-block" style="padding: 20px"><strong>Number of loaned books : </strong><span class="badge"><?php echo $loanedBooks; ?></span></a>
					</div>
				</div><br>
				<div class="row">
					<div class="col-sm-6">
						<a href="#" class="btn btn-default btn-lg btn-block" style="padding: 20px"><strong>Number of replaced books : </strong><span class="badge"><?php echo $replacedBooks; ?></span><br></a>
					</div>

					<div class="col-sm-6">
						<a href="#" class="btn btn-default btn-lg btn-block" style="padding: 20px"><strong>Number of lost books : </strong><span class="badge"><?php echo $lostBooks; ?></span><br></a>
					</div>
				</div><br>
				<div class="row">
					<div class="col-sm-6">
						<a href="#" class="btn btn-default btn-lg btn-block" style="padding: 20px"><strong>Number of streams : </strong><span class="badge"><?php echo $streams; ?></span><br></a>
					</div>

					<div class="col-sm-6">
						<a href="#" class="btn btn-default btn-lg btn-block" style="padding: 20px"><strong>Number of students : </strong><span class="badge"><?php echo $students; ?></span><br></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>