<?php
	include 'connect.php';

	$sname=$_POST['sname'];
	$st= "True";

	$sql = "INSERT INTO `service`(`sname`, `isActive`) VALUES ('$sname','$st')";
	
	if (mysqli_query($con, $sql)) {
		
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}

 


?>