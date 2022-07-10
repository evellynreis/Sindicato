<?php
include_once "vendor/autoload.php";
use Jade\Avaliacao\Controller\CadastroUsuarioController;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
    <link rel="icon" href="../src/Views/images/icone.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../src/Views/cadastro/cadastro.css">
    <link rel="stylesheet" href="../src/Views//home/menu.css">
</head>

<body>

<div class="logo">
    <img src="../src/Views//images/logo.png">
</div>

<?php include_once __DIR__ . "/../menu.php"; ?>

    <form action="" style="max-width:650px;margin:auto" class="formulario" method="post">
        <h2>Cadastro de Usuário</h2>

        <div class="input-container">
            <i class="fa fa-user-circle-o icon"></i>
            <input class="input-field" type="text" placeholder="Nome" name="uso_nome">
        </div>

        <div class="input-container">
            <i class="fa fa-id-card-o icon"></i>
            <input class="input-field" type="text" placeholder="Login" name="uso_login">
        </div>

        <div class="input-container">
            <i class="fa fa-key icon"></i>
            <input class="input-field" type="text" placeholder="Senha" name="uso_senha">
        </div>

        <div class="tipo">
            <input type="radio" name="uso_adm" value="1">
            <label for="1">Administrador</label><br>
            <input type="radio" name="uso_adm" value="2">
            <label for="2">Usuário Comum</label><br>
        </div>

        <button type="submit" class="btn">Cadastrar</button>

    </form>

    <br>
    <br>

    <footer style="position: fixed">Copyright ©2022 - Evellyn Jade.</footer>
</body>
</html>

