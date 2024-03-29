<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";

$added = false;
$Kategori = new Kategori();
$kategoriGetir = $Kategori->kategoriGetir();

if(isset($_POST["submit"]))
{
    $Urun = new Urun();
    $urunEkle = $Urun->urunEkle();

    if($urunEkle)
    {
        $added = true;
        ?>
            <!-- İşlem gerçekleşmesi durumunda Sayfa yönlendirmesi -->
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var alertBox = document.getElementById('alertBox');
                    alertBox.style.display = 'block';
        
                    setTimeout(function() {
                        window.location.href = 'urun-list.php';
                    }, 1700); // 1.7 saniye
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
    <title>Yeni Ürün Ekle</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <?php include '../inc/_sidebar.php'; ?>

        <div class="content">
            <div class="container">
                <h1>Yeni Ürün Ekle</h1>
                <?php
                    if($added)
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
                        <label for="urun_adi">Ürün Adı</label>
                        <input type="text" class="form-control" name="urun_adi">
                    </div>
                    <div class="form-group">
                        <label for="fiyat">Ürün Fiyatı</label>
                        <input type="text" class="form-control" name="urun_fiyat">
                    </div>
                    <div class="form-group">
                        <label for="fiyat">Kategori</label>
                        <select name="kategori_id" id="kategori_id" name="kategori_id" class="form-control" value="<?php echo $kategori->kategori_id?>">
                            <?php
                            foreach($kategoriGetir as $kategori)
                            {
                                ?>
                                <option name="kategori_id" value="<?php echo $kategori->kategori_id?>"><?php echo $kategori->kategori_adi?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Kaydet</button>
                </form>
            </div>
        </div>
        
    </div>


</body>
</html>
