<?php
	session_start();
	$_SESSION['user_login_status'] = 0;
	unset($_SESSION['email']);
	session_destroy();
	header('Location: index.php');
?>