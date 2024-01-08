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
                            <th>Masa ID</th>
                            <th>Sipariş Tarihi</th>
                            <th>Sipariş Durumu</th>
                            <th>Sipariş Detay</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- PHP ile dinamik olarak veri çekilebilir -->
                        <tr>
                            <td>1</td>
                            <td>5</td>
                            <td>2024-01-01 10:00:00</td>
                            <td>Onaylandı</td>
                            <td><a class="btn btn-warning btn-sm" href="#"><i class="fa fa-trash"></i> Detay Gör</a></td>                
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>7</td>
                            <td>2024-01-02 12:00:00</td>
                            <td>Beklemede</td>
                            <td><a class="btn btn-warning btn-sm" href="#"><i class="fa fa-trash"></i> Detay Gör</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</body>
</html>
