<?php
namespace Jade\Avaliacao\Infra;
use Jade\Avaliacao\Controller\Conexao;
use Jade\Avaliacao\Models\DependenteModels;
use Jade\Avaliacao\Models\FiliadoModels;

class Requisicao {

    /**
     * @var Conexao
     * @var $usuario;
     */
    private $conn;

    /**
     * Função construtora.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     */
    public function __construct(Conexao $conn) {
        $this->conn = $conn;
    }

    /**
     * Função de requisitadora para vê se o usuário tem permissão.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return bool
     */
    public function fnPermissaoUso($usuario, Conexao $conn): bool {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $permissao = $usuario->fnValidacao($_POST['uso_login'], md5($_POST['uso_senha']), $conn);

            if (!$permissao) {
                header("Location: /login");
                exit();
            }
        }
        return true;
    }

    /**
     * Função de requisitadora para adicionar o filiado e dependente.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return bool
     */
    public static function fnAdicionaFilDep(Conexao $conn): bool {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $addFiliado= new FiliadoModels(Conexao::conectar());
            $addDependente = new DependenteModels(Conexao::conectar());
            $bCadastrado = false;
            if (isset($_POST['flo_nome'], $_POST['flo_cpf'], $_POST['flo_rg'], $_POST['flo_dt_nascimento'], $_POST['flo_idade'], $_POST['ems_id'], $_POST['cao_id'], $_POST['sto_id'], $_POST['flo_telefone'], $_POST['flo_celular'])) {
                $bCadastrado =  $addFiliado->fnAdicionaFiliado(addslashes($_POST['flo_nome']), addslashes($_POST['flo_cpf']), addslashes($_POST['flo_rg']), $_POST['flo_dt_nascimento'],$_POST['flo_idade'], $_POST['ems_id'], $_POST['cao_id'], $_POST['sto_id'], $_POST['flo_telefone'], $_POST['flo_celular']);
            }
            if (isset($_POST['dpe_nome'], $_POST['dpe_dt_nascimento'], $_POST['dpe_grau_parentesco'])){
                $bDepCadastrado = $addDependente->fnAdicionaDependente(addslashes($_POST['dpe_nome']), $_POST['dpe_dt_nascimento'], $_POST['dpe_grau_parentesco']);
                if ($bCadastrado) {
                    echo $_POST['flo_nome'] . ", cadastrado com sucesso!";
                } else {
                    echo "Erro ao cadastrar, por favor tente novamente.";
                }
            }
        }
        return true;
    }

    /**
     * Função de requisitadora para cadastrar usuário no sistema.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return bool
     */
    public  static function fnCadastroUsuario ($addLogin): bool {
        if (isset($_POST['uso_nome'], $_POST['uso_login'], $_POST['uso_senha'])) {
            $bCadastradoL =  $addLogin->fnAdicionaLogin(addslashes($_POST['uso_nome']), addslashes($_POST['uso_login']), md5($_POST['uso_senha']), $_POST['uso_adm']);
            if ($bCadastradoL) {
                echo $_POST['uso_nome'] . ", cadastrado(a) com sucesso!";
            } else {
                echo "Erro ao cadastrar, por favor tente novamente.";
            }
        }
        return true;
    }

    public static function fnEditarCargo($oSituacao, $iStoId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sNome = $_POST['cao_nome'];
            $oSituacao->fnEditarCargo($iStoId, $sNome);
            header("Location: /cargo");
        }
    }

    public static function fnEditarEmpresa($oEmpresa, $iStoId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sNome = $_POST['ems_nome'];
            $oEmpresa->fnEditarEmpresa($iStoId, $sNome);
            header("Location: /empresa");
        }
    }


}