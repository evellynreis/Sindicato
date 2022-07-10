<?php
include_once "vendor/autoload.php";

use Jade\Avaliacao\Controller\CadastroFiliadoController;
use Jade\Avaliacao\Controller\EmpresaController;

/**
 * @var array $aTdSituacoes ;
 * @var array $aTdEmpresas ;
 * @var array $aTdCargos ;
 */
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="icon" href="../src/Views/images/icone.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../src/Views/cadastro/cadastro.css">
    <link rel="stylesheet" href="../src/Views//home/menu.css">
</head>

<body>

<div class="logo">
    <img src="../src/Views/images/logo.png">
</div>

<?php include_once __DIR__ . "/../menu.php"; ?>

<form action="" style="max-width:650px;margin:auto" class="formulario" method="post">
    <h2>Cadastro</h2>
    <h3>Filiado:</h3>

    <div class="input-container">
        <i class="fa fa-user icon"></i>
        <input class="input-field" type="text" placeholder="Nome completo" name="flo_nome">
    </div>

    <div class="input-container">
        <i class="fa fa-id-card-o icon"></i>
        <input class="input-field" maxlength="11" type="text" placeholder="CPF" name="flo_cpf">
    </div>

    <div class="input-container">
        <i class="fa fa-id-card-o icon"></i>
        <input class="input-field" maxlength="6" type="text" placeholder="RG" name="flo_rg">
    </div>

    <div class="input-container">
        <i class="fa fa-calendar icon"></i>
        <input class="input-field" type="date" placeholder="Data de nascimento" name="flo_dt_nascimento">
    </div>

    <div class="input-container">
        <i class="fa fa-calendar-check-o icon"></i>
        <input class="input-field" type="number" placeholder="Idade" name="flo_idade">
    </div>

    <div>
        <label for="empresa">Empresa</label>
        <div class="input-container">
            <i class="fa fa-university icon"></i>
            <select id="empresa" name="ems_id">
                <?php foreach ($aTdEmpresas as $aEmpresa): ?>
                    <option value="<?php echo $aEmpresa['ems_id'] ?>"><?php echo $aEmpresa['ems_nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div>
        <label for="empresa">Cargo</label>
        <div class="input-container">
            <i class="fa fa-university icon"></i>
            <select id="empresa" name="cao_id">
                <?php foreach ($aTdCargos as $aCargo): ?>
                    <option value="<?php echo $aCargo['cao_id'] ?>"><?php echo $aCargo['cao_nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div>
        <label for="empresa">Situação</label>
        <div class="input-container">
            <i class="fa fa-university icon"></i>
            <select id="empresa" name="sto_id">
                <?php foreach ($aTdSituacoes as $aSituacao): ?>
                    <option value="<?php echo $aSituacao['sto_id'] ?>"><?php echo $aSituacao['sto_nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="input-container">
        <i class="fa fa-phone-square icon"></i>
        <input class="input-field" maxlength="8" type="text" placeholder="Telefone" name="flo_telefone">
    </div>

    <div class="input-container">
        <i class="fa fa-phone-square icon"></i>
        <input class="input-field" maxlength="9" type="text" placeholder="Celular" name="flo_celular">
    </div>

    <h3>Dependentes:</h3>

    <div class="input-container">
        <i class="fa fa-user icon"></i>
        <input class="input-field" type="text" placeholder="Nome completo" name="dpe_nome">
    </div>

    <div class="input-container">
        <i class="fa fa-calendar icon"></i>
        <input class="input-field" type="date" placeholder="Data de nascimento" name="dpe_dt_nascimento">
    </div>

    <div class="input-container">
        <i class="fa fa-users icon"></i>
        <input class="input-field" type="number" placeholder="Grau de parentesco" name="dpe_grau_parentesco">
    </div>

    <button type="submit" class="btn">Cadastrar</button>

</form>

<br>
<br>

<footer>Copyright ©2022 - Evellyn Jade.</footer>
</body>
</html>
    
    