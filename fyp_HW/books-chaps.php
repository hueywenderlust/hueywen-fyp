<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 13/10/2018
 * Time: 5:21 PM
 */
include('inc/config.php');



?>

<?php include('inc/sidebar.php')?>
<body>
        <div class="container-fluid">

            <h1>Books / Book's Chapters</h1>
            <br>
            <p>Please furnish information on conference paper in <b><u>ALL</u></b> proceedings that has been published within the assessment
                year. </p>
            <ul>
                <li><b><u>MUST</u></b> be evidenced by the first page of the published article.</li>
                <li>Your name and your affiliation with Sunway must be seen clearly on the page.</li>
                <li><b><u>DO NOT</u></b> include conference papers which will be published in the following year or published in a journal.</li>
            </ul><br/>

            <hr>

            <div class="container-fluid">
                <br/><br/>
                <div class="form-group">
                        <div class="table-responsive">


                            <table class="table table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Author(s)</th>
                                    <th scope="col">Chapter Title</th>
                                    <th scope="col">Book Title</th>
                                    <th scope="col">Book Editor's Name</th>
                                    <th scope="col">Publisher</th>
                                    <th scope="col">ISBN No.</th>
                                    <th scope="col">Page Start</th>
                                    <th scope="col">Page End</th>
                                    <th scope="col">other info / URL</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><i>Eg. </i>Abdeel Aziz</td>
                                    <td>Al-Tawhid and its effect on man's life</td>
                                    <td>Introduction to the Islamic Worldview: Study of Selected Essentials</td>
                                    <td>Ardiyan S</td>
                                    <td>IIUM Press</td>
                                    <td>12345678910</td>
                                    <td>107</td>
                                    <td>140</td>
                                    <td></td>
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
<br><hr><br>
                            <p>Fields mark with <b>(<font color='red'><b>*</b></font>)</b> are required to be filled in. </p>
                            <p>Click <b>"+"</b> to add a new row, and <b>"x"</b> to remove the row</p>
                            <p>Click <b>"Done"</b> button to save record(s) </p>
                            <p>Click <b>”Back”</b> button to dashboard</p>


                            <table class="table table-hover" id="dynamic_field">

                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Author(s)<font color='red'><b>*</b></font></th>
                                    <th scope="col">Chapter Title<font color='red'><b>*</b></font></th>
                                    <th scope="col">Book Title<font color='red'><b>*</b></font></th>
                                    <th scope="col">Book Editor's Name<font color='red'><b>*</b></font></th>
                                    <th scope="col">Publisher<font color='red'><b>*</b></font></th>
                                    <th scope="col">ISBN No.<font color='red'><b>*</b></font></th>
                                    <th scope="col">Page Start<font color='red'><b>*</b></font></th>
                                    <th scope="col">Page End<font color='red'><b>*</b></font></th>
                                    <th scope="col">other info / URL</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>

                                <tbody>

                                <td> 1 </td>

                                <td>
                                    <textarea rows="3" type="text" class="form-control" id="authors1" placeholder="" autocomplete="off" name="authors"></textarea>
                                </td>

                                <td>
                                    <textarea rows="3" type="text" class="form-control" id="chapTitle1" placeholder="" autocomplete="off" name="chapTitle"></textarea>
                                </td>

                                <td>
                                    <textarea rows="3" type="text" class="form-control" id="bookTitle1" placeholder="" autocomplete="off" name="bookTitle"></textarea>
                                </td>

                                <td>
                                    <textarea rows="3" type="text" class="form-control" id="bookEditor1" placeholder="" autocomplete="off" name="bookEditor"></textarea>
                                </td>

                                <td>
                                    <textarea rows="3" type="text" class="form-control" id="publisher1" placeholder="" autocomplete="off" name="publisher"></textarea>
                                </td>

                                <td>
                                    <input style="height: 85px;" type="text" class="form-control" id="isbn_no1" placeholder="" autocomplete="off" name="isbn_no">
                                </td>

                                <td>
                                    <input style="height: 85px; width: 80px" type="text" class="form-control" id="pageStart1" placeholder="" autocomplete="off" name="pageStart">
                                </td>

                                <td>
                                    <input style="height: 85px; width: 80px" type="text" class="form-control" id="pageEnd1" placeholder="" autocomplete="off" name="pageEnd">
                                </td>

                                <td>
                                    <textarea rows="3" type="text" class="form-control" id="otherInfo_url1" placeholder="" autocomplete="off" name="otherInfo_url"></textarea>
                                </td>

                                <td>
                                    <button style="margin-top: 20px" type="button" name="add" id="add" class="btn btn-outline-info"><i class="fas fa-plus"></i></button>

                                </td>
                                </tbody>
                            </table>
                            <br><br><br>
                            <hr>

                            <a class="btn btn-secondary" href="dashboard.php" role="button">Back</a>

                            <button type="submit" class="btn btn-success mb-2 float-right" name="add_booksChaps" id="done"> Done </button>

                            <br>

                        </div>
                </div>

            </div>



        </div>
