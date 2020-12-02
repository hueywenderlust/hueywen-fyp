<?php

include('../inc/config.php');

// $_GET['id'] = "100001";

$staff_id = $_GET['id'];

//Personal Detail

$sql= "SELECT * FROM `tbl_staffs` WHERE `StaffId` = :id"; // Ensure the id matches with the user_ID

try {
    
    $query = $dbh->prepare($sql);
    $query->bindParam(':id',$staff_id,PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    if (count($result)==0){ // if no such data
        echo "No Data";
        exit();
    }
    

    foreach($result as $output) {
        $fullname = $output["firstName"]." ".$output["lastName"];
        $email = $output["email"];
        $position = $output["position"];
        $department = $output["department"];
        $faculty = $output["faculty"];
        $summary = $output["summary"];
        $profile_picture = $output["profile_picture"];
        
        $image = "assets/img/img-profile.jpg";
        
        if(strcasecmp($profile_picture,"")==0 || strcasecmp($profile_picture,"none")==0){
            $image = "assets/img/img-profile.jpg";
        } else {
            $image = "../".$profile_picture;
        }
    }
}
catch(PDOException $e) {
    echo $e;
}

function check($number){
    if($number % 2 == 0){
        return "Even";
    } else{
        return "Odd";
    }
} 


//education
$record_list = array();

// $R1 = array();
// $R1['type']="Education";
// $R1['table_name']="eduDetails";
// $R1['table_column']="eduLevel,degreeName,year,institute,country";
// $R1['display_column']="Level, Name, Duration, Institution, Country";
// array_push($record_list,$R1);


//research area
$record_list2 = array();

$R2 = array();
$R2['type']="Research Area";
$R2['table_name']="researcharea_details";
$R2['table_column']="area,category";
$R2['display_column']="Area,Category";
array_push($record_list,$R2);

//awards
$record_list3 = array();

$R3 = array();
$R3['type']="Awards";
$R3['table_name']="awards";
$R3['table_column']="awardName,awardType,awardDetails";
$R3['display_column']="Award Name,Award Type,Award Details";
array_push($record_list,$R3);


//projects
$record_list4 = array();

$R4 = array();
$R4['type']="Projects";
$R4['table_name']="projects";
$R4['table_column']="projName,description";
$R4['display_column']="Project Name,Description";
array_push($record_list,$R4);


//research activities
$record_list5 = array();

$R5 = array();
$R5['type']="Research Activities";
$R5['table_name']="research_activities";
$R5['table_column']="researchTitle,fundingBody,country";
$R5['display_column']="Research Title,Funding Body,Country";
array_push($record_list,$R5);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- web-fonts -->
    <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">

    <link rel="icon" type="image/png" href="../assets/assets-login/images/icons/sunway.ico"/>


    <!-- font-awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- owl carousal -->
    <link href="assets/css/owl.carousel.css" rel="stylesheet">

    <!-- Style CSS -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <![endif]-->
</head>
<body>


<div id="main-wrapper">
    <!-- Page Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>

    <header class="header">
        <div class="container">
            <button onclick="history.back();" type="button" class="btn btn-warning">
                Back
            </button>

            <br><br><br>
            <div class="row">
                <div class="col-md-3">
                    <div class="profile-img">
                        <img src="<?php echo $image?>" class="img-responsive" alt=""/>
                    </div>
                    <!-- Profile Image -->
                </div>
                <div class="col-md-9">
                    <div class="name-wrapper">
                        <h1 class="name"><?php echo $fullname?></h1>
                        <span><?php echo $position ?> at <?php echo $faculty?></span>
                    </div>
                    <p>
                        <?php echo $summary ?>
                    </p>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="personal-details">
                                <small>Email</small>
                                <strong><?php echo $email ?></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- .header-->

      <section class="section-education section-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="section-title"><h2>Education</h2></div>
                </div>

                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                        
                        <?php 
                        //Education obtain for database start
                        
                        $sql= "SELECT * FROM `eduDetails` WHERE `user_ID` = :id"; // Ensure the id matches with the user_ID
                        
                        try {
                            
                            $query = $dbh->prepare($sql);
                            
                            $query->bindParam(':id',$staff_id,PDO::PARAM_STR);
    
                            $query->execute();
                            
                            $result = $query->fetchAll(PDO::FETCH_ASSOC);
                            
                            if (count($result)==0){ // if no such data
                                
                               
                            }
                            
                            
                            foreach($result as $output) {
                                
                                $year = $output["year"];
                                $degree = $output["degreeName"];
                                $level = $output["eduLevel"];
                                $institute = ucfirst($output["institute"]);
                                $country = ucfirst($output["country"]);
                                
                                echo"

                                <div class='content-item'>
                                <small>$year</small>
                                <h3>$level - $degree</h3>
                                <h4>$institute , $country</h4>
                                </div>

                                ";

                                
                            }
                        }
                        catch(PDOException $e)
                        {
                            
                            echo $e;
                        }
                        
                        
                        //Education obtain for database end
                        ?>
                            <!-- .experience-item -->
                        </div>
                    </div>
                    <!--.row-->
                </div>

            </div>
            <!--.row-->
        </div>
        <!-- .container -->
    </section>
    <!-- .section-education -->

	<?php 
	
	foreach ($record_list as $record){
	    
	    $record_title = $record['type'];
	    
	    
	    $table_name = $record['table_name'];
	    $column_name_array = explode(",",$record['table_column']);
	    $column_name_display = explode(",",$record['display_column']);
	    
	    
	    echo"

        <section class='expertise-wrapper section-wrapper'>
        <div class='container'>
        <div class='row'>
        <div class='col-md-3'>
        <div class='section-title'>
        <h2>$record_title</h2>
        </div>
        </div>
        
        <div class='col-md-9'>
        <div class='row'>
        ";
	    
	    //Obtain work from database start
	    
	    $sql= "SELECT * FROM `$table_name` WHERE `user_ID` = :id"; // Ensure the id matches with the user_ID
	    
	    try {
	        
	        $query = $dbh->prepare($sql);
	        
	        $query->bindParam(':id',$staff_id,PDO::PARAM_STR);
	        
	        $query->execute();
	        
	        $result = $query->fetchAll(PDO::FETCH_ASSOC);
	        
	        if (count($result)==0){ // if no such data
	            
	            
	        }
	        
	        
	        foreach($result as $output) {
	            
	            //$year = $output["year"];
	            
	           
	            
	            $title = $output[$column_name_array[0]];
	            $title = str_replace("_"," ",$title);
	            
	            $x=0;
	            $y=0;
	            
	            $description = "";
                
	            foreach ($column_name_array as $column_data){
	                
	                
	                
	                if($y!=0){
	                    
	                    $entry = $output[$column_data];
	                    
	                    $description = $description."<p>".$column_name_display[$y].": ".$entry."</p>";
	                }
	                
	                $y++;
	                
	                
	                
	            }
	                
	                if(strcasecmp(check($x),"Even")==0){
	                    
	                    echo"

                        
             			<div class='col-md-6'>
                            <div class='expertise-item'>
                                <h3>$title</h3>

                                $description
                            </div>
                        </div>

                        ";
	                    
	                    
	                }
	                
	                if(strcasecmp(check($x),"Odd")==0){
	                    
	                    echo"

                        <div class='col-md-6'>
                                <div class='expertise-item'>
                                    <h3>$title</h3>
    
                                    $description
                                </div>
                            </div>
                        </div>
                        ";
	                    
	                }
	                
	                $x++;
	                
	                
	            }
	            
	            
	        //}
	    }
	    catch(PDOException $e)
	    {
	        
	        echo $e;
	    }
	    
	    
	    //Obtain work from database end
	    
	    echo"
        </div>
        </div>   
        </div>
        </section>
    
        ";
	    
	    
	}
	
	echo"
	
        <section class='expertise-wrapper section-wrapper'>
        <div class='container'>
        <div class='row'>
        <div class='col-md-3'>
        <div class='section-title'>
        <h2>References</h2>
        </div>
        </div>
        
        <div class='col-md-9'>
        <div class='row'>
        ";
	
	//BibText Start
	
	$user_ID = $staff_id;
	
	$output = "";
	
	//Article start
	
	
	$sql= "SELECT * FROM `journals` WHERE `user_ID` = :user_ID";
	
	try {
	    
	    $query = $dbh->prepare($sql);
	    
	    $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
	    
	    $query->execute();
	    
	    $result = $query->fetchAll(PDO::FETCH_ASSOC);
	    
	    
	    foreach($result as $data) {
	        
	        $authors = htmlentities($data['authors']);
	        $publicationTitle = htmlentities($data['publicationTitle']);
	        $journalName = htmlentities($data['journalName']);
	        $issueVol = htmlentities($data['issueVol']);
	        $startPage = htmlentities($data['startPage']);
	        $endPage = htmlentities($data['endPage']);
	        $issn = htmlentities($data['issn']);
	        $url = htmlentities($data['url']);
	        //                $year = htmlentities($data['year']);
	        
	        
	        $output .= "@article{";
	        $output .= "\tauthor={".$authors."},\n";
	        $output .= "\ttitle={".$publicationTitle."},\n";
	        $output .= "\tjournal={".$journalName."},\n";
	        $output .= "\tyear={"."2017"."},\n";
	        $output .= "\tvolume={".$issueVol."},\n";
	        $output .= "\tpages={".$startPage."-".$endPage."},\n";
	        $output .= "\n}\n";
	        
	    }
	}
	catch(PDOException $e) {
	    
	    echo $e;
	}
	
	//Article ends
	
	//Books-Chapters
	$sql= "SELECT * FROM `books-chaps` WHERE `user_ID` = :user_ID";
	
	try {
	    
	    $query = $dbh->prepare($sql);
	    
	    $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
	    
	    $query->execute();
	    
	    $result = $query->fetchAll(PDO::FETCH_ASSOC);
	    
	    
	    foreach($result as $data) {
	        
	        $authors = htmlentities($data['authors']);
	        $chapTitle = htmlentities($data['chapTitle']);
	        $bookTitle = htmlentities($data['bookTitle']);
	        $bookEditor = htmlentities($data['bookEditor']);
	        $publisher = htmlentities($data['publisher']);
	        $isbn_no = htmlentities($data['isbn_no']);
	        $pageStart = htmlentities($data['pageStart']);
	        $pageEnd = htmlentities($data['pageEnd']);
	        $otherInfo_url = htmlentities($data['otherInfo_url']);
	        
	        
	        $output .= "@book{";
	        $output .= "\tauthor={".$authors ."},\n";
	        $output .= "\ttitle={".$chapTitle.$bookTitle."},\n";
	        $output .= "\tpublisher={".$publisher."},\n";
	        $output .= "\tyear={"."2017"."},\n";
	        $output .= "\turl={"."$otherInfo_url"."},\n";
	        $output .= "\n}\n";
	        
	    }
	}
	catch(PDOException $e) {
	    
	    echo $e;
	}
	
	//book ends
	
	
	//proceedings starts
	
	$sql= "SELECT * FROM `proceedings` WHERE `user_ID` = :user_ID";
	
	try {
	    
	    $query = $dbh->prepare($sql);
	    
	    $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
	    
	    $query->execute();
	    
	    $result = $query->fetchAll(PDO::FETCH_ASSOC);
	    
	    
	    foreach($result as $data) {
	        
	        $authors = htmlentities($data['authors']);
	        $paperTitle = htmlentities($data['paperTitle']);
	        $proceedingsTitle = htmlentities($data['proceedingsTitle']);
	        $issueVol = htmlentities($data['issueVol']);
	        $pageNo = htmlentities($data['pageNo']);
	        $articleID = htmlentities($data['articleID']);
	        $url = htmlentities($data['url']);
	        $issn_ibsn = htmlentities($data['issn_ibsn']);
	        
	        
	        $output .= "@proceedings{";
	        $output .= "\tauthor={".$authors."},\n";
	        $output .= "\ttitle={"."$paperTitle"."$proceedingsTitle"."},\n";
	        $output .= "\tyear={"."2017"."},\n";
	        $output .= "\tvol={"."$issueVol"."},\n";
	        $output .= "\n}\n";
	        
	    }
	}
	catch(PDOException $e) {
	    
	    echo $e;
	}
	
	//proceeding ends
	
	
	//publication starts
	$sql= "SELECT * FROM `other_publications` WHERE `user_ID` = :user_ID";
	
	try {
	    
	    $query = $dbh->prepare($sql);
	    
	    $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
	    
	    $query->execute();
	    
	    $result = $query->fetchAll(PDO::FETCH_ASSOC);
	    
	    
	    foreach($result as $data) {
	        
	        $authors = htmlentities($data['authors']);
	        $docType = htmlentities($data['docType']);
	        $articleTitle = htmlentities($data['articleTitle']);
	        $sourceName = htmlentities($data['sourceName']);
	        $vol = htmlentities($data['vol']);
	        $pageNo = htmlentities($data['pageNo']);
	        $url = htmlentities($data['url']);
	        $issn_ibsn = htmlentities($data['issn_ibsn']);
	        
	        
	        $output .= "@publication{";
	        $output .= "\tauthor={".$authors."},\n";
	        $output .= "\ttitle={".$articleTitle."},\n";
	        $output .= "\tyear={"."2017"."},\n";
	        $output .= "\tvolume={"."$vol"."},\n";
	        $output .= "\turl={"."$url"."},\n";
	        $output .= "\n}\n";
	        
	    }
	}
	catch(PDOException $e) {
	    
	    echo $e;
	}
	
	
	
	
	file_put_contents("file.bib", $output);
	
	require_once("bib2html.php");
	
	echo bibfile2html("file.bib");
	
	
	
	//BibText End
	
	echo"
        </div>
        </div>
        </div>
        </section>
        
        ";
	
	
	
	?>

   	

  






    <footer class="footer">
        <div class="copyright-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copytext">&copy; MyProfile, All rights reserved | Design By: <a
                                    href="https://themehippo.com">themehippo</a></div>
                    </div>
                </div>
                <!--.row-->
            </div>
            <!-- .container-fluid -->
        </div>
        <!-- .copyright-section -->
    </footer>
    <!-- .footer -->

</div>
<!-- #main-wrapper -->

<!-- jquery -->
<script src="assets/js/jquery-2.1.4.min.js"></script>
<!-- Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<!--owl carousal-->
<script src="assets/js/owl.carousel.min.js"></script>
<!--theme script-->
<script src="assets/js/scripts.js"></script>
</body>
</html>