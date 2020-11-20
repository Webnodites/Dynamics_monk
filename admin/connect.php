 <?php

$con=mysqli_connect("localhost",'nuqjbfmy_dm','admin@123dm',"nuqjbfmy_dm");
session_start();
   
if(!isset($_SESSION['username']))
{
	header("location:index.php");
}


?> 

