<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 23/10/2018
 * Time: 12:38 AM
 */


session_start();

include('inc/config.php');

$operation = $_POST['operation'];

$user_ID = $_SESSION['user_ID'];

if(strcmp($operation,"update")==0){

    $id = $_POST['id'];
    $researchTitle = $_POST['researchTitle'];
    $country = $_POST['country'];
    $collabName = $_POST['collabName'];
    $position = $_POST['position'];
    $moa_loa = $_POST['moa_loa'];
    $fundingBody = $_POST['fundingBody'];
    $fundingAmount = $_POST['fundingAmount'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    $sql= "SELECT * FROM `research_activities` WHERE id =:id AND user_ID =:user_ID"; // Ensure the id matches with the user_ID

    $sql = "UPDATE `research_activities` SET researchTitle=:researchTitle, country=:country, collabName=:collabName, position=:position, moa_loa=:moa_loa, fundingBody=:fundingBody, fundingAmount=:fundingAmount, startDate=:startDate, endDate=:endDate WHERE id=:id AND user_ID=:user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->bindParam(':researchTitle',$researchTitle,PDO::PARAM_STR);
        $query->bindParam(':country',$country,PDO::PARAM_STR);
        $query->bindParam(':collabName',$collabName,PDO::PARAM_STR);
        $query->bindParam(':position',$position,PDO::PARAM_STR);
        $query->bindParam(':moa_loa',$moa_loa,PDO::PARAM_STR);
        $query->bindParam(':fundingBody',$fundingBody,PDO::PARAM_STR);
        $query->bindParam(':fundingAmount',$fundingAmount,PDO::PARAM_STR);
        $query->bindParam(':startDate',$startDate,PDO::PARAM_STR);
        $query->bindParam(':endDate',$endDate,PDO::PARAM_STR);
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

    $sql= "DELETE FROM `research_activities` WHERE id = :id AND user_ID = :user_ID"; // Ensure the id matches with the user_ID


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