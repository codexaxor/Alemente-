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


<!-- Navigation -->
<header>
  <div class="top-nav">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand text-uppercase" href="index.html">ALIMENTE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center pr-md-4" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link active" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services.html">Services</a>
            </li>
            <li class="dropdown nav-item">
              <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Pages
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu agile_short_dropdown">
                <li>
                  <a href="error.html">Error Page</a>
                </li>
                <li>
                  <a href="typography.html">Typography</a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="gallery.html">Food Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
            
            <!-- search --->
            <div class="search-bar-agileits">
              <div class="cd-main-header">
                <ul class="cd-header-buttons">
                  <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
                </ul>
                <!-- cd-header-buttons -->
              </div>
              <div id="cd-search" class="cd-search">
                <form action="#" method="post">
                  <input name="Search" type="search" placeholder="Click enter after typing...">
                </form>
              </div>
            </div>
            <!-- search --->
        
          </ul>
          
        </div>

      </nav>
    </div>
  </div>
</header>
<!-- //Navigation -->



<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <a class="navbar-brand" href="#">ALIMENTE</a>
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
          <a class="dropdown-item" href="personal_info.php">Profile</a>
          <a class="dropdown-item" href="orderdetail.php">Orders</a>
      <a class="dropdown-item" href="contact_us.php">Contact Us</a>
      <a class="dropdown-item" href="contact_us.php">About Us</a>
        </div>
      </li>


    </ul>
    <form class="form-inline my-2 my-lg-0" id="search">
      <input class="form-control mr-lg-4" type="search" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>



    </form>
    
    <form class="form-inline my-2 my-lg-0"  method="POST">
      <input class="form-control mr-sm-2" type="User Name" name="email_input" placeholder="User Name">
      <input class="form-control mr-sm-2" type="password" name="password_input" placeholder="Password">
      <button class="btn btn-outline-success my-2 my-sm-0" name="Login" type="submit">Login</button>


    </form>

    <a class="navbar-brand" href="cart_view.php">
           <img src="images/cart.png" class="cart_image" width="30" height="30" >
        </a>



  </div>
</nav>


      <!-- sliding image -->


  <div class="slider">
    <figure>

      <div class="slide s1">
        <p class="p_slide">Groceries delivered in 1 hour</p>


      </div>
      <div class="slide s2">
        <img src="images/slider1.jpg" class="img-fluid" alt="Responsive image">


      </div>
      <div class="slide s3">
        <img src="images/slider3.jpg" class="img-fluid" alt="Responsive image">


      </div>
      <div class="slide s4">
        <img src="images/slider4.png" class="img-fluid" alt="Responsive image">


      </div>

    </figure>


  
</div>

<div class="container menu_div">
  <div class="row">

    <div class="col-lg-3 border col_one">

      <a href="Vegetables.php">
        <div class="row">

          <div class="col-lg-6 col-sm-6 resize">
            <img src="images/v1.jpg" class="img-responsive">


          </div>
          <div class="col-lg-6 col-sm-6 resize">
            <p>Vegetables</p>
            <p>Buy Now</p>

          </div>

        </div>


      </a>



    </div>
    <div class="col-lg-3 border col_two">
      <a href="Fruits.php">
        <div class="row">

          <div class="col-lg-6 col-sm-6 resize">
            <img src="images/fruits.png" class="img-responsive">


          </div>
          <div class="col-lg-6 col-sm-6 resize">
            <p>Fruits</p>
            <p>Buy Now</p>

          </div>

        </div>


      </a>

    </div>
    <div class="col-lg-3 border col_three">
      <a href="Groceries.php">
        <div class="row">

          <div class="col-lg-6 col-sm-6 resize ">
            <img src="images/groceries.png" class="img-responsive">


          </div>
          <div class="col-lg-6 col-sm-6 resize">
            <p>Groceries</p>
            <p>Buy Now</p>

          </div>

        </div>


      </a>

    </div>

  </div>
  <div class="row">
    <div class="col-lg-3 border col_four">
      <a href="Household.php">
        <div class="row">

          <div class="col-lg-6 col-sm-6 resize">
            <img src="images/household.png" class="img-responsive">


          </div>
          <div class="col-lg-6 col-sm-6 resize">
            <p>Household</p>
            <p>Buy Now</p>

          </div>

        </div>


      </a>

    </div>
    <div class="col-lg-3 border col_five">
      <a href="Baby_care.php">
        <div class="row">

          <div class="col-lg-6 col-sm-6 resize">
            <img src="images/baby_care.png" class="img-responsive">


          </div>
          <div class="col-lg-6 col-sm-6 resize">
            <p>Baby Care</p>
            <p>Buy Now</p>

          </div>

        </div>


      </a>

    </div>
    <div class="col-lg-3 border col_six">
      <a href="other.php">
        <div class="row">

          <div class="col-lg-6 col-sm-6 resize">
            <img src="images/other.png" class="img-responsive">


          </div>
          <div class="col-lg-6 col-sm-6 resize">
            <p>Other</p>
            <p>Buy Now</p>

          </div>

        </div>


      </a>

    </div>

  </div>
</div>

<div class="container join_now">
  <div class="row join_now_row">
    <div class="col-lg-6 ">

      <p class="join_now_p">
        Need an Account?
      </p>
    </div>
    <div class="col-lg-6">

      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Sign Up</button>
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="container">
              <div class="row">

                <div class="col-lg-12">
                  <div class="modal-header">
                    <h4 class="modal-title">Sign Up</h4>
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
                        <label for="NameInput">Full Name</label>
                        <input type="text" class="form-control" id="name_input" name="name_input">

                      </div>


                    </div>

                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label for="PhoneNoInput">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_input">

                      </div>


                    </div>

                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label for="AddressInput">Address</label>
                        <input type="text" class="form-control" id="address_input" name="address_input">

                      </div>


                    </div>

                  </div>


                  <div class="row">
                    <div class="col-lg-12">
                      <label for="GenderInput">Gender</label>
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
                        <label for="PasswordInput">Password</label>
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

    </div>

  </div>



</div>



</div>
<center> 
<h1 class="fire"> <i class="fas fa-fire"></i> HOT DEALS <i class="fas fa-fire"></i></h1>


</center>


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
            <h6 class="card-title"><?php echo $item['Name'] ?></h6>
            <div class="card-body">
              <img src="images/<?php echo $item['Image']  ?>" class="img-fluid image rounded-circle">
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



</body>

<div class="footer-body">

    <div class="footer-start">
    
      <div class="row">

        <div class="col-lg-4">
          <p><b>ALIMENTE</b></p>
          <p>&copy;2019</p>
          
        </div>

        <div class="col-lg-4">
          <p><strong><b>Visit</b></strong></p>
          <p>141 & 142, Love Road, Tejgaon Industrial Area, Dhaka-1208</p>
          
        </div>

        <div class="col-lg-4">
          <p><strong><b>Legal</b></strong></p>
          <p>Terms</p>
          <p>Privacy</p>
          
        </div>
        

      </div>
      
      <div class="row">
        <div class="col-lg-4">
          <B>Follow us : </B>
        
    <!--    <div class="col-lg-6 icon">  -->
    
    
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
      
        </div>
        
      </div>

      <div class="copy_right">
        <p id="copy_right_p">&copy;2019 16.02.04.099 & 16.02.04.110,All Rights Reserved</p>
      </div>
      
    </div>
    
</div>



</html>