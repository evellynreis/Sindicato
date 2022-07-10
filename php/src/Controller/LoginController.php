<?php
namespace Jade\Avaliacao\Controller;

/*
* @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
* @package Jade\Avaliacao\Controller
* @since  1.0.0
*/

class LoginController {

    /**
     * Redireciona para a View e cria objetos instanciando funções da Models.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return void
     */
    public function index() {
        $conn = Conexao::conectar()->getConexao();
        include_once __DIR__ . "/../Views/login/login.php";
    }
}

