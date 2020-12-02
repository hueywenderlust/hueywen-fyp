<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 12/11/2018
 * Time: 10:53 PM
 */


    session_start();

    include('inc-admin/config.php');

    $operation = $_POST['operation'];

    if(strcmp($operation,"update")==0){
        $id = $_POST['id'];
        $StaffId = $_POST['StaffId'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $faculty = $_POST['faculty'];
        $department = $_POST['department'];

        $sql= "SELECT * FROM tbl_staffs WHERE id = :id"; // Ensure the id matches with the user_ID

        $sql = "UPDATE tbl_staffs SET StaffId =:StaffId, firstName =:firstName, lastName =:lastName, email=:email, faculty=:faculty, department=:department WHERE id =:id";

        try {
            $query = $dbh->prepare($sql);
            $query->bindParam(':id',$id,PDO::PARAM_STR);
            $query->bindParam(':StaffId',$StaffId,PDO::PARAM_STR);
            $query->bindParam(':firstName',$firstName,PDO::PARAM_STR);
            $query->bindParam(':lastName',$lastName,PDO::PARAM_STR);
            $query->bindParam(':email',$email, PDO::PARAM_STR);
            $query->bindParam(':faculty',$faculty, PDO::PARAM_STR);
            $query->bindParam(':department', $department, PDO::PARAM_STR);
            $query->execute();

            echo "1";

        } catch(PDOException $e) {
            echo "2";
        }
    }

    if(strcmp($operation,"delete")==0){

        $id = $_POST['id'];

        $sql= "DELETE FROM tbl_staffs WHERE id = :id"; // Ensure the id matches with the user_ID


        try {

            $query = $dbh->prepare($sql);
            $query->bindParam(':id',$id,PDO::PARAM_STR);
            $query->execute();

            echo "1";

        } catch(PDOException $e) {
            echo "2";
        }

    }






    ?>