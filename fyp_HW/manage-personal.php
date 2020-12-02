<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 24/10/2018
 * Time: 11:55 AM
 */


session_start();
include('inc/config.php');

$personal_id = "";
$staffNo = "";
$email = "";
$fullName = "";
$nationality = "";
$dob = "";
$position = "";
$faculty = "";
$department = "";
$startDate = "";
$summary = "";


if(isset($_GET['id'])){ // Check if $_GET exists , this is to obtain the ID of the journal we need to update.

    $id = $_GET['id'];
    $user_ID = $_SESSION['user_ID'];


    //Obtain original Data

    $sql= "SELECT * FROM personalDetails WHERE id=:id AND user_ID=:user_ID"; // Ensure the id matches with the user_ID

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if (count($result)==0){ // if no such data

            echo "<script>alert('Record does not exists!')</script>";
            echo "<script>window.location='dashboard.php'</script>";
        }

        foreach($result as $output) {

            $personal_id = $output["id"];
            $staffNo = $output["staffNo"];
            $email = $output["email"];
            $fullName = $output["fullName"];
            $nationality = $output["nationality"];
            $dob = $output["dob"];
            $position = $output["position"];
            $faculty = $output["faculty"];
            $department = $output["department"];
            $startDate = $output["startDate"];
            $summary = $output["summary"];

        }
    }
    catch(PDOException $e) {
        echo "<script>alert('Database Error! Please contact admin !')</script>";
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
        <a class="btn btn-secondary" href="view-personal-details.php" role="button">Back</a> <br><br>
    </div>

    <hr >

    <div class="row">
        <div class="col-md-12 order-md-1">
            <br>
            <h2 class="mb-3">Personal Details</h2>


            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="personal_id">Personal ID</label>
                    <input type="text" class="form-control" id="personalId" placeholder="" value="<?php echo $personal_id;?>" disabled>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="staffNo">Staff ID </label>
                    <input type="text" class="form-control" id="staffNo" placeholder="" value="<?php echo $user_ID;?>" disabled>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="fullName">Full Name <font color='red'><b>*</b></font></label>
                    <input type="text" class="form-control" id="fullName" placeholder="" value="<?php echo $fullName;?>" >
                </div>

            </div>


            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="fullName">Full Name <font color='red'><b>*</b></font></label>
                    <input type="text" class="form-control" id="fullName" placeholder="" value="<?php echo $fullName;?>" >
                </div>

                <div class="col-md-4 mb-3">
                    <label for="nationality">Nationality <font color='red'><b>*</b></font></label>
                    <input type="text" class="form-control" id="nationality" placeholder="" value = "<?php echo $nationality;?>" >
                </div>

                <div class="col-md-4 mb-3">
                    <label for="dob">Date of Birth <font color='red'><b>*</b></font></label>
                    <input type="date" class="form-control" id="dob" placeholder="" value = "<?php echo $dob;?>" >
                </div>

            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="position">Position <font color='red'><b>*</b></font></label>
                        <select class="custom-select" id="position">
                            <option selected><?php echo $position;?></option>
                            <option>Professor</option>
                            <option>Assoc. Professor</option>
                            <option>Senior Lecturer</option>
                            <option>Lecturer</option>
                        </select>

                </div>

                <div class="col-md-6 mb-3">
                    <label for="dob">Date of Appointment at Sunway <font color='red'><b>*</b></font></label>
                    <input type="date" class="form-control" id="startDate" placeholder="" value = "<?php echo $startDate;?>" >

                </div>
            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label for="faculty">School <font color='red'><b>*</b></font></label>
                        <select class="custom-select" id="faculty">
                            <option selected><?php echo $faculty;?></option>
                            <option>School of Arts</option>
                            <option>School of Healthcare and Medical Science</option>
                            <option>School of Business</option>
                            <option>School of Science and Technology</option>
                            <option>School of Hospitality</option>
                            <option>School of Mathematical Science</option>
                        </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="department">Department <font color='red'><b>*</b></font></label>
                        <select class="custom-select" id="department">
                            <option selected><?php echo $department;?></option>
                            <option>Department of Art and Design</option>
                            <option>Department of Communication and Liberal Arts</option>
                            <option>Department of Performance and Media</option>
                            <option>Department of Nursing</option>
                            <option>Department of Medical Sciences</option>
                            <option>Department of Accounting</option>
                            <option>Department of Marketing</option>
                            <option>Department of Management</option>
                            <option>Department of Business Analytics</option>
                            <option>Department of Economics and Finance</option>
                            <option>Department of Biological Sciences</option>
                            <option>Department of Computing and Information System</option>
                            <option>Department of Psychology</option>
                            <option>Department of Hospitality</option>
                            <option>Department of Applied Statistics</option>
                            <option>Department of Actuarial Science and Risks</option>
                            <option>Department of Pure and Applied Maths</option>
                        </select>

                </div>
            </div>



            <div class="mb-3">
                <label for="summary">Profile Summary <font color='red'><b>*</b></font></label>
                <textarea name="summary" class="form-control" id="summary" rows="5"><?php echo $summary;?></textarea>

            </div>






            <hr class="mb-4">

            <button class="btn btn-primary btn-md float-right" id = "updateButton" >
                <i class="far fa-edit"></i> Update Record
            </button>


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


            var id = '<?php echo $personal_id?>';
            var staffNo = $("#staffNo").val();
            var email = $("#email").val();
            var fullName = $("#fullName").val();
            var nationality = $("#nationality").val();
            var dob = $("#dob").val();
            var position = $("#position").val();
            var faculty = $("#faculty").val();
            var department = $("#department").val();
            var startDate = $("#startDate").val();
            var summary = $("#summary").val();

            var operation = "update";

            if(staffNo.trim() == "" ||
                email.trim() == "" ||
                fullName.trim() == "" ||
                nationality.trim() == "" ||
                dob.trim() == "" ||
                position.trim() == "" ||
                faculty.trim() == "" ||
                department.trim() == "" ||
                startDate.trim() == "" ||
                summary.trim() == ""

            ){

                alert("Please fill up all required field(s) marked with *.");
            }

            var fd = new FormData();
            fd.append('id',id);
            fd.append('staffNo',staffNo);
            fd.append('email',email);
            fd.append('fullName',fullName);
            fd.append('nationality',nationality);
            fd.append('dob',dob);
            fd.append('position',position);
            fd.append('faculty',faculty);
            fd.append('department',department);
            fd.append('startDate',startDate);
            fd.append('summary', summary);
            fd.append('operation',operation);

            if (confirm('Are you sure you want to update this record ?')) {
                // Save it!
            } else {
                return false;
            }

            $.ajax({
                url: 'manage-personal-process.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){


                    if(response=="1"){

                        alert("record Updated.");
                        window.location.href = "view-personal-details.php";

                    }

                    if(response=="0"){

                        alert("record Fail to update.");

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


            var id = '<?php echo $personal_id?>';
            var operation = "delete";


            var fd = new FormData();
            fd.append('id',id);
            fd.append('operation',operation);

            if (confirm('Are you sure you want to delete this award?')) {
                // Save it!
            } else {
                return false;
            }

            $.ajax({
                url: 'manage-personal-process.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){


                    if(response=="1"){

                        alert("record Deleted.");
                        window.location.href = "view-personal-details.php";

                    }

                    if(response=="0"){

                        alert("record Failed to add.");

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
