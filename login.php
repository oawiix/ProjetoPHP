<?php
session_start();

if(empty($_POST) or empty($_POST['usuario']) or empty($_POST['senha'])){
    header('Location: index.php');
    // Redireciona para a página index.php se o formulário estiver vazio ou se os campos de usuário e senha estiverem vazios.
}

include 'conexao.php';

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$escolha = $_POST['escolha'];

$sql = "SELECT * FROM usuarios 
WHERE usuario = '{$usuario}' 
AND senha = '{$senha}'";

$result = $conn->query($sql);

$row = $result->fetchObject();

$qtd = $result->rowCount();

if($qtd > 0){
    $_SESSION["usuario"] = $usuario;
    $_SESSION["nome"] = $row->nome;
    $_SESSION["tipo"] = $row->tipo;
    //header('Location: dashboard.php');
    switch ($escolha) {
        case '1':
            header ('Location: dashboard.php');
            break;
        case '2':
            header ('Location: historicoPedido.php');
            break;
        case '3':
            header ('Location: usersPage.php');
            break;
        default:
            echo "Você não escolheu nenhuma opção";
            break;
    }
    // Se a quantidade de registros encontrados for maior que zero, armazena as informações do usuário na sessão e redireciona para a página dashboard.php.
}else{
    header('Location: indexw.php');
    // Caso contrário, redireciona para a página indexw.php.
}


?>