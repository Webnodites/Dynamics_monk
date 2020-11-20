 <?php

$con=mysqli_connect("mi3-wts3.my-hosting-panel.com","bellehom","J261?xmb","anjitait_bellehom");
session_start();
   
if(!isset($_SESSION['username']))
{
	header("location:index.php");
}
?> 

