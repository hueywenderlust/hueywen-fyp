<?php

session_start();
error_reporting(0);
include('inc-admin/config.php');
if(strlen($_SESSION['alogin'])==0)
{
    header('location:index.php');
}


include('../../inc/config.php');


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


require 'vendor/autoload.php';  // Composer's autoloader.
use SamChristy\PieChart\PieChartGD;


$chart = new PieChartGD(300, 375,"","","#f4f3ef");

$chart->setTitle('Percentage of Acedemic Works Recorded');

// Method chaining coming soon!
$chart->addSlice('Arts',$oA2, '#4A7EBB');
$chart->addSlice('Healthcare Science', $oB2, '#00BFFF');
$chart->addSlice('Business',$oC2, '#FF0000');
$chart->addSlice('Science Technology',$oD2, '#8B0000');
$chart->addSlice('Hospitality ',$oE2, '#E9967A');
$chart->addSlice('Mathematical Science', $oF2, '#FFD700');


$chart->draw();
$chart->outputPNG();

