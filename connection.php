<?php 

$dbServer = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "alimente";


//$connection =mysqli_connect('localhost','root');
	//		mysqli_select_db($connection,'chal_dal');

$connection = mysqli_connect($dbServer,$dbUser,$dbPass,$dbName); 
 
?>