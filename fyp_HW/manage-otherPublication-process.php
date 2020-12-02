<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 23/10/2018
 * Time: 12:36 AM
 */

    session_start();

    include('inc/config.php');

    $operation = $_POST['operation'];

    $user_ID = $_SESSION['user_ID'];

    if(strcmp($operation,"update")==0){

        $id = $_POST['id'];
        $authors = $_POST['authors'];
        $docType = $_POST['docType'];
        $articleTitle = $_POST['articleTitle'];
        $sourceName = $_POST['sourceName'];
        $vol = $_POST['vol'];
        $pageNo = $_POST['pageNo'];
        $url = $_POST['url'];
        $issn_ibsn = $_POST['issn_ibsn'];




        $sql = "UPDATE other_publications SET authors=:authors, docType=:docType, articleTitle=:articleTitle, sourceName=:sourceName, vol=:vol, pageNo=:pageNo, url=:url, issn_ibsn=:issn_ibsn WHERE id=:id AND user_ID=:user_ID";

        try {

            $query = $dbh->prepare($sql);

            $query->bindParam(':id',$id,PDO::PARAM_STR);
            $query->bindParam(':authors',$authors,PDO::PARAM_STR);
            $query->bindParam(':docType',$docType,PDO::PARAM_STR);
            $query->bindParam(':articleTitle',$articleTitle,PDO::PARAM_STR);
            $query->bindParam(':sourceName',$sourceName,PDO::PARAM_STR);
            $query->bindParam(':vol',$vol,PDO::PARAM_STR);
            $query->bindParam(':pageNo',$pageNo,PDO::PARAM_STR);
            $query->bindParam(':url',$url,PDO::PARAM_STR);
            $query->bindParam(':issn_ibsn',$issn_ibsn,PDO::PARAM_STR);
            $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

            $query->execute();

            echo "1";

        } catch(PDOException $e) {

            echo "2";

        }


    }

    if(strcmp($operation,"delete")==0){

        $id = $_POST['id'];

        $sql= "DELETE FROM other_publications WHERE id =:id AND user_ID =:user_ID"; // Ensure the id matches with the user_ID


        try {

            $query = $dbh->prepare($sql);

            $query->bindParam(':id',$id,PDO::PARAM_STR);
            $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

            $query->execute();

            echo "1";



        } catch(PDOException $e) {

            echo "2";

        }



    }






    ?>