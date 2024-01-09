<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";

$kontrol = false;
$deleted = false;

// Sipariş ve Sipariş Detayı nesnelerini oluştur
$Siparis = new Siparis();
$SiparisDetay = new SiparisDetay();

// Sipariş ID'sini almak için fonksiyon çağrısı
$siparisIdGetir = $Siparis->siparisIdGetir();
$genel_toplam = 0;
// Eğer sipariş detay ID'si varsa, o detayları getir
if(isset($_GET['siparis_detay_id'])) {
    $siparis_detay_id = $_GET['siparis_detay_id'];
    $siparisDetayGetir = $SiparisDetay->SiparisdetayGetir($siparis_detay_id);
    $sipardetayIDGETIR = $SiparisDetay->siparisDetayIdGetir($siparis_detay_id);

}

    // Veritabanından geçerli bir sonuç döndüğünde buraya girilecek
 
    

    // Genel toplam fiyatın hesaplanması
    


// Eğer sipariş ID'si varsa, ilgili siparişi getir ve kontrolü true yap
if(isset($_GET['siparis_id'])) {
    $getIdsiparis = $Siparis->getIdsiparis();
    $kontrol = true;
}

// Eğer sipariş detayı ID'si ve silme işlemi varsa, ilgili sipariş detayını sil
if(isset($_GET['siparis_detay_id']) && isset($_GET['islem']) && $_GET['islem'] == 'Sil') {
    $siparisDetaySil = $SiparisDetay->siparisDetaySil();
    if($siparisDetaySil) {
        $deleted = true;
        // Silme işlemi gerçekleştikten sonra sayfa yönlendirme işlemi yapılabilir
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Sipariş Detayları</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link href="../style/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <?php include '../inc/_sidebar.php'; 
        

        
        ?>
        
        <div class="content">
            <div class="container">
                <h1>Masa1 Sipariş Detayı</h1>
                <?php if($deleted == true): ?>
                    <div class="alert alert-success text-center" role="alert" id="alertBox">
                        <h6 style="color: black;">Kayıt Başarıyla Silindi.</h6>
                    </div>
                <?php endif; ?>

                <a class="btn btn-success btn-sm mb-2 mt-2" href="siparis-detay-ekle.php<?php
                    // Yeni Ekle butonu linki oluşturma
                    echo ($kontrol == true)
                        ? '?siparis_id=' . $getIdsiparis->siparis_id
                        : '?siparis_detay_id=' . $siparis_detay_id;
                ?>">
                    <i class="fa fa-plus"></i> Yeni Ekle
                </a>

                <?php foreach($siparisDetayGetir as $siparis): ?>
                    <?php
                        $fiyat = ($siparis->urun_fiyat * $siparis->miktar);
                        $genel_toplam += $fiyat;
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <!-- Sipariş detaylarını ekrana yazdırma -->
                            <h5 class="card-title"><?php echo $siparis->urun_adi ?></h5>
                            <p class="card-text">Birim fiyatı: <?php echo $siparis->urun_fiyat ?> ₺</p>
                            <p class="card-text">Adet: <?php echo $siparis->miktar ?></p>
                            <p class="card-text">Fiyat: <?php echo $fiyat?></p>
                            <a style="top:140px" class="btn btn-danger btn-sm" href="siparis-detaylar.php?siparis_detay_id=<?php echo $siparis->siparis_detay_id ?>&islem=Sil">
                                <i class="fa fa-trash"></i> İptal
                            </a>          
                        </div>
                    </div>
                <?php endforeach; ?>

                <h3>Genel Toplam Fiyat: <?php echo  $genel_toplam?></h3> 
