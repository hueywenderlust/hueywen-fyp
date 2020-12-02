<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 11/11/2018
 * Time: 6:56 PM
 */


require_once("inc-admin/config.php");

if(!empty($_POST["email"])) {

    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

        echo "<span style='color:red'>Invalid Email Address. Please try another one</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";

        exit();
    }

		$email= $_POST["email"];
		$sql ="SELECT StaffId FROM tbl_staffs WHERE email=:email";
		$query= $dbh -> prepare($sql);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query-> execute();
		$results = $query -> fetchAll(PDO::FETCH_OBJ);
		$cnt=1;




	if($query -> rowCount() > 0) {
		echo "<span style='color:red'>This Email already exists. Please try another one</span>";
 		echo "<script>$('#submit').prop('disabled',true);</script>";

	} else{
		echo "<span style='color:green'>This Email is available for Registration.</span>";
 		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}

?>
