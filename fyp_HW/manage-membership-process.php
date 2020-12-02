<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 22/10/2018
 * Time: 11:59 PM
 */


session_start();

include('inc/config.php');

$operation = $_POST['operation'];

$user_ID = $_SESSION['user_ID'];

if(strcmp($operation,"update")==0){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $memberType = $_POST['memberType'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $position = $_POST['position'];
    $appointmentStart = $_POST['appointmentStart'];
    $appointmentEnd = $_POST['appointmentEnd'];

    $sql= "SELECT * FROM `membership` WHERE id=:id AND user_ID=:user_ID"; // Ensure the id matches with the user_ID

    $sql = "UPDATE `membership` SET name=:name, memberType=:memberType, startDate=:startDate, endDate=:endDate, position=:position, appointmentStart=:appointmentStart, appointmentEnd=:appointmentEnd WHERE id=:id AND user_ID=:user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->bindParam(':name',$name,PDO::PARAM_STR);
        $query->bindParam(':memberType',$memberType,PDO::PARAM_STR);
        $query->bindParam(':startDate',$startDate,PDO::PARAM_STR);
        $query->bindParam(':endDate',$endDate,PDO::PARAM_STR);
        $query->bindParam(':position',$position,PDO::PARAM_STR);
        $query->bindParam(':appointmentStart',$appointmentStart,PDO::PARAM_STR);
        $query->bindParam(':appointmentEnd',$appointmentEnd,PDO::PARAM_STR);
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

    $sql= "DELETE FROM `membership` WHERE id=:id AND user_ID=:user_ID"; // Ensure the id matches with the user_ID


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