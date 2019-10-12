<?php 

include 'connection.php';
session_start();

$user_detail=$_SESSION['email'];
$sql="select * from user_info where email='$user_detail";
$command= mysqli_query($connection,$sql);
$row_number=mysqli_num_rows($command);




if (isset($_POST['confirm_order'])) {

	foreach ($_SESSION["cart"] as $key => $value) {
		$date = date('Y-m-d h:i:s');
		
		$product_name=$value[1];
	
		$product_price=$value[2];
	
		$id=$_SESSION['id'][0];
		$ammount=$value[3];
		
	
	$query="INSERT INTO order_history (product_name,Product_price,buy_time,user_id,ammount)
				VALUES ('$product_name',$product_price,'$date',$id,$ammount)"; 
	$command= mysqli_query($connection,$query);
			}
	unset($_SESSION["cart"]);
	header("Location: cart_view.php");
}




?>

<!DOCTYPE html>
<html>
<head>
	<title>ORDER PALCE</title>



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

	<link rel="stylesheet" type="text/css" href="css/cart.css">
</head>
<body>
	<!--Navbar-->
	<?php include 'navbar.php'; ?>


	<div class="container">
	<?php  
		if ($row_number>0) {
			while ($item =mysqli_fetch_array($command)) {
					$_SESSION['id']=$item['id'];
				
				?>
				<div class="col-lg-9">
					
						<h1 class="card-title"><?php echo $item['name'] ?></h1>
						<div class="card-body">

							<?php 
							if (isset($_POST['address_change_btn'])) {
								?>
								<h2 class="item-price">Delivery Address: <?php echo $_POST['address_input'] ?></h2>


								<?php 
							} else {
								?>
								<h2 class="item-price">Delivery Address: <?php echo $item['address'] ?></h2>
								<?php 
							}
							


							 ?>
							
							
							<h2 class="item-price">Contact number: <?php echo $item['phone_no'] ?></h2>
							
							
								<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#address_change">Change Address</button>
								<div class="modal fade" id="address_change" role="dialog">
									<div class="modal-dialog">

										<!-- Modal content-->
										<div class="modal-content">
											<div class="container">
												<div class="row">

													<div class="col-lg-12">
														<div class="modal-header">
															<h4 class="modal-title">New Address</h4>
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
																	<label for="AddressInput">Address</label>
																	<input type="text" class="form-control" id="address_input" name="address_input">

																</div>


															</div>

														</div>


											
														<button type="submit" name="address_change_btn" class="btn btn-primary">Submit</button>

													</div>


												</form>
											</div>

										</div>

									</div>
								</div>
							</div>

						
					
					
					
				</div>
					<?php
			}
		}
			?>

	


	<!--order item Showing-->
	
	<table class="table table-striped table-dark">
		<thead>
			<tr>
				<th scope="col">Name</th>
				<th scope="col">Price</th>
				<th scope="col">ammount</th>
				<th scope="col">total</th>

			</tr>
		</thead>
		<tbody>
			<tr>

				<?php 

				$total=0;

				foreach ($_SESSION["cart"] as $key => $value) {
					?>	
					<td><?php echo $value["1"]; ?></td>
					<td><?php echo $value["2"]; ?></td>
					<td><?php echo $value["3"]; ?></td>
					<td><?php echo $value["2"]*$value["3"]; ?></td>
					
					
					
				</tr>
				<?php 
				$total+=$value["2"]*$value["3"];
			}
			?>

			<tr>
				<td>total</td>
				<td><?php echo $total; ?></td>
			</tr>






		</tbody>
	</table>

	
	<form method="POST">
		<button type="submit" name="confirm_order" class="btn btn-primary btn-lg">Confirm</button>
	</form>


	




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