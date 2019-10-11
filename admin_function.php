<?php 
session_start();



if ($_SESSION['admin_login_status'] == 1) {
include 'connection.php';
  

	// logout function 
	if (isset($_POST['Logout']) ) {
	unset($_SESSION['admin_details']);
	$_SESSION['admin_login_status']=0;
	header('Location: admin.php');
	}
  
  //<!-- // delete Function -->>
  
  if (isset($_POST['submit_delete'])) {
			
			$id=$_POST['id_input'];
			$query= "DELETE FROM item_information WHERE id=$id" ; 
			$command= mysqli_query($connection,$query);
			if (mysqli_query($connection,$query)) {
				echo "Deleted";
				header('Location:admin_function.php');				
			}
			else{
				echo "failed";
			}
		}

		//for display item in table 
		//for select option
		
		
		if (isset($_POST['select_table'])) {
		
		
		$Catagory=$_POST['select_by'];
		$query = "select * from item_information where Catagory=$Catagory order by id ASC" ;
		$command= mysqli_query($connection,$query);
		$row_number=mysqli_num_rows($command);
		}
		
		
		else{
		$query = "select * from item_information order by id ASC" ;
		$command= mysqli_query($connection,$query);
		$row_number=mysqli_num_rows($command);
		}

		//display start

	//new ADMIN  signUp
	
	
	/*
	if (isset($_POST['submit'])) {
	
	$_SESSION['name']= $_POST['name_input'];
	$_SESSION['phone_no']= $_POST['phone_input'];
	$_SESSION['address']= $_POST['address_input'];
	$_SESSION['gender']= $_POST['gender_input'];
	$_SESSION['email']= $_POST['email_input'];
	$_SESSION['password']= ($_POST['password_input']);

	header('Location: info_display _admin.php');

	}
	*/


}
else{
	echo '<script language="javascript">';
			echo 'alert("Please Login")';
			echo '</script>';
			header('Location: admin.php');
}
  
  
		
		


 ?>
 
 
<!DOCTYPE html>
<html>
<head>

	<title>Admin Panel</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

	<link rel="stylesheet" type="text/css" href="css/admin_function.css">

</head>



<body>
	<!--Navbar-->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">

	<a class="navbar-brand" href="admin_function.php">ALIMENTE</a>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item active">
				<a class="nav-link" href="#"><span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          More
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="personal_info _admin.php">My Profile</a>
          <a class="dropdown-item" href="addnew.php">New Product</a>
          <a class="dropdown-item" href="update.php">Update Product</a>
        </div>
      </li>

		</ul>
		
		
		<form class="form-inline my-2 my-lg-0" method="POST" >
				<button class="btn btn-outline-success my-2 my-sm-0" name="Logout" type="submit">Logout</button>
			</form>
		
	</div>
</nav>


<center><h1>DISPLAY ALL DATA</h1></center>
	<div class="row">
		<div class="col-lg-6">

					<!-- table selection fromn here -->			
					<form method="POST">
						<select class="custom-select" name="select_by">
						
						<option value="1">Vegetables</option>
						<option value="2">Fruits</option>
						<option value="3">Groceries</option>
						<option value="4">Household</option>
						<option value="5">Baby Care</option>
						<option value="6">Other</option>

						</select>

						<button type="submit" name="select_table" class="btn btn-primary">VIEW DATA</button>
					</form>
		</div>		
	</div>
		<!-- table creation for showing values -->
	
		<table class="table">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Name</th>
					<th scope="col">Price</th>
					<th scope="col">Catagory</th>

				</tr>
			</thead>		
			<tbody>
	
		<?php  
		if ($row_number>0) {
					while ($item = mysqli_fetch_array($command)) {
				?> 
						<tr>
							<td><?php echo $item['Id'] ?></td>
							<td><?php echo $item['Name'] ?></td>
							<td><?php echo $item['Price'] ?></td>
							<td><?php echo $item['Catagory'] ?></td>

						</tr>
			<?php } ?>
				</tbody>
			</table>
			
			
		<?php 
		}		
		?>

		<div class="col-lg-6 delete">
		
		
			<center><h1>Delete An Item</h1></center>
			
				<form method="POST">
					<label for="EmailInput">ID</label>
						<input type="number" class="form-control"  name="id_input">
					<button type="submit" name="submit_delete" class="btn btn-primary">DELETE</button>
				</form>	
			</div>		
		</div>	
	</div>
	

	
		<!--

    <div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content  -->
				<!--	
					
					<div class="modal-content">
						<div class="container">
							<div class="row">

								<div class="col-lg-12">
									<div class="modal-header">
										<h3 class="modal-title">ADMIN Sign Up FORM</h3>
										
										<button type="button" class="close" data-dismiss="modal">&times;</button>

									</div>

								</div>
							</div>

						</div>

						
						<div class="modal-body">
							<form method="post"  >
								<div class="container">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label class="label"for="NameInput">Full Name</label>
												<input type="text" class="form-control" id="name_input" name="name_input">

											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="PhoneNoInput" class="label">Phone Number</label>
												<input type="text" class="form-control" id="phone_number" name="phone_input">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="AddressInput" class="label">Address</label>
												<input type="text" class="form-control" id="address_input" name="address_input">
											</div>
										</div>
									</div>


									<div class="row">
										<div class="col-lg-12">
											<label for="GenderInput" class="label">Gender</label>
											<select class="custom-select" name="gender_input">
												<option selected>Gender</option>
												<option value="1">Male</option>
												<option value="2">Female</option>

											</select>
										</div>
									</div>


									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="EmailInput" class="label">Email address</label>
												<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email_input">
												
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="PasswordInput" class="label">Password</label>
												<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password_input">
											</div>
										</div>
									</div>
							
									<button type="submit" name="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
	</div>
	
	-->
		
</body>
</html>