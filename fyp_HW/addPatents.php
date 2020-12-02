<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 18/10/2018
 * Time: 11:02 PM
 */

    session_start();

    $JSON_Test = $_POST['JsonData'];

    $data = json_decode($JSON_Test);

    $Process_Status = true;

    include('inc/config.php');

    $user_ID = $_SESSION['user_ID'];


    foreach ($data as $entry){

        $patentID = $entry->patentID;
        $yearGranted = $entry->yearGranted;
        $investors = $entry->investors;
        $patentName = $entry->patentName;
        $countryFiled = $entry->countryFiled;
        $dateFiled = $entry->dateFiled;
        $dateGranted = $entry->dateGranted;
        $dateObtainCert = $entry->dateObtainCert;
        $expiryDate = $entry->expiryDate;
        $status = $entry->status;


        $sql = "INSERT INTO patents (patentID, yearGranted, investors, patentName, countryFiled, dateFiled, dateGranted, dateObtainCert, expiryDate, status, user_ID)  
                Value (:patentID, :yearGranted, :investors, :patentName, :countryFiled, :dateFiled, :dateGranted, :dateObtainCert, :expiryDate, :status, :user_ID )";


        try {

            $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare sql and bind parameters
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':patentID', $patentID);
            $stmt->bindParam(':yearGranted', $yearGranted);
            $stmt->bindParam(':investors', $investors);
            $stmt->bindParam(':patentName', $patentName);
            $stmt->bindParam(':countryFiled', $countryFiled);
            $stmt->bindParam(':dateFiled', $dateFiled);
            $stmt->bindParam(':dateGranted', $dateGranted);
            $stmt->bindParam(':dateObtainCert', $dateObtainCert);
            $stmt->bindParam(':expiryDate', $expiryDate);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':user_ID', $user_ID);


            $stmt->execute();

            $id = $conn->lastInsertId();

        } catch(PDOException $e) {
            echo $e;
            $Process_Status = false;
        }

    }

    echo $Process_Status;