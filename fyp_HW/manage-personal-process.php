<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 24/10/2018
 * Time: 11:56 AM
 */


    session_start();

    include('inc/config.php');

    $operation = $_POST['operation'];

    $user_ID = $_SESSION['user_ID'];

    if(strcmp($operation,"update")==0){

        $id = $_POST['id'];
        $staffNo = $_POST['staffNo'];
        $email = $_POST['email'];
        $fullName = $_POST['fullName'];
        $nationality = $_POST['nationality'];
        $dob = $_POST['dob'];
        $position = $_POST['position'];
        $faculty = $_POST['faculty'];
        $department =$_POST['department'];
        $startDate = $_POST['startDate'];
        $summary = $_POST['summary'];


        $sql= "SELECT * FROM personalDetails WHERE id =:id AND user_ID=:user_ID"; // Ensure the id matches with the user_ID

        $sql = "UPDATE personalDetails SET staffNo=:staffNo, email=:email, fullName=:fullName, nationality=:nationality, dob=:dob, position=:position, faculty=:faculty, department=:department, startDate=:startDate, summary=:summary WHERE id=:id AND user_ID=:user_ID";

        try {

            $query = $dbh->prepare($sql);

            $query->bindParam(':id',$id,PDO::PARAM_STR);
            $query->bindParam(':staffNo',$staffNo,PDO::PARAM_STR);
            $query->bindParam(':email',$email, PDO::PARAM_STR);
            $query->bindParam(':fullName',$fullName,PDO::PARAM_STR);
            $query->bindParam(':nationality',$nationality,PDO::PARAM_STR);
            $query->bindParam(':dob',$dob,PDO::PARAM_STR);
            $query->bindParam(':position',$position,PDO::PARAM_STR);
            $query->bindParam(':faculty',$faculty,PDO::PARAM_STR);
            $query->bindParam(':department',$department,PDO::PARAM_STR);
            $query->bindParam(':startDate',$startDate,PDO::PARAM_STR);
            $query->bindParam(':summary',$summary,PDO::PARAM_STR);
            $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

            $query->execute();

            echo "1";

        } catch(PDOException $e) {

            echo "2";

        }


    }

    if(strcmp($operation,"delete")==0){

        $id = $_POST['id'];

        $sql= "DELETE FROM personalDetails WHERE id =:id AND user_ID=:user_ID"; // Ensure the id matches with the user_ID


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