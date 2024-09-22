<?php require_once ("functions.php")?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
   
    <title>Udemy Nakliyat-Yönetim Paneli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?php echo Constants::$ROOT_URL?>assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="<?php echo Constants::$ROOT_URL?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo Constants::$ROOT_URL?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo Constants::$ROOT_URL?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo Constants::$ROOT_URL?>assets/css/metisMenu.css">
    <link rel="stylesheet" href="<?php echo Constants::$ROOT_URL?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">    
    <link rel="stylesheet" href="<?php echo Constants::$ROOT_URL?>assets/css/typography.css">
    <link rel="stylesheet" href="<?php echo Constants::$ROOT_URL?>assets/css/default-css.css">
    <link rel="stylesheet" href="<?php echo Constants::$ROOT_URL?>assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo Constants::$ROOT_URL?>assets/css/responsive.css">   
    <script src="<?php echo Constants::$ROOT_URL?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

    <div id="preloader">
        <div class="loader"></div>
    </div>
  
    <div class="page-container">
        <!-- sidebar -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="<?php echo Constants::$ROOT_URL?>assets/images/logo/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">                    
                            <li><a href="<?php echo Constants::$ROOT_URL?>"><i class="ti-pencil"></i> <span>Site Ayarları</span></a></li>
                            <li><a href="<?php echo Constants::$ROOT_URL?>intro"><i class="ti-image"></i> <span>İntro Ayarları</span></a></li>
                            <li><a href="<?php echo Constants::$ROOT_URL?>about"><i class="ti-flag"></i> <span>Hakkımızda Ayarları</span></a></li>
                            <li><a href="<?php echo Constants::$ROOT_URL?>offers"><i class="ti-medall"></i> <span>Hizmetlerimiz Ayarları</span></a></li>
                            <li><a href="<?php echo Constants::$ROOT_URL?>references"><i class="ti-eye"></i> <span>Referanslar Ayarları</span></a></li>
                            <li><a href="<?php echo Constants::$ROOT_URL?>products"><i class="ti-car"></i> <span>Araç Filosu</span></a></li>
                            <li><a href="<?php echo Constants::$ROOT_URL?>testimonials"><i class="ti-comment-alt"></i> <span>Müşteri Yorumları</span></a></li>             
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <!-- main -->
        <div class="main-content">
            
            <!-- header -->
            <div class="header-area">
                <div class="row align-items-center">
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                      
                    </div>
                     <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Kullanıcı <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">                               
                                <a class="dropdown-item" href="#">Çıkış</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- content -->
            <div class="main-content-inner">
               <div class="row">
                    <div class="col-lg-12 mt-5 bg-white" style="min-height:500px;">
                        <?php if ($_GET["page"] == "settings") {
                            
                            $logo = isset($_POST["settings-logo"]) ? $_POST["settings-logo"] : $set->getSetting()->logo();
                            $logo = isset($_POST["settings-logo"]) ? $_POST["settings-tagline"] : $set->getSetting()->logo();
                            
                            ?>

                            <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
                                <div class="row">
                                    <div class="col-lg-10 mx-auto mt-2 mb-4">   
                                        <h5 class="text-info pull-left">Site ayarlari</h5>
                                    </div> 

                                    <!-- generals -->
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Logo</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-logo" class="form-control" value="<?php echo $logo?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Site Sloganı</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-tagline" class="form-control" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="width:100%" />
                                    <!-- headings -->
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Referanslarımız Başlığı</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-references" class="form-control" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Filomuz Başlığı</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-products" class="form-control" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Yorumlar Başlığı</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-testimonials" class="form-control" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">İletişim Başlığı</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-contacts" class="form-control" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="width:100%" />
                                    <!-- contacts -->
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Twitter</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-twitter" class="form-control" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Instagram</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-instagram" class="form-control" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Facebook</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-facebook" class="form-control" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Telefon Numarası</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-tel" class="form-control" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Adres</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-address" class="form-control" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Email Adresi</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-mail" class="form-control" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="width:100%" />
                                    <!-- metas -->
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Meta Başlığı</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-metaTitle" class="form-control" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Meta Açıklaması</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-metaDesc" class="form-control" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Yapımcı</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-metaOwn" class="form-control" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Copywright</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-metaCopy" class="form-control" value="" />
                                            </div>
                                        </div>
                                    </div>    
                                    <!-- submit -->                         
                                    <div class="col-lg-8 mx-auto mt-2 border-bottom">
						                <input type="submit" name="settings-button" class="btn btn-info m-1 pull-right" value="Güncelle"  />
					                </div> 
                                </div>
                            </form>                          
                        
                        <?php } else if ($_GET["page"] == "intro") {?>

                            <h1>Intro</h1>                      

                        <?php } else if ($_GET["page"] == "about") {?>

                            <h1>About</h1>

                        <?php } else if ($_GET["page"] == "offers") {?>

                            <h1>Offers</h1>

                        <?php } else if ($_GET["page"] == "references") {?>
                        
                            <h1>References</h1> 
                        
                        <?php } else if ($_GET["page"] == "products") {?>
                        
                            <h1>Products</h1>

                        <?php } else if ($_GET["page"] == "testimonials") {?>

                            <h1>Testimonials</h1>

                        <?php } else {
                            header("Location: ../404.php");
                         }?>
                </div>
            </div>

        </div>
    </div>
    
   
   
    <script src="<?php echo Constants::$ROOT_URL?>assets/js/vendor/jquery-2.2.4.min.js"></script>    
    <script src="<?php echo Constants::$ROOT_URL?>assets/js/popper.min.js"></script>
    <script src="<?php echo Constants::$ROOT_URL?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo Constants::$ROOT_URL?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo Constants::$ROOT_URL?>assets/js/metisMenu.min.js"></script>
    <script src="<?php echo Constants::$ROOT_URL?>assets/js/jquery.slimscroll.min.js"></script>
    <script src="<?php echo Constants::$ROOT_URL?>assets/js/jquery.slicknav.min.js"></script> 
    <script src="<?php echo Constants::$ROOT_URL?>assets/js/plugins.js"></script>
    <script src="<?php echo Constants::$ROOT_URL?>assets/js/scripts.js"></script>
</body>

</html>
