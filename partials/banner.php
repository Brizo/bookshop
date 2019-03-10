<div id="banner" class="row">
  <div class="col-sm-4">
    <span id="company"><?php if (isset($_SESSION['accountName'])) {echo $_SESSION['accountName']; }?></span>
  </div>
  <div class="col-sm-4" id="bannerSystemName">
    <span>BOOK SYSTEM</span>
  </div>
  <div class="col-sm-4">
    <span class="pull-right">| <?php echo $_SESSION['instance']; ?> <?php echo $_SESSION['version']; ?> | User: <?php echo $_SESSION['loggedUsername']; ?> | Role: <?php echo $_SESSION['loggedRole']; ?> | </span>
  </div>
</div>
<hr />