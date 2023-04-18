<nav class="navbar navbar-expand-lg navbar-light bg-primary menu-fixed">
    <!-- LOGO -->
    <a href="\public_html/index.php" class="navbar-brand">
        <img src="\img/logo/antigomobilista_logo.png" width="70">
    </a>
    <!-- MENU HAMBURGUER -->
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- NAVEGAÇÃO - ESQUERDA-->
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link text-light" href="\systems/visualizacoes/home/home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="\systems/visualizacoes/usuarios/pessoas.php">Pessoas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="\systems/visualizacoes/postagens/postagens.php">Fotos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="\systems/visualizacoes/eventos/eventos.php">Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="\systems/visualizacoes/mensagens/mensagens.php">Mensagens</a>
            </li>
        </ul>
        <!-- BARRA DE PROGRESSO - CENTRO-->
        <div class="progress bg-dark barra m-auto ">
            <div class="progress progress-bar bg-success progress-bar-striped progress-bar-animated barra" style="width: 37%;">37%</div>
        </div>
        <!-- NAVEGAÇÃO - DIREITA -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-light" href="\systems/visualizacoes/autenticacao/login.php">Entrar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="\systems/visualizacoes/autenticacao/registrar.php">Registro</a>
            </li>
        </ul>
        <!-- PERFIL COM FOTO E DROPDOWN -->
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="\img/users/EltonFerrari/Foto 3X3.jpg" width="40" height="40" class="rounded-circle">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="\systems/visualizacoes/usuarios/perfil.php">Perfil</a>
                    <a class="dropdown-item" href="\systems/visualizacoes/autenticacao/sair.php">Sair</a>
                </div>
            </li>   
        </ul>
    </div>
</nav>