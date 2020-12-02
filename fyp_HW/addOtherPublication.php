<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 19/10/2018
 * Time: 1:39 AM
 */

    session_start();

    $JSON_Test = $_POST['JsonData'];

    $data = json_decode($JSON_Test);

    $Process_Status = true;

    include('inc/config.php');
    
    $user_ID = $_SESSION['user_ID'];


    foreach ($data as $entry){

        $authors = $entry->authors;
        $docType = $entry->docType;
        $articleTitle = $entry->articleTitle;
        $sourceName = $entry->sourceName;
        $vol = $entry->vol;
        $pageNo = $entry->pageNo;
        $url = $entry->url;
        $issn_ibsn = $entry->issn_ibsn;


        $sql = "INSERT INTO other_publications (authors, docType, articleTitle, sourceName, vol, pageNo, url, issn_ibsn, user_ID)  
                Value (:authors, :docType, :articleTitle, :sourceName, :vol, :pageNo, :url, :issn_ibsn, :user_ID)";


        try {

            $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare sql and bind parameters
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':authors', $authors);
            $stmt->bindParam(':docType', $docType);
            $stmt->bindParam(':articleTitle', $articleTitle);
            $stmt->bindParam(':sourceName', $sourceName);
            $stmt->bindParam(':vol',$vol);
            $stmt->bindParam(':pageNo',$pageNo);
            $stmt->bindParam(':url', $url);
            $stmt->bindParam(':issn_ibsn', $issn_ibsn);
            $stmt->bindParam(':user_ID', $user_ID);


            $stmt->execute();

            $id = $conn->lastInsertId();

        } catch(PDOException $e) {
            echo $e;
            $Process_Status = false;
        }

    }

    echo $Process_Status;