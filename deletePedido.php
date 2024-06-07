<?php 

if (
    $_SERVER['REQUEST_METHOD'] === 'GET' // Verifica se o método da requisição é GET
    && isset($_GET['id']) // Verifica se o parâmetro 'id' está definido na URL
) {
    header("Location: historicopedido.php"); // Redireciona para a página historicopedido.php
    require_once 'class/Pedido.php'; // Inclui o arquivo Pedido.php

    $pedido = new Pedido(); // Cria uma nova instância da classe Pedido

    $id = $_GET['id']; // Obtém o valor do parâmetro 'id' da URL

    $pedido->setId($id); // Define o valor do ID do pedido

    if($pedido->delete()){ // Chama o método delete() do objeto $pedido e verifica se foi bem-sucedido

    }
}
?>
