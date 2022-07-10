<?php

namespace Jade\Avaliacao\Models;
use DateTimeImmutable;
use Jade\Avaliacao\Controller\Conexao;
use mysqli;


/**
 * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
 * @package Jade\Avaliacao\Models
 * @since  1.0.0
 */

class DependenteModels
{
    //relacionando o banco de dados com o artigo
    private $conn;

    /**
     * Função construtora
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return void
     */
    public function __construct(Conexao $conn) {
        $this->conn = $conn;
    }

    /**
     * Adiciona dependente ao banco de dados.
     * @param $dpe_nome
     * @param $dpe_dt_nascimento
     * @param $dpe_grau_parentesco
     * @return bool
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     */
    public function fnAdicionaDependente($dpe_nome, $dpe_dt_nascimento, $dpe_grau_parentesco): bool {
        $loInsereDependente = $this->conn->prepare('insert into dpe_dependente(dpe_nome, dpe_dt_nascimento, dpe_grau_parentesco) values (?,?,?)');
        $loInsereDependente->bind_param('sss', $dpe_nome, $dpe_dt_nascimento, $dpe_grau_parentesco);
        return $loInsereDependente->execute();
    }
    
    

}