<?php
include 'connection.php';
?>

<?php 

if($_SESSION['login_id']){
  
}
else{
  header("location:login.php");
}

 ?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <a href="adminhome.php">Home</a>
    <a href="admin_manage_batch.php">Manage Batch</a>
    <a href="admin_manage_subject.php">Manage Subject</a>
    <a href="admin_manage_tutor.php">Manage Tutor</a>
    <a href="admintutorattendance.php">Mark Attendance</a>
    <a href="admin_schedule_class.php">Schedule Class</a>
    <a href="admin_view_parents.php">View Parents</a>
    <a href="admin_view_students.php">View Students</a>
    <a href="adminviewpayments.php">View Payments</a>
 -->



    <html>
<head>
	<title></title>
</head>
<body>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>T-Center</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="header-content h-100 d-flex align-items-center justify-content-between">
                            <div class="academy-logo">
                                <a href="adminhome.php"><img src="img/core-img/favicon.ico" alt=""> &nbsp; <b style="font-size :22px;">T-Center</b></a>
                            </div>
                            <div class="login-content">
                                <a href="logout.php"> LOGOUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="academy-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="academyNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="adminhome.php">Home</a></li>
                                    <li><a href="#">Manage</a>
                                        <ul class="dropdown">
                                            <li><a href="admin_manage_batch.php"> Batch</a></li>
                                            <li><a href="admin_manage_subject.php"> Subject</a></li>
                                            <li><a href="admin_manage_tutor.php"> Tutor</a></li>
                                            <li><a href="admintutorattendance.php">Attendance</a></li>
                                            <li><a href="admin_schedule_class.php">Schedule Class</a></li>
                                            
                                        </ul>
                                    </li>
                                    <li><a href="#">View</a>
                                        <ul class="dropdown">
                                          <li><a href="admin_view_parents.php"> Parents</a></li>
                                            <li><a href="admin_view_students.php"> Students</a></li>
                                            <li><a href="adminviewpayments.php"> Payments</a></li>
                                
                                        </ul>
                                    </li>
                                
                                 
                                 
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Calling Info -->
                        <div class="calling-info">
                            <div class="call-center">
                                <a href="tel:+654563325568889"><i class="icon-telephone-2"></i> <span>(+65) 456 332 5568 889</span></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
