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
