<?php

session_start();
error_reporting(0);
include('inc/config.php');

if(isset($_SESSION['user_ID'])) {
    header("location:dashboard.php");
}

if($_SESSION['login']!=''){
    $_SESSION['login']='';
}

if(isset($_POST['login'])) {
    //code for captcha verification
//    if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
//        echo "<script>alert('Incorrect verification code');</script>" ;
//    } else {
        $email=$_POST['email'];
        $password=md5($_POST['password']);
        $sql ="SELECT id, StaffId, firstName, lastName, email, user_type, status, profile_picture 
                FROM tbl_staffs WHERE email=:email and password=:password";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':email', $email, PDO::PARAM_STR);
        $query-> bindParam(':password', $password, PDO::PARAM_STR);
        $query-> execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);

        if($query->rowCount() > 0) {
            foreach ($results as $result) {
                $_SESSION['id']=$result->id;
                $_SESSION['type']=$result->user_type;
                $_SESSION['fName']=$result->firstName;
                $_SESSION['lName']=$result->lastName;
                $_SESSION['profile_image']=$result->profile_picture;

                if($result->status == 1) {
                    $_SESSION['user_ID']=$result->StaffId;
                    echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
                } else {
                    echo "<script>alert('Your Account Has been blocked .Please contact admin');</script>";

                }
            }
        }

        else{
            echo "<script>alert('Invalid Details');</script>";
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
    <link rel="icon" type="image/png" href="assets/assets-login/images/icons/sunway.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/assets-login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/assets-login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/assets-login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/assets-login/css/main.css">
    <!--===============================================================================================-->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('assets/assets-login/images/bg-01.jpg');">
        <div class="wrap-login100">
            <form role="form" class="login100-form validate-form" method="post">


							<span class="login100-form-title p-b-34 p-t-27">
								<h1>SunU Experts</h1>
							</span>
                <br/>
                <span class="login100-form-title p-b-34 p-t-27">
								<h6>Sunway University</h6>
							</span>

<br><br><br><br>

                <div class="wrap-input100 validate-input" data-validate = "Enter Email">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" id="myPassword" placeholder="Password" >
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

<!--                <div class="wrap-input100 validate-input" data-validate="Enter Verification Code">-->
<!---->
<!--                    <input  class="input100" type="text"  name="vercode" maxlength="5" autocomplete="off" required placeholder="Verification code" />-->
<!---->
<!---->
<!--                    <span class="focus-input100" data-placeholder="&#xf110;"></span>-->
<!---->
<!---->
<!--                </div>-->
<!---->
<!---->
<!--                <img src="captcha.php">-->
                <div class="">
                    <p style="color: white"> <input class="login100" type="checkbox" onclick="myFunction()"> &nbsp; Show Password</p>
                </div>



                <br/><br/><br><br>
                <div class="container-login100-form-btn">

                    <button class="login100-form-btn" type="submit" name="login" value="Login">
                        Login
                    </button>

                </div>


            </form>
        </div>
    </div>
</div>

<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="assets/assets-login/js/jquery-3.2.1.min.js"></script>
<script src="assets/assets-login/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/assets-login/js/main.js"></script>



<script>
    function myFunction() {
        var x = document.getElementById("myPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</body>
<footer class="bottom">
    <section class="footer-section float-right">
        SunU Experts | 2018 &copy hueywen  &nbsp; &nbsp;
    </section>
</footer>

<style>
    .footer-section {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: black;
        color: white;
        text-align: right;
</style>
</html>
