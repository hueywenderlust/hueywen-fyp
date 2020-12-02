<?php 

$response = array();

$response["code"] = "";
$response["message"] = "";

if(!isset($_GET['api_key']) || !isset($_GET['request_type']) || !isset($_GET['user_id'])){
      
    $response["message"] = $response["message"] ."Missing api key, user id, or request type.";
    $response["code"] = "601";
    
    echo json_encode($response);
    exit();
    
}

$request_type = $_GET['request_type'];

if(strcasecmp($request_type,"work_pdf")!=0 && strcasecmp($request_type,"work_json")!=0 && strcasecmp($request_type,"resume_pdf")!=0 && strcasecmp($request_type,"resume_json")!=0){
    
    $response["message"] = $response["message"] ."Invalid request type";
    $response["code"] = "601";
    
    
    echo json_encode($response);
    exit();
    
    
}

include('../inc/config.php');

$api_key = $_GET['api_key'];
$user_id = $_GET['user_id'];


$sql= "SELECT * FROM `tbl_staffs` WHERE `StaffId` = :user_id AND `api_key` = :api_key";

try {
    
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':user_id',$user_id,PDO::PARAM_STR);
    $query->bindParam(':api_key',$api_key,PDO::PARAM_STR);
    
    $query->execute();
    
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($result)==0){ // if no such data
        
        $response["message"] = $response["message"] ."Invalid api key or user id";
        $response["code"] = "401";
        
        
        echo json_encode($response);
        exit();
    }
       
    
}
catch(PDOException $e) {
    
    echo $e;
}

if (strcasecmp($request_type,"work_pdf")==0){
    
    include 'exportPDF.php';
    
}

if (strcasecmp($request_type,"resume_pdf")==0){
    
    include 'resume.php';
    
}

if (strcasecmp($request_type,"work_json")==0){
    
    include 'json_work.php';
    
}

if (strcasecmp($request_type,"resume_json")==0){
    
   
    
    include 'json_resume.php';
    

}








?>