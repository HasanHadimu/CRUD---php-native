<?php 
//konect ke database 02

$conn= mysqli_connect("localhost","root","","phpdasar");

//ambil data dari tabel mahasiswa/query data mahasiswa 03

$result = mysqli_query($conn,"SELECT * FROM mahasiswa");
if(!$result) {
    echo mysqli_error($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<!-- pembuatan form atau tabel 01 -->

<body>
    <h1>Daftar Mahasiswa</h1>

    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
        <!-- perulangan atau looping -->
        <?php $i=1; ?>
        <?php 
            while($row = mysqli_fetch_assoc($result)):
        ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="">ubah</a>
                <a href="">hapus</a>
            </td>
            <td>
                <img src="img/<?= $row["gambar"]; ?>" width="50">
            </td>
            <td><?= $row["nrp"];?></td>
            <td><?= $row["nama"];?></td>
            <td><?= $row["email"];?></td>
            <td><?= $row["jurusan"];?></td>
        </tr>
        <!--  perulangan atau looping -->
        <!-- <?php $i++; ?> perulangan angka urut -->
        <?php endwhile; ?>


    </table>
</body>

</html>