<?php
    session_start();
    error_reporting(0);
    include('inc/config.php');
    if(strlen($_SESSION['user_ID'])==0) {
        header('location:index.php');
    }
else{?>

    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
<!--        <!--[if IE]>-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <!-- [endif]-->
        <title>SunU Experts</title>
        <!-- ICON  -->
        <link rel="icon" type="image/png" href="assets/assets/icons/sunway.ico"/>
        <!-- BOOTSTRAP CORE STYLE  -->
<!--        <link href="assets/assets/css/bootstrap.css" rel="stylesheet" />-->
        <!-- FONT AWESOME STYLE  -->
<!--        <link href="assets/assets/css/font-awesome.css" rel="stylesheet" />-->
        <!-- CUSTOM STYLE  -->
<!--        <link href="assets/assets/css/style.css" rel="stylesheet" />-->
        <!-- GOOGLE FONT -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed|Poppins" rel="stylesheet">
<!---->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<!---->
<!---->
<!---->
    </head>
    <?php include ('inc/sidebar.php');?>


    <body>
    <div class="container-fluid">
<!--        <div class="navbar" >-->
<!--                        <div class="container">-->
<!--                            --><?php //if($_SESSION['user_ID']) { ?>
<!--                                <div class="right-div">-->
<!--                                    <div class="dropdown">-->
<!--                                        <button class="btn btn-secondary float-right dropdown-toggle" type="button" data-toggle="dropdown">-->
<!--                                            --><?php //echo $_SESSION['fName']?><!-- --><?php //echo $_SESSION['lName']; ?>
<!--                                            <span class="caret"></span>-->
<!--                                        </button>-->
<!--                                        <ul class="dropdown-menu">-->
<!--                                            <li><a href="personal.php">My Profile</a></li>-->
<!--                                            <li><a href="#">Edit Password</a></li>-->
<!--                                            <li><a href="logout.php" >Log Out</a></li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                </div>-->
<!---->
<!--                            --><?php //}?>
<!--<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--       <br><br><hr>-->


        <?php $user_ID = $_SESSION['user_ID']; ?>

<!--        <div class="navbar navbar-inverse set-radius-zero" >-->
<!--            <div class="container">-->
<!--                --><?php //if($_SESSION['user_ID']) { ?>
<!--                    <div class="right-div">-->
<!--                        <div class="dropdown">-->
<!--                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">-->
<!--                                --><?php //echo $_SESSION['fName']?><!-- --><?php //echo $_SESSION['lName']; ?>
<!--<!--                                <span class="caret"></span>-->
<!--                            </button>-->
<!--                            <ul class="dropdown-menu">-->
<!--                                <li><a href="personal.php">My Profile</a></li>-->
<!--                                <li><a href="#">Edit Password</a></li>-->
<!--                                <li><a href="logout.php" >Log Out</a></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                --><?php //}?>
<!--            </div>-->
<!--        </div>-->

        <div class="content-wrapper">
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-12">
                        <h3 class="header-line">Welcome Back, <?php echo $_SESSION['fName']?> <?php echo $_SESSION['lName']; ?>!</h3>
                    </div>
                </div>

                <br><br>

                <div class="row">
                    <div class="col-md-3">
                        <a href="view-awards-details.php">
                            <div class="alert alert-info back-widget-set text-center">
                                <i class="fas fa-trophy fa-5x"></i>
                                <?php
                                $sql1 ="SELECT * from awards where user_ID = $user_ID;";
                                $query1 = $dbh -> prepare($sql1);
                                $query1->execute();
                                $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                                $awardNo=$query1->rowCount();
                                ?>
                                <h3><?php echo htmlentities($awardNo);?> </h3>
                                Awards
                            </div></a>
                    </div>


                    <div class="col-md-3">
                        <a href="view-trainings-details.php">
                            <div class="alert alert-info back-widget-set text-center">
                                <i class="fas fa-chalkboard-teacher fa-5x"></i>
                                <?php
                                $sql2 ="SELECT * from training where user_ID = $user_ID;";
                                $query2 = $dbh -> prepare($sql2);
                                $query2->execute();
                                $results2=$query2->fetchAll(PDO::FETCH_OBJ);
                                $training=$query2->rowCount();
                                ?>
                                <h3><?php echo htmlentities($training);?></h3>
                                Training / Programme
                            </div></a>
                    </div>

                    <div class="col-md-3">
                        <a href="view-research-activities-details.php">
                            <div class="alert alert-info back-widget-set text-center">
                                <i class="fas fa-microscope fa-5x"></i>
                                <?php
                                $sql3 ="SELECT * from research_activities where user_ID = $user_ID;";
                                $query3 = $dbh -> prepare($sql3);
                                $query3->execute();
                                $results3=$query3->fetchAll(PDO::FETCH_OBJ);
                                $research=$query3->rowCount();
                                ?>
                                <h3><?php echo htmlentities($research);?></h3>
                                Research Activities
                            </div></a>
                    </div>

                    <div class="col-md-3">
                        <a href="view-projects-details.php">
                            <div class="alert alert-info back-widget-set text-center">
                                <i class="fas fa-project-diagram fa-5x"></i>
                                <?php
                                $sql4 ="SELECT * from projects where user_ID = $user_ID;";
                                $query4 = $dbh -> prepare($sql4);
                                $query4->execute();
                                $results4=$query4->fetchAll(PDO::FETCH_OBJ);
                                $project=$query4->rowCount();
                                ?>
                                <h3><?php echo htmlentities($project);?></h3>
                                Projects
                            </div></a>
                    </div>

                </div>

                <br>

                <div class="row">

                    <div class="col-md-3">
                        <a href="view-journals-details.php">
                            <div class="alert alert-info back-widget-set text-center">
                                <i class="far fa-copy fa-5x"></i>
                                <?php
                                $sql5 ="SELECT * from journals where user_ID = $user_ID;";
                                $query5 = $dbh -> prepare($sql5);
                                $query5->execute();
                                $results5 = $query5->fetchAll(PDO::FETCH_OBJ);
                                $journal = $query5->rowCount();
                                ?>
                                <h3><?php echo htmlentities($journal);?> </h3>
                                Journals
                            </div>
                        </a>
                    </div>


                    <div class="col-md-3">
                        <a href="view-proceedings-details.php">
                            <div class="alert alert-info back-widget-set text-center">
                                <i class="fas fa-archive fa-5x"></i>
                                <?php
                                $sql6 ="SELECT * from proceedings where user_ID = $user_ID;";
                                $query6 = $dbh -> prepare($sql6);
                                $query6->execute();
                                $results6=$query6->fetchAll(PDO::FETCH_OBJ);
                                $proceeding=$query6->rowCount();
                                ?>
                                <h3><?php echo htmlentities($proceeding);?></h3>
                                Proceedings
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="view-books-chaps-details.php">
                            <div class="alert alert-info back-widget-set text-center">
                                <i class="fas fa-book fa-5x"></i>
                                <?php
                                $sql7 ="SELECT * from `books-chaps` where user_ID = $user_ID;";
                                $query7 = $dbh -> prepare($sql7);
                                $query7->execute();
                                $results7=$query7->fetchAll(PDO::FETCH_OBJ);
                                $book=$query7->rowCount();
                                ?>
                                <h3><?php echo htmlentities($book);?></h3>
                                Books / Books' Chapter
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="view-others-publications-details.php">
                            <div class="alert alert-info back-widget-set text-center">
                                <i class="fas fa-newspaper fa-5x"></i>
                                <?php
                                $sql8 ="SELECT * from `other_publications` where user_ID = $user_ID;";
                                $query8 = $dbh -> prepare($sql8);
                                $query8->execute();
                                $results8 = $query8->fetchAll(PDO::FETCH_OBJ);
                                $other = $query8->rowCount();
                                ?>
                                <h3><?php echo htmlentities($other);?></h3>
                                Others Publication
                            </div>
                        </a>
                    </div>

                </div>
<br>
                <div class="row">

                    <div class="col-md-3">
                        <a href="view-patents-details.php">
                            <div class="alert alert-info back-widget-set text-center">
                                <i class="far fa-address-card fa-5x"></i>
                                <?php
                                $sql9 ="SELECT * from patents where user_ID = $user_ID;";
                                $query9 = $dbh -> prepare($sql9);
                                $query9->execute();
                                $results9=$query9->fetchAll(PDO::FETCH_OBJ);
                                $patent=$query9->rowCount();
                                ?>
                                <h3><?php echo htmlentities($patent);?></h3>
                                Patents
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="view-ips-details.php">
                            <div class="alert alert-info back-widget-set text-center">
                                <i class="far fa-newspaper fa-5x"></i>
                                <?php
                                $sql10 ="SELECT * from ips where user_ID = $user_ID;";
                                $query10 = $dbh -> prepare($sql10);
                                $query10->execute();
                                $results10=$query10->fetchAll(PDO::FETCH_OBJ);
                                $ips=$query10->rowCount();
                                ?>
                                <h3><?php echo htmlentities($ips);?></h3>
                                other IPs
                            </div></a>
                    </div>

                    <div class="col-md-3">
                        <a href="view-eduQualification-details.php">
                            <div class="alert alert-info back-widget-set text-center">
                                <i class="fas fa-user-graduate fa-5x"></i>
                                <?php
                                $sql11 ="SELECT * from eduDetails  where user_ID = $user_ID;";
                                $query11 = $dbh -> prepare($sql11);
                                $query11->execute();
                                $results11 = $query11->fetchAll(PDO::FETCH_OBJ);
                                $edu = $query11->rowCount();
                                ?>
                                <h3><?php echo htmlentities($edu);?></h3>
                                Education Qualifications
                            </div></a>
                    </div>

                    <div class="col-md-3">
                        <a href="view-research-areas-details.php">
                            <div class="alert alert-info back-widget-set text-center">
                                <i class="fas fa-map-signs fa-5x"></i>
                                <?php
                                $sql12 ="SELECT * from researcharea_details  where user_ID = $user_ID;";
                                $query12 = $dbh -> prepare($sql12);
                                $query12->execute();
                                $results12 = $query12->fetchAll(PDO::FETCH_OBJ);
                                $area = $query12->rowCount();
                                ?>
                                <h3><?php echo htmlentities($area);?></h3>
                                Research Area
                            </div></a>
                    </div>

                </div>
<br>

                <div class="row">
                    <div class="col-md-3">
                        <a href="view-membership-details.php">
                            <div class="alert alert-info back-widget-set text-center">
                                <i class="fas fa-id-card-alt fa-5x"></i>
                                <?php
                                $sql13 = "SELECT * FROM  `membership` WHERE user_ID = $user_ID;";
                                $query13 = $dbh -> prepare($sql13);
                                $query13->execute();
                                $results13=$query13->fetchAll(PDO::FETCH_OBJ);
                                $membership=$query13->rowCount();
                                ?>
                                <h3><?php echo htmlentities($membership);?> </h3>
                                Memberships
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="view-workingXp-details.php">
                            <div class="alert alert-info back-widget-set text-center">
                                <i class="fas fa-briefcase fa-5x"></i>
                                <?php
                                $sql15 = "SELECT * FROM  `workingXp` WHERE user_ID = $user_ID;";
                                $query15 = $dbh -> prepare($sql15);
                                $query15->execute();
                                $results15=$query15->fetchAll(PDO::FETCH_OBJ);
                                $workingXp=$query15->rowCount();
                                ?>
                                <h3><?php echo htmlentities($workingXp);?> </h3>
                                Working History
                            </div></a>
                    </div>

                    <div class="col-md-3">
                        <a href="view-personal-details.php">
                            <div class="alert alert-info back-widget-set text-center">
                                <i class="fas fa-user-circle fa-5x"></i>
                                <?php
                                $sql14 = "SELECT * FROM  `personalDetails` WHERE user_ID = $user_ID;";
                                $query14 = $dbh -> prepare($sql14);
                                $query14->execute();
                                $results14=$query14->fetchAll(PDO::FETCH_OBJ);
                                $personal=$query14->rowCount();
                                ?>
                                <!--                                <h3>--><?php //echo htmlentities($personal);?><!-- </h3>-->
                                <br><br><br>
                                Personal Details
                            </div>
                        </a>
                    </div>


                    <div class="col-md-3">
                        <a href="ExportPDF/resume.php">
                            <div class="alert alert-info back-widget-set text-center">
                                <i class="far fa-id-card fa-5x"></i>
                                <br><br><br>
                                Resume
                            </div>
                        </a>
                    </div>

                </div>
                <br>

                <div class="row">
                    <div class="col-md-3">
                        <a href="ExportPDF/exportPDF.php">
                            <div class="alert alert-info back-widget-set text-center">
                                <i class="fas fa-file-export fa-5x"></i>
                                <br><br><br>
                                Export PDF (MYRA CV)
                            </div>
                        </a>
                    </div>
                </div>




            </div>
        </div>
<!---->
        <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
<!--         CORE JQUERY-->
        <script src="assets/assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS  -->
        <script src="assets/assets/js/bootstrap.js"></script>
        <!-- CUSTOM SCRIPTS  -->
        <script src="assets/assets/js/custom.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets-bootstrap4/js/custom.js"></script>


        </body>
        </html>

    <footer class="bottom">
        <section class="footer-section float-right">
            SunU Experts | 2018 &copy hueywen  &nbsp;
        </section>
    </footer>

</body>
        <style>
            .footer-section {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: darkslategrey;
                color: white;
                text-align: right;
        </style>

        </html>
    <?php } ?>
