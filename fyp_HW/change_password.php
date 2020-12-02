<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 12/10/2018
 * Time: 4:36 PM
 */

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
        <h1>Change Password</h1>
        <hr/> <br/>

        <div class="row">

            <div class="form-group col-md-4">
                <label for="exampleFormControlInput1">Old Password</label>
                <input type="password" class="form-control" id="old_password" placeholder="" autocomplete="off" name="old_password" required  >
            </div>

            <div class="form-group col-md-4">
                <label for="exampleFormControlInput1">New Password</label>
                <input type="password" class="form-control" id="new_password" placeholder="" name="new_password" required >
            </div>

            <div class="form-group col-md-4">
                <label for="exampleFormControlInput1">Verify New Password</label>
                <input type="password" class="form-control" id="new_password_2" placeholder="" name="new_password_2" required > 
            </div>

        </div>
        <br />

       

        </div>
        <hr>
        <br />

        <div class="container-fluid">
            <a class="btn btn-secondary" href="dashboard.php" role="button">Back</a>
            <button id="done" class="btn btn-success mb-2 float-right" name="add_personal">Done</button>
        </div>

        </form>
    </div>

    <script>

        $('#done').click(function(){

            var old_password = document.getElementById("old_password").value;
            var new_password = document.getElementById("new_password").value;
            var new_password_2 = document.getElementById("new_password_2").value;
           
            if(old_password.trim() == "" ||
        		new_password.trim() == "" ||
        		new_password_2.trim() == "" 
                ){

                alert("Please fill up all the fields.");
                return;
            }

            if(new_password.trim() !== new_password_2.trim()){
            		
         			alert("New passwords does not match.");
                    return;
              }

            if(new_password.length<6){
        		
     			alert("New passwords must be at least 6 characters long.");
                return;
          }

            if (confirm('Are you sure you want to update your personal information ?')) {
                // Save it!
            } else {
                return;
            }

            var fd = new FormData();
            fd.append('old_password',old_password);
            fd.append('new_password',new_password);
            fd.append('new_password_2',new_password_2);


            $.ajax({
                url: 'change_password_process.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){

                    if(response=="1"){
                        alert("Password updated.");
                        location.reload();
                    }

                    if(response=="2"){
                        alert("Password failed to change, invalid old password.");
                    }

                    if(response=="3"){
                        alert("Could not connect to server.");
                    }

                },
            });

        });

     

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