<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 12/11/2018
 * Time: 10:48 PM
 */



session_start();
include('inc-admin/config.php');

$staff_id = "";
$StaffId = "";
$firstName = "";
$lastName = "";
$email = "";
$faculty = "";
$department = "";


if(isset($_GET['id'])){ // Check if $_GET exists , this is to obtain the ID of the journal we need to update.

    $id = $_GET['id'];

    //Obtain original Data

    $sql= "SELECT * FROM tbl_staffs WHERE id = :id"; // Ensure the id matches with the user_ID

    try {

        $query = $dbh->prepare($sql);
        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if (count($result)==0){ // if no such data
            echo "<script>alert('Record does not exists!')</script>";
            echo "<script>window.location='dashboard.php'</script>";
        }

        foreach($result as $output) {
            $staff_id = $output["id"];
            $StaffId = $output["StaffId"];
            $firstName = $output["firstName"];
            $lastName = $output["lastName"];
            $email = $output["email"];
            $faculty = $output["faculty"];
            $department = $output["department"];
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


    <link rel="icon" type="image/png" href="../assets/assets-login/images/icons/sunway.ico"/>

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
        <a class="btn btn-secondary" href="manage-stafflist.php" role="button"><i class="fas fa-chevron-left"></i> Back</a> <br><br>
    </div>

    <hr >

    <div class="row">
        <div class="col-md-12 order-md-1">
            <br>
            <h2 class="mb-3">Staff Details</h2>



            <div class="mb-3">
                <label for="award_id">#</label>
                <input type="text" class="form-control" id="awardId" placeholder="" value="<?php echo $id;?>" disabled>
            </div>

            <div class="mb-3">
                <label for="awardName">Staff ID<font color='red'><b>*</b></font></label>
                <input type="text" class="form-control" id="StaffId" placeholder="" value="<?php echo $StaffId;?>" >
            </div>

            <div class="mb-3">
                <label for="conferringBody">First Name <font color='red'><b>*</b></font></label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $firstName;?>" >
            </div>


            <div class="mb-3">
                <label for="awardType">Last Name <font color='red'><b>*</b></font></label>
                <input type="text" class="form-control" id="lastName" placeholder="" value = "<?php echo $lastName;?>" >
            </div>

            <div class="mb-3">
                <label for="awardType">Email <font color='red'><b>*</b></font></label>
                <input type="text" class="form-control" id="email" placeholder="" value = "<?php echo $email;?>" >
            </div>

            <div class="mb-3">
                <label for="awardDetails">Faculty <font color='red'><b>*</b></font></label>
                <select class="form-control border-input" id="faculty" name="faculty" required>
                    <option selected><?php echo $faculty;?></option>
                    <option>-</option>
                    <option>School of Arts</option>
                    <option>School of Healthcare and Medical Science</option>
                    <option>School of Business</option>
                    <option>School of Science and Technology</option>
                    <option>School of Hospitality</option>
                    <option>School of Mathematical Science</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="awardDetails">Department <font color='red'><b>*</b></font></label>
                <select class="form-control border-input" id="department" name="department" required>
                    <option selected><?php echo $department;?></option>
                    <option>-</option>
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




            <hr class="mb-4">

            <button class="btn btn-danger btn-md" id = "deleteButton"><i class="far fa-trash-alt"></i> Delete Record</button>

            <button class="btn btn-primary btn-md float-right" id = "updateButton" ><i class="far fa-edit"></i> Update Record</button>


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
            var id = '<?php echo $id?>';
            var StaffId = $("#StaffId").val();
            var firstName = $("#firstName").val();
            var lastName = $("#lastName").val();
            var email = $("#email").val();
            var faculty = $("#faculty").val();
            var department = $("#department").val();

            var operation = "update";

            if(StaffId.trim() == "" ||
                firstName.trim() == "" ||
                lastName.trim() == "" ||
                email.trim() == "" ||
                faculty.trim() == "" ||
                department.trim() == ""
            ){
                alert("Please fill up all required field(s) marked with *.");
            }
            var fd = new FormData();
            fd.append('id',id);
            fd.append('StaffId',StaffId);
            fd.append('firstName',firstName);
            fd.append('lastName',lastName);
            fd.append('email',email);
            fd.append('faculty', faculty);
            fd.append('department',department);
            fd.append('operation',operation);

            if (confirm('Are you sure you want to update this record?')) {
                // Save it!
            } else {
                return false;
            }

            $.ajax({
                url: 'update-staff-process.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response=="1"){
                        alert("Updated.");
                        window.location.href = "manage-stafflist.php";
                    }
                    if(response=="0"){
                        alert("Fail to update.");
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
            var id = '<?php echo $id?>';
            var operation = "delete";

            var fd = new FormData();
            fd.append('id',id);
            fd.append('operation',operation);

            if (confirm('Are you sure you want to delete this staff?')) {
                // Save it!
            } else {
                return false;
            }

            $.ajax({
                url: 'update-staff-process.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){


                    if(response=="1"){
                        alert("Record Deleted.");
                        window.location.href = "manage-stafflist.php";
                    }

                    if(response=="0"){
                        alert("Action Failed.");
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
