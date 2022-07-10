<?php
include_once "vendor/autoload.php";
use Jade\Avaliacao\Controller\FiliadoController;

/**
 * @var array $aTdFiliados
 * @var array $num_pagina;
 * @var int $pagina;
 */
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Filiados</title>
    <link rel="icon" href="../src/Views/images/icone.png">
    <link rel="stylesheet" href="../src/Views/filiados/filiados.css">
    <link rel="stylesheet" href="../src/Views//home/menu.css">
    <link rel="stylesheet" href="../src/Views/filiados/bootstrap.min.css">

</head>

<body>
<div class="container">

    <div class="logo">
        <img src="../src/Views/images/logo.png">
    </div>

    <?php include_once __DIR__ . "/../menu.php"; ?>
</div>

<h1>Lista de Filiados:</h1>
<form method="post" action="">
    <label for="filtrar-tabela">Procurar pelo filiado:</label>
    <input type="text" name="filtro_nome" id="filtrar-tabela" placeholder="Digite o nome:">
    <input type="text" name="filtro_mes" id="filtrar-tabela" placeholder="Digite o mês de nascimento:">
    <input type="submit" id="filtragem" value="Filtrar">
</form>

<div class="botao">
    <button><a href="/pdf">Gerar pdf</a></button>
</div>

<table id="customers">
    <tr>
        <th>Nome Completo</th>
        <th>Cpf</th>
        <th>Rg</th>
        <th>Data de Nascimento</th>
        <th>Idade</th>
        <th>Empresa (ID)</th>
        <th>Cargo (ID)</th>
        <th>Situação (ID)</th>
        <th>Telefone</th>
        <th>Celular</th>
        <th>Data de Atualização</th>
    </tr>

    <?php foreach ($aTdFiliados as $aFiliado): ?>
        <tr>
            <td><?php echo $aFiliado['flo_nome'];?></td>
            <td><?php echo $aFiliado['flo_cpf'];?></td>
            <td><?php echo $aFiliado['flo_rg'];?></td>
            <td><?php echo $aFiliado['flo_dt_nascimento'] ?></td>
            <td><?php echo $aFiliado['flo_idade'] ?></td>
            <td><?php echo $aFiliado['ems_id'] ?></td>
            <td><?php echo $aFiliado['cao_id'] ?></td>
            <td><?php echo $aFiliado['sto_id'] ?></td>
            <td><?php echo $aFiliado['flo_telefone'] ?></td>
            <td><?php echo $aFiliado['flo_celular'] ?></td>
            <td><?php echo $aFiliado['flo_dt_atualizacao'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<div>
    <?php
        $pagina_anterior = $pagina - 1;
        $pagina_posterior = $pagina + 1;
    ?>

    <nav class="text-center" aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <?php
                    if ($pagina_anterior!=0){ ?>
                        <a class="page-link" href="/filiado?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                <?php }else{ ?>
                        <span aria-hidden="true">&laquo;</span>
                <?php }?>
            </li>

            <?php
                for ($i=1; $i<$num_pagina +1; $i++) { ?>
                    <li class="page-item"><a class="page-link" href="/filiado?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>

            <?php } ?>

            <li class="page-item">
                <?php
                if ($pagina_posterior <= $num_pagina){ ?>
                    <a class="page-link" href="/filiado?pagina=<?php echo $pagina_posterior; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                <?php }else{ ?>
                    <span aria-hidden="true">&raquo;</span>
                <?php }?>
            </li>

        </ul>
    </nav>
</div>


</body>
</html>