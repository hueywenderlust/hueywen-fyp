<?php 
require_once("inc-admin/config.php");
// code user AdminEmail availablity

if(!empty($_POST["AdminEmail"])) {

	$AdminEmail= $_POST["AdminEmail"];
	$sql ="SELECT AdminEmail FROM admin WHERE AdminEmail=:AdminEmail";
	$query= $dbh -> prepare($sql);
	$query-> bindParam(':AdminEmail', $AdminEmail, PDO::PARAM_STR);
	$query-> execute();
	$results = $query -> fetchAll(PDO::FETCH_OBJ);
	$cnt=1;

		if($query -> rowCount() > 0) {
			echo "<span style='color:red'> this email already exists .</span>";
			 echo "<script>$('#submit').prop('disabled',true);</script>";
		} else{
	
			echo "<span style='color:green'> this email available for registration.</span>";
 			echo "<script>$('#submit').prop('disabled',false);</script>";
		}

}


?>




