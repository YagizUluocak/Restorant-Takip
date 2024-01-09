<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";

$added = false;

$Siparis = new Siparis();
$siparisGetir = $Siparis->siparisGetir();
$siparisIdGetir = $Siparis->siparisIdGetir();
$getIdsiparis = $Siparis->getIdsiparis();

$Urun = new Urun();
$urunGetir = $Urun->urunGetir();



$SiparisDetay = new SiparisDetay();


if(isset($_POST['submit']))
{
    $sipariDetayEkle = $SiparisDetay->siparisDetayEkle();
    if($sipariDetayEkle)
    {
        
        $added = true;
        ?>
            <!-- İşlem gerçekleşmesi durumunda Sayfa yönlendirmesi -->
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var alertBox = document.getElementById('alertBox');
                    alertBox.style.display = 'block';
        
                    setTimeout(function() {
                        window.location.href = 'siparis-list.php';
                    }, 1600); // 1.6 saniye
                });
            </script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yeni Sipariş Ekle</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <?php include '../inc/_sidebar.php'; ?>

        <div class="content">
            <div class="container">
                <h1>Yeni Sipariş Ekle</h1>
                <?php
                if($added == true)
                {
                    ?>
                        <div class="alert alert-success text-center" role="alert" id="alertBox">
                            <h6 style="color: black;">Kayıt İşlemi Başarıyla Gerçekleştirildi. Yönlendiriliyor!</h6>
                        </div>
                    <?php
                }
                ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="siparis_id">Siparis</label>
                        <!-- sipari_id getten gelicek-->
                        <select name="siparis_id" class="form-control">
                            <?php
                                foreach($siparisGetir as $siparis)
                                {
                                    ?>
                                    <option name="siparis_id" value="<?php echo $siparis->siparis_id?>"><?php echo $siparis->masa_adi?></option>
                                    <?php
                                }
                            ?>
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <label for="urun_id">Ürünler</label>
                        <select name="urun_id" class="form-control">
                            <?php
                                foreach($urunGetir as $urun)
                                {
                                    ?>
                                    <option name="urun_id" value="<?php echo $urun->urun_id?>"><?php echo $urun->urun_adi?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="miktar">Sipariş Adeti</label>
                        <input type="number" class="form-control" name="miktar">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Ekle</button>
                </form>
            </div>
        </div>
        
    </div>
</body>
</html>
