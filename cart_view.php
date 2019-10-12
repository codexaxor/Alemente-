<?php 
error_reporting(0);
include 'connection.php';
session_start();

if (isset($_POST['place_order'])) {
	if ($_SESSION["user_login_status"]==1) {
		header('Location: order.php');
	}
	else{
		echo '<script language="javascript">';
		echo 'alert("Please Login")';
		echo '</script>';
	}
}

if (isset($_POST['remove'])) {
		$item_id = $_POST["hidden_id"];

	if (!empty($_SESSION["cart"])) {
		foreach ($_SESSION["cart"] as $select => $val) {
			if($val[0] == $item_id)
			{
				unset($_SESSION["cart"][$select]);
				header('Locarion:cart_view.php');
			}
		}
	}
}





?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>



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

	<link href="https://fonts.googleapis.com/css?family=Margarine" rel="stylesheet">

	<!--Google Font-->
	<link href="https://fonts.googleapis.com/css?family=Margarine" rel="stylesheet">   

	

	<link rel="stylesheet" type="text/css" href="css/cart.css">
</head>
<body>
	<!--Navbar-->
	

	<?php include 'navigate.php'; ?>
	<br><br><br><br><br>

	<!--Cart item Showing-->
	<div class="row cart_show">
		<div class="table-show col-lg-9 ">
			<table class="table table-striped  ">
		<thead>
			<tr>
				<th scope="col">Image</th>
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
					$query ="select Image from item_information  where Id='$value[0]'" ;
					$command= mysqli_query($connection,$query);
					$row_number=mysqli_num_rows($command);
					if ($row_number>0) {
					while ($item =mysqli_fetch_array($command)) {
					?>
					<td><img src="images/<?php echo $item['Image']  ?>" class="img-fluid img-thumbnail product_image"></td>	
					<?php 
						}
					}
					 ?>
					<td><?php echo $value["1"]; ?></td>
					<td><?php echo $value["2"]; ?></td>
					<td><?php echo $value["3"]; ?></td>
					<td><?php echo $value["2"]*$value["3"]; ?></td>
					<td><form method="post">
						<input type="hidden" name="hidden_id" value="<?php echo $value["0"]; ?>"/>
						<button type="submit" name="remove" class="btn btn-primary btn-sm">Remove</button>
					</form></td>
					
					
				</tr>
				<?php 
				$total+=$value["2"]*$value["3"];
			}
			?>

		</tbody>
	</table>

		</div>

		<div class="total-price col-lg-3">
			<tr class="total_price_display">
				<td> <b>total</b></td>
				<td><?php echo $total; ?></td>
			</tr>
		<form method="POST">
		<button type="submit" name="place_order" class="btn btn-primary btn-lg place_order">Place Order</button>
		</form>
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