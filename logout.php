<?php
session_start(); // Inicia a sessão

unset($_SESSION["usuario"]); // Remove a variável de sessão "usuario"
unset($_SESSION["nome"]); // Remove a variável de sessão "nome"
unset($_SESSION["tipo"]); // Remove a variável de sessão "tipo"

session_destroy(); // Destrói a sessão

header('Location: index.php'); // Redireciona para a página "index.php"
?>