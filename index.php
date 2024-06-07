<?php include 'conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Login | Projeto PHP</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form action="login.php" method="POST">
                <h1>Identifique-se</h1>
                <span>Insira um nome de usuario</span><br>
                <input type="text" id="formName" name="usuario" placeholder="Nome de Usuario">
                <input type="password" id="formName" name="senha" placeholder="Senha">
                <button type="submit" class="btn btn-outline-primary" style="padding:10px; padding-left: 120px; padding-right:120px; font-size:15px; margin-top: 7px" > Entrar </button>
                <p>Pagina após Login</p>
                <select name="escolha" id="escolha" style="border-radius: 5px; padding:5px">
                    <option value="1">Dashboard</option>
                    <option value="2">Historico</option>
                    <option value="3">Usuarios</option>
                </select>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-wrench-adjustable-circle-fill" viewBox="0 0 16 16">
                        <path d="M6.705 8.139a.25.25 0 0 0-.288-.376l-1.5.5.159.474.808-.27-.595.894a.25.25 0 0 0 .287.376l.808-.27-.595.894a.25.25 0 0 0 .287.376l1.5-.5-.159-.474-.808.27.596-.894a.25.25 0 0 0-.288-.376l-.808.27z"/>
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m-6.202-4.751 1.988-1.657a4.5 4.5 0 0 1 7.537-4.623L7.497 6.5l1 2.5 1.333 3.11c-.56.251-1.18.39-1.833.39a4.5 4.5 0 0 1-1.592-.29L4.747 14.2a7.03 7.03 0 0 1-2.949-2.951M12.496 8a4.5 4.5 0 0 1-1.703 3.526L9.497 8.5l2.959-1.11q.04.3.04.61"/>
                      </svg>
                      <br>
                    <h1 style="font-weight: 800;">Projeto PHP</h1>
                    <p style="color: white;">Gerenciamento de Pedidos<br>
                        <b style="color: white;">GRAFICA</b></p>
                    <p style="margin-bottom: -100px;
                    margin-top: 60px;">
                    <b style="color: white;">Felipe | Julia</b></p>  
                </div>
            </div>
        </div>
    </div>
    <br>
    <?= $msgCon ?>
</body>
</html>
