<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 26/10/2018
 * Time: 1:28 AM
 */

session_start();
include('inc/config.php');

?>

<?php include ('inc/sidebar.php')?>
<body>
<div class="container-fluid">
    <h1>Working History</h1>
    <hr/> <br/>


    <p>Fields mark with <b>(<font color='red'><b>*</b></font>)</b> are required to be filled in. </p>
    <p>Click <b>"+"</b> to add a new row, and <b>"x"</b> to remove the row</p>
    <p>Click <b>"Done"</b> button to save record(s) </p>
    <p>Click <b>”Back”</b> button to dashboard</p>
    <hr>

    <h6>Work History</h6><br>
        <div class="row">
            <table class="table table-hover" id="dynamic_field">

                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Position</th>
                    <th scope="col">Company</th>
                    <th scope="col" style="width: 150px">From (Month-Year)</th>
                    <th scope="col" style="width: 150px">To (Month-Year)</th>
                    <th scope="col">Details</th>
                    <th scope="col"></th>
                </tr>
                </thead>

                <tbody>
                <td> 1 </td>

                <td>
                    <textarea class="form-control" id="jobPosition1" placeholder="" name="jobPosition"></textarea>
                </td>

                <td>
                    <textarea style="height: 60px;" type="text" class="form-control" id="company1" placeholder="" name="company"></textarea>
                </td>

                <td>
                    <input style="height: 60px; width: 150px" type="text" class="form-control" id="startYear1" placeholder="" name="startYear">
                </td>

                <td>
                    <input style="height: 60px; width: 150px" type="text" class="form-control" id="endYear1" placeholder="" name="endYear">
                </td>


                <td>
                    <textarea type="text" class="form-control" id="description1" placeholder="" name="description"></textarea>
                </td>


                <td>
                    <button style="margin-top: 10px" type="button" name="add" id="add" class="btn btn-outline-info"><i class="fas fa-plus"></i></button>

                </td>

                </tbody>
            </table>


        </div>
        <br><hr>
        <br />

        <div class="container-fluid">
            <a class="btn btn-secondary" href="dashboard.php" role="button">Back</a>
            <button type="" class="btn btn-success mb-2 float-right" name="add_personal" id="done">Done</button>
        </div>


</div>
</body>
<script>
    var i=1;

    $(document).ready(function(){

        $('#add').click(function(){

            i++;

            $('#dynamic_field').append('<tr id="row'+i+'"><td>'+i+'</td>\n' +
                '\n' +
                '<td>\n' +
                '    <textarea style="height: 60px;" type="text" class="form-control" id="'+'jobPosition'+i+'" placeholder="" name="jobPosition"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <textarea type="text" class="form-control" id="'+'company'+i+'" placeholder="" name="company"></textarea>\n' +
                '</td>\n' +
                '<td>\n' +
                '    <input style="height: 60px; width:150px;" type="text" class="form-control" id="'+'startYear'+i+'" placeholder="" name="startYear">\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <input style="height: 60px; width:150px;" type="text" class="form-control" id="'+'endYear'+i+'" placeholder="" name="endYear">\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <textarea type="text" class="form-control" id="'+'description'+i+'" placeholder="" name="description"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td><button style="margin-top: 10px" type="button" name="remove" id="'+i+'" class="btn btn-outline-danger btn_remove"><i class="fas fa-times"></i>\n</button></td></tr>');
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

                var jobPosition = document.getElementById("jobPosition"+x).value;
                var company = document.getElementById("company"+x).value;
                var startYear = document.getElementById("startYear"+x).value;
                var endYear = document.getElementById("endYear"+x).value;
                var description = document.getElementById("description"+x).value;

                if(jobPosition.trim() == "" ||
                    company.trim() == "" ||
                    startYear.trim() == "" ||
                    endYear.trim() == "" ||
                    description.trim() == ""){

                    alert("Incomplete Fields in row "+i);
                    return;
                }



                tmp = {
                    'jobPosition': jobPosition,
                    'company': company,
                    'startYear': startYear,
                    'endYear': endYear,
                    'description': description
                };

                obj.push(tmp);
                x++;
            }

            if (confirm('Are you sure you want to add the following ['+i+'] record?')) {
                // Save it!
            } else {
                return;
            }

            var JSONdata = JSON.stringify(obj);

            var fd = new FormData();
            fd.append('JsonData',JSONdata);

            $.ajax({
                url: 'addWorkingXp.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){

                    response = response.replace(/\s+/g, '');
                    //alert(response);
                    if(response=="1"){
                        alert(" Added.");
                        window.location.href = "view-workingXp-details.php";
                    }

                    if(response=="0"){
                        alert("Failed to add.");
                    }

                    if(response=="2"){
                        alert("Could not connect to server.");
                    }

                },
            });




        });
    });
</script>


<?php include ('inc/footer.php')?>
