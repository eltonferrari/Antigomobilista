<?php session_start();?>
<html lang="pt-BR">
    <head>
        <title>Entrar</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" 
              content="IE=edge">
        <meta name="viewport" 
              content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" 
              rel="stylesheet"> 
        <link rel="stylesheet" 
              href="../../assets/css/login-register.css">
        <link rel="stylesheet" 
              href="../../assets/css/table-input.css">
        <link rel="stylesheet" 
              href="../assets/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
    </head>
    <body>
        <header>
            <h1 class="log-reg">
                Antigomobilista
            </h1>
        </header>
        <?php include '../template/menu_login_register.php';?>
        <section>
            <div>
                <h1 class="h1-login">
                    Entrar no sistema
                </h1>
            </div>
            <br>
            <div>
                <h2 class="h2-login">
                    *Preencha todos os campos*
                </h2>
            </div>
            <br>
        </section>
        <section class="flex">
            <div>
                <img src="../../images/system/background_2.jpg">
            </div>
            <div>
                <form method="post" 
                      action="process-login.php">
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <td class="right">
                                    <label for="email">
                                        E-mail:
                                    </label>
                                </td>
                                <td class="center">
                                    <input type="email" 
                                           class="campos" 
                                           id="email" 
                                           maxlength="50" 
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
                                    <input type="submit" 
                                        value="Entrar"
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
            <div>
                <img src="../../images/system/background_1.jpg">
            </div>
        </section>
    </body>
</html>