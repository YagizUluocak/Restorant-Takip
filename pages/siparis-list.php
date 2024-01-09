<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";

$deleted = false;
$kontrol = false;
$Siparis = new Siparis();
$siparisGetir = $Siparis->siparisGetir();




// $_Get ile siparis_id, 'islem' geliyor mu? VE $_Get'den gelen 'islem' 'Sil'e eşit mi?
if(isset($_GET['siparis_id']) && isset($_GET['islem']) && $_GET['islem'] == 'Sil' )
{
    $siparisSil = $Siparis->siparisIptal();

    if($siparisSil)
    {
        $deleted = true;
        ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var alertBox = document.getElementById('alertBox');
                alertBox.style.display = 'block';
            
                setTimeout(function() {
                    window.location.href = 'siparis-list.php';
                }, 1300); // 1.3 saniye
            });
        </script>
        <?php

    }
}

if(isset($_GET['islem']) && $_GET['islem'] == 'detay' )
{


$kontrol = true;
$siparis_detay_id = $_GET['siparis_detay_id'];
$SiparisDetay = new SiparisDetay();
$siparisDetayGetir = $SiparisDetay->SiparisdetayGetir($siparis_detay_id);

}

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Siparişler</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link href="../style/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <?php include '../inc/_sidebar.php'; ?>

        <div class="content">
            <div class="container">
                <h1>Siparişler</h1>
                <?php
                if($deleted == true)
                {
                    ?>
                        <div class="alert alert-success text-center" role="alert" id="alertBox">
                            <h6 style="color: black;">Kayıt Başarıyla Silindi.</h6>
                        </div>
                    <?php
                }
                ?>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Masa Adı</th>
                            <th>Sipariş Tarihi</th>
                            <th>Sipariş Durumu</th>
                            <th>Sipariş Detay</th>
                            <th>Düzenle</th>
                            <th>İptal</th>
                        </tr>
                    </thead>
                    <?php
                    if($siparisGetir)
                    {
                        ?>
                        <tbody>
                            <?php
                            foreach($siparisGetir as $siparis)
                            {
                                ?>
                                    <tr>
                                        <td><?php echo $siparis->siparis_id?></td>
                                        <td><?php echo $siparis->masa_adi?></td>
                                        <td><?php echo $siparis->siparis_tarihi?></td>
                                        <td><?php echo $siparis->siparis_durum?></td>
                                        <td><a class="btn btn-primary btn-sm" href="siparis-detaylar.php?siparis_detay_id=<?php echo $siparis->siparis_id?>&islem=detay"><i class="fa fa-eye"></i> Detay Gör</a></td>                
                                        <td><a class="btn btn-warning btn-sm" href="siparis-duzenle.php?siparis_id=<?php echo $siparis->siparis_id?>"><i class="fa fa-pen"></i> Düzenle</a></td>                
                                        <td><a class="btn btn-danger btn-sm" href="siparis-list.php?siparis_id=<?php echo $siparis->siparis_id?>&islem=Sil"><i class="fa fa-trash"></i> İptal</a></td>                
                                    
                                    </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
        
    </div>
</body>
</html>
