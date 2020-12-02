<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 23/10/2018
 * Time: 12:37 AM
 */

session_start();

include('inc/config.php');

$operation = $_POST['operation'];

$user_ID = $_SESSION['user_ID'];

if(strcmp($operation,"update")==0){

    $id = $_POST['id'];
    $projName = $_POST['projName'];
    $communityName = $_POST['communityName'];
    $relatedProj = $_POST['relatedProj'];
    $organizer = $_POST['organizer'];
    $sponsorship = $_POST['sponsorship'];
    $description = $_POST['description'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    $sql= "SELECT * FROM `projects` WHERE id = :id AND user_ID = :user_ID"; // Ensure the id matches with the user_ID

    $sql = "UPDATE `projects` SET projName=:projName, communityName=:communityName, relatedProj=:relatedProj, organizer=:organizer, sponsorship=:sponsorship, description=:description, startDate=:startDate, endDate=:endDate WHERE id=:id AND user_ID=:user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->bindParam(':projName',$projName,PDO::PARAM_STR);
        $query->bindParam(':communityName',$communityName,PDO::PARAM_STR);
        $query->bindParam(':relatedProj',$relatedProj,PDO::PARAM_STR);
        $query->bindParam(':organizer',$organizer,PDO::PARAM_STR);
        $query->bindParam(':sponsorship',$sponsorship,PDO::PARAM_STR);
        $query->bindParam(':description',$description,PDO::PARAM_STR);
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

    $sql= "DELETE FROM `projects` WHERE id = :id AND user_ID = :user_ID"; // Ensure the id matches with the user_ID


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