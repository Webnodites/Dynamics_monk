<?php
include('connect.php');

$sid = $_GET['sid'];
$q = "select * from subservice where sub_id = $sid";
$res1 = mysqli_query($con,$q);


if(isset($_POST['updatesubservice']))
{

$subname = $_POST["subname"];
$sname = $_POST["sname"];
$sub_desc = $_POST["sub_desc"];

$z= "UPDATE `subservice` SET `s_id`=$sname, `sub_name`= '$subname' , `sub_content`='$sub_desc' WHERE sub_id= $sid";

$res = mysqli_query($con,$z);

if($res)
{

echo "<script>
      alert('Service updated Successfully');
      window.location.href='managesubservice.php';
      </script>";
}
else{
    echo "<script>
      alert('error');
      window.location.href='editservice.php?sid=$sid';
      </script>";
}

}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Update Sub-Service</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="../images/fav.jpg">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
         <script src="ckeditor/ckeditor.js"></script>

    </head>


    <body class="fixed-left">
    
     <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left">
                <div class="text-center">
                    <a href="../index" class="logo"><img src="../images/logo3.png"  class="logo" /></a>
                    <a href="../index" class="logo-sm"><img src="../images/fav.png"></a>
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


                        <!-- <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-layout"></i><span> Gallery
                                </span><span class="float-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="addfolder.php">Add folder</a></li>
                                <li><a href="managegallery.php">Manage gallery</a></li>
                            </ul>
                        </li> -->

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-files"></i><span> Services
                                </span><span class="float-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                <!-- <li><a href="category.php">Manage category</a></li> -->
                                <li><a href="mservice.php">Add Main Service</a></li>
                                <li><a href="addsubservice.php">Add Sub Service</a></li>
                                <li><a href="managesubservice.php">Manage Services</a></li>
                                
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
                            <h4 class="page-title">Update Sub-Service</h4>
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
                                                 foreach ($res1 as $s) {
                                                        
                                              ?>
                                            <form action="editservice.php?sid=<?php echo $s['sub_id'] ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Sub-Service Name</label>
                                                    <input type="text" class="form-control" name="subname" value="<?php echo $s['sub_name'] ?>" id="" placeholder="Enter Sub-Service Name">
                                                </div>

                                                <div class="form-group">
                                                    <label class=" control-label">Main Service</label>
                                                    <div class="">
                                                        <select class="form-control" name="sname">
                                                            <?php
                                                                 $a = "select * from service";
                                                                 $res1 = mysqli_query($con,$a);
            
                                                                    foreach ($res1 as $ser) {
                                                                        if($ser['sid'] == $s['s_id']){
                                                                            ?>
                                                                            <option value="<?php echo $ser['sid'] ?>" selected><?php echo $ser['sname'] ?></option>
                                                                            <?php
                                                                            }
                                                                            else{
                                                                            ?>
                                                                            <option value="<?php echo $ser['sid'] ?>"><?php echo $ser['sname'] ?></option>

                                                            <?php } }?>
                                                           
                                                        </select>
                                                    </div>
                                                </div>

                                               <div class="form-group">
                                                <label for="exampleInputEmail1">Sub-Service Content </label>
                                                    <textarea id="editor" name="sub_desc" rows="30" ><?php echo $s['sub_content'] ?></textarea>
                                                
                                                </div>

                                                
                                                <button type="submit" name="updatesubservice" class="btn themebtn waves-effect waves-light">Update</button>


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
                ©2020 Dynamics Monk <span class="d-none d-md-inline-block"> - Developed by webnodites.</span>
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
            $( document ).ready(function() {
        CKEDITOR.replace('editor');

    });
        </script>
    </body>
</html>