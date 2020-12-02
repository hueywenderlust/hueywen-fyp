<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 26/10/2018
 * Time: 2:58 PM
 */

    session_start();

    include('inc/config.php');

    $operation = $_POST['operation'];

    $user_ID = $_SESSION['user_ID'];

    if(strcmp($operation,"update")==0){

        $id = $_POST['id'];
        $jobPosition = $_POST['jobPosition'];
        $company = $_POST['company'];
        $startYear = $_POST['startYear'];
        $endYear = $_POST['endYear'];
        $description = $_POST['description'];

        $sql= "SELECT * FROM workingXp WHERE id = :id AND user_ID = :user_ID"; // Ensure the id matches with the user_ID

        $sql = "UPDATE workingXp SET jobPosition =:jobPosition, company =:company, startYear =:startYear, endYear =:endYear, description=:description WHERE id =:id AND user_ID =:user_ID";

        try {

            $query = $dbh->prepare($sql);

            $query->bindParam(':id',$id,PDO::PARAM_STR);
            $query->bindParam(':jobPosition',$jobPosition,PDO::PARAM_STR);
            $query->bindParam(':company',$company,PDO::PARAM_STR);
            $query->bindParam(':startYear',$startYear,PDO::PARAM_STR);
            $query->bindParam(':endYear',$endYear,PDO::PARAM_STR);
            $query->bindParam(':description',$description,PDO::PARAM_STR);
            $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

            $query->execute();

            echo "1";

        } catch(PDOException $e) {

            echo "2";

        }


    }

    if(strcmp($operation,"delete")==0){

        $id = $_POST['id'];

        $sql= "DELETE FROM workingXp WHERE id = :id AND user_ID = :user_ID"; // Ensure the id matches with the user_ID


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