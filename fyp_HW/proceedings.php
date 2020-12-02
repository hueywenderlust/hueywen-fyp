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

    <h1>Proceedings</h1><br>
    <p>Please furnish information on conference paper in <b><u>ALL</u></b> proceedings that has been published within the assessment
        year. </p>
    <ul>
        <li><b><u>MUST</u></b> be evidenced by the first page of the published article.</li>
        <li>Your name and your affiliation with Sunway must be seen clearly on the page.</li>
        <li><b><u>DO NOT</u></b> include conference papers which will be published in the following year or published in a journal.</li>
    </ul>

    <br/>
<hr>

    <p>Fields mark with <b>(<font color='red'><b>*</b></font>)</b> are required to be filled in. </p>
    <p>Click <b>"+"</b> to add a new row, and <b>"x"</b> to remove the row</p>
    <p>Click <b>"Done"</b> button to save record(s) </p>
    <p>Click <b>”Back”</b> button to dashboard</p>

    <div class="container-fluid">
        <br />
        <div class="form-group">
            <!--            <form name="" id="">-->
            <div class="table-responsive">
                <table class="table table-hover" id="dynamic_field">

                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Author(s)<font color='red'><b>*</b></font></th>
                        <th scope="col">Paper Title<font color='red'><b>*</b></font></th>
                        <th scope="col">Title of Proceedings<font color='red'><b>*</b></font></th>
                        <th scope="col">Vol: Issue<font color='red'><b>*</b></font></th>
                        <th scope="col">Page No<font color='red'><b>*</b></font></th>
                        <th scope="col">Article ID<font color='red'><b>*</b></font></th>
                        <th scope="col">URL</th>
                        <th scope="col">ISSN / IBSN</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>

                    <tbody>

                    <td> 1 </td>

                    <td>
                        <textarea rows="3" type="text" class="form-control" id="authors1" placeholder="" autocomplete="off" name="authors"></textarea>
                    </td>

                    <td>
                        <textarea rows="3" type="text" class="form-control" id="paperTitle1" placeholder="" autocomplete="off" name="paperTitle"></textarea>
                    </td>

                    <td>
                        <textarea rows="3" type="text" class="form-control" id="proceedingsTitle1" placeholder="" autocomplete="off" name="proceedingsTitle"></textarea>
                    </td>

                    <td>
                        <input style="height: 85px; width: 80px" type="text" class="form-control" id="issueVol1" placeholder="" autocomplete="off" name="issueVol">
                    </td>

                    <td>
                        <input style="height: 85px; width: 80px" type="text" class="form-control" id="pageNo1" placeholder="" autocomplete="off" name="pageNo">
                    </td>

                    <td>
                        <input style="height: 85px;" type="text" class="form-control" id="articleID1" placeholder="" autocomplete="off" name="articleID">
                    </td>

                    <td>
                        <textarea rows="3" type="text" class="form-control" id="url1" placeholder="" autocomplete="off" name="url"></textarea>
                    </td>

                    <td>
                        <input style="height: 85px;" type="text" class="form-control" id="issn_ibsn1" placeholder="" autocomplete="off" name="issn_ibsn">
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

                <button type="submit" class="btn btn-success mb-2 float-right" name="" id="done"> Done </button>

                <br><br><hr>


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
                '    <textarea rows="3" type="text" class="form-control" id="'+'authors'+i+'" '+ 'placeholder="" autocomplete="off" name="authors"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'paperTitle'+i+'" '+ 'placeholder="" autocomplete="off" name="paperTitle"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'proceedingsTitle'+i+'" '+ 'placeholder="" autocomplete="off" name="proceedingsTitle"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <input style="height: 85px; width: 80px" type="text" class="form-control" id="'+'issueVol'+i+'" '+ 'placeholder="" autocomplete="off" name="issueVol">\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <input style="height: 85px; width: 80px" type="text" class="form-control" id="'+'pageNo'+i+'" '+ 'placeholder="" autocomplete="off" name="pageNo">\n' +
                '</td>\n' +
                '\n' +'<td>\n' +
                '    <input style="height: 85px;" type="text" class="form-control" id="'+'articleID'+i+'" '+ 'placeholder="" autocomplete="off" name="articleID">\n' +
                '</td>\n' +
                '\n' +'<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'url'+i+'" '+ 'placeholder="" autocomplete="off" name="url"></textarea>\n' +
                '</td>\n' +
                '\n' +'<td>\n' +
                '    <input style="height: 85px;" type="text" class="form-control" id="'+'issn_ibsn'+i+'" '+ 'placeholder="" autocomplete="off" name="issn_ibsn">\n' +
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
                var paperTitle = document.getElementById("paperTitle"+x).value;
                var proceedingsTitle = document.getElementById("proceedingsTitle"+x).value;
                var issueVol = document.getElementById("issueVol"+x).value;
                var pageNo = document.getElementById("pageNo"+x).value;
                var articleID = document.getElementById("articleID"+x).value;
                var url = document.getElementById("url"+x).value;
                var issn_ibsn = document.getElementById("issn_ibsn"+x).value;



                if(authors.trim() == "" ||
                    paperTitle.trim() == "" ||
                    proceedingsTitle.trim() == "" ||
                    issueVol.trim() == "" ||
                    pageNo.trim() == "" ||
                    articleID.trim() == ""
                    // ||
                    // url.trim() == "" ||
                    // issn_ibsn.trim() == ""
                ){

                    alert("Incomplete Fields in row "+i);
                    return;

                }


                tmp = {
                    'author': authors,
                    'paperTitle': paperTitle,
                    'procedingsTitle': proceedingsTitle,
                    'issueVol': issueVol,
                    'pageNo': pageNo,
                    'articleID': articleID,
                    'url': url,
                    'issnissbn': issn_ibsn
                };

                obj.push(tmp);

                x++;
            }

            if (confirm('Are you sure you want to add the following ['+i+'] proceeding(s) ?')) {
                // Save it!
            } else {
                return;
            }

            var JSONdata = JSON.stringify(obj);

            var fd = new FormData();
            fd.append('JsonData',JSONdata);

            $.ajax({
                url: 'addProceedings.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){

                    response = response.replace(/\s+/g, '');
                    //alert(response);

                    if(response=="1"){

                        alert("Proceeding(s) Added.");
                        window.location.href = "view-proceedings-details.php";

                    }

                    if(response=="0"){

                        alert("Proceeding(s) Failed to add.");

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




