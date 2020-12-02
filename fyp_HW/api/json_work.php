<?php 

$response = array();
$user_ID = $user_id;

$response["name"] = "";
$response["departnment"] = "";
$response["school"] = "";

$response["highest_qualification_obtained"] = array();
$response["research_areas"] = array();
$response["professional_bodies_association_membership"] = array();
$response["awards_fellowship_scholarship"] = array();
$response["training_short_term_course_reseach_activity"] = array();
$response["individual_and_collaborative_research_activity"] = array();
$response["knowledge_technolog_diffusion_projects"] = array();
$response["journal"] = array();
$response["proceedings"] = array();
$response["books"] = array();
$response["publication"] = array();
$response["patent"] = array();
$response["other_ips"] = array();

$sql= "SELECT * FROM `tbl_staffs` WHERE `StaffID` = :user_ID";

try {
    
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
    
    $query->execute();
    
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($result as $output) {
            
        $response["name"] = ucfirst($output["firstName"])." ".ucfirst($output["lastName"]);
        $response["school"]  = ucfirst($output["faculty"]);
        $response["departnment"] = ucfirst($output["department"]);
        

    }
}
catch(PDOException $e) {
    
    echo $e;
}

//Split

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
        
        array_push($response["highest_qualification_obtained"],$temp);
    
        
    }
    
    
}
catch(PDOException $e) {
    
    echo $e;
}

//split

$sql= "SELECT * FROM `researcharea_details` WHERE `user_ID` = :user_ID";

try {
    
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
    
    $query->execute();
    
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    
    foreach($result as $output) {
        
        $temp=array();
        
        $temp['area'] = htmlentities($output['area']);
        $temp['category'] = htmlentities($output['category']);
        
        array_push($response["research_areas"],$temp);
     
        
    }
    
    
}
catch(PDOException $e) {
    
    echo $e;
}

//split

$sql= "SELECT * FROM `membership` WHERE `user_ID` = :user_ID";

try {
    
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
    
    $query->execute();
    
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    
    
    foreach($result as $output) {
        
        $temp=array();
        
        $temp['name'] = htmlentities($output['name']);
        $temp['memberType'] = htmlentities($output['memberType']);
        $temp['startDate'] = htmlentities($output['startDate']);
        $temp['endDate'] = htmlentities($output['endDate']);
        $temp['position'] = htmlentities($output['position']);
        $temp['appointmentStart'] = htmlentities($output['appointmentStart']);
        $temp['appointmentEnd'] = htmlentities($output['appointmentEnd']);
        
        array_push($response["professional_bodies_association_membership"],$temp);
        
    }
    
    
}
catch(PDOException $e) {
    
    echo $e;
}

//split

$sql= "SELECT * FROM `awards` WHERE `user_ID` = :user_ID";

try {
    
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
    
    $query->execute();
    
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    $x=1;
    
    foreach($result as $output) {
        
        $temp=array();
        
        $temp['awardName'] = htmlentities($output['awardName']);
        $temp['conferringBody'] = htmlentities($output['conferringBody']);
        $temp['awardType'] = htmlentities($output['awardType']);
        $temp['awardDetails'] = htmlentities($output['awardDetails']);

        array_push($response["awards_fellowship_scholarship"],$temp);
       
        
    }
    
    
}
catch(PDOException $e) {
    
    echo $e;
}

//split

$sql= "SELECT * FROM `training` WHERE `user_ID` = :user_ID";

try {
    
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
    
    $query->execute();
    
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
   
    
    foreach($result as $output) {
        
        $temp=array();
        
        $temp['programmeName'] = htmlentities($output['programmeName']);
        $temp['institute_location'] = htmlentities($output['institute_location']);
        $temp['startDate'] = htmlentities($output['startDate']);
        $temp['endDate'] = htmlentities($output['endDate']);
        $temp['leaveType'] = htmlentities($output['leaveType']);
        
        array_push($response["training_short_term_course_reseach_activity"],$temp);
        
    }
    
    
}
catch(PDOException $e) {
    
    echo $e;
}

//split

$sql= "SELECT * FROM `research_activities` WHERE `user_ID` = :user_ID";

try {
    
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
    
    $query->execute();
    
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    
    foreach($result as $output) {
        
        $temp=array();
        
        $temp['researchTitle'] = htmlentities($output['researchTitle']);
        $temp['country'] = htmlentities($output['country']);
        $temp['collabName'] = htmlentities($output['collabName']);
        $temp['position'] = htmlentities($output['position']);
        $temp['moa_loa'] = htmlentities($output['moa_loa']);
        $temp['fundingBody'] = htmlentities($output['fundingBody']);
        $temp['fundingAmount'] = htmlentities($output['fundingAmount']);
        $temp['startDate'] = htmlentities($output['startDate']);
        $temp['endDate'] = htmlentities($output['endDate']);
        
        array_push($response["individual_and_collaborative_research_activity"],$temp);
        
    }
    
    
}
catch(PDOException $e) {
    
    echo $e;
}

//split

$sql= "SELECT * FROM `projects` WHERE `user_ID` = :user_ID";

try {
    
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
    
    $query->execute();
    
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    
    foreach($result as $output) {
        
        $temp=array();
        
        $temp['projName'] = htmlentities($output['projName']);
        $temp['communityName'] = htmlentities($output['communityName']);
        $temp['relatedProj'] = htmlentities($output['relatedProj']);
        $temp['organizer'] = htmlentities($output['organizer']);
        $temp['sponsorship'] = htmlentities($output['sponsorship']);
        $temp['description'] = htmlentities($output['description']);
        $temp['startDate'] = htmlentities($output['startDate']);
        $temp['$endDate'] = htmlentities($output['endDate']);
        
        array_push($response["knowledge_technolog_diffusion_projects"],$temp);
        
      
    }
    
    
}
catch(PDOException $e) {
    
    echo $e;
}

