<?php 
	$num = rand(1,10);
	$style = "image$num";
?>
<!doctype html>
<html lang="pt-br">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- COMPATIBILIDADE COM HTML5 -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
		<![endif]-->

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/Bootstrap4/css/bootstrap.min.css">

		<!-- NORMALIZE CSS -->
		<link   rel="stylesheet" type="text/css" href="assets/css/normalize.css">

		<!-- CSS CUSTOMIZADO -->
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		
		<title>Antigomobilista - Index</title>
	</head>
    <body>
        <?php include 'systems/templates/menu.php'; ?>
		<div class="text-center">
			<h1 class="titulo-index text-primary font-dancing">Antigomobilista - Para quem gosta de carro antigo de verdade</h1>
		</div>
		<div class="container" id="<?= $style ?>">
		<br /><br /><br /><br />
			<div class="text-center m-auto py-5">				
				<img src="../img/em_construcao/em-construcao-conjunto-de-icones_24877-60028.webp" alt="Em construção" width="200">
			</div>
		</div>
		<?php include 'systems/templates/js-bootstrap.php'; ?>
    </body>
</html>