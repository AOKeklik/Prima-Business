<?php
    require_once ("functions.php");

    header("Cache-Control: no-cache, must-revalidate");

    try {
        /* intro */
        if (isset ($_POST["introUpdateId"])) {
            $introUpdateId = $set->formSanitizer($_POST["introUpdateId"]);
            $imgName = $set->formSanitizer($_POST["imgName"]);
            $oldImgName = $set->formSanitizer($_POST["oldImgName"]);

            $newFileName = "img/carousel/intro_".time()."_".basename($imgName);

            if (!$set->updateIntro ($newFileName, $introUpdateId)) {
                echo "update faild!";
                return;
            };


            if (0 < $_FILES["file"]["error"]) {
                echo "Error: ".$_FILES["file"]["error"]."<br>";
            } else {
                $rootDirectory = $_SERVER["DOCUMENT_ROOT"]."/Prima-Business/";
                $pathDirectory = $rootDirectory."img/carousel/";
                if (!file_exists($pathDirectory) && !is_dir($pathDirectory)) {
                    mkdir($pathDirectory, 0777, true);
                }

                $imagePath = $pathDirectory.basename($oldImgName);

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }

                move_uploaded_file($_FILES["file"]["tmp_name"], $rootDirectory.$newFileName);
                

                echo $newFileName;
            }
        }
        if (isset ($_POST["introDeleteId"])) {
            $pathDirectory = $_SERVER["DOCUMENT_ROOT"]."/Prima-Business/img/carousel/";

            $intro = new Intro ($pdo, $_POST["introDeleteId"]);
            $imagePath = $_SERVER["DOCUMENT_ROOT"]."/Prima-Business/".$intro->img();

            if (file_exists($imagePath)) {
                unlink($imagePath);

                if ($set->deleteIntro ($_POST["introDeleteId"])) {
                    return "secess";
                }
            }
        }
        if (isset ($_FILES["introAddFile"])) {

            $fileName = "img/carousel/intro_".time()."_".basename($_POST["imgName"]);

            $introId = $set->addIntro ($fileName);
            $path = Constants::$ROOT.$fileName;

            $rootDirectory = $_SERVER["DOCUMENT_ROOT"]."/Prima-Business/";
            $pathDirectory = $rootDirectory."img/carousel/";

            if (!file_exists($pathDirectory) && !is_dir($pathDirectory)) {
                mkdir($pathDirectory, 0777, true);
            }

            move_uploaded_file($_FILES["introAddFile"]["tmp_name"], $rootDirectory.$fileName);


            $html = <<<HTML
                <div class="col-lg-4">
                    <div class="row border border-light p-1 m-1">
                        <div class="col-lg-12">
                            <img src="{$path}">
                        </div>

                        <div class="col-6 text-right">
                            <label for="intro-update-img-{$introId}">
                                <span href="#" class="fa fa-edit m-2 text-success" style="font-size:25px;cursor: pointer;"></span>
                                <input onchange="updateIntroImage(event, {$introId})" type="file" name="intro-update-img" id="intro-update-img-{$introId}" style="display: none">
                            </label>
                        </div>

                        <div class="col-6 text-left">
                            <span onclick="deleteIntroImage(event, {$introId})" class="fa fa-close m-2 text-danger" style="font-size:25px;cursor: pointer;"></span>
                        </div>
                    </div>
                </div>
            HTML;

            echo $html;
        }
        /* about */
        if (isset ($_FILES["aboutFile"])) {
            $imgName = $set->formSanitizer($_POST["imgName"]);
            $oldImgName = $set->formSanitizer($_POST["oldImgName"]);

            $newFileName = "img/about_".time().basename($imgName);

            if (!$set->updateAboutImg ($newFileName)) {
                echo "update faild!";
                return;
            };


            if (0 < $_FILES["aboutFile"]["error"]) {
                echo "Error: ".$_FILES["aboutFile"]["error"]."<br>";
            } else {
                $rootDirectory = $_SERVER["DOCUMENT_ROOT"]."/Prima-Business/";
                $pathDirectory = $rootDirectory."img/";
                if (!file_exists($pathDirectory) && !is_dir($pathDirectory)) {
                    mkdir($pathDirectory, 0777, true);
                }

                $imagePath = $pathDirectory.basename($oldImgName);

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }

                move_uploaded_file($_FILES["aboutFile"]["tmp_name"], $rootDirectory.$newFileName);
                

                echo $newFileName;
            }
        }
        /* offer */
        if (isset ($_POST["offerIcon"])) {
            $data = [
                "icon" => $set->formSanitizer($_POST["offerIcon"]),
                "baslik" => $set->formSanitizer($_POST["offerTitle"]),
                "icerik" => $set->formSanitizer($_POST["offerContent"])
            ];

            $newOffer = $set->addOffer ($data);

            if (!$newOffer) {
                echo $set->getError();
                return;
            }

            $findOffer = new Offer ($pdo, $newOffer);


            $html = <<<HTML
                <div class="col-lg-4 mx-auto">
                    <form action="" method="post" class="row card-bordered p-1 m-1 bg-light">
                        <div class="col-lg-2 pt-3">Icon</div>
                        <div class="col-lg-12 p-2">
                            <input type="text" name="icon_{$findOffer->id()}" class="form-control" value="{$findOffer->icon()}" />                                    
                        </div>

                        <div class="col-lg-2 pt-3">Başlık</div>
                        <div class="col-lg-12 p-2">
                            <input type="text" name="baslik_{$findOffer->id()}" class="form-control" value="{$findOffer->title()}" />                                    
                        </div>

                        <div class="col-lg-12 p-2 ">İçerik</div>
                        <div class="col-lg-12 p-2">
                            <textarea name="icerik_{$findOffer->id()}" rows="5" class="form-control">{$findOffer->desc()}</textarea>
                        </div>
                        <div class="col-lg-12 p-2">
                            <div class="row">
                                <div class="col-6">
                                    <input type="submit" name="buton_{$findOffer->id()}" value="Guncelle" class="btn btn-primary"/>
                                </div>
                                <div class="col-6">  
                                    <span onclick="deleteOfferContent(event, {$findOffer->id()})" class="fa fa-close m-2 text-danger" style="font-size:25px;cursor: pointer;"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            HTML;

            echo $html;
        }
        if (isset ($_POST["offerDeleteId"])) {
            $offerDeleteId = $set->formSanitizer($_POST["offerDeleteId"]);

            if ($set->deleteOffer ($offerDeleteId)) {
                return "secess";
            }
        }
        /* filo */
        if (isset ($_POST["filoUpdateId"])) {
            $filoUpdateId = $set->formSanitizer($_POST["filoUpdateId"]);
            $imgName = $set->formSanitizer($_POST["imgName"]);
            $oldImgName = $set->formSanitizer($_POST["oldImgName"]);

            $newFileName = "img/filo/filo_".time()."_".basename($imgName);

            if (!$set->updateFilo ($newFileName, $filoUpdateId)) {
                echo "update faild!";
                return;
            };


            if (0 < $_FILES["file"]["error"]) {
                echo "Error: ".$_FILES["file"]["error"]."<br>";
            } else {
                $rootDirectory = $_SERVER["DOCUMENT_ROOT"]."/Prima-Business/";
                $pathDirectory = $rootDirectory."img/filo/";
                if (!file_exists($pathDirectory) && !is_dir($pathDirectory)) {
                    mkdir($pathDirectory, 0777, true);
                }

                $imagePath = $pathDirectory.basename($oldImgName);

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }

                move_uploaded_file($_FILES["file"]["tmp_name"], $rootDirectory.$newFileName);
                

                echo $newFileName;
            }
        }
        if (isset ($_FILES["filoAddFile"])) {

            $fileName = "img/filo/filo_".time()."_".basename($_POST["imgName"]);

            $filoId = $set->addFilo ($fileName);
            $path = Constants::$ROOT.$fileName;

            $rootDirectory = $_SERVER["DOCUMENT_ROOT"]."/Prima-Business/";
            $pathDirectory = $rootDirectory."img/filo/";

            if (!file_exists($pathDirectory) && !is_dir($pathDirectory)) {
                mkdir($pathDirectory, 0777, true);
            }

            move_uploaded_file($_FILES["filoAddFile"]["tmp_name"], $rootDirectory.$fileName);


            $html = <<<HTML
                <div class="col-lg-4">
                    <div class="row border border-light p-1 m-1">
                        <div class="col-lg-12">
                            <img src="{$path}">
                        </div>

                        <div class="col-6 text-right">
                            <label for="filo-update-img-{$filoId}">
                                <span href="#" class="fa fa-edit m-2 text-success" style="font-size:25px;cursor: pointer;"></span>
                                <input onchange="updateFiloImage(event, {$filoId})" type="file" name="filo-update-img" id="filo-update-img-{$filoId}" style="display: none">
                            </label>
                        </div>

                        <div class="col-6 text-left">
                            <span onclick="deleteFiloImage(event, {$filoId})" class="fa fa-close m-2 text-danger" style="font-size:25px;cursor: pointer;"></span>
                        </div>
                    </div>
                </div>
            HTML;

            echo $html;
        }
        if (isset ($_POST["filoDeleteId"])) {
            $pathDirectory = $_SERVER["DOCUMENT_ROOT"]."/Prima-Business/img/filo/";

            $filo = new Filo ($pdo, $_POST["filoDeleteId"]);
            $imagePath = $_SERVER["DOCUMENT_ROOT"]."/Prima-Business/".$filo->img();

            if (file_exists($imagePath)) {
                unlink($imagePath);

                if ($set->deleteFilo ($_POST["filoDeleteId"])) {
                    return "secess";
                }
            }
        }
        /* references */
        if (isset ($_POST["referencesUpdateId"])) {
            $referencesUpdateId = $set->formSanitizer($_POST["referencesUpdateId"]);
            $imgName = $set->formSanitizer($_POST["imgName"]);
            $oldImgName = $set->formSanitizer($_POST["oldImgName"]);

            $newFileName = "img/referans/references_".time().basename($imgName);

            if (!$set->updateReferences ($newFileName, $referencesUpdateId)) {
                echo "update faild!";
                return;
            };


            if (0 < $_FILES["file"]["error"]) {
                echo "Error: ".$_FILES["file"]["error"]."<br>";
            } else {
                $rootDirectory = $_SERVER["DOCUMENT_ROOT"]."/Prima-Business/";
                $pathDirectory = $rootDirectory."img/referans/";
                if (!file_exists($pathDirectory) && !is_dir($pathDirectory)) {
                    mkdir($pathDirectory, 0777, true);
                }

                $imagePath = $pathDirectory.basename($oldImgName);

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }

                move_uploaded_file($_FILES["file"]["tmp_name"], $rootDirectory.$newFileName);
                

                echo $newFileName;
            }
        }
        if (isset ($_FILES["referencesAddFile"])) {

            $fileName = "img/referans/references_".time().basename($_POST["imgName"]);

            $referencesId = $set->addReferences ($fileName);
            $path = Constants::$ROOT.$fileName;

            $rootDirectory = $_SERVER["DOCUMENT_ROOT"]."/Prima-Business/";
            $pathDirectory = $rootDirectory."img/referans/";

            if (!file_exists($pathDirectory) && !is_dir($pathDirectory)) {
                mkdir($pathDirectory, 0777, true);
            }

            move_uploaded_file($_FILES["referencesAddFile"]["tmp_name"], $rootDirectory.$fileName);


            $html = <<<HTML
                <div class="col-lg-4">
                    <div class="row border border-light p-1 m-1">
                        <div class="col-lg-12">
                            <img src="{$path}">
                        </div>

                        <div class="col-6 text-right">
                            <label for="references-update-img-{$referencesId}">
                                <span href="#" class="fa fa-edit m-2 text-success" style="font-size:25px;cursor: pointer;"></span>
                                <input onchange="updateReferencesImage(event, {$referencesId})" type="file" name="references-update-img" id="references-update-img-{$referencesId}" style="display: none">
                            </label>
                        </div>

                        <div class="col-6 text-left">
                            <span onclick="deleteReferencesImage(event, {$referencesId})" class="fa fa-close m-2 text-danger" style="font-size:25px;cursor: pointer;"></span>
                        </div>
                    </div>
                </div>
            HTML;

            echo $html;
        }
        if (isset ($_POST["referencesDeleteId"])) {
            $pathDirectory = $_SERVER["DOCUMENT_ROOT"]."/Prima-Business/img/referans/";

            $references = new Reference ($pdo, $_POST["referencesDeleteId"]);
            $imagePath = $_SERVER["DOCUMENT_ROOT"]."/Prima-Business/".$references->img();

            if (file_exists($imagePath)) {
                unlink($imagePath);

                if ($set->deleteReferences ($_POST["referencesDeleteId"])) {
                    return "secess";
                }
            }
        }
        /* testimonials */
        if (isset ($_POST["testimonialImageUpdateId"])) {
            $testimonialImageUpdateId = $set->formSanitizer($_POST["testimonialImageUpdateId"]);
            $imgName = $set->formSanitizer($_POST["imgName"]);
            $oldImgName = $set->formSanitizer($_POST["oldImgName"]);

            $newFileName = "img/yorum/testimonial_".time().basename($imgName);

            if (!$set->updateTestimonialsImg ($newFileName, $testimonialImageUpdateId)) {
                echo "update faild!";
                return;
            };


            if (0 < $_FILES["file"]["error"]) {
                echo "Error: ".$_FILES["file"]["error"]."<br>";
            } else {
                $rootDirectory = $_SERVER["DOCUMENT_ROOT"]."/Prima-Business/";
                $pathDirectory = $rootDirectory."img/yorum/";
                if (!file_exists($pathDirectory) && !is_dir($pathDirectory)) {
                    mkdir($pathDirectory, 0777, true);
                }

                $imagePath = $pathDirectory.basename($oldImgName);

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }

                move_uploaded_file($_FILES["file"]["tmp_name"], $rootDirectory.$newFileName);
                

                echo $newFileName;
            }
        }
        if (isset ($_POST["testimonialDeleteId"])) {
            $testimonialDeleteId = $set->formSanitizer($_POST["testimonialDeleteId"]);

            $oldImgName = new Testimonial($pdo, $testimonialDeleteId);
            $pathDirectory = $_SERVER["DOCUMENT_ROOT"]."/Prima-Business/img/yorum/";
            $imagePath = $pathDirectory.basename($oldImgName->img());

            echo $imagePath;

            if (file_exists($imagePath)) {
                unlink($imagePath);
            } else {
                echo "img couldent delte!";
                return;
            }

            if ($set->deleteTestimonial ($testimonialDeleteId)) {
                return "secess";
            }
        }
        if (isset ($_POST["testimonialsImg"])) {

            $fileName = "img/yorum/testimonial_".time().".".basename($_POST["testimonialsImg"]);
            $name = $set->formSanitizer($_POST["name"]);
            $content = $set->formSanitizer($_POST["content"]);

            $testimonialId = $set->addTestimonial (["isim"=>$name,"icerik"=>$content,"resim"=>$fileName]);

            if (!$testimonialId ) {
                echo "add faild!";
                return;
            }

            $path = Constants::$ROOT.$fileName;

            $rootDirectory = $_SERVER["DOCUMENT_ROOT"]."/Prima-Business/";
            $pathDirectory = $rootDirectory."img/yorum/";

            if (!file_exists($pathDirectory) && !is_dir($pathDirectory)) {
                mkdir($pathDirectory, 0777, true);
            }

            move_uploaded_file($_FILES["file"]["tmp_name"], $rootDirectory.$fileName);




            $html = <<<HTML
                <div class="col-lg-4 mx-auto">
                    <form action="" method="post" class="row card-bordered p-1 m-1 bg-light">
                        <div class="col-lg-2 pt-3">Img</div>
                        <div class="col-lg-12 p-2">
                            <label for="dosya_{$testimonialId}" style="height: 200px;cursor:pointer;">
                                <img style="width:100%;height:100%" id="img_{$testimonialId}?>" src="../{$fileName}" alt="" />
                                <input onchange="updateTestimonialImg(event, {$testimonialId})" type="file" id="dosya_{$testimonialId}" name="dosya" class="d-none">  
                            </label>                                  
                        </div>

                        <div class="col-lg-2 pt-3">Isim</div>
                        <div class="col-lg-12 p-2">
                            <input type="text" name="isim_{$testimonialId}" class="form-control" value="{$name}" />                                    
                        </div>

                        <div class="col-lg-12 p-2">İçerik</div>
                        <div class="col-lg-12 p-2">
                            <textarea name="icerik_{$testimonialId}" rows="5" class="form-control">{$content}</textarea>
                        </div>
                        <div class="col-lg-12 p-2">
                            <div class="row">
                                <div class="col-6">
                                    <input type="submit" name="buton_{$testimonialId}" value="Guncelle" class="btn btn-primary"/>
                                </div>
                                <div class="col-6">  
                                    <span onclick="deleteTestimonialContent(event, {$testimonialId})" class="fa fa-close m-2 text-danger" style="font-size:25px;cursor: pointer;"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            HTML;

            echo $html;
        }

    } catch (ErrorException $err) {
        echo "Ajax: ".$err->getMessage();
    }

?>