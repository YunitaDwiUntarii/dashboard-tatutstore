<?php
include "koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM produk");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tatut Store - Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand">
            <i class="bi bi-shop"></i> Tatut Store
        </span>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-2 bg-white min-vh-100 p-3">
            <a href="index.php" class="d-block mb-4 text-decoration-none">
                <i class="bi bi-grid"></i> Dashboard
            </a>
            
            <a href="#" class="d-block mb-4 text-decoration-none">
                <i class="bi bi-cart"></i> Orders
            </a>
            
            <a href="index.php" class="d-block mb-4 text-decoration-none">
                <i class="bi bi-box-seam"></i> Products
            </a>
            
            <a href="#" class="d-block mb-4 text-decoration-none">
                <i class="bi bi-people"></i> Customers
            </a>
            
            <a href="#" class="d-block mb-4 text-decoration-none">
                <i class="bi bi-bar-chart"></i> Reports
            </a>
            
            <a href="#" class="d-block mb-4 text-decoration-none">
                <i class="bi bi-plug"></i> Integrations
            </a>
            
            <hr>
            
            <a href="#" class="d-block mt-4 text-decoration-none">
                <i class="bi bi-box-arrow-left"></i> Sign out
            </a>
</div>

        <div class="col-md-10 p-4">
            <h2>Dashboard</h2>
            <hr>

            <h4 class="mb-3">Data Produk</h4>
            <a href="tambah.php" class="btn btn-dark btn-sm mb-3">
                <i class="bi bi-plus-lg"></i> Add Product
            </a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped bg-white">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;

                        while ($data = mysqli_fetch_assoc($query)) {
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($data['nama_barang']); ?></td>
                            <td>Rp<?= number_format($data['harga'], 0, ',', '.'); ?></td>
                            <td><?= $data['stok']; ?></td>
                            <td>
                                <a href="edit.php?id=<?= $data['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="hapus.php?id=<?= $data['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

</body>
</html>