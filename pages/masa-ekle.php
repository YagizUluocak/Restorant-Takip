<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";


$added = false;
if(isset($_POST["submit"]))
{
    $Masa = new Masa();
    $masaEkle = $Masa->masaEkle();

    if($masaEkle)
    {
        $added = true;
        ?>
            <!-- İşlem gerçekleşmesi durumunda Sayfa yönlendirmesi -->
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var alertBox = document.getElementById('alertBox');
                    alertBox.style.display = 'block';
            
                setTimeout(function() {
                    window.location.href = 'masa-list.php';
                }, 1500); // 1.5 saniye
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
    <title>Yeni Masa Ekle</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style/style.css" rel="stylesheet"> <!-- Özel CSS dosyası -->
</head>
<body>
    <div class="container-fluid">
        <?php include '../inc/_sidebar.php'; ?>

        <div class="content">
            <div class="container">
                <h1>Yeni Masa Ekle</h1>
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
                        <label for="masa_adi">Masa Adı</label>
                        <input type="text" class="form-control" id="masa_adi" name="masa_adi">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Ekle</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
