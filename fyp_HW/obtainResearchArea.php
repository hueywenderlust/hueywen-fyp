<?php

session_start();

/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 18/10/2018
 * Time: 10:41 PM
 */

$response = array();
$response['data'] = array();



include('inc/config.php');

$userID = $_SESSION['user_ID'];

$sql2 = "SELECT * FROM researcharea_details WHERE user_ID = :user_ID";

try {

    $conn2 = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    // set the PDO error mode to exception
    $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt2 = $conn2->prepare($sql2);

    $stmt2->bindParam(':user_ID', $userID);

    $stmt2->execute();

    $result = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $output) {

        $temp = array();

        $temp['area'] = $output['area'];

        array_push($response['data'], $temp);
    }

    echo json_encode($response);
    exit();


} catch(PDOException $e) {
    echo json_encode($response);
    exit();
}
    
    

 
