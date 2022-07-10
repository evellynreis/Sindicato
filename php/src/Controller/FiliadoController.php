<?php
namespace Jade\Avaliacao\Controller;
use Jade\Avaliacao\Infra\GerenciadorSession;
use Jade\Avaliacao\Models\FiliadoModels;

/*
* @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
* @package Jade\Avaliacao\Controller
* @since  1.0.0
*/

class FiliadoController {

    /**
     * Redireciona para a View e cria objetos instanciando funções da Models.
     * Paginação em php.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return void
     */
    public function index() {
        $conn = Conexao::conectar()->getConexao();

        if (GerenciadorSession::deslogado()) {
            header("location: /login");
        }

        $pagina= (isset($_GET['pagina'])) ? $_GET['pagina']:1;
        $registroPorPagina = 3;

        $oFiliado = new FiliadoModels(Conexao::conectar());
        $aTdFiliados = $oFiliado->fnExibirFiliados($pagina);

        $total_filiados= $oFiliado->getTotalRegistro();
        $num_pagina = ceil($total_filiados/$registroPorPagina);

        include_once __DIR__ . "/../Views/filiados/filiados.php";
    }


}
