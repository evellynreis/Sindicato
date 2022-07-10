<?php

namespace Jade\Avaliacao\Models;
use Jade\Avaliacao\Controller\Conexao;
use mysqli;

class SituacaoModels{

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
     * Adiciona situação no banco de dados.
     * @param $sto_nome
     * @return bool
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     */
    public function fnAdicionaSituacao($sto_nome): bool {
        $loInsereSituacao = $this->conn->prepare("insert into sto_situacao(sto_nome)
        select ? where not exists (select sto_nome from sto_situacao where sto_nome = ?);");
        $loInsereSituacao->bind_param('ss', $sto_nome, $sto_nome);
        return $loInsereSituacao->execute();
    }

    /**
     * Adiona situação.
     * @param Conexao $conn
     * @return bool
     * @since  1.0.0
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     */
    public function fnAdiciona(Conexao $conn): bool{
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $addSituacao= new SituacaoModels(Conexao::conectar());
            $bCadastradoL = false;

            if (isset($_POST['sto_nome'])) {
                $bCadastradoL =  $addSituacao->fnAdicionaSituacao($_POST['sto_nome']);
            }
        }
        return true;
    }

    /**
     * Seleciona todas as situações.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     */
    public function fnExibirSituacao(): array{
        $loResultado = $this->conn->query("SELECT * FROM sto_situacao;");
        $aSituacoes = $loResultado->fetch_all(MYSQLI_ASSOC);

        return $aSituacoes;
    }

    /**
     * Apaga a situação com o id selecionado.
     * @author Evellyn Jade de Cerqueira Reis / jade@moobitech.com.br
     * @since  1.0.0
     */
    public function fnApagarSituacao($sto_id): void{
        $loApagado = $this->conn->prepare("DELETE FROM sto_situacao WHERE sto_id = ?");
        $loApagado->bind_param('s', $sto_id);
        $loApagado->execute();
    }

    /**
     * Edita a situação.
     * @param $sto_id
     * @param $sto_nome
     * @return void
     * @since  1.0.0
     * @author Evellyn Jade de Cerqueira Reis / jade@moobitech.com.br
     */
    public function fnEditar($sto_id, $sto_nome): void {
        $loEditado = $this->conn->prepare('UPDATE sto_situacao SET sto_nome = ? WHERE sto_id = ?;');
        $loEditado->bind_param('ss',$sto_nome, $sto_id);
        $loEditado->execute();
    }

    /**
     * Seleciona situação na qual o id foi indicado.
     * @param $sto_id
     * @return array
     * @author Evellyn Jade de Cerqueira Reis / jade@moobitech.com.br
     * @since  1.0.0
     */
    public function fnConsultarById($sto_id): array {
        $loResultado = $this->conn->query("SELECT sto_nome FROM sto_situacao WHERE sto_id = $sto_id;");
        $aSituacoes = $loResultado->fetch_all(MYSQLI_ASSOC);
        return current($aSituacoes);
    }

}
