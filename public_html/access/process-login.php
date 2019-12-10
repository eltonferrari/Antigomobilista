<?php session_start();
    include_once("../../conections/conection.php");

    if (isset($_POST['submit'])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = "select * from users where email='.$email.' and password=md5('$password')";
        $result = mysqli_query($conection, $sql);
        $row = mysqli_fetch_assoc($result);
        if (is_array($row) && !empty($row)) {
            $validuser = $row['email'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['name'] = $row['name'];
            $_SESSION['iduser'] = $row['iduser'];
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
                        <h1>Cadastro</h1>
                        <hr>
                        <br>
                        <br>
                        <a href="../home/home.php">Continuar</a>
                    </section>
                </body>
            </html>
<?php
        }
    }
    mysqli_close($conection);
?>