<!-- page-wrapper -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
                '    <textarea rows="3" type="text" class="form-control" id="'+'authors'+i+'" placeholder="" autocomplete="off" name="authors"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'chapTitle'+i+'" placeholder="" autocomplete="off" name="chapTitle"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'bookTitle'+i+'" placeholder="" autocomplete="off" name="bookTitle"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'bookEditor'+i+'" placeholder="" autocomplete="off" name="bookEditor"></textarea>\n' +
                '</td>\n' +
                '\n' +
                '<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'publisher'+i+'" placeholder="" autocomplete="off" name="publisher"></textarea>\n' +
                '</td>\n' +
                '\n' +'<td>\n' +
                '    <input style="height: 85px;" type="text" class="form-control" id="'+'isbn_no'+i+'" placeholder="" autocomplete="off" name="isbn_no">\n' +
                '</td>\n' +
                '\n' +'<td>\n' +
                '    <input style="height: 85px; width: 80px" type="text" class="form-control" id="'+'pageStart'+i+'" placeholder="" autocomplete="off" name="pageStart">\n' +
                '</td>\n' +
                '\n' +'<td>\n' +
                '    <input style="height: 85px; width: 80px" type="text" class="form-control" id="'+'pageEnd'+i+'" placeholder="" autocomplete="off" name="pageEnd">\n' +
                '</td>\n' +
                '\n' +'<td>\n' +
                '    <textarea rows="3" type="text" class="form-control" id="'+'otherInfo_url'+i+'" placeholder="" autocomplete="off" name="otherInfo_url"></textarea>\n' +
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
                var chapTitle = document.getElementById("chapTitle"+x).value;
                var bookTitle = document.getElementById("bookTitle"+x).value;
                var bookEditor = document.getElementById("bookEditor"+x).value;
                var publisher = document.getElementById("publisher"+x).value;
                var isbn_no = document.getElementById("isbn_no"+x).value;
                var pageStart = document.getElementById("pageStart"+x).value;
                var pageEnd = document.getElementById("pageEnd"+x).value;
                var otherInfo_url = document.getElementById("otherInfo_url"+x).value;


                if(authors.trim() == "" ||
                    chapTitle.trim() == "" ||
                    bookTitle.trim() == "" ||
                    bookEditor.trim() == "" ||
                    publisher.trim() == "" ||
                    isbn_no.trim() == "" ||
                    pageStart.trim() == "" ||
                    pageEnd.trim() == ""
                    //||
                    //otherInfo_url.trim() == ""
                    ){

                    alert("Incomplete Fields in row "+i);
                    return;
                }



                tmp = {
                    'authors': authors,
                    'chapTitle': chapTitle,
                    'bookTitle': bookTitle,
                    'bookEditor': bookEditor,
                    'publisher': publisher,
                    'isbn_no': isbn_no,
                    'pageStart': pageStart,
                    'pageEnd': pageEnd,
                    'otherInfo_url': otherInfo_url
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
                url: 'addBooks-Chaps.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){

                    response = response.replace(/\s+/g, '');

                    //alert(response);
                    if(response=="1"){
                        alert("Record(s) Added.");
                        window.location.href = "view-books-chaps-details.php";
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




