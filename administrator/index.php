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

    <?php if (isset ($_SESSION["userLoggedIn"])): $userLoggedIn = $_SESSION["userLoggedIn"];?>

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
                                <li><a href="<?php echo Constants::$ROOT_URL?>mails"><i class="fa fa-envelope"></i> <span>Gelen Mesajlar</span></a></li>             
                                <li><a href="<?php echo Constants::$ROOT_URL?>mail-settings"><i class="fa fa-cog"></i> <span>Mesa Ayarlari</span></a></li>             
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
                                <img class="avatar user-thumb" src="<?php echo Constants::$ROOT_URL?>assets/images/author/avatar.png" alt="avatar">
                                <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $userLoggedIn?> <i class="fa fa-angle-down"></i></h4>
                                <div class="dropdown-menu">                               
                                    <a class="dropdown-item" href="<?php echo Constants::$ROOT_URL?>logout">Çıkış</a>
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

                                <form action="<?php $_SERVER["PHP_SELF"]?>" method="post" class="py-5">
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
                                        <hr style="width:100%" class="border border-light" />
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
                                        <hr style="width: 100%" class="border border-light">
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
                                        <hr style="width:100%" class="border border-light" />
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
                                        <hr style="width:100%" class="border border-light" />
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
                                        <!-- submit -->                         
                                        <div class="col-lg-8 mx-auto mt-2">
                                            <input type="submit" name="settings-button" class="btn btn-info m-1 pull-right" value="Güncelle"  />
                                        </div> 
                                    </div>
                                </form>                          
                            
                            <?php } else if ($_GET["page"] == "intro") {?>

                                <div class="row text-center">
                                    <div class="col-lg-12 border-bottom container">
                                        <h3 class="float-left mt-3 text-info">İNTRO RESİMLERİ</h3>
                                        <label for="intro-add-img" class="float-right">
                                            <span class="btn btn-success m-2" style="cursor: pointer;">+</span>
                                            <input onchange="addIntroImage(event)" type="file" name="intro-add-img" id="intro-add-img" style="display: none">
                                        </label>
                                    </div>            
                                
                                    <?php foreach ($set->getAllIntro() as $item) {?>
                                        <div class="col-lg-4">
                                            <div class="row border border-light p-1 m-1">
                                                <div class="col-lg-12">
                                                    <img src="../<?php echo $item->img()?>">
                                                </div>

                                                <div class="col-6 text-right">
                                                    <label for="intro-update-img-<?php echo $item->id()?>">
                                                        <span href="#" class="fa fa-edit m-2 text-success" style="font-size:25px;cursor: pointer;"></span>
                                                        <input onchange="updateIntroImage(event, <?php echo $item->id()?>)" type="file" id="intro-update-img-<?php echo $item->id()?>" name="intro-update-img" style="display: none">
                                                    </label>
                                                </div>

                                                <div class="col-6 text-left">
                                                    <span onclick="deleteIntroImage(event, <?php echo $item->id()?>)" class="fa fa-close m-2 text-danger" style="font-size:25px;cursor: pointer;"></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }?>
                                </div>

                            <?php } else if ($_GET["page"] == "about") {
                                    $about = new About ($pdo);

                                    $message = "";

                                    if (isset ($_POST["guncel"])) {
                                        $data = [
                                            "baslik" => $set->formSanitizer($_POST["baslik"]),
                                            "icerik" => $set->formSanitizer($_POST["icerik"])
                                        ];
                                        
                                        if ($set->updateAboutContent($data)) {
                                            $message = "<div class='col-lg-10 mx-auto mt-2 mb-4 bg-info'><p class='text-white p-2'>Successfully updated!</p></div>";
                                        } else {
                                            $message = "<div class='col-lg-10 mx-auto mt-2 mb-4 bg-danger'><p class='text-white p-2'>{$set->getError ()}</p></div>";
                                        }
                                    }

                                    $baslik = isset ($_POST["baslik"]) ? $_POST["baslik"] : $about->title();
                                    $icerik = isset ($_POST["icerik"]) ? $_POST["icerik"] : $about->desc();
                                ?>

                                <div class="row text-center">
                                    <div class="col-lg-12 border-bottom"><h3 class="mt-3 text-info">HAKKIMIZDA AYARLARI</h3>
                                </div>

                                <?php echo $message?>

                                <div class="col-lg-6 mx-auto">
                                    <form action="" method="post" enctype="multipart/form-data" class="row py-5 m-1">
                                        <div class="col-lg-3 bg-light" id="hakkimizdayazilar">Resim</div>

                                        <div class="col-lg-9">
                                            <img src="../<?php echo $about->img()?>">
                                            <input onchange="updateAboutImage(event)" type="file" name="dosya">
                                        </div>

                                        <hr style="width:100%" class="border border-light" />

                                        <div class="col-lg-3 bg-light pt-3" id="hakkimizdayazilarn">Başlık</div>

                                        <div class="col-lg-9">
                                            <input type="text" name="baslik" class="form-control m-2" value="<?php echo $baslik?>">
                                        </div>

                                        <hr style="width:100%" class="border border-light" />

                                        <div class="col-lg-3 bg-light" id="hakkimizdayazilar">İçerik</div>

                                        <div class="col-lg-9">
                                            <textarea name="icerik" class="form-control" rows="8"><?php echo $icerik?></textarea>
                                        </div>

                                        <div class="col-lg-12">
                                            <input type="submit" name="guncel" value="GÜNCELLE" class="btn btn-primary m-2">
                                        </div>
                                    </form>
                                </div>

                            <?php } else if ($_GET["page"] == "offers") {?>

                                <div id="offer-parent" class="row text-center">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <h4 class="col-6 mt-3 text-info mb-2">
                                                Hizmetler Ayarları
                                            </h4> 
                                            <div class="col-6 flex-row justify-content-end align-content-center">
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                                                    <i class="ti-plus text-white"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <?php foreach ($set->getAllOffer() as $item):
                                        $message = "";
                                        if (isset ($_POST["buton_{$item->id()}"])) {
                                            $data = [
                                                "icon" => $set->formSanitizer($_POST["icon_{$item->id()}"]),
                                                "baslik" => $set->formSanitizer($_POST["baslik_{$item->id()}"]),
                                                "icerik" => $set->formSanitizer($_POST["icerik_{$item->id()}"])
                                            ];

                                            if ($set->updateOffer ($data, $item->id())) {
                                                $message = "<div class='col-lg-12 mx-auto mt-2 mb-4 bg-info'><p class='text-white p-2'>Successfully updated!</p></div>";
                                            } else {
                                                $message = "<div class='col-lg-12 mx-auto mt-2 mb-4 bg-danger'><p class='text-white p-2'>{$set->getError ()}</p></div>";
                                            }
                                        }
                                        $icon = isset ($_POST["icon_{$item->id()}"]) ? $_POST["icon_{$item->id()}"] : $item->icon();
                                        $baslik = isset ($_POST["baslik_{$item->id()}"]) ? $_POST["baslik_{$item->id()}"] : $item->title();
                                        $icerik = isset ($_POST["icerik_{$item->id()}"]) ? $_POST["icerik_{$item->id()}"] : $item->desc();
                                        ?>
                                        <div class="col-lg-4 mx-auto">
                                            <form action="" method="post" class="row card-bordered p-1 m-1 bg-light">
                                                <?php echo $message?>
                                                <div class="col-lg-2 pt-3">Icon</div>
                                                <div class="col-lg-12 p-2">
                                                    <input type="text" name="icon_<?php echo $item->id()?>" class="form-control" value="<?php echo $icon?>" />                                    
                                                </div>

                                                <div class="col-lg-2 pt-3">Başlık</div>
                                                <div class="col-lg-12 p-2">
                                                    <input type="text" name="baslik_<?php echo $item->id()?>" class="form-control" value="<?php echo $baslik?>" />                                    
                                                </div>

                                                <div class="col-lg-12 p-2">İçerik</div>
                                                <div class="col-lg-12 p-2">
                                                    <textarea name="icerik_<?php echo $item->id()?>" rows="5" class="form-control"><?php echo $icerik?></textarea>
                                                </div>
                                                <div class="col-lg-12 p-2">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="submit" name="buton_<?php echo $item->id()?>" value="Guncelle" class="btn btn-primary"/>
                                                        </div>
                                                        <div class="col-6">  
                                                            <span onclick="deleteOfferContent(event, <?php echo $item->id()?>)" class="fa fa-close m-2 text-danger" style="font-size:25px;cursor: pointer;"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <?php endforeach?>
                                </div>
                                <!-- modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">New Offer Add</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p id="alert"></p>
                                                <form>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Icon</label>
                                                        <input type="text"  name="icon" class="form-control" id="recipient-name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Title</label>
                                                        <input type="text" name="title" class="form-control" id="recipient-name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="col-form-label">Content</label>
                                                        <textarea class="form-control" name="content" id="message-text"></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button onclick="addOfferContent(event)" type="button" class="btn btn-primary">Create</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } else if ($_GET["page"] == "references") {?>
                            
                                <div class="row text-center">
                                    <div class="col-lg-12 border-bottom container">
                                        <h3 class="float-left mt-3 text-info">REFERANSLARIMIZ RESİMLERİ</h3>
                                        <label for="references-add-img" class="float-right">
                                            <span class="btn btn-success m-2" style="cursor: pointer;">+</span>
                                            <input onchange="addReferencesImage(event)" type="file" name="references-add-img" id="references-add-img" style="display: none">
                                        </label>
                                    </div>            
                                
                                    <?php foreach ($set->getAllReferences() as $item) {?>
                                        <div class="col-lg-4">
                                            <div class="row border border-light p-1 m-1">
                                                <div class="col-lg-12">
                                                    <img src="../<?php echo $item->img()?>">
                                                </div>

                                                <div class="col-6 text-right">
                                                    <label for="references-update-img-<?php echo $item->id()?>">
                                                        <span href="#" class="fa fa-edit m-2 text-success" style="font-size:25px;cursor: pointer;"></span>
                                                        <input onchange="updateReferencesImage(event, <?php echo $item->id()?>)" type="file" id="references-update-img-<?php echo $item->id()?>" name="references-update-img" style="display: none">
                                                    </label>
                                                </div>

                                                <div class="col-6 text-left">
                                                    <span onclick="deleteReferencesImage(event, <?php echo $item->id()?>)" class="fa fa-close m-2 text-danger" style="font-size:25px;cursor: pointer;"></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }?>
                                </div>
                            
                            <?php } else if ($_GET["page"] == "products") {?>
                            
                                <div class="row text-center">
                                    <div class="col-lg-12 border-bottom container">
                                        <h3 class="float-left mt-3 text-info">FILO RESİMLERİ</h3>
                                        <label for="filo-add-img" class="float-right">
                                            <span class="btn btn-success m-2" style="cursor: pointer;">+</span>
                                            <input onchange="addFiloImage(event)" type="file" name="filo-add-img" id="filo-add-img" style="display: none">
                                        </label>
                                    </div>            
                                
                                    <?php foreach ($set->getAllFilo() as $item) {?>
                                        <div class="col-lg-4">
                                            <div class="row border border-light p-1 m-1">
                                                <div class="col-lg-12">
                                                    <img src="../<?php echo $item->img()?>">
                                                </div>

                                                <div class="col-6 text-right">
                                                    <label for="filo-update-img-<?php echo $item->id()?>">
                                                        <span href="#" class="fa fa-edit m-2 text-success" style="font-size:25px;cursor: pointer;"></span>
                                                        <input onchange="updateFiloImage(event, <?php echo $item->id()?>)" type="file" id="filo-update-img-<?php echo $item->id()?>" name="filo-update-img" style="display: none">
                                                    </label>
                                                </div>

                                                <div class="col-6 text-left">
                                                    <span onclick="deleteFiloImage(event, <?php echo $item->id()?>)" class="fa fa-close m-2 text-danger" style="font-size:25px;cursor: pointer;"></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }?>
                                </div>

                            <?php } else if ($_GET["page"] == "testimonials") {?>

                                <div id="yorum-parent" class="row text-center">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <h4 class="col-6 mt-3 text-info mb-2">
                                                Yorum Ayarları
                                            </h4> 
                                            <div class="col-6 flex-row justify-content-end align-content-center">
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                                                    <i class="ti-plus text-white"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <?php foreach ($set->getAllTestimonials() as $item):
                                        $message = "";
                                        if (isset ($_POST["buton_{$item->id()}"])) {
                                            $data = [
                                                "isim" => $set->formSanitizer($_POST["isim_{$item->id()}"]),
                                                "icerik" => $set->formSanitizer($_POST["icerik_{$item->id()}"])
                                            ];

                                            if ($set->updateTestimonialContent ($data, $item->id())) {
                                                $message = "<div class='col-lg-12 mx-auto mt-2 mb-4 bg-info'><p class='text-white p-2'>Successfully updated!</p></div>";
                                            } else {
                                                $message = "<div class='col-lg-12 mx-auto mt-2 mb-4 bg-danger'><p class='text-white p-2'>{$set->getError ()}</p></div>";
                                            }
                                        }
                                        $isim = isset ($_POST["isim_{$item->id()}"]) ? $_POST["isim_{$item->id()}"] : $item->name();
                                        $icerik = isset ($_POST["icerik_{$item->id()}"]) ? $_POST["icerik_{$item->id()}"] : $item->comment();
                                        ?>
                                        <div class="col-lg-4 mx-auto">
                                            <form action="" method="post" class="row card-bordered p-1 m-1 bg-light">
                                                <?php echo $message?>
                                                <div class="col-lg-2 pt-3">Img</div>
                                                <div class="col-lg-12 p-2">
                                                    <label for="dosya_<?php echo $item->id()?>" style="height: 200px;cursor:pointer;">
                                                        <img style="width:100%;height:100%" id="img_<?php echo $item->id()?>" src="../<?php echo $item->img()?>" alt="" />
                                                        <input onchange="updateTestimonialImg(event, <?php echo $item->id()?>)" type="file" id="dosya_<?php echo $item->id()?>" name="dosya" class="d-none">  
                                                    </label>                                  
                                                </div>

                                                <div class="col-lg-2 pt-3">Isim</div>
                                                <div class="col-lg-12 p-2">
                                                    <input type="text" name="isim_<?php echo $item->id()?>" class="form-control" value="<?php echo $isim?>" />                                    
                                                </div>

                                                <div class="col-lg-12 p-2">İçerik</div>
                                                <div class="col-lg-12 p-2">
                                                    <textarea name="icerik_<?php echo $item->id()?>" rows="5" class="form-control"><?php echo $icerik?></textarea>
                                                </div>
                                                <div class="col-lg-12 p-2">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="submit" name="buton_<?php echo $item->id()?>" value="Guncelle" class="btn btn-primary"/>
                                                        </div>
                                                        <div class="col-6">  
                                                            <span onclick="deleteTestimonialContent(event, <?php echo $item->id()?>)" class="fa fa-close m-2 text-danger" style="font-size:25px;cursor: pointer;"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <?php endforeach?>
                                </div>
                                <!-- modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">New Offer Add</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p id="alert"></p>
                                                <form>
                                                    <div class="col-lg-12 p-2">
                                                        <label for="dosya" style="cursor:pointer;">
                                                            <input type="file" name="dosya" id="dosya" >  
                                                        </label>                                  
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Name</label>
                                                        <input type="text" name="name" class="form-control" id="recipient-name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="col-form-label">Content</label>
                                                        <textarea class="form-control" name="content" id="message-text"></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button onclick="addTestimonial(event)" type="button" class="btn btn-primary">Create</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } else if ($_GET["page"] == "mails") {?>

                                <h1>Mails</h1>

                            <?php } else if ($_GET["page"] == "mail-settings") {?>

                                <h1>Mail Settings</h1>

                            <?php } else if ($_GET["page"] == "logout") {

                               $set->userLogout ($userLoggedIn);

                            } else {
                                header("Location: ../404.php");
                            }?>
                    </div>
                </div>

            </div>
        </div>

    <?php else:?>

        <?php
            $message = "";

            $kulad = isset($_POST["kulad"]) ? $_POST["kulad"] : "";

            if (isset ($_POST["login-submit"])) {
                $kulad = $set->formSanitizer($_POST["kulad"]);
                $sifre = $set->formSanitizer($_POST["sifre"]);

                $success = $set->userLogin($kulad, $sifre);

                if ($success) {
                    $_SESSION ["userLoggedIn"] = $kulad;
                    header("Location: settings");
                } else {
                    $message = "<div class='col-lg-10 mx-auto mt-2 mb-4 bg-danger'><p class='text-white p-2'>{$set->getError ()}</p></div>";
                }
            }
            
        ?>
        <div class="container">
            <div class="login-box ptb-100">
                <form action="" method="POST">
                    <div class="login-form-head">
                        <h4>YONETIM PANELI</h4>
                    </div>
                    <?php echo $message?>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <input type="text" name="kulad" id="kulladlab" placeholder="Kullanici Adi" value="<?php echo $kulad?>" />
                            <i class="ti-user"></i>
                        </div>
                         <div class="form-gp">

                            <input type="password" name="sifre" id="sifrelab" placeholder="Sifre" />
                            <i class="ti-lock"></i>
                        </div>
                        <div class="submit">
                            <input type="submit" name="login-submit" class="btn btn-dark" value="GIRIS YAP" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php endif?>
    
   
   
    <script src="<?php echo Constants::$ROOT_URL?>assets/js/vendor/jquery-2.2.4.min.js"></script>    
    <script src="<?php echo Constants::$ROOT_URL?>assets/js/popper.min.js"></script>
    <script src="<?php echo Constants::$ROOT_URL?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo Constants::$ROOT_URL?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo Constants::$ROOT_URL?>assets/js/metisMenu.min.js"></script>
    <script src="<?php echo Constants::$ROOT_URL?>assets/js/jquery.slimscroll.min.js"></script>
    <script src="<?php echo Constants::$ROOT_URL?>assets/js/jquery.slicknav.min.js"></script> 
    <script src="<?php echo Constants::$ROOT_URL?>assets/js/plugins.js"></script>
    <script src="<?php echo Constants::$ROOT_URL?>assets/js/scripts.js"></script>
    <script>
        const ROOT = "http://localhost/Prima-Business/"
        const ROOT_ADMIN = "http://localhost/Prima-Business/administrator/"

        /* intro */
        function updateIntroImage (e, introUpdateId) {
            try {
                e.preventDefault ()

                const theNode = e.target
                const theParent = theNode.closest(".col-lg-4")
                const theImg = theParent.querySelector("img");

                const file = e.target.files[0]
                if (!file) return
                const fileName = file.name
                const oldImgName = theImg.src.split("/").slice(-2).join("/")
                const formData = new FormData ()

                formData.append("file", file)
                formData.append("introUpdateId", introUpdateId)
                formData.append("imgName", fileName)
                formData.append("oldImgName", oldImgName)

                if (fileName) {
                    const res = $.ajax({
                        url: ROOT_ADMIN.concat("ajax.php"),
                        type: "POST",
                        contentType: false, 
                        processData: false,
                        data: formData,
                        success: function (data) {
                            console.log(data)

                            if (theImg) {
                                theImg.src = ROOT+data
                            }
                        }
                    })
                }
            } catch (err) {
                console.log(err)
            }
        }
        function deleteIntroImage (e, introDeleteId) {
            try {
                e.preventDefault ()
            
                const theNode = e.target
                const theParent = theNode.closest(".col-lg-4")
                const theImg = theParent.querySelector("img")
                const formData = new FormData ()

                formData.append("introDeleteId", introDeleteId)

                $.ajax ({
                    url: ROOT_ADMIN.concat("ajax.php"), 
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: formData, 
                    success: data => {
                        theParent.remove ()
                    }
                }) 
            } catch (err) {
                console.log(err)
            }    
        }
        function addIntroImage (e) {
            e.preventDefault ()

            const theNode = e.target
            const theParent = theNode.closest(".row.text-center")
            const file = theNode.files[0]
            const fileName = file.name
            const formData = new FormData ()

            formData.append ("imgName", fileName)
            formData.append ("introAddFile", file)
            
            $.ajax ({
                url: ROOT_ADMIN.concat("ajax.php"),
                type: "POST",
                contentType: false,
                processData: false,
                data: formData,
                success: data => {
                    theParent.insertAdjacentHTML ("beforeend", data)
                }
            })
        }
        /* about */
        function updateAboutImage (e) {
            try {
                e.preventDefault ()

                const theNode = e.target
                const theParent = theNode.closest(".col-lg-9")
                const theImg = theParent.querySelector("img");

                const file = e.target.files[0]
                if (!file) return
                const fileName = ".".concat(file.name.split(".").pop())
                const oldImgName = theImg.src.split("/").slice(-2).join("/")
                const formData = new FormData ()

                formData.append("aboutFile", file)
                formData.append("imgName", fileName)
                formData.append("oldImgName", oldImgName)

                if (fileName) {
                    const res = $.ajax({
                        url: ROOT_ADMIN.concat("ajax.php"),
                        type: "POST",
                        contentType: false, 
                        processData: false,
                        data: formData,
                        success: function (data) {
                            console.log(data)

                            if (theImg) {
                                theImg.src = ROOT+data
                            }
                        }
                    })
                }

                theNode.value = ""
            } catch (err) {
                console.log(err)
            }
        }
        /* offer */
        function addOfferContent (e) {
            e.preventDefault ()
            
            const theNode = e.target
            const theTopParent = document.getElementById("offer-parent")
            const theParent = theNode.closest(".modal.fade")
            const theAlert = theParent.querySelector("#alert")
       
            const theIcon = theParent.querySelector("[name='icon']")
            const theTitle = theParent.querySelector("[name='title']")
            const theContent = theParent.querySelector("[name='content']")
            
            const iconVal = theIcon.value.trim()
            const titleVal = theTitle.value.trim()
            const contentVal = theContent.value.trim()

            theAlert.innerHTML = ""

            if (iconVal === "" || titleVal === "" || contentVal === "") {
                theAlert.innerHTML = "<p class='alert alert-danger text-center'>Please fill out all fields</p>"
            } else {

                const formData = new FormData ()

                formData.append("offerIcon", iconVal)
                formData.append("offerTitle", titleVal)
                formData.append("offerContent", contentVal)

                $.ajax ({
                    url: ROOT_ADMIN.concat("ajax.php"),
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: data => {
                        theTopParent.insertAdjacentHTML ("beforeend", data)
                        $('#exampleModal').modal('hide')
                    }
                })               
            }   
        }
        function deleteOfferContent (e, offerDeleteId) {
            try {
                e.preventDefault ()
            
                const theNode = e.target
                const theParent = theNode.closest(".col-lg-4.mx-auto")
                const formData = new FormData ()

                formData.append("offerDeleteId", offerDeleteId)

                $.ajax ({
                    url: ROOT_ADMIN.concat("ajax.php"), 
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: formData, 
                    success: data => {
                        theParent.remove ()
                    }
                }) 
            } catch (err) {
                console.log(err)
            }    
        }
        /* filo */
        function updateFiloImage (e, filoUpdateId) {
            try {
                e.preventDefault ()

                const theNode = e.target
                const theParent = theNode.closest(".col-lg-4")
                const theImg = theParent.querySelector("img");

                const file = e.target.files[0]
                if (!file) return
                const fileName = file.name
                const oldImgName = theImg.src.split("/").slice(-2).join("/")
                const formData = new FormData ()

                formData.append("file", file)
                formData.append("filoUpdateId", filoUpdateId)
                formData.append("imgName", fileName)
                formData.append("oldImgName", oldImgName)

                if (fileName) {
                    const res = $.ajax({
                        url: ROOT_ADMIN.concat("ajax.php"),
                        type: "POST",
                        contentType: false, 
                        processData: false,
                        data: formData,
                        success: function (data) {
                            console.log(data)

                            if (theImg) {
                                theImg.src = ROOT+data
                            }
                        }
                    })
                }
            } catch (err) {
                console.log(err)
            }
        }
        function deleteFiloImage (e, filoDeleteId) {
            try {
                e.preventDefault ()
            
                const theNode = e.target
                const theParent = theNode.closest(".col-lg-4")
                const theImg = theParent.querySelector("img")
                const formData = new FormData ()

                formData.append("filoDeleteId", filoDeleteId)

                $.ajax ({
                    url: ROOT_ADMIN.concat("ajax.php"), 
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: formData, 
                    success: data => {
                        theParent.remove ()
                    }
                }) 
            } catch (err) {
                console.log(err)
            }    
        }
        function addFiloImage (e) {
            e.preventDefault ()

            const theNode = e.target
            const theParent = theNode.closest(".row.text-center")
            const file = theNode.files[0]
            const fileName = file.name
            const formData = new FormData ()

            formData.append ("imgName", fileName)
            formData.append ("filoAddFile", file)
            
            $.ajax ({
                url: ROOT_ADMIN.concat("ajax.php"),
                type: "POST",
                contentType: false,
                processData: false,
                data: formData,
                success: data => {
                    theParent.insertAdjacentHTML ("beforeend", data)
                }
            })
        }
        /* references */
        function updateReferencesImage (e, referencesUpdateId) {
            try {
                e.preventDefault ()

                const theNode = e.target
                const theParent = theNode.closest(".col-lg-4")
                const theImg = theParent.querySelector("img");

                const file = e.target.files[0]
                if (!file) return
                const fileName = ".".concat(file.name.split(".").pop())
                const oldImgName = theImg.src.split("/").slice(-2).join("/")
                const formData = new FormData ()

                formData.append("file", file)
                formData.append("referencesUpdateId", referencesUpdateId)
                formData.append("imgName", fileName)
                formData.append("oldImgName", oldImgName)

                if (fileName) {
                    const res = $.ajax({
                        url: ROOT_ADMIN.concat("ajax.php"),
                        type: "POST",
                        contentType: false, 
                        processData: false,
                        data: formData,
                        success: function (data) {
                            console.log(data)

                            if (theImg) {
                                theImg.src = ROOT+data
                            }
                        }
                    })
                }
            } catch (err) {
                console.log(err)
            }
        }
        function deleteReferencesImage (e, referencesDeleteId) {
            try {
                e.preventDefault ()
            
                const theNode = e.target
                const theParent = theNode.closest(".col-lg-4")
                const theImg = theParent.querySelector("img")
                const formData = new FormData ()

                formData.append("referencesDeleteId", referencesDeleteId)

                $.ajax ({
                    url: ROOT_ADMIN.concat("ajax.php"), 
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: formData, 
                    success: data => {
                        theParent.remove ()
                    }
                }) 
            } catch (err) {
                console.log(err)
            }    
        }
        function addReferencesImage (e) {
            e.preventDefault ()

            const theNode = e.target
            const theParent = theNode.closest(".row.text-center")
            const file = theNode.files[0]
            const fileName = ".".concat(file.name.split(".").pop())
            const formData = new FormData ()

            formData.append ("imgName", fileName)
            formData.append ("referencesAddFile", file)
            
            $.ajax ({
                url: ROOT_ADMIN.concat("ajax.php"),
                type: "POST",
                contentType: false,
                processData: false,
                data: formData,
                success: data => {
                    theParent.insertAdjacentHTML ("beforeend", data)
                    console.log(data)
                }
            })

            theNode.value = ''
        }
        /* testimonials */
        function updateTestimonialImg (e, testimonialImageUpdateId) {
            try {
                e.preventDefault ()

                const theNode = e.target
                const theParent = theNode.closest(".col-lg-4.mx-auto")
                const theImg = theParent.querySelector("img");

                const file = e.target.files[0]
                if (!file) return
                const fileName = ".".concat(file.name.split(".").pop())
                const oldImgName = theImg.src.split("/").slice(-2).join("/")
                const formData = new FormData ()

                formData.append("file", file)
                formData.append("testimonialImageUpdateId", testimonialImageUpdateId)
                formData.append("imgName", fileName)
                formData.append("oldImgName", oldImgName)

                if (fileName) {
                    const res = $.ajax({
                        url: ROOT_ADMIN.concat("ajax.php"),
                        type: "POST",
                        contentType: false, 
                        processData: false,
                        data: formData,
                        success: function (data) {
                            console.log(data)

                            if (theImg) {
                                theImg.src = ROOT+data
                            }
                        }
                    })
                }
            } catch (err) {
                console.log(err)
            }
        }
        function deleteTestimonialContent (e, testimonialDeleteId) {
            try {
                e.preventDefault ()
            
                const theNode = e.target
                const theParent = theNode.closest(".col-lg-4.mx-auto")
                const formData = new FormData ()

                formData.append("testimonialDeleteId", testimonialDeleteId)

                $.ajax ({
                    url: ROOT_ADMIN.concat("ajax.php"), 
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: formData, 
                    success: data => {
                        theParent.remove ()
                    }
                }) 
            } catch (err) {
                console.log(err)
            } 
        }
        function addTestimonial (e) {
            e.preventDefault ()
            
            const theNode = e.target
            const theTopParent = document.getElementById("yorum-parent")
            const theParent = theNode.closest(".modal.fade")
            const theAlert = theParent.querySelector("#alert")
       
            const file = theParent.querySelector("[name='dosya']").files[0]
            const theTitle = theParent.querySelector("[name='name']")
            const theContent = theParent.querySelector("[name='content']")
            
            const fileName = file?.name.split(".").pop()
            const titleVal = theTitle.value.trim()
            const contentVal = theContent.value.trim()

            theAlert.innerHTML = ""

            if (!fileName || titleVal === "" || contentVal === "") {
                theAlert.innerHTML = "<p class='alert alert-danger text-center'>Please fill out all fields</p>"
            } else {
                const formData = new FormData ()

                formData.append("testimonialsImg", fileName)
                formData.append("file", file)
                formData.append("name", titleVal)
                formData.append("content", contentVal)

                $.ajax ({
                    url: ROOT_ADMIN.concat("ajax.php"),
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: data => {
                        theTopParent.insertAdjacentHTML ("beforeend", data)
                        $('#exampleModal').modal('hide')
                    }
                })               
            }   
        }
    </script>
</body>

</html>
