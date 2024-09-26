<?php
ob_start();
session_start();
date_default_timezone_set("Europe/Warsaw");

if (!isset ($_SESSION["userLoggedIn"]))  {
    header ("Loacation: administrator/login");
}


try {
    $pdo = new PDO ("mysql:host=localhost;dbname=primabusiness;charset=utf8;", "root", "");
    $pdo->setAttribute(pdo::ATTR_ERRMODE,pdo::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
    echo "Pdo: ".$err->getMessage();
}

class Constants {
    static $ROOT = "http://localhost/Prima-Business/";
    static $ROOT_URL = "http://localhost/Prima-Business/administrator/";
}

class Setting {
    private $pdo,$data;
    public function __construct ($pdo, $input) {
        $this->pdo = $pdo;
        
        if (is_array($input)) {
            $this->data = $input;
        }
    }
    /* getter */
    public function title () {
        return $this->data["title"];
    }
    public function tagline () {
        return $this->data["slogan"];
    }
    public function logo () {
        return $this->data["logoyazisi"];
    }
    //
    public function metaTitle () {
        return $this->data["metatitle"];
    }
    public function metaDesc () {
        return $this->data["metadesc"];
    }
    public function metaKey () {
        return $this->data["metakey"];
    }
    public function metaAut () {
        return $this->data["metaauthor"];
    }
    public function metaOwn () {
        return $this->data["metaovner"];
    }
    public function metaCoppy () {
        return $this->data["metacopy"];
    }
    //
    public function headingRef () {
        return $this->data["referans_baslik"];
    }
    public function headingPro () {
        return $this->data["filo_baslik"];
    }
    public function headingTes () {
        return $this->data["yorum_baslik"];
    }
    public function headingCon () {
        return $this->data["iletisim_baslik"];
    }
    //
    public function tel () {
        return $this->data["telefonno"];
    }
    public function mail () {
        return $this->data["mailadres"];
    }
    public function address () {
        return $this->data["adres"];
    }
    //
    public function twitter () {
        return $this->data["twit"];
    }
    public function facebook () {
        return $this->data["face"];
    }
    public function instagram () {
        return $this->data["insta"];
    }
}
class Intro {
    private $pdo, $data;
    public function __construct ($pdo, $input)  {
        $this->pdo = $pdo;
        if (is_array($input))
            $this->data = $input;
        else {
            try {
                $sql = "select * from intro where id=:id";
                $stmt = $this->pdo->prepare ($sql);
                $stmt->bindValue (":id", $input);
                $stmt->execute ();
                
                $this->data = $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (ErrorException $err) {
                echo "Intro: ".$err->getMessage();
            }
        }   
    }

    public function id () {
        return $this->data["id"];
    }
    public function img () {
        return $this->data["resimyol"];
    }
}
class About {
    private $pdo,$data;
    public function __construct($pdo, $input) {
        if (is_array($input)) {
            $this->data = $input;
        }
    }
    public function img () {
        return $this->data["resim"];
    }
    public function title () {
        return $this->data["baslik"];
    }
    public function desc () {
        return $this->data["icerik"];
    }
}
class Offer {
    private $pdo,$data;
    public function __construct($pdo, $input) {
        if (is_array($input)) {
            $this->data = $input;
        }
    }
    public function desc () {
        return $this->data["hizmetler_baslik"];
    }
    public function firstTitle () {
        return $this->data["baslik1"];
    }
    public function firstDesc () {
        return $this->data["icerik1"];
    }
    public function secondTitle () {
        return $this->data["baslik2"];
    }
    public function secondDesc () {
        return $this->data["icerik2"];
    }
    public function thirdTitle () {
        return $this->data["baslik3"];
    }
    public function thirdDesc () {
        return $this->data["icerik3"];
    }
    public function forthTitle () {
        return $this->data["baslik4"];
    }
    public function forthDesc () {
        return $this->data["icerik4"];
    }
}
class Referance {
    private $pdo, $data;
    public function __construct ($pdo, $input)  {
        if (is_array($input))
            $this->data = $input;
    }

    public function img () {
        return $this->data["resimyol"];
    }
}
class Products {
    private $pdo, $data;
    public function __construct ($pdo, $input)  {
        if (is_array($input))
            $this->data = $input;
    }

    public function img () {
        return $this->data["resimyol"];
    }
}
class Testimonial {
    private $pdo, $data;
    public function __construct ($pdo, $input)  {
        if (is_array($input))
            $this->data = $input;
    }

    public function comment () {
        return $this->data["icerik"];
    }
    public function name () {
        return $this->data["isim"];
    }
}
class Settings {
    private $pdo,$errorArray = [];
    public function __construct ($pdo) {
        $this->pdo = $pdo;
    }
    public function userLogin ($un, $pw) {
        try {
            $this->validateRequire (["username" => $un, "password" => $pw]);

            if (!empty ($this->errorArray)) {
                return false;
            }

            $pw = hash ("sha512", $pw);

            $sql = "select * from yonetim where kulad=:un and sifre=:pw";
            $stmt = $this->pdo->prepare ($sql);
            $stmt->bindValue (":un", $un);
            $stmt->bindValue (":pw", $pw);
            $stmt->execute ();
            
            if ($stmt->rowCount() == 1) {

                $sql = "update yonetim set aktif=1 where kulad=:un and sifre=:pw";
                $stmt = $this->pdo->prepare ($sql);
                $stmt->bindValue (":un", $un);
                $stmt->bindValue (":pw", $pw);
                $stmt->execute ();

                return true;
            }
        
            array_push($this->errorArray, "Username or password is incorrect");
            return false;
        } catch (ErrorException $err) {
            echo "UserLogin: ".$err->getMessage();
        }
    }
    public function userLogout ($un) {
        try {

            $sql = "update yonetim set aktif=0 where kulad=:un";
            $stmt = $this->pdo->prepare ($sql);
            $stmt->bindValue (":un", $un);
            $stmt->execute ();

            if ($stmt->rowCount() == 1) {
                session_start();
                session_destroy();
                header("Location: ./");
            }
        } catch (ErrorException $err) {
            echo "UserLogout: ".$err->getMessage();
        }
    }
    public function getSetting () {
        try {
            $sql = "select * from ayarlar";
            $stmt = $this->pdo->prepare ($sql);
            $stmt->execute ();
            $results = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!empty ($results)) {
                return new Setting ($this->pdo, $results);
            }
        } catch (PDOException $err) {
            echo "Settings: ".$err->getMessage();
        }
    }
    public function updateSetting (array $inputs) {
        try {
            $this->validateRequire ($inputs);

            if (empty ($this->errorArray)) {
                $sql = "update ayarlar set ";
                foreach ($inputs as $key => $val) {
                    if ($key == array_key_last($inputs))
                        $sql .= "$key=:$key ";
                    else 
                        $sql .= "$key=:$key, ";
                }
                $sql .= "where id=0";
                
                $stmt = $this->pdo->prepare ($sql);

                foreach ($inputs as $key => $val) {
                    $stmt->bindValue (":$key", $val);
                }

                return $stmt->execute ();
            }

            return false;
        } catch (ErrorException $err) {
            echo "UpdateSetting: ".$err->getMessage();
        }
    }
    public function getAllIntro () {
        try {
            $sql = "select * from intro";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute ();
            
            $results = [];
            while ($row = $stmt->fetch (PDO::FETCH_ASSOC)) {
                $results[] = new Intro ($this->pdo, $row);
            }

            return $results;
        } catch (PDOException $err) {
            echo "Intro: ".$err->getMessage();
        }
    }
    public function updateIntro ($img, $id) {
        try {
            $sql = "update intro set resimyol=:img where id=:id";  
            $stmt = $this->pdo->prepare ($sql);
            $stmt->bindValue (":img", $img);
            $stmt->bindValue (":id", $id);

            return $stmt->execute ();
        } catch (ErrorException $err) {
            echo "UpdateSetting: ".$err->getMessage();
        }
    }
    public function deleteIntro ($id) {
        try {
            $sql = "delete from intro where id=:id";  
            $stmt = $this->pdo->prepare ($sql);
            $stmt->bindValue (":id", $id);

            return $stmt->execute ();
        } catch (ErrorException $err) {
            echo "DeleteIntro: ".$err->getMessage();
        }
    }
    public function addIntro ($path) {
        try {
            $sql = "insert into intro (resimyol)value(:path)";  
            $stmt = $this->pdo->prepare ($sql);
            $stmt->bindValue (":path", $path);
            $stmt->execute ();

            return $this->pdo->lastInsertId();
        } catch (ErrorException $err) {
            echo "AddIntro : ".$err->getMessage();
        }
    }


    /* form validate */
    public function formSanitizer ($input) {
        $input = strip_tags($input);
        $input = htmlspecialchars($input);
        $input = trim($input);
        return $input;
    }
    public function validateRequire ($inputs) {
        foreach ($inputs as $key => $val) {

            if (empty ($val)) {
                array_push($this->errorArray, ucfirst($key)." is required!");
            }
        }
    }
    public function getError () {
        return $this->errorArray [0];
    }
}

$set = new Settings ($pdo);

