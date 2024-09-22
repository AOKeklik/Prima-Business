<?php require_once ("functions.php")?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
  <title><?php echo $set->getSetting()->title()?></title>
  <meta name="title" content="<?php echo $set->getSetting()->title()?>" />
  <meta name="metatitle" content="<?php echo $set->getSetting()->metaTitle()?>" />
  <meta name="description" content="<?php echo $set->getSetting()->metaDesc()?>" />
  <meta name="keywords" content="<?php echo $set->getSetting()->metaKey()?>" />
  <meta name="author" content="<?php echo $set->getSetting()->metaAut()?>" />
  <meta name="owner" content="<?php echo $set->getSetting()->metaOwn()?>" />
  <meta name="copyright" content="<?php echo $set->getSetting()->metaCoppy()?>" />
  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">
  <!-- bootstrap -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- js -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <!-- css -->
  <link href="css/style.css" rel="stylesheet">
</head>
<body id="body">


<!-- top bar -->
<section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
        <div class="contact-info float-left">
            <i class="fa fa-envelope-o"></i>
            <a href="mailto:<?php echo $set->getSetting()->mail()?>"><?php echo $set->getSetting()->mail()?></a>
            <i class="fa fa-phone"></i><?php echo $set->getSetting()->tel()?>     
        </div>    
        <div class="social-links float-right">    
            <a href="<?php echo $set->getSetting()->twitter()?>" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="<?php echo $set->getSetting()->facebook()?>" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="<?php echo $set->getSetting()->instagram()?>" class="instagram"><i class="fa fa-instagram"></i></a> 
        </div>
    </div>
</section> 

<!-- header -->
<header id="header">
	<div class="container">
    	<div id="logo" class="pull-left">
            <h1><a href="#body" class="scrollto"><?php echo $set->getSetting()->logo()?></a></span></h1>
        </div>
        <nav id="nav-menu-container">
            <ul class="nav-menu">        
                <li class="menu-active"><a href="#body">Anasayfa</a></li>
                <li><a href="#hakkimizda">Hakkımızda</a></li>
                <li><a href="#hizmetler">Hizmetlerimiz</a></li>
                <li><a href="#filo">Araç Filomuz</a></li>
                <li><a href="#iletisim">iletişim</a></li> 
            </ul>
        </nav>
    </div>
</header>

<!-- intro -->
<section id="intro">
    <div class="intro-content">
        <h2><?php echo $set->getSetting()->tagline()?></h2>
    </div>
    <div id="intro-carousel" class="owl-carousel">
        <?php foreach ($set->getAllIntro () as $item) {
            echo <<<HTML
                <div class="item" style="background-image:url('{$item->img()}');"></div>
            HTML;
        }?>
    </div>
</section>

<!-- main body -->
<main id="main">

<!-- about -->
<section id="hakkimizda" class="wow fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 hakkimizda-img">
                <img src="<?php echo $set->getAbout()->img()?>"  alt=""/>
            </div>
            <div class="col-lg-6 content">
                <h2><?php echo $set->getAbout()->title()?></h2>
                <h3><?php echo $set->getAbout()->desc()?></h3>
            </div>
        </div>
    </div>
</section>

<!-- offers -->
<section id="hizmetler">
	<div class="container">
    	<div class="section-header">
            <h2>HİZMETLERİMİZ</h2>
            <p><?php echo $set->getOffer()->desc()?></p>
   	    </div>
        <div class="row">
    		<div class="col-lg-6">
            	<div class="box wow fadeInLeft">
                	<div class="icon"><i class="fa fa-bar-chart"></i></div>
                    <h4 class="title"><a href="#"><?php echo $set->getOffer()->firstTitle()?></a></h4>
                    <p class="description"><?php echo $set->getOffer()->firstDesc()?></p>
                </div> 
            </div>
                  
            <div class="col-lg-6">
            	<div class="box wow fadeInRight">
                	<div class="icon"><i class="fa fa-picture-o"></i></div>
                    <h4 class="title"><a href="#"><?php echo $set->getOffer()->secondTitle()?></a></h4>
                    <p class="description"><?php echo $set->getOffer()->secondDesc()?></p>
                </div> 
            </div>
                  
            <div class="col-lg-6">
            	<div class="box wow fadeInLeft" >
                	<div class="icon"><i class="fa fa-map"></i></div>
                    <h4 class="title"><a href="#"><?php echo $set->getOffer()->thirdTitle()?></a></h4>
                    <p class="description"><?php echo $set->getOffer()->thirdDesc()?></p>
                </div> 
            </div>
                  
            <div class="col-lg-6">
            	<div class="box wow fadeInRight">
                	<div class="icon"><i class="fa fa-shopping-bag"></i></div>
                    <h4 class="title"><a href="#"><?php echo $set->getOffer()->forthTitle()?></a></h4>
                    <p class="description"><?php echo $set->getOffer()->forthDesc()?></p>
                </div> 
            </div>
        </div>
    </div>
</section>

