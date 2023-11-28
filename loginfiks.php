<?php
session_start();
// cek session
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// cek apakah button login sudah ditekan
if (isset($_POST['login'])) {

    // var_dump($_POST);

    // ambil username dan password yang di inputkan
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($query) === 1) {
        // cek password
        $pass = mysqli_fetch_assoc($query);
        if (password_verify($password, $pass["password"])) {
            // set session
            $_SESSION["login"] = true;
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}

?>
<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
<!-- //navbar -->



<body>
    <!-- Start Nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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

    <?php
    if (isset($error)) :
    ?>
        <p style="color:red" font-style="italic"> username / password salah</p>
    <?php
    endif;
    ?>

    <!-- form start -->
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        <h3 class="text-center mt-3">Form Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group mt-3">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username">
                            </div>
                            <div class="form-group mt-3">
                                <label for="passwrod">Password</label>
                                <input type="password" class="form-control" id="passwrod" name="password" placeholder="Masukan Passwrod">
                            </div>
                            <div class="form-group d-grid gap-2 mt-3">
                                <button type="submit" name="login" class="btn btn-primary mb-3 mt-3">Login</button>
                            </div>
                            <div class="form-group position-relative mb-3">
                                <div class="col">
                                    <a href="#">Lupa Password</a>
                                    <span class="position-absolute top-50 end-0 translate-middle-y">Belum Punya
                                        Akun? <a href="registrasi.php">Klik Disini</a></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- form and -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</html>