<?php
namespace Jade\Avaliacao\Controller;
use FPDF;

require('fpdf/fpdf.php');

/**
 * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
 * @package Jade\Avaliacao\Controller
 * @since  1.0.0
 */

class PDF extends FPDF {

    private $conn;

    /**
     * Modelo de cabeçalho
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return void
     */
    function Header() {
        $this->Image('src/Views/images/logo.png', 10, 10, 40);
        $this->SetFont('Times', 'B', 15);
        $this->Cell(80);
        $this->Cell(30, 10, 'Lista dos filiados em Ordem Alfabetica:', 0, 0, 'C');
        $this->Ln(20);
    }

    /**
     * Gerador da tabela
     * @param string $sTitulo
     * @param array $aDados
     * @return void
     * @since  1.0.0
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     */
    public function gerarTabelaFiliado(string $sTitulo, array $aDados): void {
        $this-> SetTitle($sTitulo, true);
        $this-> SetFillColor(50,205,50);
        $this-> SetFont('Times');

        $aColuna = ['Filiado(a)', 'CPF', 'RG', 'Data de Nascimento'];
        foreach ($aColuna as $sColuna) {
            $this-> Cell( 47, 7, $sColuna, 1, '0', 'C');
        }
        $this-> Ln();
        foreach ($aDados as $aLinha)
        {
            $this-> Cell(47, 7, utf8_decode($aLinha['flo_nome']), '1', '0', 'C');
            $this-> Cell(47, 7, $aLinha['flo_cpf'], '1', '0', 'C');
            $this-> Cell(47, 7, $aLinha['flo_rg'], '1', '0', 'C');
            $this-> Cell(47, 7, $aLinha['flo_dt_nascimento'], '1', '0', 'C');
            $this-> Ln();
        }
    }

    /**
     * Cria o footer
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return void
     */
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}


