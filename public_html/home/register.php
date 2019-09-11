<?php 
    session_start(); 
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" 
              content="IE=edge">
        <meta name="viewport" 
              content="width=device-width, initial-scale=1">

        <title>Registrar-se</title>

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
                <div class="col-md-8 col-md-offset-2">
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
                                Registro para novos usuários
                            </font>
                        </div>
                        <div class="panel-body">
                            <?php
                                include("../../conections/DbConnection.php");
                                if (isset($_POST['submit'])) {
                                    $name = $_POST['name'];
                                    $email = $_POST['email'];
                                    $pass = $_POST['password'];
                                    $repass = $_POST['password_confirmation'];
                                    if ($name == "" || $email == "" || $pass == "" || $pass != $repass ){
                            ?>
                                        <font class="bold">
                            <?php
                                            if ($name == "") {
                                                echo "O campo NOME deve ser preenchido.<br />";
                                            }
                                            if ($email == "") {
                                                echo "O campo E-Mail deve ser preenchido.<br />";
                                            }
                                            if ($pass == "") {
                                                echo "O campo SENHA deve ser preenchido.<br />";
                                            }
                                            if ($repass == "") {
                                                echo "O campo CONFIRMAÇÃO DE SENHA deve ser preenchido.<br />";
                                            }
                                            if ($pass != $repass) {
                                                echo "O campo CONFIRMAÇÃO DE SENHA deve ser preenchido conforme<br />"
                                                   . "o preenchimento do campo SENHA.<br />";
                                            }
                                            echo "Por favor clique ";
                                            ?>
                                            <a href="register.php">
                                                aqui
                                            </a>
                                            <?php
                                                echo " e preencha o formulário corretamente.";
                            ?>
                                        </font>
                            <?php            
                                    } else {
                            ?>
                                        <font class="bold">
                            <?php 
                                                mysqli_query($mysqli, "INSERT INTO users(name, email, password) "
                                                                    . "VALUES('$name', '$email', md5('$pass'))")
                                                    or die("Não foi possível registrar novo usuário.");
                                                echo "Registro efetuado com sucesso.";
                                                header('Location: ../entities/home/home.php');
                                            ?>
                                        </font>
                                        <?php
                                    }
                                } else {
                            ?>
                            <form name="formInsertUser"
                                  method="POST" 
                                  action="register.php">
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
                                                    <label for="name">
                                                        <font class="asterisco">
                                                            * 
                                                        </font>
                                                        Nome:
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text"
                                                           name="name" />
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
                                                           name="email" />
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
                                                           name="password" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group label">
                                                    <label for="password-confirm">
                                                        <font size=5 
                                                              color = "red">
                                                            * 
                                                        </font>
                                                        Confirme sua senha:
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="password" 
                                                           name="password_confirmation" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="form-group">
                                                    <button type="submit" 
                                                            name="submit"
                                                            value="Submit"
                                                            class="btn reg">
                                                        <span class="glyphicon gly glyphicon-plus" 
                                                              title="Adicionar novo Registro">
                                                        </span>
                                                        Registre-se
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <?php 
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>