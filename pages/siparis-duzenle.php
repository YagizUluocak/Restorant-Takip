<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";

$updated = false;



if(isset($_GET['siparis_id']))
{
    $Siparis = new Siparis();
    $siparisIdGetir = $Siparis->siparisIdGetir();

    $secilenMasaID = $siparisIdGetir->masa_id;


    $masa = new masa();
    $masaGetir = $masa->masaGetir();

    if(isset($_POST['submit']))
    {

        $siparisGuncelle = $Siparis->siparisGuncelle();
        if($siparisGuncelle)
        {
            $updated = true;
            ?>
                <!-- İşlem gerçekleşmesi durumunda Sayfa yönlendirmesi -->
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var alertBox = document.getElementById('alertBox');
                        alertBox.style.display = 'block';
            
                        setTimeout(function() {
                            window.location.href = 'siparis-list.php';
                        }, 1500); // 1.5 saniye
                    });
                </script>
            <?php
        }
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Sipariş Düzenle</title>
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
                if($updated == true)
                {
                    ?>
                        <div class="alert alert-success text-center" role="alert" id="alertBox">
                            <h6 style="color: black;">Güncelleme İşlemi Başarıyla Gerçekleştirildi. Yönlendiriliyor!</h6>
                        </div>
                    <?php
                }
                ?>
                <form method="POST">
                <div class="form-group">
                    <label for="masa_id">Masa</label>
                    <select name="masa_id" class="form-control">
                        <?php
                        foreach ($masaGetir as $masa) {
                            ?>
                            <option value="<?php echo $masa->masa_id ?>"
                                <?php echo ($masa->masa_id == $secilenMasaID) ? 'selected' : ''; ?>>
                                <?php echo $masa->masa_adi ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                    <?php
                    $siparisTarihi = date("Y-m-d", strtotime($siparisIdGetir->siparis_tarihi));
                    ?>
                    <div class="form-group">
                        <label for="siparis_tarihi">Sipariş Tarihi</label>
                        <input type="date" class="form-control" name="siparis_tarihi" value="<?php echo $siparisTarihi ?>">
                    </div>
                    <div class="form-group">
                        <label for="siparis_durum">Sipariş Durumu</label>
                        <input type="text" class="form-control" name="siparis_durum" id="siparis_durum" value="<?php echo $siparisIdGetir->siparis_durum; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Ekle</button>
                </form>
            </div>
        </div>
        
    </div>
</body>
</html>
