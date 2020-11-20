<?php
include('connect.php');
    if(isset($_POST["delete_finish"]))
    {
        $delid = $_POST['del_id'];
        $pid = $_POST['pid'];
        $delq = "DELETE FROM `productfinishes` WHERE fid = $delid";
        mysqli_query($con,$delq);
        echo "<script>window.location.href='managefinishes.php?pid=$pid';  </script>";
    } 


    if(isset($_POST["delete_product"]))
    {
        $delid = $_POST['del_id'];
        $delq1 = "DELETE FROM `productfinishes` WHERE pid = $delid";
        $delq2 = "DELETE FROM `product` WHERE pid = $delid";
        mysqli_query($con,$delq1);
        mysqli_query($con,$delq2);
        echo "<script>window.location.href='manageproduct.php'; </script>";
    } 

      if(isset($_POST["delete_cat"]))
    {
        $delid = $_POST['del_id'];
        $delq1 = "DELETE FROM `category` WHERE cid = $delid";
        mysqli_query($con,$delq1);
        echo "<script>window.location.href='category.php'; </script>";
    } 

    if(isset($_POST["delete_img"]))
    {
        $delimg = $_POST['del_id'];
        $gid = $_POST['g_id'];

        $q = "select * from gallery where galleryId = $gid";
        $res1 = mysqli_query($con,$q);
        $i =0;
        foreach ($res1 as $gal){
            $imgarray1 = explode (",", $gal['folderimages']);
            
            foreach ($imgarray1 as $ia) {
                $i++;
                if($ia == $delimg)
                {
                    break;
                }
            }
            $imgarray = $gal['folderimages'];
            
            if($i==1){
                $newarray = str_replace($delimg.',','',$imgarray);
            }
            elseif($i>1){
                $newarray = str_replace(','.$delimg,'',$imgarray);
            }
            else{
                $newarray = str_replace(','.$delimg,' ',$imgarray);
            }
        }
        
        
                                           
        $delq1 = "UPDATE `gallery` SET `folderimages`= '$newarray' WHERE galleryId = $gid";
        $res1 = mysqli_query($con,$delq1);
        if($res1){
           $image = $delimg;
            $file= '../images/folder/'.$image;
            unlink($file); 
        }
        
        echo "<script>window.location.href='gallery_images.php?fid=$gid'; </script>";
    } 


    ?>