<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 13/11/2018
 * Time: 4:31 PM
 */

session_start();
error_reporting(0);
include('inc-admin/config.php');
if(strlen($_SESSION['alogin'])==0)
{
    header('location:index.php');
} else {

    ?>

        <!DOCTYPE html>
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <meta name="description" content="" />
            <meta name="author" content="" />
            <title>Sun-U Experts</title>
            <!-- ICON  -->
            <link rel="icon" type="image/png" href="../assets/assets/icons/sunway.ico"/>
            <!-- BOOTSTRAP CORE STYLE  -->
            <link href="../assets/assets/css/bootstrap.css" rel="stylesheet" />
            <!-- FONT AWESOME STYLE  -->
            <link href="../assets/assets/css/font-awesome.css" rel="stylesheet" />
            <!-- DATATABLE STYLE  -->
            <link href="../assets/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
            <!-- CUSTOM STYLE  -->
            <link href="../assets/assets/css/style.css" rel="stylesheet" />
            <!-- GOOGLE FONT -->
            <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
            <style type="text/css">

                .unstyled-button {
                    border: none;
                    padding: 0;
                    background: none;
                    color: #428bca;
                }
            </style>
        </head>

        <body>
        <div class="content-wrapper">
            <div class="container-fluid">
                <a class="btn btn-primary" href="dashboard.php" role="button">Back</a> <br><br><br>

                <div class="row pad-botm">
                    <div class="col-md-12">
                        <h3 class="header-line">Research Area Details</h3>
                    </div>
                    <div class="row">
                        <?php if($_SESSION['error']!="")
                        {?>
                            <div class="col-md-6">
                                <div class="alert alert-danger" >
                                    <strong>Error :</strong>
                                    <?php echo htmlentities($_SESSION['error']);?>
                                    <?php echo htmlentities($_SESSION['error']="");?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if($_SESSION['msg']!="")
                        {?>
                            <div class="col-md-6">
                                <div class="alert alert-success" >
                                    <strong>Success :</strong>
                                    <?php echo htmlentities($_SESSION['msg']);?>
                                    <?php echo htmlentities($_SESSION['msg']="");?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if($_SESSION['delmsg']!="")
                        {?>
                            <div class="col-md-6">
                                <div class="alert alert-success" >
                                    <strong>Success :</strong>
                                    <?php echo htmlentities($_SESSION['delmsg']);?>
                                    <?php echo htmlentities($_SESSION['delmsg']="");?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading" style="padding: 20px;" >
                                Research Areas Lists
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Staff ID</th>
                                            <th>Research Area</th>
                                            <th>Category</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        $sql = "SELECT * FROM `researcharea_details` order by user_ID;";

                                        //
                                        $query = $dbh -> prepare($sql);
                                        $query->execute();
                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt=1;

                                        if($query->rowCount() > 0) {

                                            foreach($results as $result) {
                                                ?>

                                                <tr class="odd gradeX">
                                                    <td class="center"><?php echo htmlentities($cnt);?></td>
                                                    <td class="center"><?php echo htmlentities($result->user_ID);?></td>
                                                    <td class="center">
                                                        <?php

                                                            $area = htmlentities($result->area);

                                                            $area = str_replace("_"," ",$area);

                                                            $area = ucwords($area);

                                                            echo $area;

                                                        ?>
                                                    </td>
                                                    <td class="center"><?php echo htmlentities($result->category);?></td>
                                                </tr>
                                                <?php $cnt=$cnt+1;}} ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>

            </div>
        </div>
        <!-- CONTENT-WRAPPER SECTION END-->


        <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
        <!-- CORE JQUERY  -->
        <script src="../assets/assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS  -->
        <script src="../assets/assets/js/bootstrap.js"></script>
        <!-- DATATABLE SCRIPTS  -->
        <script src="../assets/assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="../assets/assets/js/dataTables/dataTables.bootstrap.js"></script>
        <!-- CUSTOM SCRIPTS  -->
        <script src="../assets/assets/js/custom.js"></script>
        </body>
        </html>
    <?php } ?>


