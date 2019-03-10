<div class="modal fade" id="aboutM" tabindex="-1" role="dialog" aria-labelledby="panelLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
              <h3 class="modal-title" id="panelLabel">Book System</h3>
          </div>
          <div class="modal-body">
              <div class='container-fluid'>
                <div class='row-fluid'>
                  <div class='col-lg-12'>
                    <!-- PANEL -->
                    <div class="panel panel-success">
                      <div class="panel-heading">
                        <h3 class="panel-title">System Details</h3>
                      </div>
                      <div class="panel-body">
                        <table class="table tabled-borderd">
                          <tr><th>Description</th><td>System for <br> 
                            <ul>
                                <li>Schook Book Inventory</li>
                                <li>Loaning Books to Students</li>
                                <li>Auditing Student Book Loans</li>
                            <ul></td></tr>
                          <tr><th>Developer</th><td>SinaweTech - www.sinawetech.com - 76428722 / 7622476</td></tr>
                          <tr><th>Launched</th><td>01 March 2019</td></tr>
                          <tr><th>Version</th><td>1.0.0</td></tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>


<div class="modal fade" id="selfChangePasswordM" tabindex="-1" role="dialog" aria-labelledby="panelLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
              <h3 class="modal-title" id="panelLabel">Change Your Password</h3>
          </div>
          <div class="modal-body">
              <div class='container-fluid'>
                <div class='row-fluid'>
                  <div class='col-lg-12'>
                    <!-- PANEL -->
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Password Details<span class="glyphicon glyphicon-user"></h3>
                      </div>
                      <div class="panel-body">
                        <?php include "partials/notifications2.php"; ?> 

                        <form class="form-horizontal" role="form" action="components/users/controller.php" method="post" name="selfchangepassword">
                          <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Old Password * :</label>
                            <div class="col-sm-8">
                              <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="Enter new password" value="<?php  if (isset($_SESSION['oldpassword'])) {echo $_SESSION['oldpassword'];} ?>" />
                            </div>
                          </div> 

                          <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">New Password * :</label>
                            <div class="col-sm-8">
                              <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Enter new password" value="<?php  if (isset($_SESSION['newpassword'])) {echo $_SESSION['newpassword'];} ?>" />
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="form" class="col-sm-4 control-label">Repeat Password * :</label>
                            <div class="col-sm-8">
                              <input type="password" class="form-control" id="newpassword2" name="newpassword2" placeholder="Repeat new password" value="<?php  if (isset($_SESSION['newpassword2'])) {echo $_SESSION['newpassword2'];} ?>" />
                            </div>
                          </div>                   
                      </div>
                      <div class="panel-footer">
                          <button type="submit" class="btn btn-primary" name="selfchangepwd"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;Change</button>
                          <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Close</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>