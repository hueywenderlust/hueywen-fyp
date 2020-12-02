<?php 

$response = array();
$user_ID = $user_id;

$response["name"] = "";
$response["dob"] = "";
$response["email"] = "";
$response["nationality"] = "";
$response["summary"] = "";

$response["education_details"] = array();
$response["working_history"] = array();

$sql= "SELECT * FROM `tbl_staffs` WHERE `StaffId` = :user_ID";

try {
    
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
    
    $query->execute();
    
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($result as $output) {
        
        $response["name"] =ucfirst($output["firstName"])." ".ucfirst($output["lastName"]);
        $response["dob"] =$output["dob"];
        $response["email"] =  $output["email"];
        $response["nationality"] = $output["nationality"];
        $response["summary"] = $output["summary"];
      
    }
    
}
catch(PDOException $e) {
    
    
}

//split

$sql= "SELECT * FROM `eduDetails` WHERE `user_ID` = :user_ID";

try {
    
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
    
    $query->execute();
    
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    

    
    foreach($result as $output) {
        
        $temp=array();
        
        $temp['eduLevel'] = htmlentities($output['eduLevel']);
        $temp['degreeName'] = htmlentities($output['degreeName']);
        $temp['memberRegNo'] = htmlentities($output['memberRegNo']);
        $temp['year'] = htmlentities($output['year']);
        $temp['institute'] = htmlentities($output['institute']);
        $temp['country'] = htmlentities($output['country']);
        
        array_push($response["education_details"],$temp);
     
        
    }
    
    
}
catch(PDOException $e) {
    
    echo $e;
}

//split

$sql= "SELECT * FROM `workingXP` WHERE `user_ID` = :user_ID";

try {
    
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
    
    $query->execute();
    
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    
    foreach($result as $output) {
        
        $temp=array();
        
        $temp['jobPosition'] = htmlentities($output['jobPosition']);
        $temp['company'] = htmlentities($output['company']);
        $temp['duration'] = htmlentities($output['startYear']." to ".htmlentities($output['endYear']));
        $temp['description'] = htmlentities($output['description']);

        array_push($response["working_history"],$temp);
    }
    
    
}
catch(PDOException $e) {
    
    echo $e;
}

echo json_encode($response);



?>