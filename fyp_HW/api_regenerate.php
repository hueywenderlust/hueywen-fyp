<?php 

include('inc/config.php');

$staffNo= $_POST['staffNo'];

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$api_new =  generateRandomString(72);


$sql = "UPDATE tbl_staffs SET api_key =:api_key WHERE StaffId =:StaffId";

    try {
    
        $query = $dbh->prepare($sql);

        $query->bindParam(':StaffId',$staffNo,PDO::PARAM_STR);
        $query->bindParam(':api_key',$api_new,PDO::PARAM_STR);

        $query->execute();

        echo "1";
    
    } catch(PDOException $e) {

        echo "2";

    }


?>