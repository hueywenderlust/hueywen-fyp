<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 10/11/2018
 * Time: 9:45 PM
 */


include('../inc/config.php');


$sql = "SELECT (SELECT COUNT(*) FROM research_activities) AS A,
        (SELECT COUNT(*) FROM membership) AS B,
        (SELECT COUNT(*) FROM awards) AS C,
        (SELECT COUNT(*) FROM training) AS D,
        (SELECT COUNT(*) FROM `research_activities`) AS E,
        (SELECT COUNT(*) FROM projects) AS F,
        (SELECT COUNT(*) FROM journals) AS G,
        (SELECT COUNT(*) FROM proceedings) AS H,
        (SELECT COUNT(*) FROM `books-chaps`) AS I,
        (SELECT COUNT(*) FROM `other_publications`) AS J,
        (SELECT COUNT(*) FROM `ips`) AS K,
        (SELECT COUNT(*) FROM `patents`) AS L
FROM dual";

try {

    $query = $dbh->prepare($sql);

    $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);


    if (count($result)==0){ // if no such data

    }

    foreach($result as $output) {

        $A = $output["A"];
        $B = $output["B"];
        $C = $output["C"];
        $D = $output["D"];
        $E = $output["E"];
        $F = $output["F"];
        $G = $output["G"];
        $H = $output["H"];
        $I = $output["I"];
        $J = $output["J"];
        $K = $output["K"];
        $L = $output["L"];


    }



}
catch(PDOException $e) {

    echo $e;
}


$total = $A+$B+$C+$D+$E+$F+$G+$H+$I+$J+$K;


$oA = ($A/$total)*100;
$oB = ($B/$total)*100;
$oC = ($C/$total)*100;
$oD = ($D/$total)*100;
$oE = ($E/$total)*100;
$oF = ($F/$total)*100;
$oG = ($G/$total)*100;
$oH = ($H/$total)*100;
$oI = ($I/$total)*100;
$oJ = ($J/$total)*100;
$oK = ($K/$total)*100;
$oL = ($L/$total)*100;

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

                        <p><b> Percentage of Academic Works Recorded</b></p>
                           <img src="graphs/work_graph.php"><br>
                           <img src="graphs/legend_1.png">

                           <table>
  <tr>
    <th>Academic Work</th>
    <th>Number</th>
    <th>Percentage (%)</th>

  </tr>
  <tr>
    <td>Research Area</td>
     <td><?php echo $A?></td>
    <td><?php echo round($oA,2);?></td>

  </tr>
  <tr>
    <td>Membership</td>
    <td><?php echo $B?></td>
    <td><?php echo round($oB,2);?></td>

  </tr>
  <tr>
    <td>Award</td>
    <td><?php echo $C?></td>
    <td><?php echo round($oC,2);?></td>

  </tr>
  <tr>
    <td>Training</td>
    <td><?php echo $D?></td>
    <td><?php echo round($oD,2);?></td>

  </tr>
  <tr>
    <td>Research</td>
    <td><?php echo $E?></td>
    <td><?php echo round($oE,2);?></td>

  </tr>
  <tr>
    <td>Project</td>
    <td><?php echo $F?></td>
    <td><?php echo round($oF,2);?></td>



    <tr>
    <td>Journals</td>
    <td><?php echo $G?></td>
    <td><?php echo round($oG,2);?></td>

  </tr>

    <tr>
    <td>Proceedings</td>
    <td><?php echo $H?></td>
    <td><?php echo round($oH,2);?></td>

  </tr>

    <tr>
    <td>Books</td>
    <td><?php echo $I?></td>
    <td><?php echo round($oI,2);?></td>

  </tr>

    <tr>
    <td>Publications</td>
    <td><?php echo $J?></td>
    <td><?php echo round($oJ,2);?></td>

  </tr>

    <tr>
    <td>IPs</td>
    <td><?php echo $K?></td>
    <td><?php echo round($oK,2);?></td>

  </tr>

    </tr>

    <tr>
    <td>Patents</td>
    <td><?php echo $L?></td>
    <td><?php echo round($oL,2);?></td>

  </tr>
</table>
<br>
<br>



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