<!-- references  -->
<section id="referanslar" class="wow fadeInUp">
	<div class="container">
    	<div class="section-header">
            <h2><?php echo $set->getSetting()->headingRef()?></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscingLorem ipsum dolor sit amet, consectetur adipiscing Lorem ipsum dolor sit amet, consectetur adipiscingLorem ipsum dolor sit amet, consectetur adipiscing.</p>
        </div>
        <div class="owl-carousel clients-carousel">
            <?php foreach ($set->getAllReferences() as $item) {
                echo <<<HTML
                    <img src="{$item->img()}" alt="" />
                HTML;
            }?>
         </div>
    </div>
</section>


<!-- products -->
<section id="filo" class="wow fadeInUp">
    <div class="container">
		<div class="section-header">
            <h2><?php echo $set->getSetting()->headingPro()?></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscingLorem ipsum dolor sit amet, consectetur adipiscing Lorem ipsum dolor sit amet, consectetur adipiscingLorem ipsum dolor sit amet, consectetur adipiscing</p>
   		</div>
    </div>
    <div class="container-fluid">
        <div class="row no-gutters">
            <?php foreach ($set->getAllProducts() as $item) {
                echo <<<HTML
                    <div class="col-lg-3 col-md-4">         
                        <div class="filo-item wow fadeInUp">            
                            <a href="{$item->img()}" class="filo-popup">
                            <img src="{$item->img()}" alt="" />
                            <div class="filo-overlay">                
                            </div>
                            </a>
                        </div>
                    </div>
                HTML;
            }?>
        </div>
    </div>
</section>

<!-- testimonials -->
<section id="yorumlar" class="wow fadeInUp">
    <div class="container">
		<div class="section-header">
            <h2><?php echo $set->getSetting()->headingTes()?></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscingLorem ipsum dolor sit amet, consectetur adipiscing Lorem ipsum dolor sit amet, consectetur adipiscingLorem ipsum dolor sit amet, consectetur adipiscing </p>
   		</div>
         
        <div class="owl-carousel testimonials-carousel">
            <?php foreach ($set->getAllTestimonials() as $item) {
                echo <<<HTML
                    <div class="testimonial-item">    
                        <p>
                            <img src="img/sol.png" class="quote-sign-left" />
                            {$item->comment()}
                            <img src="img/sag.png" class="quote-sign-right" />
                        </p>
                        <img src="img/yorum.jpg" class="testimonial-img" alt="" />
                        <h3>{$item->name()}</h3>
                    </div>
                HTML;
            }?>
        </div>
    </div>
</section>


<!-- contact -->
<section id="iletisim" class="wow fadeInUp">
    <div class="container">
		<div class="section-header">
            <h2><?php echo $set->getSetting()->headingCon()?></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscingLorem ipsum dolor sit amet, consectetur adipiscing Lorem ipsum dolor sit amet, consectetur adipiscingLorem ipsum dolor sit amet, consectetur adipiscing </p>
   		</div> 
        
        <div class="row contact-info"> 
            <div class="col-md-4">
                <div class="contact-address">
                    <i class="ion-ios-location-outline"></i>
                    <h3>Adresimiz</h3>
                    <address><?php echo $set->getSetting()->address()?></address>
                </div>
            </div>
         
            <div class="col-md-4">
                <div class="contact-phone">
                    <i class="ion-ios-telephone-outline"></i>
                    <h3>Telefon Numaramız</h3>
                    <p><a href="tel:<?php echo $set->getSetting()->tel()?>"><?php echo $set->getSetting()->tel()?></a></p>
                </div>
            </div>
         
            <div class="col-md-4">
                <div class="contact-email">
                    <i class="ion-ios-email-outline"></i>
                    <h3>Mail</h3>
                    <p><a href="mailto:<?php echo $set->getSetting()->mail()?>"><?php echo $set->getSetting()->mail()?></a></p>
                </div>
            </div>   
        </div>
    </div>
    <div class="container mb-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48187.25741308118!2d28.611613590057516!3d40.98797099143595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b55fc19deb0b3b%3A0xdf4ea093f30983c6!2zQmV5bGlrZMO8esO8L8Swc3RhbmJ1bA!5e0!3m2!1str!2str!4v1545739036216" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <div class="container">
        <div class="form">
            <div id="mesajsonuc"></div>
            <div id="mesajhata"></div>
            
            <form id="mailform">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" name="isim" class="form-control" placeholder="Adınız" required="required" />
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" name="mail" class="form-control" placeholder="Mail Adresiniz" required="required" />
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="konu" class="form-control" placeholder="Mesaj Konusu" required="required" />
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="mesaj" rows="5"></textarea>
                </div>
                <div class="text-center"><input type="button"  value="Gönder" id="gonderbtn" class="btn btn-info"/></div>
            </form>
        </div>
    </div>
</section>

</main>

<!-- footer -->
<footer id="footer">
    <div class="container">
        <div class="copyright"><?php echo $set->getSetting()->metaCoppy()?> &copy; Copyright <strong><?php echo $set->getSetting()->title()?></strong></div>
        <div class="credits">Abdullah Onur Keklik</div>
    </div>
</footer>

<!-- back to up button -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>





  <!-- js -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="lib/sticky/sticky.js"></script>
  <!-- js -->
  <script src="js/main.js"></script>
</body>
</html>
