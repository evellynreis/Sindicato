<?php
namespace Jade\Avaliacao\Controller;
use mysqli;

/**
* @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
* @package Jade\Avaliacao\Controller
* @since  1.0.0
*/

class Conexao {

    /**
     * Dados da conexão.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return void
     */
    public $host = 'db';
    public $user = 'root';
    public $password = '2022';
    public $db='jade';
    public $conn;
    private $totalLinhas;
    private static $oConexao;

    private function __construct()
    {
        $this->conn = new mysqli($this->host,$this->user,$this->password, $this->db);
        $this->conn -> set_charset('utf8');

        if($this->conn == false) {
            echo 'Falha na conexão';
        }
    }

    /**
     * Conecta com a conexão.
     * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
     * @since  1.0.0
     * @return Conexao
     */
    public static function conectar(): Conexao {
        if (empty(self::$oConexao)){
            self::$oConexao=new Conexao();
        }
        return self::$oConexao;
    }

    /**
    * Pega a conexão.
    * @author Evellyn Jade de Cerqueira Reis jade@moobitech.com.br
    * @since  1.0.0
    * @return void
    */
    public function getConexao() {
        return $this->conn;
    }

    public function prepare(string $sql): \mysqli_stmt{
        return $this->conn->prepare($sql);
    }

    public function query(string $sql): \mysqli_result
    {
        return $this->conn->query($sql);
    }

    public function getTotalRegistro(string $sTabela): int {
        $sRecebe = "SELECT COUNT(*) as total FROM $sTabela;";
        $mysqlresult = $this->query($sRecebe);
        $aResultado = $mysqlresult->fetch_array(MYSQLI_ASSOC);
        return $aResultado['total'];
    }
}