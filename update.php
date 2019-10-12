<?php 
session_start();







if ($_SESSION['admin_login_status']==1) {
include 'connection.php';
  
  
  
		/// LOGOUT
		
		if (isset($_POST['Logout']) ) {
		unset($_SESSION['admin_details']);
		$_SESSION['admin_login_status']=0;
		header('Location: admin.php');
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

		


		//for Update item
		
		if (isset($_POST['submit_update'])) {
		$name=$_POST['name_input'];
		$image=$_POST['image_input'];
		$price=$_POST['price_input'];
		$Catagory=$_POST['catagory_input'];
		$id=$_POST['id_input'];


		if ($_POST['update_by']==0) {
			$query = "update item_information set Name='$name' where id=$id" ;
		} else if ($_POST['update_by']==1) {
			$query = "update item_information set Price=$price where id=$id" ;
		} else if($_POST['update_by']==2) {
			$query = "update item_information set Image='$image' where id=$id" ;
		}elseif ($_POST['update_by']==3) {
			$query = "update item_information set Catagory='$Catagory' where id=$id" ;
		}
		else if($_POST['update_by']==4) {
			$query = "update item set name='$name',image='$image',price=$price where id=$id" ;
		}

		$command= mysqli_query($connection,$query);
		if (mysqli_query($connection,$query)) {
			echo "updated";
			header('Location:update.php');
			
		}
		else{
			echo "failed";
		}



	}


}

else{
	echo '<script language="javascript">';
			echo 'alert("You dont Have Permission to do this")';
			echo '</script>';
			header('Location: admin.php');
}
  
		
		


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

	<link rel="stylesheet" type="text/css" href="css/update.css">
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
          <a class="dropdown-item" href="addnew.php">Add Product</a>
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
						

					<form method="POST">
						<select class="custom-select" name="select_by">
						<option value="1">Vegetables</option>
						<option value="2">Fruits</option>
						<option value="3">Groceries</option>
						<option value="4">Household</option>
						<option value="5">Baby Care</option>
						<option value="6">Other</option>

						</select>

						<button type="submit" name="select_table" class="btn btn-primary">Submit</button>
					</form>
		</div>
		
	</div>

	
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
					while ($item =mysqli_fetch_array($command)) {


						?>
						<tr>
							<td><?php echo $item['Id'] ?></td>
							<td><?php echo $item['Name'] ?></td>
							<td><?php echo $item['Price'] ?></td>
							<td><?php echo $item['Catagory'] ?></td>

						</tr>
						<?php 

					}
					?>

				</tbody>
			</table>
			<?php 		}		?>



	<center><h2>UPDATE DATA</h2></center>
	
	<form method="POST">
	<div class="row">
		<div class="col-lg-6 update">
		
		<label for="EmailInput">ID [ must fill up ]</label>
			<input type="number" class="form-control"  name="id_input">
			
			
			<label for="Update By">Select Which Information To Update</label>
			<select class="custom-select" name="update_by">
						<option value="0">Name</option>
						<option value="1">Price</option>
						<option value="2">Image</option>
						<option value="3">Catagory</option>
						<option value="4">Everything</option>

			</select>
			<br><br>
			
			<label for="EmailInput">Name</label>
			<input type="text" class="form-control"  name="name_input">
			<label for="EmailInput">IMAGE</label>
			<input type="text" class="form-control"  name="image_input">
			<label for="EmailInput">price</label>
			<input type="number" class="form-control"  name="price_input">
			<label for="EmailInput">Catagory</label>
			<input type="number" class="form-control"  name="catagory_input">
						
			
			<button type="submit" name="submit_update" class="btn btn-primary">Submit</button>
			
		</div>
		
	</div>
	</form>

</body>
</html>