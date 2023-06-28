<?php 
	include '../../controladores/autenticacao/validador_de_acesso.php';
	include '../../../bibliotecas/lib/util.php';
	
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
	$usuarios = new Usuarios();
	$usuarios = $usuarios->getAllUsuarios();
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
		
		<title>Antigomobilista - Pessoas</title>
	</head>
    <body id="wallpaper-2">
        <header>
			<?php include '../../../systems/templates/menu.php'; ?>
		</header>
		<section class="container">
			<div class="row mt-5">
				<div class="col-5 borda-redonda-20 blur-3">
					<h1 class="font-dancing text-center cor-branco font-size-28 negrito mt-3">Pessoas</h1>
					<hr class="separador-branco">
					<div class="row">
						<div class="col-8">
							<h2 class="font-size-16 cor-branco negrito underline">Nome</h2>
						</div>
						<div class="col-4 text-center">
							<h2 class="font-size-16 cor-branco negrito underline">Criado em</h2>
						</div>
					</div>
					<?php
						foreach ($usuarios as $user) {
							$id = $user['id'];
							$nome = $user['nome'];
							$created = $user['created_at'];
							$criado = convertDataMySQL_DataPHP($created);
					?>
							<div class="row">
								<div class="col-8">
									<a href="perfil.php?id_perfil=<?= $id ?>" class="cor-branco">
										<p class="font-size-16 cor-branco">
											<?= $nome ?>
										</p>
									</a>
								</div>
								<div class="col-4 text-center">
									<a href="perfil.php?id_perfil=<?= $id ?>" class="cor-branco">
										<p class="font-size-16 cor-branco">
											<?= $criado ?>
										</p>
									</a>
								</div>
							</div>
					<?php
						}
					?>
				</div>
				<div class="col-2"></div>
				<div class="col-5 borda-redonda-20 blur-3">
					<h1 class="font-dancing text-center cor-branco font-size-28 negrito mt-3">Meu perfil</h1>
					<hr class="separador-branco">

				</div>
			</div>
        </section>
		<footer>
			<?php include '../../templates/js-bootstrap.php'; ?>
		</footer>
    </body>
</html>