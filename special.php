<?php
session_start();

include 'connection.php';

if ($_SESSION['user_login_status']==1) {
include 'connection.php';

}
else{
	echo '<script language="javascript">';
			echo 'alert("Please Login")';
			echo '</script>';
			header('Location: special_login.php');
}

	
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Special Discount Food Items</title>
	
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

	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Alegreya+Sans:100,100i,300,300i,400,400i,500,500i,700,700i,800,800i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!-- //web-fonts -->
	
</head>

<body>

<?php include 'navigate.php'; ?>

<br>
<br>
<br>
<br>
<br>

<h3 class="heading text-center text-uppercase mb-5"> order now and get 50% off !  </h3>

		<div class="container">
		<?php 
		$query = "select * from item_information where hot_item=1 order by Id ASC" ;

	$command= mysqli_query($connection,$query);
	$row_number=mysqli_num_rows($command);
	?>
	<div class="row">
		<?php  
		if ($row_number>0) {
			while ($item =mysqli_fetch_array($command)) {
				
				
				?>

				<div class="col-lg-4 box">
					<form method="post" >
						<h2 class="card-title"><?php echo $item['Name'] ?></h2>
						<div class="card-body">
							<img src="images/<?php echo $item['Image']  ?>" class="img-thumbnail" alt="Cinque Terre">
							<h2 class="item-price">Price: <?php echo $item['Price'] ?></h2>
							
							<input type="hidden" name="hidden_Id" value="<?php echo $item["Id"]; ?>"/>
							<input type="hidden" name="hidden_name" value="<?php echo $item["Name"]; ?>"/>
							<input type="hidden" name="hidden_price" value="<?php echo $item["Price"]; ?>"/>
							 
							<input type="text" class="form-control" name="ammount" value="1" />
							<input type="submit" name="add_to_cart" class="btn btn-success" value="Add to Cart"/>
							
						</div>
						
					</form>
					
					
				</div>
				
				
				
				



				<?php
			}
			?>
		</div>
		<?php  

	}

	?>

	</div>
	<!--Adding in Cart-->
	<?php 
      
      if (isset($_POST["add_to_cart"])) {
      	
      			
      	if (isset($_SESSION["cart"])) {
      		$item_array_id = array_column($_SESSION["cart"], 0);
      		
      		

      		if (!in_array($_POST["hidden_Id"], $item_array_id)) {
      			
      			$count= count($_SESSION["cart"]);
      			
      			$item_array=array(

      			$id= $_POST["hidden_Id"],
      			$name=$_POST["hidden_name"],
                $price=$_POST["hidden_price"],
                $ammount=$_POST["ammount"]

      		);
      			$_SESSION["cart"][$count]=$item_array;
      			

      		} else {
      			echo '<script language="javascript">';
				echo 'alert("Already Added")';
				echo '</script>';
      			
      		}
	
      	} else {
      		$item_array=array(

      			$id= $_POST["hidden_Id"],
      			$name=$_POST["hidden_name"],
                $price=$_POST["hidden_price"],
                $ammount=$_POST["ammount"]

      		);
      		$_SESSION["cart"][0]=$item_array;
      	}

      }
	 ?>



		
<!-- js-scripts -->		

	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
	<!-- //js -->	
	
	<!-- for-Testimonials -->
	<!-- required-js-files-->
	<link href="css/owl.carousel.css" rel="stylesheet">
		<script src="js/owl.carousel.js"></script>
			<script>
		$(document).ready(function() {
		  $("#owl-demo").owlCarousel({
			items : 1,
			lazyLoad : true,
			autoPlay : true,
			navigation : false,
			navigationText :  false,
			pagination : true,
		  });
		});
		</script>
	<!--//required-js-files-->
	<!-- //for-Testimonials -->
	
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

<!-- //js-scripts -->

</body>

<?php include 'footer.php'; ?>

</html>