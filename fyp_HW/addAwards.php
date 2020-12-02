<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 18/10/2018
 * Time: 4:03 PM
 */

session_start();

    $JSON_Test = $_POST['JsonData'];

    $data = json_decode($JSON_Test);

    $Process_Status = true;

    $user_ID = $_SESSION['user_ID'];
    
    include('inc/config.php');

    foreach ($data as $entry){

        $awardName = $entry->awardName;
        $conferringBody = $entry->conferringBody;
        $awardType= $entry->awardType;
        $awardDetails = $entry->awardDetails;

        $sql = "INSERT INTO awards (awardName, conferringBody, awardType, awardDetails, user_ID)  
                Value (:awardName, :conferringBody, :awardType, :awardDetails, :user_ID)";

        try {
            $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare sql and bind parameters
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':awardName', $awardName);
            $stmt->bindParam(':conferringBody', $conferringBody);
            $stmt->bindParam(':awardType', $awardType);
            $stmt->bindParam(':awardDetails', $awardDetails);
            $stmt->bindParam(':user_ID', $user_ID);

            $stmt->execute();

            $id = $conn->lastInsertId();

        } catch(PDOException $e) {
            echo $e;
            $Process_Status = false;
        }
    }

    echo $Process_Status;