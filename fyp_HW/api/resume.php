<?php

    
    //$user_ID = '100001';
    
    $user_ID = $user_id;
    
    require('morepagestable.php');
    
    //DB Info
    

    //DB Info
    
    
    
    $pdf = new PDF('P','pt');
    
    $pdf->AddPage("P",false);
    
    $pdf->SetFont('Arial','',9);
    
    // $pdf->Ln();
    
    
    $array_user_info = array();
    
    $sql= "SELECT * FROM `tbl_staffs` WHERE `StaffId` = :user_ID";
    
    try {
        
        $query = $dbh->prepare($sql);
        
        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
        
        $query->execute();
        
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($result as $output) {
            
            $fullName = ucfirst($output["firstName"])." ".ucfirst($output["lastName"]);
            $dob = ucfirst($output["dob"]);
            $email = $output["email"];
            $nationality = $output["nationality"];
            
            $A = "Full Name: ".$fullName;
            $B = "Date of Birth: ".$dob;
            $C = "Email: ".$email;
            $D = "Nationality: ".$nationality;
            
            array_push($array_user_info, $A);
            array_push($array_user_info, $B);
            array_push($array_user_info, $C);
            array_push($array_user_info, $D);
            
            
            
        }
    }
    catch(PDOException $e) {
        
        
    }
    
    $value = $pdf->GetY();
    
    $pdf->SetY($value+20);
    
    
    foreach($array_user_info as $entry){
        
        $pdf->Cell(40,10,$entry);
        
        $value = $pdf->GetY();
        
        $pdf->SetY($value+20);
        
    }
    
    $new_page = false;
    
    
    
    if($pdf->GetY()>330){
        
        $pdf->AddPage("P",false);
        $new_page = false;
    }
    
    
    //profile summary
    
    $array_user_info = array();
    
    $sql= "SELECT * FROM `tbl_staffs` WHERE `StaffId` = :user_ID";
    
    try {
        
        $query = $dbh->prepare($sql);
        
        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
        
        $query->execute();
        
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        

        
        foreach($result as $output) {
            
            $summary = ucfirst($output["summary"]);
            
            
            $summary = "Profile Summary: ".$summary;
            
            array_push($array_user_info, $summary);
            
            
            
        }
    }
    catch(PDOException $e) {
        
        
    }
    
    
    
    
    foreach($array_user_info as $entry){
        
        $nb=$pdf->WordWrap($entry,700);
        
        $pdf->Write(15,$entry);
        
    }
    
    $value = $pdf->GetY();
    
    $pdf->SetY($value+20);
    
    $new_page = false;
    
    
    
    if($pdf->GetY()>330){
        
        $pdf->AddPage("P",false);
        $new_page = false;
    }
    
    
    //Education Starts
    
    $pdf->SetFont('Arial','B',15);
    
    $value = $pdf->GetY();
    
    $pdf->SetY($value+5);
    
    $pdf->Cell(40,10,"Education Details");
    
    $pdf->SetFont('Arial','',9);
    
    $value = $pdf->GetY();
    
    $pdf->SetY($value+25);
    
    $pdf->tablewidths = array(20,140, 145, 145, 50, 50);
    
    $data[] = array("No.","Level","Degree Name","Year","Institution","Country");
    
    $pdf->morepagestable($data,20);
    
    
    $sql= "SELECT * FROM `eduDetails` WHERE `user_ID` = :user_ID";
    
    try {
        
        $query = $dbh->prepare($sql);
        
        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
        
        $query->execute();
        
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $x=1;
        
        foreach($result as $output) {
            
            $eduLevel = htmlentities($output['eduLevel']);
            $degreeName = htmlentities($output['degreeName']);
            $memberRegNo = htmlentities($output['memberRegNo']);
            $year = htmlentities($output['year']);
            $institute = htmlentities($output['institute']);
            $country = htmlentities($output['country']);
            
            
            $data_entry[] = array($x,$eduLevel,$degreeName,$year,$institute,$country);
            
            
            unset($pdf_check);
            $pdf_check = clone $pdf;
            $pdf_check->morepagestable($data_entry,20);
            
            //         echo $pdf_check->GetY();
            
            //         echo "<br>";
            
            if($pdf_check->GetY()>440){
                
                
                $pdf->AddPage("L",false);
                $pdf->morepagestable($data,20);
                $new_page = true;
            }
            
            $pdf->morepagestable($data_entry,20);
            
            $data_entry = array();
            
            $x++;
            
        }
        
        
    }
    catch(PDOException $e) {
        
        echo $e;
    }
    
    // edu Ends
    
    $value = $pdf->GetY();
    
    $pdf->SetY($value+20);
    
    // start workingxp
    
    if($pdf->GetY()>500){
        
        $pdf->AddPage("P",false);
        $new_page = false;
    }
    
    //Education Starts
    
    $pdf->SetFont('Arial','B',15);
    
    $value = $pdf->GetY();
    
    $pdf->SetY($value+5);
    
    $pdf->Cell(40,10,"Working History");
    
    $pdf->SetFont('Arial','',9);
    
    $value = $pdf->GetY();
    
    $pdf->SetY($value+25);
    
    $pdf->tablewidths = array(20, 125, 125, 80, 200);
    
    $data2[] = array("No.","Position","Company Name","Duration","Description");
    
    $pdf->morepagestable($data2,20);
    
    
    $sql= "SELECT * FROM `workingXP` WHERE `user_ID` = :user_ID";
    
    try {
        
        $query = $dbh->prepare($sql);
        
        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
        
        $query->execute();
        
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $x=1;
        
        foreach($result as $output) {
            
            $jobPosition = htmlentities($output['jobPosition']);
            $company = htmlentities($output['company']);
            $duration = htmlentities($output['startYear']." to ".htmlentities($output['endYear']));
            $description = htmlentities($output['description']);
            
            
            $data_entry2[] = array($x,$jobPosition,$company,$duration,$description);
            
            
            unset($pdf_check);
            $pdf_check = clone $pdf;
            $pdf_check->morepagestable($data_entry2,20);
            
            //         echo $pdf_check->GetY();
            
            //         echo "<br>";
            
            if($pdf_check->GetY()>550){
                
                
                $pdf->AddPage("P",false);
                $pdf->morepagestable($data2,20);
                $new_page = true;
            }
            
            $pdf->morepagestable($data_entry2,20);
            
            $data_entry2 = array();
            
            $x++;
            
        }
        
        
    }
    catch(PDOException $e) {
        
        echo $e;
    }
    
    // workingXp Ends
    
    //    if($pdf->GetY()>330){
    //
    //        $pdf->AddPage("P",false);
    //        $new_page = false;
    //    }
    
    
    
    
    
    $pdf->Output();
    
    




?>