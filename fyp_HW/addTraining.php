<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 17/10/2018
 * Time: 11:57 PM
 */

    session_start();

    $JSON_Test = $_POST['JsonData'];

    $data = json_decode($JSON_Test);

    $Process_Status = true;

    include('inc/config.php');
    

    $user_ID = $_SESSION['user_ID'];

    foreach ($data as $entry){

        $programmeName = $entry->programmeName;
        $institute_location = $entry->institute_location;
        $startDate= $entry->startDate;
        $endDate = $entry->endDate;
        $leaveType = $entry->leaveType;


        $sql = "INSERT INTO training (programmeName, institute_location, startDate, endDate, leaveType, user_ID)  
                Value (:programmeName,:institute_location,:startDate,:endDate,:leaveType, :user_ID)";


        try {

            $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare sql and bind parameters
            $stmt = $conn->prepare($sql);


            $stmt->bindParam(':programmeName', $programmeName);
            $stmt->bindParam(':institute_location', $institute_location);
            $stmt->bindParam(':startDate', $startDate);
            $stmt->bindParam(':endDate', $endDate);
            $stmt->bindParam(':leaveType', $leaveType);
            $stmt->bindParam(':user_ID', $user_ID);


            $stmt->execute();

            $id = $conn->lastInsertId();

        } catch(PDOException $e) {

            echo $e;

            $Process_Status = false;
        }

    }

    echo $Process_Status;