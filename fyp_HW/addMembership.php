<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 19/10/2018
 * Time: 12:14 AM
 */

    session_start();

    $JSON_Test = $_POST['JsonData'];

    $data = json_decode($JSON_Test);

    $Process_Status = true;

    include('inc/config.php');

    $user_ID = $_SESSION['user_ID'];


    foreach ($data as $entry){

        $name = $entry->name;
        $memberType = $entry->memberType;
        $startDate= $entry->startDate;
        $endDate = $entry->endDate;
        $position = $entry->position;
        $appointmentStart = $entry->appointmentStart;
        $appointmentEnd = $entry->appointmentEnd;


        $sql = "INSERT INTO membership (name, memberType, startDate, endDate, position, appointmentStart, appointmentEnd, user_ID)  
                Value (:name, :memberType, :startDate, :endDate,:position, :appointmentStart, :appointmentEnd, :user_ID)";


        try {

            $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare sql and bind parameters
            $stmt = $conn->prepare($sql);


            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':memberType', $memberType);
            $stmt->bindParam(':startDate', $startDate);
            $stmt->bindParam(':endDate', $endDate);
            $stmt->bindParam(':position', $position);
            $stmt->bindParam(':appointmentStart', $appointmentStart);
            $stmt->bindParam(':appointmentEnd', $appointmentEnd);
            $stmt->bindParam(':user_ID', $user_ID);


            $stmt->execute();

            $id = $conn->lastInsertId();

        } catch(PDOException $e) {

            echo $e;

            $Process_Status = false;
        }

    }

    echo $Process_Status;