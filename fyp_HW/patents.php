<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 13/10/2018
 * Time: 5:28 PM
 */

session_start();
include('inc/config.php');



?>

<?php include ('inc/sidebar.php')?>

    <div class="container-fluid">

        <h1>Patents</h1><br>
            <p>Please furnish information on patent(s) and approved patent(s) within the assessment
                year which Sunway University is a joint or full owner. </p>
            <ul>
                <li>Patent-in-application <b><u>MUST</u></b> be evidenced by PT 1 form.</li>
            </ul>

            <br/>
            <form method="post" name = "add_patents">

                <div class="container-fluid">
                    <br /><br />
                    <div class="form-group">
                        <div class="table-responsive">

                            <table class="table table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Patent ID</th>
                                    <th scope="col">Year Granted</th>
                                    <th scope="col">Investors' Name</th>
                                    <th scope="col">Patent Name</th>
                                    <th scope="col">Country Filed</th>
                                    <th scope="col">Date Filed</th>
                                    <th scope="col">Date Granted</th>
                                    <th scope="col">Date Obtain Certificate</th>
                                    <th scope="col">Expiry Date</th>
                                    <th scope="col">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><i>Eg. </i>PI2014702934</td>
                                    <td>NA</td>
                                    <td>Assoc. Prof. Dr. Maiziwan Mel</td>
                                    <td>Method for Preparing Spherical Shaped Polous Ceramic Microcarrier using Sago as Porgens</td>
                                    <td>Malaysia</td>
                                    <td>07/01/2015</td>
                                    <td>NA</td>
                                    <td>NA</td>
                                    <td>NA</td>
                                    <td>Pending</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td><i>Eg. </i>P12066 4742<br> MY-143230A</td>
                                    <td>2015</td>
                                    <td>Dr. XXX</td>
                                    <td>Production of Bioethanol by Single State Bioconversion of Sweage Treatment Plant Sludge</td>
                                    <td>Malaysia</td>
                                    <td>22/12/2006</td>
                                    <td>31/03/2015</td>
                                    <td>22/12/2005</td>
                                    <td>22/12/2025</td>
                                    <td>Granted</td>
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
                                        <th scope="col">Patent ID<font color='red'><b>*</b></font></th>
                                        <th scope="col">Year Granted</th>
                                        <th scope="col">Investors' Name<font color='red'><b>*</b></font></th>
                                        <th scope="col">Patent Name<font color='red'><b>*</b></font></th>
                                        <th scope="col">Country Filed<font color='red'><b>*</b></font></th>
                                        <th scope="col" style="width: 170px">Date Filed<font color='red'><b>*</b></font></th>
                                        <th scope="col" style="width: 170px">Date Granted</th>
                                        <th scope="col">Date Obtain Certificate</th>
                                        <th scope="col">Expiry Date</th>
                                        <th scope="col">Status<font color='red'><b>*</b></font></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <td> 1 </td>

                                    <td>
                                        <textarea rows="3" type="text" class="form-control" id="patentID1" placeholder="" name="patentID"></textarea>
                                    </td>

                                    <td>
                                        <input style="height: 85px; width: 68px" type="text" class="form-control" id="yearGranted1" placeholder="" name="yearGranted">
                                    </td>

                                    <td>
                                        <textarea rows="3" type="text" class="form-control" id="investors1" placeholder="" name="investors"></textarea>
                                    </td>

                                    <td>
                                        <textarea rows="3" type="text" class="form-control" id="patentName1" placeholder="" name="patentName"></textarea>
                                    </td>

                                    <td>
                                        <input style="height: 85px;" type="text" class="form-control" id="countryFiled1" placeholder="" name="countryFiled">
                                    </td>

                                    <td>
                                        <input style="height: 85px; width: 170px" type="date" class="form-control" id="dateFiled1" placeholder="" name="dateFiled">
                                    </td>

                                    <td>
                                        <input style="height: 85px; width: 170px" type="date" class="form-control" id="dateGranted1" placeholder="" name="dateGranted">
                                    </td>

                                    <td>
                                        <input style="height: 85px; width: 170px" type="date" class="form-control" id="dateObtainCert1" placeholder="" name="dateObtainCert">
                                    </td>

                                    <td>
                                        <input style="height: 85px; width: 170px" type="date" class="form-control" id="expiryDate1" placeholder="" name="expiryDate">
                                    </td>

                                    <td>
                                        <select style="height: 85px; width: 90px" class="form-control" id="status1" name="status" required>
                                            <option>-</option>
                                            <option>Granted</option>
                                            <option>Pending</option>
                                        </select>
                                    </td>

                                    <td>
                                        <button style="margin-top: 20px" type="button" name="add" id="add" class="btn btn-outline-info"><i class="fas fa-plus"></i></button>

                                    </td>
                                </tbody>
                            </table>
                                <br>

                        </div>

                    </div>

                </div>
        <br>
        <hr>
        <div>
            <a class="btn btn-secondary" href="dashboard.php" role="button">Back</a>

            <button type="submit" class="btn btn-success mb-2 float-right" name="add_patents" id="done"> Done </button>

            <br><br>
        </div>
                <?php include('inc/footer.php'); ?>

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

    var i = 1;

    $(document).ready(function(){

        $('#add').click(function(){

            i++;

            $('#dynamic_field').append('<tr id="row'+i+'"><td>'+i+'</td>\n'+
                '\n' +
                '<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'patentID'+i+'" placeholder="" name="patentID"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <input style="height: 85px; width: 68px" type="text" class="form-control" id="'+'yearGranted'+i+'" placeholder="" name="yearGranted">\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'investors'+i+'" placeholder="" name="investors"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'patentName'+i+'" placeholder="" name="patentName"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <input style="height: 85px;" type="text" class="form-control" id="'+'countryFiled'+i+'" placeholder="" name="countryFiled">\n' +
                '</td>\n' +
                '\n' +'<td>\n' +
                '    <input style="height: 85px; width: 170px" type="date" class="form-control" id="'+'dateFiled'+i+'" placeholder="" name="dateFiled">\n' +
                '</td>\n' +
                '\n' +'<td>\n' +
                '    <input style="height: 85px; width: 170px" type="date" class="form-control" id="'+'dateGranted'+i+'" placeholder="" name="dateGranted">\n' +
                '</td>\n' +
                '\n' +'<td>\n' +
                '    <input style="height: 85px; width: 170px" type="date" class="form-control" id="'+'dateObtainCert'+i+'" placeholder="" name="dateObtainCert">\n' +
                '</td>\n' +
                '\n' +'<td>\n' +
                '    <input style="height: 85px; width: 170px" type="date" class="form-control" id="'+'expiryDate'+i+'" placeholder="" name="expiryDate">\n' +
                '</td>\n' +
                '\n' +'<td>\n' +
                '   <select style="height: 85px; width: 90px" class="form-control" id="'+'status'+i+'" name="status">\n' +
                '      <option>-</option>\n' +
                '      <option>Granted</option>\n' +
                '      <option>Pending</option>\n' +
                '   </select>\n' +
                '</td>\n' +
                '\n' +
                '    <td><button style="margin-top: 20px" type="button" name="remove" id="'+i+'" class="btn btn-outline-danger btn_remove"><i class="fas fa-times"></i>\n</button></td></tr>');
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

                var patentID = document.getElementById("patentID"+x).value;
                var yearGranted = document.getElementById("yearGranted"+x).value;
                var investors = document.getElementById("investors"+x).value;
                var patentName = document.getElementById("patentName"+x).value;
                var countryFiled = document.getElementById("countryFiled"+x).value;
                var dateFiled = document.getElementById("dateFiled"+x).value;
                var dateGranted = document.getElementById("dateGranted"+x).value;
                var dateObtainCert = document.getElementById("dateObtainCert"+x).value;
                var expiryDate= document.getElementById("expiryDate"+x).value;
                var status = document.getElementById("status"+x).value;


                if(patentID.trim() == "" ||
                    // yearGranted.trim() == "" ||
                    investors.trim() == "" ||
                    patentName.trim() == "" ||
                    countryFiled.trim() == "" ||
                    dateFiled.trim() == "" ||
                    // dateGranted.trim() == "" ||
                    // dateObtainCert.trim() == "" ||
                    // expiryDate.trim() == "" ||
                    status.trim() == ""){

                    alert("Incomplete Fields in row "+i);
                    return;
                }

                tmp = {
                    'patentID': patentID,
                    'yearGranted': yearGranted,
                    'investors': investors,
                    'patentName': patentName,
                    'countryFiled': countryFiled,
                    'dateFiled': dateFiled,
                    'dateGranted': dateGranted,
                    'dateObtainCert': dateObtainCert,
                    'expiryDate': expiryDate,
                    'status': status
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
                url: 'addPatents.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){

                    response = response.replace(/\s+/g, '');
                    //alert(response);
                    if(response=="1"){
                        alert("Record(s) Added.");
                        window.location.href = "view-patents-details.php";
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





