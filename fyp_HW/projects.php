<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 13/10/2018
 * Time: 1:22 AM
 */

session_start();
include('inc/config.php');


?>

<?php include('inc/sidebar.php')?>
<div class="container-fluid">

<!--        <div class="container">-->
            <h1>Projects</h1>
            <h4>Knowledge Diffusion Technology (Social Innovation) projects that have started, completed or still on-going
            at national and international level within assessment year.</h4>
            <p>Please provide name of project, community, sponsors, collaborators, brief description of the knowledge and
                technology, year commence and year ending. (if any)</p>
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
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Community Name</th>
                                    <th scope="col">Related Project</th>
                                    <th scope="col">Organizer / Sponsor / Funder / Collaborator</th>
                                    <th scope="col">Value of Sponsorship (RM)</th>
                                    <th scope="col">Description of Knowledge / Technology</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><i>Eg. </i>A Community-Based Study On The Effectiveness Of Flood Emergency Warning System in Malaysia</td>
                                    <td>Kelantan River Basin</td>
                                    <td>KTP project</td>
                                    <td>MoHE</td>
                                    <td>46,200</td>
                                    <td>Early warning system for flood based on questions answered directly from the community will sure help in identifying gaps
                                        and improving existing procedures and guidelines related to warning the people against the threat flood</td>
                                    <td>01/04/2015</td>
                                    <td>31/12/2016</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td><i>Eg. </i> Community Project in Cambodia</td>
                                    <td>KHLEANG SBEK Village, KANDAL Territory, Cambodia</td>
                                    <td>KTP Project</td>
                                    <td>UTM</td>
                                    <td>30,000</td>
                                    <td>UTM and NGO developed a commercial centre worth 30,000 through Pembanguanan Lestari Komuniti ASEAN program. The centre,
                                        equipped with a hostel, vehicle workshop, sewing centre, supermart and cyber centre is expected to complete 2016. Project
                                        is sponsored by NGO/Women's Welfare Association of Sakinah, Pasir Gudang.
                                    </td>
                                    <td>22/09/2015</td>
                                    <td>27/09/2016</td>
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
                                </tr>
                                </tbody>
                            </table>

                            <br><hr><br>

                            <p>Fields mark with <b>(<font color='red'><b>*</b></font>)</b> are required to be filled in. </p>
                            <p>Click <b>"+"</b> to add a new row, and <b>"x"</b> to remove the row</p>
                            <p>Click <b>"Done"</b> button to save record(s) </p>
                            <p>Click <b>”Back”</b> button to dashboard</p>


                            <table class="table table-hover" id="dynamic_field">

                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Project Name<font color='red'><b>*</b></font></th>
                                    <th scope="col">Community Name<font color='red'><b>*</b></font></th>
                                    <th scope="col">Related Project<font color='red'><b>*</b></font></th>
                                    <th scope="col">Organizer / Sponsor / Funder / Collaborator<font color='red'><b>*</b></font></th>
                                    <th scope="col">Value of Sponsorship (RM)<font color='red'><b>*</b></font></th>
                                    <th scope="col">Description of Knowledge / Technology<font color='red'><b>*</b></font></th>
                                    <th scope="col" style="width: 5%">Start Date<font color='red'><b>*</b></font></th>
                                    <th scope="col" style="width: 5%">End Date<font color='red'><b>*</b></font></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>

                                <tbody>
                                <td> 1 </td>

                                <td>
                                    <textarea rows="3" type="text" class="form-control" id="projName1" placeholder="" name="projName" required></textarea>
                                </td>

                                <td>
                                    <textarea rows="3" type="text" class="form-control" id="communityName1" placeholder="" name="communityName" required></textarea>
                                </td>

                                <td>
                                    <textarea rows="3" type="text" class="form-control" id="relatedProj1" placeholder="" name="relatedProj" required></textarea>
                                </td>

                                <td>
                                    <textarea rows="3" type="text" class="form-control" id="organizer1" placeholder="" name="organizer" required></textarea>
                                </td>

                                <td>
                                    <input style="height: 85px" type="text" class="form-control" id="sponsorship1" placeholder="" name="sponsorship" required>
                                </td>

                                <td>
                                    <textarea rows="3" type="text" class="form-control" id="description1" placeholder="" name="description" required></textarea>
                                </td>

                                <td>
                                    <input style="height: 85px; width: 170px" type="date" class="form-control" id="startDate1" placeholder="" name="startDate" required>
                                </td>

                                <td>
                                    <input style="height: 85px; width: 170px" type="date" class="form-control" id="endDate1" placeholder="" name="endDate" required>
                                </td>

                                <td>
                                    <button style="margin-top: 20px" type="button" name="add" id="add" class="btn btn-outline-info"><i class="fas fa-plus"></i>
                                    </button>
                                </td>
                                </tbody>
                            </table>
                            <br><hr>

                            <a class="btn btn-secondary" href="dashboard.php" role="button">Back</a>

                            <button type="submit" class="btn btn-success mb-2 float-right" name="add_project" id="done"> Done </button>

                        </div>