//split

$sql= "SELECT * FROM `journals` WHERE `user_ID` = :user_ID";

try {
    
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
    
    $query->execute();
    
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    
    foreach($result as $output) {
        
        $temp=array();
        
        $temp['authors'] = htmlentities($output['authors']);
        $temp['publicationTitle'] = htmlentities($output['publicationTitle']);
        $temp['journalName'] = htmlentities($output['journalName']);
        $temp['issueVol'] = htmlentities($output['issueVol']);
        $temp['startPage'] = htmlentities($output['startPage']);
        $temp['endPage'] = htmlentities($output['endPage']);
        $temp['issn'] = htmlentities($output['issn']);
        $temp['url'] = htmlentities($output['url']);
        
        array_push($response["journal"],$temp);
        
    }
    
    
}
catch(PDOException $e) {
    
    echo $e;
}

//split

$sql= "SELECT * FROM `proceedings` WHERE `user_ID` = :user_ID";

try {
    
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
    
    $query->execute();
    
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    
    foreach($result as $output) {
        
        $temp=array();
        
        $temp['authors'] =  htmlentities($output['authors']);
        $temp['paperTitle'] =  htmlentities($output['paperTitle']);
        $temp['proceedingsTitle'] =  htmlentities($output['proceedingsTitle']);
        $temp['issueVol'] =  htmlentities($output['issueVol']);
        $temp['pageNo'] =  htmlentities($output['pageNo']);
        $temp['articleID'] =  htmlentities($output['articleID']);
        $temp['url'] =  htmlentities($output['url']);
        $temp['issn_ibsn'] =  htmlentities($output['issn_ibsn']);
        
        array_push($response["proceedings"],$temp);
        

    }
    

    
    
}
catch(PDOException $e) {
    
    echo $e;
}

//split

$sql= "SELECT * FROM `books-chaps` WHERE `user_ID` = :user_ID";

try {
    
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
    
    $query->execute();
    
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    
    
    foreach($result as $output) {
        
        $temp=array();
        
        $temp['authors'] = htmlentities($output['authors']);
        $temp['chapTitle'] = htmlentities($output['chapTitle']);
        $temp['bookTitle'] = htmlentities($output['bookTitle']);
        $temp['bookEditor'] = htmlentities($output['bookEditor']);
        $temp['publisher'] = htmlentities($output['publisher']);
        $temp['isbn_no'] = htmlentities($output['isbn_no']);
        $temp['pageStart'] = htmlentities($output['pageStart']);
        $temp['pageEnd'] =  htmlentities($output['pageEnd']);
        $temp['otherInfo_url'] = htmlentities($output['otherInfo_url']);
        
        array_push($response["books"],$temp);
        
    }
    
    
}
catch(PDOException $e) {
    
    echo $e;
}

//split

$sql= "SELECT * FROM `other_publications` WHERE `user_ID` = :user_ID";

try {
    
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
    
    $query->execute();
    
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    

    foreach($result as $output) {
        
        $temp=array();
        
        $temp['authors'] = htmlentities($output['authors']);
        $temp['docType'] = htmlentities($output['docType']);
        $temp['articleTitle'] = htmlentities($output['articleTitle']);
        $temp['sourceName'] = htmlentities($output['sourceName']);
        $temp['vol'] = htmlentities($output['vol']);
        $temp['pageNo'] = htmlentities($output['pageNo']);
        $temp['url'] = htmlentities($output['url']);
        $temp['issn_ibsn'] = htmlentities($output['issn_ibsn']);
        
        array_push($response["publication"],$temp);
        
    }
    
    //$pdf->morepagestable($data_entry4,20);
}
catch(PDOException $e) {
    
    echo $e;
}

//split

$sql= "SELECT * FROM `patents` WHERE `user_ID` = :user_ID";

try {
    
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
    
    $query->execute();
    
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($result as $output) {
        
        $temp=array();
        
        $temp['patentID'] = htmlentities($output['patentID']);
        $temp['yearGranted'] = htmlentities($output['yearGranted']);
        $temp['investors'] = htmlentities($output['investors']);
        $temp['patentName'] = htmlentities($output['patentName']);
        $temp['countryFiled'] = htmlentities($output['countryFiled']);
        $temp['dateFiled'] = htmlentities($output['dateFiled']);
        $temp['dateGranted'] = htmlentities($output['dateGranted']);
        $temp['dateObtainCert'] = htmlentities($output['dateObtainCert']);
        $temp['expiryDate'] = htmlentities($output['expiryDate']);
        $temp['status'] = htmlentities($output['status']);
        
        array_push($response["patent"],$temp);
        
    }
    
    //        $pdf->morepagestable($data_entry6,20);
}
catch(PDOException $e) {
    
    echo $e;
}

//split

$sql= "SELECT * FROM `ips` WHERE `user_ID` = :user_ID";

try {
    
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
    
    $query->execute();
    
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($result as $output) {
        
        $temp=array();
        
        $temp['nameIP'] = htmlentities($output['nameIP']);
        $temp['IPtype'] = htmlentities($output['IPtype']);
        $temp['creators'] = htmlentities($output['creators']);
        $temp['dateReg'] = htmlentities($output['dateReg']);
        $temp['refNo'] = htmlentities($output['refNo']);
        
        array_push($response["other_ips"],$temp);

    }
    
    
}
catch(PDOException $e) {
    
    echo $e;
}

echo json_encode($response);

?>
