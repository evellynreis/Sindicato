<?php
require_once 'vendor/autoload.php';
use Jade\Avaliacao\Core\Router;

/**
 * Inicia as rotas.
 * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
 * @since  1.0.0
 */

$rota = $_GET['router'] ?? '';
$oRouter = new Router();




