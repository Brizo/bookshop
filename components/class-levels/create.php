<div class="panel with-nav-tabs panel-default">
	<div class="panel-heading">
		<?php include "partials/schools_nav.php"; ?>
	</div>
	<div class="panel-body">
		<div class="tab-pane" <?php if ($_SESSION['page'] == 'new-class_level') { echo 'active';} ?>>
			<div class="row">
				<div class="col-sm-2">
					<?php include "partials/class_levels_side_nav.php"; ?> 
				</div>
				<div class="col-sm-10">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="panel-title">
								<h4 class="panel-title">New Class Level</h4>
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
											<textarea rows="3" cols="50" class="form-control" placeholder="Enter class level descripion" name="description" value="<?php  if (isset($_SESSION['description'])) {echo $_SESSION['description'];} ?>"></textarea>
										</div>
									</div>                      
									
									<div class="form-group">
										<div class="col-sm-8 col-sm-offset-4">
											<button type="submit" class="btn btn-success" name="addnewclasslevel"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Add</button>
											<a href="/<?php echo $_SESSION['home'];?>?action=class_levels" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
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