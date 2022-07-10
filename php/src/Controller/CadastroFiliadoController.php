<?php
namespace Jade\Avaliacao\Controller;
use Jade\Avaliacao\Infra\GerenciadorSession;
use Jade\Avaliacao\Models\CadastroFiliadoModels;
use Jade\Avaliacao\Models\CargoModels;
use Jade\Avaliacao\Models\EmpresaModels;
use Jade\Avaliacao\Models\SituacaoModels;

/**
* @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
* @package Jade\Avaliacao\Controller
* @since  1.0.0
*/

class CadastroFiliadoController {

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

        $oAdiciona = new CadastroFiliadoModels();
        $oAdiciona->fnAdiciona();

        $aEmpresa = new EmpresaModels(Conexao::conectar());
        $aTdEmpresas= $aEmpresa->fnExibirEmpresa();

        $aCargo = new CargoModels(Conexao::conectar());
        $aTdCargos= $aCargo->fnExibirCargo();

        $aSituacao = new SituacaoModels(Conexao::conectar());
        $aTdSituacoes= $aSituacao->fnExibirSituacao();

        include_once __DIR__ . "/../Views/cadastro/cadastroFiliado.php";
    }
}