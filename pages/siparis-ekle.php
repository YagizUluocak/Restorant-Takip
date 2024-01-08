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
                <form>
                    <div class="form-group">
                        <label for="masa_id">Masa ID</label>
                        <input type="text" class="form-control" id="masa_id">
                    </div>
                    <div class="form-group">
                        <label for="siparis_durumu">Sipariş Durumu</label>
                        <input type="text" class="form-control" id="siparis_durumu">
                    </div>
                    <button type="submit" class="btn btn-primary">Ekle</button>
                </form>
            </div>
        </div>
        
    </div>
</body>
</html>
