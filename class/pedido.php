<?php
include_once 'conBd.php';
class Pedido extends conBd{
    private $conn;
    private $id;
    private $cliente;
    private $produto;
    private $descricao;
    private $quantidade;
    private $valor;
    private $active;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "zteste";



    public function __construct() {
        // Create an instance of the conBd class
        $conBd = new conBd();

        // Get the connection object
        $this->conn = $conBd->getConnection();
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function setProduto($produto) {
        $this->produto = $produto;
    }

    public function getProduto() {
        return $this->produto;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setActive($active) {
        $this->active = $active;
    }

    public function getActive() {
        return $this->active;
    }
    // Outros métodos da classe...
    public function save() {
        // Salvar o pedido no banco de dados
        $sql = "INSERT INTO pedidos (cliente, produto, descricao, quantidade, valor) VALUES (:cliente, :produto, :descricao, :quantidade, :valor)";

        // Prepare the PDO statement
        $stmt = $this->conn->prepare($sql);
    
        // Bind the parameters
        $stmt->bindParam(':cliente', $this->cliente);
        $stmt->bindParam(':produto', $this->produto);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':quantidade', $this->quantidade);
        $stmt->bindParam(':valor', $this->valor);
    
        // Execute the statement
        $stmt->execute();
    }

    public function update() {
        // Atualizar o pedido no banco de dados
        $sql = "UPDATE pedidos SET cliente = :cliente, produto = :produto, descricao = :descricao, quantidade = :quantidade, valor = :valor WHERE id = :id";

        // Prepare the PDO statement
        $stmt = $this->conn->prepare($sql);
    
        // Bind the parameters
        $stmt->bindParam(':cliente', $this->cliente);
        $stmt->bindParam(':produto', $this->produto);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':quantidade', $this->quantidade);
        $stmt->bindParam(':valor', $this->valor);
        $stmt->bindParam(':id', $this->id);
    
        // Execute the statement
        $stmt->execute();
    }

    public function delete() {
        // Deletar o pedido no banco de dados
        $sql = "DELETE FROM pedidos WHERE id = :id";

        // Prepare the PDO statement
        $stmt = $this->conn->prepare($sql);
    
        // Bind the parameters
        $stmt->bindParam(':id', $this->id);
    
        // Execute the statement
        $stmt->execute();
    }

    public function noActive($id) {
        // Deletar o pedido no banco de dados
        $sql = "UPDATE pedidos SET active = 2 WHERE id = $id";

        // Prepare the PDO statement
        $stmt = $this->conn->prepare($sql);
    
        // Bind the parameters
    
        // Execute the statement
        $stmt->execute();
    }
}
