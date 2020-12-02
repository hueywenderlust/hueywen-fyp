<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 13/10/2018
 * Time: 1:52 AM
 */

session_start();
include('inc/config.php');


?>

<?php include('inc/sidebar.php')?>
<div class="container-fluid">

<!--        <div class="container">-->
            <h1>Individual and Collaborative Research</h1>
            <h4>Individual or Collaborative Research activities under MoA with partner institutions that have started, completed or still on-going at national or international level within assessment year</h4>
            <ul>
                <li>Please provide name of project, collaborators name and their affiliation, funding body, year commence and year ending. (if any)</li>
                <li>Indicate that you are a project leader or a member</li>
            </ul>
            <br>
            <hr>
<!--            <div class="container">-->
                <br /><br />
                <div class="form-group">
                        <div class="table-responsive">

                            <table class="table table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title of Research / Programme</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Collaborator's Name and Institution</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">Name of MoA / LoA</th>
                                    <th scope="col">Funding Body</th>
                                    <th scope="col">Funding Amount (RM)</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><i>Eg. </i>Stock Prediction Based on News Text Mining</td>
                                    <td>Malaysia</td>
                                    <td>Prof xxx, University of Malaya, Malaysia</td>
                                    <td>Leader</td>
                                    <td>UM-Sunway MoA</td>
                                    <td>UM and SU</td>
                                    <td>200,000</td>
                                    <td>04/01/2016</td>
                                    <td>03/03/2018</td>
                                </tr>

                                <tr>
                                    <th scope="row">2</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>

<br><hr>
                            <p>Fields mark with <b>(<font color='red'><b>*</b></font>)</b> are required to be filled in. </p>
                            <p>Click <b>"+"</b> to add a new row, and <b>"x"</b> to remove the row</p>
                            <p>Click <b>"Done"</b> button to save record(s) </p>
                            <p>Click <b>”Back”</b> button to dashboard</p>


                            <table class="table table-hover" id="dynamic_field">

                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title of Research / Programme<font color='red'><b>*</b></font></th>
                                    <th scope="col">Country<font color='red'><b>*</b></font></th>
                                    <th scope="col">Collaborator's Name and Institution<font color='red'><b>*</b></font></th>
                                    <th scope="col">Position<font color='red'><b>*</b></font></th>
                                    <th scope="col">Name of MoA / LoA<font color='red'><b>*</b></font></th>
                                    <th scope="col">Funding Body<font color='red'><b>*</b></font></th>
                                    <th scope="col">Funding Amount (RM)<font color='red'><b>*</b></font></th>
                                    <th scope="col" style="width: 100px">Start Date<font color='red'><b>*</b></font></th>
                                    <th scope="col" style="width: 100px">End Date<font color='red'><b>*</b></font></th>
                                    <th scope="col" style="width: 5%"></th>
                                </tr>
                                </thead>

                                <tbody>
                                <td> 1 </td>

                                <td>
                                    <textarea rows="3" type="text" class="form-control" id="researchTitle1" placeholder="" autocomplete="off" name="researchTitle" required></textarea>
                                </td>

                                <td>
                                    <input style="height: 85px" type="text" class="form-control" id="country1" placeholder="" autocomplete="off" name="country" required>
                                </td>

                                <td>
                                    <textarea rows="3" type="text" class="form-control" id="collabName1" placeholder="" autocomplete="off" name="collabName" required></textarea>
                                </td>


                                <td>
                                    <select style="height: 85px; width: 100px" class="form-control" id="position1" name="position">
                                        <option>-</option>
                                        <option>Leader</option>
                                        <option>Member</option>
                                    </select>
                                </td>

                                <td>
                                    <textarea rows="3" type="text" class="form-control" id="moa_loa1" placeholder="" autocomplete="off" name="moa_loa" required></textarea>
                                </td>

                                <td>
                                    <textarea rows="3" type="text" class="form-control" id="fundingBody1" placeholder="" autocomplete="off" name="fundingBody" required></textarea>
                                </td>

                                <td>
                                    <input style="height: 85px" type="text" class="form-control" id="fundingAmount1" placeholder="" autocomplete="off" name="fundingAmount" required>
                                </td>

                                <td>
                                    <input style="width: 170px; height: 85px" type="date" class="form-control" id="startDate1" placeholder="" autocomplete="off" name="startDate" required>
                                </td>

                                <td>
                                    <input style="width: 170px; height: 85px" type="date" class="form-control" id="endDate1" placeholder="" autocomplete="off" name="endDate" required>
                                </td>

                                <td>
                                    <button style="margin-top: 20px" type="button" name="add" id="add" class="btn btn-outline-info"><i class="fas fa-plus"></i></button>
                                </td>
                                </tbody>
                            </table>
                            <br><hr>

                            <a class="btn btn-secondary" href="dashboard.php" role="button">Back</a>

                            <button type="submit" class="btn btn-success mb-2 float-right" name="add_research" id="done"> Done </button>
                        </div>

