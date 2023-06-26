<nav class="navbar navbar-expand-lg navbar-light bg-branco menu-fixed">
    <!-- LOGO -->
        <img src="\img/logo/antigomobilista_logo.png" width="50">
        <h1 class="font-dancing cor-3 px-2 font-size-24">Antigomobilista</h1>    
    <?php 
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
                        <a class="nav-link" href="\systems/visualizacoes/home/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="\systems/visualizacoes/usuarios/pessoas.php">Pessoas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="\systems/visualizacoes/postagens/postagens.php">Fotos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="\systems/visualizacoes/eventos/eventos.php">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="\systems/visualizacoes/mensagens/mensagens.php">Mensagens</a>
                    </li>
                    <?php
                        if (isset($tipo) && $tipo == 1) {
                    ?>
                            <li class="nav-item">
                                <a class="nav-link" href="\systems/visualizacoes/pontuacoes/pontuacoes.php">Pontos</a>
                            </li>
                    <?php
                        }
                    ?>
                </ul>
                <!-- BARRA DE PROGRESSO - CENTRO-->
                <div class="progress bg-dark barra m-auto" title="Nível: <?= $nivel ?> - <?= $pontos ?> pontos">
                    <div class="progress progress-bar bg-info progress-bar-striped progress-bar-animated barra" style="width: <?= $porcentagem ?>%;"><?= $porcentagem ?>%</div>
                </div>
    <?php
        } 
        if (!isset($_SESSION['logado'])) {
    ?>
            <!-- NAVEGAÇÃO - DIREITA -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="\systems/visualizacoes/autenticacao/login.php">Entrar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="\systems/visualizacoes/autenticacao/registrar.php">Registro</a>
                </li>
            </ul>
    <?php
            
        } else {
    ?>
            <!-- PERFIL COM FOTO E DROPDOWN -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="\img/users/EltonFerrari/Foto 3X3.jpg" width="40" height="40" class="rounded-circle">
                        <span><?= $nome ?></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="\systems/visualizacoes/usuarios/perfil.php">Perfil</a>
                        <a class="dropdown-item" href="\systems/visualizacoes/autenticacao/sair.php">Sair</a>
                    </div>
                </li>   
            </ul>
    <?php
        }
    ?>
    </div>
</nav>