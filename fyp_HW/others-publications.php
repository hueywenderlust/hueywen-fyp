<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 13/10/2018
 * Time: 6:45 PM
 */

session_start();
include('inc/config.php');


?>

<?php include('inc/sidebar.php') ?>
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-md-12">
            <h1>Other Publications</h1><br>
            <p>Please furnish information on other publication(s) that has been published for within the assessment year.</p>
            <ul>
                <li><b>MUST</b> be evidenced by the first page of the published year. </li>
                <li>Your name and affiliation with Sunway <b>MUST</b> be seen clearly on the page</li>
            </ul>
            <br/>
                <div class="container-fluid">
                    <div class="form-group">
                        <div class="table-responsive">

                            <table class="table table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Author(s)</th>
                                    <th scope="col">Document Type (technical report, magazine articles, policy papers, newsletter, original writings etc)</th>
                                    <th scope="col">Article Title</th>
                                    <th scope="col">Source Name</th>
                                    <th scope="col">Vol</th>
                                    <th scope="col">Page No.</th>
                                    <th scope="col">URL</th>
                                    <th scope="col">ISSN / ISBN</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><i>Eg. </i>Wilson Rangga ak Anthony</td>
                                    <td>Policy</td>
                                    <td>Turbomachinery Project Execution For CO2 Gas Field: Challenges and Obstacles</td>
                                    <td>International of Journal Social Science and Humanity</td>
                                    <td>6</td>
                                    <td>56-58</td>
                                    <td></td>
                                    <td>20103646</td>
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


                            <br><hr>

                            <p>Fields mark with <b>(<font color='red'><b>*</b></font>)</b> are required to be filled in. </p>
                            <p>Click <b>"+"</b> to add a new row, and <b>"x"</b> to remove the row</p>
                            <p>Click <b>"Done"</b> button to save record(s) </p>
                            <p>Click <b>”Back”</b> button to dashboard</p>



                            <table class="table table-hover" id="dynamic_field">

                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Author(s)<font color='red'><b>*</b></font></th>
                                    <th scope="col">Document Type<font color='red'><b>*</b></font></th>
                                    <th scope="col">Article Title<font color='red'><b>*</b></font></th>
                                    <th scope="col">Source Name<font color='red'><b>*</b></font></th>
                                    <th scope="col">Vol<font color='red'><b>*</b></font></th>
                                    <th scope="col">Page No.<font color='red'><b>*</b></font></th>
                                    <th scope="col">URL</th>
                                    <th scope="col">ISSN / ISBN<font color='red'><b>*</b></font></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>

                                <tbody>

                                <td> 1 </td>

                                <td>
                                    <textarea rows="3" type="text" class="form-control" id="authors1" placeholder="" name="authors"></textarea>
                                </td>

                                <td>
                                    <input style="height: 85px;" type="text" class="form-control" id="docType1" placeholder="" name="docType">
                                </td>

                                <td>
                                    <textarea rows="3" type="text" class="form-control" id="articleTitle1" placeholder="" name="articleTitle"></textarea>
                                </td>

                                <td>
                                    <textarea rows="3" type="text" class="form-control" id="sourceName1" placeholder="" name="sourceName"></textarea>
                                </td>

                                <td>
                                    <input style="height: 85px; width: 60px" type="text" class="form-control" id="vol1" placeholder="" name="vol">
                                </td>

                                <td>
                                    <input style="height: 85px; width: 100px" type="text" class="form-control" id="pageNo1" placeholder="" name="pageNo">
                                </td>

                                <td>
                                    <textarea rows="3" type="text" class="form-control" id="url1" placeholder="" name="url"></textarea>
                                </td>

                                <td>
                                    <input style="height: 85px;" type="text" class="form-control" id="issn_ibsn1" placeholder="" name="issn_ibsn">
                                </td>

                                <td>
                                    <button style="margin-top: 20px" type="button" name="add" id="add" class="btn btn-outline-info"><i class="fas fa-plus"></i></button>

                                </td>
                                </tbody>
                            </table>

                            <br><br>
                            <hr />
                            <a class="btn btn-secondary" href="dashboard.php" role="button">Back</a>

                            <button type="submit" class="btn btn-success mb-2 float-right" name="add_otherPublications" id="done"> Done </button>

                            <br><br>


                        </div>


                    </div>


                </div>
            <?php include('inc/footer.php'); ?>

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
                '    <textarea rows="3" type="text" class="form-control" id="'+'authors'+i+'" placeholder="" name="authors"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'docType'+i+'" placeholder="" name="docType"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'articleTitle'+i+'" placeholder="" name="articleTitle"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'sourceName'+i+'" placeholder="" name="sourceName"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <input style="height: 85px; width: 60px" type="text" class="form-control" id="'+'vol'+i+'" placeholder="" name="vol">\n' +
                '</td>\n' +
                '\n' +'<td>\n' +
                '    <input style="height: 85px; width: 100px" type="text" class="form-control" id="'+'pageNo'+i+'" placeholder="" name="pageNo">\n' +
                '</td>\n' +
                '\n' +'<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'url'+i+'" placeholder="" name="url"></textarea>\n' +
                '</td>\n' +
                '\n' +'<td>\n' +
                '    <input style="height: 85px;" type="text" class="form-control" id="'+'issn_ibsn'+i+'" placeholder="" name="issn_ibsn">\n' +
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
                var docType = document.getElementById("docType"+x).value;
                var articleTitle = document.getElementById("articleTitle"+x).value;
                var sourceName = document.getElementById("sourceName"+x).value;
                var vol = document.getElementById("vol"+x).value;
                var pageNo = document.getElementById("pageNo"+x).value;
                var url = document.getElementById("url"+x).value;
                var issn_ibsn = document.getElementById("issn_ibsn"+x).value;


                if(authors.trim() == "" ||
                    docType.trim() == "" ||
                    articleTitle.trim() == "" ||
                    sourceName.trim() == "" ||
                    vol.trim() == "" ||
                    pageNo.trim() == "" ||
                    // url.trim() == "" ||
                    issn_ibsn.trim() == "" ){

                    alert("Incomplete Fields in row "+i);
                    return;
                }

                tmp = {
                    'authors': authors,
                    'docType': docType,
                    'articleTitle': articleTitle,
                    'sourceName': sourceName,
                    'vol': vol,
                    'pageNo': pageNo,
                    'url': url,
                    'issn_ibsn': issn_ibsn
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
                url: 'addOtherPublication.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){

                    response = response.replace(/\s+/g, '');
                    //alert(response);
                    if(response=="1"){
                        alert("Record(s) Added.");
                        window.location.href = "view-others-publications-details.php";
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





</html>
