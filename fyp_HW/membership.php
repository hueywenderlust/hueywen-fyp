<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 12/10/2018
 * Time: 5:46 PM
 */
session_start();
include('inc/config.php');


?>

<?php include ('inc/sidebar.php')?>

<div class="container-fluid">
    <h1>Professional Memberships</h1>
    <h4>National and International Professional Bodies / Association Memberships</h4>
    <p>(must be able to show evidence of membership i.e. committee member appointment letter / membership letter from association)</p>

    <br/>

        <div class="container-fluid">
            <br /><br />
            <div class="form-group">
                    <form class="table-responsive">

                        <table class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name of Association/Body/Institution/NGOs</th>
                                <th scope="col">Membership Type</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Leadership Position</th>
                                <th scope="col">Appointment Start Date</th>
                                <th scope="col">Appointment End Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td><i>Eg. </i>Institute of Electrical and Electronics Engineers Inc. (IEEE)</td>
                                <td>Senior Member</td>
                                <td>15/10/12</td>
                                <td>15/10/16</td>
                                <td>NA</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td><i>Eg. </i> RINA-IMarEST Malaysia Joint Branch - Southern Chapter</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Chair</td>
                                <td>01/01/2016</td>
                                <td>31/12/2017</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>

                        <br /><hr />

                        <p>Fields mark with <b>(<font color='red'><b>*</b></font>)</b> are required to be filled in. </p>
                        <p>Click <b>"+"</b> to add a new row, and <b>"x"</b> to remove the row</p>
                        <p>Click <b>"Done"</b> button to save record(s) </p>
                        <p>Click <b>”Back”</b> button to dashboard</p>


                        <table class="table table-hover" id="dynamic_field">

                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name of Association/Body/Institution/NGOs<font color='red'><b>*</b></font></th>
                                <th scope="col">Membership Type</th>
                                <th style="width: 90px" scope="col">Start Date</th>
                                <th style="width: 90px" scope="col">End Date</th>
                                <th style="width: 100px" scope="col">Leadership Position<font color='red'><b>*</b></font></th>
                                <th scope="col">Appointment Start Date</th>
                                <th scope="col">Appointment End Date</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>

                            <tbody>
                            <td> 1 </td>

                            <td>
                                <textarea rows="3" type="text" class="form-control" id="name1" placeholder="" name="name"></textarea>
                            </td>

                            <td>
                                <select style="height: 85px" class="form-control" id="memberType1" name="memberType">
                                    <option>-</option>
                                    <option>Life</option>
                                    <option>Ordinary</option>
                                    <option>Senior</option>
                                </select>
                            </td>

                            <td>
                                <input style="width: 170px; height: 85px" type="date" class="form-control" id="startDate1" placeholder="" name="startDate">
                            </td>

                            <td>
                                <input style="width: 170px; height: 85px" type="date" class="form-control" id="endDate1" placeholder="" name="endDate">
                            </td>

                            <td>
                                <select style="width: 180px; height: 85px" class="form-control" id="position1" name="position">
                                    <option>-</option>
                                    <option>NA</option>
                                    <option>Chair</option>
                                    <option>Committee Member</option>
                                </select>
                            </td>

                            <td>
                                <input style="height: 85px" type="date" class="form-control" id="appointmentStart1" placeholder="" name="appointmentStart">
                            </td>

                            <td>
                                <input style="height: 85px" type="date" class="form-control" id="appointmentEnd1" placeholder="" name="appointmentEnd">
                            </td>

                            <td>
                                <button style="margin-top: 20px" type="button" name="add" id="add" class="btn btn-outline-info"><i class="fas fa-plus"></i></button>

                            </td>
                            </tbody>
                        </table>
                        <br><br>


                    </div>
            <br><br><br>
            <hr>
            <div class="container-fluid">
                <a class="btn btn-secondary" href="dashboard.php" role="button">Back</a>
                <button type="submit" class="btn btn-success mb-2 float-right" name="add_membership" id="done">Done</button>
            </div>




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

                        $('#dynamic_field').append('<tr id="row'+i+'"><td>'+i+'</td><td><textarea rows="3" type="text" class="form-control" id="'+'name'+i+'" placeholder="" name="name"></textarea></td><td>\n' +
                            '    <select style="height: 85px" class="form-control" id="'+'memberType'+i+'" name="memberType">\n' +
                            '       <option>-</option>\n' +
                            '       <option>Life</option>\n' +
                            '       <option>Ordinary</option>\n' +
                            '       <option>Senior</option>\n' +
                            '    </select>\n' +
                            '</td>\n' +
                            '\n' +
                            '<td>\n' +
                            '    <input style="width: 170px; height: 85px" type="date" class="form-control" id="'+'startDate'+i+'" placeholder="" name="startDate">\n' +
                            '</td>\n' +
                            '\n' +
                            '<td>\n' +
                            '    <input style="width: 170px; height: 85px" type="date" class="form-control" id="'+'endDate'+i+'" placeholder="" name="endDate">\n' +
                            '</td>\n' +
                            '\n' +
                            '<td>\n' +
                            '    <select style="width: 180px; height: 85px" class="form-control" id="'+'position'+i+'" name="position">\n' +
                            '        <option>-</option>\n' +
                            '        <option>NA</option>\n' +
                            '        <option>Chair</option>\n' +
                            '        <option>Committee Member</option>\n' +
                            '    </select>\n' +
                            '</td>\n' +
                            '\n' +
                            '<td>\n' +
                            '    <input style="height: 85px" type="date" class="form-control" id="'+'appointmentStart'+i+'" placeholder="" name="appointmentStart">\n' +
                            '</td>\n' +
                            '\n' +
                            '<td>\n' +
                            '    <input style="height: 85px" type="date" class="form-control" id="'+'appointmentEnd'+i+'" placeholder="" name="appointmentEnd">\n' +
                            '</td>\n' +
                            '\n' +
                            '<td><button style="margin-top: 20px" type="button" name="remove" id="'+i+'" class="btn btn-outline-danger btn_remove"><i class="fas fa-times"></i></button></td></tr>');
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

                            var name = document.getElementById("name"+x).value;
                            var memberType = document.getElementById("memberType"+x).value;
                            var startDate = document.getElementById("startDate"+x).value;
                            var endDate = document.getElementById("endDate"+x).value;
                            var position = document.getElementById("position"+x).value;
                            var appointmentStart = document.getElementById("appointmentStart"+x).value;
                            var appointmentEnd = document.getElementById("appointmentEnd"+x).value;


                            if(name.trim() == "" ||
                                memberType.trim() == "" ||
                                // startDate.trim() == "" ||
                                // endDate.trim() == "" ||
                                position.trim() == ""
                                // appointmentStart.trim() == "" ||
                                // appointmentEnd.trim() == ""
                                ){

                                alert("Incomplete Fields in row "+i);
                                return;
                            }

                            tmp = {
                                'name': name,
                                'memberType': memberType,
                                'startDate': startDate,
                                'endDate': endDate,
                                'position': position,
                                'appointmentStart': appointmentStart,
                                'appointmentEnd': appointmentEnd
                            };

                            obj.push(tmp);
                            x++;
                        }

                        if (confirm('Are you sure you want to add the following ['+i+'] record(s) ?')) {
                            // Save it!
                        } else {
                            return;
                        }

                        var JSONdata = JSON.stringify(obj);

                        var fd = new FormData();
                        fd.append('JsonData',JSONdata);

                        $.ajax({
                            url: 'addMembership.php',
                            type: 'POST',
                            data: fd,
                            contentType: false,
                            processData: false,
                            success: function(response){

                                response = response.replace(/\s+/g, '');

                                //alert(response);
                                if(response=="1"){
                                    alert("Record(s) Added.");
                                    window.location.href = "view-membership-details.php";
                                }

                                if(response=="0"){
                                    alert("Record(s) Failed to add.");
                                }

                                if(response=="2"){
                                    alert("Could not connect to server.");
                                }

                            },
                        });




                    });
                });
            </script>

</div>

<?php include ('inc/footer.php')?>
