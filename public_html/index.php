<?php session_start(); ?>
<html lang="pt-BR">
    <head>
        <title>
            Antigomobilista
        </title>
        <meta charset="utf-8">
        <meta name="viewport" 
              content="width=device-width, initial-scale=1">
        <link rel="stylesheet"
              href="../assets/css/style.css">
        <link rel="stylesheet" 
              href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="flex-center 
                    position-ref 
                    full-height">
            <?php
                if (isset($_SESSION['valid'])) {
                    include("./connection/DbConnection.php");
                    $result = mysqli_query($mysqli, "SELECT * FROM users");
            ?>
                    <div class="top-center
                                links
                                col-md-12">
                        <div class="col-md-4">
                            <a href="entities/home/home.php">
                                <font class="bold-green">
                                    Início
                                </font>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <font class="bold">
                                <?php 
                                    echo $_SESSION['name'] 
                                ?> 
                            </font>
                        </div>
                        <div class="col-md-4">
                            <a href='login_register/logout.php'>
                                <font class="bold-green">
                                    Sair!
                                </font>
                            </a>                        
                        </div>
                    </div>
                    <div class="background col-md-12">
                        .
                        <br /><br /><br /><br /><br />
                        <br /><br /><br /><br /><br />
                        <br /><br /><br /><br /><br />
                        <div class="title" >
                            <font class="bold">
                                ANTIGOMOBILISTA
                            </font>
                        </div>
                    </div>        
            <?php
                } else {
            ?>
                    <div class="top-center
                                links
                                col-md-12">
                        <div class="cabecalho col-md-2"></div>
                        <div class="cabecalho col-md-8">
                            <h4>
                                <font class="cabecalho-index 
                                             bold">
                                    Para entrar e visualizar o sistema Antigomobilista
                                    é necessário ter cadastro conosco.
                                    <br />
                                    Se já possui cadastro clique em 
                                    <a href='login_register/login.php'>
                                        <font class="bold-green">
                                            Acesse aqui
                                        </font>
                                        <span class="glyphicon 
                                                     glyphicon-log-in" 
                                          title="Página de Login">
                                        </span>
                                    </a>
                                    .
                                    <br />
                                    Se ainda não possui cadastro conosco clique em 
                                    <a href='login_register/register.php'>
                                        <font class="bold-green">
                                            Registre-se
                                        </font>
                                        <span class="glyphicon 
                                                     glyphicon-plus" 
                                              title="Página de Registro">
                                        </span>
                                    </a>
                                    .
                                </font>
                            </h4>                            
                        </div>
                        <div class="cabecalho col-md-2"></div>
                        <div class="content col-md-12 background">
                            <font class="facil 
                                         bold">
                                É fácil e rápido.
                                <br />
                            </font>
                            <a href='login_register/login.php'>
                                <span class="glyphicon 
                                             glyphicon-log-in" 
                                      title="Página de Login">
                                </span>
                                <font class="bold-green">
                                    Acesse aqui
                                </font>
                            </a>
                            <font class="cabecalho-index 
                                         bold">
                                ou
                            </font>
                            <a href='login_register/register.php'>
                                <font class="bold-green">
                                    Registre-se
                                </font>
                                <span class="glyphicon 
                                             glyphicon-plus" 
                                      title="Página de Registro">
                                </span>
                            </a>
                            .
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <div class="title" >
                                <font class="bold">
                                    ANTIGOMOBILISTA
                                </font>
                            </div>
                        </div>
                    </div>
            <?php 
                } 
            ?>
        </div>        
    </body>
</html>