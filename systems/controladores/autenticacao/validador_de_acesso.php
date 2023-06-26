<?php    
    // Inicia sessão
    session_start();

    // Verifica se sessão está definida como 
    // autenticado, senão envia para index.php
    // para autenticar.
    if($_SESSION['logado'] != '1' ) {
        $_SESSION['mensagem'] = 'Usuário deve ser autenticado para acessar as página internas';
        header("Location: \systems/visualizacoes/autenticacao/login.php");
    }
    // Para menu funcionar
	include '../../controladores/usuarios/class_usuarios.php';
	$tipo = new Usuarios();
	$tipo = $tipo->getTipoById($_SESSION['id_user']);
?>