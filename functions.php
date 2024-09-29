
<?php
/* connection */
try {            
    $pdo = new PDO ("mysql:host=localhost;dbname=primabusiness;charset=utf8", "root", "");
    $pdo->setAttribute(pdo::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
    echo "Function: ".$err->getMessage();
}

/* tables */
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
    public function icon () {
        return $this->data["icon"];
    }
    public function title () {
        return $this->data["baslik"];
    }
    public function desc () {
        return $this->data["icerik"];
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
    private $pdo;

    public function __construct($pdo) {
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
    public function getAllOffer () {
        try {
            $sql = "select * from hizmetlerimiz";
            $stmt = $this->pdo->prepare ($sql);
            $stmt->execute ();
            
            $results = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $results[] = new Offer ($this->pdo, $row);
            }

            return $results;
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
}



$set = new Settings ($pdo);