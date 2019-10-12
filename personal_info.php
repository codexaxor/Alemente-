<?php 
error_reporting(0);
include 'connection.php';
session_start();

//include 'navbar.php';
include 'userNavigate.php';

$user_detail=$_SESSION['email'];
$sql="select * from user_info where email='$user_detail'";
$command= mysqli_query($connection,$sql);
$row_number=mysqli_num_rows($command);



if (isset($_POST['Logout']) ) {

	//session_start();
	$_SESSION['email'] = 0;
	session_destroy();
	//unset($_SESSION['user_details']);
	$_SESSION['login_status']=0;
	header('Location: index.php');
}

if (isset($_POST['update_password'])) {
	$email=$_POST['email_input'];
	$password=$_POST['new_password'];
	$query="update user_info set password='$password' where email='$email'" ;
	$command= mysqli_query($connection,$query);
		if (mysqli_query($connection,$query)) {
			
			echo '<script language="javascript">';
			echo 'alert("Updated")';
			echo '</script>';
			$sql="select * from user_info where email='$email' AND password='$password'";
			$command= mysqli_query($connection,$sql);
			$row_number=mysqli_num_rows($command);

			
		}
		else{
			echo '<script language="javascript">';
			echo 'alert("Failed")';
			echo '</script>';
		}

}


if (isset($_POST['update_contact'])) {
	$email=$_POST['email_input'];
	$contact=$_POST['new_contact'];
	$query="update user_info set phone_no='$contact' where email='$email'" ;
	$command= mysqli_query($connection,$query);
		if (mysqli_query($connection,$query)) {
			
			echo '<script language="javascript">';
			echo 'alert("Updated")';
			echo '</script>';
			$sql="select * from user_info where email='$email' AND phone_no='$contact'";
			$command= mysqli_query($connection,$sql);
			$row_number=mysqli_num_rows($command);

			
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
	<title>USER PROFILE</title>



	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Cafe In Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->
	
	<!-- css files -->
	<link rel="stylesheet" href="css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="css/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->

	<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
	
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Alegreya+Sans:100,100i,300,300i,400,400i,500,500i,700,700i,800,800i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!-- //web-fonts -->








	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

	<!--Google Font-->
	<link href="https://fonts.googleapis.com/css?family=Margarine" rel="stylesheet">   

	<link rel="stylesheet" type="text/css" href="css/personal_info.css">
</head>
<body>
	<!--Navbar-->

<!--	<?php //include 'navbar.php'; ?> -->

	<!--information Display-->
	<?php  
		if ($row_number>0) {
			while ($user =mysqli_fetch_array($command)) {
				
				
				?>
				<div class="col-lg-9">
					
						<h1 class="card-title"><?php echo $user['name'] ?></h1>
						<div class="card-body">
							
							<h2 class="item-price">Delivery Address: <?php echo $user['address'] ?></h2>
							<h2 class="item-price">Contact number: <?php echo $user['phone_no'] ?></h2>
							<h2 class="item-price">Gender: <?php echo $user['gender'] ?></h2>
							<h2 class="item-price">E-mail: <?php echo $user['email'] ?></h2>
							
							
						</div>			
				</div>
					<?php
			}
		}
			?>


			<!--Update password-->

	
		<div class="col-md-6">

			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Update Password</button>
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="container">
							<div class="row">

								<div class="col-lg-12">
									<div class="modal-header">
										<h4 class="modal-title">Update Password</h4>
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
												<label for="EmailInput">Email address</label>
												<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email
												" name="email_input">
												<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
											</div>


										</div>
									</div>



									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="NameInput">Old Pasword</label>
												<input type="text" class="form-control" id="old_password" name="old_password">

											</div>


										</div>

									</div>

									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="PhoneNoInput">New Password</label>
												<input type="text" class="form-control" id="new_password" name="new_password">

											</div>


										</div>
									</div>

									<center>
										<button type="submit" name="update_password" class="btn btn-primary">Submit</button>
									</center>
							</form>
						</div>

					</div>

				</div>
			</div>
			
			
		</div>
		
		<div class="col-md-6">
		
		<!-- update contact -->
			
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Update Contact Number</button>
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="container">
							<div class="row">

								<div class="col-lg-12">
									<div class="modal-header">
										<h4 class="modal-title">Update Contact Number</h4>
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
												<label for="EmailInput">Email address</label>
												<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email
												" name="email_input">
												<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="PhoneNoInput">New Contact Number</label>
												<input type="text" class="form-control" id="new_contact" name="new_contact">

											</div>


										</div>
									</div>

									<center>
										<button type="submit" name="update_contact" class="btn btn-primary">Submit</button>
									</center>
							</form>
						</div>

					</div>

				</div>
			</div>

		</div>





<!------------------ ALL JAVASCRIPTS INCLUDE -------------->


<!-- js-scripts -->		

	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
	<!-- //js -->	
	
	<!-- Banner Responsive slider -->
	<script src="js/responsiveslides.min.js"></script>
	<script>
		// You can also use "$(window).load(function() {"
		$(function () {
			// Slideshow 3
			$("#slider3").responsiveSlides({
				auto: true,
				pager: false,
				nav: true,
				speed: 500,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});

		});
	</script>
	<!-- // Banner Responsive slider -->
	
	<!-- stats -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
	<!-- //stats -->
	
	<!-- search-bar -->
	<script src="js/main.js"></script>
	<!-- //search-bar -->
	
	<!-- start-smoth-scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- start-smoth-scrolling -->

	<!-- jQuery-Photo-filter-lightbox-Gallery-plugin -->
	<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
	<script src="js/jquery.quicksand.js" type="text/javascript"></script>
	<script src="js/script.js" type="text/javascript"></script>
	<script src="js/jquery.prettyPhoto.js" type="text/javascript"></script>
	<!-- //jQuery-Photo-filter-lightbox-Gallery-plugin -->

<!-- //js-scripts -->

</body>

<?php include 'footer.php'; ?>


</html>