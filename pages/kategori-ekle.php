<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yeni Kategori Ekle</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <?php include '../inc/_sidebar.php'; ?>

            <div class="content">
                <div class="container">
                    <h1>Yeni Kategori Ekle</h1>
                    <form>
                        <div class="form-group">
                            <label for="kategori_adi">Kategori Adı</label>
                            <input type="text" class="form-control" id="kategori_adi">
                        </div>
                        <button type="submit" class="btn btn-primary">Ekle</button>
                    </form>
                </div>

            </div>

    </div>
</body>
</html>
