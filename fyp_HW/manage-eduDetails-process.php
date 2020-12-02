<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 23/10/2018
 * Time: 12:32 AM
 */


session_start();

include('inc/config.php');

$operation = $_POST['operation'];

$user_ID = $_SESSION['user_ID'];

if(strcmp($operation,"update")==0){

    $id = $_POST['id'];
    $eduLevel = $_POST['eduLevel'];
    $degreeName = $_POST['degreeName'];
    $memberRegNo = $_POST['memberRegNo'];
    $year = $_POST['year'];
    $institute = $_POST['institute'];
    $country = $_POST['country'];

    $sql= "SELECT * FROM eduDetails WHERE id = :id AND user_ID = :user_ID"; // Ensure the id matches with the user_ID

    $sql = "UPDATE eduDetails SET eduLevel =:eduLevel, degreeName =:degreeName, memberRegNo =:memberRegNo, year =:year, institute =:institute, country =:country WHERE id =:id AND user_ID =:user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->bindParam(':eduLevel',$eduLevel,PDO::PARAM_STR);
        $query->bindParam(':degreeName',$degreeName,PDO::PARAM_STR);
        $query->bindParam(':memberRegNo',$memberRegNo,PDO::PARAM_STR);
        $query->bindParam(':year',$year,PDO::PARAM_STR);
        $query->bindParam(':institute',$institute,PDO::PARAM_STR);
        $query->bindParam(':country',$country,PDO::PARAM_STR);
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

    $sql= "DELETE FROM eduDetails WHERE id = :id AND user_ID = :user_ID"; // Ensure the id matches with the user_ID


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