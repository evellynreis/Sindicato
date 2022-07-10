<?php

namespace Jade\Avaliacao\Controller;
use Jade\Avaliacao\Infra\GerenciadorSession;
use Jade\Avaliacao\Models\SituacaoModels;
use Jade\Avaliacao\Infra\Requisicao;

/*
* @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
* @package Jade\Avaliacao\Controller
* @since  1.0.0
*/

class SituacaoController {

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

        $oAdiciona = new SituacaoModels(Conexao::conectar());
        $oAdiciona->fnAdiciona(Conexao::conectar());

        $aSituacao = new SituacaoModels(Conexao::conectar());
        $aTdSituacoes= $aSituacao->fnExibirSituacao();

        include_once __DIR__ . "/../Views/situacao/situacao.php";
    }

    /**
     * Exclui situação.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return void
     */
    public function excluir() {
        $conn = Conexao::conectar()->getConexao();
        $iStoId = $_GET['sto_id'];
        $oApagado = new SituacaoModels(Conexao::conectar());
        $oApagado->fnApagarSituacao($iStoId);

        if ($oApagado==true) {
            header("Location: /situacao");
        }
    }

    /**
     * Edição de situação, redirecionado pela função editado.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return void
     */
    public function editar() {
        $conn = Conexao::conectar()->getConexao();

        $iStoId = $_POST['sto_id'];
        $oSituacao = new SituacaoModels(Conexao::conectar());
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sNome = $_POST['sto_nome'];
            $oSituacao->fnEditar($iStoId, $sNome);
            header("Location: /situacao");
        }
        include_once __DIR__ . "/../Views/situacao/editar-situacao.php";
    }

    /**
     * A view redireciona para consultar o id da situação.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return void
     */
    public function editado() {
        $conn = Conexao::conectar()->getConexao();

        $iStoId = $_GET['sto_id'];
        $oByNome = new SituacaoModels(Conexao::conectar());
        $aSituacao = $oByNome->fnConsultarById($iStoId);
        include_once __DIR__ . "/../Views/situacao/editar-situacao.php";
    }

}