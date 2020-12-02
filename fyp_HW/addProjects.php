<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 19/10/2018
 * Time: 1:13 AM
 */

    session_start();

    $JSON_Test = $_POST['JsonData'];

    $data = json_decode($JSON_Test);

    $Process_Status = true;

    include('inc/config.php');
    

    $user_ID = $_SESSION['user_ID'];


    foreach ($data as $entry){

        $projName = $entry->projName;
        $communityName = $entry->communityName;
        $relatedProj = $entry->relatedProj;
        $organizer = $entry->organizer;
        $sponsorship = $entry->sponsorship;
        $description = $entry->description;
        $startDate = $entry->startDate;
        $endDate = $entry->endDate;


        $sql = "INSERT INTO projects (projName, communityName, relatedProj, organizer, sponsorship, description, startDate, endDate, user_ID)  
                Value (:projName, :communityName, :relatedProj, :organizer, :sponsorship, :description, :startDate, :endDate, :user_ID)";


        try {

            $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare sql and bind parameters
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':projName', $projName);
            $stmt->bindParam(':communityName', $communityName);
            $stmt->bindParam(':relatedProj', $relatedProj);
            $stmt->bindParam(':organizer', $organizer);
            $stmt->bindParam(':sponsorship',$sponsorship);
            $stmt->bindParam(':description',$description);
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