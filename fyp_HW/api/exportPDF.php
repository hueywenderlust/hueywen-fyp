<?php

    $value_next_page = 400;
    
    $user_ID = $user_id;

    require('morepagestable.php');

    //DB Info

    



    //DB Info



    $pdf = new PDF('P','pt');

    $pdf->AddPage("L",false);

    $pdf->SetFont('Arial','',9);

    // $pdf->Ln();


    $pdf->Image('images/sunway_logo.jpg',255,10,-100);

    $pdf->SetY(150);

    $pdf->Cell(755,20,'Sunway University Academic Management System',0,0,'C');

    // $pdf->SetY(110);

    $pdf->SetY(160);

    $array_user_info = array();

    $sql= "SELECT * FROM `tbl_staffs` WHERE `StaffID` = :user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if (count($result)==0){ // if no such data

//             echo "<script>alert('Record does not exists!')</script>";
//             echo "<script>window.location='dashboard.php'</script>";
        }

        foreach($result as $output) {


            $fullName = ucfirst($output["firstName"])." ".ucfirst($output["lastName"]);
            $faculty = ucfirst($output["faculty"]);
            $department = ucfirst($output["department"]);

            $A = "Full Name: ".$fullName;
            $B = "School: ".$faculty;
            $C = "Department: ".$department;

            array_push($array_user_info, $A);
            array_push($array_user_info, $B);
            array_push($array_user_info, $C);



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


    //Education Qualification

    $pdf->SetFont('Arial','B',15);

    $value = $pdf->GetY();

    $pdf->SetY($value+5);

    $pdf->Cell(40,10,"Highest Qualification Obtained");

    $pdf->SetFont('Arial','',9);

    $value = $pdf->GetY();

    $pdf->SetY($value+25);

    $pdf->tablewidths = array(20, 150, 150, 160, 90, 120, 90);

    $data2[] = array("No.","Level", "Degree Name","Membership Registration No.","Year","Institution","Country");

    $pdf->morepagestable($data2,20);


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


            $data_entry2[] = array($x,$eduLevel,$degreeName,$memberRegNo,$year,$institute,$country);


            unset($pdf_check);
            $pdf_check = clone $pdf;
            $pdf_check->morepagestable($data_entry2,20);

            //         echo $pdf_check->GetY();

            //         echo "<br>";

            if($pdf_check->GetY()>500){


                $pdf->AddPage("L",false);
                $pdf->morepagestable($data2,20);
                $new_page = true;
            }

            $pdf->morepagestable($data_entry2,20);

            $data_entry2= array();

            $x++;

        }


    }
    catch(PDOException $e) {

        echo $e;
    }

    // Education qualifications Ends

    $value = $pdf->GetY();
    $pdf->SetY($value+20);

    if($pdf->GetY()>$value_next_page){

        $pdf->AddPage("L",false);
        $new_page = false;
    }


    //research area

    $pdf->SetFont('Arial','B',15);

    $value = $pdf->GetY();

    $pdf->SetY($value+5);

    $pdf->Cell(40,10,"Research Areas");

    $pdf->SetFont('Arial','',9);

    $value = $pdf->GetY();

    $pdf->SetY($value+25);

    $pdf->tablewidths = array(20, 450, 310);

    $data3[] = array("No. ","Category", "Sub-areas");

    $pdf->morepagestable($data3,20);


    $sql= "SELECT * FROM `researcharea_details` WHERE `user_ID` = :user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $x=1;

        foreach($result as $output) {

            $area = htmlentities($output['area']);
            $category = htmlentities($output['category']);


            $data_entry3[] = array($x,$category,$area);


            unset($pdf_check);
            $pdf_check = clone $pdf;
            $pdf_check->morepagestable($data_entry3,20);

            //         echo $pdf_check->GetY();

            //         echo "<br>";

            if($pdf_check->GetY()>500){


                $pdf->AddPage("L",false);
                $pdf->morepagestable($data3,20);
                $new_page = true;
            }

            $pdf->morepagestable($data_entry3,20);

            $data_entry3 = array();

            $x++;

        }


    }
    catch(PDOException $e) {

        echo $e;
    }

    //research area end

    $value = $pdf->GetY();
    $pdf->SetY($value+20);

    if($pdf->GetY()>$value_next_page){

        $pdf->AddPage("L",false);
        $new_page = false;
    }



    //membership start

    $pdf->SetFont('Arial','B',15);

    $value = $pdf->GetY();

    $pdf->SetY($value+5);

    $pdf->Cell(40,10,"Professional Bodies / Association Membership");

    $pdf->SetFont('Arial','',9);

    $value = $pdf->GetY();

    $pdf->SetY($value+25);

    $pdf->tablewidths = array(20,210, 100, 70, 70, 90, 110, 110);

    $data4[] = array("No.","Name of Association/Body/Institution/NGOs","Type of Membership","Start Date","End Date","Leadership Position","Appointment Start Date", "Appointment End Date");

    $pdf->morepagestable($data4,20);


    $sql= "SELECT * FROM `membership` WHERE `user_ID` = :user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $x=1;

        foreach($result as $output) {

            $name = htmlentities($output['name']);
            $memberType = htmlentities($output['memberType']);
            $startDate = htmlentities($output['startDate']);
            $endDate = htmlentities($output['endDate']);
            $position = htmlentities($output['position']);
            $appointmentStart = htmlentities($output['appointmentStart']);
            $appointmentEnd = htmlentities($output['appointmentEnd']);

            $data_entry4[] = array($x,$name,$memberType,$startDate,$endDate,$position,$appointmentStart,$appointmentEnd);


            unset($pdf_check);
            $pdf_check = clone $pdf;
            $pdf_check->morepagestable($data_entry4,20);

            //         echo $pdf_check->GetY();

            //         echo "<br>";

            if($pdf_check->GetY()>500){


                $pdf->AddPage("L",false);
                $pdf->morepagestable($data4,20);
                $new_page = true;
            }

            $pdf->morepagestable($data_entry4,20);

            $data_entry4= array();

            $x++;

        }


    }
    catch(PDOException $e) {

        echo $e;
    }

    //  Ends

    $value = $pdf->GetY();
    $pdf->SetY($value+20);

    if($pdf->GetY()>$value_next_page){

        $pdf->AddPage("L",false);
        $new_page = false;
    }


    //awards starts

    $pdf->SetFont('Arial','B',15);

    $value = $pdf->GetY();

    $pdf->SetY($value+5);

    $pdf->Cell(40,10,"Award/Fellowship/Scholarship/Stewardship/Task Force");

    $pdf->SetFont('Arial','',9);

    $value = $pdf->GetY();

    $pdf->SetY($value+25);

    $pdf->tablewidths = array(20, 250, 170, 90, 250);

    $data5[] = array("No.","Name of Award conferred/Committee position appointed","Conferring Body","Type","Details");

    $pdf->morepagestable($data5,20);


    $sql= "SELECT * FROM `awards` WHERE `user_ID` = :user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $x=1;

        foreach($result as $output) {

            $awardName = htmlentities($output['awardName']);
            $conferringBody = htmlentities($output['conferringBody']);
            $awardType = htmlentities($output['awardType']);
            $awardDetails = htmlentities($output['awardDetails']);

            $data_entry5[] = array($x,$awardName,$conferringBody,$awardType,$awardDetails);


            unset($pdf_check);
            $pdf_check = clone $pdf;
            $pdf_check->morepagestable($data_entry5,20);

            //         echo $pdf_check->GetY();

            //         echo "<br>";

            if($pdf_check->GetY()>500){


                $pdf->AddPage("L",false);
                $pdf->morepagestable($data5,20);
                $new_page = true;
            }

            $pdf->morepagestable($data_entry5,20);

            $data_entry5= array();

            $x++;

        }


    }
    catch(PDOException $e) {

        echo $e;
    }

    //  Ends

    $value = $pdf->GetY();
    $pdf->SetY($value+20);

    if($pdf->GetY()>$value_next_page){

        $pdf->AddPage("L",false);
        $new_page = false;
    }

    //training start

    $pdf->SetFont('Arial','B',15);

    $value = $pdf->GetY();

    $pdf->SetY($value+5);

    $pdf->Cell(40,10,"Training/Short-term Professional Course/Research Activities");

    $pdf->SetFont('Arial','',9);

    $value = $pdf->GetY();

    $pdf->SetY($value+25);

    $pdf->tablewidths = array(20,280, 240, 60, 60, 120);

    $data6[] = array("No.","Name of Programme","Institution and Location","Start Date","End Date","Type of Leave Granted");

    $pdf->morepagestable($data6,20);


    $sql= "SELECT * FROM `training` WHERE `user_ID` = :user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $x=1;

        foreach($result as $output) {

            $programmeName = htmlentities($output['programmeName']);
            $institute_location = htmlentities($output['institute_location']);
            $startDate = htmlentities($output['startDate']);
            $endDate = htmlentities($output['endDate']);
            $leaveType = htmlentities($output['leaveType']);

            $data_entry6[] = array($x,$programmeName,$institute_location,$startDate,$endDate,$leaveType);


            unset($pdf_check);
            $pdf_check = clone $pdf;
            $pdf_check->morepagestable($data_entry6,20);

            //         echo $pdf_check->GetY();

            //         echo "<br>";

            if($pdf_check->GetY()>500){


                $pdf->AddPage("L",false);
                $pdf->morepagestable($data6,20);
                $new_page = true;
            }

            $pdf->morepagestable($data_entry6,20);

            $data_entry6 = array();

            $x++;

        }


    }
    catch(PDOException $e) {

        echo $e;
    }

    // training Ends

    $value = $pdf->GetY();
    $pdf->SetY($value+20);


    if($pdf->GetY()>$value_next_page){

        $pdf->AddPage("L",false);
        $new_page = false;
    }

    //research start

    $pdf->SetFont('Arial','B',15);

    $value = $pdf->GetY();

    $pdf->SetY($value+5);

    $pdf->Cell(40,10,"Individual and Collaborative Research Activities");

    $pdf->SetFont('Arial','',9);

    $value = $pdf->GetY();

    $pdf->SetY($value+25);

    $pdf->tablewidths = array(20, 168, 60, 150, 40, 80, 80, 80, 52,52);

    $data7[] = array("No.","Title of Research/Programme","Country","Collaborator's Name and Institution","Position","Name of MoA/LoA","Funding Body","Funding Amount","Start Date", "End Date");

    $pdf->morepagestable($data7,20);


    $sql= "SELECT * FROM `research_activities` WHERE `user_ID` = :user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $x=1;

        foreach($result as $output) {

            $researchTitle = htmlentities($output['researchTitle']);
            $country = htmlentities($output['country']);
            $collabName = htmlentities($output['collabName']);
            $position = htmlentities($output['position']);
            $moa_loa = htmlentities($output['moa_loa']);
            $fundingBody = htmlentities($output['fundingBody']);
            $fundingAmount = htmlentities($output['fundingAmount']);
            $startDate = htmlentities($output['startDate']);
            $endDate = htmlentities($output['endDate']);


            $data_entry7[] = array($x,$researchTitle,$country,$collabName,$position,$moa_loa,$fundingBody,$fundingAmount,$startDate,$endDate);


            unset($pdf_check);
            $pdf_check = clone $pdf;
            $pdf_check->morepagestable($data_entry7,20);

            //         echo $pdf_check->GetY();

            //         echo "<br>";

            if($pdf_check->GetY()>500){


                $pdf->AddPage("L",false);
                $pdf->morepagestable($data7,20);
                $new_page = true;
            }

            $pdf->morepagestable($data_entry7,20);

            $data_entry7= array();

            $x++;

        }


    }
    catch(PDOException $e) {

        echo $e;
    }

    // research Ends

    $value = $pdf->GetY();
    $pdf->SetY($value+20);


    if($pdf->GetY()>$value_next_page){

        $pdf->AddPage("L",false);
        $new_page = false;
    }


    //project starts

    $pdf->SetFont('Arial','B',15);

    $value = $pdf->GetY();

    $pdf->SetY($value+5);

    $pdf->Cell(40,10,"Knowledge Technology Diffusion (Social Innovation) Projects");

    $pdf->SetFont('Arial','',9);

    $value = $pdf->GetY();

    $pdf->SetY($value+25);

    $pdf->tablewidths = array(20, 90, 90, 90, 170, 120, 100, 52, 52);

    $data8[] = array("No.","Project Name","Community Name","Related Project","Organizer/Funder/Sponsor/Collaborator","Value of Sponsorship(RM)","Description","Start Date","End Date");

    $pdf->morepagestable($data8,20);


    $sql= "SELECT * FROM `projects` WHERE `user_ID` = :user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $x=1;

        foreach($result as $output) {

            $projName = htmlentities($output['projName']);
            $communityName = htmlentities($output['communityName']);
            $relatedProj = htmlentities($output['relatedProj']);
            $organizer = htmlentities($output['organizer']);
            $sponsorship = htmlentities($output['sponsorship']);
            $description = htmlentities($output['description']);
            $startDate = htmlentities($output['startDate']);
            $endDate = htmlentities($output['endDate']);

            $data_entry8[] = array($x,$projName,$communityName,$relatedProj,$organizer,$sponsorship,$description,$startDate,$endDate);


            unset($pdf_check);
            $pdf_check = clone $pdf;
            $pdf_check->morepagestable($data_entry8,20);

            //         echo $pdf_check->GetY();

            //         echo "<br>";

            if($pdf_check->GetY()>500){


                $pdf->AddPage("L",false);
                $pdf->morepagestable($data8,20);
                $new_page = true;
            }

            $pdf->morepagestable($data_entry8,20);

            $data_entry8= array();

            $x++;
        }


    }
    catch(PDOException $e) {

        echo $e;
    }

    // project Ends

    $value = $pdf->GetY();
    $pdf->SetY($value+20);


    if($pdf->GetY()>$value_next_page){

        $pdf->AddPage("L",false);
        $new_page = false;
    }

    //Journal Starts

    $pdf->SetFont('Arial','B',15);

    $value = $pdf->GetY();

    $pdf->SetY($value+5);

    $pdf->Cell(40,10,"Journal");

    $pdf->SetFont('Arial','',9);

    $value = $pdf->GetY();

    $pdf->SetY($value+25);

    $pdf->tablewidths = array(20,140, 145, 145, 50, 50, 50, 60, 120);

    $data9[] = array("No.","Author(s)","Title of Publication","Name of Journal","Vol: Issue","Start Page","End Page","ISSN","URL");

    $pdf->morepagestable($data9,20);


    $sql= "SELECT * FROM `journals` WHERE `user_ID` = :user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $x=1;

        foreach($result as $output) {

            $authors = htmlentities($output['authors']);
            $publicationTitle = htmlentities($output['publicationTitle']);
            $journalName = htmlentities($output['journalName']);
            $issueVol = htmlentities($output['issueVol']);
            $startPage = htmlentities($output['startPage']);
            $endPage = htmlentities($output['endPage']);
            $issn = htmlentities($output['issn']);
            $url = htmlentities($output['url']);

            $data_entry9[] = array($x,$authors,$publicationTitle,$journalName,$issueVol,$startPage,$endPage,$issn,$url);


            unset($pdf_check);
            $pdf_check = clone $pdf;
            $pdf_check->morepagestable($data_entry9,20);

            //         echo $pdf_check->GetY();

            //         echo "<br>";

            if($pdf_check->GetY()>500){


                $pdf->AddPage("L",false);
                $pdf->morepagestable($data9,20);
                $new_page = true;
            }

            $pdf->morepagestable($data_entry9,20);

            $data_entry9 = array();

            $x++;

        }


    }
    catch(PDOException $e) {

        echo $e;
    }

    // Journal Ends

    $value = $pdf->GetY();
    $pdf->SetY($value+20);

    if($pdf->GetY()>$value_next_page){

        $pdf->AddPage("L",false);
        $new_page = false;
    }


    //Proceedings Starts

    $pdf->SetFont('Arial','B',15);

    $value = $pdf->GetY();

    $pdf->SetY($value+5);

    $pdf->Cell(40,10,"Proceedings");

    $pdf->SetFont('Arial','',9);

    $value = $pdf->GetY();

    $pdf->SetY($value+25);

    $pdf->tablewidths = array(20, 135, 135, 135, 50, 50, 70, 120, 70);


    $data10[] = array("No.","Author(s)","Paper Title","Title of Proceedings","Vol: Issue","Page No.","Article ID ","URL","ISSN / ISBN");

    $pdf->SetFont('Arial','',9);


    $pdf->morepagestable($data10,20);


    $sql= "SELECT * FROM `proceedings` WHERE `user_ID` = :user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $x=1;

        foreach($result as $output) {

            $authors =  htmlentities($output['authors']);
            $paperTitle =  htmlentities($output['paperTitle']);
            $proceedingsTitle =  htmlentities($output['proceedingsTitle']);
            $issueVol =  htmlentities($output['issueVol']);
            $pageNo =  htmlentities($output['pageNo']);
            $articleID =  htmlentities($output['articleID']);
            $url =  htmlentities($output['url']);
            $issn_ibsn =  htmlentities($output['issn_ibsn']);


            $data_entry10[] = array($x,$authors,$paperTitle,$proceedingsTitle,$issueVol,$pageNo,$articleID,$url,$issn_ibsn);


            unset($pdf_check);
            $pdf_check = clone $pdf;
            $pdf_check->morepagestable($data_entry10,20);

            if($pdf_check->GetY()>500){


                $pdf->AddPage("L",false);
                $pdf->morepagestable($data10,20);
                $new_page = true;
            }

            $pdf->morepagestable($data_entry10,20);

            $data_entry10= array();

            $x++;

        }

        //      echo $pdf->GetY();

        //      echo "<br>";


    }
    catch(PDOException $e) {

        echo $e;
    }
    //Proceedings Ends


    $value = $pdf->GetY();
    $pdf->SetY($value+20);



    if($pdf->GetY()>$value_next_page){

        $pdf->AddPage("L",false);
        $new_page = false;
    }


    //Book Starts

    $pdf->SetFont('Arial','B',15);

    if($new_page==true){

        $value = $pdf->GetY();
        $pdf->SetY($value+50);
    }


    $pdf->Cell(40,10,"Books");

    $pdf->SetFont('Arial','',9);

    $value = $pdf->GetY();

    $pdf->SetY($value+25);

    $pdf->tablewidths = array(20, 110, 110, 110, 90, 90, 50, 50, 50, 110);

    $data11[] = array("No.","Author(s)","Chapter Title","Book Title","Book Editor","Publisher","ISBN No.","Page Start","Page End","Other Info / URL");

    $pdf->morepagestable($data11,20);


    $sql= "SELECT * FROM `books-chaps` WHERE `user_ID` = :user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $x=1;

        foreach($result as $output) {

            $authors = htmlentities($output['authors']);
            $chapTitle = htmlentities($output['chapTitle']);
            $bookTitle = htmlentities($output['bookTitle']);
            $bookEditor = htmlentities($output['bookEditor']);
            $publisher = htmlentities($output['publisher']);
            $isbn_no = htmlentities($output['isbn_no']);
            $pageStart = htmlentities($output['pageStart']);
            $pageEnd =  htmlentities($output['pageEnd']);
            $otherInfo_url = htmlentities($output['otherInfo_url']);


            unset($pdf_check);
            $pdf_check = clone $pdf;
            $pdf_check->morepagestable($data11,20);



            $data_entry11[] = array($x,$authors,$chapTitle,$bookTitle,$bookEditor,$publisher,$isbn_no,$pageStart,$pageEnd,$otherInfo_url);


            if($pdf_check->GetY()>425){


                $pdf->AddPage("L",false);
                $pdf->morepagestable($data11,20);
                $new_page = true;
            }



            $pdf->morepagestable($data_entry11,20);

            $data_entry11= array();

            $x++;

        }

        //$pdf->morepagestable($data_entry3,20);
    }
    catch(PDOException $e) {

        echo $e;
    }
    //Book Ends

    $value = $pdf->GetY();
    $pdf->SetY($value+20);

    if($pdf->GetY()>$value_next_page){

        $pdf->AddPage("L",false);
        $new_page = false;
    }


    //Publication Starts

    $pdf->SetFont('Arial','B',15);



    if($new_page==true){

        $value = $pdf->GetY();
        $pdf->SetY($value+50);
    }



    $pdf->Cell(40,10,"Publications");

    $pdf->SetFont('Arial','',9);

    $value = $pdf->GetY();

    $pdf->SetY($value+25);

    $pdf->tablewidths = array(20, 140, 90, 140, 130, 20, 50, 130, 70 );

    $data12[] = array("No.","Author(s)","Document Type","Article Title","Source Name","Vol","Page No.","URL","ISSN / ISBN");

    $pdf->morepagestable($data12,20);


    $sql= "SELECT * FROM `other_publications` WHERE `user_ID` = :user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $x=1;

        foreach($result as $output) {

            $authors = htmlentities($output['authors']);
            $docType = htmlentities($output['docType']);
            $articleTitle = htmlentities($output['articleTitle']);
            $sourceName = htmlentities($output['sourceName']);
            $vol = htmlentities($output['vol']);
            $pageNo = htmlentities($output['pageNo']);
            $url = htmlentities($output['url']);
            $issn_ibsn = htmlentities($output['issn_ibsn']);

            $data_entry12[] = array($x,$authors,$docType,$articleTitle,$sourceName,$vol,$pageNo,$url,$issn_ibsn);

            unset($pdf_check);
            $pdf_check = clone $pdf;
            $pdf_check->morepagestable($data_entry12,20);

            if($pdf_check->GetY()>425){


                $pdf->AddPage("L",false);
                $pdf->morepagestable($data12,20);
                $new_page = true;
            }



            $pdf->morepagestable($data_entry12,20);

            $data_entry12= array();

            $x++;

        }

        //$pdf->morepagestable($data_entry4,20);
    }
    catch(PDOException $e) {

        echo $e;
    }
    //Publication Ends

    $value = $pdf->GetY();
    $pdf->SetY($value+20);

    if($pdf->GetY()>$value_next_page){

        $pdf->AddPage("L",false);
        $new_page = false;
    }


    ////////////////////////////////

    //patent start
    $pdf->SetFont('Arial','B',15);



    if($new_page==true){

        $value = $pdf->GetY();
        $pdf->SetY($value+50);
    }



    $pdf->Cell(40,10,"Patents");

    $pdf->SetFont('Arial','',9);

    $value = $pdf->GetY();

    $pdf->SetY($value+25);

    $pdf->tablewidths = array(20, 95, 60, 120, 120, 60, 55, 60, 100, 55, 40);

    $data13[] = array("No.","Patent ID (Filling No.)","Year Granted","Investors' Name","Patent Name","Country Filed","Date Filed","Date Granted","Date Obtain Certificate", "Expiry Date", "Status");

    $pdf->morepagestable($data13,20);


    $sql= "SELECT * FROM `patents` WHERE `user_ID` = :user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $x=1;

        foreach($result as $output) {

            $patentID = htmlentities($output['patentID']);
            $yearGranted = htmlentities($output['yearGranted']);
            $investors = htmlentities($output['investors']);
            $patentName = htmlentities($output['patentName']);
            $countryFiled = htmlentities($output['countryFiled']);
            $dateFiled = htmlentities($output['dateFiled']);
            $dateGranted = htmlentities($output['dateGranted']);
            $dateObtainCert = htmlentities($output['dateObtainCert']);
            $expiryDate = htmlentities($output['expiryDate']);
            $status = htmlentities($output['status']);



            $data_entry13[] = array($x,$patentID,$yearGranted,$investors,$patentName,$countryFiled,$dateFiled,$dateGranted,$dateObtainCert,$expiryDate,$status);

            unset($pdf_check);
            $pdf_check = clone $pdf;
            $pdf_check->morepagestable($data_entry13,20);

            if($pdf_check->GetY()>425){


                $pdf->AddPage("L",false);
                $pdf->morepagestable($data13,20);
                $new_page = true;
            }



            $pdf->morepagestable($data_entry13,20);

            $data_entry13= array();

            $x++;

        }

