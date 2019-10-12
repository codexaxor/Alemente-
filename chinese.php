<?php 
  include 'connection.php';
  session_start();

?>
 
<!DOCTYPE html>
<html>
<head>

	<title>bangla foods</title>

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

	<link rel="stylesheet" type="text/css" href="css/Vegetables.css">
</head>




<body>

	<!--Navbar-->
	<?php include 'navigate.php'; ?>

	
	<br><br><br><br><br>
	
	
	<!--Sort&Search-->
	<div class="sort_search">
		<div class="container">
			<form method="POST">
				<div class="row">
			<div class="col-lg-8">
				<div class="col-lg-6">
					<select class="custom-select" name="SORT_BY">
					<option value="0">SORT BY</option>
					<option value="1">Price LOW to High</option>
					<option value="2">Price HIGH TO LOW</option>

				</select>
				</div>
				
				
			</div>
			<div class="col-lg-1">
				<button type="submit" class="btn btn-primary">Sort</button>
				
			</div>
		</div>
			</form>
			
		</div>
		
	</div>

	<!--item start-->
	<?php 
	
	$sort=0;
	
	if (isset($_POST['SORT_BY'])) {
		$sort=$_POST['SORT_BY'];
	}
	
	
	if ($sort==1) {
		$query = "select * from item_information  where Catagory=2 order by Price ASC" ;
	} else if ($sort==2) {
		$query = "select * from item_information where Catagory=2 order by Price DESC" ;
	} else if($sort==0) {
		$query = "select * from item_information where Catagory=2 order by Id ASC" ;
	}

	$command= mysqli_query($connection,$query);
	$row_number=mysqli_num_rows($command);
	?>
	<div class="row">
		<?php  
		if ($row_number>0) {
			while ($item =mysqli_fetch_array($command)) {
				
				
				?>

				<div class="col-lg-3 box">
					<form method="post" >
						<h6 class="card-title"><?php echo $item['Name'] ?></h6>
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