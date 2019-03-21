<?php
	include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/reports/controller.php";

	$stockBooks = countBooksOnStock();
	$loanedBooks = countLoanedBooks();
	$lostBooks = countLostBooks();
	$oldBooks = countOldBooks();
	$newBooks = countNewBooks();
	$students = countStudents();
?>

<div class="panel panel-primary">
	<div class="panel-heading">
    	<b>Reports</b>
    </div>
	<div class="panel-body">
		<div class="row">
			<div class="col col-sm-2">
				<?php include "partials/reports_side_nav.php"; ?>  
			</div>
			<div class="col col-sm-10">
				<div class="panel panel-default">
					<div class="panel-heading">
						<b>Dashboard</b>
					</div>
					<div class="panel-body">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-6">
									<a href="/bookshop?action=loaned-books_r" class="btn btn-default btn-lg btn-block" style="padding: 20px; background:#e3f2fd"><strong>Borrowed Books : </strong><span class="badge"><?php echo $loanedBooks; ?></span></a>
								</div>
								<div class="col-sm-6">
									<a href="/bookshop?action=lost-books_r" class="btn btn-default btn-lg btn-block" style="padding: 20px; background:#e3f2fd"><strong>Lost Books : </strong><span class="badge"><?php echo $lostBooks; ?></span></a>
								</div>
							</div><br>
							<div class="row">
								<div class="col-sm-6">
									<a href="/bookshop?action=returned-books_r" class="btn btn-default btn-lg btn-block" style="padding: 20px; background:#e3f2fd"><strong>Books On Stock : </strong><span class="badge"><?php echo $stockBooks; ?></span><br></a>
								</div>

								<div class="col-sm-6">
									<a href="/bookshop?action=new-books_r" class="btn btn-default btn-lg btn-block" style="padding: 20px; background:#e3f2fd"><strong>Never Borrowed : </strong><span class="badge"><?php echo $newBooks; ?></span><br></a>
								</div>
							</div><br>
							<div class="row">
								<div class="col-sm-6">
									<a href="/bookshop?action=old-books_r" class="btn btn-default btn-lg btn-block" style="padding: 20px; background:#e3f2fd"><strong>Old Books : </strong><span class="badge"><?php echo $oldBooks; ?></span><br></a>
								</div>

								<div class="col-sm-6">
									<a href="/bookshop?action=students" class="btn btn-default btn-lg btn-block" style="padding: 20px; background:#e3f2fd"><strong>Number of students : </strong><span class="badge"><?php echo $students; ?></span><br></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>