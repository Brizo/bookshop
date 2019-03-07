<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/books/controller.php";

    $books = array();
    $queryResult = retrieveBooks();
    while ($row = mysqli_fetch_array($queryResult)) {
        $books[] = $row;
    }
    
    if (isset($_GET['name'])) {
        $_SESSION['subjectName'] = $_GET['name'];
    }

    if (isset($_GET['id'])) {
        $_SESSION['subjectId'] = $_GET['id'];
    }

?>

<div class="panel with-nav-tabs panel-default">
	<div class="panel-heading">
		<?php include "partials/school_side_nav.php"; ?>
	</div>
	<div class="panel-body">
		<div class="tab-pane" <?php if ($_SESSION['page'] == 'new-subject-book') { echo 'active';} ?>>
			<div class="row">
				<div class="col-sm-2">
					<?php include "partials/streams_side_nav.php"; ?> 
				</div>
				<div class="col-sm-10">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="panel-title">
								<h4 class="panel-title">Add book to subject</h4>
							</div>
						</div>
						<div class="panel-body">
							<div class="col-sm-8">
								<form class="form-horizontal" role="form" action="components/subject-books/controller.php" method="post">
									<div class="form-group">
										<label for="form" class="col-sm-4 control-label">Subject :</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="name" name="name"  value="<?php  if (isset($_SESSION['subjectName'])) {echo $_SESSION['subjectName'];} ?>" disabled/>
										</div>
									</div>
									<div class="form-group">
                                        <label for="form" class="col-sm-4 control-label">Book * :</label>
                                        <div class="col-sm-8">                                
                                            <select class="form-control" id="class" name="subjectBook">
                                                <?php foreach($books as $row): ?>
                                                    <option value="<?php echo $row['id']; ?>"><?=$row['name']?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>                   
									
									<div class="form-group">
										<div class="col-sm-8 col-sm-offset-4">
											<button type="submit" class="btn btn-success" name="addsubjectbook"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Add</button>
											<a href="/<?php echo $_SESSION['home'];?>?action=subject-books" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
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