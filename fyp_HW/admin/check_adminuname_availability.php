<?php 
require_once("inc-admin/config.php");

if(!empty($_POST["UserName"])) {
		$UserName= $_POST["UserName"];
		$sql ="SELECT UserName FROM admin WHERE UserName=:UserName";
		$query= $dbh -> prepare($sql);
		$query-> bindParam(':UserName', $UserName, PDO::PARAM_STR);
		$query-> execute();
		$results = $query -> fetchAll(PDO::FETCH_OBJ);
		$cnt=1;
		if($query -> rowCount() > 0)
{
	echo "<span style='color:red'> This username already exists. Please try another one. </span>";
 	echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> this username is available for registration .</span>";
	 echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}


?>
