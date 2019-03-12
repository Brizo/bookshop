<?php
    include $_SERVER['DOCUMENT_ROOT']."/bookshop/components/class-levels/controller.php";

    if (isset($_GET['id'])) {
        $classLevelId = $_GET['id'];
        $getClassLevelResult = getClassLevelByField("id", $classLevelId);
        $classLevel = mysqli_fetch_array($getClassLevelResult);

        $_SESSION['name'] = $classLevel['name'];
        $_SESSION['description'] = $classLevel['description'];
        $_SESSION['id'] = $classLevel['id'];
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
					<h4 class="panel-title">Update Class Level <a href="/bookshop?action=class-levels" class="pull-right"><span class = "glyphicon glyphicon-list"></span>&nbsp;View List</a></h4>
				</div>
			</div>
			<div class="panel-body">
				<div class="col-sm-8">
					<form class="form-horizontal" role="form" action="components/class-levels/controller.php" method="post">
						<div class="form-group">
							<label for="form" class="col-sm-4 control-label">Name * :</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="name" name="name" placeholder="Enter class level name" value="<?php  if (isset($_SESSION['name'])) {echo $_SESSION['name'];} ?>" />
							</div>
						</div>
						<div class="form-group">
							<label for="form" class="col-sm-4 control-label">Description :</label>
							<div class="col-sm-8">
								<textarea rows="3" cols="50" class="form-control" placeholder="Enter class level descripion" name="description"><?php  if (isset($_SESSION['description'])) {echo $_SESSION['description'];} ?></textarea>
							</div>
						</div>                      
						
						<div class="form-group">
							<div class="col-sm-8 col-sm-offset-4">
								<button type="submit" class="btn btn-success" name="updateclasslevel"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Add</button>
								<a href="/bookshop?action=class_levels" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
							</div>
						</div>                
					</form>
				</div>
			</div>
		</div>
	</div>
</div>