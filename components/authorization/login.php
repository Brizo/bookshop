<div class="col-md-4 col-md-offset-4" id="login">
    <center class="page-header"><h2>Smart BookShop</h2></center>
    <form class="form-horizontal center" name="login" method="post" action="components/authorization/controller.php">
        <div class="form-group">
            <label for="form" class="col-sm-3 control-label">Username</label>
            <div class="col-sm-9">
                <input class="form-control" name="username" placeholder="Username" type="text">
            </div>
        </div>
        <div class="form-group">
            <label for="form" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-9">
                <input class="form-control" name="password" placeholder="Password" type="password">
            </div>
        </div>
        <div class="form-group last">
          <div class="col-sm-offset-3 col-sm-9">
            <button  type="submit" name="local" class="btn btn-success btn-sm"><span class = "glyphicon glyphicon-log-in"></span>&nbsp;Sign in</button>
            <button type="reset" class="btn btn-warning btn-sm"><span class = "glyphicon glyphicon-remove-circle"></span>&nbsp;Reset</button>
          </div>
        </div>
        <center><p><i>"Supplied By SinaweTech"</i></p></center>
    </form> 
</div> <!-- END COLUMN -->