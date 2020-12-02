<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 12/10/2018
 * Time: 4:36 PM
 */


include('inc/config.php');

session_start();
$user_ID = $_SESSION['user_ID'];

$sql= "SELECT * FROM `tbl_staffs` WHERE `StaffId` = :user_ID";

try {

    $query = $dbh->prepare($sql);

    $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    if (count($result)==0){ // if no such data

        echo "<script>alert('Record does not exists!')</script>";
        echo "<script>window.location='dashboard.php'</script>";
    }

    foreach($result as $output) {

        $StaffId = $output["StaffId"];
        $startDate = $output["startDate"];
        $email = $output["email"];
        $fullName = $output["firstName"]." ".$output["lastName"];
        $nationality = $output["nationality"];
        $dob = $output["dob"];
        $position = $output["position"];
        $faculty = $output["faculty"];
        $department = $output["department"];
        $summary = $output["summary"];
        $profile_picture = $output["profile_picture"];
        $api_key = $output["api_key"];

        $image_check = preg_replace('/\s+/', '', $profile_picture);

    }



}
catch(PDOException $e) {


}

include ('inc/sidebar.php'); ?>



    <style>

        #image1 {
            max-width: 300px;
        }

        #image1 {
            max-height: 300px;
        }


    </style>
    <div class="container-fluid">
        <h1>Personal Details</h1>
        <hr/> <br/>

        <div class="col-lg-12 text-center">
            <img id="image1" src="images/no_image.jpg" >

        </div>
        <br>
        <div class="col-lg-12 text-center">
            <p>Upload New Profile Picture:</p>
            <input type="file" id="profileImage" accept="image/*">
        </div>
        <br>
        <hr>
        <br>

        <div class="row">

            <div class="form-group col-md-4">
                <label for="exampleFormControlInput1">Staff No.</label>
                <input type="text" class="form-control" id="staffNo" placeholder="" autocomplete="off" name="staffNo" required value=<?php echo $StaffId?> disabled>
            </div>

            <div class="form-group col-md-4">
                <label for="exampleFormControlInput1">Start Date of Appointment at Sunway<font color='red'><b>*</b></font></label>
                <input type="date" class="form-control" id="startDate" placeholder="" name="startDate" required value=<?php echo $startDate?>>
            </div>

            <div class="form-group col-md-4">


                <label for="exampleFormControlInput1">Email</label>
                <input type="email" class="form-control" id="email" placeholder="" name="email" value=<?php echo $email?> onBlur="checkEmailAvailability()" autocomplete="off" disabled>
                <span id="email-availability-status" style="font-size:12px;"></span>
            </div>



        </div>
        <br />

        <div class="row">

            <div class="form-group col-md-4">
                <label for="exampleFormControlInput1">Full Name</label>
                <input type="text" class="form-control" id="fullName" placeholder="" autocomplete="off" name="fullName" value='<?php echo $fullName?>' required>
            </div>

            <div class="form-group col-md-4">
                <label for="exampleFormControlInput1">Nationality</label>
                <input type="text" class="form-control" id="nationality" placeholder="" autocomplete="off" name="nationality" value=<?php echo $nationality ?>>
            </div>

            <div class="form-group col-md-4">
                <label for="exampleFormControlInput1">Date of Birth</label>
                <input type="date" class="form-control" id="dob" placeholder="" name="dob"  value=<?php echo $dob ?> >
            </div>

        </div>
        <br />

        <div class="row">

            <div class="form-group col-md-2">
                <label for="exampleFormControlInput1">Position <font color='red'><b>*</b></font></label>
                <select class="form-control" id="position" name="position" required>
                    <option>-</option>
                    <option <?php if(strcasecmp($position,"Professor")==0){echo "selected";}?>>Professor</option>
                    <option <?php if(strcasecmp($position,"Assoc. Professor")==0){echo "selected";}?>>Assoc. Professor</option>
                    <option <?php if(strcasecmp($position,"Senior Lecturer")==0){echo "selected";}?>>Senior Lecturer</option>
                    <option <?php if(strcasecmp($position,"Lecturer")==0){echo "selected";}?>>Lecturer</option>
                </select>
            </div>

            <div class="form-group col-md-5">
                <label for="exampleFormControlSelect1">Faculty <font color='red'><b>*</b></font></label>
                <select class="form-control" id="faculty" name="faculty" required>
                    <option <?php if(strcasecmp($faculty,"School of Arts")==0){echo "selected";}?>>School of Arts</option>
                    <option <?php if(strcasecmp($faculty,"School of Healthcare and Medical Science")==0){echo "selected";}?>>School of Healthcare and Medical Science</option>
                    <option <?php if(strcasecmp($faculty,"School of Business")==0){echo "checked";}?>>School of Business</option>
                    <option <?php if(strcasecmp($faculty,"School of Science and Technology")==0){echo "selected";}?>>School of Science and Technology</option>
                    <option <?php if(strcasecmp($faculty,"School of Hospitality")==0){echo "selected";}?>>School of Hospitality</option>
                    <option <?php if(strcasecmp($faculty,"School of Mathematical Science")==0){echo "selected";}?>>School of Mathematical Science</option>
                </select>
            </div>

            <div class="form-group col-md-5">
                <label for="exampleFormControlSelect1">Department <font color='red'><b>*</b></font></label>
                <select class="form-control" id="department" name="department" required>
                    <option>-</option>
                    <option <?php if(strcasecmp($department,"Department of Art and Design")==0){echo "selected";}?>>Department of Art and Design</option>
                    <option <?php if(strcasecmp($department,"Department of Communication and Liberal Arts")==0){echo "selected";}?>>Department of Communication and Liberal Arts</option>
                    <option <?php if(strcasecmp($department,"Department of Performance and Media")==0){echo "selected";}?>>Department of Performance and Media</option>
                    <option <?php if(strcasecmp($department,"Department of Nursing")==0){echo "selected";}?>>Department of Nursing</option>
                    <option <?php if(strcasecmp($department,"Department of Medical Sciences")==0){echo "selected";}?>>Department of Medical Sciences</option>
                    <option <?php if(strcasecmp($department,"Department of Accounting")==0){echo "selected";}?>>Department of Accounting</option>
                    <option <?php if(strcasecmp($department,"Department of Marketing")==0){echo "selected";}?>>Department of Marketing</option>
                    <option <?php if(strcasecmp($department,"Department of Management")==0){echo "selected";}?>>Department of Management</option>
                    <option <?php if(strcasecmp($department,"Department of Business Analytics")==0){echo "selected";}?>>Department of Business Analytics</option>
                    <option <?php if(strcasecmp($department,"Department of Economics and Finance")==0){echo "selected";}?>>Department of Economics and Finance</option>
                    <option <?php if(strcasecmp($department,"Department of Biological Sciences")==0){echo "selected";}?>>Department of Biological Sciences</option>
                    <option <?php if(strcasecmp($department,"Department of Computing and Information System")==0){echo "selected";}?>>Department of Computing and Information System</option>
                    <option <?php if(strcasecmp($department,"Department of Psychology")==0){echo "selected";}?>>Department of Psychology</option>
                    <option <?php if(strcasecmp($department,"Department of Hospitality")==0){echo "selected";}?>>Department of Hospitality</option>
                    <option <?php if(strcasecmp($department,"Department of Applied Statistics")==0){echo "selected";}?>>Department of Applied Statistics</option>
                    <option <?php if(strcasecmp($department,"Department of Actuarial Science and Risks")==0){echo "selected";}?>>Department of Actuarial Science and Risks</option>
                    <option <?php if(strcasecmp($department,"Department of Pure and Applied Maths")==0){echo "selected";}?>>Department of Pure and Applied Maths</option>
                </select>
            </div>

        </div>
        <br>


        <div class="row">

            <div class="form-group col-md-12">
                <label for="exampleFormControlTextarea1">Profile Summary <font color='red'><b>*</b></font></label>
                <textarea id="summary" name="summary" class="form-control" autocomplete="off" id="exampleFormControlTextarea1" rows="5"><?php echo $summary?></textarea>
            </div>

        </div>
