<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/subjects/controller.php";

    $subjects = array();
    $queryResult = retrieveSubjects();
    while ($row = mysqli_fetch_array($queryResult)) {
        $subjects[] = $row;
    }
    
    if (isset($_GET['name'])) {
        $_SESSION['streamName'] = $_GET['name'];
    }

    if (isset($_GET['id'])) {
        $_SESSION['streamId'] = $_GET['id'];
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
					<h4 class="panel-title">Add Subject To Stream</h4>
				</div>
			</div>
			<div class="panel-body">
				<div class="col-sm-8">
					<form class="form-horizontal" role="form" action="components/stream-subjects/controller.php" method="post">
						<div class="form-group">
							<label for="form" class="col-sm-4 control-label">Stream :</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="name" name="name"  value="<?php  if (isset($_SESSION['streamName'])) {echo $_SESSION['streamName'];} ?>" disabled/>
							</div>
						</div>
						<div class="form-group">
							<label for="form" class="col-sm-4 control-label">Subject * :</label>
							<div class="col-sm-8">                                
								<select class="form-control" id="class" name="streamSubject">
									<?php foreach($subjects as $row): ?>
										<option value="<?php echo $row['id']; ?>"><?=$row['name']?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>                   
						
						<div class="form-group">
							<div class="col-sm-8 col-sm-offset-4">
								<button type="submit" class="btn btn-success" name="addstreamsubject"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Add</button>
								<a href="/<?php echo $_SESSION['home'];?>?action=stream-subjects" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
							</div>
						</div>                
					</form>
				</div>
			</div>
		</div>
	</div>
</div>