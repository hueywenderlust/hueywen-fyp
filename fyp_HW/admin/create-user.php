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
if(isset($_POST['signup']))
{
//code for captcha verification
    if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    }
    else {
        $StaffId = $_POST['StaffId'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $faculty = $_POST['faculty'];
        $department =$_POST['department'];
        $password = md5($_POST['StaffId']);
        $status=1;

        function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';

            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        $api_new =  generateRandomString(72);

        $sql="INSERT INTO  tbl_staffs(StaffId, firstName, lastName, email, faculty, department, password, status, user_type,api_key) 
              VALUES(:StaffId,:firstName,:lastName,:email,:faculty,:department,:password,:status,'user',:api_key)";

        $query = $dbh->prepare($sql);

        $query->bindParam(':StaffId',$StaffId,PDO::PARAM_STR);
        $query->bindParam(':firstName',$firstName,PDO::PARAM_STR);
        $query->bindParam(':lastName',$lastName,PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':faculty',$faculty, PDO::PARAM_STR);
        $query->bindParam(':department',$department, PDO::PARAM_STR);
        $query->bindParam(':password',$password,PDO::PARAM_STR);
        $query->bindParam(':status',$status,PDO::PARAM_STR);
        $query->bindParam(':api_key',$api_new,PDO::PARAM_STR);

        $query->execute();

        $lastInsertId = $dbh->lastInsertId();

        if($lastInsertId) {
            echo '<script>alert("Registration successful")</script>';
        } else {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }
    }
}

?>

<?php

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
        <!--<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

        <script>

            function checkIDkAvailability() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "check_availabilitysid.php",
                    data:'staffid='+$("#staffid").val(),
                    type: "POST",
                    success:function(data){
                        $("#usersid-availability-status").html(data);
                        $("#loaderIcon").hide();
                    },
                    error:function (){}
                });
            }

            function checkEmailAvailability() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "check_availabilityemail.php",
                    data:'email='+$("#email").val(),
                    type: "POST",
                    success:function(data){
                        $("#email-availability-status").html(data);
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
                            <a class="btn btn-primary float-left" href="../admin/manage.php" role="button">Back</a>
                        </div>
                        <br><br>

                        <div class="container-fluid">
                            <div class="row pad-botm">
                                <div class="col-md-12">
                                    <h4 class="header-line">Create New User</h4>

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
                                                            <label>Staff ID:</label>
                                                            <input class="form-control border-input" type="text" name="StaffId" id="staffid" onBlur="checkIDkAvailability()" autocomplete="off" required />
                                                            <span id="usersid-availability-status" style="font-size:12px;"></span>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>First Name:</label>
                                                            <input class="form-control border-input" type="text" name="firstName" autocomplete="off" required />
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Last Name:</label>
                                                            <input class="form-control border-input" type="text" name="lastName" autocomplete="off" required />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Email:</label>
                                                            <input class="form-control border-input" type="text" name="email" id="email" onBlur="checkEmailAvailability()" autocomplete="off" required />
                                                            <span id="email-availability-status" style="font-size:12px;"></span>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Faculty</label>
                                                            <select class="form-control border-input" id="exampleFormControlSelect1" name="faculty" required>
                                                                <option>-</option>
                                                                <option>School of Arts</option>
                                                                <option>School of Healthcare and Medical Science</option>
                                                                <option>School of Business</option>
                                                                <option>School of Science and Technology</option>
                                                                <option>School of Hospitality</option>
                                                                <option>School of Mathematical Science</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Department</label>
                                                            <select class="form-control border-input" id="exampleFormControlSelect1" name="department" required>
                                                                <option>-</option>
                                                                <option>Department of Art and Design</option>
                                                                <option>Department of Communication and Liberal Arts</option>
                                                                <option>Department of Performance and Media</option>
                                                                <option>Department of Nursing</option>
                                                                <option>Department of Medical Sciences</option>
                                                                <option>Department of Accounting</option>
                                                                <option>Department of Marketing</option>
                                                                <option>Department of Management</option>
                                                                <option>Department of Business Analytics</option>
                                                                <option>Department of Economics and Finance</option>
                                                                <option>Department of Biological Sciences</option>
                                                                <option>Department of Computing and Information System</option>
                                                                <option>Department of Psychology</option>
                                                                <option>Department of Hospitality</option>
                                                                <option>Department of Applied Statistics</option>
                                                                <option>Department of Actuarial Science and Risks</option>
                                                                <option>Department of Pure and Applied Maths</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Verification code: </label>
                                                            <input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />&nbsp;<img src="../captcha.php">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="text-center">
                                                    <button type="submit" name="signup" id="submit" class="btn btn-info btn-fill btn-wd">Register</button>
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

                                                <p>Please be remind that the password will default be the registered Staff ID.</p>

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
<?php } ?>

