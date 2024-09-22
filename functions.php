
<?php
/* connection */
try {            
    $pdo = new PDO ("mysql:host=localhost;dbname=primabusiness;charset=utf8", "root", "");
    $pdo->setAttribute(pdo::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
    echo "Function: ".$err->getMessage();
}

/* intro */
class Intro {
    private $pdo, $data;
    public function __construct ($pdo, $input)  {
        if (is_array($input))
            $this->data = $input;
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

/* settings */
class Settings {
    private $pdo,$settings;

    public function __construct($pdo) {
        $this->pdo = $pdo;

        try {
            $sql = "select * from ayarlar";
            $stmt = $pdo->prepare ($sql);
            $stmt->execute ();
            $results = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!empty ($results)) {
                $this->settings = $results;
            }
        } catch (PDOException $err) {
            echo "Settings: ".$err->getMessage();
        }
    }

    /* fetch */
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
    public function getAbout () {
        try {
            $sql = "select * from hakkimizda";
            $stmt = $this->pdo->prepare ($sql);
            $stmt->execute();
            $row = $stmt->fetch (PDO::FETCH_ASSOC);
            
            if ($row) {
                return new About ($this->pdo, $row);
            }
        } catch (PDOException $err) {
            echo "About: ".$err->getMessage();
        }
    }

    /* getter */
    public function title () {
        return $this->settings["title"];
    }
    public function tagline () {
        return $this->settings["slogan"];
    }
    public function logo () {
        return $this->settings["logoyazisi"];
    }
    //
    public function metaTitle () {
        return $this->settings["metatitle"];
    }
    public function metaDesc () {
        return $this->settings["metadesc"];
    }
    public function metaKey () {
        return $this->settings["metakey"];
    }
    public function metaAut () {
        return $this->settings["metaauthor"];
    }
    public function metaOwn () {
        return $this->settings["metaovner"];
    }
    public function metaCoppy () {
        return $this->settings["metacopy"];
    }
    //
    public function headingRef () {
        return $this->settings["referans_baslik"];
    }
    public function headingPro () {
        return $this->settings["filo_baslik"];
    }
    public function headingTes () {
        return $this->settings["yorum_baslik"];
    }
    public function headingCon () {
        return $this->settings["iletisim_baslik"];
    }
    //
    public function tel () {
        return $this->settings["telefonno"];
    }
    public function mail () {
        return $this->settings["mailadres"];
    }
    public function address () {
        return $this->settings["adres"];
    }
    //
    public function twitter () {
        return $this->settings["twit"];
    }
    public function facebook () {
        return $this->settings["face"];
    }
    public function instagram () {
        return $this->settings["insta"];
    }
}



$set = new Settings ($pdo);