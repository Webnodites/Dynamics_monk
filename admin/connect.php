 <?php

$con=mysqli_connect("localhost",'root','',"dm");
session_start();
   
if(!isset($_SESSION['username']))
{
	header("location:index.php");
}


?> 

