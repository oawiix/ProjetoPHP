<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'class/Pedido.php';
    $pedido = new Pedido();

    // Obtém os valores enviados pelo formulário
    $cliente = $_POST['nome'];
    $produto = $_POST['produto'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $valor = $_POST['valor'];

    // Define os valores do pedido
    $pedido->setCliente($cliente);
    $pedido->setProduto($produto);
    $pedido->setDescricao($descricao);
    $pedido->setQuantidade($quantidade);
    $pedido->setValor($valor);

    // Salva o pedido
    $pedido->save();

    // Redireciona para a página de dashboard
    header('Location: dashboard.php');
}
?>