<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 21/10/2018
 * Time: 2:39 AM
 */



session_start();
include('inc/config.php');

$patent_id = "";
$patentID = "";
$yearGranted = "";
$investors = "";
$patentName = "";
$countryFiled = "";
$dateFiled = "";
$dateGranted = "";
$dateObtainCert = "";
$expiryDate = "";
$status = "";

if(isset($_GET['id'])){ // Check if $_GET exists , this is to obtain the ID of the journal we need to update.

    $id = $_GET['id'];
    $user_ID = $_SESSION['user_ID'];


    //Obtain original Data

    $sql= "SELECT * FROM `patents` WHERE id=:id AND user_ID=:user_ID"; // Ensure the id matches with the user_ID

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

            $patent_id = $output["id"];
            $patentID = $output["patentID"];
            $yearGranted = $output["yearGranted"];
            $investors = $output["investors"];
            $patentName = $output["patentName"];
            $countryFiled = $output["countryFiled"];
            $dateFiled = $output["dateFiled"];
            $dateGranted = $output["dateGranted"];
            $dateObtainCert = $output["dateObtainCert"];
            $expiryDate = $output["expiryDate"];
            $status = $output["status"];


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
        <a class="btn btn-secondary" href="view-patents-details.php" role="button"> <i class="fas fa-chevron-left"></i> Back</a> <br><br>
    </div>

    <hr >

    <div class="row">
        <div class="col-md-12 order-md-1">
            <br>
            <h2 class="mb-3">Patents Details</h2>



               <div class="mb-3">
                    <label for="patent_id">ID</label>
                        <input type="text" class="form-control" id="patentId" placeholder="" value="<?php echo $patent_id;?>"  disabled>
                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="patentID">Patent ID (Filing No.) <font color='red'><b>*</b></font></label>
                            <input type="text" class="form-control" id="patentID" placeholder="" value="<?php echo $patentID;?>" >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="yearGranted"> Year Granted <font color='red'><b>*</b></font></label>
                        <input type="text" class="form-control" id="yearGranted" placeholder="" value="<?php echo $yearGranted;?>" >

                    </div>

                </div>


                <div class="mb-3">
                    <label for="investors">Investors' Name <font color='red'><b>*</b></font></label>
                    <input type="text" class="form-control" id="investors" placeholder="" value = "<?php echo $investors;?>" >

                </div>

                <div class="mb-3">
                    <label for="patentName">Patent Name <font color='red'><b>*</b></font></label>
                    <input type="text" class="form-control" id="patentName" placeholder="" value = "<?php echo $patentName;?>" >

                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="countryFiled">Country Filed <font color='red'><b>*</b></font></label>
                        <input type="text" class="form-control" id="countryFiled" placeholder="" value ="<?php echo $countryFiled;?>" >

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="dateFiled">Date Filed <font color='red'><b>*</b></font></label>
                        <input type="date" class="form-control" id="dateFiled" placeholder="" value ="<?php echo $dateFiled;?>" >

                    </div>
                </div>



                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="dateGranted">Date Granted <font color='red'><b>*</b></font></label>
                        <input type="date" class="form-control" id="dateGranted" placeholder="" value ="<?php echo $dateGranted;?>" required>

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="dateObtainCert">Date Obtain Certificate</label>
                        <input type="date" class="form-control" id="dateObtainCert" placeholder="" value ="<?php echo $dateObtainCert;?>" >
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="expiryDate">Expiry Date <font color='red'><b>*</b></font></label>
                        <input type="date" class="form-control" id="expiryDate" placeholder="" value ="<?php echo $expiryDate;?>" required>

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status"> Status</label>
                        <select class="custom-select" id="status">
                            <option selected><?php echo $status;?></option>
                            <option value="Granted">Granted</option>
                            <option value="Pending">Pending</option>
                        </select>
                    </div>
                </div>


                <hr class="mb-4">
                <button class="btn btn-danger btn-md" id = "deleteButton"><i class="far fa-trash-alt"></i> Delete Record</button>

                <button class="btn btn-primary btn-md float-right" id = "updateButton" ><i class="far fa-edit"></i> Update Record</button>

            </form>

            <br><br><br><br><br>

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

        var id = '<?php echo $patent_id?>';
    	var patentID = $("#patentID").val();
    	var yearGranted = $("#yearGranted").val();
    	var investors = $("#investors").val();
    	var patentName = $("#patentName").val();
    	var countryFiled = $("#countryFiled").val();
    	var dateFiled = $("#dateFiled").val();
    	var dateGranted = $("#dateGranted").val();
    	var dateObtainCert = $("#dateObtainCert").val();
        var expiryDate = $("#expiryDate").val();
        var status = $("#status").val();
        var operation = "update";

    	if(patentID.trim() == "" ||
            yearGranted.trim() == "" ||
            investors.trim() == "" ||
            patentName.trim() == "" ||
            countryFiled.trim() == "" ||
            dateFiled.trim() == "" ||
            dateGranted.trim() == "" ||
            dateObtainCert.trim() == "" ||
            expiryDate.trim() == "" ||
            status.trim() == ""
    		 ){

			alert("Please fill up all required field(s) marked with *.");
		}

    	 var fd = new FormData();
    	 fd.append('id',id);
    	 fd.append('patentID',patentID);
    	 fd.append('yearGranted',yearGranted);
    	 fd.append('investors',investors);
    	 fd.append('patentName',patentName);
    	 fd.append('countryFiled',countryFiled);
    	 fd.append('dateFiled',dateFiled);
    	 fd.append('dateGranted',dateGranted);
    	 fd.append('dateObtainCert',dateObtainCert);
    	 fd.append('expiryDate',expiryDate);
    	 fd.append('status',status);
    	 fd.append('operation',operation);

    	 if (confirm('Are you sure you want to update this Record ?')) {
    		    // Save it!
    		} else {
    		    return false;
    		}

        $.ajax({
            url: 'manage-patents-process.php',
            type: 'POST',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){


            	if(response=="1"){

            		alert("Record Updated.");
            		window.location.href = "view-patents-details.php";

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


		 var id = '<?php echo $patent_id?>';
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
            url: 'manage-patents-process.php',
            type: 'POST',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){


            	if(response=="1"){

            		alert("Record Deleted.");
            		window.location.href = "view-patents-details.php";

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
