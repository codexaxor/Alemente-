<?php 
include 'connection.php';
	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>


<body>


<!-- Navigation -->
<header>
  <div class="top-nav">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand text-uppercase" href="index.php">ALIMENTE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center pr-md-4" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            

            <!-- DROP DOWNS MENU -->
            <li class="dropdown nav-item">
              <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">FOODS
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu agile_short_dropdown">
                <li>
                  <a href="bengali.php">BENGLAI</a>
                </li>
                <li>
                  <a href="chinese.php">CHINESE</a>
                </li>
                <li>
                  <a href="mexican.php">MEXICAN</a>
                </li>
                <li>
                  <a href="indian.php">INDIAN</a>
                </li>
                <li>
                  <a href="thai.php">THAI</a>
                </li>
                <li>
                  <a href="drinks.php">DRINKS</a>
                </li>
              </ul>
            </li>

                        <!-- user list -->
            <li class="dropdown nav-item">
              <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Pages
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu agile_short_dropdown">
                <li>
                  <a href="personal_info.php">my Profile</a>
                </li>
                <li>
                  <a href="special.php">Special Dishes</a>
                </li>
                <li>
                  <a href="cart_view.php">my Cart</a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="user_signin.php">SIGN IN / SIGN UP</a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="logout.php">LOGOUT</a>
            </li>

        
          </ul>
          
        </div>

      </nav>
    </div>
  </div>
</header>

</body>
</html>