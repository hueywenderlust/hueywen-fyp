<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 10/11/2018
 * Time: 9:46 PM
 */

include('../inc/config.php');

$sql = "SELECT (SELECT COUNT(*) FROM tbl_staffs WHERE faculty = 'School of Arts' ) AS A,
        (SELECT COUNT(*) FROM tbl_staffs WHERE faculty = 'School of Healthcare and Medical Science' )  AS B,
        (SELECT COUNT(*) FROM tbl_staffs WHERE faculty = 'School of Business' )  AS C,
        (SELECT COUNT(*) FROM tbl_staffs WHERE faculty = 'School of Science and Technology' )  AS D,
        (SELECT COUNT(*) FROM tbl_staffs WHERE faculty = 'School of Hospitality' )  AS E,
        (SELECT COUNT(*) FROM tbl_staffs WHERE faculty = 'School of Mathematical Science' ) AS F
    
FROM dual";

try {

    $query = $dbh->prepare($sql);

    $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);


    if (count($result)==0){ // if no such data

    }

    foreach($result as $output) {

        $A2 = $output["A"];
        $B2 = $output["B"];
        $C2 = $output["C"];
        $D2 = $output["D"];
        $E2 = $output["E"];
        $F2 = $output["F"];



    }



}
catch(PDOException $e) {

    echo $e;
}

$total2 = $A2+$B2+$C2+$D2+$E2+$F2;

$oA2 = ($A2/$total2)*100;
$oB2 = ($B2/$total2)*100;
$oC2 = ($C2/$total2)*100;
$oD2 = ($D2/$total2)*100;
$oE2 = ($E2/$total2)*100;
$oF2 = ($F2/$total2)*100;



session_start();
error_reporting(0);

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

        <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        </style>



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
                    <li>
                        <a href="manage.php">
                            <i class="ti-user"></i>
                            <p>Manage User</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="statistics.php">
                            <i class="ti-pie-chart"></i>
                            <p>Statistics</p>
                        </a>
                    </li>
                    <li>
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
                        <a class="navbar-brand" href="#">Statistics</a>
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

            <a class="btn btn-primary" href="statistics.php" role="button" float-left>Back</a>
                <br><br><br>

                <div class="container-fluid">

                    <div class="content-wrapper">
                        <div class="container-fluid">

                        <div class="col-lg-12 text-center">

                        <p><b> Percentage of Lecturer by School/Faculty</b></p>
                           <img src="graphs/school_graph.php"><br>
                           <img src="graphs/legend_2.png"i">

                           <table>
  <tr>
    <th>School/Faculty</th>
    <th>Number</th>
    <th>Percentage</th>

  </tr>
  <tr>
    <td>School of Arts</td>
     <td><?php echo $A2?></td>
    <td><?php echo round($oA2,2);?></td>

  </tr>
  <tr>
    <td>School of Healthcare and Medical Science</td>
    <td><?php echo $B2?></td>
    <td><?php echo round($oB2,2);?></td>

  </tr>
  <tr>
    <td>School of Business</td>
    <td><?php echo $C2?></td>
    <td><?php echo round($oC2,2);?></td>

  </tr>
  <tr>
    <td>School of Science and Technology</td>
    <td><?php echo $D2?></td>
    <td><?php echo round($oD2,2);?></td>

  </tr>
  <tr>
    <td>School of Hospitality</td>
    <td><?php echo $E2?></td>
    <td><?php echo round($oE2,2);?></td>

  </tr>
  <tr>
    <td>School of Mathematical Science</td>
    <td><?php echo $F2?></td>
    <td><?php echo round($oF2,2);?></td>


    </tr>

    <tr>

</table>


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

<!--    <script type="text/javascript">-->
<!--        $(document).ready(function(){-->
<!---->
<!--            demo.initChartist();-->
<!---->
<!--            $.notify({-->
<!--                icon: 'ti-face-smile',-->
<!--                message: "Welcome back."-->
<!---->
<!--            },{-->
<!--                type: 'success',-->
<!--                timer: 4000-->
<!--            });-->
<!---->
<!--        });-->
<!--    </script>-->

    </html>
<?php } ?>

