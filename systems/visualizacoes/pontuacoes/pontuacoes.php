<?php
	include '../../controladores/autenticacao/validador_de_acesso.php';
	include '../../controladores/pontuacoes/class_pontos.php';
	include '../../controladores/usuarios/class_usuarios.php';
	
	echo '===== SESSION =====';
	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';
	
	$listaGeral = new Pontos();
	$listaGeral = $listaGeral->getAllPontos();
?>
<!doctype html>
<html lang="pt-br">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
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
		<link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
		
		<title>Antigomobilista - Home</title>
	</head>
    <body>
        <?php include '../../../systems/templates/menu.php'; ?>
		<div class="container">
		    <h2 class="text-center text-primary negrito py-2">Níveis</h2>
			<div class="row">
				<div class="col-md-9">
					<h5 class="text-center text-primary negrito">Lista de níveis</h5>
					<div class="row border">
						<div class="col-sm-1 negrito text-center">Id:</div>
						<div class="col-sm-3 negrito">Criador:</div>
						<div class="col-sm-2 negrito text-center">Nível:</div>
						<div class="col-sm-3 negrito text-center">Pontos:</div>
						<div class="col-sm-3 negrito text-center">Criado em:</div>
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
							<div class="row border">
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
						<h1 class="text-center text-primary negrito d-inline">+</h1>
						<h5 class="text-center text-primary negrito d-inline">Nível</h5>
					</div>
					<div class="form-pontos">
						<form action="../../controladores/pontuacoes/adiciona_pontos.php" method="post">
							<div class="text-center mb-5">
								Adicionar 
								<input type="number" name="qtdd_niveis" id="qtdd_niveis" size="3">
								níveis
							</div>
							<button type="submit" class="btn btn-primary btn-block">Adicionar</button>
						</form>
					</div>

				</div>
			</div>
			<div class="pre-footer"></div>
        </div>        
        <?php include '../../templates/js-bootstrap.php'; ?>
    </body>
</html>