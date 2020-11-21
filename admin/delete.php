<?php
include('connect.php');


    if(isset($_POST["delete_subservice"]))
    {
        $delid = $_POST['del_id'];
        $delq2 = "DELETE FROM `subservice` WHERE sub_id = $delid";
        mysqli_query($con,$delq2);
        echo "<script>window.location.href='managesubservice.php'; </script>";
    } 

      if(isset($_POST["delete_ser"]))
    {
        $delid = $_POST['del_id'];
        $delq1 = "DELETE FROM `service` WHERE sid = $delid";
        mysqli_query($con,$delq1);
        echo "<script>window.location.href='mservice.php'; </script>";
    } 

  
    ?>