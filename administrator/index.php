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
                            $message = "";
                            if (isset ($_POST["settings-button"])) {
                                $data = [
                                    'logoyazisi' => $set->formSanitizer($_POST["settings-logo"]),
                                    'slogan'   => $set->formSanitizer($_POST["settings-tagline"]),
                                    
                                    // Meta bilgiler
                                    'metatitle' => $set->formSanitizer($_POST["settings-metaTitle"]),
                                    'metadesc'  => $set->formSanitizer($_POST["settings-metaDesc"]),
                                    'metaovner'   => $set->formSanitizer($_POST["settings-metaOwn"]),
                                    'metacopy' => $set->formSanitizer($_POST["settings-metaCoppy"]),
                                
                                    // Başlıklar
                                    'referans_baslik' => $set->formSanitizer($_POST["settings-headingRef"]),
                                    'filo_baslik' => $set->formSanitizer($_POST["settings-headingPro"]),
                                    'yorum_baslik' => $set->formSanitizer($_POST["settings-headingTes"]),
                                    'iletisim_baslik' => $set->formSanitizer($_POST["settings-headingCon"]),
                                
                                    // İletişim bilgileri
                                    'telefonno' => $set->formSanitizer($_POST["settings-tel"]),
                                    'mailadres' => $set->formSanitizer($_POST["settings-mail"]),
                                    'adres'=> $set->formSanitizer($_POST["settings-address"]),
                                
                                    // Sosyal medya
                                    'twit'  => $set->formSanitizer($_POST["settings-twitter"]),
                                    'face' => $set->formSanitizer($_POST["settings-facebook"]),
                                    'insta'=> $set->formSanitizer($_POST["settings-instagram"]),
                                ];

                                if ($set->updateSetting ($data)) {
                                    $message = "<div class='col-lg-10 mx-auto mt-2 mb-4 bg-info'><p class='text-white p-2'>Successfully updated!</p></div>";
                                } else {
                                    $message = "<div class='col-lg-10 mx-auto mt-2 mb-4 bg-danger'><p class='text-white p-2'>{$set->getError ()}</p></div>";
                                }
                            }
                            
                            $logo = isset($_POST["settings-logo"]) ? $_POST["settings-logo"] : $set->getSetting()->logo();
                            $tagline = isset($_POST["settings-tagline"]) ? $_POST["settings-tagline"] : $set->getSetting()->tagline();

                            $metaTitle = isset($_POST["settings-metaTitle"]) ? $_POST["settings-metaTitle"] : $set->getSetting()->metaTitle();
                            $metaDesc = isset($_POST["settings-metaDesc"]) ? $_POST["settings-metaDesc"] : $set->getSetting()->metaDesc();
                            $metaOwn = isset($_POST["settings-metaOwn"]) ? $_POST["settings-metaOwn"] : $set->getSetting()->metaOwn();
                            $metaCoppy = isset($_POST["settings-metaCoppy"]) ? $_POST["settings-metaCoppy"] : $set->getSetting()->metaCoppy();

                            $headingRef = isset($_POST["settings-headingRef"]) ? $_POST["settings-headingRef"] : $set->getSetting()->headingRef();
                            $headingPro = isset($_POST["settings-headingPro"]) ? $_POST["settings-headingPro"] : $set->getSetting()->headingPro();
                            $headingTes = isset($_POST["settings-headingTes"]) ? $_POST["settings-headingTes"] : $set->getSetting()->headingTes();
                            $headingCon = isset($_POST["settings-headingCon"]) ? $_POST["settings-headingCon"] : $set->getSetting()->headingCon();

                            $tel = isset($_POST["settings-tel"]) ? $_POST["settings-tel"] : $set->getSetting()->tel();
                            $mail = isset($_POST["settings-mail"]) ? $_POST["settings-mail"] : $set->getSetting()->mail();
                            $address = isset($_POST["settings-address"]) ? $_POST["settings-address"] : $set->getSetting()->address();

                            $twitter = isset($_POST["settings-twitter"]) ? $_POST["settings-twitter"] : $set->getSetting()->twitter();
                            $facebook = isset($_POST["settings-facebook"]) ? $_POST["settings-facebook"] : $set->getSetting()->facebook();
                            $instagram = isset($_POST["settings-instagram"]) ? $_POST["settings-instagram"] : $set->getSetting()->instagram();
                            
                            ?>

                            <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
                                <div class="row">
                                    <div class="col-lg-10 mx-auto mt-2 mb-4">   
                                        <h5 class="text-info pull-left">Site ayarlari</h5>
                                    </div> 
                                    <?php echo $message?>
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
                                                <input type="text" name="settings-tagline" class="form-control" value="<?php echo $tagline?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="width:100%" class="bg-primary" />
                                    <!-- metas -->
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Meta Başlığı</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-metaTitle" class="form-control" value="<?php echo $metaTitle?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Meta Açıklaması</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-metaDesc" class="form-control" value="<?php echo $metaDesc?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Yapımcı</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-metaOwn" class="form-control" value="<?php echo $metaOwn?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Copywright</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-metaCoppy" class="form-control" value="<?php echo $metaCoppy?>" />
                                            </div>
                                        </div>
                                    </div> 
                                    <hr style="width: 100%" class="bg-primary">
                                    <!-- headings -->
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Referanslarımız Başlığı</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-headingRef" class="form-control" value="<?php echo $headingRef?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Filomuz Başlığı</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-headingPro" class="form-control" value="<?php echo $headingPro?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Yorumlar Başlığı</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-headingTes" class="form-control" value="<?php echo $headingTes?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">İletişim Başlığı</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-headingCon" class="form-control" value="<?php echo $headingCon?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="width:100%" class="bg-primary" />
                                    <!-- contacts -->
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Telefon Numarası</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-tel" class="form-control" value="<?php echo $tel?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Adres</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-address" class="form-control" value="<?php echo $address?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Email Adresi</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-mail" class="form-control" value="<?php echo $mail?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="width:100%" class="bg-primary" />
                                    <!-- socilas -->
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Twitter</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-twitter" class="form-control" value="<?php echo $twitter?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Instagram</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-instagram" class="form-control" value="<?php echo $instagram?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mx-auto mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 pt-3">
                                                <span id="siteayarfont">Facebook</span>
                                            </div>
                                            <div class="col-lg-8 p-1">
                                                <input type="text" name="settings-facebook" class="form-control" value="<?php echo $facebook?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="width:100%" class="bg-primary" />   
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
