<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body>
	<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>   
     <script src="sweetalert2.min.js"></script>
</body>
</html>
<?php
echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";

if(isset($_POST["btnSubmit"]))
{
	$First_name=$_POST["txtFName"];
	$Last_name=$_POST["txtLName"];
	$email=$_POST["txtEmail"];
	$phone=$_POST["txtPhone"];
	$company=$_POST["txtCCompany"];
	$msg=$_POST["txtCMessage"];
	
	$from = "Client Contact";
	$webmaster = "info@dynamicsmonk.com";
	$to="info@dynamicsmonk.com";
	$sub = $subject;

	$header = "From:".$from."<".$webmaster.">\n";
	$message = "Name :".$name."\n";
	$message .= "Email :".$email."\n";
	$message .= "Mobile No. :".$phone."\n";
	$message .= "Message :".$msg."\n";
     
     echo $message;
	$sendmail = mail($to,$sub,$message,$header);
	if($sendmail){
		echo "<script>swal({
				  title: 'Thank You!',
				  text: 'Message Sent Successfully!',
				  icon: 'success',
				  button: 'Ok!',
				}).then(function(){
			         window.location.href='index.html';
			         });
			   </script>";
	}
	else{
	
		echo "<script>
			swal({
				  title: 'Oops!',
				  text: 'Something Went Wrong!',
				  icon: 'error',
				  button: 'Ok!',
				}).then(function(){
			         window.location.href='contact.html';
			         });  
			</script>";

		}

}


?>