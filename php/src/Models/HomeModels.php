<?php
namespace Jade\Avaliacao\Models;
use Jade\Avaliacao\Controller\Conexao;
use Jade\Avaliacao\Infra\Requisicao;

/**
 * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
 * @package Jade\Avaliacao\Models
 * @since  1.0.0
 */

class HomeModels {

    /**
     * Verifica permissão para entrar na View home.
     * @param $conn
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return void
     */
    public function fnPermissao(Conexao $conn): void {
        $permissao = false;
        $usuario= new UsuarioModels(Conexao::conectar());

        $oPermissao= new Requisicao(Conexao::conectar());
        $oPermissao->fnPermissaoUso($usuario, Conexao::conectar());
    }

}