<?php

include('../inc/config.php');

?>

        <?php
        
        session_start();

        $user_ID = $_SESSION['user_ID'];
 // Decide how to use this maybe can assign session.

        $output = "";
        
        //Article start
        
        
        $sql= "SELECT * FROM `journals` WHERE `user_ID` = :user_ID";
        
        try {
            
            $query = $dbh->prepare($sql);
            
            $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);
            
            $query->execute();
            
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            
            foreach($result as $data) {
                
                $authors = htmlentities($data['authors']);
                $publicationTitle = htmlentities($data['publicationTitle']);
                $journalName = htmlentities($data['journalName']);
                $issueVol = htmlentities($data['issueVol']);
                $startPage = htmlentities($data['startPage']);
                $endPage = htmlentities($data['endPage']);
                $issn = htmlentities($data['issn']);
                $url = htmlentities($data['url']);
//                $year = htmlentities($data['year']);
                
                
                $output .= "@article{";
                $output .= "\tauthor={".$authors."},\n";
                $output .= "\ttitle={".$publicationTitle."},\n";
                $output .= "\tjournal={".$journalName."},\n";
                $output .= "\tyear={"."2017"."},\n";
                $output .= "\tvolume={".$issueVol."},\n";
                $output .= "\tpages={".$startPage."-".$endPage."},\n";
                $output .= "\n}\n";
                
            }
        }
        catch(PDOException $e) {
            
             echo $e;
        }

        //Article ends

        //Books-Chapters
        $sql= "SELECT * FROM `books-chaps` WHERE `user_ID` = :user_ID";

        try {

            $query = $dbh->prepare($sql);

            $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);


            foreach($result as $data) {

                $authors = htmlentities($data['authors']);
                $chapTitle = htmlentities($data['chapTitle']);
                $bookTitle = htmlentities($data['bookTitle']);
                $bookEditor = htmlentities($data['bookEditor']);
                $publisher = htmlentities($data['publisher']);
                $isbn_no = htmlentities($data['isbn_no']);
                $pageStart = htmlentities($data['pageStart']);
                $pageEnd = htmlentities($data['pageEnd']);
                $otherInfo_url = htmlentities($data['otherInfo_url']);


                $output .= "@book{";
                $output .= "\tauthor={".$authors ."},\n";
                $output .= "\ttitle={".$chapTitle.$bookTitle."},\n";
                $output .= "\tpublisher={".$publisher."},\n";
                $output .= "\tyear={"."2017"."},\n";
                $output .= "\turl={"."$otherInfo_url"."},\n";
                $output .= "\n}\n";

            }
        }
        catch(PDOException $e) {

            echo $e;
        }

        //book ends


//proceedings starts

    $sql= "SELECT * FROM `proceedings` WHERE `user_ID` = :user_ID";

    try {

        $query = $dbh->prepare($sql);

        $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);


        foreach($result as $data) {

            $authors = htmlentities($data['authors']);
            $paperTitle = htmlentities($data['paperTitle']);
            $proceedingsTitle = htmlentities($data['proceedingsTitle']);
            $issueVol = htmlentities($data['issueVol']);
            $pageNo = htmlentities($data['pageNo']);
            $articleID = htmlentities($data['articleID']);
            $url = htmlentities($data['url']);
            $issn_ibsn = htmlentities($data['issn_ibsn']);


            $output .= "@proceedings{";
            $output .= "\tauthor={".$authors."},\n";
            $output .= "\ttitle={"."$paperTitle"."$proceedingsTitle"."},\n";
            $output .= "\tyear={"."2017"."},\n";
            $output .= "\tvol={"."$issueVol"."},\n";
            $output .= "\n}\n";

        }
    }
    catch(PDOException $e) {

        echo $e;
    }

//proceeding ends


        //publication starts
        $sql= "SELECT * FROM `other_publications` WHERE `user_ID` = :user_ID";

        try {

            $query = $dbh->prepare($sql);

            $query->bindParam(':user_ID',$user_ID,PDO::PARAM_STR);

            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);


            foreach($result as $data) {

                $authors = htmlentities($data['authors']);
                $docType = htmlentities($data['docType']);
                $articleTitle = htmlentities($data['articleTitle']);
                $sourceName = htmlentities($data['sourceName']);
                $vol = htmlentities($data['vol']);
                $pageNo = htmlentities($data['pageNo']);
                $url = htmlentities($data['url']);
                $issn_ibsn = htmlentities($data['issn_ibsn']);


                $output .= "@publication{";
                $output .= "\tauthor={".$authors."},\n";
                $output .= "\ttitle={".$articleTitle."},\n";
                $output .= "\tyear={"."2017"."},\n";
                $output .= "\tvolume={"."$vol"."},\n";
                $output .= "\turl={"."$url"."},\n";
                $output .= "\n}\n";

            }
        }
        catch(PDOException $e) {

            echo $e;
        }

        file_put_contents("file.bib", $output);
        
    require_once("bib2html.php");
    
    echo bibfile2html("file.bib");
?>
