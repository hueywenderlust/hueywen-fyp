<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 13/10/2018
 * Time: 5:10 PM
 */

session_start();
include('inc/config.php');



?>

<?php include ('inc/sidebar.php') ?>
<body>
<div class="container-fluid">

    <h1>Journals</h1><br>
    <p>Please furnish information on <b><u>ALL</u></b> journals articles that has been published within the assessment year. </p>
    <ul>
        <li> <b><u>MUST</u></b> be evidenced by the first page of the published article.</li>
        <li>Your name and your affiliation with Sunway must be seen clearly on the page.</li>
    </ul><br>

    <hr><br/>
    <p>Fields mark with <b>(<font color='red'><b>*</b></font>)</b> are required to be filled in. </p>
    <p>Click <b>"+"</b> to add a new row, and <b>"x"</b> to remove the row</p>
    <p>Click <b>"Done"</b> button to save record(s) </p>
    <p>Click <b>”Back”</b> button to dashboard</p>



    <div class="container-fluid">
        <br />
        <div class="form-group">
            <div class="table-responsive">

                <table class="table table-hover" id="dynamic_field">

                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Author(s)<font color='red'><b>*</b></font></th>
                        <th scope="col">Title of Publication<font color='red'><b>*</b></font></th>
                        <th scope="col">Name of Journal<font color='red'><b>*</b></font></th>
                        <th scope="col">Vol: Issue<font color='red'><b>*</b></font></th>
                        <th scope="col">Start Page<font color='red'><b>*</b></font></th>
                        <th scope="col">End Page<font color='red'><b>*</b></font></th>
                        <th scope="col">ISSN<font color='red'><b>*</b></font></th>
                        <th scope="col">URL (if published online)</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>

                    <tbody>

                    <td> 1 </td>

                    <td>
                        <textarea rows="3" type="text" class="form-control" id="authors1" placeholder="" name="authors"></textarea>
                    </td>

                    <td>
                        <textarea rows="3" type="text" class="form-control" id="publicationTitle1" placeholder="" name="publicationTitle"></textarea>
                    </td>

                    <td>
                        <textarea rows="3" type="text" class="form-control" id="journalName1" placeholder="" name="journalName"></textarea>
                    </td>

                    <td>
                        <input style="width: 80px; height: 85px" type="text" class="form-control" id="issueVol1" placeholder="" name="issueVol">
                    </td>

                    <td>
                        <input style="width: 80px; height: 85px" type="text" class="form-control" id="startPage1" placeholder="" name="startPage">
                    </td>

                    <td>
                        <input style="width: 80px; height: 85px" type="text" class="form-control" id="endPage1" placeholder="" name="endPage">
                    </td>

                    <td>
                        <input style="height: 85px" type="text" class="form-control" id="issn1" placeholder="" name="issn">
                    </td>

                    <td>
                        <textarea rows="3" type="text" class="form-control" id="url1" placeholder="" name="url"></textarea>
                    </td>


                    <td>
                        <button style="margin-top: 20px" type="button" name="add" id="add" class="btn btn-outline-info"><i class="fas fa-plus"></i></button>
                    </td>
                    </tbody>
                </table>
                <br><br><br>
                <hr>

                <a class="btn btn-secondary" href="dashboard.php" role="button">Back</a>

                <button type="submit" class="btn btn-success mb-2 float-right" name="add_journal" id="done"> Done </button>

                <br><br>


            </div>
            <hr>



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
                '    <textarea rows="3" type="text" class="form-control" id="'+'authors'+i+'" placeholder="" name="authors"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'publicationTitle'+i+'" placeholder="" name="publicationTitle"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'journalName'+i+'" placeholder="" name="journalName"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <input style="width: 80px; height: 85px" type="text" class="form-control" id="'+'issueVol'+i+'" placeholder="" name="issueVol">\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <input style="width: 80px; height: 85px" type="text" class="form-control" id="'+'startPage'+i+'" placeholder="" name="startPage">\n' +
                '</td>\n' +
                '\n' +'<td>\n' +
                '    <input style="width: 80px; height: 85px" type="text" class="form-control" id="'+'endPage'+i+'" placeholder="" name="endPage">\n' +
                '</td>\n' +
                '\n' +'<td>\n' +
                '    <input style="height: 85px;" type="text" class="form-control" id="'+'issn'+i+'" placeholder="" name="issn">\n' +
                '</td>\n' +
                '\n' +'<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'url'+i+'" placeholder="" name="url"></textarea>\n' +
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

                var authors = document.getElementById("authors"+x).value;
                var publicationTitle = document.getElementById("publicationTitle"+x).value;
                var journalName = document.getElementById("journalName"+x).value;
                var issueVol = document.getElementById("issueVol"+x).value;
                var startPage = document.getElementById("startPage"+x).value;
                var endPage = document.getElementById("endPage"+x).value;
                var issn = document.getElementById("issn"+x).value;
                var url = document.getElementById("url"+x).value;


                if(authors.trim() == "" ||
                    publicationTitle.trim() == "" ||
                    journalName.trim() == "" ||
                    issueVol.trim() == "" ||
                    startPage.trim() == "" ||
                    endPage.trim() == "" ||
                    issn.trim() == ""
                    // ||
                    // url.trim() == ""
                ){

                    alert("Incomplete Fields in row "+i);
                    return;
                }

                tmp = {
                    'authors': authors,
                    'publicationTitle': publicationTitle,
                    'journalName': journalName,
                    'issueVol': issueVol,
                    'startPage': startPage,
                    'endPage': endPage,
                    'issn': issn,
                    'url': url
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
                url: 'addJournals.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                    response = response.replace(/\s+/g, '');

                    // alert(response);
                    if(response=="1"){
                        alert("Record(s) Added.");
                        window.location.href="view-journals-details.php";
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




