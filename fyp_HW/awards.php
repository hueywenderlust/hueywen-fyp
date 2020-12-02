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
<body>
<div class="container-fluid">
    <h1>Awards</h1>
    <h4>Awards / Fellowships / Scholarship / Stewardship / Task Force (committee position) conferred by national and international learned and professional bodies in the year of assessed.</h4>
    <p>(<i>*Best paper awards.</i>
        <br>
        <i>Conference / Track Chair, Journal Editorship, and fellow/senior membership in associations were not considered stewardship on 2016 MYRA Glossary.</i>)</p>
    <ul>
        <li>Evidenced by award certificates, appointment letter, photos, announcement on official website etc.</li>
    </ul>
<hr/>
<!--    <form method="post" name = "add_awards">-->

        <div class="container-fluid">
            <br />
            <div class="form-group">
                <div class="table-responsive">

                    <table class="table table-bordered table-sm">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name of Award conferred / Committee Position appointed</th>
                            <th scope="col">Conferring Body</th>
                            <th scope="col">Type</th>
                            <th scope="col">Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td><i>Eg. </i>Gold</td>
                            <td>Malaysian Association Research Scientist (MARS)</td>
                            <td>Invention Award</td>
                            <td>Invention Title: Indoor Air Quality Monitoring Portable Design</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td><i>Eg. </i>Morton Medal Institution of Chemical Engineers Global Award for Excellent in Chemical Engineering Education</td>
                            <td>Institution of Chemical Engineering (ICE)</td>
                            <td>Recognition</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td><i>Eg. </i>Fullbright Fellowship</td>
                            <td>Fullbright</td>
                            <td>Fellowship</td>
                            <td>Fullbright Fellowship</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td><i>Eg. </i>Advisory Board Member</td>
                            <td>Special Economic Committee (JKE), Malaysia</td>
                            <td>Stewardship</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        </tbody>
                    </table>

                    <br>
                    <hr>

                    <p>Fields mark with <b>(<font color='red'><b>*</b></font>)</b> are required to be filled in. </p>
                    <p>Click <b>"+"</b> to add a new row, and <b>"x"</b> to remove the row</p>
                    <p>Click <b>"Done"</b> button to save record(s) </p>
                    <p>Click <b>”Back”</b> button to dashboard</p>


                    <table class="table table-hover" id="dynamic_field">

                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name of Award conferred / Committee Position appointed<font color='red'><b>*</b></font></th>
                            <th scope="col">Conferring Body<font color='red'><b>*</b></font></th>
                            <th scope="col">Type<font color='red'><b>*</b></font></th>
                            <th scope="col">Details</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>

                        <tbody>
                        <td> 1 </td>

                        <td>
                            <textarea rows="3" type="text" class="form-control" id="awardName1" placeholder="" autocomplete="off" name="awardName"></textarea>
                        </td>

                        <td>
                            <textarea rows="3" type="text" class="form-control" id="conferringBody1" placeholder="" autocomplete="off" name="conferringBody"></textarea>
                        </td>

                        <td>
                            <select style="height: 85px;" class="form-control" id="awardType1" name="awardType">
                                <option>-</option>
                                <option>Invention Award</option>
                                <option>Recognition</option>
                                <option>Fellowship</option>
                                <option>Stewardship</option>
                            </select>
                        </td>


                        <td>
                            <textarea rows="3" type="text" class="form-control" id="awardDetails1" placeholder="" autocomplete="off" name="awardDetails"></textarea>
                        </td>


                        <td>
                            <button style="margin-top: 20px" type="button" name="add" id="add" class="btn btn-outline-info"><i class="fas fa-plus"></i></button>

                        </td>
                        </tbody>
                    </table>
                    <br><br><br>
                    <hr>

                    <div class="container-fluid">
                        <a class="btn btn-secondary" href="dashboard.php" role="button">Back</a>
                        <button type="submit" id="done" class="btn btn-success mb-2 float-right" name="add_awards">Done</button>
                    </div>
            </div>
<!--    </form>-->


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

            $('#dynamic_field').append('<tr id="row'+i+'"><td>'+i+'</td>\n' +
                '\n' +
                '<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'awardName'+i+'" placeholder="" autocomplete="off" name="awardName"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'conferringBody'+i+'" placeholder="" autocomplete="off" name="conferringBody"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n'+
                '<select style="height: 85px;" class="form-control" id="'+'awardType1'+i+'" name="awardType">\n'+
                '<option>-</option>\n' +
                '<option>Invention Award</option>\n'+
                '<option>Recognition</option>\n'+
                '<option>Fellowship</option>\n'+
                '<option>Stewardship</option>\n'+
                '</select>\n'+
                '</td>\n'+
                '\n' +
                '<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'awardDetails'+i+'" placeholder="" autocomplete="off" name="awardDetails"></textarea>\n' +
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

                var awardName = document.getElementById("awardName"+x).value;
                var conferringBody = document.getElementById("conferringBody"+x).value;
                var awardType = document.getElementById("awardType"+x).value;
                var awardDetails = document.getElementById("awardDetails"+x).value;

                if(awardName.trim() == "" ||
                    conferringBody.trim() == "" ||
                    awardType.trim() == ""
                    // || awardDetails.trim() == ""
                ){

                    alert("Incomplete Fields in row "+i);
                    return;
                }

                tmp = {
                    'awardName': awardName,
                    'conferringBody': conferringBody,
                    'awardType': awardType,
                    'awardDetails': awardDetails
                };

                obj.push(tmp);
                x++;
            }

            if (confirm('Are you sure you want to add the following ['+i+'] award(s) ?')) {
                // Save it!
            } else {
                return;
            }

            var JSONdata = JSON.stringify(obj);

            var fd = new FormData();
            fd.append('JsonData',JSONdata);

            $.ajax({
                url: 'addAwards.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){

                    response = response.replace(/\s+/g, '');

                    // alert(response);
                    if(response =="1"){
                        alert("Award(s) Added.");
                        window.location.href = "view-awards-details.php"
                    }

                    if(response=="0"){
                        alert("Award(s) Failed to add.");
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
