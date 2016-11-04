<!-- include header -->
<?php include_once 'default_header.php';?>

<!-- include navigation -->
<?php include_once 'default_navi.php';?>

<!-- include container with sidebar -->
<?php include_once 'default_container.php';?>

<!-- include content -->
<?php
if (isset($_GET['s'])) {
	$site = $_GET['s'];
	if (file_exists("views/" . $site . ".php")) {
		include_once ($site . ".php");
	}
	else {
		echo "Sivua ei löydy.";
	}
}
else {
	include_once ("settings.php");
}
?>

<!-- include footer -->
<?php include_once 'default_footer.php';?>