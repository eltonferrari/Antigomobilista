<?php session_start(); ?>
<html>
    <head>
        <title>
            Novo usuário
        </title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" 
              content="IE=edge">
        <meta name="viewport" 
              content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" 
              href="../../assets/css/style.css"> ​
        <link rel="stylesheet" 
              href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
        <section>
            <div class="form-register">
                <h1 class="h1-register">
                    Registro para novos usuários
                </h1>
                <form name="formInsertUser"
                      method="post" 
                      action="process-register.php">
                      Campos Obrigatórios
                               * Nome:
                                 <input type="text"
                                        name="name" />
                               * E-mail:
                                 <input type="email" 
                                        name="email" />
                               * Senha:
                                 <input type="password" 
                                        name="password" />
                               * Confirme sua senha:
                                 <input type="password" 
                                        name="password_confirmation" />
                                 
                                 
                </form>
                            
        </div>
</section>
    </body>
</html>