<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 18/10/2018
 * Time: 10:41 PM
 */

session_start();

$JSON_Test = $_POST['JsonData'];

$data = json_decode($JSON_Test);

$Process_Status = true;

$host = "localhost";
$db = "sample";
$user = "root";
$pass = "";

$user_ID = $_SESSION['user_ID'];

include('inc/config.php');

foreach ($data as $entry){

    $eduLevel = $entry->eduLevel;
    $degreeName = $entry->degreeName;
    $memberRegNo= $entry->memberRegNo;
    $year = $entry->year;
    $institute = $entry->institute;
    $country = $entry->country;


    $sql = "INSERT INTO eduDetails (eduLevel, degreeName, memberRegNo, year, institute, country, user_ID)  
                Value (:eduLevel, :degreeName, :memberRegNo, :year, :institute, :country, :user_ID)";


    try {

        $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':eduLevel', $eduLevel);
        $stmt->bindParam(':degreeName', $degreeName);
        $stmt->bindParam(':memberRegNo', $memberRegNo);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':institute', $institute);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':user_ID', $user_ID);

        $stmt->execute();

        $id = $conn->lastInsertId();

    } catch(PDOException $e) {
        echo $e;
        $Process_Status = false;
    }

}

echo $Process_Status;