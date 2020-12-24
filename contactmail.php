<!DOCTYPE html>
<html>
<head>
	<style>
        .swal-text {
            font-size: 18px;
            text-align:center;
        }
        .swal-title {
            color: #D35B0B;
            font-size:28px;
        }
        .swal-button {
            background-color: #D35B0B;
            font-size:16px;
        }
        .swal-button:hover {
            background-color: #D35B0B;
        }
        .swal-button:focus {
            background-color: #D35B0B;
        }
        .swal-button:not([disabled]):hover {
            background-color: #D35B0B;
        }
    </style>
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
	$name = $First_name." ".$Last_name;
	
	$from = "DM website";
	$webmaster = "info@dynamicsmonk.com";
	$to="info@dynamicsmonk.com";
	$sub = "Contact";

	$header = "From:".$from."<".$webmaster.">\n";
	$message = "Name :".$name."\n";
	$message .= "Email :".$email."\n";
	$message .= "Mobile No. :".$phone."\n";
	$message .= "Company :".$company."\n";
	$message .= "Message :".$msg."\n";
     
     // echo $message;
	$sendmail = mail($to,$sub,$message,$header);
	if($sendmail){
		echo "<script>swal({
				  title: 'Thank You!',
				  text: 'Message Sent Successfully!',
				  icon: 'success',
				  button: 'Ok!',
				}).then(function(){
			         window.location.href='index';
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
			         window.location.href='contact';
			         });  
			</script>";

		}

}


if(isset($_POST["esubmit"]))
{
	$name=$_POST["name"];
	$email=$_POST["email"];
	$phone=$_POST["phone"];
	$company=$_POST["cmpny"];
	$msg=$_POST["msg"];
	
	$from = "DM website";
	$webmaster = "info@dynamicsmonk.com";
	$to="info@dynamicsmonk.com";
	$sub = "Quick Enquiry";

	$header = "From:".$from."<".$webmaster.">\n";
	$message = "Name :".$name."\n";
	$message .= "Email :".$email."\n";
	$message .= "Mobile No. :".$phone."\n";
	$message .= "Company :".$company."\n";
	$message .= "Message :".$msg."\n";
     
     // echo $message;
	$sendmail = mail($to,$sub,$message,$header);
	if($sendmail){
		echo "<script>swal({
				  title: 'Thank You!',
				  text: 'Message Sent Successfully!',
				  icon: 'success',
				  button: 'Ok!',
				}).then(function(){
			         window.location.href='index';
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
			         window.location.href='index';
			         });  
			</script>";

		}

}


?>