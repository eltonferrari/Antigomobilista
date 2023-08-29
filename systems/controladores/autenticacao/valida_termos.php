<?php 
    session_start();
    include '../usuarios/class_usuarios.php';
    
    echo '===== SESSION =====';
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    
    echo '===== POST =====';
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';


    $idUser = $_SESSION['id_user'];
    $aceite = null;
    if (isset($_POST['aceite'])) {
        $aceite = $_POST['aceite'];
        if ($aceite == 'on') {
            $user = new Usuarios();
            $user->editTermosById($idUser);
            $emailValido = $user->getValidaEmailById($idUser);
            if ($emailValido == 0) {
                header("Location: ../../visualizacoes/autenticacao/valida_email.php");
            }
        }
    } else {
        session_destroy();
        header("Location: ../../../index.php");
    }
?>