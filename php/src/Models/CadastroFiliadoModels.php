<?php
namespace Jade\Avaliacao\Models;
use Jade\Avaliacao\Controller\Conexao;
use Jade\Avaliacao\Infra\Requisicao;

/**
 * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
 * @package Jade\Avaliacao\Models
 * @since  1.0.0
 */

class CadastroFiliadoModels {

    /**
     * Adiciona Filiado e Dependente no banco de dados.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return void
     */
    public function fnAdiciona(){
        Requisicao::fnAdicionaFilDep(Conexao::conectar());
    }

}