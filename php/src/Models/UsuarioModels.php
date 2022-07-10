<?php

namespace Jade\Avaliacao\Models;
use Jade\Avaliacao\Controller\Conexao;
use Jade\Avaliacao\Infra\GerenciadorSession;
use mysqli;

/**
 * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
 * @package Jade\Avaliacao\Models
 * @since  1.0.0
 */

class UsuarioModels
{

    //relacionando o banco de dados com o artigo
    private $conn;

    /**
     * Função construtora.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return void
     */
    public function __construct(Conexao $conn) {
        $this->conn = $conn;
    }

    /**
     * Cadastra o usuário.
     * @param $uso_nome
     * @param $uso_login
     * @param $uso_senha
     * @param $uso_adm
     * @return bool
     * @since  1.0.0
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     */
    public function fnAdicionaLogin($uso_nome, $uso_login, $uso_senha, $uso_adm): bool {
        $loInsereLogin = $this->conn->prepare('insert into uso_usuario (uso_nome, uso_login, uso_senha, uso_adm) values (?,?,?,?);');
        $loInsereLogin->bind_param('ssss', $uso_nome, $uso_login, $uso_senha, $uso_adm);
        return $loInsereLogin->execute();
    }

    /**
     * Validação de usuário.
     * @param $uso_login
     * @param $uso_senha
     * @param $conn
     * @return bool
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     */
    public function fnValidacao($uso_login, $uso_senha, $conn): bool {
        $loValida = $conn->prepare("select uso_nome, uso_adm from uso_usuario where uso_login = ? and uso_senha = ?;");
        $loValida->bind_param('ss', $uso_login, $uso_senha);
        $loValida->execute();

        $validado = $loValida->execute();
        $resultSet = $loValida->get_result();
        $dado = $resultSet->fetch_all();

        $iTotal = count($dado);
        if ($iTotal > 0) {
            GerenciadorSession::fnIniciar();
            $oUsu = new GerenciadorSession();
            $oUsu ->fnDefiniUso($dado);
            return true;

        } else {
            GerenciadorSession::fnIniciar();
            GerenciadorSession::fnError();
            return false;
        }
    }

}