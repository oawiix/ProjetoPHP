

    <div class="containeer">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    </svg> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-wrench-adjustable-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M6.705 8.139a.25.25 0 0 0-.288-.376l-1.5.5.159.474.808-.27-.595.894a.25.25 0 0 0 .287.376l.808-.27-.595.894a.25.25 0 0 0 .287.376l1.5-.5-.159-.474-.808.27.596-.894a.25.25 0 0 0-.288-.376l-.808.27z" />
                        <path
                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m-6.202-4.751 1.988-1.657a4.5 4.5 0 0 1 7.537-4.623L7.497 6.5l1 2.5 1.333 3.11c-.56.251-1.18.39-1.833.39a4.5 4.5 0 0 1-1.592-.29L4.747 14.2a7.03 7.03 0 0 1-2.949-2.951M12.496 8a4.5 4.5 0 0 1-1.703 3.526L9.497 8.5l2.959-1.11q.04.3.04.61" />
                    </svg>
                    <h2>Projeto<span class="primary">PHP</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a>
                    <h1><b>Painel</b></h1>
                </a>
                <a href="dashboard.php" class="">
                    <span class="material-icons-sharp">
                        insights
                    </span>
                    <h3>Geral</h3>
                </a>
                <a href="historicopedido.php">
                    <span class="material-icons-sharp">
                        receipt_long
                    </span>
                    <h3>Historico</h3>
                </a>
                <?php if($_SESSION['tipo'] == 1) { ?>
                <a href="userspage.php">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Usuarios</h3>
                </a>
                <?php }  ?>
                <!-- <a href="#">
                    <span class="message-count">0</span>
                    <h3>Mensagens</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Vendas</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                    <h3>Relatorios</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                    <h3>Config</h3>
                </a> -->
                <?php if($_SESSION['tipo'] == 1) { ?>
                <a href="addUser.php">
                    <span class="material-icons-sharp">
                        add
                    </span>
                    <h3>Adicionar<br>Usuario</h3>
                </a>
                <?php }  ?>
                <a href="logout.php" style="background-color: transparent; margin-top:12px" type="submit">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3 style="margin-top: 8px">Sair</h3>
                </a>
            </div>
        </aside>