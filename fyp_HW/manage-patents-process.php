<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 23/10/2018
 * Time: 12:33 AM
 */



session_start();

include('inc/config.php');

$operation = $_POST['operation'];

$user_ID = $_SESSION['user_ID'];

if(strcmp($operation,"update")==0){

    $id = $_POST['id'];
    $patentID = $_POST['patentID'];
    $yearGranted = $_POST['yearGranted'];
    $investors = $_POST['investors'];
    $patentName = $_POST['patentName'];
    $countryFiled = $_POST['countryFiled'];
    $dateFiled = $_POST['dateFiled'];
    $dateGranted = $_POST['dateGranted'];
    $dateObtainCert = $_POST['dateObtainCert'];
    $expiryDate = $_POST['expiryDate'];
    $status = $_POST['status'];

    $sql= "SELECT * FROM `patents` WHERE id=:id AND user_ID=:user_ID"; // Ensure the id matches with the user_ID

    $sql = "UPDATE `patents` SET patentID=:patentID, yearGranted=:yearGranted, investors=:investors, patentName=:patentName, countryFiled=:countryFiled, dateFiled=:dateFiled, dateGranted=:dateGranted, dateObtainCert=:dateObtainCert, expiryDate=:expiryDate, status=:status WHERE id=:id AND user_ID=:user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->bindParam(':patentID',$patentID,PDO::PARAM_STR);
        $query->bindParam(':yearGranted',$yearGranted,PDO::PARAM_STR);
        $query->bindParam(':investors',$investors,PDO::PARAM_STR);
        $query->bindParam(':patentName',$patentName,PDO::PARAM_STR);
        $query->bindParam(':countryFiled',$countryFiled,PDO::PARAM_STR);
        $query->bindParam(':dateFiled',$dateFiled,PDO::PARAM_STR);
        $query->bindParam(':dateGranted',$dateGranted,PDO::PARAM_STR);
        $query->bindParam(':dateObtainCert',$dateObtainCert,PDO::PARAM_STR);
        $query->bindParam(':expiryDate',$expiryDate,PDO::PARAM_STR);
        $query->bindParam(':status',$status,PDO::PARAM_STR);
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

    $sql= "DELETE FROM `patents` WHERE id=:id AND user_ID=:user_ID"; // Ensure the id matches with the user_ID


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