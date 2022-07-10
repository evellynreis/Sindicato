<?php

namespace Jade\Avaliacao\Core;

/**
 * @author Evellyn Jade de Cerqueira Reis / jade@moobitech.com.br
 * @package Jade\Avaliacao\Core
 * @since  1.0.0
 */

class Router {

    private string $sClasse;
    private string $sController;

    /**
     * Construtor da rota
     * @author Evellyn Jade de Cerqueira Reis / jade@moobitech.com.br
     * @since  1.0.0
     */
    public function __construct()
    {
        try {
            $aRouter = $this->validarRequisicao();
            if (file_exists('./src/Controller/'. ucfirst($aRouter[0]) . 'Controller.php')) {
                $this-> sController = ucfirst($aRouter[0] . 'Controller');
                $this-> sClasse = 'Jade\\Avaliacao\\Controller\\' . $this ->sController;
                $oObjeto = new $this-> sClasse;
                if (isset($aRouter[1]) && method_exists($oObjeto, $aRouter[1])) {
                    $sMetodo = $aRouter[1];
                } else {
                    $sMetodo = 'index';
                }
                $oObjeto-> $sMetodo();
            } else {
                http_response_code(404);
                die();
            }
        } catch (\Exception $e) {
            echo $e-> getMessage();
        }
    }

    /**
     * Valida a rota.
     * @author Evellyn Jade de Cerqueira Reis / jade@moobitech.com.br
     * @since  1.0.0
     */
    protected function validarRequisicao(): array{
        return explode('/', filter_input(INPUT_GET, 'router', FILTER_SANITIZE_URL));
    }

}