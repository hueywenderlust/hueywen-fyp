<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 21/10/2018
 * Time: 2:38 AM
 */


session_start();
include('inc/config.php');

$proceeding_id = "";
$authors = "";
$paperTitle = "";
$proceedingsTitle = "";
$issueVol = "";
$pageNo = "";
$articleID = "";
$url = "";
$issn_ibsn = "";


if(isset($_GET['id'])){ // Check if $_GET exists , this is to obtain the ID of the journal we need to update.

    $id = $_GET['id'];
    $user_ID = $_SESSION['user_ID'];


    //Obtain original Data

    $sql= "SELECT * FROM `proceedings` WHERE id=:id AND user_ID=:user_ID"; // Ensure the id matches with the user_ID

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

            $proceeding_id = $output["id"];
            $authors = $output["authors"];
            $paperTitle = $output["paperTitle"];
            $proceedingsTitle = $output["proceedingsTitle"];
            $issueVol = $output["issueVol"];
            $pageNo = $output["pageNo"];
            $articleID = $output["articleID"];
            $url = $output["url"];
            $issn_ibsn = $output["issn_ibsn"];

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
        <a class="btn btn-secondary" href="view-proceedings-details.php" role="button"><i class="fas fa-chevron-left"></i> Back</a> <br><br>
    </div>

    <hr >

    <div class="row">
        <div class="col-md-12 order-md-1">
            <br>
            <h2 class="mb-3">Proceedings Details</h2>



               <div class="mb-3">
                    <label for="proceeding_id">Proceeding ID</label>
                        <input type="text" class="form-control" id="proceedingId" placeholder="" value="<?php echo $proceeding_id;?>"  disabled>
                </div>

                <div class="mb-3">
                    <label for="authors">Author(s) <font color='red'><b>*</b></font></label>
                        <input type="text" class="form-control" id="authors" placeholder="" value="<?php echo $authors;?>" >

                </div>

                <div class="mb-3">
                    <label for="paperTitle">Paper Title <font color='red'><b>*</b></font></label>
                    <input type="text" class="form-control" id="paperTitle" placeholder="" value="<?php echo $paperTitle;?>" >

                </div>


                <div class="mb-3">
                    <label for="proceedingsTitle">Title of Proceedings <font color='red'><b>*</b></font></label>
                    <input type="text" class="form-control" id="proceedingsTitle" placeholder="" value = "<?php echo $proceedingsTitle;?>" >

                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="issueVol">Vol : Issue <font color='red'><b>*</b></font></label>
                        <input type="text" class="form-control" id="issueVol" placeholder="" value = "<?php echo $issueVol;?>" >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="pageNo">Page No.<font color='red'><b>*</b></font></label>
                        <input type="text" class="form-control" id="pageNo" placeholder="" value ="<?php echo $pageNo;?>" >
                    </div>

                </div>


                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label for="url">Article ID <span class="text-muted">(if online)</span></label>
                        <input type="text" class="form-control" id="articleID" placeholder="" value ="<?php echo $articleID;?>" >
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="issn">URL <font color='red'><b>*</b></font></label>
                        <input type="text" class="form-control" id="url" placeholder="" value ="<?php echo $url;?>" required>

                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="issn">ISSN /ISBN <font color='red'><b>*</b></font></label>
                        <input type="text" class="form-control" id="issn_ibsn" placeholder="" value ="<?php echo $issn_ibsn;?>" required>

                    </div>
                </div>


                <hr class="mb-4">
                <button class="btn btn-danger btn-md" id = "deleteButton"><i class="far fa-trash-alt"></i>Delete Record</button>

                <button class="btn btn-primary btn-md float-right" id = "updateButton" ><i class="far fa-edit"></i> Update Record</button>

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

		var id = '<?php echo $proceeding_id?>';
    	var authors = $("#authors").val();
    	var paperTitle = $("#paperTitle").val();
    	var proceedingsTitle = $("#proceedingsTitle").val();
    	var issueVol = $("#issueVol").val();
    	var pageNo = $("#pageNo").val();
    	var articleID = $("#articleID").val();
    	var url = $("#url").val();
        var issn_ibsn = $("#issn_ibsn").val();
    	var operation = "update";

    	if(authors.trim() == "" ||
    			paperTitle.trim() == "" ||
    			proceedingsTitle.trim() == "" ||
    			issueVol.trim() == "" ||
    			pageNo.trim() == "" ||
    			articleID.trim() == "" ||
    			url.trim() == "" ||
                issn_ibsn.trim() == ""
    		 ){

			alert("Please fill up all required field(s) marked with *.");
		}

    	 var fd = new FormData();
    	 fd.append('id',id);
    	 fd.append('authors',authors);
    	 fd.append('paperTitle',paperTitle);
    	 fd.append('proceedingsTitle',proceedingsTitle);
    	 fd.append('issueVol',issueVol);
    	 fd.append('pageNo',pageNo);
    	 fd.append('articleID',articleID);
    	 fd.append('url',url);
         fd.append('issn_ibsn',issn_ibsn);
    	 fd.append('operation',operation);

    	 if (confirm('Are you sure you want to update this Record ?')) {
    		    // Save it!
    		} else {
    		    return false;
    		}

        $.ajax({
            url: 'manage-proceeding-process.php',
            type: 'POST',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){


            	if(response=="1"){

            		alert("Record Updated.");
            		window.location.href = "view-proceedings-details.php";

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


		 var id = '<?php echo $proceeding_id?>';
		 var operation = "delete";


         var fd = new FormData();
    	 fd.append('id',id);
    	 fd.append('operation',operation);

    	 if (confirm('Are you sure you want to delete this Record?')) {
    		    // Save it!
    		} else {
    		    return false;
    		}

        $.ajax({
            url: 'manage-proceeding-process.php',
            type: 'POST',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){


            	if(response=="1"){

            		alert("Record Deleted.");
            		window.location.href = "view-proceedings-details.php";

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
