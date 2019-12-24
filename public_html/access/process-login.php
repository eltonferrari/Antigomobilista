<?php 
    session_start();
    include '../../public_html/users/users_control.php';
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $result = getByLogin($email, $pass);
    $row = mysqli_fetch_assoc($result);
?>    
    <!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <title>Novo usuário</title>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" 
                  content="IE=edge">
            <meta name="viewport" 
                  content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" 
                  rel="stylesheet"> 
            <link rel="stylesheet" 
                  href="../../assets/css/login-register.css"> ​
            <link rel="stylesheet" 
                  href="../../assets/css/table-input.css"> ​
            <link rel="stylesheet" 
                  href="../assets/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="../assets/js/bootstrap.min.js"></script>
        </head>
        <body>
            <header>
                <section>
                    <div>
                        <ul>
                            <li>
                                <a href="../index.php" title="Página Inicial">
                                    <span class="glyphicon glyphicon-home" title="Página Inicial"></span>
                                    Página inicial
                                </a>
                            </li>
                            <li>
                                <a href="login.php" title="Página de Login">
                                    <span class="glyphicon glyphicon-log-in" title="Página de Login"></span>
                                    Acesse aqui
                                </a>
                            </li>
                            <li>
                                <a href="register.php" title="Página de Registro">
                                    <span class="glyphicon glyphicon-plus" title="Página de Registro"></span>
                                    Registre-se
                                </a>
                            </li>
                        </ul>
                    </div>
                </section>
            </header>
            <hr>
            <?php    
                if (is_array($row) && !empty($row)) {
                    $validuser = $row['email'];
                    $_SESSION['valid'] = $validuser;
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['iduser'] = $row['iduser'];
            ?>
                    <section class="section-center">
                        <h1 class="msg-login">
                            Login efetuado com sucesso!
                            <br><br>
                            <a href="../home/home.php">
                                ENTRAR NO
                                <br><br>
                                ANTIGOMOBILISTA
                            </a>
                        </h1>
                    </section>
            <?php
                } else {
            ?>
                    <section class="section-center">
                        <h1 class="msg-login">
                            Usuário não cadastrado
                            <br>
                            <a href="register.php">
                                Registrar novo usuário?
                            </a>
                            <br>
                            ou
                            <br>
                            Senha incorreta
                            <br>
                            <a href="login.php">
                                Entrar com a senha correta?
                            </a>                            
                            <br>
                        </h1>
                    </section>
            <?php
                }
            ?>
        </body>
    </html>