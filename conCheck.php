<?php

	include 'connection.php';
?>

<html>
<head> Connection Status</head>

<body>

<?php
	
	$sql = "select * from user_info;";
	$res = mysqli_query($connection,$sql);
	$sts = mysqli_num_rows($res);
	
	if(	$sts > 0 ){
		echo "connection stablished <br>";
		
		while($row = mysqli_fetch_assoc($res)){
			echo $row['email']."<br>";
		}
	}
	else{
		echo "error";
	}

?>


</body>
</html>
