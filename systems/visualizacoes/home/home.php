<?php 
	include '../../controladores/autenticacao/validador_de_acesso.php';
	
	// MENU ================================================================
	include '../../controladores/pontuacoes/class_pontuacoes.php';
	$usuario = new Usuarios();
	$nivel = new Usuarios();
	$porcentagem = new Pontuacoes();
	$usuario = $usuario->getUsuarioById($_SESSION['id_user']);
	foreach ($usuario as $user) {
		$foto = $user['imagem'];
		$nome = $user['nome'];
		$pontos = $user['pontos'];
	}
	$nivel = $nivel->getNivelByIdUser($_SESSION['id_user']);
	$porcentagem = $porcentagem->getPorcentagemById($_SESSION['id_user']);
	// =====================================================================
?>
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<!-- Required meta tags -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- COMPATIBILIDADE COM HTML5 -->
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
		<![endif]-->

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../../../assets/Bootstrap4/css/bootstrap.min.css">

		<!-- NORMALIZE CSS -->
		<link   rel="stylesheet" type="text/css" href="../../../assets/css/normalize.css">

		<!-- CSS CUSTOMIZADO -->
		<link rel="stylesheet" href="../../../assets/css/style.css">
		
		<!-- JAVASCRIPT CUSTOMIZADO -->
		<script src="../../../assets/js/script.js"></script>

		<!-- add icon link -->
        <link rel="icon" href="../../../img/logo/antigomobilista_logo.png" type="image/x-icon">
		
		<title>Antigomobilista - Home</title>
	</head>
    <body id="wallpaper-1">
        <header>
			<?php include '../../../systems/templates/menu.php'; ?>
		</header>
		<section class="container">
		    <div class="row">
				<div class="col-md-4 border">
					eventos
				</div>
				<div class="col-md-4 border">
					carrossel
				</div>
				<div class="col-md-4 border">
					pessoas mensagens					
				</div>
			</div>
        </section>
		<footer>
			<?php include '../../templates/js-bootstrap.php'; ?>
		</footer>
    </body>
</html>