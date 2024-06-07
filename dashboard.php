<?php include 'conexao.php'; // Inclui o arquivo de conexão com o banco de dados
session_start(); // Inicia a sessão
if (empty($_SESSION)) { // Verifica se a sessão está vazia
    header('Location: index.php'); // Redireciona para a página index.php
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <title>Painel | Projeto PHP</title>
</head>

<body>

    <?php include 'navbar.php'; // Inclui o arquivo navbar.php ?>
    <!-- End of Sidebar Section -->
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 7;
    $offset = ($page - 1) * $limit;

    $total_rows = $conn->query("SELECT COUNT(*) FROM pedidos WHERE active = 1")->fetchColumn();
    $total_pages = ceil($total_rows / $limit);

    $pedidos2 = $conn->query("SELECT * FROM pedidos WHERE active = 1 ORDER BY id DESC LIMIT $offset, $limit")->fetchAll();
    ?>
    <style>
        .pages {
            text-decoration: none;
            display: flex;
            justify-content: end;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
            margin-top: -40px;
            margin-right: 20px;


        }

        .pages a {
            text-decoration: none;
        }
    </style>
    <!-- PO-6.2 (Switch) -->
    <?php $fonte = '1';
    switch ($fonte) {
        case '1': ?>
            <style>
                * {
                    font-family: JetBrains Mono;
                }
            </style>
            <?php break; ?>
    <?php } ?>
    <!-- Main Content -->
    <main>
        <h1 style="margin-top:20px">Analise</h1>
        <!-- Analyses -->
        <div class="analyse">
            <div class="sales">
                <div class="status">
                    <div style="margin-left: -10px;">
                        <h3>Vendas</h3>
                        <h1>
                            <?php
                            $total = 0;
                            $pedidos = $conn->query("SELECT valor FROM pedidos WHERE active = 2")->fetchAll();
                            foreach ($pedidos as $pedido) {
                                $total += $pedido["valor"];
                            }
                            echo "Total: R$ " . number_format($total, 2, ',', '.');
                            ?>
                        </h1>
                        <span style="margin-left:10px;">
                            <?php
                            $total = 0;
                            $pedidos = $conn->query("SELECT valor FROM pedidos WHERE active = 1")->fetchAll();
                            foreach ($pedidos as $pedido) {
                                $total += $pedido["valor"];
                            }
                            echo "Em andamento: R$ " . number_format($total, 2, ',', '.');
                            ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="visits">
                <div class="status">
                    <div class="info">
                        <h3>Pedidos Concluidos</h3>
                        <h1>
                            <?php
                            $total = 0;
                            $pedidos = $conn->query("SELECT id FROM pedidos WHERE active = 2")->fetchAll();
                            foreach ($pedidos as $pedido) {
                                $total += 1;
                            }
                            echo $total;
                            ?>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="searches">
                <div class="status">
                    <div class="info">
                        <h3>Pedidos em Andamento</h3>
                        <h1>
                            <?php
                            $total = 0;
                            $pedidos = $conn->query("SELECT id FROM pedidos WHERE active = 1")->fetchAll();
                            foreach ($pedidos as $pedido) {
                                $total += 1;
                            }
                            echo $total;
                            ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- End of Analyses -->

        <!-- Recent Orders Table -->

        <div class="recent-orders" style="padding:10px">
            <!-- Botão para abrir o pop-up -->
            <h2>Pedidos Ativos<button id="openFormButton" class="btn btn-outline-primary" type="button"
                    style="margin-left: 15px; margin-bottom: 2px;">Adicionar</button></h2>
        </div>

        <div class="pages">
            <?php if ($total_pages > 1): ?>
                <?php if ($page > 1): ?>
                    <a href="?page=<?= $page - 1 ?>">Anterior</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <?php if ($i == $page): ?>
                        <span><b><?= $i ?></b></span>
                    <?php else: ?>
                        <a href="?page=<?= $i ?>"><?= $i ?></a>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php if ($page < $total_pages): ?>
                    <a href="?page=<?= $page + 1 ?>">Proximo</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <div class="recent-orders">
            <!-- O pop-up (inicialmente oculto com display: none) -->
            <div id="opentesteform" class="popup" style="display: none;
                    position: fixed;
                    width: 425px;
                    box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
                    height: 475px;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    padding: 25px;
                    border-radius: 15px;
                    background-color: #fff;">
                <div>
                    <div>
                        <!-- Formulario para adicionar um novo produto -->
                        <form id="testeform" action="addpedido.php" method="POST">
                            <h1>Adicionar um novo produto</h1>
                            <span style="margin-left: 25px;"><b>NOME</b></span>
                            <input type="text" name="nome" placeholder="Nome do Cliente" style="padding: 15px;"
                                required><br>

                            <span style="margin-left: 25px;"><b>PRODUTO</b></span>
                            <input type="text" name="produto" placeholder="..." style="padding: 15px;" required><br>

                            <span style="margin-left: 25px;"><b>DESCRIÇÃO</b></span>
                            <input type="text" name="descricao" placeholder="Detalhes" style="padding: 15px;"><br>

                            <span style="margin-left: 25px;"><b>QUANTIDADE</b></span>
                            <input type="number" name="quantidade" placeholder="1" value="1" min="1"
                                style="padding: 15px;"><br>

                            <button id="incrementButton" class="btn btn-outline-primary" type="button"
                                style="margin-left:25px;">+</button>

                            <button id="decrementButton" class="btn btn-outline-primary" type="button"
                                style="">-</button>

                            <button id="incrementButton10x" class="btn btn-outline-primary" type="button"
                                style="">+5</button>

                            <button id="decrementButton10x" class="btn btn-outline-primary" type="button"
                                style="">-5</button><br>

                            <span style="margin-left: 25px;"><b>VALOR</b></span>
                            <input type="number" step="0.01" name="valor" placeholder="R$ "
                                style="padding: 15px;"><br><br>

                            <button class="btn btn-danger" id="closeFormButton" type="button"
                                style="padding-left: 155px; padding-right: 155px; padding:10px">Cancelar</button>

                            <button id="adicionarButton" class="btn btn-outline-primary" type="submit"
                                style="padding-right: 108px; padding-top: 10px; padding-bottom: 10px; padding-left: 108px;">Adicionar</button>
                        </form>
                        <!-- Script para incremento e decremento da Quantidade -->
                        <script>

                            document.getElementById('incrementButton10x').addEventListener('click', function () {
                                for (var i = 0; i < 5; i++) {
                                    var input = document.getElementsByName('quantidade')[0];
                                    input.value++;
                                }
                            });

                            document.getElementById('incrementButton').addEventListener('click', function () {
                                var input = document.getElementsByName('quantidade')[0];
                                input.value = parseInt(input.value) + 1;
                            });

                            document.getElementById('decrementButton10x').addEventListener('click', function () {
                                for (var i = 0; i < 5; i++) {
                                    var input = document.getElementsByName('quantidade')[0];
                                    if (input.value > 1)
                                        input.value--;
                                }
                            });

                            document.getElementById('decrementButton').addEventListener('click', function () {
                                var input = document.getElementsByName('quantidade')[0];
                                if (input.value > 1)
                                    input.value = parseInt(input.value) - 1;
                            });
                        </script>
                        <!-- Fim do Script -->
                    </div>

                </div>
            </div>
            <!-- Script para mostrar ou esconder o Pop-up -->
            <script>
                document.getElementById('openFormButton').addEventListener('click', function () {
                    document.getElementById('opentesteform').style.display = 'block'; // Mostra o pop-up
                });
                document.getElementById('closeFormButton').addEventListener('click', function () {
                    document.getElementById('opentesteform').style.display = 'none'; // Esconde o pop-up
                });
                document.getElementById('adicionarButton').addEventListener('click', function () {
                    document.getElementById('opentesteform').style.display = 'none'; // Esconde o pop-up
                });
            </script>
            <!-- Fim do Script -->

            <!-- Inicio Pedidos Recentes -->
            <!-- Tabela com Pedidos -->
            <!-- Cabecalho da Tabela  -->
            <table border="1" id="testetable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CLIENTE</th>
                        <th>PRODUTO</th>
                        <th>DESCRIÇÃO</th>
                        <th>QUANTIDADE</th>
                        <th>VALOR</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <div>
                    <!-- Corpo da Tabela -->
                    <tbody>
                        <!-- Foreach para apresentar todos os resultados na tabela -->
                        <?php
                        foreach ($pedidos2 as $pedido): ?>
                            <div>
                                <tr>
                                    <td><?= $pedido["id"] ?> </td>
                                    <td><?= $pedido["cliente"] ?> </td>
                                    <td><?= $pedido["produto"] ?> </td>
                                    <td><?= $pedido["descricao"] ?></td>
                                    <td><?= $pedido["quantidade"] ?> </td>
                                    <td><b>R$</b> <?= number_format($pedido["valor"], 2, ',', '.') ?> </td>
                                    <td>
                                        <!-- Edicao do Conetudo -->
                                        <a style="text-decoration: none;"
                                            href="updatepage.php?id=<?= $pedido['id'] ?>">Editar</a>
                                    </td>
                                    <td>
                                        <!-- Tornar o pedido inativo -->
                                        <form action="noactivepedido.php" method="GET">
                                            <input type="hidden" name="id" value=<?= $pedido['id'] ?>>
                                            <button style="margin-left: -20px" type="submit"
                                                class="btn btn-success">Concluir</button>

                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                    </tbody>
            </table>
            <!-- Fim da Tabela com Pedidos -->
            <a href="historicopedido.php" style="text-decoration: none;">Mostrar tudo</a>
        </div>
        <!-- Fim Pedidos Recentes -->

    </main>
    <!-- Fim do Main -->

    <!-- Conteudo da Direia -->

    <!-- Nome do Usuario + Cargo e Hora -->
    <div class="right-section">
        <div class="nav">
            <div class="profile">
                <div class="info">
                    <p>Ola, <b>
                            <!-- Usuario  -->
                            <?php echo $_SESSION["nome"] ?>
                        </b></p>
                    <!-- Hora -->
                    <small class="text-muted"><?php echo date("Y-m-d"); ?></small>
                </div>
            </div>
        </div>
        <!-- Fim do Nome do Uusuario + Cargo e Hora  -->

        <!-- Perfil do Usuario -->
        <div style="margin-top:22px" class="user-profile">
            <div class="usuario-logado" style="margin-top:10px">
                <!-- Usuario -->
                <h2>
                    <?php echo $_SESSION["nome"] ?>
                </h2>
                <!-- Cargo -->
                <p>
                    <?php $modo = $_SESSION["tipo"] == 1 ? "Administrador" : "Colaborador";
                    echo $modo;
                    ?>
                </p>
                <button id="fonte">teste</button>
            </div>
        </div>
        <!-- Fim Perfil do Usuario -->
        <script>
            document.getElementById('fonte').addEventListener('click', function () {
                var fonte = $fonte;
                if (fonte == '1') {
                    $fonte = '2';
                } else {
                    $fonte = '1';
                }
            });
        </script>
        <!-- Lembretes - Nao finalizado -->
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



        <!-- Fim Lembretes - Nao finalizado -->
        </section>

</body>

</html>