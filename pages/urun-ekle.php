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
                <form>
                    <div class="form-group">
                        <label for="urun_adi">Ürün Adı</label>
                        <input type="text" class="form-control" id="urun_adi">
                    </div>
                    <div class="form-group">
                        <label for="fiyat">Fiyat</label>
                        <input type="text" class="form-control" id="fiyat">
                    </div>
                    <button type="submit" class="btn btn-primary">Ekle</button>
                </form>
            </div>
        </div>
        
    </div>


</body>
</html>
