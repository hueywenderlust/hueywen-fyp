<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 21/10/2018
 * Time: 2:37 AM
 */

session_start();
include('inc/config.php');

$journal_id = "";
$authors = "";
$publicationTitle = "";
$journalName = "";
$issueVol = "";
$startPage = "";
$endPage = "";
$issn = "";
$url = "";

if(isset($_GET['id'])){ // Check if $_GET exists , this is to obtain the ID of the journal we need to update.

    $id = $_GET['id'];
    $user_ID = $_SESSION['user_ID'];


    //Obtain original Data

    $sql= "SELECT * FROM `journals` WHERE id = :id AND user_ID = :user_ID"; // Ensure the id matches with the user_ID

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

            $journal_id = $output["id"];
            $authors = $output["authors"];
            $publicationTitle = $output["publicationTitle"];
            $journalName = $output["journalName"];
            $issueVol = $output["issueVol"];
            $startPage = $output["startPage"];
            $endPage = $output["endPage"];
            $issn = $output["issn"];
            $url = $output["url"];

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
        <a class="btn btn-secondary" href="view-journals-details.php" role="button"><i class="fas fa-chevron-left"></i> Back</a> <br><br>
    </div>

    <hr >

    <div class="row">
        <div class="col-md-12 order-md-1">
            <br>
            <h2 class="mb-3">Journal Details</h2>



            <div class="mb-3">
                <label for="journal_id">Journal ID</label>
                <input type="text" class="form-control" id="journalId" placeholder="" value="<?php echo $journal_id;?>" disabled>
            </div>

            <div class="mb-3">
                <label for="authors">Author(s) <font color='red'><b>*</b></font></label>
                <input type="text" class="form-control" id="authors" placeholder="" value="<?php echo $authors;?>" >

            </div>

            <div class="mb-3">
                <label for="publicationTitle">Title of Publication <font color='red'><b>*</b></font></label>
                <input type="text" class="form-control" id="title" placeholder="" value="<?php echo $publicationTitle;?>" >

            </div>


            <div class="mb-3">
                <label for="journalName">Name of Journal <font color='red'><b>*</b></font></label>
                <input type="text" class="form-control" id="name" placeholder="" value = "<?php echo $journalName;?>" >

            </div>


            <div class="row">
                <div class="col-md-2 mb-3">
                    <label for="issueVol">Vol : Issue <font color='red'><b>*</b></font></label>
                    <input type="text" class="form-control" id="vol" placeholder="" value = "<?php echo $issueVol;?>" >

                </div>

                <div class="col-md-5 mb-3">
                    <label for="startPage">Start Page <font color='red'><b>*</b></font></label>
                    <input type="text" class="form-control" id="startPage" placeholder="" value ="<?php echo $startPage;?>" >

                </div>
                <div class="col-md-5 mb-3">
                    <label for="endPage">End Page <font color='red'><b>*</b></font></label>
                    <input type="text" class="form-control" id="endPage" placeholder="" value ="<?php echo $endPage;?>" >

                </div>
            </div>



            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="issn">ISSN <font color='red'><b>*</b></font></label>
                    <input type="text" class="form-control" id="issn" placeholder="" value ="<?php echo $issn;?>" required>

                </div>
                <div class="col-md-6 mb-3">
                    <label for="url">URL <span class="text-muted">(if published online)</span></label>
                    <input type="text" class="form-control" id="url" placeholder="" value ="<?php echo $url;?>" >
                </div>
            </div>


            <hr class="mb-4">

            <a class="btn btn-danger" href="view-journals-details.php" role="button" id="deleteButton"><i class="far fa-trash-alt"></i> Delete Record</a>

            <a class="btn btn-primary float-right" href="view-journals-details.php" role="button" id="updateButton"><i class="far fa-edit"></i> Update Record</a>



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


            var id = '<?php echo $journal_id?>';
            var authors = $("#authors").val();
            var title = $("#title").val();
            var name = $("#name").val();
            var vol = $("#vol").val();
            var startPage = $("#startPage").val();
            var endPage = $("#endPage").val();
            var issn = $("#issn").val();
            var url = $("#url").val();
            var operation = "update";

            if(authors.trim() == "" ||
                title.trim() == "" ||
                name.trim() == "" ||
                vol.trim() == "" ||
                startPage.trim() == "" ||
                endPage.trim() == "" ||
                url.trim() == ""
            ){

                alert("Please fill up all required field(s) marked with *.");
            }

            var fd = new FormData();
            fd.append('id',id);
            fd.append('authors',authors);
            fd.append('title',title);
            fd.append('name',name);
            fd.append('vol',vol);
            fd.append('startPage',startPage);
            fd.append('endPage',endPage);
            fd.append('issn',issn);
            fd.append('url',url);
            fd.append('operation',operation);

            if (confirm('Are you sure you want to update this journal ?')) {
                // Save it!
            } else {
                return false;
            }

            $.ajax({
                url: 'manage-journal-process.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){


                    if(response=="1"){

                        alert("Journal Updated.");
                        window.location.href = "view-journals-details.php";

                    }

                    if(response=="0"){

                        alert("Journal Fail to update.");

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


            var id = '<?php echo $journal_id?>';
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
                url: 'manage-journal-process.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){


                    if(response=="1"){

                        alert("Journal Deleted.");
                        window.location.href = "view-journals-details.php";

                    }

                    if(response=="0"){

                        alert("Journal Failed to add.");

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
