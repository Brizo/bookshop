<?php
	session_start();
	require "config/routes.php";
	$yield = getRoute();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Smart BookShop</title>
		<!-- css -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="assets/css/jquery.dataTables.min.css"/>
		<link rel="stylesheet" href="assets/css/styles.css"/>

		<!-- javascript -->
		<script src="assets/js/jquery.min.js"></script>
    	<script src="assets/js/bootstrap.min.js"></script>
    	<script src="assets/js/dataTables.bootstrap.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<?php
			if (isset($_GET['action']) && isset($_SESSION["logged"])) {
				include "partials/banner.php";
				include "partials/main_nav.php";
			}
		?>
	</head>
  	<body>
        <div class="col-sm-12">
            <?php include "partials/notifications.php"; ?>    
        </div>

		<div class="col-sm-12">		
			<?php include $yield; ?>
		</div>
	</body>
</html>


