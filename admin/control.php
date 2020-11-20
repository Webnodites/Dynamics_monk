<?php
	include 'connect.php';

	$cname=$_POST['cname'];
	$cdate=$_POST['cdate'];
	$st= "True";
	$cf = $_FILES['cimg']['name'];
	echo "<script>console.log($cf);</script>";

	$sql = "INSERT INTO `category`(`cname`,`cimg`, `isActive`, `whenentered`) VALUES ('$cname','$cf','$st','$cdate')";
	$a5=move_uploaded_file($_FILES["cimg"]["tmp_name"],"../images/product/".$_FILES["cimg"]["name"]);
	
	if (mysqli_query($con, $sql)) {
		
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}

 


?>