<br>
        <hr>
        <br />

        <h3>Generate API key</h3>
        <b>API key:</b> <?php echo $api_key;?>  <button id="regenerate_api" class="btn btn-danger mb-2 float-right" name="add_personal">Regenerate API Key</button>
        &nbsp&nbsp<br><a href="javascript:call_modal();">(Click here to for API guide)</a>

        <br>
        <br>
        <br>

       <h6> <i class="fas fa-paste fa-2x"></i> Click to copy Resume & MYRA CV (PDF) API link copied to clipboard</h6>

        <a id = "b1"  onclick="api1()" class="btn btn-outline-primary col-md-2" role="button">MYRA CV</a>
        <a id = "b2" onclick="api2()" class="btn btn-outline-primary col-md-2" role="button">Resume</a>

        <br><br>




        <script>

            function api1() {
                var str = "http://localhost/fyp_HW/api/api_controller.php?user_id=<?php echo $user_ID?>&request_type=work_pdf&api_key=<?php echo $api_key?>";
                // Create new element
                var el = document.createElement('textarea');
                // Set value (string to be copied)
                el.value = str;
                // Set non-editable to avoid focus and move outside of view
                el.setAttribute('readonly', '');
                el.style = {position: 'absolute', left: '-9999px'};
                document.body.appendChild(el);
                // Select text inside element
                el.select();
                // Copy text to clipboard
                document.execCommand('copy');
                // Remove temporary element
                document.body.removeChild(el);
                alert("MYRA CV Form (PDF) API link copied to clipboard");
            }


            function api2() {
                var str = "http://localhost/fyp_HW/api/api_controller.php?user_id=<?php echo $user_ID?>&request_type=resume_pdf&api_key=<?php echo $api_key?>";
                // Create new element
                var el = document.createElement('textarea');
                // Set value (string to be copied)
                el.value = str;
                // Set non-editable to avoid focus and move outside of view
                el.setAttribute('readonly', '');
                el.style = {position: 'absolute', left: '-9999px'};
                document.body.appendChild(el);
                // Select text inside element
                el.select();
                // Copy text to clipboard
                document.execCommand('copy');
                // Remove temporary element
                document.body.removeChild(el);
                alert("Resume (PDF) API link copied to clipboard");
            }


            function call_modal(){

                $("#myModal").modal();
            }



        </script>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog" width="700px">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <!--                        <p>You can acess your acdemic work information or resume using this API key in both JSON and PDF format. The API url is as follows:</p>-->
                        <!--                        <p>http://localhost/fyp-hw/api/api_controller.php?user_id=<b>{Your User ID}</b>&request_type=<b>{Your Request Type}</b>&api_key=<b>{Your API Key}</b></p>-->
                        <!--                        <p>Request Type parameters: <b>work_pdf</b>, <b>resume_pdf</b>, <b>work_json</b>, <b>resume_json</b></p>-->
                        <p><b>Regenerate API </b>button will generate a new API Key every time you click.</p>
                        <p>You can access your academic work information or resume using this API key in and PDF format by clicking the button below.</p>

                    </div>
                    <!--                    <div class="modal-footer">-->
                    <!--                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                    <!--                    </div>-->
                </div>

            </div>
        </div>
        <hr>
        <br>

        <div class="container-fluid">
            <a class="btn btn-secondary" href="dashboard.php" role="button">Back</a>
            <button id="submit" class="btn btn-success mb-2 float-right" name="add_personal">Done</button>
        </div>

        </form>
    </div>

    <script>

        $('#submit').click(function(){

            var staffNo = document.getElementById("staffNo").value;
            var startDate = document.getElementById("startDate").value;
            var email = document.getElementById("email").value;
            var dob = document.getElementById("dob").value;
            var fullName = document.getElementById("fullName").value;
            var nationality = document.getElementById("nationality").value;
            var position = document.getElementById("position").value;
            var faculty = document.getElementById("faculty").value;
            var department = document.getElementById("department").value;
            var summary = document.getElementById("summary").value;
            var profileImage = $('#profileImage')[0].files[0];

            if(startDate.trim() == "" ||
                email.trim() == "" ||
                fullName.trim() == "" ||
                // nationality.trim() == "" ||
                position.trim() == "" ||
                faculty.trim() == "" ||
                department.trim() == ""
                // summary.trim() == ""
                ){

                alert("Please fill up all the fields.");
                return;
            }

            if (confirm('Are you sure you want to update your personal information ?')) {
                // Save it!
            } else {
                return;
            }

            var fd = new FormData();
            fd.append('staffNo',staffNo);
            fd.append('startDate',startDate);
            fd.append('email',email);
            fd.append('dob',dob);
            fd.append('fullName',fullName);
            fd.append('nationality',nationality);
            fd.append('position',position);
            fd.append('faculty',faculty);
            fd.append('department',department);
            fd.append('summary',summary);
            fd.append('profileImage',profileImage);


            $.ajax({
                url: 'personal_update.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){

                    response = response.replace(/\s+/g, '');
                    if(response=="1"){
                        alert("Profile Updated.");
                        window.location.href = "view-personal-details.php";
                    }

                    if(response=="0"){
                        alert("Profile Updated Failed to add.");
                    }

                    if(response=="2"){
                        alert("Could not connect to server.");
                    }

                },
            });

        });

        $('#regenerate_api').click(function(){

            var staffNo = document.getElementById("staffNo").value;




            if (confirm('Are you sure you want to regenerate your API key ? The current API key will be invalid')) {
                // Save it!
            } else {
                return;
            }

            var fd = new FormData();
            fd.append('staffNo',staffNo);

            $.ajax({
                url: 'api_regenerate.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){

                    if(response=="1"){
                        alert("API key regenerated.");
                        location.reload();
                    }

                    if(response=="0"){
                        alert("API key failed to be regenerate.");
                    }

                    if(response=="2"){
                        alert("Could not connect to server.");
                    }

                },
            });

        });

    </script>

    <script>

        function checkEmailAvailability() {


            if($("#email").val()=='<?php echo $email;?>'){

                document.getElementById("email-availability-status").innerHTML = "";

                <?php echo "$('#submit').prop('disabled',false);";?>

                return;

            }

            $("#loaderIcon").show();
            jQuery.ajax({
                url: "admin/check_availabilityemail.php",
                data:'email='+$("#email").val(),
                type: "POST",
                success:function(data){
                    $("#email-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error:function (){}
            });
        }


    </script>


<?php

if(strcasecmp($image_check,"")!=0 && strcasecmp($image_check,"none")!=0 ){

    echo "
            <script>
            document.getElementById('image1').src = '$profile_picture';
            </script>
        ";


}

?>

<?php include ('inc/footer.php'); ?>