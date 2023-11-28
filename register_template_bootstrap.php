<?php


$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// cek apakah button registrasi sudah ditekan
if (isset($_POST['registrasi'])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
    alert('user baru telah berhasil di tambahkan!');
    document.location = 'login.php';
    </script>";
    } else {
        echo mysqli_error($conn);
    }
}

// function registrasi
function registrasi($data)
{
    global $conn;
    $username = strtolower(stripcslashes($data["tnama"]));
    $password = mysqli_real_escape_string($conn, $data["tpass"]);
    $connpass = mysqli_real_escape_string($conn, $data["tkonpass"]);

    // cek username sedah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Username Sudah Terdaftar');</script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $connpass) {
        echo "<script>alert('Konfirmasi Password Tidak Sesuai!');</script>";
        return false;
    }
    // enkripsi passwordnya
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
?>
<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/f2780eb9e6.js" crossorigin="anonymous"></script>

    <!--Awal Data Table -->
    <!-- java script -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="style/javascript/index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!--Akhir Data Table -->
</head>

<body>
    <!-- Start Nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">SI5e</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="#">About</a>
                    <a class="nav-link" href="#">Contact</a>
                    <a class="nav-link bg-primary text-light" href="login.php">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Nav -->
    <!-- form start -->
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        <h3 class="text-center mt-3">Form Registrasi</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group mt-3">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="tnama"
                                    placeholder="Masukan Username">
                            </div>
                            <div class="form-group mt-3">
                                <label for="passwrod">Password</label>
                                <input type="password" class="form-control" id="passwrod" name="tpass"
                                    placeholder="Masukan Passwrod">
                            </div>
                            <div class="form-group mt-3">
                                <label for="conpasswrod">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="conpasswrod" name="tkonpass"
                                    placeholder="Masukan Konfirmasi Passwrod">
                            </div>
                            <div class="form-group d-grid gap-2 mt-3">
                                <button type="submit" name="registrasi"
                                    class="btn btn-primary mb-3 mt-3">Registrasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- form and -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</html>