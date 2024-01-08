<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";

$added = false;

$masa = new masa();
$masaGetir = $masa->masaGetir();

$Siparis = new Siparis();
if(isset($_POST['submit']))
{
    $siparisEkle = $Siparis->siparisEkle();
    if($siparisEkle)
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
                        <label for="masa_id">Masa</label>
                        <select name="masa_id" class="form-control">
                            <?php
                                foreach($masaGetir as $masa)
                                {
                                    ?>
                                    <option name="masa_id" value="<?php echo $masa->masa_id?>"><?php echo $masa->masa_adi?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="siparis_tarihi">Sipariş Tarihi</label>
                        <input type="date" data-date-format="mm/dd/yyyy" class="form-control" name="siparis_tarihi">
                    </div>
                    <div class="form-group">
                        <label for="siparis_durum">Sipariş Durumu</label>
                        <input type="text" class="form-control" name="siparis_durum">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Ekle</button>
                </form>
            </div>
        </div>
        
    </div>
</body>
</html>
