<?php
namespace Jade\Avaliacao\Controller;
use Jade\Avaliacao\Infra\GerenciadorSession;
use Jade\Avaliacao\Models\HomeModels;

/*
* @author Evellyn Jade de Cerqueira Reis / jade@moobitech.com.br
* @package Jade\Avaliacao\Controller
* @since  1.0.0
*/
class HomeController {

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

        $oPermissao = new HomeModels(Conexao::conectar());
        $oPermissao->fnPermissao(Conexao::conectar());

        include_once __DIR__ . "/../Views/home/home.php";

    }

    public function sair()
    {
        GerenciadorSession::fnSair();
    }
}



