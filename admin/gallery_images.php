<?php
include('connect.php');

$fid = $_GET['fid'];
$q = "select * from gallery where galleryId = $fid";
$res1 = mysqli_query($con,$q);

if (!empty($_FILES)) {

    $file= $_FILES["file"]["name"];

    $a1 = "select * from gallery where galleryId = $fid";
    $rs1 = mysqli_query($con,$a1);


    foreach ($rs1 as $i) {
        if(empty($i['folderimages']))
        {

            $a = "UPDATE gallery SET `folderimages`= '$file' where galleryId = $fid ";
            $res2 = mysqli_query($con,$a);
           
        }
        else{
            $imgarray = explode (",", $i['folderimages']);
            foreach ($imgarray as $ia) {
                if($file != $ia)
                {
                    echo $file;
                    echo $ia;
                    $ct = $i['folderimages'] .','.$file;
                    $a = "UPDATE gallery SET `folderimages` = '$ct' where galleryId = $fid ";
                    $res2 = mysqli_query($con,$a);
                }
            }
        }
    }

    
    if($res2)
    {
    $a5=move_uploaded_file($_FILES["file"]["tmp_name"],"../images/folder/".$_FILES["file"]["name"]);

    echo "<script>
          alert('Folder Images added Successfully')
          </script>";
    }

    else{
        echo "<script>
          alert('$file')
          </script>";
    }

}

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Add Gallery Images</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
        <link rel="shortcut icon" href="../images/fav.jpg">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
         <!-- Dropzone css -->
        <link href="assets/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">

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
        <?php
            $index = 0;
            foreach ($res1 as $gal) 
                {
        ?>
                <div class="">
                    <div class="page-header-title">
                        <h4 class="page-title"><?php echo $gal['folderName'];?></h4>
                    </div>
                </div>

                <div class="page-content-wrapper ">

                    <div class="container-fluid">
                        <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body gallery">
                                           
                                            <div class="row">
                                                        <?php
                                                        $index++;
                                                        $imgarray = explode (",", $gal['folderimages']);
                                                        
                                                        foreach ($imgarray as $ia) {
                                                            if(empty($ia)){
                                                                echo "<p>No image found</p>";
                                                            }
                                                            else
                                                            {
                                                        ?> 
                                                        <div class="col-2">
                                                          <img src="../images/folder/<?php echo $ia;?>" />
                                                          <a style="position: absolute; right: 15px;color: #96bc33;" onclick="deleteimg(this)" data-id="<?php echo $ia;?>" data-a="<?php echo $gal['galleryId'] ;?>" ><i class="fa fa-trash"></i></a>
                                                        </div>

                                                <?php 
                                                    }
                                                 }
                                                ?>
                                           
                                            </div>

                                        </div>
                                    </div>
                                </div>

                        </div> <!-- End Row -->
                        <!-- end row -->

                         <div class="row">
                                <!-- Basic example -->
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-t-0">Add Images</h4>
                                            
                                                <div class="form-group">
                                                   <form action="gallery_images.php?fid=<?php echo $fid;?>" class="dropzone" id="dropimg">
                                                        <div class="fallback">
                                                            <input name="file" type="file" multiple="multiple">
                                                        </div>
                                                    </form>
                                                </div>
                                           

                           
                                            
                                        </div><!-- card-body -->
                                    </div> <!-- card -->
                                </div> <!-- col-->


                            </div> <!-- End row -->

                    </div><!-- container-fluid -->

                </div> <!-- Page content Wrapper -->
           <?php 
                }
            ?>
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
        <h5 class="modal-title">Delete Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="delete.php" method="post">

          <div class="modal-body">
            <input type="hidden" name="del_id" id="del_id">
            <input type="hidden" name="g_id" id="g_id">
            <h5>Do You Want To Remove This Image ?</h5>
          </div>
          <div class="modal-footer">
            <button type="submit" name = 'delete_img' class="btn yes">Yes</button>
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
        <!-- Dropzone js -->
        <script src="assets/plugins/dropzone/dist/dropzone.js"></script>

       <!-- Bootstrap File Style -->
        <script src="assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
   
    <script type="text/javascript">
     function deleteimg(elem){
            $('#delmodal').modal('show');
               
            var fId = $(elem).data("id");
            var gId = $(elem).data("a");

                console.log(fId);
                console.log(fId);
                $('#del_id').val(fId);
                $('#g_id').val(gId);
            }

    Dropzone.options.dropimg = {
    maxFilesize: 3,
    acceptedFiles: '.jpg, .jpeg, .png, .bmp',
    init: function() {
        this.on('success', function(){
            
            if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                alert('Images uploaded');
                    location.reload();
            }
        });
    }
    };
    </script>

    </body>
</html>