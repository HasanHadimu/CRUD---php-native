<?php
// koneksi ke dbms
require 'function.php';

// $conn = mysqli_connect("localhost","root","","phpdasar");

// cek apakah tombol submit sudah jalan apa belum
if (isset($_POST["submit"])) {

    //cek apakah data berhasil di tambahkan atau tidak

    if (tambah($_POST) > 0) {
        echo "
            <script>
            alert('data berhasil di tambahkan');
            document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('data tidak berhasil di tambahkan');
            document.location.href = 'index.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>

    <!-- link bootstraps -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-4">
                <div class="card">
                    <div class="card-header">
                        <h1>Tambah Data Mahasiswa</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-2">
                                <label for="nrp" class="form-label">NRP : </label>
                                <input type="text" class="form-control" name="nrp" id="nrp" required>
                            </div>

                            <div class="mb-2">
                                <label for="nama" class="form-label">Nama : </label>
                                <input type="text" class="form-control" name="nama" id="nama" required>
                            </div>

                            <div class="mb-2">
                                <label for="email" class="form-label">Email : </label>
                                <input type="text" class="form-control" name="email" id="email" required>
                            </div>

                            <div class="mb-2">
                                <label for="jurusan" class="form-label">Jurusan : </label>
                                <input type="text" class="form-control" name="jurusan" id="jurusan" required>
                            </div>

                            <div class="mb-2">
                                <label for="gambar" class="form-label">Gambar : </label>
                                <input type="file" class="form-control" name="gambar" id="gambar" required>
                            </div>

                            <div class="mb-2">
                                <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>


</html>