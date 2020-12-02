<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 18/10/2018
 * Time: 4:50 PM
 */

session_start();

$JSON_Test = $_POST['JsonData'];

$data = json_decode($JSON_Test);

$Process_Status = true;

$host = "localhost";
$db = "sample";
$user = "root";
$pass = "";

$user_ID = $_SESSION['user_ID'];

include('inc/config.php');

foreach ($data as $entry){

    $authors = $entry->authors;
    $chapTitle = $entry->chapTitle;
    $bookTitle= $entry->bookTitle;
    $bookEditor = $entry->bookEditor;
    $publisher = $entry->publisher;
    $isbn_no = $entry->isbn_no;
    $pageStart = $entry->pageStart;
    $pageEnd = $entry->pageEnd;
    $otherInfo_url = $entry->otherInfo_url;


    $sql = "INSERT INTO `books-chaps`(`authors`, `chapTitle`, `bookTitle`, `bookEditor`, `publisher`, `isbn_no`, `pageStart`, `pageEnd`, `otherInfo_url`, `user_ID`) 
    VALUES (:authors, :chapTitle, :bookTitle, :bookEditor, :publisher, :isbn_no, :pageStart, :pageEnd, :otherInfo_url, :user_ID)";



    try {

        $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':authors', $authors);
        $stmt->bindParam(':chapTitle', $chapTitle);
        $stmt->bindParam(':bookTitle', $bookTitle);
        $stmt->bindParam(':bookEditor', $bookEditor);
        $stmt->bindParam(':publisher', $publisher);
        $stmt->bindParam(':isbn_no', $isbn_no);
        $stmt->bindParam(':pageStart', $pageStart);
        $stmt->bindParam(':pageEnd', $pageEnd);
        $stmt->bindParam(':otherInfo_url', $otherInfo_url);
        $stmt->bindParam(':user_ID', $user_ID);


        $stmt->execute();

        $id = $conn->lastInsertId();

    } catch(PDOException $e) {
        echo $e;
        $Process_Status = false;
    }

}

echo $Process_Status;