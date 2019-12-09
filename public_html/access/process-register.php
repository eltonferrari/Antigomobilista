<?php
    session_start();
    include("../../conections/conection.php");
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $repass = $_POST['password_confirmation'];
?>
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
                <section>
                    <h1>Cadastro</h1>
                    <hr>
                    <br>
                    <br>
<?php
        if ($pass == $repass) {
            $sql = "insert into users(name, email, password) 
                    values('$name', '$email', md5('$pass'))";
            $save = mysqli_query($mysqli,$sql);
            $lines = mysqli_affected_rows($conection);
            mysqli_close($conection);
            if($lines == 1) {
                print "Cadastro efetuado com sucesso!!!";
            } else {
                print "Cadastro NÃO efetuado.<br>Já existe um usuário com este E-MAIL!!!";
            }
        } else {
            print "A senha deve ser digitada e confirmada!";
            print "Por favor clique no link abaixo e refassa seu cadastro!";
?>
        <a href="register.php">Refazer cadastro</a>
<?php
        }
    }
?>
                </section>
            </body>
        </html>