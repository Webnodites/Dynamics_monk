<?php
include('connect.php');

$pid = $_GET['pid'];
$q = "select * from product where pid = $pid";
$res1 = mysqli_query($con,$q);


if(isset($_POST['updateproduct']))
{

$pname = $_POST["pname"];
$cname = $_POST["cname"];
$dt = $_POST["dt"];
$pdesc = $_POST["pdesc"];



$date = date('d-m-Y h:i:sa');

$z= "UPDATE `product` SET `pname`='$pname', `cname`= '$cname' , `delivery`='$dt' ,`pdesc`='$pdesc' WHERE pid= $pid";

$res = mysqli_query($con,$z);

$m1= $_FILES["m1"]["name"];
$m2= $_FILES["m2"]["name"];
$m3= $_FILES["m3"]["name"];

if($m1 != ''){
    $z1= "UPDATE `product` SET `m1`='$m1' WHERE pid= $pid";
    $r1 = mysqli_query($con,$z1);
    $a1=move_uploaded_file($_FILES["m1"]["tmp_name"],"../images/product/".$_FILES["m1"]["name"]);
}
if($m2 != ''){
    $z2= "UPDATE `product` SET `m2`='$m2' WHERE pid= $pid";
    $r2 = mysqli_query($con,$z2);
    $a2=move_uploaded_file($_FILES["m2"]["tmp_name"],"../images/product/".$_FILES["m2"]["name"]);
}
if($m3 != ''){
    $z3= "UPDATE `product` SET `m3`='$m3' WHERE pid= $pid";
    $r3 = mysqli_query($con,$z3);
    $a3=move_uploaded_file($_FILES["m3"]["tmp_name"],"../images/product/".$_FILES["m3"]["name"]);
}

if($res)
{

echo "<script>
      alert('Product updated Successfully');
      window.location.href='manageproduct.php';
      </script>";
}
else{
    echo "<script>
      alert('error');
      window.location.href='editproduct.php?pid=$pid';
      </script>";
}

}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Update Product</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="../images/fav.jpg">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    </head>


    <body class="fixed-left">
    
     <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left">
                <div class="text-center">
                    <a href="../index" class="logo"><img src="../images/logo1.jpg"></a>
                    <a href="../index" class="logo-sm"><img src="../images/fav.jpg"></a>
                </div>
            </div>
            <!-- Button mobile view to collapse sidebar menu -->


            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                        
                    </ul>

                    <ul class="nav navbar-right float-right list-inline">
                        
                        <li class="d-none d-sm-block">
                            <a href="#" id="btn-fullscreen" class="waves-effect waves-light notification-icon-box"><i
                                    class="fas fa-expand"></i></a>
                        </li>


                        <li class="dropdown">
                            <a href="logout.php" class="dropdown-toggle profile waves-effect waves-light" 
                                aria-expanded="true">
                              <!--   <img src="assets/images/users/avatar-1.jpg" alt="user-img" class="rounded-circle"> -->
                                <span class="profile-username">
                                   Logout
                                </span>
                            </a>
                          
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->

         <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">

                <div class="user-details">
                    <div class="user-info">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Admin</a>
                            
                        </div>
                    </div>
                </div>
                <!--- Divider -->


                <div id="sidebar-menu">
                    <ul>
                        <li>
                            <a href="dashboard.php" class="waves-effect"><i class="ti-home"></i><span> Dashboard </span></a>
                        </li>


                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-layout"></i><span> Gallery
                                </span><span class="float-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="addfolder.php">Add folder</a></li>
                                <li><a href="managegallery.php">Manage gallery</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-files"></i><span> Product
                                </span><span class="float-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                <!-- <li><a href="category.php">Manage category</a></li> -->
                                <li><a href="addproduct.php">Add Product</a></li>
                                <li><a href="manageproduct.php">Manage Product</a></li>
                                
                            </ul>
                        </li>

                    </ul>
                </div>
                
                <div class="clearfix"></div>
            </div> <!-- end sidebarinner -->
        </div>
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
                <div class="content">

                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Update Product</h4>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">

                        <div class="container-fluid">
                           

                            <div class="row">
                                <!-- Basic example -->
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                          <?php 
                                             foreach ($res1 as $p) {
                                                    
                                          ?>
                                            <form action="editproduct.php?pid=<?php echo $pid ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Product Name</label>
                                                    <input type="text" class="form-control" name="pname" id="" value="<?php echo $p['pname']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label class=" control-label">Category</label>
                                                    <div class="">
                                                        <select class="form-control" name="cname">
                                                            <?php 
                                                            
                                                               if($p['cname'] == 'Kitchen Panel')
                                                               {  
                                                            ?>
                                                            <option value="Kitchen Panel" selected>Kitchen Panel</option>
                                                            <option value="Wardrobe Panel" >Wardrobe Panel</option>
                                                            <option value="Bed Panel" >Bed Panel</option>

                                                            <?php 
                                                             }
                                                             elseif($p['cname'] == 'Wardrobe Panel'){
                                                                ?>
                                                                <option value="Kitchen Panel">Kitchen Panel</option>
                                                               <option value="Wardrobe Panel" selected>Wardrobe Panel</option>
                                                               <option value="Bed Panel" >Bed Panel</option>

                                                           <?php
                                                             }
                                                             else{

                                                                ?>
                                                                <option value="Kitchen Panel" >Kitchen Panel</option>
                                                               <option value="Wardrobe Panel" >Wardrobe Panel</option>
                                                               <option value="Bed Panel" selected>Bed Panel</option>
                                                                <?php
                                                           }

                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Delivery Time (in days)</label>
                                                    <input type="text" class="form-control" id="" name="dt" value="<?php echo $p['delivery']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Product Description </label>
                                                    <textarea class="form-control" id="" name="pdesc" placeholder="Enter Product Description " rows="3"><?php echo $p['pdesc']; ?>
                                                    </textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Material 1 (Particle Board)</label>
                                                    <input type="file" name="m1" class="filestyle" data-buttonbefore="true" onchange="readURL1(this);">
                                                   
                                                    <img src="../images/product/<?php echo $p['m1']; ?>" id="blah1" style="height: auto;width: 150px;margin-top: 20px;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Material 2 (MDF)</label>
                                                    <input type="file" name="m2" class="filestyle" data-buttonbefore="true" onchange="readURL2(this);">
                                                    
                                                    <img src="../images/product/<?php echo $p['m2']; ?>" id="blah2" style="height: auto;width: 150px;margin-top: 20px;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Material 3 (Ply Wood)</label>
                                                    <input type="file" name="m3" class="filestyle" data-buttonbefore="true" onchange="readURL3(this);">
                                                    
                                                    <img src="../images/product/<?php echo $p['m3']; ?>" id="blah3" style="height: auto;width: 150px;margin-top: 20px;">
                                                </div>

                                                
                                                <button type="submit" name="updateproduct" class="btn themebtn waves-effect waves-light">Update</button>
                                            </form>

                                        <?php } ?>
                                        </div><!-- card-body -->
                                    </div> <!-- card -->
                                </div> <!-- col-->


                            </div> <!-- End row -->


                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

            <footer class="footer">
                ©2020 Bellehom <span class="d-none d-md-inline-block"> - Developed with by ais.</span>
            </footer>

        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->




        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/js/app.js"></script>
       <!-- Bootstrap File Style -->
        <script src="assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
    <script type="text/javascript">
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah1')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah2')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah3')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
    </body>
</html>