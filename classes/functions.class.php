<?php

class Tablolar extends Db
{
    /*
        public function masaOlustur($masa_adi)
        {
            $query = "CREATE TABLE .$masa_adi (
                masa_sip_id INT PRIMARY KEY AUTO_INCREMENT,
                masa_id INT,
                siparis_id INT,
                urun_id INT,
                FOREIGN KEY (masa_id) REFERENCES masalar(masa_id),
                FOREIGN KEY (siparis_id) REFERENCES siparisler(siparis_id),
                FOREIGN KEY (urun_id) REFERENCES urunler(urun_id)
            )";
            $stmt = $this->connect()->prepare($query);
            return $stmt->execute();
        }
    */


    public function siparisTablo()
    {
        $query = "CREATE TABLE siparisler(
            siparis_id INT PRIMARY KEY AUTO_INCREMENT,
            masa_id INT,
            siparis_tarihi DATETIME,
            siparis_durum VARCHAR(50),
            
            FOREIGN KEY (masa_id) REFERENCES masalar(masa_id)
        )";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute();
    }

    public function masaTablo()
    {
        $query = "CREATE TABLE masalar(
            masa_id INT PRIMARY KEY AUTO_INCREMENT,
            masa_adi VARCHAR(50)
        )";
        $stmt =$this->connect()->prepare($query);
        return $stmt->execute();
    }

    public function urunlerTablo()
    {
        $query = "CREATE TABLE urunler(
            urun_id INT PRIMARY KEY AUTO_INCREMENT,
            urun_adi VARCHAR(150),
            urun_fiyat INT,
            kategori_id INT,

            FOREIGN KEY (kategori_id) REFERENCES kategoriler(kategori_id)
        )";
        $stmt =$this->connect()->prepare($query);
        return $stmt->execute();
    }

    public function kategoriTablo()
    {
        $query = "CREATE TABLE kategoriler(
            kategori_id INT PRIMARY KEY AUTO_INCREMENT,
            kategori_adi VARCHAR(100)
        )";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute();
    }

    public function siparisDetayTablo()
    {
        $query = "CREATE TABLE siparisdetay(
            siparis_detay_id INT PRIMARY KEY AUTO_INCREMENT,
            siparis_id INT,
            urun_id INT,
            miktar INT,

            FOREIGN KEY (siparis_id) REFERENCES siparisler(siparis_id),
            FOREIGN KEY (urun_id) REFERENCES urunler(urun_id)
        )";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute();
    }

}

class Kategori extends Db
{
    public function kategoriGetir()
    {
        $query = "SELECT * FROM kategoriler";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }  

    public function kategoriIDGetir()
    {
        $kategori_id = $_GET["kategori_id"];

        $query = "SELECT * FROM kategoriler WHERE kategori_id=:kategori_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(['kategori_id' => $kategori_id]);
        return $stmt->fetch();
    }

    public function kategoriEkle()
    {
        $kategori_adi = $_POST["kategori_adi"];

        $query = "INSERT INTO kategoriler(kategori_adi) VALUES (:kategori_adi)";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute(['kategori_adi' => $kategori_adi]);
    }

    public function kategoriGuncelle()
    {
        $kategori_id     = $_GET["kategori_id"];
        $kategori_adi    = $_POST["kategori_adi"];

        $query = "UPDATE kategoriler SET kategori_adi=:kategori_adi WHERE kategori_id=:kategori_id";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'kategori_id'     => $kategori_id,
            'kategori_adi'    => $kategori_adi
        ]);
    }

    public function kategoriSil()
    {
        $kategori_id = $_GET["kategori_id"]; 

        $query = "DELETE FROM kategoriler WHERE kategori_id=:kategori_id";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute(['kategori_id' => $kategori_id]);
    }

}

