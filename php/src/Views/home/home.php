<?php

include_once "vendor/autoload.php";
use Jade\Avaliacao\Controller\HomeController;

/**
 * @var $oPermissao
 */

$id = session_id();

if (empty($id)){
    session_start();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="icon" href="../src/Views/images/icone.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../src/Views/home/home.css">
    <link rel="stylesheet" href="../src/Views//home/menu.css">
            
</head>
<body>
    <div class="container">

        <div class="logo">
            <img src="../src/Views/images/logo.png">
        </div>

       <?php include_once __DIR__ . "/../menu.php"; ?>
    </div>

    <div class="carousel">
        <a class="carousel-item"><img src="../src/Views/images/1.jpg" alt=""></a>
        <a class="carousel-item"><img src="../src/Views/images/2.png" alt=""></a>
        <a class="carousel-item"><img src="../src/Views/images/3.jpg" alt=""></a>
        <a class="carousel-item"><img src="../src/Views/images/4.jpg" alt=""></a>
        <a class="carousel-item"><img src="../src/Views/images/5.jpg" alt=""></a>
    </div>

    <div class="content">
        <?php if ($oPermissao) {?>
            <h3>Olá! Seja bem vindo(a), <?php echo $_SESSION['uso_nome']; ?>.</h3>
        <?php } ?>

    </div>

    <footer>Copyright ©2022 - Evellyn Jade.</footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.carousel').carousel();
        });   
    </script>
</body>
</html>