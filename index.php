<?php 
include 'connection.php';
session_start();


if (isset($_POST['Login'])) {

$email= $_POST['email_input'];
$password= $_POST['password_input'];

$user_detail=array($email,$password);
$_SESSION['user_details']=$user_detail;


$sql="select * from user_info where email='$user_detail[0]' AND password='$user_detail[1]'";
$command= mysqli_query($connection,$sql);
$row_number=mysqli_num_rows($command);


if ($row_number==1 && $_SESSION['login_status']!=1 ) {
	echo "Login Successful";
	$_SESSION['login_status']=1;
	header('Location: personal_info.php');


} else {
	echo '<script language="javascript">';
	echo 'alert("Wrong UserName & Password Combination")';
	echo '</script>';
}

}


if (isset($_POST['submit'])) {
	
	$_SESSION['name']= $_POST['name_input'];
	$_SESSION['phone_no']= $_POST['phone_input'];
	$_SESSION['address']= $_POST['address_input'];
	$_SESSION['gender']= $_POST['gender_input'];
	$_SESSION['email']= $_POST['email_input'];
	$_SESSION['password']= md5($_POST['password_input']);

	header('Location: info_display.php');

	}



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



<!DOCTYPE html>
<html lang="en">
<head>
<title>Cafe In Restaurant Category Flat Bootstrap Responsive Website Template | Home :: W3layouts</title>
  
  <!-- Meta tag Keywords -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="keywords" content="Cafe In Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />



    <!-- hide URLS in mobile DEVICES -->


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

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="css/index.css">





</head>



<!-- BODY TAG STARTED -->

<body>


<?php include 'navigate.php'; ?>

      <!-- sliding image -->


  <div class="slider  col-md-12 d-none d-sm-block">
  	<br><br><br><br><br>
    <figure>

      <div class="slide s1">
        <p class="p_slide">FIRST TIME IN BANGLADESH</p>
	  </div>
	  <div class="slide s2">
        <p class="p_slide">NEW HOT PRODUCTS</p>
	  </div>

	  <div class="slide s3">
        <p class="p_slide">DELIVERY ACCROSS THE COUNTERY</p>
	  </div>

	  <div class="slide s4">
        <p class="p_slide">JOIN TODAY FOR EXCLUSIVE EXPERIMENTS</p>
	  </div>

    </figure>


  
</div>



<section class="about py-5">
		<br><br>

	<div class="container">
		<h3 class="heading text-center text-uppercase mb-5"> Let us Introduce ourselves </h3>
		<p class="aboutpara text-center"> As the bustling capital of Bangladesh, it's no wonder that Dhaka's culinary scene is something special. This cultural hub offers plenty in the way of delicious dishes, from authentic Bangladesh recipes perfected over generations, to fabulous fusion dishes that bring together the best flavours and ingredients from across southern Asia and beyond. With foodpanda, you've easy access to this diverse dining scene, with straightforward online ordering and express delivery so you can enjoy eating in style without breaking a sweat. Whether it's a brilliant brunch or last-minute lunch, mouth-watering dinner or late-night feast, you've plenty to pick from in Dhaka.</p>
		
		<div class="row about_grids mt-5">
			<div class="col-md-4">
				<img src="images/about1.jpg" alt="" class="img-fluid" />
				<h3 class="mt-3 my-2 text-capitalize">Aliquam iaculis erat porta </h3>
				<p class="mb-2">Nam ut nulla a ligula dictum imperdiet nec</p>
			
			</div>
			<div class="col-md-4 mt-md-0 mt-4">
				<img src="images/about2.jpg" alt="" class="img-fluid" />
				<h3 class="mt-3 my-2 text-capitalize">Aliquam iaculis erat porta </h3>
				<p class="mb-2">Nam ut nulla a ligula dictum imperdiet nec</p>
			
			</div>
			<div class="col-md-4 mt-md-0 mt-4">
				<img src="images/about3.jpg" alt="" class="img-fluid" />
				<h3 class="mt-3 my-2 text-capitalize">Aliquam iaculis erat porta </h3>
				<p class="mb-2">Nam ut nulla a ligula dictum imperdiet nec</p>
	
			</div>
		</div>
		
	</div>
</section>



<!-- /stats -->
<section class="stats_test pb-5 container-fluid">
	<div class="row inner_stat_wthree_agileits">
		<div class="col-sm-3 col-6 py-5 stats_left counter_grid">
			<i class="far fa-building"></i>
			<p class="counter">100</p>
			<h4>Branches</h4>
		</div>
		<div class="col-sm-3 col-6 py-5 stats_left counter_grid1">
			<i class="fas fa-users"></i>
			<p class="counter">15</p>
			<h4>Qualified Chefs</h4>
		</div>
		<div class="col-sm-3 col-6 py-5 stats_left counter_grid2">
			<i class="far fa-edit"></i>
			<p class="counter">793</p>
			<h4>Food Items</h4>
		</div>
		<div class="col-sm-3 col-6 py-5 stats_left counter_grid3">
			<i class="far fa-smile"></i>
			<p class="counter">4045</p>
			<h4>Happy Customers</h4>
		</div>
	</div>
</section>
<!-- //stats -->



        </div>
      </div>

    </div>

  </div>



</div>



</div>












<!-- Vertically centered Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-uppercase" id="exampleModalLongTitle">Cafe In</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<img src="images/4.jpg" class="img-fluid mb-3" alt="cafe Image" />
        Vivamus eget est in odio tempor interdum. Mauris maximus fermentum arcu, ac finibus ante. Sed mattis risus at ipsum elementum, ut auctor turpis cursus. Sed sed odio pharetra, aliquet velit cursus, vehicula enim. Mauris porta aliquet magna, eget laoreet ligula.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- //Vertically centered Modal -->








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
