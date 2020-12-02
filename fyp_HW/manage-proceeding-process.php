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
    $paperTitle = $_POST['paperTitle'];
    $proceedingsTitle = $_POST['proceedingsTitle'];
    $issueVol = $_POST['issueVol'];
    $pageNo = $_POST['pageNo'];
    $articleID = $_POST['articleID'];
    $url = $_POST['url'];
    $issn_ibsn = $_POST['issn_ibsn'];

    $sql= "SELECT * FROM `proceedings` WHERE id =:id AND user_ID =:user_ID"; // Ensure the id matches with the user_ID

    $sql = "UPDATE `proceedings` SET authors=:authors, paperTitle=:paperTitle, proceedingsTitle=:proceedingsTitle, issueVol=:issueVol, pageNo=:pageNo, articleID=:articleID, url=:url, issn_ibsn=:issn_ibsn WHERE id=:id AND user_ID=:user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->bindParam(':authors',$authors,PDO::PARAM_STR);
        $query->bindParam(':paperTitle',$paperTitle,PDO::PARAM_STR);
        $query->bindParam(':proceedingsTitle',$proceedingsTitle,PDO::PARAM_STR);
        $query->bindParam(':issueVol',$issueVol,PDO::PARAM_STR);
        $query->bindParam(':pageNo',$pageNo,PDO::PARAM_STR);
        $query->bindParam(':articleID',$articleID,PDO::PARAM_STR);
        $query->bindParam(':url',$url,PDO::PARAM_STR);
        $query->bindParam(':issn_ibsn',$issn_ibsn,PDO::PARAM_STR);
        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

        $query->execute();

        echo "1";



    }
    catch(PDOException $e)
    {

        echo "2";

    }


}

if(strcmp($operation,"delete")==0){

    $id = $_POST['id'];

    $sql= "DELETE FROM `proceedings` WHERE id=:id AND user_ID=:user_ID"; // Ensure the id matches with the user_ID


    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

        $query->execute();

        echo "1";



    }
    catch(PDOException $e)
    {

        echo "2";

    }



}






?>