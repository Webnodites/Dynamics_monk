<?php
include('connect.php');
$pid = $_GET['pid'];
$a = "Select * from product where pid = $pid";
$res1 = mysqli_query($con,$a);
foreach ($res1 as $p) {
    $pname = $p['pname'];
}

$date = date('d-m-Y h:i:sa');
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Finishes</title>
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
                            <h4 class="page-title"><?php echo $pname;?></h4>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">

                        <div class="container-fluid">
                        

                            <div class="row">
                                <!-- Basic example -->
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-t-0">Add Finishes </h4>
                                            <form action="readfinish.php" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="fname" placeholder="Enter Finish Name">
                                                </div>
                                                <div class="form-group">
                                                     <label for="exampleInputPassword1">Finish Image</label>
                                                    <input type="file" name="fimg" class="filestyle" data-buttonbefore="true" onchange="readURL(this);">
                                                    <img src="#" id="blah" alt="Selected Image Here.." style="height: auto;width: 150px;margin-top: 20px;">
                                                </div>
                                                
                                                 <div class="form-group">
                                                    <input type="hidden" name="pid" value="<?php echo $pid;?>" >
                                                </div>
                                               
                                                <button type="submit" class="btn themebtn waves-effect waves-light" name="addfinish">Add</button>
                                            </form>
                                        </div><!-- card-body -->
                                    </div> <!-- card -->
                                </div> <!-- col-->


                            </div> <!-- End row -->

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-b-30 m-t-0">All Finishes </h4>
                                            <div class="row">
                                                <div class="col-lg-12 col-sm-12 col-12">

                                                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; width: 100%;">
                                                        <thead>
                                                        <tr>
                                                            <th>Sr No.</th>
                                                            <th>Finish Name</th>
                                                            <th>Finish Image</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>


                                                        <tbody>
                                                            <?php
                                                            $b= "Select * from `productfinishes` where pid = $pid";
                                                            $res2 = mysqli_query($con,$b);
                                                                    
                                                            $index = 0;
                                                            if(!empty($res2))
                                                                {
                                                                foreach ($res2 as $fn) {
                                                                    $index++;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $index; ?></td>
                                                                    <td><?php echo $fn['fname']; ?></td>
                                                                    <td><img src="../images/product/<?php echo $fn['fimg']; ?>"></td>
                                                                    <td>
                                                                        <a id="" class="delete_fn" onclick="deletefn(this)" data-id="<?php echo $fn['fid']; ?>" >Delete</a>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                        }
                                                                        
                                                                    }
                                                                else {
                                                                        
                                                                ?>
                                                                <tr>
                                                                    <td colspan="4">No Finishes Found</td>
                                                                </tr>
                                                            <?php
                                                                                                                        
                                                                }
                                                            ?>

                                                       
                                                        
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- End Row -->



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


<div class="modal fade" id="delmodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Product Finish</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="delete.php" method="post">

          <div class="modal-body">
            <input type="hidden" name="del_id" id="del_id">
            <input type="hidden" name="pid" value="<?php echo $pid; ?>">
            <h5>Do You Want To Delete This Data ??</h5>
          </div>
          <div class="modal-footer">
            <button type="submit" name = 'delete_finish' class="btn yes">Yes</button>
            <button type="button" class="btn no" data-dismiss="modal">No</button>
          </div>
      </form>    
    </div>
  </div>
</div>


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



<script>
     $(document).ready(function(){
       /* it will load products when document loads */
     
     });
    function deletefn(elem){
               $('#delmodal').modal('show');
               
               var fId = $(elem).data("id");

                console.log(fId);
                $('#del_id').val(fId);
            }

</script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
    </body>
</html>