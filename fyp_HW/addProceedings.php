<?php

    session_start();

    $JSON_Test = $_POST['JsonData'];

    $data = json_decode($JSON_Test);

    $Process_Status = true;

    include('inc/config.php');
    

    $user_ID = $_SESSION['user_ID'];


    foreach ($data as $entry){


        $author = $entry->author;
        $paperTitle = $entry->paperTitle;
        $procedingsTitle= $entry->procedingsTitle;
        $issueVol = $entry->issueVol;
        $pageNo = $entry->pageNo;
        $articleID = $entry->articleID;
        $url = $entry->url;
        $issnissbn = $entry->issnissbn;

        $sql = "INSERT INTO proceedings (authors,paperTitle,proceedingsTitle,issueVol,pageNo,articleID,url,issn_ibsn, user_ID)  
                Value (:author,:paperTitle,:procedingsTitle,:issueVol,:pageNo,:articleID,:url,:issnissbn, :user_ID)";


        try {

            $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare sql and bind parameters
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':paperTitle', $paperTitle);
            $stmt->bindParam(':procedingsTitle', $procedingsTitle);
            $stmt->bindParam(':issueVol', $issueVol);
            $stmt->bindParam(':pageNo', $pageNo);
            $stmt->bindParam(':articleID', $articleID);
            $stmt->bindParam(':url', $url);
            $stmt->bindParam(':issnissbn',  $issnissbn);
            $stmt->bindParam(':user_ID',  $user_ID);


            $stmt->execute();
            $id = $conn->lastInsertId();

        } catch(PDOException $e) {

            echo $e;
            $Process_Status = false;

        }

    }

    echo $Process_Status;