<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="../src/Views/images/icone.png">
    <link rel="stylesheet" type="text/css" href="../src/Views/login/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../src/Views/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../src/Views/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="../src/Views/login/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="../src/Views/login/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="../src/Views/login/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="../src/Views/login/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../src/Views/login/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="../src/Views/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="../src/Views/login/css/main.css">
</head>

<body style="background-color: #666666;">

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" action = "/home" method="post">
                <img src="../src/Views/images/logo.png">
                <?php
                if (!empty($_SESSION['erro_login'])) {
                    $alerta = $_SESSION['erro_login'];
                    echo "<script>alert('$alerta')</script>";
                }
                ?>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="uso_login">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Usuário</span>
                </div>


                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="uso_senha">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Senha</span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>

            </form>

            <div class="login100-more" style="background-image: url('../src/Views/login/images/sindicato.jpeg');">
            </div>
        </div>
    </div>
</div>





<!--===============================================================================================-->
    <script src="../src/Views/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="../src/Views/login/vendor/animsition/js/animsition.min.js"></script>
    <script src="../src/Views/login/vendor/bootstrap/js/popper.js"></script>
    <script src="../src/Views/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../src/Views/login/vendor/select2/select2.min.js"></script>
    <script src="../src/Views/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="../src/Views/login/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="../src/Views/login/vendor/countdowntime/countdowntime.js"></script>
    <script src="../src/Views/login/js/main.js"></script>

</body>
</html>