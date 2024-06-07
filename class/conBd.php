<?php

class conBd {
    private $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "zteste";


    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $msgCon = "Conectado com sucesso, Banco de Dados: " . $this->dbname;
        } catch(PDOException $e) {
            echo "Falha na conexao, erro: " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
