<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";

$Kategori = new Kategori();
$kategoriGetir = $Kategori->kategoriGetir();
$deleted = false;
if(isset($_GET["kategori_id"]) && isset($_GET['islem']) && $_GET['islem'] == 'Sil')
{
	$kategorisil = $Kategori->kategoriSil();
	
	if($kategorisil)
	{
		$deleted = true;
		?>
		<!-- İşlem gerçekleşmesi durumunda Sayfa yönlendirmesi -->
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				var alertBox = document.getElementById('alertBox');
				alertBox.style.display = 'block';
	
				setTimeout(function() {
					window.location.href = 'kategori-list.php';
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
    <title>Kategoriler</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>
<body>
    <div class="container-fluid">
        <?php include '../inc/_sidebar.php'; ?>

        <div class="content">
            <div class="container">
                <h1>Kategoriler</h1>
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
				<a class="btn btn-success btn-sm mb-2 mt-2" href="kategori-ekle.php"><i class="fa fa-plus"></i> Yeni Ekle</a>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kategori Adı</th>
                            <th style="width: 150px;">Düzenle</th>
                            <th style="width: 150px;">Sil</th>
                        </tr>
                    </thead>
                    <!-- Kategori varsa tbody alanını çalıştır.-->
                    <?php 
                    if($kategoriGetir) 
                    {
                    ?>
                        <tbody>
                            <?php
                            foreach($kategoriGetir as $kategori)
                            {
                                ?>
                                    <tr>
                                        <td><?php echo $kategori->kategori_id?></td>
                                        <td><?php echo $kategori->kategori_adi?></td>
                                        <td><a class="btn btn-warning btn-sm" href="kategori-guncelle.php?kategori_id=<?php echo $kategori->kategori_id?>"><i class="fa fa-pen"></i> Düzenle</a></td>
                                        <td><a class="btn btn-danger btn-sm" href="kategori-list.php?kategori_id=<?php echo $kategori->kategori_id?>&islem=Sil"><i class="fa fa-trash"></i> Sil</a></td>                
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
                                Kayıtlı Kategori Bulunamadı, Lütfen yeni Kategori Ekleyiniz.
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
