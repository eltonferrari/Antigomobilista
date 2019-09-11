<?php session_start(); ?>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Acessar</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" 
              rel="stylesheet" 
              type="text/css">
        <link rel="stylesheet" 
              href="../assets/bootstrap_3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet"
              href="../assets/css/style_indexLogReg.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="../assets/bootstrap_3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="../index.php">
                                <span class="glyphicon glyphicon-home" 
                                      title="Página Inicial">
                                </span>
                                <font class="links">
                                    Página inicial
                                </font>
                            </a>
                            |
                            <a href="login.php">
                                <span class="glyphicon glyphicon-log-in" 
                                      title="Página de Login">
                                </span>
                                <font class="links">
                                    Acesse aqui
                                </font>
                            </a>
                            | 
                            <a href="register.php">
                                <span class="glyphicon glyphicon-plus" 
                                      title="Página de Registro">
                                </span>
                                <font class="links">
                                    Registre-se
                                </font>
                            </a>
                            <br />
                            <br />
                            <font class="title">
                                Entrar
                            </font>
                        </div>
                        <div class="panel-body">
                            <?php
                                include("../../conections/DbConnection.php");
                                if (isset($_POST['submit'])) {
                                    $email = $_POST['email'];
                                    $pass = $_POST['password'];
                                    if ($email == "" || $pass == "") {
                            ?>
                                        <font class="msgm">    
                                            <?php
                                                echo "O campo e-mail ou o campo senha não podem estar vazios.";
                                                echo "<br />Clique em ";
                                            ?>
                                            <a href="login.php">
                                                <span class="glyphicon glyphicon-log-in" 
                                                      title="Página de Login">
                                                </span>
                                                Acesse aqui
                                            </a>
                                            <?php
                                                echo " e tente novamente.<br />Ou clique em ";
                                            ?>
                                            <a href="register.php">
                                                <span class="glyphicon glyphicon-plus" 
                                                      title="Página de Registro">
                                                </span>
                                                Registre-se                                                        
                                            </a>.
                                        </font>
                                        <?php
                                    } else {
                                        $result = mysqli_query($mysqli, "SELECT * "
                                                                      . "FROM users "
                                                                      . "WHERE email='$email' "
                                                                      . "AND password=md5('$pass')")
                                                        or die("Problema ao buscar o usuário no Banco de Dados.");
                                        $row = mysqli_fetch_assoc($result);
                                        if (is_array($row) && !empty($row)) {
                                            $validuser = $row['email'];
                                            $_SESSION['valid'] = $validuser;
                                            $_SESSION['name'] = $row['name'];
                                            $_SESSION['iduser'] = $row['iduser'];
                                        } else {
                                            ?>
                                            <font class="msgm">    
                                                <?php
                                                    echo "E-mail e/ou senha inválidos.";
                                                    echo "<br />Clique em ";
                                                ?>
                                                <a href="login.php">
                                                    <span class="glyphicon glyphicon-log-in" 
                                                          title="Página de Login">
                                                    </span>
                                                    Acesse aqui
                                                </a>
                                                <?php
                                                    echo " e tente novamente.<br />Ou clique em ";
                                                ?>
                                                <a href="register.php">
                                                    <span class="glyphicon glyphicon-plus" 
                                                          title="Página de Registro">
                                                    </span>
                                                    Registre-se
                                                </a>
                                            </font>
                                            <?php
                                        }
                                        if (isset($_SESSION['valid'])) {
                            ?>
                                            <div class="regras">
                                                <font class="regras">
                                                    Olá, 
                                                    <br />
                                                    Você está prestes a entrar no sistema Antigomobilista.
                                                    <br />
                                                    Lembre-se que regras são definidas para uma boa convivência
                                                    entre todos aqueles que usam o sistema. Portanto:
                                                    <br />
                                                    1º Não use palavras inadequadas, palavrões, chingamentos e/ou 
                                                    assemelhados;
                                                    <br />
                                                    2º Lembre-se de sempre colocar, na descrição das fotos, o nome 
                                                    do dono do veículo, peça ou souvenir, alguma referência a quem o 
                                                    ítem pertence e quem fotografou, pois o criador, ou responsáveis,
                                                    pelo sistema não responde por ato(s), publicação(ões), etc, 
                                                    praticados por usuário(s) do sistema, assim como problemas
                                                    referentes a direitos autorais.
                                                    <br />
                                                    3º Por se tratar, a princípio de um trabalho acadêmico, solicitamos
                                                    que acessem no botão "OPINIÃO, SUGESTÕES, CRÍTICAS, ..." e preencham o
                                                    formulário. Este é parte integrante do processo de TCC para conclusão 
                                                    do Curso de Análise e Desenvolvimento de Sistemas, feito no SENAC-RS,
                                                    pelo autor, desenvolvedor do sistema, Elton Ferrari.
                                                    <br />
                                                    Muito agradecido!
                                                </font>
                                            </div>
                                            <?php
                                                $iduser = $_SESSION['iduser'];
                                                $getPoints = mysqli_query($mysqli, "SELECT points "
                                                                                 . "FROM users "
                                                                                 . "WHERE iduser=" . $iduser);
                                                $points = 0;
                                                while ($getP = mysqli_fetch_array($getPoints)) {
                                                    $points = $getP['points'];
                                                }
                                                $points = $points + 1;
                                                $setPoints = mysqli_query($mysqli, "UPDATE users "
                                                                                 . "SET points='$points' "
                                                                                 . "WHERE iduser='$iduser'");

                                            ?>
                                            <div class="table-responsive">
                                                <table class="table-responsive mesage">
                                                    <tr>
                                                        <td class="buttons-message">
                                                            <form action="../entities/home/home.php" method="POST" name="formLogin">
                                                                <button type="submit"   
                                                                        name="submit"
                                                                        value="Submit"
                                                                        class="start 
                                                                               btn">
                                                                    <span class="glyphicon 
                                                                                 glyphicon-log-in"
                                                                          title="Entrar no sistema">
                                                                    </span>
                                                                    <font class="buttons">
                                                                        Entrar
                                                                    </font>
                                                                </button>
                                                            </form>
                                                        </td>
                                                        <td class="buttons-message">
                                                            <a href="https://goo.gl/forms/JH47HLs3JCNPzEyi2">
                                                                <span class="glyphicon 
                                                                             glyphicon-log-in"
                                                                      title="OPINIÃO, SUGESTÕES, CRÍTICAS, ...">
                                                                </span>
                                                                <font class="bold">
                                                                    OPINIÃO, SUGESTÕES, CRÍTICAS, ...
                                                                </font>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                            <?php                                         
                                        }
                                    }
                                } else {
                            ?>
                            <form name="formLoginUser" 
                                  method="POST"
                                  action="">
                                <table class="table-responsive" 
                                       align="center">
                                    <tbody>
                                        <tr>
                                            <td colspan="2">
                                                <div class="t">
                                                    <b>
                                                        <font class="asterisco">
                                                            * 
                                                        </font>
                                                        Campos Obrigatórios
                                                    </b>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>    
                                            <td>
                                                <div class="form-group label">
                                                    <label for="email">
                                                        <font class="asterisco">
                                                            * 
                                                        </font>
                                                        E-mail:
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="email"
                                                           name="email">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group label">
                                                    <label for="password">
                                                        <font class="asterisco">
                                                            * 
                                                        </font>
                                                        Senha:
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="password" 
                                                           name="password">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="form-group label">
                                                    <label>
                                                        <input type="checkbox" 
                                                               name="remember">
                                                            Lembrar meu login
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="form-group">
                                                    <button type="submit" 
                                                            name="submit"
                                                            value="Submit" 
                                                            class="btn log">
                                                        <span class="glyphicon gly glyphicon-log-in" 
                                                              title="Adicionar novo Registro">
                                                        </span>
                                                        Entrar
                                                    </button>
                                                </div>
                                                <a href="#">
                                                    <font class="links">
                                                        Esqueceu sua senha?
                                                    </font>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                    <?php 
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>