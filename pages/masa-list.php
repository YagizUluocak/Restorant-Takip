<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";

$deleted = false;
$Masa = new Masa();
$masaGetir = $Masa->masaGetir();

if(isset($_GET['masa_id']) && isset($_GET['islem']) && $_GET['islem'] == 'Sil')
{
    $masaSil = $Masa->masaSil();
    if($masaSil)
    {
        $deleted = true;
        ?>
		<!-- İşlem gerçekleşmesi durumunda Sayfa yönlendirmesi -->
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				var alertBox = document.getElementById('alertBox');
				alertBox.style.display = 'block';
	
				setTimeout(function() {
					window.location.href = 'masa-list.php';
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
    <title>Masalar</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link href="../style/style.css" rel="stylesheet"> <!-- Özel CSS dosyası -->
</head>
<body>
    <div class="container-fluid">
        <?php include '../inc/_sidebar.php'; ?>
        <div class="content">
            <div class="container">
                <h1>Masalar</h1>
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
				<a class="btn btn-success btn-sm mb-2 mt-2" href="masa-ekle.php"><i class="fa fa-plus"></i> Yeni Ekle</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Masa Adı</th>
                            <th style="width: 150px;">Düzenle</th>
                            <th style="width: 150px;">Sil</th>
                        </tr>
                    </thead>
                    <?php
                    if($masaGetir)
                    {

                        ?>
                            <tbody>
                                <?php
                                foreach($masaGetir as $masa)
                                {
                                    ?>
                                        <tr>
                                            <td><?php echo $masa->masa_id?></td>
                                            <td><?php echo $masa->masa_adi?></td>
                                            <td><a class="btn btn-warning btn-sm" href="masa-duzenle.php?masa_id=<?php echo $masa->masa_id?>"><i class="fa fa-pen"></i> Düzenle</a></td>
                                            <td><a class="btn btn-danger btn-sm" href="masa-list.php?masa_id=<?php echo $masa->masa_id?>&islem=Sil"><i class="fa fa-trash"></i> Sil</a></td>                
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
