<?php
	
	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if ($_POST['delete']) {
		
		require_once 'connect.php';
		
		$fid = intval($_POST['delete']);
		$query = "DELETE FROM gallery WHERE galleryId= fid";
		$res1 = mysqli_query($con,$query);
		
		if ($res1) {
			$response['status']  = 'success';
			$response['message'] = 'Product Deleted Successfully ...';
		} else {
			$response['status']  = 'error';
			$response['message'] = 'Unable to delete product ...';
		}
		echo json_encode($response);
	}