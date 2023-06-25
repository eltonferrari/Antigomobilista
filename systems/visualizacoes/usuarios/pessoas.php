<?php 
	include '../../controladores/autenticacao/validador_de_acesso.php';
	
		// Teste de usuário logado
		echo '===== USER TIPO =====';
		echo '<pre>';
		echo $tipo;
		echo '</pre>';
	

	// Teste de sessão
	echo '===== SESSION =====';
	echo '<pre>';
	print_r($_SESSION);
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
		
		<!-- add icon link -->
        <link rel="icon" href="../../../img/logo/antigomobilista_logo.png" type="image/x-icon">
		
		<title>Antigomobilista - Home</title>
	</head>
    <body>
        <?php include '../../../systems/templates/menu.php'; ?>
		<div class="container">
            <div class="row">
                <div class="col-md-4 m-auto">
                    <a class="cor-2 text-center link-sem-sobrescrito" href="perfil.php"><h3 class="negrito">Seu perfil</h3></a>
                </div>
            </div>
		    <div class="d-flex flex-wrap">

            </div>
        </div>        
        <?php include '../../templates/js-bootstrap.php'; ?>
    </body>
</html>