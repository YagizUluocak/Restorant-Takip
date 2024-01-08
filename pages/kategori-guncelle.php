<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";

$updated = false;

if(isset($_GET["kategori_id"]))
{
    $Kategori = new Kategori();
    $kategoriIdGetir = $Kategori->kategoriIDGetir();

    if(isset($_POST["submit"]))
    { 
        $KategoriGuncelle= $Kategori->kategoriGuncelle();
        if($KategoriGuncelle)
        {
            $updated = true;
            ?>
                <!-- İşlem gerçekleşmesi durumunda Sayfa yönlendirmesi -->
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var alertBox = document.getElementById('alertBox');
                        alertBox.style.display = 'block';
            
                        setTimeout(function() {
                            window.location.href = 'kategori-list.php';
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
    <title>Kategori Güncelle</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <?php include '../inc/_sidebar.php'; ?>

            <div class="content">
                <div class="container">
                    <h1>Kategori Güncelle</h1>
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
                            <label for="kategori_adi">Kategori Adı</label>
                            <input type="text" class="form-control" id="kategori_adi" name="kategori_adi" value="<?php echo $kategoriIdGetir->kategori_adi?>">
                        </div>
                        <button type="submit" class="btn btn-success" name="submit">Güncelle</button>
                    </form>
                </div>

            </div>

    </div>
</body>
</html>
