<?php session_start();
// Verifica se a sessão está vazia e redireciona para a página de login
if (empty($_SESSION)) {
    header('Location: index.php');
}
// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';
// Obtém o ID do pedido da URL e verifica se existe
$id = filter_input(INPUT_GET, 'id');
if ($id) {
    // Executa a consulta para obter os dados do pedido com base no ID
    $sql = $conn->query("SELECT * FROM pedidos WHERE id = $id");
    $pedido = $sql->fetch(PDO::FETCH_ASSOC);
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <title>Editar | Projeto PHP</title>
</head>
<?php include 'navbar.php'; ?>
<style>
    input {
        margin-left: 20px;
    }
</style>
<main>
    <h2><h1>Editando pedido</h1><h2>ID do Pedido: <?= $pedido['id'] ?></h2>
    <!-- Formulário de edição do pedido -->
    <div>
        <form style=" margin-top: 150px; font-size: 25px; " action="updatepedido.php" method="POST">

            <span style="margin-left: 25px;"><b>NOME</b></span>
            <input type="text" name="nome" value="<?= $pedido['cliente'] ?>" style="padding: 5px;"><br><br>

            <span style="margin-left: 25px;"><b>PRODUTO</b></span>
            <input type="text" name="produto" value="<?= $pedido['produto'] ?>" style="padding: 5px;"><br><br>

            <span style="margin-left: 25px;"><b>DESCRIÇÃO</b></span>
            <input type="text" name="descricao" value="<?= $pedido['descricao'] ?>" style="padding: 5px"><br><br>

            <span style="margin-left: 25px;"><b>QUANTIDADE</b></span>
            <input type="number" name="quantidade" value="<?= $pedido['quantidade'] ?>" value="1" min="1" style="padding: 5px;">

            <button id="incrementButton" class="btn btn-outline-primary" type="button"
                style="margin-left: 20px; padding: 10px">+</button>

            <button id="decrementButton" class="btn btn-outline-primary" type="button"
                style="padding: 10px">-</button><br><br>

            <span style="margin-left: 25px;"><b>VALOR</b><span style="margin-left: 30px">R$</span>
            <input type="number" step="0.01" name="valor" value="<?= $pedido['valor'] ?>" style="padding: 5px;"><br><br>
            <input type="hidden" name="id" value=<?= $pedido['id'] ?>>

            <a class="btn btn-danger" type="button" href="dashboard.php"
                style="padding: 15px; padding-left: 40px; padding-right: 40px; margin-left: 25px; margin-top: 25px;">Cancelar</a>

            <button class="btn btn-outline-primary" type="submit"
                style="padding: 15px; padding-left: 50px; padding-right: 50px; margin-left: 25px; margin-top: 25px;">Editar</button>
        </form>
        <script>
            // Função para incrementar a quantidade
            document.getElementById('incrementButton').addEventListener('click', function () {
                var input = document.getElementsByName('quantidade')[0];
                input.value++;
            });

            // Função para decrementar a quantidade
            document.getElementById('decrementButton').addEventListener('click', function () {
                var input = document.getElementsByName('quantidade')[0];
                if (input.value > 1)
                    input.value--;
            });

        </script>

    </div>
</main>

<div class="right-section">
    <div class="nav">
        <div class="profile">
            <div class="info">
                <p>Ola, <b>
                        <?php echo $_SESSION["nome"] ?>
                    </b></p>
                <small class="text-muted"><?php echo date("Y-m-d"); ?></small>
            </div>
        </div>
    </div>
    <!-- Perfil do usuário logado -->
    <div style="margin-top:22px" class="user-profile">
        <div class="usuario-logado">
            <h2>
                <?php echo $_SESSION["nome"] ?>
            </h2>
            <p>
                <?php if ($_SESSION["tipo"] == 1) {
                    echo "Administrador";
                } else {
                    echo "Funcionario";
                }

                ?>
            </p>
        </div>
    </div>
    </s>
    <div class="reminders">
        <div class="header">
            <h2>Lembretes</h2>
            <span class="material-icons-sharp">
                notifications_none
            </span>
        </div>

        <div class="notification">
            <div class="icon">
                <span class="material-icons-sharp">
                    edit
                </span>
            </div>
            <div class="content">
                <div class="info">
                    <h3>Exemplo #1</h3>
                    <small class="text_muted">
                        15/06/24 | 16:00 - 21:00
                    </small>
                </div>
                <span class="material-icons-sharp">
                    more_vert
                </span>
            </div>
        </div>

        <div class="notification deactive">
            <div class="icon">
                <span class="material-icons-sharp">
                    edit
                </span>
            </div>
            <div class="content">
                <div class="info">
                    <h3>Exemplo #2</h3>
                    <small class="text_muted">
                        15/06/24 | 08:00 - 12:00
                    </small>
                </div>
                <span class="material-icons-sharp">
                    more_vert
                </span>
            </div>
        </div>

        <div class="notification add-reminder">
            <div>
                <span class="material-icons-sharp">
                    add
                </span>
                <h3>Adicionar Lembrete</h3>
            </div>
        </div>

    </div>

</div>


</div>
</section>

