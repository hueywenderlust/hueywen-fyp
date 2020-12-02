<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 13/10/2018
 * Time: 5:17 PM
 */

session_start();
include('inc/config.php');


?>
<?php include('inc/sidebar.php') ?>

<div class="container-fluid">

    <h1>Trainings</h1>
    <h4>Training / Short-term Professional Course / Research Activities</h4>
    <p>Training / Short-term Professional Course / Research Activities attended abroad under Sabbatical
        / Research / Training Leave with duration of at least 2 weeks in the assessment year.
    </p>
<hr/>


    <div class="container-fluid">
        <br />
        <div class="form-group">
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name of Programme</th>
                        <th scope="col">Institution and Location</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Type of Leave Granted</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><i>Eg. </i>LU-SU research collaboration meeting</td>
                        <td>Lancaster University, UK</td>
                        <td>01/09/2016</td>
                        <td>15/09/2016</td>
                        <td>Research</td>
                    </tr>

                    <tr>
                        <th scope="row">2</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>

                <hr>

                <br>


                <p>Fields mark with <b>(<font color='red'><b>*</b></font>)</b> are required to be filled in. </p>
                <p>Click <b>"+"</b> to add a new row, and <b>"x"</b> to remove the row</p>
                <p>Click <b>"Done"</b> button to save record(s) </p>
                <p>Click <b>”Back”</b> button to dashboard</p>


                <table class="table table-hover" id="dynamic_field">

                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name of Programme<font color='red'><b>*</b></font></th>
                        <th scope="col">Institution and Location<font color='red'><b>*</b></font></th>
                        <th scope="col" style="width: 100px">Start Date<font color='red'><b>*</b></font></th>
                        <th scope="col" style="width: 100px;">End Date<font color='red'><b>*</b></font></th>
                        <th scope="col">Type of Leave Granted<font color='red'><b>*</b></font></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>

                    <tbody>

                    <td> 1 </td>

                    <td>
                        <textarea rows="3" type="text" class="form-control" id="programmeName1" placeholder="" autocomplete="off" name="programmeName"></textarea>
                    </td>

                    <td>
                        <textarea rows="3" type="text" class="form-control" id="institute_location1" placeholder="" autocomplete="off" name="institute_location"></textarea>
                    </td>

                    <td>
                        <input type="date" style="height: 85px; width: 170px" class="form-control" id="startDate1" placeholder="" autocomplete="off" name="startDate">
                    </td>

                    <td>
                        <input type="date" style="width: 170px; height: 85px" class="form-control" id="endDate1" placeholder="" autocomplete="off" name="endDate">
                    </td>

                    <td>
                        <select class="form-control" id="leaveType1" name="leaveType" style="height: 85px">
                            <option>-</option>
                            <option>Sabbatical</option>
                            <option>Research</option>
                            <option>Training</option>
                        </select>
                    </td>

                    <td>
                        <button style="margin-top: 20px" type="button" name="add" id="add" class="btn btn-outline-info"><i class="fas fa-plus"></i></button>

                    </td>
                    </tbody>
                </table>
                <br><br><br>
                <hr>

                <a class="btn btn-secondary" href="dashboard.php" role="button">Back</a>

                <button type="submit" class="btn btn-success mb-2 float-right" name="" id="done"> Done </button>

                <br><br>

            </div>

        </div>
    </div>

    <br/>

</div>
<!-- page-wrapper -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="assets-bootstrap4/js/custom.js"></script>
</body>
<script>

    var i=1;

    $(document).ready(function(){

        $('#add').click(function(){

            i++;

            $('#dynamic_field').append('<tr id="row'+i+'"><td>'+i+'</td>\n'+
                '\n' +
                '<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'programmeName'+i+'" placeholder="" autocomplete="off" name="programmeName"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'institute_location'+i+'" placeholder="" autocomplete="off" name="institute_location"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <input style="height: 85px; width: 170px" type="date" class="form-control" id="'+'startDate'+i+'" placeholder="" autocomplete="off" name="startDate">\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <input style="height: 85px; width: 170px" type="date" class="form-control" id="'+'endDate'+i+'" placeholder="" autocomplete="off" name="endDate">\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <select style="height:85px" class="form-control" id="'+'leaveType'+i+'" name="leaveType">\n' +
                '       <option>-</option>\n' +
                '       <option>Sabbatical</option>\n' +
                '       <option>Research</option>\n' +
                '       <option>Training</option>\n' +
                '    </select>\n' +
                '</td>\n' +
                '\n' +
                '    <td><button style="margin-top: 20px" type="button" name="remove" id="'+i+'" class="btn btn-outline-danger btn_remove"><i class="fas fa-times"></i></button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function(){
            i--;
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });


        $('#done').click(function(){

            var obj = [];
            var x = 1;
            while (x <= i) {

                var programmeName = document.getElementById("programmeName"+x).value;
                var institute_location = document.getElementById("institute_location"+x).value;
                var startDate = document.getElementById("startDate"+x).value;
                var endDate = document.getElementById("endDate"+x).value;
                var leaveType = document.getElementById("leaveType"+x).value;

                if(programmeName.trim() == "" ||
                    institute_location.trim() == "" ||
                    startDate.trim() == "" ||
                    endDate.trim() == "" ||
                    leaveType.trim() == ""){

                    alert("Incomplete Fields in row "+i);
                    return;
                }

                tmp = {
                    'programmeName': programmeName,
                    'institute_location': institute_location,
                    'startDate': startDate,
                    'endDate': endDate,
                    'leaveType': leaveType
                };

                obj.push(tmp);
                x++;
            }

            if (confirm('Are you sure you want to add the following ['+i+'] programme(s) ?')) {
                // Save it!
            } else {
                return;
            }

            var JSONdata = JSON.stringify(obj);

            var fd = new FormData();
            fd.append('JsonData',JSONdata);

            $.ajax({
                url: 'addTraining.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                    response = response.replace(/\s+/g, '');
                    //alert(response);
                    if(response=="1"){
                        alert("Programme(s) Added.");
                        window.location.href = "view-trainings-details.php";
                    }

                    if(response=="0"){
                        alert("Programme(s) Failed to add.");
                    }

                    if(response=="2"){
                        alert("Could not connect to server.");
                    }

                },
            });




        });
    });
</script>

<?php include('inc/footer.php'); ?>




