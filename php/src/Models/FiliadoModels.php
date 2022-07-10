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

class FiliadoModels {

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
     * Adiciona o filiado no banco de dados.
     * @param $flo_nome
     * @param $flo_cpf
     * @param $flo_rg
     * @param $flo_dt_nascimento
     * @param $flo_idade
     * @param $ems_id
     * @param $cao_id
     * @param $sto_id
     * @param $flo_telefone
     * @param $flo_celular
     * @return bool
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     */
    public function fnAdicionaFiliado($flo_nome, $flo_cpf, $flo_rg, $flo_dt_nascimento, $flo_idade, $ems_id, $cao_id, $sto_id, $flo_telefone, $flo_celular): bool {
        $oDataAtualizacao = new DateTimeImmutable("now");
        $flo_dt_atualizacao = $oDataAtualizacao->format("Y-m-d");
        $loInsereFiliado = $this->conn->prepare('insert into flo_filiado(flo_nome, flo_cpf, flo_rg, 
                        flo_dt_nascimento, flo_idade, ems_id, cao_id, sto_id,flo_telefone, flo_celular, 
                        flo_dt_atualizacao) 
        select ?,?,?,?,?,?,?,?,?,?,? where not exists (select flo_cpf from flo_filiado where flo_cpf = ?);');

        $loInsereFiliado->bind_param('ssssssssssss', $flo_nome, $flo_cpf, $flo_rg, $flo_dt_nascimento, $flo_idade, $ems_id, $cao_id, $sto_id, $flo_telefone, $flo_celular, $flo_dt_atualizacao, $flo_cpf);
        return $loInsereFiliado->execute();
    }

    /**
     * Exibi o filiado seguindo o parametro solicitado.
     * @param $pagina
     * @param $registroPorPagina
     * @return array
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @package Jade\Avaliacao\Models
     * @since  1.0.0
     */
    public function fnExibirFiliados($pagina): array {
        $pagina--;
        $totalpagina = $pagina*3;
        $totalregistro = $totalpagina+3;

        $sNome = addslashes($_POST['filtro_nome'] ?? '') ;
        $sMes = addslashes($_POST['filtro_mes'] ?? '');
        $sAddMes = '';
        if (!empty($sMes)) {
            $sAddMes .= "and month(flo_dt_nascimento) = $sMes";
        }

        $sSql = "SELECT flo_nome, flo_cpf, flo_rg, flo_dt_nascimento, flo_idade, ems_id,  cao_id, sto_id, flo_telefone, flo_celular, flo_dt_atualizacao 
                 FROM flo_filiado 
                 WHERE flo_nome like '$sNome%' 
                 $sAddMes ORDER BY 1 
                 LIMIT $totalpagina, $totalregistro;";
        $loResultado = $this->conn->query($sSql);
        $aFiliados = $loResultado->fetch_all(MYSQLI_ASSOC);

        return $aFiliados;
    }

    public function fnPdfExibir(): array {
        $sSql = "SELECT flo_nome, flo_cpf, flo_rg, flo_dt_nascimento 
                 FROM flo_filiado ORDER BY 1;";
        $loResultado = $this->conn->query($sSql);
        $aFiliados = $loResultado->fetch_all(MYSQLI_ASSOC);
        return $aFiliados;
    }

    /**
     * Total de Registro
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     */
    public function getTotalRegistro(){
        return $this->conn->getTotalRegistro('flo_filiado');
    }

}