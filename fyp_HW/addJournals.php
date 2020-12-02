<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 18/10/2018
 * Time: 11:48 PM
 */

    session_start();

    $JSON_Test = $_POST['JsonData'];

    $data = json_decode($JSON_Test);

    $Process_Status = true;

    include('inc/config.php');

    $user_ID = $_SESSION['user_ID'];


    foreach ($data as $entry){

        $authors = $entry->authors;
        $publicationTitle = $entry->publicationTitle;
        $journalName = $entry->journalName;
        $issueVol = $entry->issueVol;
        $startPage = $entry->startPage;
        $endPage = $entry->endPage;
        $issn = $entry->issn;
        $url = $entry->url;


        $sql = "INSERT INTO journals (authors, publicationTitle, journalName, issueVol, startPage, endPage, issn, url, user_ID)  
                Value (:authors, :publicationTitle, :journalName, :issueVol, :startPage, :endPage, :issn, :url, :user_ID)";


        try {

            $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare sql and bind parameters
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':authors', $authors);
            $stmt->bindParam(':publicationTitle', $publicationTitle);
            $stmt->bindParam(':journalName', $journalName);
            $stmt->bindParam(':issueVol', $issueVol);
            $stmt->bindParam(':startPage',$startPage);
            $stmt->bindParam(':endPage',$endPage);
            $stmt->bindParam(':issn', $issn);
            $stmt->bindParam(':url', $url);
            $stmt->bindParam(':user_ID', $user_ID);

            $stmt->execute();

            $id = $conn->lastInsertId();

        } catch(PDOException $e) {
            echo $e;
            $Process_Status = false;
        }

    }

    echo $Process_Status;