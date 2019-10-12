<?php 
include 'connection.php';
session_start();

if (isset($_POST['submit_contact'])) {
				$name=$_POST['name_input'];
				$image=$_POST['phone_input'];
				$price=$_POST['email_input'];
				$Catagory=$_POST['text_suggestion'];

				$query="INSERT INTO feedback (name,phone,email,text)
				VALUES ('$name','$image','$price','$Catagory')"; 
				$command= mysqli_query($connection,$query);
				if ($command) {
					echo "ADDED";
					header('Location:contact.php');
				}
				else{
					echo "failed";
				}
			}

?>


<!DOCTYPE html>
<html>
<head>

	<title>Contact Page</title>

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
	
	




<!-- contact -->
<section class="contact py-5">
	<h1 class="heading text-center text-uppercase mb-5"> Get In Touch </h1>
	<div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.538701733344!2d90.40469681536284!3d23.763823994179475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c77decb5f845%3A0xc2eadd2f3b867792!2sAhsanullah%20University%20of%20Science%20and%20Technology!5e0!3m2!1sen!2sbd!4v1570871701108!5m2!1sen!2sbd" width="600"></iframe>
		<div class="main_grid_contact">
			<div class="form">
				<h2 class="text-capitalize mb-2">send us a message</h2>
				<form action="#" method="post">
					<div class="input-group">
						<input type="text" class="margin2" name="name_input" placeholder="first name" required="">
						
					</div>
					<div class="input-group">
						<input type="text" name="phone_input" placeholder="phone number"  required="">
					</div>
					<div class="input-group">
						<input type="email" class="margin2" name="email_input" placeholder="mail@example.com"  required="">
					</div>
					<div class="input-group">
						<textarea rows="4" cols="50" name="text_suggestion"  placeholder="message"></textarea>
					</div>
					<div class="input-group1">
						<input type="submit" name="submit_contact" value="send">
					</div>
				</form>
			</div>
			<div class="w3ls-contact">
				<h3 class="text-capitalize mb-3">contact Information</h3>
				<p class="">Maecenas ac euismod eros. Aliquam a suscipit nibh. Aliquam iaculis erat porta mauris fermentum lacinia.</p>
				<address>
					<p class="my-3"><span class="fas fa-map-marker-alt"></span> 141 & 142, Love Road,<span>  Dhaka 1208, Bangladesh.</span> </p>
					<p class="my-3"><span class="fas fa-mobile-alt"></span> +88 0 11 236598</p>
					<p class="my-3"><span class="fas fa-envelope-open"></span> <a href="mailto:mail@alimente.com">mail@alimente.com</a> </p>
				</address>

			</div>
		</div>
	</div>
</section>
<!-- //contact -->












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



