<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 13/10/2018
 * Time: 5:41 PM
 */

session_start();
include('inc/config.php');


?>

<?php include('inc/sidebar.php');?>
    <div class="container-fluid">
            <h1>Other IPs</h1>
            <br>
            <p>Please furnish information on other IPs [e.g. Software / Multimedia Copyrights, Books (other than listed under <a href="books-chaps.php"> Books / Chapters</a>) produced within assessment year.]</p>
                <ul>
                    <li>Evidenced by the copyright certificates from authorised agencies.</li>
                </ul>

            <br/>

                <div class="container-fluid">
                    <table class="table table-bordered table-sm">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title of Creation / Name of IP</th>
                            <th scope="col">Type (Software/Multimedia/Website Design)</th>
                            <th scope="col">Creator's Name and Affiliation</th>
                            <th scope="col">Date Registered at the Commissioner of Oath / Other authorisation Body</th>
                            <th scope="col">Document Ref No. / ISBN No.</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td><i>Eg. </i>Language Maintenance and Cultural viability in the Hainanese Community</td>
                            <td>Multimedia (video)</td>
                            <td>Lee Eileen, Sunway University; XXX, U of YYY</td>
                            <td>15/12/2016</td>
                            <td>XXXXXXX</td>
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

                    <br><hr>
                    <p>Fields mark with <b>(<font color='red'><b>*</b></font>)</b> are required to be filled in. </p>
                    <p>Click <b>"+"</b> to add a new row, and <b>"x"</b> to remove the row</p>
                    <p>Click <b>"Done"</b> button to save record(s) </p>
                    <p>Click <b>”Back”</b> button to dashboard</p>


                    <div class="form-group">
                            <div class="table-responsive">
                                <table class="table table-hover" id="dynamic_field">

                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title of Creation / Name of IP<font color='red'><b>*</b></font></th>
                                        <th scope="col">Type (Software/Multimedia/Website Design)<font color='red'><b>*</b></font></th>
                                        <th scope="col">Creator's Name and Affiliation<font color='red'><b>*</b></font></th>
                                        <th scope="col" style="width: 10%">Date Registered at the Commissioner of Oath / Other authorisation Body<font color='red'><b>*</b></font></th>
                                        <th scope="col">Document Ref No. / ISBN No.<font color='red'><b>*</b></font></th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <td> 1 </td>

                                    <td>
                                        <textarea rows="3" type="text" class="form-control" id="nameIP1" placeholder="" name="nameIP"></textarea>
                                    </td>

                                    <td>
                                        <textarea rows="3" type="text" class="form-control" id="IPtype1" placeholder="" name="IPtype"></textarea>
                                    </td>

                                    <td>
                                        <textarea rows="3" type="text" class="form-control" id="creators1" placeholder="" name="creators"></textarea>
                                    </td>

                                    <td>
                                        <input style="height: 85px;" type="date" class="form-control" id="dateReg1" placeholder="" name="dateReg">
                                    </td>

                                    <td>
                                        <input style="height: 85px;" type="text" class="form-control" id="refNo1" placeholder="" name="refNo">
                                    </td>


                                    <td>
                                        <button style="margin-top: 20px" type="button" name="add" id="add" class="btn btn-outline-info"><i class="fas fa-plus"></i>
                                        </button>
                                    </td>
                                    </tbody>
                                </table>
                                <br><br><br>
                                <hr>


                                <a class="btn btn-secondary" href="dashboard.php" role="button">Back</a>

                                <button type="submit" class="btn btn-success mb-2 float-right" name="add_ips" id="done"> Done </button>




                            </div>


</div>
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

            $('#dynamic_field').append('<tr id="row'+i+'"><td>'+i+'</td>\n'+
                '\n' +
                '<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'nameIP'+i+'" placeholder="" name="nameIP"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'IPtype'+i+'" placeholder="" name="IPtype"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'creators'+i+'" placeholder="" name="creators"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <input style="height: 85px;" type="date" class="form-control" id="'+'dateReg'+i+'" placeholder="" name="dateReg">\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <input style="height: 85px;" type="text" class="form-control" id="'+'refNo'+i+'" placeholder="" name="refNo">\n' +
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

                var nameIP = document.getElementById("nameIP"+x).value;
                var IPtype = document.getElementById("IPtype"+x).value;
                var creators = document.getElementById("creators"+x).value;
                var dateReg = document.getElementById("dateReg"+x).value;
                var refNo = document.getElementById("refNo"+x).value;

                if(nameIP.trim() == "" ||
                    IPtype.trim() == "" ||
                    creators.trim() == "" ||
                    dateReg.trim() == "" ||
                    refNo.trim() == ""){

                    alert("Incomplete Fields in row "+i);
                    return;
                }

                tmp = {
                    'nameIP': nameIP,
                    'IPtype': IPtype,
                    'creators': creators,
                    'dateReg': dateReg,
                    'refNo': refNo
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
                url: 'addIPs.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){


                    response = response.replace(/\s+/g, '');
                    //alert(response);
                    if(response=="1"){
                        alert("Record(s) Added.");
                        window.location.href = "view-ips-details.php";
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

<?php include('inc/footer.php'); ?>




