<?php
    session_start();
    include 'class_pontuacoes.php';

    echo '===== SESSION =====';
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    
    echo '===== POST =====';
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    $idCriador = $_SESSION['id_user'];
    $qtddNiveis = $_POST['qtdd_niveis'];
    $niveis = new Pontuacoes();
    for ($i = 0; $i < $qtddNiveis; $i ++) {
        $niveis->insertNovoNivel($idCriador);
    }
    header("Location: ../../visualizacoes/pontuacoes/pontuacoes.php");
?>  