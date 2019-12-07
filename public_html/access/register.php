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
                <div class="box-register">
                    <form name="formInsertUser"
                          method="post" 
                          action="process-register.php">
                        <div class="table-responsive">
                            <table>
                                <tr>
                                    <td class="center" colspan="2">
                                        <h1 class="h1-register">
                                            Registro para novos usuários
                                        </h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="center" colspan="2">
                                        <h2 class="h2-register">
                                            Todos os campos são de preenchimento obrigatório
                                        </h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="right">
                                        <label for="name">
                                            Nome: 
                                        </label>
                                    </td>
                                    <td class="center">
                                        <input type="text" 
                                            class="campos" 
                                            id="name" 
                                            maxlength="50" 
                                            name="name" 
                                            required
                                            autofocus>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="right">
                                        <label for="email">
                                            E-Mail: 
                                        </label>
                                    </td>
                                    <td class="center">
                                    <input type="email" 
                                        class="campos" 
                                        id="email" 
                                        maxlength="40" 
                                        name="email" 
                                        required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="right">
                                        <label for="password">
                                            Senha: 
                                        </label>
                                    </td>
                                    <td class="center">
                                        <input type="password" 
                                            class="campos" 
                                            id="password" 
                                            maxlength="20" 
                                            name="password" 
                                            required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="right">
                                        <label for="repassword">
                                            Repita a senha: 
                                        </label>
                                    </td>
                                    <td class="center">
                                        <input type="password" 
                                            class="campos" 
                                            id="repassword" 
                                            maxlength="20" 
                                            name="repassword" 
                                            required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="right">
                                        <input type="submit" 
                                            value="Cadastrar"
                                            class="btn green">
                                    </td>
                                    <td class="center">
                                        <input type="reset" 
                                            value="Limpar"
                                            class="btn yellow">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>