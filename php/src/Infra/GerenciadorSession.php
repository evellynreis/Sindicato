<?php

namespace Jade\Avaliacao\Infra;
/**
 * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
 * @package Jade\Avaliacao\Infra
 * @since  1.0.0
 */

/**
 * @var $dado
 */
class GerenciadorSession {

    /**
     * Inicia as sessões.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return void
     */
    public static function fnIniciar() {
        if (session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
    }

    /**
     * Valida se é administrador, para entrar na página.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return void
     */
    public static function fnValidarAdm() {
        self::fnIniciar();

        if (isset($_SESSION['uso_adm']) && $_SESSION['uso_adm'] == 2 ) {
            header("Location: ../home/home.php");
            exit();
        }
    }

    /**
     * Defini quem é o usuário.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return void
     */
    public function fnDefiniUso($dado) {
        self::fnIniciar();
        $aUsuario = current($dado);
        $_SESSION['uso_nome'] = $aUsuario[0];
        $_SESSION['uso_adm'] = $aUsuario[1];
    }

    /**
     * Mensagem de erro.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return void
     */
    public static function fnError() {
        self::fnIniciar();
        $_SESSION['erro_login'] = "Você não pode logar";
    }

    public static function fnSair(){
        self::fnIniciar();
        session_destroy();
        header("location: /login");
        exit();
    }

    public static function deslogado (): bool
    {
        self::fnIniciar();
        return empty($_SESSION);
    }

}