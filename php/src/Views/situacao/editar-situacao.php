<?php

include_once "vendor/autoload.php";
use Jade\Avaliacao\Controller\SituacaoController;

/**
 * @var int $iStoId
 * @var array $aSituacao
 */
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Situação</title>
    <link rel="icon" href="../src/Views/images/icone.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../src/Views/cadastro/cadastro.css">
    <link rel="stylesheet" href="../src/Views/empresas/empresas.css">
    <link rel="stylesheet" href="../src/Views//home/menu.css">
</head>

<body>

<div class="logo">
    <img src="../src/Views//images/logo.png">
</div>

<?php include_once __DIR__ . "/../menu.php"; ?>

        <form action="/situacao/editar" style="max-width:650px;margin:auto" class="formulario" method="post">
            <h2>Editar Situação</h2>

            <div class="input-container">
                <input type="hidden" name="sto_id" value="<?php echo $iStoId; ?>">
                <input class="input-field" type="text" id="sdfdsf" name="sto_nome" placeholder="" value="<?php echo $aSituacao['sto_nome']; ?>">
                <i class="fa fa-user-circle-o icon"></i>
            </div>
            <button type="submit" class="btn">Editar</button>
            <a href="/situacao">Voltar</a>
        </form>
    <footer style="position: fixed">Copyright ©2022 - Evellyn Jade.</footer>
</body>
</html>

