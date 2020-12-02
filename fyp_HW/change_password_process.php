<?php 
include('inc/config.php');

session_start();

$user_ID = $_SESSION['user_ID'];

$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$new_password_2 = $_POST['new_password_2'];

if(strcmp($new_password,$new_password_2)!=0){
    echo "2";
    exit();
}
$hashed_old_password = md5($old_password);

$sql= "SELECT * FROM `tbl_staffs` WHERE `StaffId` = :user_ID AND `password` = :password";

    try {
        $query = $dbh->prepare($sql);
        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
        $query->bindParam(':password',$hashed_old_password,PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

            if (count($result)==0){ // if no such data
                echo "2";
                exit();
            }
    
    } catch(PDOException $e) {
        echo "3";
        exit();
    }

    $hashed_new_password = md5($new_password);

    $sql = "UPDATE tbl_staffs SET password = :password WHERE StaffId =:StaffId";

    try {
        $query = $dbh->prepare($sql);
        $query->bindParam(':StaffId',$user_ID,PDO::PARAM_STR);
        $query->bindParam(':password',$hashed_new_password,PDO::PARAM_STR);
        $query->execute();
        echo "1";
    } catch(PDOException $e) {
        echo "3";
        exit();
    }

?>