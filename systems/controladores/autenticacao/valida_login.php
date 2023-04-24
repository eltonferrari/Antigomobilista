<?php 
    session_start();
    include '../usuarios/class_usuarios.php';
    
    echo '===== POST =====';
    echo '<pre>';
        print_r($_POST);
    echo '</pre>';

    $email = $_POST['email'];
    $senha = (md5($_POST['senha']));

    $usuario = new Usuarios();
    $usuario = $usuario->getUsuarioByEmail($email);
    if (empty($usuario)) {
        $msgUser = "Usuário e/ou Senha inválidos!";
        $_SESSION['mensagem'] = $msgUser;
        $_SESSION['logado'] = 0;
        header("Location: ../../visualizacoes/autenticacao/login.php");
    } else {
        foreach ($usuario  as $user) {
            if ($email == $user['email'] && $senha == $user['senha']) {
                $_SESSION['logado'] = 1;
                $_SESSION['id_logado'] = $user['id'];
                header("Location: ../../visualizacoes/home/home.php");
            } else {
                $msgUser = "Usuário e/ou Senha inválidos!";
                $_SESSION['mensagem'] = $msgUser;
                $_SESSION['logado'] = 0;
                header("Location: ../../visualizacoes/autenticacao/login.php");
            }
        }
    }
?>