//        $pdf->morepagestable($data_entry6,20);
    }
    catch(PDOException $e) {

        echo $e;
    }
    //patents Ends

    $value = $pdf->GetY();
    $pdf->SetY($value+20);

    if($pdf->GetY()>$value_next_page){

        $pdf->AddPage("L",false);
        $new_page = false;
    }


    //Ip Starts

    $pdf->SetFont('Arial','B',15);


    if($new_page==true){

        $value = $pdf->GetY();

        $pdf->SetY($value+50);
    }



    $pdf->Cell(40,10,"Other IPs");

    $pdf->SetFont('Arial','',9);

    $value = $pdf->GetY();

    $pdf->SetY($value+25);

    $pdf->tablewidths = array(20, 145, 65, 145, 280, 130);

    $data14[] = array("No.","Title of Creation / Name of IP","Type","Creator's Name and Affiliation","Date Registered at the Commissioner of Oath / Other authorisation Body","Document Ref No. / ISBN No.");

    $pdf->morepagestable($data14,12);

    $pdf->SetY($pdf->GetY()+12);


    $sql= "SELECT * FROM `ips` WHERE `user_ID` = :user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $x=1;

        foreach($result as $output) {

            $nameIP = htmlentities($output['nameIP']);
            $IPtype = htmlentities($output['IPtype']);
            $creators = htmlentities($output['creators']);
            $dateReg = htmlentities($output['dateReg']);
            $refNo = htmlentities($output['refNo']);


            $data_entry14[] = array($x,$nameIP,$IPtype,$creators,$dateReg,$refNo,);



            unset($pdf_check);
            $pdf_check = clone $pdf;
            $pdf_check->morepagestable($data_entry14,20);






            if($pdf_check->GetY()>425){


                $pdf->AddPage("L",false);
                $pdf->morepagestable($data14,12);
                $pdf->SetY($pdf->GetY()+24);
                $new_page = true;
            }



            $pdf->morepagestable($data_entry14,20);

            $data_entry14= array();

            $x++;

        }


    }
    catch(PDOException $e) {

        echo $e;
    }
    //Ip Ends

    $pdf->Output();









?>