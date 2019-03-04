<?php
	if (isset($_SESSION['alert']) && isset($_SESSION['status']) && isset($_SESSION['message'])) {
		$color = $_SESSION['alert'];
		$status = $_SESSION['status'];
		$message = $_SESSION['message'];

		echo "<div class='alert alert-{$color} alert-dismissable'>
		    <button type='button' class='close' data-dismiss='alert'>&times;</button>
		    <strong>{$status} : </strong><span>{$message}</span>
		</div>";

		unset($_SESSION['alert']);
		unset($_SESSION['status']);
		unset($_SESSION['message']);
	}
?>