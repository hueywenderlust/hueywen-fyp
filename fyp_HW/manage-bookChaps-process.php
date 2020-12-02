<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 22/10/2018
 * Time: 11:17 PM
 */

session_start();

include('inc/config.php');

$operation = $_POST['operation'];

$user_ID = $_SESSION['user_ID'];

if(strcmp($operation,"update")==0){

    $id = $_POST['id'];
    $authors = $_POST['authors'];
    $chapTitle = $_POST['chapTitle'];
    $bookTitle = $_POST['bookTitle'];
    $bookEditor = $_POST['bookEditor'];
    $publisher = $_POST['publisher'];
    $isbn_no = $_POST['isbn_no'];
    $pageStart = $_POST['pageStart'];
    $pageEnd = $_POST['pageEnd'];
    $otherInfo_url = $_POST['otherInfo_url'];

    $sql= "SELECT * FROM `books-chaps` WHERE id = :id AND user_ID = :user_ID"; // Ensure the id matches with the user_ID

    $sql = "UPDATE `books-chaps` SET authors=:authors, chapTitle=:chapTitle, bookTitle=:bookTitle, bookEditor=:bookEditor, publisher=:publisher, isbn_no=:isbn_no, pageStart=:pageStart, pageEnd=:pageEnd, otherInfo_url=:otherInfo_url WHERE id=:id AND user_ID=:user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->bindParam(':authors',$authors,PDO::PARAM_STR);
        $query->bindParam(':chapTitle',$chapTitle,PDO::PARAM_STR);
        $query->bindParam(':bookTitle',$bookTitle,PDO::PARAM_STR);
        $query->bindParam(':bookEditor',$bookEditor,PDO::PARAM_STR);
        $query->bindParam(':publisher',$publisher,PDO::PARAM_STR);
        $query->bindParam(':isbn_no',$isbn_no,PDO::PARAM_STR);
        $query->bindParam(':pageStart',$pageStart,PDO::PARAM_STR);
        $query->bindParam(':pageEnd',$pageEnd,PDO::PARAM_STR);
        $query->bindParam(':otherInfo_url', $otherInfo_url, PDO::PARAM_STR);
        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

        $query->execute();

        echo "1";

    }
    catch(PDOException $e)
    {

        echo "2";

    }


}

if(strcmp($operation,"delete")==0){

    $id = $_POST['id'];

    $sql= "DELETE FROM `books-chaps` WHERE id = :id AND user_ID = :user_ID"; // Ensure the id matches with the user_ID


    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

        $query->execute();

        echo "1";



    }
    catch(PDOException $e)
    {

        echo "2";

    }



}






?>