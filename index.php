<?php
// cek di file function 02
require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// $mahasiswa = nama field db

//menu pencarian

if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}

//ambil data dari tabel mahasiswa/query data mahasiswa 03

$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
if (!$result) {
    echo mysqli_error($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- link bootstraps -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<!-- pembuatan form atau tabel 01 -->

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h1>Daftar Mahasiswa</h1>
                    </div>
                    <div class="card-body">
                        <a href="tambah.php" class="btn btn-success">Tambah Data</a>
                        <br> <br>

                        <form action="" method="post">

                            <input type="text" name="keyword" size="40" autofocus
                                placeholder="masukan keyword pencarian..." autocomplete="off">
                            <button type="submit" class="btn btn-primary" name="cari">Cari!</button>

                        </form>
                        <br>

                        <table id="tabelcari" class="table table-bordered table-striped table-hover text-center">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Aksi</th>
                                    <th>Gambar</th>
                                    <th>NRP</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jurusan</th>
                                </tr>
                            </thead>
                            <!-- buat perulangan atau looping no urut 05 -->
                            <?php $i = 1; ?>
                            <tbody>
                                <?php
                                // foreach untuk looping
                                foreach ($mahasiswa as $row) :
                                ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td>
                                        <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-danger">ubah</a>
                                        <a href="hapus.php?id=<?= $row["id"]; ?>" class="btn btn-warning">hapus</a>
                                    </td>
                                    <td>
                                        <img src="img/<?= $row["gambar"]; ?>" width="50">
                                    </td>
                                    <td><?= $row["nrp"]; ?></td>
                                    <td><?= $row["nama"]; ?></td>
                                    <td><?= $row["email"]; ?></td>
                                    <td><?= $row["jurusan"]; ?></td>
                                </tr>
                                <!-- <?php $i++; ?> perulangan angka urut -->
                                <?php endforeach; ?>
                            </tbody>
                            <!--  perulangan atau looping -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <!-- link script bootstraps -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
    new DataTable('#tabelcari');
    </script>
</body>

</html>