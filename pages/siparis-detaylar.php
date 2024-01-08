<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";

$Siparis = new Siparis();
$siparisGetir = $Siparis->siparisGetir();
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
    <?php include '../inc/_sidebar.php'; ?>
    
        <div class="content">
            <div class="container">
                <h1>Masa1 Sipariş Detayı</h1>
				<a class="btn btn-success btn-sm mb-2 mt-2" href="kategori-ekle.php"><i class="fa fa-plus"></i> Yeni Ekle</a>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ürün Adı: Ürün 1</h5>
                        <p class="card-text">Ürün Fiyatı: 10.99</p>
                        <p class="card-text">Miktar: 2</p>
                        <p class="card-text">Toplam Fiyat: 21.98</p>
                        <a class="btn btn-warning btn-sm" href="siparis-detay-duzenle.php"><i class="fa fa-pen"></i> Düzenle</a>
                        <a style="top:140px" class="btn btn-danger btn-sm" href="siparis-detay-duzenle.php"><i class="fa fa-trash"></i> İptal</a>
                    
                    </div>
                </div>
        
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ürün Adı: Ürün 2</h5>
                        <p class="card-text">Ürün Fiyatı: 15.49</p>
                        <p class="card-text">Miktar: 3</p>
                        <p class="card-text">Toplam Fiyat: 46.47</p>
                    </div>
                </div>
        
                <h3>Genel Toplam Fiyat: 68.45</h3> <!-- Bu kısmı PHP ile hesaplayabilirsiniz -->
            </div>
        </div>

    </div>
</body>
</html>
