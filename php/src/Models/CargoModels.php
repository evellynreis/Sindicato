<?php

namespace Jade\Avaliacao\Models;
use Jade\Avaliacao\Controller\Conexao;
use mysqli;

/**
 * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
 * @package Jade\Avaliacao\Models
 * @since  1.0.0
 */

class CargoModels{

    //relacionando o banco de dados com o artigo
    private $conn;

    /**
     * Função construtora usando a conexão.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     */
    public function __construct(Conexao $conn) {
        $this->conn = $conn;
    }

    /**
     * Insere o cargo no banco de dados.
     * @param $cao_nome
     * @return bool
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     */
    public function fnAdicionaCargo($cao_nome): bool {
        $loInsereSituacao = $this->conn->prepare("insert into cao_cargo(cao_nome)
        select ? where not exists (select cao_nome from cao_cargo where cao_nome = ?);");

        $loInsereSituacao->bind_param('ss', $cao_nome, $cao_nome);
        return $loInsereSituacao->execute();
    }

    /**
     * Adiciona o cargo.
     * @return bool
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     */
    public function fnAdiciona(): bool{
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $bCadastradoL = false;

            if (isset($_POST['cao_nome'])) {
                $bCadastradoL =  $this->fnAdicionaCargo($_POST['cao_nome']);
            }
        }
        return true;
    }

    /**
     * Seleciona todos os cargos.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return array
     */
    public function fnExibirCargo(): array{
        $loResultado = $this->conn->query("SELECT * FROM cao_cargo;");
        $aSituacoes = $loResultado->fetch_all(MYSQLI_ASSOC);

        return $aSituacoes;
    }

    /**
     * Apaga o cargo do banco de dados
     * @param $cao_id
     * @return void
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     */
    public function fnApagarCargo($cao_id): void{
        $loApagado = $this->conn->prepare("DELETE FROM cao_cargo WHERE cao_id = ?");
        $loApagado->bind_param('s', $cao_id);
        $loApagado->execute();
    }

    /**
     * Edita o cargo do banco de dados.
     * @param $cao_id
     * @param $cao_nome
     * @return void
     * @since  1.0.0
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     */
    public function fnEditarCargo($cao_id, $cao_nome): void {
        $loEditado = $this->conn->prepare('UPDATE cao_cargo SET cao_nome = ? WHERE cao_id = ?;');
        $loEditado->bind_param('ss',$cao_nome, $cao_id);
        $loEditado->execute();
    }

    /**
     * Consulta pelo id, o nome do cargo
     * @param $cao_id
     * @return array
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     */
    public function fnConsultarByIdCargo($cao_id): array {
        $loResultado = $this->conn->query("SELECT cao_nome FROM cao_cargo WHERE cao_id = $cao_id;");
        $aSituacoes = $loResultado->fetch_all(MYSQLI_ASSOC);
        return current($aSituacoes);
    }

}
