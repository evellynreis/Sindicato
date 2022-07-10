<?php

namespace Jade\Avaliacao\Controller;
use Jade\Avaliacao\Models\FiliadoModels;

/**
 * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
 * @package Jade\Avaliacao\Controller
 * @since  1.0.0
 */

class PdfController
{

    /**
     * Inicio, exibe a tabela de filiados.
     * Redireciona para View.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @package Jade\Avaliacao\Controller
     * @since  1.0.0
     */
    public function index(): void {
        $conn = Conexao::conectar()->getConexao();

        $oFiliadoModel = new FiliadoModels(Conexao::conectar());
        $aDados = $oFiliadoModel->fnPdfExibir();

        $sTitulo = 'Relatório de Filiados';

        $pdf = new PDF();
        $pdf->AddPage();
        $pdf-> gerarTabelaFiliado($sTitulo, $aDados);
        $pdf-> Output();

        include_once __DIR__ . "/../Controller/PDF.php";
    }

}