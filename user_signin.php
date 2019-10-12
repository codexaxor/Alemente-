<?php 
include 'connection.php';
session_start();



if (isset($_POST['signin'])) {

		$email= $_POST['email'];
		$password= $_POST['password'];

        $user_detail=array($email,$password);
        $_SESSION['user_details']=$user_detail;


		$sql="select * from user_info where email='$user_detail[0]' AND password='$user_detail[1]'";


        $command= mysqli_query($connection,$sql);
        $row_number=mysqli_num_rows($command);
		

        if ($row_number > 0 && $_SESSION['user_login_status']!=1 ) {
        echo "Login Successful";
        $_SESSION['user_login_status']=1;
        header('Location: personal_info.php');
        } 
        else {
        echo '<script language="javascript">';
        echo 'alert("Wrong adminName & Password Combination")';
        echo '</script>';
        }

    }    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

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
                    <h2 class="title">WELL COME</h2>
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

                </div>

                                    <form action="user_signup.php">
    <input type="submit" value="Signup" />
    </form> 

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

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
