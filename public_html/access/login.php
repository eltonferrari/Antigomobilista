<html lang="pt-BR">
    <head>
        <title>
            Entrar
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
        <section>
            <div class="form-login">
                <h1 class="h1-login">
                    *Preencha todos os campos*
                </h1>
                <br>
                <form method="post" action="process-login.php">
                    <label for="email">
                        E-mail
                    </label>
                    <br>
                    <input type="email" 
                           class="campos" 
                           id="email" 
                            maxlength="50" 
                           name="email" 
                           required>
                    <br>
                    <label for="password">
                        Senha
                    </label><br>
                    <input type="password" 
                           class="campos" 
                           id="password" 
                           maxlength="20" 
                           name="password" 
                           required>
                    <br><br>
                    <input type="submit" 
                           value="Entrar"
                           class="btn green">
                    <input type="reset" 
                           value="Limpar"
                           class="btn yellow">
                </form>
            </div>
        </section>
    </body>
</html>