
<?php
/* connection */
try {            
    $pdo = new PDO ("mysql:host=localhost;dbname=primabusiness;charset=utf8", "root", "");
    $pdo->setAttribute(pdo::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
    echo "Function: ".$err->getMessage();
}

/* tables */
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
    public function getOffer () {
        try {
            $sql = "select * from hizmetlerimiz";
            $stmt = $this->pdo->prepare ($sql);
            $stmt->execute ();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new Offer ($this->pdo, $row);
            }
        } catch (PDOException $err) {
            echo "Offer: ".$err->getMessage();
        }
    }
    public function getAllReferences () {
        try {
            $sql = "select * from referanslar";
            $stmt = $this->pdo->prepare ($sql);
            $stmt->execute ();
            
            $results = [];
            while ($row =  $stmt->fetch(PDO::FETCH_ASSOC)) {
                $results[] = new Referance ($this->pdo, $row);
            }

            return $results;
        } catch (PDOException $err) {
            echo "Offer: ".$err->getMessage();
        }
    }
    public function getAllProducts () {
        try {
            $sql = "select * from filo";
            $stmt = $this->pdo->prepare ($sql);
            $stmt->execute ();
            
            $results = [];
            while ($row =  $stmt->fetch(PDO::FETCH_ASSOC)) {
                $results[] = new Products ($this->pdo, $row);
            }

            return $results;
        } catch (PDOException $err) {
            echo "Offer: ".$err->getMessage();
        }
    }
    public function getAllTestimonials () {
        try {
            $sql = "select * from yorum";
            $stmt = $this->pdo->prepare ($sql);
            $stmt->execute ();
            
            $results = [];
            while ($row =  $stmt->fetch(PDO::FETCH_ASSOC)) {
                $results[] = new Testimonial ($this->pdo, $row);
            }

            return $results;
        } catch (PDOException $err) {
            echo "Offer: ".$err->getMessage();
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