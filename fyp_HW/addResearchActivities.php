<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 19/10/2018
 * Time: 12:44 AM
 */

    session_start();

    $JSON_Test = $_POST['JsonData'];

    $data = json_decode($JSON_Test);

    $Process_Status = true;

    include('inc/config.php');
    

    $user_ID = $_SESSION['user_ID'];

    foreach ($data as $entry){

        $researchTitle = $entry->researchTitle;
        $country = $entry->country;
        $collabName= $entry->collabName;
        $position = $entry->position;
        $moa_loa = $entry->moa_loa;
        $fundingBody = $entry->fundingBody;
        $fundingAmount = $entry->fundingAmount;
        $startDate = $entry->startDate;
        $endDate = $entry->endDate;


        $sql = "INSERT INTO research_activities (researchTitle, country, collabName, position, moa_loa, fundingBody, fundingAmount, startDate, endDate, user_ID)  
                Value (:researchTitle, :country, :collabName, :position, :moa_loa, :fundingBody, :fundingAmount, :startDate, :endDate, :user_ID)";


        try {

            $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare sql and bind parameters
            $stmt = $conn->prepare($sql);


            $stmt->bindParam(':researchTitle', $researchTitle);
            $stmt->bindParam(':country', $country);
            $stmt->bindParam(':collabName', $collabName);
            $stmt->bindParam(':position', $position);
            $stmt->bindParam(':moa_loa', $moa_loa);
            $stmt->bindParam(':fundingBody', $fundingBody);
            $stmt->bindParam(':fundingAmount', $fundingAmount);
            $stmt->bindParam(':startDate', $startDate);
            $stmt->bindParam(':endDate', $endDate);
            $stmt->bindParam(':user_ID', $user_ID);

            $stmt->execute();

            $id = $conn->lastInsertId();

        } catch(PDOException $e) {

            echo $e;

            $Process_Status = false;
        }

    }

    echo $Process_Status;