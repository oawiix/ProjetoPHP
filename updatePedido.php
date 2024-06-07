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
    $id = $_POST['id'];

    // Define os valores do objeto Pedido
    $pedido->setCliente($cliente);
    $pedido->setProduto($produto);
    $pedido->setDescricao($descricao);
    $pedido->setQuantidade($quantidade);
    $pedido->setValor($valor);
    $pedido->setId($id);

    // Chama o método de atualização do pedido
    $pedido->update();

    // Redireciona para a página de dashboard após a atualização
    header('Location: dashboard.php');
}
?>