class Urun extends Db
{
    public function urunGetir()
    {
        $query = "SELECT * FROM urunler 
        INNER JOIN kategoriler ON
        urunler.kategori_id = kategoriler.kategori_id
        ";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function urunIDGetir()
    {
        $urun_id = $_GET["urun_id"];

        $query = "SELECT * FROM urunler WHERE urun_id=:urun_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(['urun_id' => $urun_id]);
        return $stmt->fetch();
    }

    public function urunEkle()
    {
        $urun_adi    = $_POST["urun_adi"];
        $urun_fiyat  = $_POST["urun_fiyat"];
        $kategori_id = $_POST["kategori_id"];

        $query = "INSERT INTO urunler(urun_adi, urun_fiyat, kategori_id) VALUES (:urun_adi, :urun_fiyat, :kategori_id)";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'urun_adi' => $urun_adi, 
            'urun_fiyat' => $urun_fiyat, 
            'kategori_id' => $kategori_id
        ]);
    }

    public function urunGuncelle()
    {
        $urun_id     = $_GET["urun_id"];
        $urun_adi    = $_POST["urun_adi"];
        $urun_fiyat  = $_POST["urun_fiyat"];
        $kategori_id = $_POST["kategori_id"];

        $query = "UPDATE urunler SET urun_adi=:urun_adi, urun_fiyat=:urun_fiyat, kategori_id=:kategori_id WHERE urun_id=:urun_id";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'urun_id'     => $urun_id,
            'urun_adi'    => $urun_adi,
            'urun_fiyat'  => $urun_fiyat,
            'kategori_id' => $kategori_id
        ]);
    }

    public function urunSil()
    {
        $urun_id = $_GET["urun_id"]; 

        $query = "DELETE FROM urunler WHERE urun_id=:urun_id";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute(['urun_id' => $urun_id]);
    }
}

class Masa extends Db
{
    public function masaGetir()
    {
        $query = "SELECT * FROM masalar";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function masaIdGetir()
    {
        $masa_id = $_GET["masa_id"]; 
        $query = "SELECT * FROM masalar WHERE masa_id=:masa_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(['masa_id' => $masa_id]);
        return $stmt->fetch();
    }
    public function masaEkle()
    {
        $masa_adi = $_POST["masa_adi"];

        $query = "INSERT INTO masalar(masa_adi) VALUES (:masa_adi)";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute(['masa_adi' => $masa_adi]);
    }
    public function masaGuncelle()
    {
        $masa_id = $_GET["masa_id"];
        $masa_adi = $_POST["masa_adi"];

        $query = "UPDATE masalar SET masa_adi=:masa_adi WHERE masa_id=:masa_id";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'masa_id' => $masa_id,
            'masa_adi' => $masa_adi
        ]);
    }
    public function masaSil()
    {
        $masa_id = $_GET["masa_id"];

        $query = "DELETE FROM masalar WHERE masa_id=:masa_id";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute(['masa_id' => $masa_id]);
    }
}

class Siparis extends Db
{
    public function siparisGetir()
    {
        $query = "SELECT * FROM siparisler
        INNER JOIN masalar on
        siparisler.masa_id = masalar.masa_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function siparisIdGetir()
    {
       $siparis_id = $_GET['siparis_id'];

       $query = "SELECT * FROM siparisler
       INNER JOIN masalar on
       siparisler.masa_id = masalar.masa_id WHERE siparis_id =:siparis_id"; 
       $stmt = $this->connect()->prepare($query);
       $stmt->execute(['siparis_id' => $siparis_id]);
       return  $stmt->fetch();
    }
    
    public function siparisEkle()
    {
        $masa_id = $_POST['masa_id'];
        $siparis_tarihi = $_POST['siparis_tarihi'];
        $siparis_durum = $_POST['siparis_durum'];

        $query = "INSERT INTO siparisler (masa_id, siparis_tarihi, siparis_durum) VALUES (:masa_id, :siparis_tarihi, :siparis_durum)";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'masa_id' => $masa_id,
            'siparis_tarihi' => $siparis_tarihi,
            'siparis_durum' => $siparis_durum
        ]);
    }

    public function siparisGuncelle()
    {
        $siparis_id = $_GET['siparis_id'];
        $masa_id = $_POST['masa_id'];
        $siparis_tarihi = $_POST['siparis_tarihi'];
        $siparis_durum = $_POST['siparis_durum'];

        $query = "UPDATE siparisler SET masa_id=:masa_id, siparis_tarihi=:siparis_tarihi, siparis_durum=:siparis_durum WHERE siparis_id=:siparis_id";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'siparis_id' => $siparis_id,
            'masa_id' => $masa_id,
            'siparis_tarihi' => $siparis_tarihi,
            'siparis_durum' => $siparis_durum
        ]);
    }

    public function siparisIptal()
    {
        $siparis_id = $_GET['siparis_id'];
        
        $query = "DELETE FROM siparisler WHERE siparis_id=:siparis_id";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute(['siparis_id' => $siparis_id]);
    }
    
}

class SiparisDetay extends Db
{
    public function SiparisdetayGetir($siparis_id)
    {
        
            $query = "SELECT * FROM siparisdetay
            INNER JOIN siparisler ON siparisdetay.siparis_id = siparisler.siparis_id
            INNER JOIN urunler ON siparisdetay.urun_id = urunler.urun_id
            WHERE siparisler.siparis_id=:siparis_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(['siparis_id' => $siparis_id]);
        return $stmt->fetchAll();

        


    }
}


?>