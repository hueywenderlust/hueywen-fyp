<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 14/10/2018
 * Time: 6:41 PM
 */

    session_start();

    include('inc-admin/config.php');

    error_reporting(0);

    if(isset($_POST['signup'])) {
    //code for captcha verification
        if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
            echo "<script>alert('Incorrect verification code');</script>" ;
        } else {
            $FullName= $_POST['FullName'];
            $AdminEmail=$_POST['AdminEmail'];
            $UserName= $_POST['UserName'];
            $password=md5($_POST['UserName']);
            $status=1;
            $sql="INSERT INTO  admin(FullName,AdminEmail,UserName,Password,status,user_type) 
                  VALUES(:FullName,:AdminEmail,:UserName,:password,:status,'admin')";
            $query = $dbh->prepare($sql);
            $query->bindParam(':FullName',$FullName,PDO::PARAM_STR);
            $query->bindParam(':AdminEmail',$AdminEmail,PDO::PARAM_STR);
            $query->bindParam(':UserName',$UserName,PDO::PARAM_STR);
            $query->bindParam(':password',$password,PDO::PARAM_STR);
            $query->bindParam(':status',$status,PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();

            if($lastInsertId) {
                echo '<script>alert("Registration admin successfully")</script>';
            } else {
                echo "<script>alert('Something went wrong. Please try again');</script>";
            }
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets-admin/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/assets/icons/sunway.ico"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title></title>

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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


    <script>
        function checkAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
        url: "check_admin_availability.php",
        data:'AdminEmail='+$("#AdminEmail").val(),
        type: "POST",
        success:function(data){
        $("#user-availability-status").html(data);
        $("#loaderIcon").hide();
        },
        error:function (){}
        });
        }
    </script>


    <script>
        function checkAvailabilituname() {
        $("#loaderIcon").show();
        jQuery.ajax({
        url: "check_adminuname_availability.php",
        data:'UserName='+$("#UserName").val(),
        type: "POST",
        success:function(data){
        $("#username-availability-status").html(data);
        $("#loaderIcon").hide();
        },
        error:function (){}
        });
        }
    </script>


    <script>
        function display(){

            if($("#alert").is(":visible")){

                $("#alert").hide();

            } else {

                $("#alert").show();
            }

        }
    </script>
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
                <a href="#" class="simple-text">
                    admin panel
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.php">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
               <li class="active">
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
                    <a class="navbar-brand" href="#">Manage User</a>
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

        <!--              -->

        <div class="content">
            <div class="container-fluid">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <a class="btn btn-primary" href="../admin/manage.php" role="button">Back</a>
                    </div>
                    <br><br>

                    <div class="container-fluid">
                        <div class="row pad-botm">
                            <div class="col-md-12">
                                <h4 class="header-line">Create New Admin</h4>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="card">
                                    <div class="content">

                                        <form name="signup" method="post" onSubmit="return valid();">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Enter Admin Name</label>
                                                        <input class="form-control border-input" type="text" name="FullName" autocomplete="off" required />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Enter Email</label>
                                                        <input class="form-control border-input" type="email" name="AdminEmail" id="AdminEmail" onBlur="checkAvailability()"  autocomplete="off" required  />
                                                        <span id="user-availability-status" style="font-size:12px;"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Enter Username</label>
                                                        <input class="form-control border-input" type="text" name="UserName" id="UserName" onBlur="checkAvailabilituname()"  autocomplete="off" required  />
                                                        <span id="username-availability-status" style="font-size:12px;"></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Verification code : </label>
                                                        <input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />&nbsp;<img src="../captcha.php">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="text-center">
                                                <button type="submit" name="signup" class="btn btn-primary" id="submit">Register Now </button>
                                            </div>

                                        </form>

                                        <div style="text-align: right">
                                            <a onclick="display()"><i class="far fa-question-circle"></i></a>
                                        </div>

                                        <br><br>
                                        <div class="alert alert-warning" role="alert" id='alert'>
                                            <button style="text-align: right;" type="button" class="close" onclick="display()" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>

                                            <h5 class="alert-heading"><b>Psst!</b></h5>

                                            <p>Please be remind that the password will default be the registered username.</p>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!--               -->

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


