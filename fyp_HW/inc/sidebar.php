<?php

/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 12/10/2018
 * Time: 4:29 PM
 */

$image = "assets/assets-bootstrap4/img/user.jpg";

if(session_id() == '') {
    session_start();
    
}

if(isset($_SESSION['profile_image'])){
    
    if(strcasecmp($_SESSION['profile_image'],"")==0 || strcasecmp($_SESSION['profile_image'],"none")==0){
        
        $image = "assets/assets-bootstrap4/img/user.jpg";
    }
    
    else{
        
        $image = $_SESSION['profile_image'];
    }
}

else{
    
    $image = "assets/assets-bootstrap4/img/user.jpg";
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Sun-U experts</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
          crossorigin="anonymous">
    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="assets/assets-bootstrap4/css/custom.css">
    <link rel="stylesheet" href="assets/assets-bootstrap4/css/custom-themes.css">
    <link rel="icon" type="image/png" href="assets/assets-login/images/icons/sunway.ico"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

<body>
<div class="page-wrapper chiller-theme sidebar-bg bg1 toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <a href="#">= Sun-U Experts =</a>
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="sidebar-header">
                <a href="personal.php">
                <div class="user-pic">
                    <img class="img-responsive img-rounded" src="<?php echo $image;?>" alt="User picture">
                </div>
                <div class="user-info">
                    <span class="user-name"> <?php echo $_SESSION['fName']?><strong> <?php echo $_SESSION['lName']; ?></strong></span>
                    <span class="user-role">User</span>
                </div>
                </a>

            </div>
            <!-- sidebar-header  -->

            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu">
                        <span>General</span>
                    </li>
                    <li class="sidebar">
                        <a href="dashboard.php">
                            <i class="fa fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="far fa-user"></i>
                            <span>Personal</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="personal.php">Personal Details</a>
                                </li>
                                <li>
                                    <a href="eduDetails.php">Education Details</a>
                                </li>
                                <li>
                                    <a href="membership.php">Professional Membership</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fab fa-researchgate"></i>
                            <span>Research</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="researchArea.php">Research Areas</a>
                                </li>
                                <li>
                                    <a href="researchActivities.php">Research Activities</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fas fa-book"></i>
                            <span>Publications</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="journals.php">Journals</a>
                                </li>
                                <li>
                                    <a href="proceedings.php">Proceedings</a>
                                </li>
                                <li>
                                    <a href="books-chaps.php">Books / Chapters</a>
                                </li>
                                <li>
                                    <a href="patents.php">Patents</a>
                                </li>
                                <li>
                                    <a href="ips.php">Other IPs</a>
                                </li>
                                <li>
                                    <a href="others-publications.php">Others Publications</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar">
                        <a href="projects.php">
                            <i class="fas fa-project-diagram"></i>
                            <span>Projects</span>
                        </a>
                    </li>
                    <li class="sidebar">
                        <a href="awards.php">
                            <i class="fas fa-trophy"></i>
                            <span>Awards</span>
                        </a>
                    </li>
                    <li class="sidebar">
                        <a href="training.php">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <span>Trainings</span>
                        </a>
                    </li>
                    <li class="header-menu">
                        <span>Extra</span>
                    </li>
                    <li>
                        <a href="workingXp.php">
                            <i class="fas fa-briefcase"></i>
                            <span>Working History</span>
                        </a>
                    </li>
                    <li>
                        <a href="ExportPDF/resume.php">
                            <i class="far fa-address-card"></i>
                            <span>Resume</span>
                        </a>
                    </li>
                    <li>
                        <a href="ExportPDF/exportPDF.php">
                            <i class="fas fa-file-export"></i>
                            <span>MYRA CV</span>
                        </a>
                    </li>
                    <li>
                        <a href="change_password.php">
                            <i class="fa fa-cog"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Log Out</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
<!--        <div class="sidebar-footer">-->
<!--            <div>-->
<!--                <a href="logout.php">-->
<!--                    <i class="fa fa-power-off"></i>-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
    </nav>
    <!-- sidebar-wrapper  -->
    <main class="page-content">
        <div class="container-fluid">

            <!--        </div>-->
            <!--    </main>-->
            <!-- page-content" -->
        </div>
        <!-- page-wrapper -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>
        <script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="assets/assets-bootstrap4/js/custom.js"></script>
</body>

</html>
