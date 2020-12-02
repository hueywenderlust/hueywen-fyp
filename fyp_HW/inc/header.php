<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 12/10/2018
 * Time: 5:23 PM
 */
?>

<link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed|Poppins" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed|Poppins" rel="stylesheet">

<div class="navbar navbar-inverse set-radius-zero" >
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" >
                <img src="assets/img/logo.png" />
            </a>
        </div>
        <?php if($_SESSION['stdid'])
        {
            ?>
            <div class="right-div">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo htmlentities($_SESSION['stdid']);?>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="myprofile.php">MyProfile</a></li>
                        <li><a href="change-password.php">Edit Password</a></li>
                        <li><a href="logout.php" >Log Out</a></li>
                    </ul>
                </div>
            </div>

        <?php }?>
    </div>
</div>
<!-- LOGO HEADER END-->

<section class="menu-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><a href="dashboard.php" >Dashboard</a></li>


                        <li role="presentation"><a role="menuitem" tabindex="-1" href="view-announcement.php">Announcement</a></li>

                        <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-parcel.php">My Parcel</a></li>


                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Manage Message <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-message.php">Announcement Message</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-pcmessage.php">MyParcel Message</a></li>


                            </ul>
                        </li>

                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Issues Ticket <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="create-isticket.php">Create New Issues Ticket</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-isticket.php">My Issues Ticket</a></li>
                            </ul>
                        </li>



                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
