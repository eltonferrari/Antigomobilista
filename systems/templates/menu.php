<nav class="navbar navbar-expand-lg navbar-light bg-branco menu-fixed">
    <!-- LOGO -->
    <img src="\img/logo/antigomobilista_logo.png" width="50">
    <?php
        if (!isset($_SESSION['logado'])) {
    ?>
            <a href="\index.php" title="Voltar para o início">
    <?php
        }
    ?>
        <h1 class="font-dancing cor-3 px-2 font-size-24">Antigomobilista</h1>
    <?php
        if (!isset($_SESSION['logado'])) {
    ?>
            </a>
    <?php
        }
        if (isset($_SESSION['logado'])) {
    ?>
            <!-- MENU HAMBURGUER -->
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- NAVEGAÇÃO - ESQUERDA-->
            <div class="collapse navbar-collapse ml-3" id="navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link negrito" href="\systems/visualizacoes/home/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link negrito" href="\systems/visualizacoes/usuarios/pessoas.php">Pessoas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link negrito" href="\systems/visualizacoes/postagens/postagens.php">Fotos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link negrito" href="\systems/visualizacoes/eventos/eventos.php">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link negrito" href="\systems/visualizacoes/mensagens/mensagens.php">Mensagens</a>
                    </li>
                    <?php
                        if (isset($tipo) && $tipo == 1) {
                    ?>
                            <li class="nav-item">
                                <a class="nav-link negrito" href="\systems/visualizacoes/pontuacoes/pontuacoes.php">Pontos</a>
                            </li>
                    <?php
                        }
                    ?>
                </ul>
                <!-- BARRA DE PROGRESSO - CENTRO-->
                <div class="progress bg-dark barra m-auto" title="Nível: <?= $nivel ?> - <?= $pontos ?> pontos">
                    <div class="progress progress-bar bg-cor-3 progress-bar-striped progress-bar-animated barra" style="width: <?= $porcentagem ?>%;"><?= $porcentagem ?>%</div>
                </div>
    <?php
        } 
        if (!isset($_SESSION['logado'])) {
    ?>
            <!-- NAVEGAÇÃO - DIREITA -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link negrito" href="\systems/visualizacoes/autenticacao/login.php">Entrar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link negrito" href="\systems/visualizacoes/autenticacao/registrar.php">Registro</a>
                </li>
            </ul>
    <?php
            
        } else {
    ?>
            <!-- PERFIL COM FOTO E DROPDOWN -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle negrito" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="\<?= $fotoUsuarioLogado ?>" width="40" class="rounded-circle">
                        <span><?= $nomeUsuarioLogado ?></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item negrito cor-1" href="\systems/visualizacoes/usuarios/pessoas.php">Perfil</a>
                        <a class="dropdown-item negrito cor-1" href="\systems/visualizacoes/autenticacao/sair.php">Sair</a>
                    </div>
                </li>   
            </ul>
    <?php
        }
    ?>
    </div>
</nav>