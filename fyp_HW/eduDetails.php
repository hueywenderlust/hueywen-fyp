<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 12/10/2018
 * Time: 4:44 PM
 */

include('inc/config.php');
//


?>

<?php include ('inc/sidebar.php'); ?>
<body>
<div class="container-fluid">
    <h1>Education Details</h1>
    <h4>Highest qualification obtained </h4>
    <p>(including professional qualifications such as IR, AR, FRCP, ACCA, MMED etc.)</p>

    <br/>


        <div class="container-fluid">
            <br /><br />
            <div class="form-group">
                    <div class="table-responsive">

                        <table class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Education Levels</th>
                                <th scope="col">Degree Name</th>
                                <th scope="col">Membership Registration No</th>
                                <th scope="col">Year</th>
                                <th scope="col">Institution</th>
                                <th scope="col">Country</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td><i>Eg. </i>PhD</td>
                                <td>Computer Science</td>
                                <td></td>
                                <td>1992-1996</td>
                                <td>U of X</td>
                                <td>Malaysia</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td><i>Eg. </i> IR</td>
                                <td></td>
                                <td>BEM 123</td>
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
                                <td></td>
                            </tr>
                            </tbody>
                        </table>

                        <br/>

                        <hr>

                        <p>Fields mark with <b>(<font color='red'><b>*</b></font>)</b> are required to be filled in. </p>
                        <p>Click <b>"+"</b> to add a new row, and <b>"x"</b> to remove the row</p>
                        <p>Click <b>"Done"</b> button to save record(s) </p>
                        <p>Click <b>”Back”</b> button to dashboard</p>



                        <table class="table table-hover" id="dynamic_field">

                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Education Levels<font color='red'><b>*</b></font></th>
                                <th scope="col">Degree Name<font color='red'><b>*</b></font></th>
                                <th scope="col">Membership Registration No</th>
                                <th scope="col">Year<font color='red'><b>*</b></font></th>
                                <th scope="col">Institution<font color='red'><b>*</b></font></th>
                                <th scope="col">Country<font color='red'><b>*</b></font></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>

                            <tbody>
                            <td> 1 </td>

                            <td>
                                <select style="height: 85px;" class="form-control" id="eduLevel1" name="eduLevel">
                                    <option>-</option>
                                    <option>Certificates</option>
                                    <option>Bachelors Degrees</option>
                                    <option>Masters</option>
                                    <option>Doctoral Degrees</option>
                                    <option>Professional Qualification</option>
                                </select>
                            </td>

                            <td>
                                <textarea rows="3" type="text" class="form-control" id="degreeName1" autocomplete="off" placeholder="" name="degreeName"></textarea>
                            </td>

                            <td>
                                <input style="height: 85px;" type="text" class="form-control" id="memberRegNo1" autocomplete="off" placeholder="" name="memberRegNo">
                            </td>

                            <td>
                                <input style="height: 85px; width: 120px" type="text" class="form-control" id="year1" autocomplete="off" placeholder="" name="year">
                            </td>

                            <td>
                                <textarea rows="3" type="text" class="form-control" id="institute1" autocomplete="off" placeholder="" name="institute"></textarea>
                            </td>

                            <td>
                                <input style="height: 85px;" type="text" class="form-control" id="country1" autocomplete="off" placeholder="" name="country">
                            </td>

                            <td>
                                <button style="margin-top: 20px" type="button" name="add_Edu" id="add" class="btn btn-outline-info"><i class="fas fa-plus"></i></button>

                            </td>
                            </tbody>
                        </table>

                        <br><br>

                        <hr>

                        <a class="btn btn-secondary" href="dashboard.php" role="button">Back</a>

<!--                        <a class="btn btn-success float-right" href="view-eduQualification-details.php" id="done" role="button">Done</a>-->

                        <button type="submit" class="btn btn-success mb-2 float-right" name="" id="done"> Done </button>

                        <br><br>
                        <br><br><br>


