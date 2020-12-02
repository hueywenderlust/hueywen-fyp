<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 13/10/2018
 * Time: 8:07 PM
 */

session_start();
error_reporting(0);
include('inc-admin/config.php');
if(strlen($_SESSION['alogin'])==0)
{
    header('location:index.php');
}
else{ ?>




<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets-admin/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/assets/icons/sunway.ico"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Sun-U Experts</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="assets-admin/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="assets-admin/css/animate.min.css" rel="stylesheet"/>

        <!--  Paper Dashboard core CSS    -->
        <link href="assets-admin/css/paper-dashboard.css" rel="stylesheet"/>


        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="assets-admin/css/demo.css" rel="stylesheet" />


        <!--  Fonts and icons     -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
        <link href="assets-admin/css/themify-icons.css" rel="stylesheet">
        <!--<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    </head>
    <body>

    <div class="wrapper">
        <div class="sidebar" data-background-color="black" data-active-color="danger">

            <!--
                Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
                Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
            -->

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a class="simple-text">
                        admin panel
                    </a>
                </div>

                <ul class="nav">
                    <li class="active">
                        <a href="dashboard.php">
                            <i class="ti-panel"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="manage.php">
                            <i class="ti-user"></i>
                            <p>Manage User</p>
                        </a>
                    </li>
                    <li>
                        <a href="statistics.php">
                            <i class="ti-pie-chart"></i>
                            <p>Statistics</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar bar1"></span>
                            <span class="icon-bar bar2"></span>
                            <span class="icon-bar bar3"></span>
                        </button>
                        <a class="navbar-brand" href="#">Dashboard</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-user"></i>
                                    <p><?php echo htmlentities($_SESSION['alogin']);?></p>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="change-password.php">Edit Password</a></li>
                                    <li><a href="logout.php">Log Out</a></li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>


            <div class="content">
                <div class="container-fluid">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Education Details</h4>
                                    <p class="category">Highest Qualification Obtained</p>
                                </div>
                                <div class="content">
                                    <a href="manage-eduDetails.php">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="icon-big icon-primary text-center">
                                                    <h4>
                                                        <i class="fas fa-user-graduate"></i>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Research Areas</h4>
                                    <p class="category">Research Areas and sub-areas</p>
                                </div>
                                <div class="content">
                                    <a href="manage-research-areas.php">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="icon-big icon-primary text-center">
                                                    <h4>
                                                        <i class="fas fa-map-signs"></i>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Memberships</h4>
                                    <p class="category">Professional Bodies/Association Memberships</p>
                                </div>
                                <div class="content">
                                    <a href="manage-membership.php">

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="icon-big icon-primary text-center">
                                                    <!--<i class="fas fa-users"></i>-->
                                                    <h4><i class="fas fa-id-card-alt"></i></h4>
                                                </div>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Awards Details</h4>
                                    <p class="category">Award / Fellowship / Scholarship / Stewardship / Task Force </p>
                                </div>
                                <div class="content">
                                    <a href="manage-award.php">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="icon-big icon-primary text-center">
                                                    <h4>
                                                        <i class="fas fa-award"></i>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Trainings</h4>
                                    <p class="category">Short-term Professional Courses / Research Activities attended</p>
                                </div>
                                <div class="content">
                                    <a href="manage-training.php">

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="icon-big icon-primary text-center">
                                                    <h4>
                                                        <i class="fas fa-chalkboard-teacher"></i>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Research Activities</h4>
                                    <p class="category">Individual and Collaborative Research Activities under MoA</p>
                                </div>
                                <div class="content">
                                    <a href="manage-research-activities.php">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="icon-big icon-primary text-center">
                                                    <h4>
                                                        <i class="fas fa-microscope"></i>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Projects Details</h4>
                                    <p class="category">Knowledge Technology Diffusion (Social Innovation Projects)</p>
                                </div>
                                <div class="content">
                                    <a href="manage-project.php">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="icon-big icon-primary text-center">
                                                    <h4>
                                                        <i class="fas fa-project-diagram"></i>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Journals</h4>
                                    <p class="category">Journal articles that have been published</p>
                                </div>
                                <div class="content">
                                    <a href="manage-journal.php">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="icon-big icon-primary text-center">
                                                    <h4>
                                                        <i class="far fa-copy"></i>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Proceedings</h4>
                                    <p class="category">Conference papers in all proceedings published</p>
                                </div>
                                <div class="content">
                                    <a href="manage-proceedings.php">

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="icon-big icon-primary text-center">
                                                    <h4>
                                                        <i class="fas fa-archive"></i>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Books / Books ' Chapters</h4>
                                    <p class="category">Books / Books' Chapters that has been published</p>
                                </div>
                                <div class="content">
                                    <a href="manage-books-chaps.php">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="icon-big icon-primary text-center">
                                                    <h4>
                                                        <i class="fas fa-book"></i>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Other Publications</h4>
                                    <p class="category">Other Publications that has been published</p>
                                </div>
                                <div class="content">
                                    <a href="manage-other-publication.php">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="icon-big icon-primary text-center">
                                                    <h4>
                                                        <i class="fas fa-newspaper"></i>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Patents</h4>
                                    <p class="category">Patent(s) and Approved Patent(s)</p>
                                </div>
                                <div class="content">
                                    <a href="manage-patents.php">

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="icon-big icon-primary text-center">
                                                    <h4>
                                                        <i class="far fa-address-card"></i>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        </div>


                    </div>

<!--                    -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Other IPs</h4>
                                    <p class="category">Software / Multimedia Copyrights, Books (other than listed in Books/ Books' Chapters)</p>
                                </div>
                                <div class="content">
                                    <a href="manage-ip.php">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="icon-big icon-primary text-center">
                                                    <h4>
                                                        <i class="far fa-newspaper"></i>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Personal Details</h4>
                                    <p class="category">Staffs' Personal Details</p>
                                </div>
                                <div class="content">
                                    <a href="manage-personal.php">
                                    <br>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="icon-big icon-primary text-center">
                                                    <h4>
                                                        <i class="fas fa-user-circle"></i>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        </div>


                    </div>
                    </div>

                </div>
            </div>


            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="http://www.creative-tim.com/license">
                                    Licenses
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright pull-right">
                        &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
                    </div>
                </div>
            </footer>

        </div>
    </div>


    </body>

    <!--   Core JS Files   -->
    <script src="assets-admin/js/jquery.min.js" type="text/javascript"></script>
    <script src="assets-admin/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="assets-admin/js/bootstrap-checkbox-radio.js"></script>

    <!--  Charts Plugin -->
    <script src="assets-admin/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets-admin/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="assets-admin/js/paper-dashboard.js"></script>

    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets-admin/js/demo.js"></script>

</html>
<?php } ?>