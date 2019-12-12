<?php session_start();
    include_once("../../conections/conection.php");
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $repass = $_POST['repassword'];
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
                      href="../../assets/css/style.css"> ​
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
            <section class="section-center">
                    <h1 class="title-p-r">Cadastro</h1>
                    <hr>
                    <br>
                    <br>
<?php
        if ($pass == $repass) {
            $sql = "insert into users(name, email, password) 
                    values ('$name', '$email', md5('$pass'))";
            $save = mysqli_query($conection, $sql);
            $lines = mysqli_affected_rows($conection);            
            if($lines == 1) {
?>
                <h1 class="msg-register">
                Cadastro efetuado com sucesso!
                <br><br>
<?php
                $sql = "select * from users where email='$email' and password=md5('$pass')";
                $result = mysqli_query($conection, $sql);
                $row = mysqli_fetch_assoc($result);
                if (is_array($row) && !empty($row)) {
                    $validuser = $row['email'];
                    $_SESSION['valid'] = $validuser;
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['iduser'] = $row['iduser'];
                    mysqli_close($conection);
?>
                    <a href="../home/home.php">ENTRAR NO<br><br>ANTIGOMOBILISTA</a>
<?php
                }
            } else {
?>                
                <h1 class="msg-register">
                    Cadastro NÃO efetuado.
                    <br><br>
                    Já existe um usuário com este E-MAIL!
                    <br><br>
                    Por favor, refaça o CADASTRO.
                    <br><br>
                    <a href="register.php">Refazer cadastro</a>
                </h1>
<?php
            }
        } else {
?>            
            <h1 class="msg-register">
                A senha deve ser digitada e confirmada!
                <br><br>
                Por favor clique no link abaixo e refassa seu cadastro!
                <br><br>
                <a href="register.php">Refazer cadastro</a>
            </h1>
<?php
        }
    
?>
                </section>
            </body>
        </html>