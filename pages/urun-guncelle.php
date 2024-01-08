<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";

$updated = false;
if(isset($_GET["urun_id"]))
{
    $Urun = new Urun();
    $urunIdGetir = $Urun->urunIDGetir();

    $Kategori = new Kategori();
    $kategoriGetir = $Kategori->kategoriGetir();

    if(isset($_POST["submit"]))
    {
        $urunGuncelle = $Urun->urunGuncelle();

        if($urunGuncelle)
        {
            $updated = true;
            ?>
            <!-- İşlem gerçekleşmesi durumunda Sayfa yönlendirmesi -->
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var alertBox = document.getElementById('alertBox');
                    alertBox.style.display = 'block';
        
                    setTimeout(function() {
                        window.location.href = 'urun-list.php';
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
    <title>Ürün Güncelle</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <?php include '../inc/_sidebar.php'; ?>

        <div class="content">
            <div class="container">
                <h1>Ürün Güncelle</h1>
                <?php
                        if($updated)
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
                        <label for="urun_adi">Ürün Adı</label>
                        <input type="text" class="form-control" id="urun_adi" name="urun_adi" value="<?php echo $urunIdGetir->urun_adi?>">
                    </div>
                    <div class="form-group">
                        <label for="urun_fiyat">Fiyat</label>
                        <input type="text" class="form-control" id="urun_fiyat" name="urun_fiyat" value="<?php echo $urunIdGetir->urun_fiyat?>">
                    </div>
                    <div class="form-group">
                        <label for="kategori_id">Kategori</label>
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
                    <button type="submit" class="btn btn-primary" name="submit">Güncelle</button>
                </form>
            </div>
        </div>
        
    </div>


</body>
</html>
