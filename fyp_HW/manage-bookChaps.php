<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 21/10/2018
 * Time: 2:38 AM
 */


session_start();
include('inc/config.php');

$book_id = "";
$authors = "";
$chapTitle = "";
$bookTitle = "";
$bookEditor = "";
$publisher = "";
$isbn_no = "";
$pageStart = "";
$pageEnd = "";
$otherInfo_url = "";

if(isset($_GET['id'])){ // Check if $_GET exists , this is to obtain the ID of the journal we need to update.

    $id = $_GET['id'];
    $user_ID = $_SESSION['user_ID'];


    //Obtain original Data

    $sql= "SELECT * FROM `books-chaps` WHERE id = :id AND user_ID = :user_ID"; // Ensure the id matches with the user_ID

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

            $book_id = $output["id"];
            $authors = $output["authors"];
            $chapTitle = $output["chapTitle"];
            $bookTitle = $output["bookTitle"];
            $bookEditor = $output["bookEditor"];
            $publisher = $output["publisher"];
            $isbn_no = $output["isbn_no"];
            $pageStart = $output["pageStart"];
            $pageEnd = $output["pageEnd"];
            $otherInfo_url = $output["otherInfo_url"];

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
        <a class="btn btn-secondary" href="view-books-chaps-details.php" role="button"><i class="fas fa-chevron-left"></i> Back</a> <br><br>
    </div>

    <hr >

    <div class="row">
        <div class="col-md-12 order-md-1">
            <br>
            <h2 class="mb-3">Books / Books' Chapters Details</h2>



               <div class="mb-3">
                    <label for="book_id">Book ID</label>
                        <input type="text" class="form-control" id="journalId" placeholder="" value="<?php echo $book_id;?>"  disabled>
                </div>

                <div class="mb-3">
                    <label for="authors">Author(s) <font color='red'><b>*</b></font></label>
                        <input type="text" class="form-control" id="authors" placeholder="" value="<?php echo $authors;?>" >

                </div>

                <div class="mb-3">
                    <label for="chapTitle">Chapter Title <font color='red'><b>*</b></font></label>
                    <input type="text" class="form-control" id="chapTitle" placeholder="" value="<?php echo $chapTitle;?>" >

                </div>


                <div class="mb-3">
                    <label for="bookTitle">Book Title <font color='red'><b>*</b></font></label>
                    <input type="text" class="form-control" id="bookTitle" placeholder="" value = "<?php echo $bookTitle;?>" >

                </div>

                <div class="mb-3">
                    <label for="bookEditor">Book Editor's Name <font color='red'><b>*</b></font></label>
                    <input type="text" class="form-control" id="bookEditor" placeholder="" value = "<?php echo $bookEditor;?>" >

                </div>

                <div class="mb-3">
                    <label for="publisher">Publisher <font color='red'><b>*</b></font></label>
                    <input type="text" class="form-control" id="publisher" placeholder="" value = "<?php echo $publisher;?>" >

                </div>


                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label for="isbn_no">ISBN No. <font color='red'><b>*</b></font></label>
                        <input type="text" class="form-control" id="isbn_no" placeholder="" value ="<?php echo $isbn_no;?>" >
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="pageStart">Page Start <font color='red'><b>*</b></font></label>
                        <input type="text" class="form-control" id="pageStart" placeholder="" value ="<?php echo $pageStart;?>" >
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="pageEnd">Page End<font color='red'><b>*</b></font></label>
                        <input type="text" class="form-control" id="pageEnd" placeholder="" value ="<?php echo $pageEnd;?>" >
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="otherInfo_url">Other Info / URL <font color='red'><b>*</b></font></label>
                        <input type="text" class="form-control" id="otherInfo_url" placeholder="" value ="<?php echo $otherInfo_url;?>" >
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


		var id = '<?php echo $book_id?>';
    	var authors = $("#authors").val();
    	var chapTitle = $("#chapTitle").val();
    	var bookTitle = $("#bookTitle").val();
    	var bookEditor = $("#bookEditor").val();
    	var publisher = $("#publisher").val();
    	var isbn_no = $("#isbn_no").val();
    	var pageStart = $("#pageStart").val();
        var pageEnd = $("#pageEnd").val();
    	var otherInfo_url = $("#otherInfo_url").val();
    	var operation = "update";

    	if(authors.trim() == "" ||
    			chapTitle.trim() == "" ||
    			bookTitle.trim() == "" ||
    			bookEditor.trim() == "" ||
    			publisher.trim() == "" ||
    			isbn_no.trim() == "" ||
    			pageStart.trim() == "" ||
                pageEnd.trim() == "" ||
                otherInfo_url.trim() == ""
    		 ){

			alert("Please fill up all required field(s) marked with *.");
		}

    	 var fd = new FormData();
    	 fd.append('id',id);
    	 fd.append('authors',authors);
    	 fd.append('chapTitle',chapTitle);
    	 fd.append('bookTitle',bookTitle);
    	 fd.append('bookEditor',bookEditor);
    	 fd.append('publisher',publisher);
    	 fd.append('isbn_no',isbn_no);
    	 fd.append('pageStart',pageStart);
    	 fd.append('pageEnd',pageEnd);
         fd.append('otherInfo_url', otherInfo_url);
    	 fd.append('operation',operation);

    	 if (confirm('Are you sure you want to update this record ?')) {
    		    // Save it!
    		} else {
    		    return false;
    		}

        $.ajax({
            url: 'manage-bookChaps-process.php',
            type: 'POST',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){


            	if(response=="1"){

            		alert("Book Updated.");
            		window.location.href = "view-books-chaps-details.php";

            	}

            	if(response=="0"){

            		alert("Book Fail to update.");

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


		 var id = '<?php echo $book_id?>';
		 var operation = "delete";


         var fd = new FormData();
    	 fd.append('id',id);
    	 fd.append('operation',operation);

    	 if (confirm('Are you sure you want to delete this book ?')) {
    		    // Save it!
    		} else {
    		    return false;
    		}

        $.ajax({
            url: 'manage-bookChaps-process.php',
            type: 'POST',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){


            	if(response=="1"){

            		alert("Book Deleted.");
            		window.location.href = "view-books-chaps-details.php";

            	}

            	if(response=="0"){

            		alert("Book Failed to add.");

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
