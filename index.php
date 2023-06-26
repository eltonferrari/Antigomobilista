<?php
	session_start();
	
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
		
		<!-- add icon link -->
        <link rel="icon" href="img/logo/antigomobilista_logo.png" type="image/x-icon">
		
		<title>Antigomobilista - Index</title>
	</head>
    <body id="<?= $style ?>">
		<header>
	        <?php include 'systems/templates/menu.php'; ?>
		</header>
		<section class="text-center blur">
			<h1 class="titulo-index font-berk">Para quem gosta de carro antigo de verdade</h1>
		</section>		
		<section class="container">
			<br /><br /><br /><br />
			<div class="text-center m-auto py-5">				
				<img src="../img/em_construcao/em-construcao-conjunto-de-icones_24877-60028.webp" alt="Em construção" width="200">
			</div>
		</section>
		<?php include 'systems/templates/js-bootstrap.php'; ?>
    </body>
</html>