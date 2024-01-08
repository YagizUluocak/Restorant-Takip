
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



?>