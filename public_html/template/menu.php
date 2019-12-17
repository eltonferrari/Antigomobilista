<?php
    if (isset($_SESSION['valid'])) {
        //including the database connection file
        include_once("../../connections/connection.php");
        $result = mysqli_query($connection, "SELECT * FROM users");
        ?>
        <nav class="navbar navbar-light bg-faded">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
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
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" 
                     id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="../user/view.php">
                                <font class="menu">
                                    Pessoas
                                </font>
                            </a>
                        </li>
                        <li>
                            <a href="../posts/view.php">
                                <font class="menu">
                                    Fotos
                                </font>
                            </a>
                        </li>
                        <li>
                            <a href="../events/view.php">
                                <font class="menu">
                                    Eventos
                                </font>
                            </a>
                        </li>
                        <?php
                            $adm = "";
                            $login = mysqli_query($connection, "SELECT * FROM users WHERE iduser=" . $_SESSION['iduser']);
                            while ($log = mysqli_fetch_assoc($login)) {
                                $adm = $log['type'];
                            }
                            if($adm == 1) {
                        ?>
                                <li>
                                    <a href="../gamification/view.php?page=0" onblur>
                                        <font class="menu">
                                            Gamification
                                        </font>
                                    </a>
                                </li>
                                <li>
                                    <a href="../user/view_adm.php?page=0"  onblur>
                                        <font class="menu">
                                            ADM de Pessoal
                                        </font>
                                    </a>
                                </li>                        
                        <?php
                            }
                        ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="../messages/view.php" onblur>
                                <font class="menu">
                                    Mensagens
                                </font>
                                <div class="circle">
                                    
                                </div>
                            </a>
                        </li>
                        <li class="dropdown">
                            <?php
                                $img = mysqli_query($connection, "SELECT * FROM users WHERE iduser=" . $_SESSION['iduser']);
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
                                    <img src="../../images/perfil/<?php echo $res['image'] ?>" />
                                </div>
                                <?php
                                    }
                                ?>
                                <font class="perfil">
                                    <?php 
                                        echo $_SESSION['name'] 
                                    ?>
                                </font>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu"
                                role="menu">
                                <li>
                                    <a href="../user/perfil.php">
                                        <span class="glyphicon glyphicon-user" 
                                          title="Página de Login">
                                        </span>
                                        <font class="menu">
                                            Perfil
                                        </font>
                                    </a>
                                    <a href="#">
                                        <span class="glyphicon glyphicon-lock" 
                                          title="Página de Login">
                                        </span>
                                        <font class="menu">
                                            Alterar Senha
                                        </font>
                                    </a>
                                    <a href="../../public_html/access/logout.php"
                                       onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        <span class="glyphicon glyphicon-log-out" 
                                              title="Página de Login">
                                        </span>
                                        <font class="menu">
                                            Sair
                                        </font>
                                    </a>
                                    <form id="logout-form"
                                          action="../../public_html/access/logout.php"
                                          method="POST"
                                          style="display: none;">
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>        
<?php
    }
?>