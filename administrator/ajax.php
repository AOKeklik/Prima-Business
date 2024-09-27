<?php
    require_once ("functions.php");

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
    } catch (ErrorException $err) {
        echo "Ajax: ".$err->getMessage();
    }

?>