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
        $_SESSION['mensagem'] = "Usuário e/ou Senha inválidos!";
        $_SESSION['logado'] = 0;
        header("Location: ../../visualizacoes/autenticacao/login.php");
    } else {
        foreach ($usuario as $user) {
            $id = $user['id'];
            $termosCondicoes = $user['termos_condicoes'];
            $confirmEmail = $user['confirm_email'];
            $senhaBanco = $user['senha'];
        }
        if ($termosCondicoes == 0) {
            $_SESSION['mensagem'] = "Você deve aceitar os Termos e Condições, no final da página, para poder entrar no Sistema!";
            $_SESSION['id_user'] = $id;
            header("Location: ../../visualizacoes/autenticacao/termos_condicoes.php");
        } else if ($confirmEmail == 0) {
            $_SESSION['mensagem'] = "Você deve confirmar o e-mail: $email em sua caixa de e-mails para poder entrar no Sistema!";
            //header("Location: ../../visualizacoes/autenticacao/valida_email.php");
        } else if ($senha != $senhaBanco) {
            $_SESSION['mensagem'] = "Usuário e/ou Senha inválidos!";
            //header("Location: ../../visualizacoes/autenticacao/login.php");
        } else {
            $_SESSION['logado'] = 1;
            $_SESSION['id_user'] = $id;
            //header("Location: ../../visualizacoes/home/home.php");
        }
    }      
?>