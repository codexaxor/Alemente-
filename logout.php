<?php
	session_start();
	$_SESSION['email'] = 0;
	session_destroy();
	header('Location: index.php');
?>