</div>
<script>
    $(document).ready(function(){
        var i=1;
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<tr id="row'+i+'"><td>'+i+'</td><td>\n' +
                '   <textarea rows="3" type="text" class="form-control" id="'+'projName'+i+'" placeholder="" name="projName"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '   <textarea rows="3" type="text" class="form-control" id="'+'communityName'+i+'" placeholder="" name="communityName"></textarea>\n' +
                '</td>\n' +
                '<td>\n' +
                '   <textarea rows="3" type="text" class="form-control" id="'+'relatedProj'+i+'" placeholder="" name="relatedProj"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '   <textarea rows="3" type="text" class="form-control" id="'+'organizer'+i+'" placeholder="" name="organizer"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '   <input style="height: 85px;" type="text" class="form-control" id="'+'sponsorship'+i+'" placeholder="" name="sponsorship">\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '   <textarea rows="3" type="text" class="form-control" id="'+'description'+i+'" placeholder="" name="description"></textarea>\n' +
                '</td>\n' +
                '\n'+
                '<td>\n' +
                '   <input style="height: 85px; width: 170px" type="date" class="form-control" id="'+'startDate'+i+'" placeholder="" name="startDate">\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '   <input style="height: 85px; width: 170px" type="date" class="form-control" id="'+'endDate'+i+'" placeholder="" name="endDate">\n' +
                '</td>\n' +
                '\n' + '<td><button style="margin-top: 20px" type="button" name="remove" id="'+i+'" class="btn btn-outline-danger btn_remove"><i class="fas fa-times"></i>\n</button></td></tr>');
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

                var projName = document.getElementById("projName"+x).value;
                var communityName = document.getElementById("communityName"+x).value;
                var relatedProj = document.getElementById("relatedProj"+x).value;
                var organizer = document.getElementById("organizer"+x).value;
                var sponsorship = document.getElementById("sponsorship"+x).value;
                var description = document.getElementById("description"+x).value;
                var startDate = document.getElementById("startDate"+x).value;
                var endDate = document.getElementById("endDate"+x).value;


                if(projName.trim() == "" ||
                    communityName.trim() == "" ||
                    relatedProj.trim() == "" ||
                    organizer.trim() == "" ||
                    sponsorship.trim() == "" ||
                    description.trim() == "" ||
                    startDate.trim() == "" ||
                    endDate.trim() == "" ){

                    alert("Incomplete Fields in row "+i);
                    return;
                }

                tmp = {
                    'projName': projName,
                    'communityName': communityName,
                    'relatedProj': relatedProj,
                    'organizer': organizer,
                    'sponsorship': sponsorship,
                    'description': description,
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
                url: 'addProjects.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){

                    response = response.replace(/\s+/g, '');
                    //alert(response);
                    if(response=="1"){
                        alert("Record(s) Added.");
                        window.location.href = "view-projects-details.php";
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
