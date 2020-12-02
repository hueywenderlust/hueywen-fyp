<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 21/10/2018
 * Time: 2:37 AM
 */

session_start();
include('inc/config.php');

$project_id = "";
$projName = "";
$communityName = "";
$relatedProj = "";
$organizer = "";
$sponsorship = "";
$description = "";
$startDate = "";
$endDate = "";

if(isset($_GET['id'])){ // Check if $_GET exists , this is to obtain the ID of the journal we need to update.

    $id = $_GET['id'];
    $user_ID = $_SESSION['user_ID'];


    //Obtain original Data

    $sql= "SELECT * FROM `projects` WHERE id = :id AND user_ID = :user_ID"; // Ensure the id matches with the user_ID

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

            $project_id = $output["id"];
            $projName = $output["projName"];
            $communityName = $output["communityName"];
            $relatedProj = $output["relatedProj"];
            $organizer = $output["organizer"];
            $sponsorship = $output["sponsorship"];
            $description = $output["description"];
            $startDate = $output["startDate"];
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
        <a class="btn btn-secondary" href="view-projects-details.php" role="button"><i class="fas fa-chevron-left"></i> Back</a> <br><br>
    </div>

    <hr >

    <div class="row">
        <div class="col-md-12 order-md-1">
            <br>
            <h2 class="mb-3">Project Details</h2>



            <div class="mb-3">
                <label for="project_id">Project ID</label>
                <input type="text" class="form-control" id="projectId" placeholder="" value="<?php echo $project_id;?>"  disabled>
            </div>

            <div class="mb-3">
                <label for="projName">Project Name <font color='red'><b>*</b></font></label>
                <input type="text" class="form-control" id="projName" placeholder="" value="<?php echo $projName;?>" >

            </div>

            <div class="mb-3">
                <label for="communityName">Community Name <font color='red'><b>*</b></font></label>
                <input type="text" class="form-control" id="communityName" placeholder="" value="<?php echo $communityName;?>" >

            </div>


            <div class="mb-3">
                <label for="relatedProj">Related Project <font color='red'><b>*</b></font></label>
                <input type="text" class="form-control" id="relatedProj" placeholder="" value = "<?php echo $relatedProj;?>" >

            </div>

            <div class="mb-3">
                <label for="organizer">Organizer / Sponsor / Funder / Collaborator <font color='red'><b>*</b></font></label>
                <input type="text" class="form-control" id="organizer" placeholder="" value = "<?php echo $organizer;?>" >

            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="sponsorship">Value of Sponsorship <font color='red'><b>*</b></font></label>
                    <input type="text" class="form-control" id="sponsorship" placeholder="" value ="<?php echo $sponsorship;?>" >

                </div>
                <div class="col-md-9 mb-3">
                    <label for="description">Description of knowledge / technology <font color='red'><b>*</b></font></label>
                    <input type="text" class="form-control" id="description" placeholder="" value ="<?php echo $description;?>" >

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


            var id = '<?php echo $project_id?>';
            var projName = $("#projName").val();
            var communityName = $("#communityName").val();
            var relatedProj = $("#relatedProj").val();
            var organizer = $("#organizer").val();
            var sponsorship = $("#sponsorship").val();
            var description = $("#description").val();
            var startDate = $("#startDate").val();
            var endDate = $("#endDate").val();
            var operation = "update";

            if(projName.trim() == "" ||
                communityName.trim() == "" ||
                relatedProj.trim() == "" ||
                organizer.trim() == "" ||
                sponsorship.trim() == "" ||
                description.trim() == "" ||
                startDate.trim() == "" ||
                endDate.trim() == ""
            ){

                alert("Please fill up all required field(s) marked with *.");
            }

            var fd = new FormData();
            fd.append('id',id);
            fd.append('projName',projName);
            fd.append('communityName',communityName);
            fd.append('relatedProj',relatedProj);
            fd.append('organizer',organizer);
            fd.append('sponsorship',sponsorship);
            fd.append('description',description);
            fd.append('startDate',startDate);
            fd.append('endDate',endDate);
            fd.append('operation',operation);

            if (confirm('Are you sure you want to update this project?')) {
                // Save it!
            } else {
                return false;
            }

            $.ajax({
                url: 'manage-project-process.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){


                    if(response=="1"){

                        alert("Record Updated.");
                        window.location.href = "view-projects-details.php";

                    }

                    if(response=="0"){

                        alert("Project Fail to update.");

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


            var id = '<?php echo $project_id?>';
            var operation = "delete";


            var fd = new FormData();
            fd.append('id',id);
            fd.append('operation',operation);

            if (confirm('Are you sure you want to delete this project?')) {
                // Save it!
            } else {
                return false;
            }

            $.ajax({
                url: 'manage-project-process.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){


                    if(response=="1"){

                        alert("Project Deleted.");
                        window.location.href = "view-projects-details.php";

                    }

                    if(response=="0"){

                        alert("Project Failed to add.");

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