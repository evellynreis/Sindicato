<?php

include_once "vendor/autoload.php";
use Jade\Avaliacao\Controller\SituacaoController;

/**
 * @var array $aTdSituacoes
 */
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Situação</title>
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

    <form action="" style="max-width:650px;margin:auto" class="formulario" method="post">
        <h2>Cadastrar Situação</h2>

        <div class="input-container">
            <i class="fa fa-user-circle-o icon"></i>
            <input class="input-field" type="text" placeholder="Digite o nome da situação" name="sto_nome">
        </div>

        <button type="submit" class="btn">Cadastrar</button>

    </form>

    <h2 style="color: #0c5460; margin-top: 15px">Lista de situações</h2>

    <table id="customers">
        <tr>
            <th>Nome</th>
            <th>Editar</th>
            <th>Remover</th>
        </tr>

        <?php foreach ($aTdSituacoes as $aSituacao): ?>
            <tr>
                <td><?php echo $aSituacao['sto_nome'];?></td>
                <td><a href="/situacao/editado?sto_id=<?php echo $aSituacao['sto_id'];?>" <i class="fa fa-pencil-square-o"></i></a></td>
                <td><a href="/situacao/excluir/?sto_id=<?php echo $aSituacao['sto_id'];?>" <i class="fa fa-trash-o"></i></a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <br>

    <footer style="position: fixed">Copyright ©2022 - Evellyn Jade.</footer>
</body>
</html>

