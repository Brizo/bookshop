<?php
	if (isset($_SESSION['alert2']) && isset($_SESSION['status2']) && isset($_SESSION['message2'])) {
		$color = $_SESSION['alert2'];
		$status = $_SESSION['status2'];
		$message = $_SESSION['message2'];

		echo "<div class='alert alert-{$color} alert-dismissable'>
		    <button type='button' class='close' data-dismiss='alert'>&times;</button>
		    <strong>{$status} : </strong><span>{$message}</span>
		</div>";

		unset($_SESSION['alert2']);
		unset($_SESSION['status2']);
		unset($_SESSION['message2']);
	}
?>