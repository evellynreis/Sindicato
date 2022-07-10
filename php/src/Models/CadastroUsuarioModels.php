<?php
namespace Jade\Avaliacao\Models;
use Jade\Avaliacao\Controller\Conexao;
use Jade\Avaliacao\Infra\GerenciadorSession;
use Jade\Avaliacao\Infra\Requisicao;

/**
 * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
 * @package Jade\Avaliacao\Models
 * @since  1.0.0
 */

class CadastroUsuarioModels {

    /**
     * @var Conexao
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
     * Vê se o usuário tem permissão para entrar na página.
     * Caso ele tenha permissão, pode cadastrar usuário.
     * @param $conn
     * @return bool
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     */
    public function fnPermissao(Conexao $conn): bool {
        GerenciadorSession:: fnValidarAdm();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $addLogin = new UsuarioModels(Conexao::conectar());
            $bCadastradoL = false;

            Requisicao::fnCadastroUsuario($addLogin);

        }
        return true;
    }

}