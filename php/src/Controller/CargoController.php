<?php

namespace Jade\Avaliacao\Controller;
use Jade\Avaliacao\Infra\GerenciadorSession;
use Jade\Avaliacao\Infra\Requisicao;
use Jade\Avaliacao\Models\CargoModels;
use Jade\Avaliacao\Models\UsuarioModels;

/**
* @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
* @package Jade\Avaliacao\Controller
* @since  1.0.0
*/

class CargoController {

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

        $oAdiciona = new CargoModels(Conexao::conectar());
        $oAdiciona->fnAdiciona();

        $aSituacao = new CargoModels(Conexao::conectar());
        $aTdSituacoes= $aSituacao->fnExibirCargo();

        include_once __DIR__ . "/../Views/cargo/cargo.php";


    }

    /**
    * Exclusão de cargo.
    * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
    * @since  1.0.0
    * @return void
    */
    public function excluir() {
        $conn = Conexao::conectar()->getConexao();
        $iStoId = $_GET['cao_id'];
        $oApagado = new CargoModels(Conexao::conectar());
        $oApagado->fnApagarCargo($iStoId);

        if ($oApagado==true) {
            header("Location: /cargo");
        }
    }

    /**
    * Edição de cargo, redirecionado pela função editado.
    * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
    * @since  1.0.0
    * @return void
    */
    public function editar() {
        $conn = Conexao::conectar()->getConexao();
        $iStoId = $_POST['cao_id'];
        $oSituacao = new CargoModels(Conexao::conectar());
        Requisicao::fnEditarCargo($oSituacao, $iStoId);
        include_once __DIR__ . "/../Views/cargo/editar-cargo.php";
    }

    /**
    * A view redireciona para consultar o id do cargo.
    * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
    * @since  1.0.0
    * @return void
    */
    public function editado() {
        $conn = Conexao::conectar()->getConexao();
        $iStoId = $_GET['cao_id'];
        $oByNome = new CargoModels(Conexao::conectar());
        $aSituacao = $oByNome->fnConsultarByIdCargo($iStoId);
        include_once __DIR__ . "/../Views/cargo/editar-cargo.php";
    }

}