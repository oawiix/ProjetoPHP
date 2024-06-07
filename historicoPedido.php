<?php include 'conexao.php';
session_start();
if (empty($_SESSION)) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

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

    <?php include 'navbar.php'; ?>
    <!-- End of Sidebar Section -->
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 13;
    $offset = ($page - 1) * $limit;

    $total_rows = $conn->query("SELECT COUNT(*) FROM pedidos WHERE active = 2")->fetchColumn();
    $total_pages = ceil($total_rows / $limit);

    $pedidos = $conn->query("SELECT * FROM pedidos WHERE active = 2 ORDER BY id DESC LIMIT $offset, $limit")->fetchAll();
    ?>
    <!-- Main Content -->
    <main>
        <style>
            .pages {
                text-decoration: none;
                display: flex;
                justify-content: end;
                gap: 20px;
                margin-bottom: -57px;
                margin-top: 40px;
                margin-right: 20px;

            }

            .pages a {
                text-decoration: none;
            }
        </style>
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
        <!-- End of Analyses -->

        <!-- New Users Section -->

        <!-- End of New Users Section -->

        <!-- Recent Orders Table -->

        <div class="recent-orders" style="margin-top: px;">
            <!-- Botão para abrir o pop-up -->
            <h1>Todos os pedidos</h1>

            <!-- O pop-up (inicialmente oculto com display: none) -->

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
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pedidos as $pedido): ?>
                        <tr>
                            <td><?= $pedido["id"] ?> </td>
                            <td><?= $pedido["cliente"] ?> </td>
                            <td><?= $pedido["produto"] ?> </td>
                            <td><?= $pedido["descricao"] ?></td>
                            <td><?= $pedido["quantidade"] ?> </td>
                            <td><b>R$</b> <?= number_format($pedido["valor"], 2, ',', '.') ?> </td>
                            <td>
                                <form action="deletepedido.php" method="GET">
                                    <input type="hidden" name="id" value=<?= $pedido['id'] ?>>
                                    <button style="margin-left: -20px" type="submit" class="btn btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        <!-- End of Recent Orders -->

    </main>
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
            </div>
        </div>
        <!-- Fim Perfil do Usuario -->

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