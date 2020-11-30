<?php 
include('connect.php');

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- title & metadata & discription -->
    <title>Dynamics Monk</title>
    <meta name="description" content="We are a homegrown Full Stack IT company. We provide customised services for our customers in the NBFC, Learning and CRM space." />

    <link rel="shortcut icon" href="images/fav.png">
    <!-- Library -->
    <link rel="stylesheet" type="text/css" href="css/lib.css" async>
    
    <!-- Custom - Common CSS -->
    <link rel="stylesheet" type="text/css" href="css/navigation.css" async>
    
    <link rel="stylesheet" type="text/css" href="style.css" async/>
   
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">


  
    <link rel="stylesheet" type="text/css" href="css/style1.css" async/>
</head>
<body>

<!-- Header Section -->
    <div id="return-to-top"><i class="fa fa-angle-up"></i></div>
    <header class="header_s">
     
        <div class="container-fluid">
            <div class="menu-block">
               <!--  <div class="mobile-sticky-footer">
                    <a target="_blank" class="skype" href="skype:aegissoftware?call"><i class="fa fa-fw" aria-hidden="true" title="Skype"></i></a>
                    <a target="_blank" class="whatsapp" href="https://api.whatsapp.com/send?phone=919824127020&text=Hi&sbquo;&nbsp;I&nbsp;am&nbsp;Connect&nbsp;through&nbsp;your&nbsp;website"><i class="fa fa-fw" aria-hidden="true" title="Whatsapp"></i></a>
                    <a target="_blank" class="inquiry" href="tel:+16469710799"><i class="fa fa-fw" aria-hidden="true" title="Phone"></i></a>
                    <a target="_blank" class="case-studies" href="mailto:info@nexsoftsys.com"><i class="fa fa-fw" aria-hidden="true" title="Email"></i></a>
                    <a href="rfp.html" class="client-speaks"><i class="fa fa-fw" aria-hidden="true" title="RFP"></i></a>
                </div> -->
                <div class="container">
                    <nav class="menu-navigation">
                        <div class="logo-block">
                            <a class="" href="">
                                <img src="images/logo3.png" class="hello" alt="logo" />
                            </a>
                        </div>
                        <a class="menuswitch" href="#">
                            <span class="menuline bar1"></span>
                            <span class="menuline bar2"></span>
                            <span class="menuline bar3"></span>
                        </a>
                        <div class="menu-collapse">
                            <ul class="navigation-menu">
                                <li><a href="index">Home</a></li>
                                <li><a href="company">About Us</a></li>
                                <li><a href="ourservices">Services</a></li>
                             
                                <li><a href="/articles/">Blog</a></li>
                                <li>
                                    <a href="contact" class="nabtn">
                                    <span>Contact Us</span>
                                    <svg width="150" height="39" viewBox="0 0 400 120" xmlns="https://www.w3.org/2000/svg">
                                        <rect class="line1" x="10" y="4" width="379" height="112" rx="59.5" />
                                        <rect class="line2" x="10" y="4" width="379" height="112" rx="59.5" />
                                    </svg>

                                </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header><!-- Header Section /- -->
 <main class="site-main">


        <!-- PageBanner -->
        <div class="pagebanner-section banner_aboutbg banner_mainpage">
            <div class="container">
                <div class="pagebanner-content align_bottom">
                    <h1>Services</h1>
                </div>
            </div>
        </div><!-- PageBanner /- -->
       <?php
            $q = "select * from service";
            $res1 = mysqli_query($con,$q);
            $counter = 0;
            foreach ($res1 as $s) {
                $counter++;
                if($counter%2 == 0){
                     ?>
                        <!-- content-section -->
                        <section class="content-section">
                            <div class="container-fluid">
                                <div class="row align-items-center">
                                    <div class="col-lg-5 mb-8 mb-lg-0 ml-auto pr-md-0 order-lg-2">
                                        <div class="position-relative gray-box-gr ar-1_1">
                                            <div class="position-absolute b-8 r-0 l-0 l-lg--9 text-center text-lg-left">
                                                <img src="images/sr2.png" class="app-img w-100 parallax-img p-9" data-parallax="true" alt="Img">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-lp-6 pl-md-10 order-lg-1">
                                        <div class="pr-xl-7 pr-lp-10 pl-xl-8">
                                            <div class="aos-init zi-1" data-aos="fade" data-aos-delay="50" data-aos-once="false">
                                                <svg height="150" width="220" stroke="#dbdee1" stroke-width="2" class="text-dshAim mb--9 ml--4 ml-md--10">
                                                    <text style="font-family: 'Istok Web', sans-serif; font-weight: 800;" x="23" y="125" fill="none" font-size="150">0<?php echo $counter; ?></text>
                                                </svg>
                                            </div>
                                            <div class="px-8">
                                                <div class="aos-init zi-2 position-relative " data-aos="slideUp" data-aos-delay="50">
                                                    <h2 class="display-md-4 display-xl-3 display-5 lh-1 fw-800 text-primary mb-4 mb-xl-2"><?php echo $s['sname']; ?></h2>
                                                </div>
                                                <div class="aos-init ser_ul" data-aos="slideUp" data-aos-delay="100">
                                                    <p class="lead-md-2 fw-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
                                                  <ul>
                                                    <?php 
                                                         $sbq = "select * from subservice where s_id =".$s['sid'];
                                                         $resb = mysqli_query($con,$sbq);
            
                                                        foreach ($resb as $sb) {

                                                    ?>
                                                      <li><a href="subservice?sid=<?php echo $sb['sub_id']; ?>"><?php echo $sb['sub_name']; ?></a></li>
                                                     
                                                    <?php } ?>
                                                  </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- /.content-section -->
                    <?php
                }
                else{
                    ?>
                        <!-- features-section -->
                        <section id="features" class="content-section overflow-hidden" style="">
                            <div class="container-fluid">
                                <div class="row align-items-center">
                                    <div class="col-lg-5 mb-8 mb-lg-0 ml-auto pr-md-0 pr-xl-9">
                                        <div class="position-relative gray-box-gr ar-1_1">
                                            <div class="position-absolute b-8 r-0 l-0 r-lg--8 text-center text-lg-right">
                                                <img src="images/tr.jpg" class="app-img w-100 parallax-img p-9 p-lg-8 " data-parallax="true" alt="Img">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-7  ml-auto">
                                        <div class="pl-md-10 pr-md-8">
                                            <div class="aos-init zi-1" data-aos="fade" data-aos-delay="50" data-aos-once="false">
                                                <svg height="150" width="220" stroke="#dbdee1" stroke-width="2" class="text-dshAim mb--9 ml--4 ml-md--10">
                                                    <text style="font-family: 'Istok Web', sans-serif; font-weight: 800;" x="23" y="125" fill="none" font-size="150">0<?php echo $counter; ?></text>
                                                </svg>
                                            </div>
                                           

                                            <div class="px-8 px-lg-0">
                                                <div class="aos-init zi-2 position-relative mb-5" data-aos="slideUp" data-aos-delay="50">
                                                    <h2 class="display-md-4 display-xl-3 display-5 lh-1 fw-800 text-primary mb-4 mb-xl-2"><?php echo $s['sname']; ?></h2>
                                                </div>
                                                <div class="aos-init ser_ul" data-aos="slideUp" data-aos-delay="100">
                                                    <p class="lead-md-2 fw-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
                                                  <ul>
                                                     <?php 
                                                         $sbq = "select * from subservice where s_id =".$s['sid'];
                                                         $resb = mysqli_query($con,$sbq);
            
                                                        foreach ($resb as $sb) {

                                                    ?>
                                                      <li><a href="subservice?sid=<?php echo $sb['sub_id']; ?>"><?php echo $sb['sub_name']; ?></a></li>
                                                     
                                                    <?php } ?>
                                                  </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- /.content-section -->
                    <?php
                }
            }
        ?>







