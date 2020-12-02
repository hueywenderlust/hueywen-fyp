<?php 

include('inc/config.php');

$response = array(); // json respond array
$response['lecturer'] = array(); // main array;


$sql= "SELECT * FROM `tbl_staffs`"; // Ensure the id matches with the user_ID

try {
    
    $query = $dbh->prepare($sql);
    
    $query->execute();
    
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($result)==0){ // if no such data
        
        
    }
    
    foreach($result as $output) {
        
        
        $temp = array();
        
        $temp['name'] = $output["firstName"]." ". $output["lastName"];
        $temp['id'] = $output['StaffId'];
        
        array_push($response['lecturer'], $temp) ;
        
       
        
    }
    
    echo json_encode($response);
    exit();
}
catch(PDOException $e)
{
    echo json_encode($response);
    exit();

}









?>