</div>
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

                                $('#dynamic_field').append('<tr id="row'+i+'"><td>'+i+'</td><td>\n' +
                                    '                                            <select style="height: 85px;" class="form-control" id="'+'eduLevel'+i+'" name="eduLevel">\n' +
                                    '                                               <option>-</option>\n' +
                                    '                                               <option>Certificates</option>\n' +
                                    '                                               <option>Bachelors Degrees</option>\n' +
                                    '                                               <option>Masters</option>\n' +
                                    '                                               <option>Doctoral Degrees</option>\n' +
                                    '                                           </select>\n' +
                                    '                                        </td>\n' +
                                    '\n' +
                                    '                                        <td>\n' +
                                    '                                            <textarea rows="3" type="text" class="form-control" id="'+'degreeName'+i+'" placeholder="" name="degreeName"></textarea>\n' +
                                    '                                        </td>\n' +
                                    '\n' +
                                    '                                        <td>\n' +
                                    '                                            <input style="height: 85px;" type="text" class="form-control" id="'+'memberRegNo'+i+'" placeholder="" name="memberRegNo">\n' +
                                    '                                        </td>\n' +
                                    '\n' +
                                    '                                        <td>\n' +
                                    '                                            <input style="height: 85px; width:120px ;" type="text" class="form-control" id="'+'year'+i+'" placeholder="" name="year">\n' +
                                    '                                        </td>\n' +
                                    '\n' +
                                    '                                        <td>\n' +
                                    '                                            <textarea rows="3" type="text" class="form-control" id="'+'institute'+i+'" placeholder="" name="institute"></textarea>\n' +
                                    '                                        </td>\n' +
                                    '\n' +
                                    '                                       <td>\n' +
                                    '                                            <input style="height: 85px;" type="text" class="form-control" id="'+'country'+i+'" placeholder="" name="country">\n' +
                                    '                                        </td>\n' +
                                    '\n' +
                                    '                                        <td><button style="margin-top: 20px" type="button" name="remove" id="'+i+'" class="btn btn-outline-danger btn_remove"><i class="fas fa-times"></i></button></td></tr>');
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

                                    var eduLevel = document.getElementById("eduLevel"+x).value;
                                    var degreeName = document.getElementById("degreeName"+x).value;
                                    var memberRegNo = document.getElementById("memberRegNo"+x).value;
                                    var year = document.getElementById("year"+x).value;
                                    var institute = document.getElementById("institute"+x).value;
                                    var country = document.getElementById("country"+x).value;

                                    if(eduLevel.trim() == "" ||
                                        degreeName.trim() == "" ||
                                        // memberRegNo.trim() == "" ||
                                        year.trim() == "" ||
                                        institute.trim() == "" ||
                                        country.trim() == "" ){

                                        alert("Incomplete Fields in row "+i);
                                        return false;
                                    }

                                    tmp = {
                                        'eduLevel': eduLevel,
                                        'degreeName': degreeName,
                                        'memberRegNo': memberRegNo,
                                        'year': year,
                                        'institute': institute,
                                        'country': country
                                    };

                                    obj.push(tmp);
                                    x++;
                                }

                                if (confirm('Are you sure you want to add the following ['+i+'] record(s) ?')) {
                                    // Save it!
                                } else {
                                    return false;
                                }

                                var JSONdata = JSON.stringify(obj);

                                var fd = new FormData();
                                fd.append('JsonData',JSONdata);

                                $.ajax({
                                    url: 'addEduDetails.php',
                                    type: 'POST',
                                    data: fd,
                                    contentType: false,
                                    processData: false,
                                    success: function(response){

                                        response = response.replace(/\s+/g, '');
                                        //alert(response);
                                        if(response=="1"){
                                            alert("Record(s) Added.");
                                            window.location.href = "view-eduQualification-details.php";
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

                    <?php include ('inc/footer.php'); ?>