<!-- <div class="clients-section">
            <div class="section-header ourclients">
                <h4>Our Clients</h4>
            </div>
            <div class="container">
                <div class="clients-block owl-carousel owl-theme">
                    <div class="item client1"><img src="images/spacer.gif" alt="client" /></div>
                    <div class="item client1"><img src="images/spacer.gif" alt="client" /></div>
                    <div class="item client1"><img src="images/spacer.gif" alt="client" /></div>
                    <div class="item client1"><img src="images/spacer.gif" alt="client" /></div>
                    <div class="item client1"><img src="images/spacer.gif" alt="client" /></div>
                    <div class="item client1"><img src="images/spacer.gif" alt="client" /></div>
                    <div class="item client1"><img src="images/spacer.gif" alt="client" /></div>
                    <div class="item client1"><img src="images/spacer.gif" alt="client" /></div>
                    <div class="item client1"><img src="images/spacer.gif" alt="client" /></div>
                </div>
            </div>
        </div> -->
</main>


 <!-- Footer -->
    <footer class="footer-main">
        <div class="container">
            <div class="row">
                <div class="footer-box">
                    <img src="images/logo3.png" class="hello" alt="logo" />
                    <div class="footer-innerbox-block">
                       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="footer-box">
                    <h3>Services</h3>
                    <div class="footer-innerbox-block">
                        <div class="footer-innerbox">
                            <ul class="listing">
                                <li><a href="services/application-development.html">Application Development</a></li>
                                <li><a href="services/application-development.html">Application Development</a></li>
                                <li><a href="services/application-development.html">Application Development</a></li>
                                <li><a href="services/application-development.html">Application Development</a></li>
                                <li><a href="services/application-development.html">Application Development</a></li>
                            </ul>
                        </div>
                        <div class="footer-innerbox">
                            <ul class="listing">
                                <li><a href="services/amazon-cloud-services.html">AWS</a></li>
                                <li><a href="services/amazon-cloud-services.html">AWS</a></li>
                                <li><a href="services/amazon-cloud-services.html">AWS</a></li>
                                <li><a href="services/amazon-cloud-services.html">AWS</a></li>
                                <li><a href="services/amazon-cloud-services.html">AWS</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
               
                <div class="footer-box footer_sm">
                    <div class="footer-box-business">
                        <h3>Quick Links</h3>
                        <ul class="listing">
                            <li><a href="company.html">Home</a></li>
                            <li><a href="company.html">About</a></li>
                            <li><a href="/articles/">Blog</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                        <div class="footer-socialbox">
                            <h3>Follow Us</h3>
                            <div class="ft-social">
                                <a href="https://www.facebook.com/NexSoftSys/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="https://twitter.com/nexsoftsys" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="https://www.linkedin.com/company/nexsoftware/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                <a href="https://www.youtube.com/c/Nexsoftsys" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright_text">
            <div class="copyright_text">
                <div class="container footer-rating">
                    <p>Copyright &copy; <span id="year"></span> Dynamics Monk| All rights reserved | Developed By <a href="https://webnodites.com">Webnodites</a></p>
                </div>
            </div>
        </div>
    </footer><!-- Footer /- -->


    <script defer src="js/lib.js"></script>
    <script defer src="js/functions.js"></script>

<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>

<!-- [ plugins ] -->
<!-- parallax -->
<script src="assets/plugins/parallax/simpleParallax.min.js"></script>
<!-- aos -->
<script src="assets/plugins/aos/aos.js"></script>

<!-- User JS -->
<script src="assets/js/scripts.js"></script>

<!-- Main JS -->
<script src="assets/js/main.js" id="_mainJS" data-plugins="load"></script>

</body>
</html>