<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 12/11/2018
 * Time: 10:48 PM
 */


session_start();
include('inc-admin/config.php');

$admin_id = "";
$FullName = "";
$AdminEmail = "";
$UserName = "";

if(isset($_GET['id'])){ // Check if $_GET exists , this is to obtain the ID of the journal we need to update.

    $id = $_GET['id'];

    //Obtain original Data

    $sql= "SELECT * FROM admin WHERE id = :id"; // Ensure the id matches with the user_ID

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
            $FullName = $output["FullName"];
            $AdminEmail = $output["AdminEmail"];
            $UserName = $output["UserName"];
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
        <a class="btn btn-secondary" href="manage-adminlist.php" role="button"><i class="fas fa-chevron-left"></i> Back</a> <br><br>
    </div>

    <hr >

    <div class="row">
        <div class="col-md-12 order-md-1">
            <br>
            <h2 class="mb-3">Admin Details</h2>



            <div class="mb-3">
                <label for="award_id">ID-Admin</label>
                <input type="text" class="form-control" id="adminId" placeholder="" value="<?php echo $id;?>" disabled>
            </div>

            <div class="mb-3">
                <label for="awardName">Full Name <font color='red'><b>*</b></font></label>
                <input type="text" class="form-control" id="FullName" placeholder="" value="<?php echo $FullName;?>" >

            </div>

            <div class="mb-3">
                <label for="conferringBody">Email <font color='red'><b>*</b></font></label>
                <input type="text" class="form-control" id="AdminEmail" placeholder="" value="<?php echo $AdminEmail;?>" >

            </div>


            <div class="mb-3">
                <label for="awardType">Username <font color='red'><b>*</b></font></label>
                <input type="text" class="form-control" id="UserName" placeholder="" value = "<?php echo $UserName;?>" >

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
            var FullName = $("#FullName").val();
            var AdminEmail = $("#AdminEmail").val();
            var UserName = $("#UserName").val();
            var operation = "update";

            if(FullName.trim() == "" ||
                AdminEmail.trim() == "" ||
                UserName.trim() == ""
            ){
                alert("Please fill up all required field(s) marked with *.");
            }
            var fd = new FormData();
            fd.append('id',id);
            fd.append('FullName',FullName);
            fd.append('AdminEmail',AdminEmail);
            fd.append('UserName',UserName);
            fd.append('operation',operation);

            if (confirm('Are you sure you want to update this record?')) {
                // Save it!
            } else {
                return false;
            }

            $.ajax({
                url: 'update-admin-process.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response=="1"){
                        alert("Updated.");
                        window.location.href = "manage-adminlist.php";
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
            var id = '<?php echo $admin_id?>';
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
                url: 'update-admin-process.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){


                    if(response=="1"){
                        alert("Award Deleted.");
                        window.location.href = "manage-adminlist.php";
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
