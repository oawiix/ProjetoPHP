<?php 

if (
    $_SERVER['REQUEST_METHOD'] === 'GET' // Verifica se o método da requisição é GET
    && isset($_GET['id']) // Verifica se o parâmetro 'id' está definido na URL
) {
    header("Location: dashboard.php"); // Redireciona para a página 'dashboard.php'
    require_once 'class/Pedido.php'; // Inclui o arquivo 'Pedido.php'
    $pedido = new Pedido(); // Cria uma nova instância da classe 'Pedido'

    $id = $_GET['id']; // Obtém o valor do parâmetro 'id' da URL

    if($pedido->noActive($id)){ // Verifica se o pedido não está ativo
        header("Location: dashboard.php"); // Redireciona para a página 'dashboard.php'
    }
}
?>
