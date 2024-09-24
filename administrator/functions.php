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
class Settings {
    private $pdo,$errorArray = [];
    public function __construct ($pdo) {
        $this->pdo = $pdo;
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

