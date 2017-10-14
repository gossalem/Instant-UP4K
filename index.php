<?php
	require 'core/config/db.php';

	require 'core/config/mconfig.php';

	require 'core/templates/html/header.php';

	$uzver1 = mysqli_query($mysqli, "SELECT * FROM `up4k_users` WHERE `login` = '$_SESSION[logged_user]'");

	$uzver = mysqli_fetch_assoc($uzver1);

	if($uzver['is_banned'] == 1 or $uzver == NULL) {
		unset($_SESSION[logged_user]);
	}

	//echo $uzver[usergroup];

	$urlSegments = explode("/", $_GET['url']);
	
	if ($urlSegments[0] == null) {

		$urlSegments[0] = "main";

	}

	if (file_exists('core/templates/components/'.$urlSegments[0].'.php')) {

		require 'core/templates/components/'.$urlSegments[0].'.php';

	}

	else {

		require 'core/templates/components/main.php';

	}
	
	require 'core/templates/html/footer.php';

	mysqli_close($mysqli);
?>
