<?php
include('connect.php');

$a= "Select * from `subservice`";
$res1 = mysqli_query($con,$a);


?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Manage Sub-Services</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="../images/fav.jpg">

        <!-- DataTables -->
        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/datatables/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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
                        <h4 class="page-title">Manage Sub-Service</h4>
                    </div>
                </div>

                <div class="page-content-wrapper ">

                    <div class="container-fluid">
                        <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <table id="datatable-responsive" class="table  table-bordered dt-responsive nowrap" style="border-collapse: collapse; width: 100%;">
                                                <thead>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>Sub-Service Name</th>
                                                    <th>Main Service</th>
                                                    <th>Sub-Service Content</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
            
                                                    $index = 0;
                                                    if(!empty($res1))
                                                    {
                                                    foreach ($res1 as $s) {
                                                        $index++;
                                                        
                                        
                                                    ?>
                                                    <tr>
                                                    <td><?php echo $index; ?></td>
                                                    <td><?php echo $s['sub_name']; ?></td>
                                                    <?php
                                                        $b = "select * from service where `sid` = ".$s['s_id'];
                                                        $res2 = mysqli_query($con,$b);
                                                        foreach ($res2 as $ser) {


                                                     ?>
                                                    <td><?php echo $ser['sname']; ?></td>

                                                    <?php  } ?>
                                                    <td><a href="viewservice.php?sid=<?php echo $s['sub_id']; ?>">View</a></td>
                                                   
                                                    <td><a href="editservice.php?sid=<?php echo $s['sub_id']; ?>">Edit</a> | 
                                                        <a id="" class="delete_product" onclick="deletepd(this)" data-id="<?php echo $s['sub_id']; ?>" >Delete</a>
                                                    </td>
                                                    </tr>
                                                    <?php
                                                        }
                
                                                    } else {
                
                                                    ?>
                                                        <tr>
                                                        <td colspan="7">No Sub-Services Found</td>
                                                        </tr>
                                                        <?php
                                                        
                                                    }
                                                    ?>
                                                    
                                                
                                                
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>

                            </div> <!-- End Row -->
                        <!-- end row -->

                    </div><!-- container-fluid -->

                </div> <!-- Page content Wrapper -->

            </div> <!-- content -->

            <footer class="footer">
                ©2020 Dynamics Monk <span class="d-none d-md-inline-block"> - Developed by webnodites.</span>
            </footer>

        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->


<div class="modal fade" id="delmodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="delete.php" method="post">

          <div class="modal-body">
            <input type="hidden" name="del_id" id="del_id">
            <h5>Do You Want To Delete This Sub-Service ??</h5>
          </div>
          <div class="modal-footer">
            <button type="submit" name = 'delete_subservice' class="btn yes">Yes</button>
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

        <!-- Required datatable js-->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        
        <script src="assets/plugins/datatables/jszip.min.js"></script>
        <script src="assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.scroller.min.js"></script>

        <!-- Responsive examples -->
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js"></script>


        <script src="assets/js/app.js"></script>
 <script type="text/javascript">
     function deletepd(elem){
            $('#delmodal').modal('show');
               
            var fId = $(elem).data("id");

                console.log(fId);
                $('#del_id').val(fId);
            }
 </script>
    </body>
</html>