<?php
    if (isset($_SESSION['valid'])) {
        include_once("../../conections/conection.php");
        $result = mysqli_query($conection,"select * from users");
?>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" 
                            class="navbar-toggle collapsed" 
                            data-toggle="collapse" 
                            data-target="#bs-example-navbar-collapse-1" 
                            aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" 
                       href="../home/home.php">
                        Antigomobilista
                    </a>
                </div>
                <div class="collapse navbar-collapse" 
                     id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="../home/home.php">
                                Início
                            </a>
                        </li>
                        <li>
                            <a href="../user/view.php">
                                Pessoas
                            </a>
                        </li>
                        <li>
                            <a href="../posts/view.php">
                                Fotos
                            </a>
                        </li>
                        <li>
                            <a href="../events/view.php">
                                Eventos
                            </a>
                        </li>
                        <?php
                            $adm = "";
                            $login = mysqli_query($conection, "select * from users where iduser=" . $_SESSION['iduser']);
                            while ($log = mysqli_fetch_assoc($login)) {
                                $adm = $log['type'];
                            }
                            if($adm == 1) {
                        ?>
                                <li>
                                    <a href="../gamification/view.php?page=0" onblur>
                                        Gamification
                                    </a>
                                </li>
                                <li>
                                    <a href="../user/view_adm.php?page=0" onblur>
                                        ADM de Pessoal    
                                    </a>
                                </li>                        
                        <?php
                            }
                        ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="../messages/view.php" onblur>
                                Mensagens
                                <div class="circle">
                            
                                </div>
                            </a>
                        </li>
                        <li class="dropdown">
                            <?php
                                $img = mysqli_query($conection, "select * from users where iduser=" . $_SESSION['iduser']);
                            ?>
                            <a href="../user/perfil.php" 
                               class="dropdown-toggle"
                               data-toggle="dropdown"
                               role="button"
                               aria-haspopup="true"
                               aria-expanded="false">
                                <?php
                                    while ($res = mysqli_fetch_array($img)) {
                                ?>
                                <div class="gallery-perfil">
                                    <img src="../../../images/profile/<?php echo $res['image'] ?>" />
                                </div>
                                <?php
                                    }
                                ?>
                                    <?php 
                                        echo $_SESSION['name'] 
                                    ?>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu"
                                role="menu">
                                <li>
                                    <a href="../user/perfil.php">
                                        <span class="glyphicon glyphicon-user" 
                                          title="Página de Login">
                                        </span>
                                        Perfil
                                    </a>
                                    <a href="#">
                                        <span class="glyphicon glyphicon-lock" 
                                          title="Página de Login">
                                        </span>
                                        Alterar Senha
                                    </a>
                                    <a href="../access/logout.php"
                                       onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        <span class="glyphicon glyphicon-log-out" 
                                              title="Página de Login">
                                        </span>
                                        Sair
                                    </a>
                                    <form id="logout-form"
                                          action="../access/logout.php"
                                          method="POST"
                                          style="display: none;">
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12 progress">
                <?php
                    include 'progress_bar.php';
                ?>
            </div>
        </nav>        
<?php
    }
?>