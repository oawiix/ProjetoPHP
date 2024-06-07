<?php include 'conexao.php';
session_start();
if (empty($_SESSION) OR $_SESSION["tipo"] != 1){
    header('Location: dashboard.php');
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

    <!-- Main Content -->
    <main>

        <!-- End of Analyses -->

        <!-- New Users Section -->

        <!-- End of New Users Section -->

        <!-- Recent Orders Table -->
        <h1 style="margin-top:20px">Usuarios</h1>
        <div class="">
        <?php
        $usuarios = $conn->query("SELECT * FROM usuarios ORDER BY id DESC")->fetchAll();
        foreach ($usuarios as $usuario):
            ?>
            <div class="col-md-4">
            <div class="new-users">
                <div class="user-list">
                    <div class="user">
                    <h2><?php echo $usuario['nome']; ?></h2>
                    <p style="margin-top:3px"><?php echo $cargo = $usuario['tipo'] ? "Administrador" : "Colaborador"; ?></p>
                    <p><h3>Data de Criação</h3> <?php echo $usuario['data'] ?></p>
                </div>
                </div>
            </div>
            </div>
        <?php endforeach; ?>
        </div>

    </main>


    <!-- Right Section -->
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
        <!-- End of Nav -->

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
</body>

</html>