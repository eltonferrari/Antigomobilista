<?php
	session_start();
	include 'class_usuarios.php';
	date_default_timezone_set('America/Sao_Paulo');

	$idUser = $_POST['id_user'];
    $nome = $_POST['nome'];
    $updatedAt = new DateTime('now');
    $dataAtual = $updatedAt->format('Y-m-d H:i:s');
    $alteraNome = new Usuarios();
	$alteraNome->alteraNomeById($nome, $dataAtual , $idUser);
	$msgAlteraNome = "Nome alterado com sucesso!";
    $_SESSION['msgAlteraNome'] = $msgAlteraNome;
?>
	<meta http-equiv="refresh" content="0;url=../../visualizacoes/usuarios/alterar_perfil.php?id_user=<?= $idUser ?>">
<?php
?>