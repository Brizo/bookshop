<div id="banner" class="row">
  <div class="col-sm-4">
    <span id="company"><?php if (isset($_SESSION['accountName'])) {echo $_SESSION['accountName']; }?></span>
  </div>
  <div class="col-sm-4" id="bannerSystemName">
    <span>BOOK SYSTEM</span>
  </div>
  <div class="col-sm-4">
    <span class="pull-right">| <?=$_SESSION['instance']?> v<?=$_SESSION['version']?> | User: <?=$_SESSION['loggedUsername']?> | Role: <?=$_SESSION['loggedRole']?> | </span>
  </div>
</div>
<hr />