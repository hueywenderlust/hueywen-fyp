<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 13/10/2018
 * Time: 7:59 PM
 */

session_start();
error_reporting(0);
include('../inc/config.php');


if(isset($_SESSION['alogin']) && strcasecmp(preg_replace('/\s+/', '', $_SESSION['alogin'])!=0)) {
    header("location:dashboard.php");
}


if($_SESSION['alogin']!=''){
    $_SESSION['alogin']='';
}

if(isset($_POST['login'])) {
//code for captcha verification
    if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } else {
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $sql ="SELECT id,UserName,Password,AdminEmail,user_type,status FROM admin WHERE UserName=:username and Password=:password";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':username', $username, PDO::PARAM_STR);
        $query-> bindParam(':password', $password, PDO::PARAM_STR);
        $query-> execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        if($query->rowCount() > 0) {
            foreach ($results as $result) {
                $_SESSION['login']=$result->AdminEmail;
                $_SESSION['id']=$result->id;
                $_SESSION['type']=$result->user_type;

                if($result->status == 1) {
                    $_SESSION['alogin']=$_POST['username'];
                    echo "<script type='text/javascript'> document.location ='dashboard.php';</script>";
                } else {
                    echo "<script>alert('Your account has been blocked.');</script>";

                }
            }
        } else {
            echo "<script>alert('Invalid Details');</script>";
        }
    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <title>SunU Experts</title>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../assets/assets-login/images/icons/sunway.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/assets-login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/assets-login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/assets-login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/assets-login/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('../assets/assets-login/images/bg-01.jpg');">
        <div class="wrap-login100">
            <form role="form" class="login100-form validate-form" method="post">


							<span class="login100-form-title p-b-34 p-t-27">
								<h1>Sun-U Experts</h1>
							</span>
                <br/>
                <span class="login100-form-title p-b-34 p-t-27">
								<h6>Sunway University</h6>
							</span>

                </br></br>
                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <input class="input100" type="text" name="username" placeholder="Username">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Verification Code">

                    <input  class="input100" type="text"  name="vercode" maxlength="5" autocomplete="off" required placeholder="Verification code" />


                    <span class="focus-input100" data-placeholder="&#xf110;"></span>


                </div>


                <img src="../captcha.php">



                <br/><br/>
                <div class="container-login100-form-btn">

                    <button class="login100-form-btn" type="submit" name="login" value="Login">
                        Admin Login
                    </button>

                </div>
                <br>

            </form>
        </div>
    </div>
</div>

<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="../assets/assets-login/js/jquery-3.2.1.min.js"></script>
<script src="../assets/assets-login/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/assets-login/js/main.js"></script>
</body>
</html>