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
    $programmeName = $_POST['programmeName'];
    $institute_location = $_POST['institute_location'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $leaveType = $_POST['leaveType'];

    $sql= "SELECT * FROM training WHERE id =:id AND user_ID =:user_ID"; // Ensure the id matches with the user_ID

    $sql = "UPDATE training SET programmeName=:programmeName, institute_location=:institute_location, startDate=:startDate, endDate=:endDate, leaveType=:leaveType WHERE id=:id AND user_ID=:user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->bindParam(':programmeName',$programmeName,PDO::PARAM_STR);
        $query->bindParam(':institute_location',$institute_location,PDO::PARAM_STR);
        $query->bindParam(':startDate',$startDate,PDO::PARAM_STR);
        $query->bindParam(':endDate',$endDate,PDO::PARAM_STR);
        $query->bindParam(':leaveType',$leaveType,PDO::PARAM_STR);
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

    $sql= "DELETE FROM `training` WHERE id = :id AND user_ID = :user_ID"; // Ensure the id matches with the user_ID


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