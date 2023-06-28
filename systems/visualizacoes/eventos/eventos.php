<?php 
	include '../../controladores/autenticacao/validador_de_acesso.php';
	echo '===== SESSION =====';
	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';
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
    <body>
        <?php include '../../../systems/templates/menu.php'; ?>
		<div class="container">
		    <div class="row mt-5">
				<div class="col-md-6 m-auto">
					<h2 class="text-primary text-center negrito">Lista de Eventos</h2>
					<a href="adicionar_evento.php"><h6 class="text-success text-center negrito">Adicionar novo Evento? Clique aqui.</h6></a>
                    TODOS | PRÓXIMOS | ANTERIORES
				</div>
			</div>
        </div>        
        <?php include '../../templates/js-bootstrap.php'; ?>
    </body>
</html>