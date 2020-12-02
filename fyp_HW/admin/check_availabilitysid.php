<?php

require_once("inc-admin/config.php");

if(!empty($_POST["staffid"])) {

		$staffid= $_POST["staffid"];
		$sql ="SELECT StaffId FROM tbl_staffs WHERE StaffId=:staffid";
		$query= $dbh -> prepare($sql);
		$query-> bindParam(':staffid', $staffid, PDO::PARAM_STR);
		$query-> execute();
		$results = $query -> fetchAll(PDO::FETCH_OBJ);
		$cnt=1;

	if($query -> rowCount() > 0) {
		echo "<span style='color:red'>This Staff ID already exists. Please try another one</span>";
 		echo "<script>$('#submit').prop('disabled',true);</script>";

	} else{
		echo "<span style='color:green'>This Staff ID is available for Registration.</span>";
 		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}

?>
