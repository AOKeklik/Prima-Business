<?php
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
    private $pdo;
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
}

$set = new Settings ($pdo);

