<?php

namespace Jade\Avaliacao\Models;
use Jade\Avaliacao\Controller\Conexao;
use mysqli;

/**
 * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
 * @package Jade\Avaliacao\Models
 * @since  1.0.0
 */

class EmpresaModels{

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
     * Adiciona a empresa no banco de dados
     * @param $ems_nome
     * @return bool
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     */
    public function fnAdicionaEmpresa($ems_nome): bool {
        $loInsereEmpresa = $this->conn->prepare("insert into ems_empresa(ems_nome)
        select ? where not exists (select ems_nome from ems_empresa where ems_nome = ?);");
        $loInsereEmpresa->bind_param('ss', $ems_nome, $ems_nome);
        return $loInsereEmpresa->execute();
    }

    /**
     * Adiciona a empresa.
     * @param $conn
     * @return bool
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     */
    public function fnAdiciona($conn): bool{
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $bCadastradoL = false;

            if (isset($_POST['ems_nome'])) {
                $bCadastradoL =  $this->fnAdicionaEmpresa($_POST['ems_nome']);
            }
        }
        return true;
    }

    /**
     * Seleciona todas as empresas.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return array
     */
    public function fnExibirEmpresa(): array{
        $loResultado = $this->conn->query("SELECT * FROM ems_empresa;");
        $aEmpresas = $loResultado->fetch_all(MYSQLI_ASSOC);

        return $aEmpresas;
    }

    /**
     * Apaga a empresa com o id selecionado.
     * @param $ems_id
     * @return void
     * @since  1.0.0
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     */
    public function fnApagarEmpresa($ems_id): void{
        $loApagado = $this->conn->prepare("DELETE FROM ems_empresa WHERE ems_id = ?");
        $loApagado->bind_param('s', $ems_id);
        $loApagado->execute();
    }

    /**
     * Edita o nome da empresa.
     * @param $ems_id
     * @param $ems_nome
     * @return void
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     */
    public function fnEditarEmpresa($ems_id, $ems_nome): void {
        $loEditado = $this->conn->prepare('UPDATE ems_empresa SET ems_nome = ? WHERE ems_id = ?;');
        $loEditado->bind_param('ss',$ems_nome, $ems_id);
        $loEditado->execute();
    }

    /**
     * Consulta pelo id, o nome da empresa.
     * @param $ems_id
     * @return array
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     */
    public function fnConsultarByIdEmpresa($ems_id): array {
        $loResultado = $this->conn->query("SELECT ems_nome FROM ems_empresa WHERE ems_id = $ems_id;");
        $aEmpresas = $loResultado->fetch_all(MYSQLI_ASSOC);
        return current($aEmpresas);
    }

}
