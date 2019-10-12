<?php 
include 'connection.php';
session_start();

include 'minGate.php';

/*

if (isset($_POST['signin'])) {

		$email= $_POST['email'];
		$password= $_POST['password'];

        $user_detail=array($email,$password);
       // $_SESSION['user_details']=$user_detail;


		$sql="select * from user_info where email='$user_detail[0]' AND password='$user_detail[1]'";


        $command= mysqli_query($connection,$sql);
        $row_number=mysqli_num_rows($command);
		

        if ($row_number == 1 && $_SESSION['user_login_status'] !=1 ) {
        echo "Login Successful";
		$_SESSION['user_details']=$user_detail;
        $_SESSION['user_login_status']=1;
        header('Location: personal_info.php');
        } 
        else {
        echo '<script language="javascript">';
        echo 'alert("Wrong adminName & Password Combination")';
        echo '</script>';
        }

    }
*/


/*
if (isset($_POST['signin'])) {

    $username=$_POST['email'];
    $password=$_POST['password'];


    $query = "SELECT * FROM user_info  WHERE email='$username' AND password='$password'";
    $results = mysqli_query($connection, $query);

    $row = mysqli_num_rows($results);

    if ($row == 1) {
            $_SESSION['email'] = $username;
            //$_SESSION['user_login_status']=1;
            header('location: personal_info.php');
    }else {
            echo '<script language="javascript">';
            echo 'alert("Wrong adminName & Password Combination")';
            echo '</script>';
            header('location: user_signin.php');
    }

}

*/

if (isset($_POST['signin'])) {

    $username=$_POST['email'];
    $password=$_POST['password'];


    $query = "SELECT * FROM user_info  WHERE email='$username' AND password='$password'";
    $results = mysqli_query($connection, $query);


    if (mysqli_num_rows($results) == 1) {
            $_SESSION['email'] = $username;
            $_SESSION['user_login_status']=1;
            header('location: personal_info.php');
    }else {
            echo '<script language="javascript">';
            echo 'alert("Wrong adminName & Password Combination")';
            echo '</script>';
    }

}




?>


<!DOCTYPE html>
<html lang="en">

<head>


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



    <!-- Title Page-->
    <title>SIGN IN</title>



    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/admin_signup.css" rel="stylesheet" media="all">
</head>

<body>



    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">USER SIGN IN</h2>
                    <form method="POST">
                        
                        <!-- email -->
						<div class="input-group">
                            <input class="input--style-1" type="text" placeholder="email address" name="email">
                        </div>
						
						<!-- password -->
						<div class="input-group">
                            <input class="input--style-1" type="text" placeholder="password" name="password">
                        </div>
						
						
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="signin">Sign In</button>
                        </div>
                    </form>

                <div class="col-lg-6 col-sm-2">
                    <br><br><br>
                    <form action="user_signup.php">
                    <input type="submit" class="btn btn--radius btn--green" value="Signup" />
                    </form> 

                </div>
            </div>


            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>




</body>


</html>