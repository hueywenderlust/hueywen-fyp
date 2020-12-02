<?php

session_start();
error_reporting(0);
include('inc-admin/config.php');
if(strlen($_SESSION['alogin'])==0)
{
    header('location:index.php');
}



include('../../inc/config.php');


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


$total = $A+$B+$C+$D+$E+$F+$G+$H+$I+$J+$K+$L;

$A = ($A/$total)*100;
$B = ($B/$total)*100;
$C = ($C/$total)*100;
$D = ($D/$total)*100;
$E = ($E/$total)*100;
$F = ($F/$total)*100;
$G = ($G/$total)*100;
$H = ($H/$total)*100;
$I = ($I/$total)*100;
$J = ($J/$total)*100;
$K = ($K/$total)*100;
$L = ($L/$total)*100;

require 'vendor/autoload.php';  // Composer's autoloader.
use SamChristy\PieChart\PieChartGD;


$chart = new PieChartGD(300, 375,"","","#f4f3ef");

$chart->setTitle('Percentage of Acedemic Works Recorded');
// Method chaining coming soon!
$chart->addSlice('Research Area',$A, '#4A7EBB');
$chart->addSlice('Membership', $B, '#00BFFF');
$chart->addSlice('Award',$C, '#FF0000');
$chart->addSlice('Training',$D, '#8B0000');
$chart->addSlice('Research ',$E, '#E9967A');
$chart->addSlice('Project', $F, '#FFD700');
$chart->addSlice('Journals',$G, '#F0E68C');
$chart->addSlice('Proceedings',$H, '#BDB76B');
$chart->addSlice('Books',$I, '#006400');
$chart->addSlice('Publications',$J, '#0000CD');
$chart->addSlice('IPs',$K, '#DDA0DD');
$chart->addSlice('Patents',$L, '#C71585');

$chart->draw();
$chart->outputPNG();

