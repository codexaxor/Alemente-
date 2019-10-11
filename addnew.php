<?php 
session_start();

if ($_SESSION['admin_login_status'] == 1) {
include 'connection.php';
  
  

  
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

		//for ADD new item
		if (isset($_POST['submit_add'])) {
				$name=$_POST['name_input'];
				$image=$_POST['image_input'];
				$price=$_POST['price_input'];
				$Catagory=$_POST['catagory_input'];

				$query="INSERT INTO item_information (Name,Price,Catagory,Image)
				VALUES ('$name',$price,$Catagory,'$image')"; 
				$command= mysqli_query($connection,$query);
				if ($command) {
					echo "ADDED";
					header('Location:admin_function.php');
				}
				else{
					echo "failed";
				}
			}


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
	<title>New Product</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

	<link rel="stylesheet" type="text/css" href="css/addnew_product.css">
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
          <a class="dropdown-item" href="update.php">Update Product</a>
        
        </div>
      </li>

		</ul>
		
		<form class="form-inline my-2 my-lg-0" method="POST" >
				<button class="btn btn-outline-success my-2 my-sm-0" name="Logout" type="submit">Logout</button>
		</form>

	</div>
</nav>

		<center><h2>For Showing item</h2></center>
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
			<?php 

		}


		
		?>


	<!-- product ADD -->
	
	
	<div class="row">
		<div class="col-lg-6 add">
			<center><h1>ADD NEW ITEM</h1></center>
			
			<form method="POST">
			<label for="EmailInput">Name</label>
			<input type="text" class="form-control"  name="name_input">
			<label for="EmailInput">image</label>
			<input type="text" class="form-control"  name="image_input">
			<label for="EmailInput">price</label>
			<input type="number" class="form-control"  name="price_input">
			<label for="EmailInput">Catagory</label>
			<input type="number" class="form-control"  name="catagory_input">
			
			
			
			<button type="submit" name="submit_add" class="btn btn-primary">Submit</button>
			</form>
			

		</div>
	</div>

</body>
</html>