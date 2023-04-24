<?php
	include '../../controladores/autenticacao/validador_de_acesso.php';
	include '../../controladores/pontuacoes/class_pontos.php';
	include '../../controladores/usuarios/class_usuarios.php';
	
	echo '===== SESSION =====';
	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';
	
	$idLogado = $_SESSION['id_logado'];
	$pontos = new Pontos();
	$pontos = $pontos->insertNovoNivel($idLogado);
	echo '===== Retorno Função =====';
	//echo '<pre>';
	echo $pontos;
	// '</pre>';

	$listaGeral = new Pontos();
	$listaGeral = $listaGeral->getAllPontos();
	echo '===== Lista Pontos =====';
	echo '<pre>';
	print_r($listaGeral);
	echo '</pre>';
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
		    <h2 class="text-center text-primary negrito py-5">Níveis</h2>
			<div class="row">
				<div class="col-md-10 m-auto">
					<h5 class="text-center text-primary negrito">Lista de níveis</h5>
					<div class="row border">
						<div class="col-sm-1">Id:</div>
						<div class="col-sm-4">Criador:</div>
						<div class="col-sm-1">Nível:</div>
						<div class="col-sm-2">Pontos:</div>
						<div class="col-sm-5">Criado em:</div>
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
								<div class="col-sm-1"><?= $id ?></div>
								<div class="col-sm-4"><?= $user ?></div>
								<div class="col-sm-1"><?= $nivel ?></div>
								<div class="col-sm-2"><?= $pontoInicial ?> à <?= $pontoFinal ?></div>
								<div class="col-sm-5"><?= $dataCriacao ?></div>
							</div>
					<?php
						}
					?>
				</div>
			</div>
			
        </div>        
        <?php include '../../templates/js-bootstrap.php'; ?>
    </body>
</html>