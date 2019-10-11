<?php 
include 'connection.php';
session_start();



if (isset($_POST['signup'])) {


		$name= $_POST['name'];
		$phone_no=$_POST['phone_no'];
		$address= $_POST['address'];
		$gender= $_POST['gender'];
		$email= $_POST['email'];
		$password= $_POST['password'];


		if ($gender==1) {
			$gender_i= " Male";
		}
		else{
			$gender_i= "Female";
		}
		$sql="insert into admin_info (name,phone_no,address,gender,email,password) VALUES('$name',$phone_no,'$address','$gender_i','$email','$password')";

		if (!mysqli_query($connection,$sql)) {
			echo "Something went wrong";
		}
		else
		{
			echo "Registration Successful ";
			$user_detail=array($email,$password);
			$_SESSION['user_details']=$user_detail;
			$_SESSION['login_status']=1;
			header('Location: admin.php');
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
    <title>Au Register Forms by Colorlib</title>

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
                    <h2 class="title">ADMIN Registration</h2>
                    <form method="POST">
                        
						<!-- name -->
						<div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Full NAME" name="name">
                        </div>
                        
						<!-- phone -->
						<div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Phone Number" name="phone_no">
                        </div>
						
						<!-- address -->
						<div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Address" name="address">
                        </div>
						
						
						<div class="row row-space">
                            
                            <div class="col-1">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" selected="selected">GENDER</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- email -->
						<div class="input-group">
                            <input class="input--style-1" type="text" placeholder="email address" name="email">
                        </div>
						
						<!-- password -->
						<div class="input-group">
                            <input class="input--style-1" type="text" placeholder="password" name="password">
                        </div>
						
						
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="signup">Sign Up</button>
                        </div>
                    </form>
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

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
