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
    <title>Form Registrasi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>
    <form action="" method="post">

        <div class="limiter">
            <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
                <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                    <form class="login100-form validate-form flex-sb flex-w">
                        <span class="login100-form-title p-b-53">
                            Form Register
                        </span>
                        <div class="p-t-31 p-b-9">
                            <span class="txt1">
                                Username
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Username is required">
                            <input class="input100" type="text" name="username">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="p-t-31 p-b-9">
                            <span class="txt1">
                                Password
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Username is required">
                            <input class="input100" type="password" name="password" id="password">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="p-t-13 p-b-9">
                            <span class="txt1">
                                Konfirmasi Password
                            </span>
                            <div class="wrap-input100 validate-input" data-validate="Password is required">
                                <input class="input100" type="password2" name="password2">
                                <span class="focus-input100"></span>
                            </div>

                            <span class="txt1">
                                of sign up with
                            </span>
                        </div>

                        <a href="#" class="btn-face m-b-20">
                            <i class="fa fa-facebook-official"></i>
                            Facebook
                        </a>

                        <a href="#" class="btn-google m-b-20">
                            <img src="images/icons/icon-google.png" alt="GOOGLE">
                            Google
                        </a>

                        <div class="container-login100-form-btn m-t-17">
                            <button class="login100-form-btn" type="submit" name="register">
                                Register
                            </button>
                        </div>

                        <div class="w-full text-center p-t-55">
                            <span class="txt2">
                                do you have account?
                            </span>

                            <a href="#" class="txt2 bo1">
                                Sign in now
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>