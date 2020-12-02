<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 26/10/2018
 * Time: 1:27 AM
 */

session_start();

    $JSON_Test = $_POST['JsonData'];

    $data = json_decode($JSON_Test);

    $Process_Status = true;

    include('inc/config.php');
    

    $user_ID = $_SESSION['user_ID'];

    foreach ($data as $entry){

        $jobPosition = $entry->jobPosition;
        $company = $entry->company;
        $startYear = $entry->startYear;
        $endYear= $entry->endYear;
        $description = $entry->description;


        $sql = "INSERT INTO workingXp (jobPosition, company, startYear, endYear, description, user_ID)  
                Value (:jobPosition, :company, :startYear, :endYear, :description, :user_ID)";


        try {

            $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare sql and bind parameters
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':jobPosition', $jobPosition);
            $stmt->bindParam(':company', $company);
            $stmt->bindParam(':startYear', $startYear);
            $stmt->bindParam(':endYear', $endYear);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':user_ID', $user_ID);

            $stmt->execute();

            $id = $conn->lastInsertId();

        } catch(PDOException $e) {
            echo $e;
            $Process_Status = false;
        }

    }

    echo $Process_Status;