<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";

$deleted = false;
$Urun = new Urun();
$urunGetir = $Urun->urunGetir();

if(isset($_GET['urun_id']) && isset($_GET['islem']) && $_GET['islem'] == 'Sil')
{
    $urunSil = $Urun->urunSil();

    if($urunSil)
    {
        $deleted = true;
        ?>
		<!-- İşlem gerçekleşmesi durumunda Sayfa yönlendirmesi -->
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				var alertBox = document.getElementById('alertBox');
				alertBox.style.display = 'block';
	
				setTimeout(function() {
					window.location.href = 'urun-list.php';
				}, 1200); // 1.2 saniye
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
    <title>Ürünler</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link href="../style/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <?php include '../inc/_sidebar.php'; ?>

        <div class="content">
            <div class="container">
                <h1>Ürünler</h1>
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
                            <th>Ürün Adı</th>
                            <th>Ürün Fiyatı</th>
                            <th>Kategorisi</th>
                            <th style="width: 150px;">Düzenle</th>
                            <th style="width: 150px;">Sil</th>
                        </tr>
                    </thead>
                    <?php
                    if($urunGetir)
                    {
                        ?>
                        <tbody>
                            <?php
                            foreach($urunGetir as $urun)
                            {
                                ?>
                                <tr>
                                    <td><?php echo $urun->urun_id?></td>
                                    <td><?php echo $urun->urun_adi?></td>
                                    <td><?php echo $urun->urun_fiyat?> ₺</td>
                                    <td><?php echo $urun->kategori_adi?></td>
                                    <td><a class="btn btn-warning btn-sm" href="urun-guncelle.php?urun_id=<?php echo $urun->urun_id?>"><i class="fa fa-pen"></i> Düzenle</a></td>
                                    <td><a class="btn btn-danger btn-sm" href="urun-list.php?urun_id=<?php echo $urun->urun_id?>&islem=Sil"><i class="fa fa-trash"></i> Sil</a></td>                
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                        <?php
                    }
                    else
                    {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                Kayıtlı Ürün Bulunamadı, Lütfen yeni Ürün Ekleyiniz.
                            </div>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>

    </div>

</body>
</html>
