<?php
    include "controller.php";

    if (isset($_GET['id'])) {
        $subjectId = $_GET['id'];
        $getSubjectResult = getSubjectByField("id", $subjectId);
        $subject = mysqli_fetch_array($getSubjectResult);

        $_SESSION['name'] = $subject['name'];
        $_SESSION['id'] = $subject['id'];
    }
?>

<div class="row">
	<div class="col col-sm-2">
		<?php include "partials/school_side_nav.php"; ?>  
	</div>
	<div class="col col-sm-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">Remove Subject <a href="/<?php echo $_SESSION['home'];?>?action=subjects" class="pull-right"><span class = "glyphicon glyphicon-list"></span>&nbsp;View List</a></h4>
            </div>
            <div class="panel-body">
                <div class="col-sm-8">
                    <form class="form-horizontal" role="form" action="components/subjects/controller.php" method="post" id="removeSubjectForm">
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Name * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" value="<?php  if (isset($_SESSION['name'])) {echo $_SESSION['name'];} ?>" disabled/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Reason * :</label>
                            <div class="col-sm-8">
                                <textarea rows="3" cols="50" class="form-control" placeholder="Enter subject deletion reason" name="reason"><?php  if (isset($_SESSION['reason'])) {echo $_SESSION['reason'];} ?></textarea>
                            </div>
                        </div>                      
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="submit" class="btn btn-success" name="removesubject"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Remove</button>
                                <a href="/<?php echo $_SESSION['home'];?>?action=subjects" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Cancel</a>
                            </div>
                        </div>                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
		$('#removeSubjectForm').submit(function(e){
            if (confirm("Are you sure you want to remove this subject?")) {
                return true;
            } else {
                return false;
            }
        }); 
    });
</script>