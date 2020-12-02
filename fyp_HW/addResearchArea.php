<?php

session_start();

/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 18/10/2018
 * Time: 10:41 PM
 */

$JSON_Test = $_POST['JsonData'];

//$JSON_Test = '[{"area":"ps_chemistry"},{"area":"ps_physics"},{"area":"ps_biology"},{"area":"ps_biochemistry"},{"area":"ps_materials_science"},{"area":"ps_mathematics_and_statistics"}]';

$data = json_decode($JSON_Test);

$Process_Status = true;

include('inc/config.php');


$user_ID = $_SESSION['user_ID'];

//delete user area category start.

$sql3 = "DELETE FROM researcharea_details WHERE user_ID = :user_ID";

try {

    $conn3 = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    // set the PDO error mode to exception
    $conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt3 = $conn3->prepare($sql3);

    $stmt3->bindParam(':user_ID', $user_ID);

    $stmt3->execute();


} catch(PDOException $e) {

}



//delete user area category end.

foreach ($data as $entry){

    $area = $entry->area;

    $areaCategory = "Null";

    //obtain area category start.

    $sql2 = "SELECT * FROM researcharea WHERE areas = :area";

    try {

        $conn2 = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        // set the PDO error mode to exception
        $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters
        $stmt2 = $conn2->prepare($sql2);

        $stmt2->bindParam(':area', $area);

        $stmt2->execute();

        $result = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $output) {

            $areaCategory = $output['category'];
        }


    } catch(PDOException $e) {

    }



    //obtain area category end.





    $sql = "INSERT INTO researcharea_details (user_ID, area, category)  
                Value (:user_ID, :area, :category)";


    try {

        $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':user_ID', $user_ID);
        $stmt->bindParam(':area', $area);
        $stmt->bindParam(':category', $areaCategory);


        $stmt->execute();



    } catch(PDOException $e) {
        echo $e;
        $Process_Status = false;
    }

}

echo $Process_Status;