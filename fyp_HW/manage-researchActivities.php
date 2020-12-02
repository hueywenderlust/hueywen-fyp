<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 21/10/2018
 * Time: 2:36 AM
 */


session_start();
include('inc/config.php');

$research_id = "";
$researchTitle = "";
$country = "";
$collabName = "";
$position = "";
$moa_loa = "";
$fundingBody = "";
$fundingAmount = "";
$startDate = "";
$endDate = "";

if(isset($_GET['id'])){ // Check if $_GET exists , this is to obtain the ID of the journal we need to update.

    $id = $_GET['id'];
    $user_ID = $_SESSION['user_ID'];


    //Obtain original Data

    $sql= "SELECT * FROM `research_activities` WHERE id = :id AND user_ID = :user_ID"; // Ensure the id matches with the user_ID

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if (count($result)==0){ // if no such data

            echo "<script>alert('Record does not exists !')</script>";
            echo "<script>window.location='dashboard.php'</script>";
        }

        foreach($result as $output) {

            $research_id = $output["id"];
            $researchTitle = $output["researchTitle"];
            $country = $output["country"];
            $collabName = $output["collabName"];
            $position = $output["position"];
            $moa_loa = $output["moa_loa"];
            $fundingBody = $output["fundingBody"];
            $fundingAmount = $output["fundingAmount"];
            $startDate =$output["startDate"];
            $endDate = $output["endDate"];

        }
    }
    catch(PDOException $e)
    {
        echo "<script>alert('Database Error ! Please contact admin !')</script>";
        echo "<script>window.location='dashboard.php'</script>";


    }




}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sun-U Experts</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" rel="stylesheet">


    <link rel="icon" type="image/png" href="assets/assets-login/images/icons/sunway.ico"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">


    <style>
        .container {
            max-width: 960px;
        }

        .border-top { border-top: 1px solid #e5e5e5; }
        .border-bottom { border-bottom: 1px solid #e5e5e5; }
        .border-top-gray { border-top-color: #adb5bd; }

        .box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }

        .lh-condensed { line-height: 1.25; }
    </style>
</head>

<body class="bg-light">

<div class="container">
    <div class="container">
        <br><br>
        <a class="btn btn-secondary" href="view-research-activities-details.php" role="button"><i class="fas fa-chevron-left"></i> Back</a> <br><br>
    </div>

    <hr >

    <div class="row">
        <div class="col-md-12 order-md-1">
            <br>
            <h2 class="mb-3">Research Activities Details</h2>

               <div class="mb-3">
                    <label for="research_id">Research ID</label>
                        <input type="text" class="form-control" id="researchId" placeholder="" value="<?php echo $research_id;?>"  disabled>
                </div>

                <div class="mb-3">
                    <label for="researchTitle">Title of Research / Programme <font color='red'><b>*</b></font></label>
                        <input type="text" class="form-control" id="researchTitle" placeholder="" value="<?php echo $researchTitle;?>" >

                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="country"> Country <font color='red'><b>*</b></font></label>
                        <input type="text" class="form-control" id="country" placeholder="" value="<?php echo $country;?>" >

                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="position">Position <font color='red'><b>*</b></font></label>
                        <!--                    <input type="text" class="form-control" id="position" placeholder="" value = "--><?php //echo $position;?><!--" >-->
                        <select class="custom-select" id="position">
                            <option selected><?php echo $position;?></option>
                            <option>Leader</option>
                            <option>Member</option>
                        </select>

                    </div>

                </div>


                <div class="mb-3">
                    <label for="collabName">Collaborator's Name and Institution <font color='red'><b>*</b></font></label>
                    <input type="text" class="form-control" id="collabName" placeholder="" value = "<?php echo $collabName;?>" >

                </div>



                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="moa_loa">Name of MoA / LoA <font color='red'><b>*</b></font></label>
                        <input type="text" class="form-control" id="moa_loa" placeholder="" value ="<?php echo $moa_loa;?>" >
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="fundingBody">Funding Body <font color='red'><b>*</b></font></label>
                        <input type="text" class="form-control" id="fundingBody" placeholder="" value ="<?php echo $fundingBody;?>" >
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="fundingAmount">Funding Amount <font color='red'><b>*</b></font></label>
                        <input type="text" class="form-control" id="fundingAmount" placeholder="" value ="<?php echo $fundingAmount;?>" >
                    </div>

                </div>



                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="startDate">Start Date <font color='red'><b>*</b></font></label>
                        <input type="date" class="form-control" id="startDate" placeholder="" value ="<?php echo $startDate;?>" required>

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="endDate">End Date <font color='red'><b>*</b></font></label>
                        <input type="date" class="form-control" id="endDate" placeholder="" value ="<?php echo $endDate;?>" >
                    </div>
                </div>


                <hr class="mb-4">
                <button class="btn btn-danger btn-md" id = "deleteButton"><i class="far fa-trash-alt"></i> Delete Record</button>

                <button class="btn btn-primary btn-md float-right" id = "updateButton" > <i class="far fa-edit"></i> Update Record</button>

            </form>

            <br><br><br>

        </div>
    </div>

    <footer class="bottom">
        <section class="footer-section float-right">
            SunU Experts | 2018 &copy hueywen  &nbsp;
        </section>
    </footer>

    <style>
        .footer-section {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: darkslategrey;
            color: white;
            text-align: right;
    </style>

</div>

<!-- Bootstrap core JavaScript
================================================== -->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>


$(document).ready(function(){

    $("#updateButton").click(function(){

		var id = '<?php echo $research_id?>';
    	var researchTitle = $("#researchTitle").val();
    	var country = $("#country").val();
    	var collabName = $("#collabName").val();
    	var position = $("#position").val();
    	var moa_loa = $("#moa_loa").val();
    	var fundingBody = $("#fundingBody").val();
    	var fundingAmount = $("#fundingAmount").val();
    	var startDate = $("#startDate").val();
        var endDate = $("#endDate").val();
    	var operation = "update";

    	if(researchTitle.trim() == "" ||
            country.trim() == "" ||
            collabName.trim() == "" ||
            position.trim() == "" ||
            moa_loa.trim() == "" ||
            fundingBody.trim() == "" ||
            fundingAmount.trim() == "" ||
            startDate.trim() == "" ||
            endDate.trim() == ""
    		 ){

			alert("Please fill up all required field(s) marked with *.");
		}

    	 var fd = new FormData();
    	 fd.append('id',id);
    	 fd.append('researchTitle',researchTitle);
    	 fd.append('country',country);
    	 fd.append('collabName',collabName);
    	 fd.append('position',position);
    	 fd.append('moa_loa',moa_loa);
    	 fd.append('fundingBody',fundingBody);
    	 fd.append('fundingAmount',fundingAmount);
    	 fd.append('startDate',startDate);
         fd.append('endDate',endDate);
    	 fd.append('operation',operation);

    	 if (confirm('Are you sure you want to update this Record ?')) {
    		    // Save it!
    		} else {
    		    return false;
    		}

        $.ajax({
            url: 'manage-researchActivities-process.php',
            type: 'POST',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){


            	if(response=="1"){

            		alert("Record Updated.");
            		window.location.href = "view-research-activities-details.php";

            	}

            	if(response=="0"){

            		alert("Record Fail to update.");

            	}

            	if(response=="2"){

            		alert("Could not connect to server.");

            	}



            },
        });
    });
});




</script>

<script>


$(document).ready(function(){

    $("#deleteButton").click(function(){


		 var id = '<?php echo $research_id?>';
		 var operation = "delete";


         var fd = new FormData();
    	 fd.append('id',id);
    	 fd.append('operation',operation);

    	 if (confirm('Are you sure you want to delete this journal ?')) {
    		    // Save it!
    		} else {
    		    return false;
    		}

        $.ajax({
            url: 'manage-researchActivities-process.php',
            type: 'POST',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){


            	if(response=="1"){

            		alert("Record Deleted.");
            		window.location.href = "view-research-activities-details.php";

            	}

            	if(response=="0"){

            		alert("Record Failed to add.");

            	}

            	if(response=="2"){

            		alert("Could not connect to server.");

            	}



            },
        });
    });
});




</script>
</body>
</html>
