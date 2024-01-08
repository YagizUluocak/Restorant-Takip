<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kategoriler</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <?php include '../inc/_sidebar.php'; ?>

        <div class="content">
            <div class="container">
                <h1>Kategoriler</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kategori Adı</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- PHP ile dinamik olarak veri çekilebilir -->
                        <tr>
                            <td>1</td>
                            <td>Kategori 1</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kategori 2</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
