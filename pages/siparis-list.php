<?php
require_once('../classes/db.class.php');
include "../classes/functions.class.php";

$Siparis = new Siparis();
$siparisGetir = $Siparis->siparisGetir();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Siparişler</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <?php include '../inc/_sidebar.php'; ?>

        <div class="content">
            <div class="container">
                <h1>Siparişler</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Masa Adı</th>
                            <th>Sipariş Tarihi</th>
                            <th>Sipariş Durumu</th>
                            <th>Sipariş Detay</th>
                        </tr>
                    </thead>
                    <?php
                    if($siparisGetir)
                    {
                        ?>
                        <tbody>
                            <?php
                            foreach($siparisGetir as $siparis)
                            {
                                ?>
                                    <tr>
                                        <td><?php echo $siparis->siparis_id?></td>
                                        <td><?php echo $siparis->masa_adi?></td>
                                        <td><?php echo $siparis->siparis_tarihi?></td>
                                        <td><?php echo $siparis->siparis_durum?></td>
                                        <td><a class="btn btn-warning btn-sm" href="siparis-detaylar.php?siparis_id=<?php echo $siparis->siparis_id?>"><i class="fa fa-trash"></i> Detay Gör</a></td>                
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
