<?php

namespace Jade\Avaliacao\Controller;
use Jade\Avaliacao\Infra\GerenciadorSession;
use Jade\Avaliacao\Infra\Requisicao;
use Jade\Avaliacao\Models\EmpresaModels;

/**
* @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
* @package Jade\Avaliacao\Controller
* @since  1.0.0
*/

class EmpresaController {

    /**
     * Redireciona para a View e cria objetos instanciando funções da Models.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return void
     */
    public function index() {
        $conn = Conexao::conectar()->getConexao();

        if (GerenciadorSession::deslogado()) {
            header("location: /login");
        }

        $oAdiciona = new EmpresaModels(Conexao::conectar());
        $oAdiciona->fnAdiciona($conn);

        $aEmpresa = new EmpresaModels(Conexao::conectar());
        $aTdEmpresas= $aEmpresa->fnExibirEmpresa();

        include_once __DIR__ . "/../Views/empresas/empresas.php";
    }

    /**
     * Exclui Empresa.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return void
     */
    public function excluir() {
        $conn = Conexao::conectar()->getConexao();
        $iStoId = $_GET['ems_id'];
        $oApagado = new EmpresaModels(Conexao::conectar());
        $oApagado->fnApagarEmpresa($iStoId);

        if ($oApagado==true) {
            header("Location: /empresa");
        }
    }

    /**
     * Edição de empresa, redirecionado pela função editado.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return void
     */
    public function editar() {
        $conn = Conexao::conectar()->getConexao();

        $iStoId = $_POST['ems_id'];
        $oEmpresa = new EmpresaModels(Conexao::conectar());
        Requisicao::fnEditarEmpresa($oEmpresa, $iStoId);
        include_once __DIR__ . "/../Views/empresas/editar-empresas.php";
    }

    /**
     * A view redireciona para consultar o id do cargo.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return void
     */
    public function editado() {
        $conn = Conexao::conectar()->getConexao();

        $iStoId = $_GET['ems_id'];
        $oByNome = new EmpresaModels(Conexao::conectar());
        $aEmpresa = $oByNome->fnConsultarByIdEmpresa($iStoId);
        include_once __DIR__ . "/../Views/empresas/editar-empresas.php";
    }

}