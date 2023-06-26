<?php 
    session_start();
    include '../usuarios/class_usuarios.php';
    
    echo '===== POST =====';
    echo '<pre>';
        print_r($_POST);
    echo '</pre>';

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = (md5($_POST['senha']));

    $user = new Usuarios();
    $msgUser = null;
    $usuario = new Usuarios();
    $usuario = $usuario->getUsuarioByEmail($email);
    if (empty($usuario)) {
        $user = $user->addUsuario($nome, $email, $senha);
        $_SESSION['email'] = $email;
        $_SESSION['logado'] = 1;
        $_SESSION['nome'] = $nome;
        $_SESSION['id_user'] = $user;
        header("Location: ../../visualizacoes/home/home.php");
    } else {
        $_SESSION['mensagem'] = "O usuário $email já existe no sistema.";
        $_SESSION['logado'] = 0;
        header("Location: ../../visualizacoes/autenticacao/registrar.php");
    }
?>