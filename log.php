<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="signin">
        <div class="back-img">
            <div class="sign-in-text">
                <h2 class="active">Login</h2>
                <h2 class="nonactive">Register</h2>
            </div>
            <!--/.sign-in-text-->
            <div class="layer">
            </div>
            <!--/.layer-->
            <p class="point">&#9650;</p>
        </div>
        <!--/.back-img-->
        <div class="form-section">

            <form action="#">
                <!--Email-->
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="tnama" placeholder="Masukan Username">
                </div>
                <br />
                <br />
                <!--Password-->
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="passwrod">Password</label>
                    <input type="password" class="form-control" id="passwrod" name="tpass" placeholder="Masukan Passwrod">
                </div>
                <br />
                <p class="forgot-text">Forgot Password ?</p>
                <!--CheckBox-->
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1">
                    <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" checked>
                    <span class="keep-text mdl-checkbox__label">Keep me Signed In</span>
                </label>
            </form>
        </div>
        <!--/.form-section-->

        <button class="sign-in-btn mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--raised mdl-button--colored">
            Sign In
        </button>
        <!--/button-->
    </div>
    <!--/.signin-->
</body>

</html>