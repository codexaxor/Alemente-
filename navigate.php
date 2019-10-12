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

            <!--

            <li class="nav-item">
              <a class="nav-link" href="Baby_care.php">ABOUT US</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="gallery.html">CONTACT</a>
            </li>

        -->

            <li class="nav-item">
              <a class="nav-link" href="user_signin.php">SIGN IN / SIGN UP</a>
            </li>
           


            <!-- search -->
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

</body>
</html>