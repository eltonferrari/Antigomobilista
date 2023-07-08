<?php
	include '../../controladores/autenticacao/validador_de_acesso.php';
	
	// MENU ==========================================================
	include '../../controladores/pontuacoes/class_pontuacoes.php';
	$idUsuarioLogado = $_SESSION['id_user'];
	$usuarioLogado = new Usuarios();
	$nivel = new Usuarios();
	$porcentagem = new Pontuacoes();
	$usuarioLogado = $usuarioLogado->getUsuarioById($idUsuarioLogado);
	$nivel = $nivel->getNivelByIdUser($idUsuarioLogado);
	$porcentagem = $porcentagem->getPorcentagemById($idUsuarioLogado);
	foreach ($usuarioLogado as $ul) {
		$nomeUsuarioLogado = $ul['nome'];
		$fotoUsuarioLogado = $ul['imagem'];
	}
	// ===============================================================
	$listaGeral = new Pontuacoes();
	$listaGeral = $listaGeral->getAllPontos();	 
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
		
		<title>Antigomobilista - Pontos</title>
	</head>
    <body>
        <header>
			<?php include '../../../systems/templates/menu.php'; ?>
		</header>
		<section class="container">
		    <h1 class="text-center cor-3 negrito py-2">Níveis</h1>
			<div class="row">
				<div class="col-md-9">
					<h2 class="text-center cor-3 negrito font-size-22">Lista de níveis</h2>
					<div class="row borda-2">
						<div class="col-sm-1 cor-3 negrito text-center">Id:</div>
						<div class="col-sm-3 cor-3 negrito">Criador:</div>
						<div class="col-sm-2 cor-3 negrito text-center">Nível:</div>
						<div class="col-sm-3 cor-3 negrito text-center">Pontos:</div>
						<div class="col-sm-3 cor-3 negrito text-center">Criado em:</div>
					</div>
					<?php
						foreach ($listaGeral as $lista) {
							$id = $lista['id'];
							$user = $lista['id_criador'];
							$nivel = $lista['nivel'];
							$pontoInicial = $lista['ponto_inicial'];
							$pontoFinal = $lista['ponto_final'];
							$dataCriacao = $lista['created_at'];
							$criador = new Usuarios();
							$criador = $criador->getNomeById($user);
					?>
							<div class="row borda-2">
								<div class="col-sm-1 text-center"><?= $id ?></div>
								<div class="col-sm-3"><?= $criador ?></div>
								<div class="col-sm-2 text-center"><?= $nivel ?></div>
								<div class="col-sm-3 text-center"><?= $pontoInicial ?> à <?= $pontoFinal ?></div>
								<div class="col-sm-3 text-center"><?= $dataCriacao ?></div>
							</div>
					<?php
						}
					?>
				</div>
				<div class="col-md-3">
					<div class="text-center mb-5">
						<h2 class="text-center cor-3 negrito d-inline font-size-22">+ Nível</h2>
					</div>
					<div class="form-pontos">
						<form action="../../controladores/pontuacoes/adiciona_pontos.php" method="post">
							<div class="text-center mb-5 cor-2 negrito">
								Adicionar 
								<input type="number" name="qtdd_niveis" id="qtdd_niveis" size="3">
								níveis
							</div>
							<button type="submit" class="btn botao btn-block">Adicionar</button>
						</form>
					</div>
				</div>
			</div>
			<div class="pre-footer"></div>
        </section>
		<footer>
			<?php include '../../templates/js-bootstrap.php'; ?>
		</footer>
    </body>
</html>