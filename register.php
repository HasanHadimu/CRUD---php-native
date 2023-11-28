<?php

require 'function.php';
if (isset($_POST["register"])) {

    if (register($_POST) > 0) {
        echo "<script>
        alert('user baru berhasil di tambahkan');
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}


function register($data)
{
    global $conn;
    $username = strtolower(stripslashes(($data["username"])));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $connpass = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada atau belum

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Username Sudah terdaftar');</script>";
        return false;
    }

    //cek konfirmasi password

    if ($password !== $connpass) {
        echo "<script>alert('konfirmasi password tidak sesuai');</script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database

    mysqli_query($conn, "INSERT INTO user VALUES('','$username', '$password')");

    return mysqli_affected_rows($conn);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register</title>
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
    <!-- <form action="" method="post">

        <ul>
            <li>
                <label for="username">username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2">konfirmasi password :</label>
                <input type="password" name="password2" id="password2">
            </li>
            <li>
                <button type="submit" name="register">Register</button>
            </li>
        </ul>

    </form> -->
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 style="text-center">Form Registrasi</h3>
                    </div>
                    <div class=" card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="email" name="username" class="form-control" id="username"
                                    aria-describedby="emailHelp">
                            </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password2" class="form-control" id="password2">
                    </div>

                    <button type="submit" name="register" class="btn btn-primary">Registrasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>