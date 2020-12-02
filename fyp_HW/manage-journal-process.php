<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 22/10/2018
 * Time: 9:33 PM
 */


session_start();

include('inc/config.php');

$operation = $_POST['operation'];

$user_ID = $_SESSION['user_ID'];

if(strcmp($operation,"update")==0){

    $id = $_POST['id'];
    $authors = $_POST['authors'];
    $title = $_POST['title'];
    $name = $_POST['name'];
    $vol = $_POST['vol'];
    $startPage = $_POST['startPage'];
    $endPage = $_POST['endPage'];
    $issn = $_POST['issn'];
    $url = $_POST['url'];

    $sql= "SELECT * FROM `journals` WHERE id = :id AND user_ID = :user_ID"; // Ensure the id matches with the user_ID

    $sql = "UPDATE `journals` SET authors=:authors, publicationTitle=:publicationTitle, journalName=:journalName, issueVol=:issueVol, startPage=:startPage, endPage=:endPage, issn=:issn, url=:url WHERE id=:id AND user_ID=:user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->bindParam(':authors',$authors,PDO::PARAM_STR);
        $query->bindParam(':publicationTitle',$title,PDO::PARAM_STR);
        $query->bindParam(':journalName',$name,PDO::PARAM_STR);
        $query->bindParam(':issueVol',$vol,PDO::PARAM_STR);
        $query->bindParam(':startPage',$startPage,PDO::PARAM_STR);
        $query->bindParam(':endPage',$endPage,PDO::PARAM_STR);
        $query->bindParam(':issn',$issn,PDO::PARAM_STR);
        $query->bindParam(':url',$url,PDO::PARAM_STR);
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

    $sql= "DELETE FROM `journals` WHERE id = :id AND user_ID = :user_ID"; // Ensure the id matches with the user_ID


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