</div>
<script>
    $(document).ready(function(){
        var i=1;
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<tr id="row'+i+'"><td>'+i+'</td><td>\n' +
                '   <textarea rows="3" type="text" class="form-control" id="'+'researchTitle'+i+'" placeholder="" autocomplete="off" name="researchTitle"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '   <input style="height: 85px" type="text" class="form-control" id="'+'country'+i+'" placeholder="" autocomplete="off" name="country">\n' +
                '</td>\n' +
                '<td>\n' +
                '   <textarea rows="3" type="text" class="form-control" id="'+'collabName'+i+'" placeholder="" autocomplete="off" name="collabName"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td> \n'+
                '<select style="height: 85px" class="form-control" id="'+'position'+i+'" name="position"> \n'+
                '<option>-</option> \n'+
                '<option>Leader</option> \n'+
                '<option>Member</option> \n' +
                '</select> \n' +
                '</td>\n' +
                '<td>\n' +
                '   <textarea rows="3" type="text" class="form-control" id="'+'moa_loa'+i+'" placeholder="" autocomplete="off" name="moa_loa"></textarea>\n' +
                '</td>\n' +
                '<td>\n' +
                '   <textarea rows="3" type="text" class="form-control" id="'+'fundingBody'+i+'" placeholder="" autocomplete="off" name="fundingBody"></textarea>\n' +
                '</td>\n' +
                '\n'+
                '<td>\n' +
                '   <input style="height: 85px" type="text" class="form-control" id="'+'fundingAmount'+i+'" placeholder="" autocomplete="off" name="fundingAmount">\n' +
                '</td>\n' +
                '\n'+
                '<td>\n' +
                '   <input style="width: 170px; height: 85px" type="date" class="form-control" id="'+'startDate'+i+'" placeholder="" autocomplete="off" name="startDate">\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '   <input style="width: 170px; height: 85px" type="date" class="form-control" id="'+'endDate'+i+'" placeholder="" autocomplete="off" name="endDate">\n' +
                '</td>\n' +
                '\n' + '<td><button style="margin-top: 20px" type="button" name="remove" id="'+i+'" class="btn btn-outline-danger btn_remove"><i class="fas fa-times"></i></button></td></tr>');
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

                var researchTitle = document.getElementById("researchTitle"+x).value;
                var country = document.getElementById("country"+x).value;
                var collabName = document.getElementById("collabName"+x).value;
                var position = document.getElementById("position"+x).value;
                var moa_loa = document.getElementById("moa_loa"+x).value;
                var fundingBody = document.getElementById("fundingBody"+x).value;
                var fundingAmount = document.getElementById("fundingAmount"+x).value;
                var startDate = document.getElementById("startDate"+x).value;
                var endDate = document.getElementById("endDate"+x).value;


                if(researchTitle.trim() == "" ||
                    country.trim() == "" ||
                    collabName.trim() == "" ||
                    position.trim() == "" ||
                    moa_loa.trim() == "" ||
                    fundingBody.trim() == "" ||
                    fundingAmount.trim() == "" ||
                    startDate.trim() == "" ||
                    endDate.trim() == "" ){

                    alert("Incomplete Fields in row "+i);
                    return;
                }

                tmp = {
                    'researchTitle': researchTitle,
                    'country': country,
                    'collabName': collabName,
                    'position': position,
                    'moa_loa': moa_loa,
                    'fundingBody': fundingBody,
                    'fundingAmount': fundingAmount,
                    'startDate': startDate,
                    'endDate': endDate
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
                url: 'addResearchActivities.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){

                    response = response.replace(/\s+/g, '');
                    //alert(response);
                    if(response=="1"){
                        alert("Record(s) Added.");
                        window.location.href = "view-research-activities-details.php";
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

<?php include('inc/footer.php') ?>
