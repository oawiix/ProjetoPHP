<?php
$servername = "localhost"; // Nome do servidor
$username = "root"; // Nome de usuário do banco de dados
$password = ""; // Senha do banco de dados
$dbname = "zteste"; // Nome do banco de dados

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $msgCon = "Conectado com sucesso, Banco de Dados: " . $dbname; // Mensagem exibida quando a conexão é estabelecida com sucesso

} catch(PDOException $e) {
    echo "Falha na conexao, erro: " . $e->getMessage(); // Mensagem exibida em caso de falha na conexão
}
?>
