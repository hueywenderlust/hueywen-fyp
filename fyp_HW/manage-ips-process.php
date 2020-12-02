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
    $nameIP = $_POST['nameIP'];
    $IPtype = $_POST['IPtype'];
    $creators = $_POST['creators'];
    $dateReg = $_POST['dateReg'];
    $refNo = $_POST['refNo'];


    $sql= "SELECT * FROM `ips` WHERE id=:id AND user_ID=:user_ID"; // Ensure the id matches with the user_ID

    $sql = "UPDATE `ips` SET nameIP=:nameIP, IPtype=:IPtype, creators=:creators, dateReg=:dateReg, refNo=:refNo WHERE id=:id AND user_ID=:user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->bindParam(':nameIP',$nameIP,PDO::PARAM_STR);
        $query->bindParam(':IPtype',$IPtype,PDO::PARAM_STR);
        $query->bindParam(':creators',$creators,PDO::PARAM_STR);
        $query->bindParam(':dateReg',$dateReg,PDO::PARAM_STR);
        $query->bindParam(':refNo',$refNo,PDO::PARAM_STR);
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

    $sql= "DELETE FROM `ips` WHERE id=:id AND user_ID=:user_ID"; // Ensure the id matches with the user_ID


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