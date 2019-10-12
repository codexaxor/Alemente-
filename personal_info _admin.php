<?php 
error_reporting(0);
include 'connection.php';
session_start();

$admin_detail=$_SESSION['admin_details'];
$sql="select * from admin_info where email='$admin_detail[0]' AND password='$admin_detail[1]'";
$command= mysqli_query($connection,$sql);
$row_number=mysqli_num_rows($command);




if (isset($_POST['Logout']) ) {
	unset($_SESSION['admin_details']);
	$_SESSION['admin_login_status']=0;
	header('Location: admin.php');
}





if (isset($_POST['update_information'])) {
	$email=$_POST['email_input'];
	
		$address=$_POST['new_address'];
		$phone=$_POST['new_contact'];
		$pass=$_POST['new_password'];
		
		
		if ($_POST['update_by']==0) {
			$query = "update admin_info set address='$address' where email=$email" ;
		} else if ($_POST['update_by']==1) {
			$query = "update admin_info set phone_no='$phone' where email=$email" ;
		} else if($_POST['update_by']==2) {
			$query = "update admin_info set password='$pass' where email=$email" ;
		}
		else if($_POST['update_by']==3) {
			$query = "update admin_info set address='$address',phone_no=$phone,password='$pass' where email=$email" ;
		}

	//$query="update admin_info set password='$password' where email='$email'" ;
	$command= mysqli_query($connection,$query);
		if (mysqli_query($connection,$query)) {
			
			echo '<script language="javascript">';
			echo 'alert("Updated")';
			echo '</script>';
			//$sql="select * from admin_info where email='$email' AND password='$password'";
			$sql="select * from admin_info where email='$email'";
			$command= mysqli_query($connection,$sql);
			$row_number=mysqli_num_rows($command);
			$_SESSION['login_status']=1;

			
		}
		else{
			echo '<script language="javascript">';
			echo 'alert("Failed")';
			echo '</script>';
		}
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PROFILE</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

	<link rel="stylesheet" type="text/css" href="css/personal_info.css">
</head>




<body>
	<!--Navbar-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item active">
					<a class="nav-link" href="admin_function.php">ALIMENTE<span class="sr-only">(current)</span></a>
				</li>
			</ul>

			<form class="form-inline my-2 my-lg-0" method="POST" >
				<button class="btn btn-outline-success my-2 my-sm-0" name="Logout" type="submit">Logout</button>
			</form>
		</div>
	</nav>

	<!--information Display-->
	<?php  
		if ($row_number>0) {
			while ($admin =mysqli_fetch_array($command)) {
				
				
				?>
				<div class="col-lg-9">
					
						<h1 class="card-title"><?php echo $admin['name'] ?></h1>
						<div class="card-body">
							
							<h2 class="item-price">Address: <?php echo $admin['address'] ?></h2>
							<h2 class="item-price">Contact number: <?php echo $admin['phone_no'] ?></h2>
							<h2 class="item-price">Gender: <?php echo $admin['gender'] ?></h2>
							<h2 class="item-price">E-mail: <?php echo $admin['email'] ?></h2>
					
						</div>
				
				</div>
					<?php
			}
		}
			?>


			<!--Update password-->

	
		<div class="col-lg-6">

			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">UPDATE Information</button>
	
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="container">
							<div class="row">

								<div class="col-lg-12">
									<div class="modal-header">
										<h4 class="modal-title">INFORMATION UPDATE</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>

									</div>
								</div>
							</div>
						</div>
		
						<div class="modal-body">
							<form method="post"  >
								

									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="EmailInput">Email address**</label>
												<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email
												" name="email_input">	
											</div>
										</div>
									</div>
									
									
									
									<!-- selection of information -->
									<label for="Update By">Select Which Information To Update</label>
									<select class="custom-select" name="update_by">
									<option value="0">address</option>
									<option value="1">phone</option>
									<option value="2">password</option>
									<option value="3">Everything</option>

									</select>
									
									<br>
									<br>
									<br>
									<br>
												
									<!-- new address -->
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="NameInput">New ADDRESS</label>
												<input type="text" class="form-control" id="new_password" name="new_address">

											</div>


										</div>

									</div>
									
									
									<!-- new contact-->
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="NameInput">New PhoneNumber</label>
												<input type="text" class="form-control" id="new_password" name="new_contact">

											</div>


										</div>

									</div>


									<!-- new password -->
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="PhoneNoInput">New Password</label>
												<input type="text" class="form-control" id="new_password" name="new_password">

											</div>


										</div>
									</div>

									<center>
										<button type="submit" name="update_information" class="btn btn-primary">Submit</button>
									</center>
									
							</form>
						</div>

					</div>

				</div>
			</div>
		</div>
</body>
</html>