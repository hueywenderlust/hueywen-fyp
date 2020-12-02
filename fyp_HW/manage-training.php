<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 21/10/2018
 * Time: 2:35 AM
 */

session_start();
include('inc/config.php');

$training_id = "";
$programmeName = "";
$institute_location = "";
$startDate = "";
$endDate = "";
$leaveType = "";

if(isset($_GET['id'])){ // Check if $_GET exists , this is to obtain the ID of the journal we need to update.

    $id = $_GET['id'];
    $user_ID = $_SESSION['user_ID'];


    //Obtain original Data

    $sql= "SELECT * FROM `training` WHERE id = :id AND user_ID = :user_ID"; // Ensure the id matches with the user_ID

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

            $training_id = $output["id"];
            $programmeName = $output["programmeName"];
            $institute_location = $output["institute_location"];
            $startDate = $output["startDate"];
            $endDate = $output["endDate"];
            $leaveType = $output["leaveType"];

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
        <a class="btn btn-secondary" href="view-trainings-details.php" role="button"><i class="fas fa-chevron-left"></i> Back</a> <br><br>
    </div>

    <hr >

    <div class="row">
        <div class="col-md-12 order-md-1">
            <br>
            <h2 class="mb-3">Training Details</h2>



            <div class="mb-3">
                <label for="training_id">Training ID</label>
                <input type="text" class="form-control" id="trainingId" placeholder="" value="<?php echo $training_id;?>"  disabled>
            </div>

            <div class="mb-3">
                <label for="programmeName">Name of Programme<font color='red'><b>*</b></font></label>
                <input type="text" class="form-control" id="programmeName" placeholder="" value="<?php echo $programmeName;?>" >

            </div>

            <div class="mb-3">
                <label for="institute_location">Institution and Location <font color='red'><b>*</b></font></label>
                <input type="text" class="form-control" id="institute_location" placeholder="" value="<?php echo $institute_location;?>" >

            </div>


            <div class="row">

                <div class="col-md-4 mb-3">
                    <label for="startDate">Start Date <font color='red'><b>*</b></font></label>
                    <input type="date" class="form-control" id="startDate" placeholder="" value ="<?php echo $startDate;?>" >

                </div>

                <div class="col-md-4 mb-3">
                    <label for="endDate">End Date <font color='red'><b>*</b></font></label>
                    <input type="date" class="form-control" id="endDate" placeholder="" value ="<?php echo $endDate;?>" >

                </div>

                <div class="col-md-4 mb-3">
                    <label for="leaveType"> Leave Type <font color='red'><b>*</b></font></label>
                        <select class="custom-select" id="leaveType">
                            <option selected><?php echo $leaveType;?></option>
                            <option value="1">Sabbatical</option>
                            <option value="2">Research</option>
                            <option value="3">Training</option>
                        </select>

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


            var id = '<?php echo $training_id?>';
            var programmeName = $("#programmeName").val();
            var institute_location = $("#institute_location").val();
            var startDate = $("#startDate").val();
            var endDate = $("#endDate").val();
            var leaveType = $("#leaveType").val();
            var operation = "update";

            if(programmeName.trim() == "" ||
                institute_location.trim() == "" ||
                startDate.trim() == "" ||
                endDate.trim() == "" ||
                leaveType.trim() == ""
            ){

                alert("Please fill up all required field(s) marked with *.");
            }

            var fd = new FormData();
            fd.append('id',id);
            fd.append('programmeName',programmeName);
            fd.append('institute_location',institute_location);
            fd.append('startDate',startDate);
            fd.append('endDate',endDate);
            fd.append('leaveType',leaveType);
            fd.append('operation',operation);

            if (confirm('Are you sure you want to update this record ?')) {
                // Save it!
            } else {
                return false;
            }

            $.ajax({
                url: 'manage-training-process.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){


                    if(response=="1"){

                        alert("Record Updated.");
                        window.location.href = "view-trainings-details.php";

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


            var id = '<?php echo $training_id?>';
            var operation = "delete";


            var fd = new FormData();
            fd.append('id',id);
            fd.append('operation',operation);

            if (confirm('Are you sure you want to delete this record ?')) {
                // Save it!
            } else {
                return false;
            }

            $.ajax({
                url: 'manage-training-process.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){


                    if(response=="1"){

                        alert("Record Deleted.");
                        window.location.href = "view-trainings-details.php";

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