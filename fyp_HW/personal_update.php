<?php

include('inc/config.php');

session_start();

$user_ID = $_SESSION['user_ID'];

$image_change = false;

//Image Processing Start
$upload_path = "none";

if(isset ($_FILES['profileImage']['name'])){

    /* Getting file name */
    //$filename = $_FILES['image1']['name'];

    $filename = uniqid('profileImage-', true)
        . '.' . strtolower(pathinfo($_FILES['profileImage']['name'], PATHINFO_EXTENSION));

    /* Location */
    $location = "uploads/".$filename;
    $uploadOk = 1;
    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);


    // Check image format
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $uploadOk = 0;
    }

    if($uploadOk == 0){

    }else{
        /* Upload file */
        if(move_uploaded_file($_FILES['profileImage']['tmp_name'],$location)){

            $upload_path = $location;
            $image_change = true;

        }else{
            //echo 0;
        }
    }

}


//Image Processing Ends

$startDate= $_POST['startDate'];
$email =  $_POST['email'];
$fullName =  $_POST['fullName'];
$dob =  $_POST['dob'];
$nationality =  $_POST['nationality'];
$position =  $_POST['position'];
$faculty =  $_POST['faculty'];
$department =  $_POST['department'];
$summary =  $_POST['summary'];

$fullName_component = explode(" ",$fullName);

$firstName = $fullName_component[0];
$lastName = "";

$x=0;

foreach ($fullName_component as $string){

    if($x!=0){
        $lastName = $lastName." ".$string;
    }
    $x++;

};


$sql = "UPDATE tbl_staffs SET 
startDate =:startDate, 
email =:email, 
firstName =:firstName, 
lastName =:lastName,
nationality =:nationality, 
dob=:dob, 
position=:position, 
faculty=:faculty, 
department=:department,
summary=:summary,
profile_picture=:profile_picture
WHERE StaffId =:StaffId";

try {

    $query = $dbh->prepare($sql);

    $query->bindParam(':StaffId',$user_ID,PDO::PARAM_STR);
    $query->bindParam(':startDate',$startDate,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':firstName',$firstName,PDO::PARAM_STR);
    $query->bindParam(':lastName',$lastName,PDO::PARAM_STR);
    $query->bindParam(':nationality',$nationality,PDO::PARAM_STR);
    $query->bindParam(':dob',$dob,PDO::PARAM_STR);
    $query->bindParam(':position',$position,PDO::PARAM_STR);
    $query->bindParam(':faculty',$faculty,PDO::PARAM_STR);
    $query->bindParam(':department',$department,PDO::PARAM_STR);
    $query->bindParam(':summary',$summary,PDO::PARAM_STR);

    if($image_change){

        $query->bindParam(':profile_picture',$upload_path,PDO::PARAM_STR);
    }

    else{

        $profile_image = $_SESSION['profile_image'];

        $query->bindParam(':profile_picture',$profile_image,PDO::PARAM_STR);
    }



    $query->execute();

    if($image_change){

        $_SESSION['profile_image'] = $upload_path;
    }



    echo "1";

} catch(PDOException $e) {

    echo "2";

}



?>