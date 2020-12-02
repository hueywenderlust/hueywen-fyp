<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 22/10/2018
 * Time: 9:49 PM
 */

    session_start();

    include('inc/config.php');

    $operation = $_POST['operation'];
    $user_ID = $_SESSION['user_ID'];

    if(strcmp($operation,"update")==0){
        $id = $_POST['id'];
        $awardName = $_POST['awardName'];
        $conferringBody = $_POST['conferringBody'];
        $awardType = $_POST['awardType'];
        $awardDetails = $_POST['awardDetails'];

        $sql= "SELECT * FROM awards WHERE id = :id AND user_ID = :user_ID"; // Ensure the id matches with the user_ID

        $sql = "UPDATE awards SET awardName =:awardName, conferringBody =:conferringBody, awardType =:awardType, awardDetails =:awardDetails 
                WHERE id =:id AND user_ID =:user_ID";

        try {
            $query = $dbh->prepare($sql);
            $query->bindParam(':id',$id,PDO::PARAM_STR);
            $query->bindParam(':awardName',$awardName,PDO::PARAM_STR);
            $query->bindParam(':conferringBody',$conferringBody,PDO::PARAM_STR);
            $query->bindParam(':awardType',$awardType,PDO::PARAM_STR);
            $query->bindParam(':awardDetails',$awardDetails,PDO::PARAM_STR);
            $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
            $query->execute();

            echo "1";

        } catch(PDOException $e) {
            echo "2";
        }
    }

    if(strcmp($operation,"delete")==0){

        $id = $_POST['id'];

        $sql= "DELETE FROM awards WHERE id = :id AND user_ID = :user_ID"; // Ensure the id matches with the user_ID


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