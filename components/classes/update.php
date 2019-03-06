<?php
    include "controller.php";

    if (isset($_GET['id'])) {
        $classId = $_GET['id'];
        $getClassResult = getClassByField("id", $classId);
        $class = mysqli_fetch_array($getClassResult);

        $_SESSION['name'] = $class['name'];
        $_SESSION['description'] = $class['description'];
        $_SESSION['id'] = $class['id'];
    }

?>

<div class="row">
	<div class="col-sm-2">
		<?php include "partials/classes_side_nav.php"; ?> 
	</div>
	<div class="col-sm-10">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					<h4 class="panel-title">Update Class</h4>
				</div>
			</div>
			<div class="panel-body">
				<div class="col-sm-8">
					<form class="form-horizontal" role="form" action="components/classes/controller.php" method="post">
						<div class="form-group">
							<label for="form" class="col-sm-4 control-label">Name * :</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="name" name="name" placeholder="Enter class name" value="<?php  if (isset($_SESSION['name'])) {echo $_SESSION['name'];} ?>" />
							</div>
						</div>
						<div class="form-group">
							<label for="form" class="col-sm-4 control-label">Description :</label>
							<div class="col-sm-8">
								<textarea rows="3" cols="50" class="form-control" placeholder="Enter class descripion" name="description" value="<?php  if (isset($_SESSION['description'])) {echo $_SESSION['description'];} ?>"></textarea>
							</div>
						</div>                      
						
						<div class="form-group">
							<div class="col-sm-8 col-sm-offset-4">
								<button type="submit" class="btn btn-success" name="updateclass"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Add</button>
								<a href="/<?php echo $_SESSION['home'];?>?action=classes" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
							</div>
						</div>                
					</form>
				</div>
			</div>
		</div>
	</div>
</div>