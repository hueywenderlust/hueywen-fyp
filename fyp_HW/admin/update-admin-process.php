<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 12/11/2018
 * Time: 10:54 PM
 */

    session_start();

    include('inc-admin/config.php');

    $operation = $_POST['operation'];

    if(strcmp($operation,"update")==0){
        $id = $_POST['id'];
        $FullName = $_POST['FullName'];
        $AdminEmail = $_POST['AdminEmail'];
        $UserName = $_POST['UserName'];

        $sql= "SELECT * FROM admin WHERE id = :id"; // Ensure the id matches with the user_ID

        $sql = "UPDATE admin SET FullName =:FullName, AdminEmail =:AdminEmail, UserName =:UserName WHERE id =:id";

        try {
            $query = $dbh->prepare($sql);
            $query->bindParam(':id',$id,PDO::PARAM_STR);
            $query->bindParam(':FullName',$FullName,PDO::PARAM_STR);
            $query->bindParam(':AdminEmail',$AdminEmail,PDO::PARAM_STR);
            $query->bindParam(':UserName',$UserName,PDO::PARAM_STR);
            $query->execute();

            echo "1";

        } catch(PDOException $e) {
            echo "2";
        }
    }

    if(strcmp($operation,"delete")==0){

        $id = $_POST['id'];

        $sql= "DELETE FROM admin WHERE id = :id"; // Ensure the id matches with the user_ID


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