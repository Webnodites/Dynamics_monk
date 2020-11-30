<?php
include('connect.php');

$sid = $_GET['sid'];
$q = "select * from subservice where sub_id = $sid";
$res1 = mysqli_query($con,$q);

foreach ($res1 as $s) {
                                                        
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- title & metadata & discription -->
	<title><?php echo $s['sub_name'] ?></title>
	<meta name="description" content="We are a homegrown Full Stack IT company. We provide customised services for our customers in the NBFC, Learning and CRM space." />

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
     <link rel="shortcut icon" href="images/fav.png">
	
	<!-- Standard Favicon -->
	<link type="image/x-icon" href="images/favicon.ico" rel="shortcut icon" /> 
    
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="images/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
	
	<!-- Google Analytics -->
	<!-- <script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-64517863-1', 'auto');
		ga('send', 'pageview');
	</script> --><!-- Google Analytics /- -->
	
	<!-- Library -->
	<link rel="stylesheet" type="text/css" href="css/lib.css" async>
	
	<!-- Custom - Common CSS -->
	<link rel="stylesheet" type="text/css" href="css/navigation.css" async>
	
    <link rel="stylesheet" type="text/css" href="css/style.css" async/>
	<link rel="stylesheet" type="text/css" href="css/style1.css" async/>
<noscript>
<div class="ndiv">
<div class="ntext">
<b>JavaScript Required</b>
<p>We're sorry, but we doesn't work properly without JavaScript enabled.</p>
</div>
</div>
</noscript>

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
                    <a href="rfp" class="client-speaks"><i class="fa fa-fw" aria-hidden="true" title="RFP"></i></a>
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
                    <h1><?php echo $s['sub_name'] ?></h1>
                </div>
            </div>
        </div><!-- PageBanner /- -->

        <div class="aboutus-page-section subservice">
            <div class="container">
                <?php echo $s['sub_content'] ?>
            </div>
        </div>


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
                                <li><a href="services/application-development">Application Development</a></li>
                                <li><a href="services/application-development">Application Development</a></li>
                                <li><a href="services/application-development">Application Development</a></li>
                                <li><a href="services/application-development">Application Development</a></li>
                                <li><a href="services/application-development">Application Development</a></li>
                            </ul>
                        </div>
                        <div class="footer-innerbox">
                            <ul class="listing">
                                <li><a href="services/amazon-cloud-services">AWS</a></li>
                                <li><a href="services/amazon-cloud-services">AWS</a></li>
                                <li><a href="services/amazon-cloud-services">AWS</a></li>
                                <li><a href="services/amazon-cloud-services">AWS</a></li>
                                <li><a href="services/amazon-cloud-services">AWS</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
               
                <div class="footer-box footer_sm">
                    <div class="footer-box-business">
                        <h3>Quick Links</h3>
                        <ul class="listing">
                            <li><a href="company">Home</a></li>
                            <li><a href="company">About</a></li>
                            <li><a href="/articles/">Blog</a></li>
                            <li><a href="contact">Contact Us</a></li>
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
</body>
</html>
<?php } ?>